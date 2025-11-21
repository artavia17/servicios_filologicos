<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortadaServicios extends Model
{
    use HasFactory;

    public $table = 'portada_servicios';

    protected $fillable = [
        'title',
        'description',
        'photo',
        'meta_description'
    ];
}
