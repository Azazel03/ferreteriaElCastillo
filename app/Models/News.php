<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'title',
        'article',
        'image',
        'theme',
        'create_at',
        'update_at',
        'name',
        'inicio',
        'estado'
    ];

    protected $guarded = [];
}
