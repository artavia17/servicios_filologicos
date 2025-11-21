<?php

namespace App\Http\Controllers;

use App\Models\Accesos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accesos = Accesos::all();

        $user_name = [];

        foreach($accesos as $value){
            $user_all = User::where('id', $value->id_user)->first();
            array_push($user_name, $user_all->name);
        }


        if(Home::first()){

            $data = Home::first();

            $typed = $data->typed;

            $array_typed = explode(',', $typed);

            return view('admin.home', ['accesos' => $accesos, 'data' => $data, 'typed_data' => $array_typed, 'name' =>  $user_name]);
        }else{
            return view('admin.home', ['accesos' => $accesos, 'name' =>  $user_name, 'data' => '', 'typed_data' => '']);
        }

    }

    public function update(Request $request)
    {


        $title = $request->title;
        $subtitle= $request->subtitle;
        $typed= $request->typed;
        $meta = $request->meta;

        if(Home::first()){

            $validated = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'video' => 'mimes:mp4, mp3',
                'meta' => 'required'
            ]);


            if($request->file('video')){
                Home::first()->update([
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'typed' => $typed,
                    'video' => $this->video($request->video),
                    'meta_description' => $meta
                ]);
            }else{
                Home::first()->update([
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'typed' => $typed,
                    'meta_description' => $meta
                ]);
            }

            return back()->with('save', 'Los registros se actualizaron con exito');

        }else{

            $validated = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'video' => 'required | mimes:mp4, mp3',
                'meta' => 'required'
            ]);

            Home::create([
                'title' => $title,
                'subtitle' => $subtitle,
                'typed' => $typed,
                'video' => $this->video($request->video),
                'meta_description' => $meta
            ]);

            return back()->with('save', 'Los registros se guardaron con exito');

        }

    }

    private function video($video){

        // Almacenar video

        $file= Str::random(20) . $video->getClientOriginalName();
        Storage::disk('file_uploads')->put($file,   file_get_contents($video->getPathName()));
        $url_file = Storage::disk('file_uploads')->url($file);

        return $url_file;
    }



}
