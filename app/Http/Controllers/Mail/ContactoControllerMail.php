<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\FormContacto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactoControllerMail extends Controller
{
    public  function index(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'description' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Content Mail

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $description = $request->description;



        $correo = new FormContacto($name, $email, $phone, $description);
        Mail::to('info@serviciosfilologicos.com')->send($correo);

        return back()->with('contacto_formulario', 'mostrar');


    }
}
