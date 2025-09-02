<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{

        // READ (Listar todos os administradores)
    public function index()
    {
        // Busca todos os registros na tabela 'admins'
        $allAdmins = Admin::all();

        // Retorna a view 'admin.administradores.index' e passa a variável com os dados
        return view('admin.administradores.index', compact('allAdmins'));
    }


    public function create(){
        return view('admin.administradores.create');
    }

    public function store(Request $request){

        //Validando os dados
        $request->validate([
            'user' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        //Para salvar a foto, se existir
        $photoPath = null;
        if ($request->hasFile('profile_photo_path')) {
            $photoPath = $request->file('profile_photo_path')->store('profile_photos', 'public');
        }
        //Cria um novo registro no banco de dados
        Admin::create([
            'user' => $request->user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_photo_path' => $photoPath,
            'status' => 'active',
        ]);

        return redirect('/admin/administradores')->with('success', 'Administrador criado com sucesso!');
    }

    // UPDATE (Parte 1: Exibir o formulário de edição)
    // O Laravel automaticamente injeta o objeto Admin com base no ID da URL.
    public function edit(Admin $admin)
    {
        return view('admin.administradores.edit', compact('admin'));
    }

    // UPDATE (Parte 2: Salvar as alterações no banco)
    public function update(Request $request, Admin $admin)
    {
        // 1. Validação dos dados
        $request->validate([
            'user' => 'required|string|max:255|unique:admins,user,' . $admin->id,
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        // 2. Coletar os dados da requisição
        $data = $request->all();

        // 3. Gerenciar o upload da foto, se houver
        if ($request->hasFile('profile_photo_path')) {
            // Salva a nova foto e atualiza o caminho
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('profile_photos', 'public');
        }

        // 4. Criptografar a nova senha, se for informada
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            // Se a senha não foi informada, remove do array para não alterar a atual
            unset($data['password']);
        }

        // 5. Atualiza o registro no banco de dados
        $admin->update($data);

        // 6. Redireciona para a lista de administradores
        return redirect('/admin/administradores')->with('success', 'Administrador atualizado com sucesso!');
    }

        // DELETE (Deletar um administrador)
    // O Laravel usa Route Model Binding para encontrar o administrador automaticamente.
    public function destroy(Admin $admin)
    {
        // Deleta o registro do banco de dados
        $admin->delete();

        // Redireciona para a página de listagem com uma mensagem de sucesso
        return redirect('/admin/administradores')->with('success', 'Administrador deletado com sucesso!');
    }
}
