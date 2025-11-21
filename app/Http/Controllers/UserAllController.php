<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserAllController extends Controller
{
    public function index(){

        Carbon::setLocale('es');
        $data = User::orderby('id', 'desc')->get();

        return view('admin.admins.users', ['data' => $data]);

    }


    public function update_password(Request $request, $id){

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        User::where('id', $id)
            ->update([
                'password' => Hash::make($request->password)
            ]);


        return back()->with('save', 'La contraseña se actualizo con exíto');

    }

    public  function individual(Request $request, $id){

        User::where('id', $id)
            ->update(['type' => $request->select_value]);

        return back()->with('actualizado', 'La contraseña se actualizo con exíto');

    }

    public  function delete($id){
        User::where('id', $id)
            ->delete();

        return back()->with('eliminnado', 'La contraseña se actualizo con exíto');
    }
}
