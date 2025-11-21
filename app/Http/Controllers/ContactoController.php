<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
class ContactoController extends Controller
{
    public  function index(){

        $data = Home::first();

        return view('public.contacto', ['meta' => $data->meta_description]);

    }
}
