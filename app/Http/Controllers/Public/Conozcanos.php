<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conozcanos;

class Conozcanos extends Controller
{
    public function index(){

        $data = Conozcanos::all();



        return view('public.acerca_de', ['data' => $data]);

    }
}
