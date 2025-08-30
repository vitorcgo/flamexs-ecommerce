<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable =[
        'card_id',
        'product_id',
        'qty'
    ];
}
