<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = "books";
    protected $fillable = ['title','summary', 'image', 'stock' , 'genre_id'];

}
