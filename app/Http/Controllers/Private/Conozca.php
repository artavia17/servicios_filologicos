<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conozcanos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;



class Conozca extends Controller
{
    public function nuevo(){

        return view('admin.conozca');

    }

    public function public(){
        Carbon::setLocale('es');
        $conozcanos =  Conozcanos::where('status', 'public')->orderBy('id', 'desc')->get();
        return view('admin.conozca', ['data' => $conozcanos ]);
    }

    public function papelera(){
        Carbon::setLocale('es');
        $conozcanos =  Conozcanos::where('status', 'reciclado')->orderBy('id', 'desc')->get();

        return view('admin.conozca', ['data' => $conozcanos ]);
    }

    public function individual( $slug){

        $conozcanos =  Conozcanos::where('slug', $slug)->first();

        return view('admin.conozca', ['data' => $conozcanos ]);

    }

    public function actualizar(Request $request, $slug){

        if($request->imagen){
            $validated = $request->validate([
                'imagen' => 'required|mimes:png,jpeg,gif',
                'title' => 'required',
                'contenido' => 'required',
                'meta' => 'required'
            ]);

            Conozcanos::where('slug', $slug)->update([
                'title' => $request->title,
                'descripcion' => $request->contenido,
                'video' => $request->video,
                'photo' => $this->imagen($request->file('imagen')),
                'meta_description' => $request->meta
            ]);

        }else{
            $validated = $request->validate([
                'title' => 'required',
                'contenido' => 'required',
                'meta' => 'required'
            ]);

            Conozcanos::where('slug', $slug)->update([
                'title' => $request->title,
                'video' => $request->video,
                'descripcion' => $request->contenido,
                'meta_description' => $request->meta
            ]);

        }

        return back()->with('save', 'El registro se actualizo con exito');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'imagen' => 'required|mimes:png,jpeg,gif',
            'title' => 'required',
            'contenido' => 'required',
            'meta' => 'required'
        ]);

        conozcanos::create([
            'title' => $request->title,
            'descripcion' => $request->contenido,
            'video' => $request->video,
            'photo' => $this->imagen($request->file('imagen')),
            'slug' => Str::slug($request->title . '-' . mt_rand(10, 99)),
            'meta_description' => $request->meta
        ]);

        return back()->with('save', 'Los registros se guardaron con exito');

    }


    public function update_reciclar($id){
        Conozcanos::where('id', $id)->update([
            'status' => 'reciclado'
        ]);

        return Redirect::to('edit/conozca/papelera')->with('save', 'Los registros se reciclo con exito');
    }

    public function update_publicar($id){

        Conozcanos::where('id', $id)->update([
            'status' => 'public'
        ]);

        return Redirect::to('edit/conozca/public')->with('save', 'Los registros se reciclo con exito');
    }

    public function delete($id){

        Conozcanos::where('id', $id)->delete();

        return Redirect::to('edit/conozca/public')->with('save', 'El registro se elimino con exito');

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
