<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Pega o usuário que está logado
        $user = Auth::user();

        // Valida os dados que vieram do formulário
        $validatedData = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:255'],
            'cpf'   => ['required', 'string', 'max:14', Rule::unique('users')->ignore($user->id)],
        ]);

        // Atualiza o usuário com os dados validados
        $user->update($validatedData);

        // Redireciona de volta para a página de perfil com uma mensagem de sucesso
        return redirect('/user')->with('status', 'Perfil atualizado com sucesso!');
    }
}