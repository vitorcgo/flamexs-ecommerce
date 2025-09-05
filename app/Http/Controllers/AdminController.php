<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // READ (Listar todos)
    public function index()
    {
        return view('admin.administradores.index', ['allAdmins' => Admin::all()]);
    }

    // CREATE (Exibir formulário)
    public function create()
    {
        return view('admin.administradores.create');
    }

    // CREATE (Salvar novo registro)
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'user' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        $data = $request->except(['profile_photo_path']);

        if ($request->hasFile('profile_photo_path')) {
            $photoPath = $request->file('profile_photo_path')->store('profile_photos', 'public');
            $data['profile_photo_path'] = $photoPath;
        } else {
            $data['profile_photo_path'] = null;
        }

        $data['password'] = bcrypt($request->password);
        Admin::create($data);

        return redirect('/admin/administradores')->with('success', 'Administrador criado com sucesso!');
    }

    // UPDATE (Exibir formulário de edição)
    public function edit(Admin $admin)
    {
        return view('admin.administradores.edit', ['admin' => $admin]);
    }

    // UPDATE (Salvar alterações)
    public function update(Request $request, Admin $admin)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'user' => 'required|string|max:255|unique:admins,user,' . $admin->id,
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_photo_path')) {
            if ($admin->profile_photo_path) {
                Storage::disk('public')->delete($admin->profile_photo_path);
            }
            $photoPath = $request->file('profile_photo_path')->store('profile_photos', 'public');
            $validatedData['profile_photo_path'] = $photoPath;
        }

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        $admin->update($validatedData);

        return redirect('/admin/administradores')->with('success', 'Administrador atualizado com sucesso!');
    }

    // Deletar um administrador
    public function destroy(Admin $admin)
    {
        if ($admin->profile_photo_path) {
            Storage::disk('public')->delete($admin->profile_photo_path);
        }

        $admin->delete();

        return redirect('/admin/administradores')->with('success', 'Administrador deletado com sucesso!');
    }

    // Alternar status do administrador
    public function toggleStatus(Admin $admin)
    {
        $admin->status = ($admin->status === 'active') ? 'inactive' : 'active';
        $admin->save();

        return back()->with('success', 'Status do administrador atualizado!');
    }
}