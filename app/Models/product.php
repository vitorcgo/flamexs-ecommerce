<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =[
        'name',
        'price',
        'status',
        'description',
        'stock',
        'details',
        'category',
        'color',
        'size'
    ];
}
