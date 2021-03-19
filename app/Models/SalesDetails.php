<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    protected $table = 'sales_details';
    protected $primaryKey = 'idsales';
    public $timestamps = false;

    protected $fillable = [
        'idsale', 
        'idproduct',
        'amount'
    ];
}
