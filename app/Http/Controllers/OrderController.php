<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Processar um novo pedido
     */
    public function store(Request $request)
    {
        // Validar dados do formulário
        $validated = $request->validate([
            'email' => 'required|email',
            'nome' => 'required|string',
            'cep' => 'required|string',
            'endereco' => 'required|string',
            'complemento' => 'nullable|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'telefone' => 'required|string',
            'metodo_pagamento' => 'required|in:cartao,pix,boleto',
        ]);

        // Recuperar carrinho do request (enviado via JSON)
        $carrinho = $request->input('carrinho', []);

        if (empty($carrinho)) {
            return response()->json(['error' => 'Carrinho vazio'], 400);
        }

        try {
            DB::beginTransaction();

            // Criar novo pedido
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $this->calcularTotal($carrinho),
                'order_data' => json_encode([
                    'email' => $validated['email'],
                    'nome' => $validated['nome'],
                    'cep' => $validated['cep'],
                    'endereco' => $validated['endereco'],
                    'complemento' => $validated['complemento'],
                    'cidade' => $validated['cidade'],
                    'estado' => $validated['estado'],
                    'telefone' => $validated['telefone'],
                    'metodo_pagamento' => $validated['metodo_pagamento'],
                ]),
                'status' => 'pendente',
            ]);

            // Criar itens do pedido e reduzir estoque
            foreach ($carrinho as $item) {
                // Buscar o produto pelo nome (já que o carrinho não armazena product_id)
                $product = Product::where('name', $item['nome'] ?? '')->first();
                
                if ($product) {
                    // Verificar se há estoque suficiente
                    $quantidade = $item['quantidade'] ?? 1;
                    $tamanho = $item['tamanhos'] ?? null;
                    
                    // Decodificar tamanhos do produto
                    $sizes = json_decode($product->size, true) ?? [];
                    
                    // Verificar se o tamanho existe e tem estoque
                    if ($tamanho && isset($sizes[$tamanho])) {
                        if ($sizes[$tamanho] < $quantidade) {
                            throw new \Exception("Estoque insuficiente para o tamanho {$tamanho} do produto: {$product->name}");
                        }
                        
                        // Reduzir o estoque do tamanho específico
                        $sizes[$tamanho] -= $quantidade;
                        
                        // Se o estoque do tamanho ficar zerado, remover do array
                        if ($sizes[$tamanho] <= 0) {
                            unset($sizes[$tamanho]);
                        }
                    } else {
                        throw new \Exception("Tamanho {$tamanho} não disponível para o produto: {$product->name}");
                    }
                    
                    // Calcular novo estoque total
                    $estoqueTotal = array_sum($sizes);
                    
                    // Atualizar o produto com os novos tamanhos e estoque total
                    $product->size = json_encode($sizes);
                    $product->stock = $estoqueTotal;
                    $product->save();
                }

                // Criar item do pedido
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product ? $product->id : null,
                    'qty' => $item['quantidade'] ?? 1,
                    'price' => $item['preco'] ?? 0,
                ]);
            }

            // Atualizar status do pedido para 'pago' após sucesso
            $order->update(['status' => 'pago']);

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'message' => 'Pedido criado com sucesso!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao criar pedido: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Exibir todos os pedidos do usuário
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('client.usuario.orders.index', compact('orders'));
    }

    /**
     * Exibir detalhes de um pedido específico
     */
    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('client.usuario.orders.show', compact('order', 'orderItems'));
    }

    /**
     * Calcular total do carrinho
     */
    private function calcularTotal($carrinho)
    {
        return array_reduce($carrinho, function ($total, $item) {
            return $total + ($item['preco'] * $item['quantidade']);
        }, 0);
    }
}
