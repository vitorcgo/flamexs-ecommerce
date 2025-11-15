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
        // Últimas 10 vendas com produtos relacionados
        $orders = Order::with('user', 'items.product')
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

    /**
     * Retornar detalhes de um pedido em JSON (API)
     */
    public function getOrderDetails($id)
    {
        $order = Order::with('user', 'items.product')
            ->findOrFail($id);

        return response()->json($order);
    }
}
