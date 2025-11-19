<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        
        // Buscar categorias ativas
        $categories = Category::where('ativo', true)->get();
            
        return view('client.home.index', compact('products', 'categories'));
    }

    public function index(Request $request)
    {
        $query = Product::with('media')
            ->where('status', 'available')
            ->where('stock', '>', 0);
        
        // Filtrar por categoria se fornecida
        if ($request->has('categoria') && $request->categoria) {
            $query->where('category', $request->categoria);
        }
        
        $products = $query->get();
        
        // Buscar categorias ativas para o filtro
        $categories = Category::where('ativo', true)->get();
        $categoriaAtiva = $request->categoria ?? null;
            
        return view('client.produtos.index', compact('products', 'categories', 'categoriaAtiva'));
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