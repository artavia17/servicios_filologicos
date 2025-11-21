<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortadaServicios;
use App\Models\Servicios;
use App\Models\Comments;
use Carbon\Carbon;


class ServiciosPageController extends Controller
{
    public function index(){
        $data = PortadaServicios::first();
        $all_servicios = Servicios::orderby('posicion', 'asc')->orderby('id', 'desc')->paginate(9);
        $primer_orden = '';
        $segundo_orden = '';

        if($data){

            if(isset($_GET['filter-one']) && (isset($_GET['filter-two']))){

                if($_GET['filter-one'] == 'reciente'){
                    $primer_orden = 'desc';
                }else if($_GET['filter-one'] == 'antiguo'){
                    $primer_orden = 'asc';
                }

                if($_GET['filter-two'] == 'a-z'){
                    $segundo_orden = 'asc';
                }else if($_GET['filter-two'] == 'z-a'){
                    $segundo_orden = 'desc';
                }

                $all_servicios = Servicios::orderBy('id', $primer_orden)->orderBy('title', $segundo_orden)->paginate(9);

            }else if(isset($_GET['filter-one'])){

                if($_GET['filter-one'] == 'reciente' || $_GET['filter-one'] == 'antiguo'){
                    if($_GET['filter-one'] == 'reciente'){
                        $primer_orden = 'desc';
                    }else if($_GET['filter-one'] == 'antiguo'){
                        $primer_orden = 'asc';
                    }

                    $all_servicios = Servicios::orderBy('id', $primer_orden)->paginate(9);

                }else if( $_GET['filter-one'] == 'a-z' || $_GET['filter-one'] == 'z-a'){

                    if($_GET['filter-one'] == 'a-z'){
                        $primer_orden = 'asc';
                    }else if($_GET['filter-one'] == 'z-a'){
                        $primer_orden = 'desc';
                    }

                    $all_servicios = Servicios::orderBy('title', $primer_orden)->paginate(9);

                }

            }

            return view('public.servicios', ['data' => $data, 'services' => $all_servicios]);
        }else{
            return 'Ocurrio un problema al mostrar la vista del sitio web...';
        }
    }

    public function individual($slug){

        Carbon::setLocale('es');

        $data = Servicios::where('slug', $slug)->first();

        if($data){
            $last_services = Servicios::where('id', '!=', $data->id)->orderby('id', 'desc')->take(3)->get();
            $comment = Comments::where([
                                        ['id_servicio', '=' ,$data->id],
                                        ['public', '=' , 'public'],
                                      ])->orderby('id', 'desc')->get();

            return view('public.servicios_individual', ['data' => $data, 'comments' => $comment, 'services' => $last_services]);
        }

        return abort(404);



    }
}
