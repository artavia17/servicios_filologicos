<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accesos;
use App\Models\User;

class AccesosController extends Controller
{
    public function index()
    {

        Accesos::create([
            'id_user' => auth()->user()->id,
        ]);

        return back()->with('message', 'La solicitud de acceso se envió con éxito, cuando su solicitud sea aceptada se le enviará un correo electrónico.');


    }

    public function update(Request $request, $id)
    {

        $request_data = $request->type;

        $id_user = Accesos::where('id', $id)->first();
        $id_user = $id_user->id_user;


        // Actualizar usuario
        $this->updated_user($id_user, $request_data);

        //Eliminar registro data
        $this->delete_peticion($id);

        return back()->with('message', 'Registro actualizado con exito');

    }


    // Actulizar usuario

    private function updated_user($id_user, $type){
        if($type == 'admin' || $type == 'collaborator'):
            User::where('id', $id_user)
                ->update([
                    'type' => 'admin'
                ]);
        elseif ($type == 'delete'):

            User::where('id', $id_user)
                ->delete();

        endif;
    }

    //Eliminar peticion de acceso

    private function delete_peticion($id)
    {
        Accesos::where('id', $id)
                ->delete();
    }

}
