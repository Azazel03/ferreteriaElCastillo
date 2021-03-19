<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'idcategory';
    public $timestamps = false;

    protected $fillable = [
        'idcategory', 
        'name_category'
    ];
}
