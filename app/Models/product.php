<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'status',
        'description',
        'stock',
        'details',
        'category',
        'size'
    ];

    // Relacionamento com categoria
    public function categoryModel()
    {
        return $this->belongsTo(Category::class, 'category', 'name_category');
    }

    // Relacionamento com imagens
    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    // Método para obter a primeira imagem ou imagem padrão
    public function getFirstImageAttribute()
    {
        // Primeiro, tentar obter da relação já carregada
        $firstMedia = $this->media->first();
        
        // Se não há relação carregada, fazer query
        if (!$firstMedia) {
            $firstMedia = $this->media()->first();
        }
        
        if ($firstMedia && $firstMedia->image_data) {
            return $firstMedia->image_data_url;
        }
        
        // Se não há imagens cadastradas, usar imagens numeradas baseadas no ID
        $imageNumber = (($this->id - 1) % 3) + 1;
        $possibleImages = [
            "/images/{$imageNumber}.png",
            "/images/{$imageNumber}.webp",
            "/images/{$imageNumber}.jpg"
        ];
        
        foreach ($possibleImages as $image) {
            if (file_exists(public_path($image))) {
                return $image;
            }
        }
        
        return '/images/produto-exemplo.jpg';
    }
}
