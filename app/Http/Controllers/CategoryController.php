<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.categorias.index', ['allCategory' => Category::all()]);
    }

    public function store(Request $request){
        // Debug para ver o que está sendo enviado
        Log::info('Store request data: ' . json_encode($request->all()));
        Log::info('Foi ativo na Sotre: ' . ($request->has('ativo') ? 'true' : 'false'));

        $data = $request->all();

        // Processar o campo ativo corretamente
        // Se o checkbox não foi marcado, o campo 'ativo' não vem na requisição
        $data['ativo'] = $request->has('ativo') ? true : false;

        Log::info('Data to save: ' . json_encode($data));

        Category::create($data);
        return redirect('/admin/categorias')->with('success', 'Categoria criada com sucesso!');
    }

    public function updateStatus(Request $request, $id){
        try {
            $category = Category::findOrFail($id);

            // Usamos para caso tenha algum bug, o log nos ira retornar o bug, temos que usar esse que ir para essa pasta para saber o log (storage/logs/laravel.log)
            Log::info('Request data: ' . json_encode($request->all()));
            Log::info('Has ativo: ' . ($request->has('ativo') ? 'true' : 'false'));
            Log::info('Category before - ID: ' . $category->id . ', Ativo: ' . ($category->ativo ? 'true' : 'false'));

            // Inverter o status atual (toggle)
            $category->ativo = !$category->ativo;
            $category->save();

            Log::info('Category after - ID: ' . $category->id . ', Ativo: ' . ($category->ativo ? 'true' : 'false'));

            return redirect('/admin/categorias')->with('success', 'Status da categoria atualizado com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error updating category status: ' . $e->getMessage());
            return redirect('/admin/categorias')->with('error', 'Erro ao atualizar status da categoria: ' . $e->getMessage());
        }
    }
    //Function criada para procurar os dados com o id e caso nao encontre ela ira retorna um erro com o findOrFail
    public function edit($id) {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    //Criando uma function que atualiza os dados da categoria no banco de dados
    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $validadeData = $request->validate([
            'name_category' => 'required|string|max:255|unique:categories,name_category,' . $category->id, 'ativo'=> 'nullable'
        ]);

        $dataToUpdate = ['name_category' => $validadeData['name_category'],'ativo'=> $request->has('ativo')];
        
        $category->update($dataToUpdate);
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }
    //Funcao criada para poder remover a categoria do banco de dados
    public function destroy($id) {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.categorias.index')->with('success', 'Categoria excluída com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return redirect()->route('admin.categorias.index')->with('error', 'Erro ao excluir categoria: ' . $e->getMessage());
        }
    }
}
