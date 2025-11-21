<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function index(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'description' => 'required',
        ]);

        Comments::create([
            'nombre' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'id_servicio' => $request->id_service,
        ]);

        return back()->with('comentario_save', 'Los registros se guardaron con exito');

    }


}
