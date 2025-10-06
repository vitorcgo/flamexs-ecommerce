<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'zip_code' => ['required', 'string', 'max:9'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer'],
            'complement' => ['nullable', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ]);

        // Esta é a mágica: ele procura um endereço para o usuário.
        // Se encontrar, atualiza. Se não, cria um novo.
        auth()->user()->address()->updateOrCreate(
            ['user_id' => auth()->id()], // Condição para encontrar
            $validatedData // Dados para atualizar ou criar
        );

        return redirect('/user')->with('status', 'Endereço atualizado com sucesso!');
    }
}