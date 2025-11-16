<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Redireciona o usuário para a página de autenticação do Google.
     */
    public function redirectToGoogle()
    {
        // Esta linha envia o usuário para a tela de login do Google
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtém as informações do usuário do Google e faz o login.
     */
    public function handleGoogleCallback()
    {
        try {
            // 1. Pega os dados do usuário que o Google retornou
            $googleUser = Socialite::driver('google')->user();

            // 2. Procura no banco de dados se esse usuário (pelo email) já existe
            $user = User::where('email', $googleUser->email)->first();

            // 3. Verifica se o usuário existe
            if ($user) {
                // Se o usuário JÁ EXISTE, apenas faz o login dele
                Auth::login($user);
            } else {
                // Se o usuário NÃO EXISTE, cria um novo
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make(Str::random(24)) // Cria uma senha aleatória segura
                    // Adicione outros campos, se necessário (ex: 'google_id' => $googleUser->id)
                ]);

                // Faz o login do usuário recém-criado
                Auth::login($newUser);
            }

            // 4. Redireciona o usuário para a página principal do site
            return redirect()->intended('/'); // ou '/dashboard'

        } catch (\Exception $e) {
            // Em caso de erro, redireciona de volta para o login
            // (Idealmente, você deve registrar esse erro $e)
            return redirect('/login')->with('error', 'Algo deu errado durante a autenticação.');
        }
    }
}
