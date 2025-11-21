<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImageSitemapController extends Controller
{
    public function index()
    {
        // Obtener servicios con imágenes
        $servicios = DB::table('servicios')
            ->where('activo', 1)
            ->select('slug', 'title', 'photo', 'updated_at')
            ->get();

        // Obtener conozcanos con imágenes
        $conozcanos = DB::table('conozcanos')
            ->where('activo', 1)
            ->select('slug', 'title', 'photo', 'updated_at')
            ->get();

        // Obtener home
        $home = DB::table('home')->first();

        // Obtener about
        $about = DB::table('about')->first();

        $content = '<?xml version="1.0" encoding="UTF-8"?>';
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $content .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

        // Página Principal con imágenes
        if ($home) {
            $content .= '<url>';
            $content .= '<loc>https://www.serviciosfilologicos.com/</loc>';
            $content .= '<image:image>';
            $content .= '<image:loc>https://www.serviciosfilologicos.com/public/img/logo-og.png</image:loc>';
            $content .= '<image:title>Logo Servicios Filológicos - Corrección de Tesis y Clases de Español</image:title>';
            $content .= '<image:caption>Logo oficial de Servicios Filológicos, especialistas en corrección de tesis, documentos académicos y clases de español en Costa Rica</image:caption>';
            $content .= '</image:image>';
            if ($home->video) {
                $content .= '<image:image>';
                $content .= '<image:loc>' . htmlspecialchars($home->video) . '</image:loc>';
                $content .= '<image:title>' . htmlspecialchars($home->title ?? 'Servicios Filológicos') . '</image:title>';
                $content .= '<image:caption>Video de presentación de Servicios Filológicos</image:caption>';
                $content .= '</image:image>';
            }
            $content .= '</url>';
        }

        // Sobre Nosotros con imagen
        if ($about) {
            $content .= '<url>';
            $content .= '<loc>https://www.serviciosfilologicos.com/sobre-nosotros</loc>';
            if ($about->photo) {
                $content .= '<image:image>';
                $content .= '<image:loc>' . htmlspecialchars($about->photo) . '</image:loc>';
                $content .= '<image:title>' . htmlspecialchars($about->title ?? 'Sobre Nosotros') . '</image:title>';
                $content .= '<image:caption>Experta en filología y servicios lingüísticos profesionales</image:caption>';
                $content .= '</image:image>';
            }
            $content .= '</url>';
        }

        // Página de servicios
        $portadaServicios = DB::table('portada_servicios')->first();
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/servicios</loc>';
        if ($portadaServicios && $portadaServicios->photo) {
            $content .= '<image:image>';
            $content .= '<image:loc>' . htmlspecialchars($portadaServicios->photo) . '</image:loc>';
            $content .= '<image:title>Servicios Filológicos Profesionales</image:title>';
            $content .= '<image:caption>Servicios de corrección de tesis, documentos y clases de español</image:caption>';
            $content .= '</image:image>';
        }
        $content .= '</url>';

        // Servicios Individuales con sus imágenes
        foreach ($servicios as $servicio) {
            $content .= '<url>';
            $content .= '<loc>https://www.serviciosfilologicos.com/servicios/' . $servicio->slug . '</loc>';
            if ($servicio->photo) {
                $content .= '<image:image>';
                $content .= '<image:loc>' . htmlspecialchars($servicio->photo) . '</image:loc>';
                $content .= '<image:title>' . htmlspecialchars($servicio->title) . ' - Servicios Filológicos</image:title>';
                $content .= '<image:caption>Servicio profesional de ' . htmlspecialchars(strtolower($servicio->title)) . ' en Costa Rica. Calidad garantizada y atención personalizada.</image:caption>';
                $content .= '<image:geo_location>Escazú, San José, Costa Rica</image:geo_location>';
                $content .= '</image:image>';
            }
            $content .= '</url>';
        }

        // Conozca + Individuales con sus imágenes
        foreach ($conozcanos as $conozca) {
            $content .= '<url>';
            $content .= '<loc>https://www.serviciosfilologicos.com/conozca/' . $conozca->slug . '</loc>';
            if ($conozca->photo) {
                $content .= '<image:image>';
                $content .= '<image:loc>' . htmlspecialchars($conozca->photo) . '</image:loc>';
                $content .= '<image:title>' . htmlspecialchars($conozca->title) . ' - Servicios Filológicos</image:title>';
                $content .= '<image:caption>' . htmlspecialchars($conozca->title) . ' - Artículo informativo sobre servicios filológicos</image:caption>';
                $content .= '</image:image>';
            }
            $content .= '</url>';
        }

        // Contacto con imagen
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/contacto</loc>';
        $content .= '<image:image>';
        $content .= '<image:loc>https://www.serviciosfilologicos.com/public/img/contacto.jpg</image:loc>';
        $content .= '<image:title>Contacto - Servicios Filológicos</image:title>';
        $content .= '<image:caption>Contáctenos para solicitar información sobre corrección de tesis, documentos y clases de español en Costa Rica</image:caption>';
        $content .= '<image:geo_location>Escazú, San José, Costa Rica</image:geo_location>';
        $content .= '</image:image>';
        $content .= '</url>';

        $content .= '</urlset>';

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
