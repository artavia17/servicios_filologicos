<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AccesosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Public\HomePageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Private\AboutItemsController;
use App\Http\Controllers\Private\ServiciosPortada;
use App\Http\Controllers\Private\ServiciosAll;
use App\Http\Controllers\Private\Conozca;
use App\Http\Controllers\Public\AboutPageController;
use App\Http\Controllers\Public\ServiciosPageController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Public\ConozcanosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Mail\ServiciosCotroller;
use App\Http\Controllers\Mail\ContactoControllerMail;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\UserAllController;


// Public

Route::get('/', [HomePageController::class, 'index'])->name('home_page');
Route::get('/sobre-nosotros', [AboutPageController::class, 'index'])->name('about');
Route::get('/servicios', [ServiciosPageController::class, 'index'])->name('servicios');
Route::get('/servicios/{slug}', [ServiciosPageController::class, 'individual'])->name('servicios_individual');
Route::get('/conozca', [ConozcanosController::class, 'index'])->name('conozcanos');
Route::get('/conozca/{slug}', [ConozcanosController::class, 'individual'])->name('conozcanos_indivual');
Route::post('/servicios/comment', [CommentsController::class, 'index'])->name('new_comment');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

// Send form contact

Route::get('/send-mail-services', [ServiciosCotroller::class, 'index'])->name('send_email_services');
Route::get('/send-mail-contact', [ContactoControllerMail::class, 'index'])->name('send_form_contact');


//Route::post('/new_comment', [])

//System update date

Auth::routes();

Route::middleware('auth')->group(function () {

    // Home

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home/accesos', [AccesosController::class, 'index'])->name('solicitar_acceso');
    Route::post('/home/accesos/{id}', [AccesosController::class, 'update'])->name('actualizar_acceso');
    Route::post('/home', [HomeController::class, 'update'])->name('actualizar_home');

    // Private

    //About

    Route::get('/edit/about', [AboutItemsController::class, 'index'])->name('about_admin');
    Route::post('/edit/about', [AboutItemsController::class, 'updata_item'])->name('about_admin_update');

    // Servicios
    Route::get('/edit/servicios/portada', [ServiciosPortada::class, 'index'])->name('admin_servicios_portada');
    Route::post('/edit/servicios/portada', [ServiciosPortada::class, 'update'])->name('admin_servicios_portada');
    Route::get('/edit/servicios/nuevo', [ServiciosAll::class, 'nuevo'])->name('admin_servicios_nuevo');
    Route::post('/edit/servicios/nuevo', [ServiciosAll::class, 'create'])->name('admin_servicios_create');
    Route::get('/edit/servicios/publicos', [ServiciosAll::class, 'public'])->name('admin_servicios_public');
    Route::get('/edit/servicios/papelera', [ServiciosAll::class, 'papelera'])->name('admin_servicios_papelera');
    Route::get('/edit/servicios/reciclar/{id}', [ServiciosAll::class, 'update_reciclar'])->name('admin_servicios_reciclar_update');
    Route::get('/edit/servicios/publicar/{id}', [ServiciosAll::class, 'update_publicar'])->name('admin_servicios_publicar_update');
    Route::get('/edit/servicios/delete/{id}', [ServiciosAll::class, 'delete'])->name('admin_servicios_eliminar');
    Route::get('/edit/servicios/individual/{slug}', [ServiciosAll::class, 'individual'])->name('admin_servicios_individual');
    Route::post('/edit/servicios/individual/update/{slug}', [ServiciosAll::class, 'individual_update'])->name('admin_servicios_individual_update');
    Route::get('/edit/comments', [ComentariosController::class, 'index'])->name('comments');
    Route::post('/edit/comments/update/{id}', [ComentariosController::class, 'update'])->name('comments_update');
    Route::get('/edit/comments/delete/{id}', [ComentariosController::class, 'delete'])->name('comments_delete');


    // Conozca mas

    Route::get('/edit/conozca/nuevo', [Conozca::class, 'nuevo'])->name('admin_nuevo_conozca');
    Route::get('/edit/conozca/public', [Conozca::class, 'public'])->name('admin_public_conozca');
    Route::get('/edit/conozca/papelera', [Conozca::class, 'papelera'])->name('admin_papelera_conozca');
    Route::post('/edit/conozca/nuevo', [Conozca::class, 'create'])->name('admin_agregar_conozca');
    Route::get('/edit/conozca/individual/{slug}', [Conozca::class, 'individual'])->name('admin_individual_conozca');
    Route::post('/edit/conozca/individual/{slug}', [Conozca::class, 'actualizar'])->name('admin_individual_upddata_conozca');
    Route::post('/edit/conozca/individual/{slug}', [Conozca::class, 'actualizar'])->name('admin_individual_upddata_conozca');

    //Reciclar conozcanos

    Route::get('/edit/conozca/reciclar/{id}', [Conozca::class, 'update_reciclar'])->name('admin_individual_reciclar_conozca');
    Route::get('/edit/conozca/publicar/{id}', [Conozca::class, 'update_publicar'])->name('admin_individual_publicar_conozca');
    Route::get('/edit/conozca/delete/{id}', [Conozca::class, 'delete'])->name('admin_individual_delete_conozca');


    // Usuarios

    Route::get('/edit/usuarios', [UserAllController::class, 'index'])->name('all_users');
    Route::post('/edit/usuarios/update/password/${id}', [UserAllController::class, 'update_password'])->name('new_password');
    Route::post('/edit/usuarios/update/user/${id}', [UserAllController::class, 'individual'])->name('update_user');
    Route::get('/edit/usuarios/delete/user/${id}', [UserAllController::class, 'delete'])->name('delete_user');
});

