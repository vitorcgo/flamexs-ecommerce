<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('media')->get();
        return view('admin.produtos.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('ativo', true)->get();
        return view('admin.produtos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome-produto' => 'required|string|max:255',
            'categorias' => 'required|string',
            'valor' => 'required|string',
            'descricao' => 'required|string',
            'status' => 'required|string',
            'estoque_p' => 'nullable|integer|min:0',
            'estoque_m' => 'nullable|integer|min:0',
            'estoque_g' => 'nullable|integer|min:0',
            'estoque_gg' => 'nullable|integer|min:0',
            'imagens-produto.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        // Converter valor de string para decimal
        $valor = str_replace(['R$', ' ', '.'], '', $request->input('valor'));
        $valor = str_replace(',', '.', $valor);

        // Criar array de tamanhos com estoque
        $sizes = [];
        if ($request->input('estoque_p', 0) > 0) $sizes['P'] = $request->input('estoque_p');
        if ($request->input('estoque_m', 0) > 0) $sizes['M'] = $request->input('estoque_m');
        if ($request->input('estoque_g', 0) > 0) $sizes['G'] = $request->input('estoque_g');
        if ($request->input('estoque_gg', 0) > 0) $sizes['GG'] = $request->input('estoque_gg');

        // Calcular estoque total baseado nos tamanhos
        $estoqueTotal = array_sum($sizes);

        $product = Product::create([
            'name' => $request->input('nome-produto'),
            'category' => $request->input('categorias'),
            'price' => (float) $valor,
            'stock' => $estoqueTotal, // Estoque total calculado
            'description' => $request->input('descricao'),
            'status' => $request->input('status') === 'em-estoque' ? 'available' : 'unavailable',
            'size' => json_encode($sizes), // Armazenar tamanhos como JSON
        ]);

        // Processar upload de imagens
        if ($request->hasFile('imagens-produto')) {
            foreach ($request->file('imagens-produto') as $image) {
                // Converter imagem para base64
                $imageData = base64_encode(file_get_contents($image->getRealPath()));
                
                ProductMedia::create([
                    'product_id' => $product->id,
                    'image_data' => $imageData,
                    'mime_type' => $image->getMimeType(),
                    'original_name' => $image->getClientOriginalName(),
                    'file_size' => $image->getSize()
                ]);
            }
        }

        return redirect()->route('admin.produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $sizes = json_decode($product->size, true) ?? [];
        return view('admin.produtos.show', compact('product', 'sizes'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('ativo', true)->get();
        $sizes = json_decode($product->size, true) ?? [];
        return view('admin.produtos.edit', compact('product', 'categories', 'sizes'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nome-produto' => 'required|string|max:255',
            'categorias' => 'required|string',
            'valor' => 'required|string',
            'descricao' => 'required|string',
            'status' => 'required|string',
            'estoque_p' => 'nullable|integer|min:0',
            'estoque_m' => 'nullable|integer|min:0',
            'estoque_g' => 'nullable|integer|min:0',
            'estoque_gg' => 'nullable|integer|min:0',
            'imagens-produto.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        // Converter valor de string para decimal
        $valor = str_replace(['R$', ' ', '.'], '', $request->input('valor'));
        $valor = str_replace(',', '.', $valor);

        // Criar array de tamanhos com estoque
        $sizes = [];
        if ($request->input('estoque_p', 0) > 0) $sizes['P'] = $request->input('estoque_p');
        if ($request->input('estoque_m', 0) > 0) $sizes['M'] = $request->input('estoque_m');
        if ($request->input('estoque_g', 0) > 0) $sizes['G'] = $request->input('estoque_g');
        if ($request->input('estoque_gg', 0) > 0) $sizes['GG'] = $request->input('estoque_gg');

        // Calcular estoque total baseado nos tamanhos
        $estoqueTotal = array_sum($sizes);

        $product->update([
            'name' => $request->input('nome-produto'),
            'category' => $request->input('categorias'),
            'price' => (float) $valor,
            'stock' => $estoqueTotal, // Estoque total calculado
            'description' => $request->input('descricao'),
            'status' => $request->input('status') === 'em-estoque' ? 'available' : 'unavailable',
            'size' => json_encode($sizes),
        ]);

        // Processar upload de novas imagens
        if ($request->hasFile('imagens-produto')) {
            foreach ($request->file('imagens-produto') as $image) {
                // Converter imagem para base64
                $imageData = base64_encode(file_get_contents($image->getRealPath()));
                
                ProductMedia::create([
                    'product_id' => $product->id,
                    'image_data' => $imageData,
                    'mime_type' => $image->getMimeType(),
                    'original_name' => $image->getClientOriginalName(),
                    'file_size' => $image->getSize()
                ]);
            }
        }

        return redirect()->route('admin.produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $productName = $product->name; // Capturar nome antes de deletar
            
            // Remover imagens associadas (agora apenas do banco)
            $mediaCount = $product->media()->count();
            if ($mediaCount > 0) {
                $product->media()->delete();
            }
            
            $product->delete();

            return redirect()->route('admin.produtos.index')->with('success', "Produto '{$productName}' excluído com sucesso!");
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.produtos.index')->with('error', 'Produto não encontrado.');
        } catch (\Exception $e) {
            return redirect()->route('admin.produtos.index')->with('error', 'Erro ao excluir produto: ' . $e->getMessage());
        }
    }

    public function destroyMedia($id)
    {
        $media = ProductMedia::findOrFail($id);
        
        // Remover registro do banco (imagem está armazenada no banco)
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Imagem removida com sucesso!']);
    }
}