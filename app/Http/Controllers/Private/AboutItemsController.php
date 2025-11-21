<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\About;

class AboutItemsController extends Controller
{

    public function indeX(){

        $about = About::first();

        return view('admin.about', ['data' => $about]);
    }

    public function updata_item(Request $request){

        $count_about = About::first();

        if($count_about){



            if($request->imagen_nosotros){
                $validated = $request->validate([
                    'imagen_nosotros' => 'required|mimes:png,jpeg,gif',
                    'title' => 'required',
                    'contenido' => 'required',
                    'meta' => 'required'
                ]);

                $count_about->update([
                    'title' => $request->title,
                    'description' => $request->contenido,
                    'photo' => $this->imagen($request->file('imagen_nosotros')),
                    'meta_description' => $request->meta
                ]);

            }else{
                $validated = $request->validate([
                    'title' => 'required',
                    'contenido' => 'required',
                    'meta' => 'required'
                ]);

                $count_about->update([
                    'title' => $request->title,
                    'description' => $request->contenido,
                    'meta_description' => $request->meta
                ]);

            }



            return back()->with('save', 'Los registros se guardaron con exito');

        }else{

            $validated = $request->validate([
                'imagen_nosotros' => 'required|mimes:png,jpeg,gif',
                'title' => 'required',
                'contenido' => 'required',
                'meta' => 'required'
            ]);

            About::create([
                'title' => $request->title,
                'description' => $request->contenido,
                'photo' => $this->imagen($request->file('imagen_nosotros')),
                 'meta_description' => $request->meta
            ]);

            return back()->with('save', 'Los registros se guardaron con exito');


        }

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
