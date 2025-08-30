<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class address extends Model
{

    protected $fillable =[
        'user_id',
        'zip_code',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

