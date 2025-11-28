@extends('client.layouts.main')
@section('title', 'Meus Pedidos - Flamexs')

@section('content')
<link rel="stylesheet" href="{{ asset('css/perfil-usuario.css') }}">

<div class="container-perfil">
    <aside class="sidebar-perfil">
        <nav class="menu-perfil">
            <a href="{{ route('user.index') }}" class="item-menu">Meu Perfil</a>
            <a href="{{ route('user.orders.index') }}" class="item-menu ativo">Meus Pedidos</a>
            <a href="{{ route('user.info.edit') }}" class="item-menu">Editar Informações</a>
            <a href="{{ route('user.address.edit') }}" class="item-menu">Endereços</a>
            <a href="{{ route('user.password.edit') }}" class="item-menu">Alterar Senha</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="item-menu logout">Sair</button>
            </form>
        </nav>
    </aside>

    <section class="conteudo-perfil">
        <h1 class="titulo-pagina">Meus Pedidos</h1>

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
                                    <span class="badge-status status-{{ $order->status }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('user.orders.show', $order->id) }}" class="botao-acompanhar">
                                        VER DETALHES
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="paginacao">
                {{ $orders->links('pagination::simple-default') }}
            </div>
        @else
            <div class="mensagem-vazia">
                <p>Você ainda não fez nenhum pedido.</p>
                <a href="{{ route('client.produtos.index') }}" class="botaoPreto">
                    VOLTAR ÀS COMPRAS
                </a>
            </div>
        @endif
    </section>
</div>

<style>
    /* Estrutura geral alinhada ao layout do site */
    .container-perfil {
        display: flex;
        gap: 32px;
        padding: 32px 16px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .sidebar-perfil { flex: 0 0 260px; }
    .menu-perfil { display: flex; flex-direction: column; gap: 8px; }

    .item-menu {
        padding: 12px 14px;
        background: #f3f3f3;
        border-radius: 6px;
        color: #111;
        text-decoration: none;
        transition: transform .2s ease, background .2s ease;
        display: block;
    }
    .item-menu:hover { background: #e8e8e8; transform: translateY(-1px); }
    .item-menu.ativo { background: #111; color: #fff; }
    .item-menu.logout { background: #c0392b; color: #fff; }

    .conteudo-perfil { flex: 1; }
    .titulo-pagina { font-size: 28px; margin: 0 0 24px; letter-spacing: .5px; }

    .tabela-pedidos { overflow-x: auto; margin-bottom: 24px; }
    .tabela { width: 100%; border-collapse: collapse; background: #fff; }
    .tabela thead { background: #fafafa; }
    .tabela th, .tabela td { padding: 14px 12px; text-align: left; border-bottom: 1px solid #eee; }
    .tabela tbody tr:hover { background: #fafafa; }

    /* Badges custom do site (sem Bootstrap) */
    .badge-status { padding: 4px 10px; border-radius: 999px; font-size: 13px; font-weight: 600; display: inline-block; }
    .status-pendente { background: #fff4cc; color: #805800; }
    .status-processando { background: #e6f0ff; color: #0a3d91; }
    .status-enviado { background: #d7f5e8; color: #0b5d3b; }
    .status-entregue { background: #d7f5e8; color: #0b5d3b; }
    .status-cancelado { background: #ffe1e1; color: #8a1f1f; }

    /* Botões padrão do site */
    .botao-acompanhar { display: inline-block; padding: 10px 14px; background: #111; color: #fff; border-radius: 6px; text-decoration: none; letter-spacing: .5px; }
    .botao-acompanhar:hover { opacity: .9; }

    .mensagem-vazia { text-align: center; padding: 40px; background: #fafafa; border-radius: 8px; }

    .paginacao { display: flex; justify-content: center; margin-top: 16px; }

    @media (max-width: 768px) {
        .container-perfil { flex-direction: column; }
        .menu-perfil { flex-direction: row; flex-wrap: wrap; }
        .item-menu { flex: 1; min-width: 150px; text-align: center; }
        .tabela th, .tabela td { padding: 10px; }
    }
</style>

@endsection
