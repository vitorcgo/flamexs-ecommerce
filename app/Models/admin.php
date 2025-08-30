<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable =[
        'user',
        'password',
        'status',
        'last_login_at',
        'profile_photo_path'
    ];
}
