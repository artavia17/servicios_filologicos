<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Servicios;
use Carbon\Carbon;
class ComentariosController extends Controller
{
    public function index(){

        Carbon::setLocale('es');

        $data = Comments::orderby('id', 'desc')->get();


        return view('admin.admins.comments', ['data' => $data]);

    }

    public function update(Request $request, $id){

        Comments::where('id', $id)
                ->update([
                    'description' => $request->contenido,
                    'public' => $request->select_value
                ]);

        return back()->with('save', 'El registro se actualizo con exito');

    }

    public  function delete($id){

            Comments::where('id', $id)->delete();
            return back()->with('save', 'El registro se actualizo con exito');

    }

}
