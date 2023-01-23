<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesos extends Model
{
    use HasFactory;

    public $table = 'solicitud_accesos';

    protected $fillable = [
        'id_user',
    ];

}
