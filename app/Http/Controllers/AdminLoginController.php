<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Exibe o formulário de login do admin.
     */
    public function showLoginForm()
    {
        // Retorna a sua view de login do admin
        return view('admin.login.store');
    }

    /**
     * Processa a tentativa de login do admin.
     */
    public function login(Request $request)
    {
        // 1. Validar os dados do formulário
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Adicionar a verificação de status "active"
        // Esta é a sua regra de negócio!
        $credentials['status'] = 'active';

        // 3. Tentar fazer o login usando o guarda "admin"
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {

            // Sucesso! Regenera a sessão para segurança
            $request->session()->regenerate();

            // Redireciona para o dashboard do admin
            return redirect()->route('admin.dashboard');
        }

        // 4. Falha no login
        // Volta para a página anterior (o formulário de login)
        // e envia uma mensagem de erro.
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registos ou a conta está inativa.',
        ])->onlyInput('email');
    }

    /**
     * Processa o logout do admin.
     */
    public function logout(Request $request)
    {
        // Faz o logout usando o guarda "admin"
        Auth::guard('admin')->logout();

        // Invalida a sessão
        $request->session()->invalidate();

        // Cria um novo token de sessão (segurança)
        $request->session()->regenerateToken();

       // Redireciona para a página de login do admin
        return redirect('/admin');
    }
}
