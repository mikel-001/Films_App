<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFilms extends Model
{
    use HasFactory;
    protected $fillable = [
        'film_id',
        'original_language', 
        'title',
        'release_date',        
        'overview',     
         
    ];
}
