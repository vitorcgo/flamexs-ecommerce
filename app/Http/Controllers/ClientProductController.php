<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ClientProductController extends Controller
{
    public function home()
    {
        // Buscar apenas 12 produtos para a página inicial (3 linhas x 4 produtos)
        $products = Product::with('media')
            ->where('status', 'available')
            ->where('stock', '>', 0)
            ->limit(12)
            ->get();
            
        return view('client.home.index', compact('products'));
    }

    public function index()
    {
        $products = Product::with('media')
            ->where('status', 'available')
            ->where('stock', '>', 0)
            ->get();
            
        return view('client.produtos.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('media')->findOrFail($id);
        
        // Verificar se o produto está disponível
        if ($product->status !== 'available' || $product->stock <= 0) {
            abort(404, 'Produto não disponível');
        }
        
        // Decodificar tamanhos
        $sizes = json_decode($product->size, true) ?? [];
        
        return view('client.produtos.show', compact('product', 'sizes'));
    }
}