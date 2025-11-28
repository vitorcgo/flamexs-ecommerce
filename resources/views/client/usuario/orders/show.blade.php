@extends('client.layouts.main')
@section('title', 'Detalhes do Pedido - Flamexs')

@section('content')
<link rel="stylesheet" href="{{ asset('css/perfil-usuario.css') }}">

<div class="container-perfil">
    <div class="sidebar-perfil">
        <div class="menu-perfil">
            <a href="{{ route('user.index') }}" class="item-menu">Meu Perfil</a>
            <a href="{{ route('user.orders.index') }}" class="item-menu ativo">Meus Pedidos</a>
            <a href="{{ route('user.info.edit') }}" class="item-menu">Editar Informações</a>
            <a href="{{ route('user.address.edit') }}" class="item-menu">Endereços</a>
            <a href="{{ route('user.password.edit') }}" class="item-menu">Alterar Senha</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="item-menu logout">Sair</button>
            </form>
        </div>
    </div>

    <div class="conteudo-perfil">
        <div class="header-pedido">
            <h1>Pedido #{{ $order->id }}</h1>
            <a href="{{ route('user.orders.index') }}" class="btn-voltar">← Voltar</a>
        </div>

        <div class="info-pedido">
            <div class="secao-info">
                <h3>Informações do Pedido</h3>
                <div class="info-item">
                    <span class="label">Data:</span>
                    <span class="valor">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Status:</span>
                    <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Total:</span>
                    <span class="valor">R$ {{ number_format($order->total_amount, 2, ',', '.') }}</span>
                </div>
            </div>

            <div class="secao-info">
                <h3>Dados de Entrega</h3>
                @php
                    $orderData = json_decode($order->order_data, true);
                @endphp
                <div class="info-item">
                    <span class="label">Nome:</span>
                    <span class="valor">{{ $orderData['nome'] ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Email:</span>
                    <span class="valor">{{ $orderData['email'] ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Telefone:</span>
                    <span class="valor">{{ $orderData['telefone'] ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Endereço:</span>
                    <span class="valor">
                        <br>
                        {{ $orderData['endereco'] ?? 'N/A' }}, 
                        {{ $orderData['complemento'] ?? '' }}
                        {{ $orderData['cidade'] ?? 'N/A' }} - 
                        {{ $orderData['estado'] ?? 'N/A' }}, 
                        {{ $orderData['cep'] ?? 'N/A' }}
                    </span>
                </div>
                <div class="info-item">
                    <span class="label">Método de Pagamento:</span>
                    <span class="valor">{{ ucfirst($orderData['metodo_pagamento'] ?? 'N/A') }}</span>
                </div>
            </div>
        </div>

        <div class="itens-pedido">
            <h3>Itens do Pedido</h3>
            <table class="tabela-itens">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orderItems as $item)
                        <tr>
                            <td>
                                @if($item->product)
                                    {{ $item->product->name }}
                                @else
                                    <em>Produto removido do catálogo</em>
                                @endif
                            </td>
                            <td>{{ $item->qty }}</td>
                            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($item->price * $item->qty, 2, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 2rem;">
                                Nenhum item neste pedido
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="resumo-total">
                <div class="linha-total">
                    <span class="label">Total:</span>
                    <span class="valor">R$ {{ number_format($order->total_amount, 2, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container-perfil {
        display: flex;
        gap: 2rem;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .sidebar-perfil {
        flex: 0 0 250px;
    }

    .menu-perfil {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .item-menu {
        padding: 0.75rem 1rem;
        background: #f5f5f5;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        color: #333;
        transition: all 0.3s;
    }

    .item-menu:hover,
    .item-menu.ativo {
        background: #007bff;
        color: white;
    }

    .item-menu.logout {
        background: #dc3545;
        color: white;
    }

    .conteudo-perfil {
        flex: 1;
    }

    .header-pedido {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .header-pedido h1 {
        font-size: 1.8rem;
    }

    .btn-voltar {
        padding: 0.5rem 1rem;
        background: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background 0.3s;
    }

    .btn-voltar:hover {
        background: #5a6268;
    }

    .info-pedido {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .secao-info {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 8px;
    }

    .secao-info h3 {
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-item .label {
        font-weight: 600;
        color: #666;
    }

    .info-item .valor {
        color: #333;
    }

    .badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .badge-pendente {
        background: #fff3cd;
        color: #856404;
    }

    .badge-processando {
        background: #cfe2ff;
        color: #084298;
    }

    .badge-enviado {
        background: #d1e7dd;
        color: #0f5132;
    }

    .badge-entregue {
        background: #d1e7dd;
        color: #0f5132;
    }

    .badge-cancelado {
        background: #f8d7da;
        color: #842029;
    }

    .itens-pedido {
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .itens-pedido h3 {
        margin-bottom: 1rem;
    }

    .tabela-itens {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
    }

    .tabela-itens thead {
        background: #f8f9fa;
    }

    .tabela-itens th,
    .tabela-itens td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .tabela-itens tbody tr:hover {
        background: #f8f9fa;
    }

    .resumo-total {
        text-align: right;
        padding-top: 1rem;
        border-top: 2px solid #dee2e6;
    }

    .linha-total {
        display: flex;
        justify-content: flex-end;
        gap: 2rem;
        font-size: 1.2rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .container-perfil {
            flex-direction: column;
        }

        .sidebar-perfil {
            flex: 1;
        }

        .menu-perfil {
            flex-direction: row;
            flex-wrap: wrap;
        }

        .item-menu {
            flex: 1;
            min-width: 150px;
        }

        .header-pedido {
            flex-direction: column;
            gap: 1rem;
        }

        .info-pedido {
            grid-template-columns: 1fr;
        }

        .tabela-itens {
            font-size: 0.9rem;
        }

        .tabela-itens th,
        .tabela-itens td {
            padding: 0.5rem;
        }
    }
</style>

@endsection
