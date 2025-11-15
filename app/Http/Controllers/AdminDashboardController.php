<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Exibir o dashboard do admin
     */
    public function index()
    {
        // Últimas 10 vendas
        $orders = Order::with('user', 'items')
            ->latest()
            ->take(10)
            ->get();

        // Estatísticas
        $totalVendas = Order::sum('total_amount');
        $totalProdutos = Product::count();
        $totalCategorias = Category::count();
        $totalAdmins = Admin::count();

        return view('admin.dashboard.index', compact(
            'orders',
            'totalVendas',
            'totalProdutos',
            'totalCategorias',
            'totalAdmins'
        ));
    }
}
