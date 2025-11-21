<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;


    protected $table = 'comments';

    protected $fillable = [
        'nombre',
        'email',
        'description',
        'created_at',
        'id_servicio',
        'public'
    ];
}
