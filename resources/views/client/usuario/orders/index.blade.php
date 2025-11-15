@extends('client.layouts.main')
@section('title', 'Meus Pedidos - Flamexs')

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
        <h1>Meus Pedidos</h1>

        @if($orders->count() > 0)
            <div class="tabela-pedidos">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>ID do Pedido</th>
                            <th>Data</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>R$ {{ number_format($order->total_amount, 2, ',', '.') }}</td>
                                <td>
                                    <span class="badge badge-{{ $order->status }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('user.orders.show', $order->id) }}" class="btn-detalhes">
                                        Ver Detalhes
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="paginacao">
                {{ $orders->links() }}
            </div>
        @else
            <div class="mensagem-vazia">
                <p>Você ainda não fez nenhum pedido.</p>
                <a href="{{ route('client.produtos.index') }}" class="btn-primario">
                    Começar a Comprar
                </a>
            </div>
        @endif
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

    .conteudo-perfil h1 {
        margin-bottom: 2rem;
        font-size: 1.8rem;
    }

    .tabela-pedidos {
        overflow-x: auto;
        margin-bottom: 2rem;
    }

    .tabela {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .tabela thead {
        background: #f8f9fa;
    }

    .tabela th,
    .tabela td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .tabela tbody tr:hover {
        background: #f8f9fa;
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

    .btn-detalhes {
        padding: 0.5rem 1rem;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background 0.3s;
    }

    .btn-detalhes:hover {
        background: #0056b3;
    }

    .mensagem-vazia {
        text-align: center;
        padding: 3rem;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .mensagem-vazia p {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 1.5rem;
    }

    .btn-primario {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background 0.3s;
    }

    .btn-primario:hover {
        background: #0056b3;
    }

    .paginacao {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 2rem;
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

        .tabela {
            font-size: 0.9rem;
        }

        .tabela th,
        .tabela td {
            padding: 0.5rem;
        }
    }
</style>

@endsection
