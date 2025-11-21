<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;


    public $table = 'home';

    protected $fillable = [
        'title',
        'subtitle',
        'typed',
        'video',
        'meta_description'
    ];

}
