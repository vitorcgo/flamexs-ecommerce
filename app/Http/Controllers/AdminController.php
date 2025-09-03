<?php

namespace App\Http\Controllers;
use App\Models\admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        return view('admin.administradores.index' , ['allAdministrador'=>admin::all ()]);
    }

    public function create(){
        return view('admin.administradores.create');
    }
/*
    public function store (Request $request){
        admin::create($request->all());
        return redirect('/admin/administradores');

    }
 */
    public function destroy (admin $admin) {
        $admin ->delete();
        return redirect('/admin/administradores');

    }

    public function edit(admin $admin) {
        return view('admin.administradores.edit', ['admin' => $admin]);
    }

    public function update(admin $admin, Request $request) {
        $admin->update($request->all());
        return redirect('/admin/administradores');
    }


    // Alterna o status (ativo/inativo) de um administrador.

    public function toggleStatus(Admin $admin)
    {
        // Verifica o status atual e o inverte
        if ($admin->status === 'active') {
            $admin->status = 'inactive';
        } else {
            $admin->status = 'active';
        }
        // Salva a alteração no banco de dados
        $admin->save();
        // Redireciona o usuário de volta para a página anterior
        return back()->with('success', 'Status do administrador atualizado com sucesso!');
    }

    public function store(Request $request)
    {
        // 1. Validação dos dados, incluindo a foto
        $request->validate([
            'user' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        // 2. Prepara um array com os dados da requisição
        $data = $request->except(['profile_photo_path']);

        // 3. Verifica se um arquivo de foto foi enviado no formulário
        if ($request->hasFile('profile_photo_path')) {
            // Salva o arquivo no disco 'public' e armazena o caminho
            $photoPath = $request->file('profile_photo_path')->store('profile_photos', 'public');

            // Adiciona o caminho da foto ao array de dados que será salvo
            $data['profile_photo_path'] = $photoPath;
        } else {
            // Se nenhuma foto for enviada, garante que o campo seja nulo
            $data['profile_photo_path'] = null;
        }

        // 4. Criptografa a senha antes de salvar
        $data['password'] = bcrypt($request->password);

        // 5. Cria o novo registro no banco de dados
        Admin::create($data);

        return redirect('/admin/administradores')->with('success', 'Administrador criado com sucesso!');
    }
}
