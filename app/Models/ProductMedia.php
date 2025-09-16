<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMedia extends Model
{
    protected $fillable = [
        'product_id',
        'image_data',
        'mime_type',
        'original_name',
        'file_size'
    ];
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Método para obter a imagem como data URL
    public function getImageDataUrlAttribute()
    {
        if ($this->image_data && $this->mime_type) {
            return 'data:' . $this->mime_type . ';base64,' . $this->image_data;
        }
        return null;
    }

    // Método para obter o tamanho formatado
    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return '0 B';
        
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
