<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $fillable =[
        'user_id',
        'zip_code',
        'number',
        'complement',
        'neighborhood',
        'city'
    ];
}
