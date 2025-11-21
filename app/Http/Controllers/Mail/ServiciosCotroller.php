<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ServiciosCotroller extends Controller
{
    public  function index(Request $request){

        // Content Mail

        $title = $request->title;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $description = $request->description;



        $correo = new ContactForm($title, $name, $email, $phone, $description);
        Mail::to('info@serviciosfilologicos.com')->send($correo);

        return back()->with('servicio_formulario', 'mostrar');


    }
}
