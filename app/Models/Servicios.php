<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    public $table = 'servicios';

    protected $fillable = [
        'title',
        'descripcion',
        'photo',
        'calificacion',
        'vistas',
        'status',
        'slug',
        'posicion',
        'meta_description'
    ];
}
