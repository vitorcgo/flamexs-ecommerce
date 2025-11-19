<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Exibir lista de usuários
     */
    public function index()
    {
        $users = User::with('address', 'orders')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Exibir detalhes de um usuário específico
     */
    public function show($id)
    {
        $user = User::with('address', 'orders')->findOrFail($id);
        
        // Calcular total gasto pelo usuário
        $totalGasto = $user->orders()->sum('total_amount');
        
        return response()->json([
            'user' => $user,
            'totalGasto' => $totalGasto,
            'ordersCount' => $user->orders()->count(),
            'orders' => $user->orders()->orderBy('created_at', 'desc')->get()
        ]);
    }
}
