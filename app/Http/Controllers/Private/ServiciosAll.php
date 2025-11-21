<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicios;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ServiciosAll extends Controller
{
    public function nuevo(){

        $servicios_count = Servicios::count();

        return view('admin.servicios', ['count_servicios' => $servicios_count]);
    }


    public function create(Request $request){
        $validated = $request->validate([
            'imagen' => 'required|mimes:png,jpeg,gif',
            'title' => 'required',
            'contenido' => 'required',
            'meta' => 'required',
            'positicion' => 'required'
        ]);

        Servicios::create([
            'title' => $request->title,
            'posicion' => $request->positicion,
            'descripcion' => $request->contenido,
            'meta_description' => $request->meta,
            'posicion' => $request->positicion,
            'photo' => $this->imagen($request->file('imagen')),
            'slug' => Str::slug($request->title . '-' . mt_rand(10, 99)),
        ]);

        return back()->with('save', 'Los registros se guardaron con exito');

    }

    public function public(){
        Carbon::setLocale('es');
        $servicios =  Servicios::where('status', 'public')->orderBy('id', 'desc')->get();
        return view('admin.servicios', ['data' => $servicios ]);
    }

    public function papelera(){
        Carbon::setLocale('es');
        $servicios =  Servicios::where('status', 'papelera')->orderBy('id', 'desc')->get();
        return view('admin.servicios', ['data' => $servicios ]);
    }

    public function update_reciclar($id){
        Servicios::where('id', $id)
                ->update([
                    'status' => 'papelera'
                ]);

        return back()->with('save', 'El registro se envio a la papelera con exito');

    }

    public function individual_update(Request $request, $slug){

        if($request->imagen){
            $validated = $request->validate([
                'imagen' => 'required|mimes:png,jpeg,gif',
                'title' => 'required',
                'contenido' => 'required',
                'meta' => 'required'
            ]);

            Servicios::where('slug', $slug)->update([
                'title' => $request->title,
                'posicion' => $request->positicion,
                'descripcion' => $request->contenido,
                'photo' => $this->imagen($request->file('imagen')),
                'meta_description' => $request->meta
            ]);

        }else{
            $validated = $request->validate([
                'title' => 'required',
                'contenido' => 'required',
                'meta' => 'required'
            ]);

            Servicios::where('slug', $slug)->update([
                'title' => $request->title,
                'posicion' => $request->positicion,
                'descripcion' => $request->contenido,
                'meta_description' => $request->meta
            ]);

        }

        return back()->with('save', 'El registro se actualizo con exito');

    }


    public function update_publicar($id){
        Servicios::where('id', $id)
                ->update([
                    'status' => 'public'
                ]);

        return back()->with('save', 'El registro se publico con exito');
    }

    public function delete($id){
        Servicios::where('id', $id)
                ->delete();

        return Redirect::to('/edit/servicios/publicos')->with('save', 'El registro se elimino con exito');

    }

    public function individual($slug){

        $service_individual = Servicios::where('slug', $slug)
                ->first();
        $servicios_count = Servicios::count();

        return view('admin.servicios', ['data' => $service_individual, 'count_servicios' => $servicios_count] );

    }

    private function imagen($imagen){

        // Almacenar imagen

        $file= Str::random(20) . $imagen->getClientOriginalName();
        Storage::disk('file_uploads')->put($file,   file_get_contents($imagen->getPathName()));
        // $url_file = Storage::disk('file_uploads')->url($file);

        // return $url_file;
        return "https://serviciosfilologicos.com/storage/app/file_uploads/" . $file;
    }
}
