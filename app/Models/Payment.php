<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable =[
        'order_id',
        'payment_method',
        'status',
        'total_value',
        'paid_at',
        'payment_data'
    ];

    public function order(): BelongsTo{
        return $this->belongsTo(order::class);
    }

}
