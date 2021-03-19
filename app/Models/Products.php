<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'idproduct';
    public $timestamps = false;

    protected $fillable = [
        'idproduct', 
        'name',
        'description',
        'date',
        'neto',
        'iva',
        'image',
        'stock',
        'idcategory',
        'status_product'
    ];

    protected $guarded = [];
}
