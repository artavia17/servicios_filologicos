<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;


class AboutPageController extends Controller
{
    public function index(){

        $data = About::first();

        if($data){

            return view('public.acerca_de', ['data' => $data]);

        }else{

            return 'Ocurrio un problema al mostrar la vista del sitio web...';

        }


    }
}
