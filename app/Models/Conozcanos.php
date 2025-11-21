<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conozcanos extends Model
{
    use HasFactory;

    public $table = 'conozcanos';

    protected $fillable = [
        'title',
        'photo',
        'descripcion',
        'status',
        'video',
        'slug',
        'meta_description'
    ];
}
