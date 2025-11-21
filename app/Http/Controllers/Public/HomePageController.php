<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

class HomePageController extends Controller
{
    public function index(){

        $home_data = Home::first();
        $array_content = '';
        $array_complete = [];

        if($home_data){
            $array_content = explode(",", $home_data->typed);
        }

        if($array_content){
            foreach($array_content as $value){

                if($value){
                    array_push($array_complete, $value);
                }
            }
        }

        if($home_data){
            return view('public.home', ['data' => $home_data, 'type_text' => $array_complete]);
        }else{
            return view('public.home', ['data' => '', 'type_text' => '']);
        }
    }
}
