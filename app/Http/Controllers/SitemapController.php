<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    public function index()
    {
        $servicios = DB::table('servicios')
            ->where('activo', 1)
            ->select('slug', 'updated_at')
            ->get();

        $conozcanos = DB::table('conozcanos')
            ->where('activo', 1)
            ->select('slug', 'updated_at')
            ->get();

        $content = '<?xml version="1.0" encoding="UTF-8"?>';
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $content .= ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"';
        $content .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
        $content .= ' xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9';
        $content .= ' http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        // Página Principal
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/</loc>';
        $content .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>1.0</priority>';
        $content .= '<image:image>';
        $content .= '<image:loc>https://www.serviciosfilologicos.com/public/img/SVG/logo_escritorio.svg</image:loc>';
        $content .= '<image:title>Logo Servicios Filológicos</image:title>';
        $content .= '</image:image>';
        $content .= '</url>';

        // Sobre Nosotros
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/sobre-nosotros</loc>';
        $content .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $content .= '<changefreq>monthly</changefreq>';
        $content .= '<priority>0.9</priority>';
        $content .= '</url>';

        // Servicios
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/servicios</loc>';
        $content .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>0.9</priority>';
        $content .= '</url>';

        // Servicios Individuales
        foreach ($servicios as $servicio) {
            $content .= '<url>';
            $content .= '<loc>https://www.serviciosfilologicos.com/servicios/' . $servicio->slug . '</loc>';
            $content .= '<lastmod>' . date('Y-m-d', strtotime($servicio->updated_at)) . '</lastmod>';
            $content .= '<changefreq>monthly</changefreq>';
            $content .= '<priority>0.8</priority>';
            $content .= '</url>';
        }

        // Conozca +
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/conozca</loc>';
        $content .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $content .= '<changefreq>weekly</changefreq>';
        $content .= '<priority>0.8</priority>';
        $content .= '</url>';

        // Conozca + Individuales
        foreach ($conozcanos as $conozca) {
            $content .= '<url>';
            $content .= '<loc>https://www.serviciosfilologicos.com/conozca/' . $conozca->slug . '</loc>';
            $content .= '<lastmod>' . date('Y-m-d', strtotime($conozca->updated_at)) . '</lastmod>';
            $content .= '<changefreq>monthly</changefreq>';
            $content .= '<priority>0.7</priority>';
            $content .= '</url>';
        }

        // Contacto
        $content .= '<url>';
        $content .= '<loc>https://www.serviciosfilologicos.com/contacto</loc>';
        $content .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $content .= '<changefreq>monthly</changefreq>';
        $content .= '<priority>0.8</priority>';
        $content .= '</url>';

        $content .= '</urlset>';

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
