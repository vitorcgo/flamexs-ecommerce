<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Adicionado para DB::raw e agregação
use Carbon\Carbon; // Adicionado para manipulação de datas

class AdminDashboardController extends Controller
{
    /**
     * Exibir o dashboard do admin
     */
    public function index()
    {
        // Últimas 10 vendas com produtos relacionados (CÓDIGO EXISTENTE)
        $orders = Order::with('user', 'items.product')
            ->latest()
            ->take(10)
            ->get();

        $totalVendas = Order::sum('total_amount');
        $totalProdutos = Product::count();
        $totalCategorias = Category::count();
        $totalAdmins = Admin::count();
        
        // ------------------------------------------------------------------
        // >>> LÓGICA PARA O GRÁFICO: VENDAS DIÁRIAS MENSAIS <<<
        // ------------------------------------------------------------------
        
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        // 1. Agrega o valor total de pedidos pagos por dia
        $dailySales = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_amount) as total_value')
            )
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'pago') // Filtra apenas vendas concluídas
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $chartLabels = [];
        $chartData = [];

        $daysInMonth = Carbon::now()->daysInMonth;
        $salesMap = $dailySales->keyBy('date');
        $currentDate = Carbon::now()->startOfMonth();

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $dateKey = $currentDate->toDateString();
            $chartLabels[] = $currentDate->format('d/m'); 

            if ($salesMap->has($dateKey)) {
                $chartData[] = $salesMap[$dateKey]->total_value;
            } else {
                $chartData[] = 0; 
            }
            $currentDate->addDay();
        }
        
        
        return view('admin.dashboard.index', compact(
            'orders',
            'totalVendas',
            'totalProdutos',
            'totalCategorias',
            'totalAdmins',
            'chartLabels',
            'chartData'
        ));
    }

    /**
     * Exibir página de vendas com todos os pedidos (CÓDIGO EXISTENTE)
     */
    public function vendas()
    {
        // Buscar todos os pedidos com paginação
        $orders = Order::with(['user', 'items.product'])
            ->latest()
            ->paginate(10);

        return view('admin.vendas.index', compact('orders'));
    }

    public function getOrderDetails($id)
    {
        $order = Order::with('user', 'items.product')
            ->findOrFail($id);

        return response()->json($order);
    }
}