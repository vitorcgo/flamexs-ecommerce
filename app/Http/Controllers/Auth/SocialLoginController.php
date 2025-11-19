<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Envia o usuário para o Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Recebe o usuário de volta do Google.
     */
    public function handleGoogleCallback()
    {
        try {
            // 1. Pega os dados do usuário no Google
            $googleUser = Socialite::driver('google')->user();

            // 2. Verifica se já existe um usuário com esse email
            $user = User::where('email', $googleUser->email)->first();

            // 3. Se existir, faz login
            if ($user) {
                Auth::login($user);
            } else {
                // 4. Se não existir, CRIA um novo usuário
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    // Cria uma senha aleatória segura, já que ele vai logar pelo Google
                    'password' => Hash::make(Str::random(24)),
                    // 'google_id' => $googleUser->id, // (Opcional: se você tiver essa coluna no banco)
                ]);

                Auth::login($newUser);
            }

            // 5. Redireciona para a página inicial (ou dashboard)
            return redirect()->intended('/');

        } catch (\Exception $e) {
            // Se der erro, volta para o login (idealmente logar o erro $e)
            return redirect('/login')->with('error', 'Erro ao entrar com Google. Tente novamente.');
        }
    }
}