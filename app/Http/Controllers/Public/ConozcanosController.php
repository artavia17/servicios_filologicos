<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conozcanos;

class ConozcanosController extends Controller
{
    public function index(){

        $last_data = Conozcanos::latest()->first();

        $data = Conozcanos::where('id', '!=', $last_data->id)->orderby('id', 'desc')->get();

        return view('public.conozca', ['data' => $last_data, 'all' => $data]);

    }

    public function individual($slug){

        $data_slug = Conozcanos::where('slug', $slug)->first();

        if ($data_slug) {

            $data = Conozcanos::where('id', '!=', $data_slug->id)->orderby('id', 'desc')->get();

            return view('public.conozca_indivual', ['data' => $data_slug, 'all' => $data]);

        }

        return abort(404);

    }
}
