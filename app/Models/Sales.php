<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'idsales';
    public $timestamps = false;

    protected $fillable = [
        'idsales', 
        'iva',
        'total',
        'date',
        'username'
    ];
}
