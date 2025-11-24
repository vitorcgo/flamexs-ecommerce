@extends('admin.layouts.main')
@section('title', 'Vendas - Painel de Controle')

@section('content')
    <main class="painel-vendas">
        <div class="cabecalho-vendas">
            <h1 class="titulo-vendas">Usuarios</h1>
        </div>

        <div class="container-pesquisa">
            <div class="campo-pesquisa">
                <svg class="icone-pesquisa" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" class="input-pesquisa" placeholder="Pesquisar usuarios...">
            </div>
        </div>

        <div class="container-tabela-vendas">
            <table class="tabela-vendas-admin">
                <thead>
                    <tr>
                        <th>ID do Usuario</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Estado</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="linha-venda" data-delay="0" data-user-id="{{ $user->id }}">
                            <td class="celula-id">#{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $user->full_name ?? 'N/A' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->cpf ?? 'N/A' }}</td>
                            <td>{{ $user->address->state ?? 'N/A' }}</td>
                            <td>{{ $user->phone ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 20px; color: #999;">
                                Nenhum usuário cadastrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="rodape-paginacao-vendas">
            <div class="dropdown-itens">
                <span>Mostrando</span>
                <select class="select-itens">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>itens</span>
            </div>

            <div class="controles-paginacao-vendas">
                <button class="botao-paginacao-vendas">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15,18 9,12 15,6"></polyline>
                    </svg>
                </button>
                <button class="numero-pagina-vendas ativo">1</button>
                <button class="numero-pagina-vendas">2</button>
                <button class="numero-pagina-vendas">3</button>
                <button class="numero-pagina-vendas">4</button>
                <button class="botao-paginacao-vendas">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9,18 15,12 9,6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </main>

    <script>
        function abrirModalVenda(userId) {
            // Buscar dados do usuário via API
            fetch(`/admin/users/${userId}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Dados recebidos:', data); // DEBUG

                    const user = data.user;
                    const totalGasto = data.totalGasto;
                    const orders = data.orders;
                    const endereco = user.address || data.address || null;

                    console.log('Endereço encontrado:', endereco); // DEBUG

                    // Atualizar modal com dados do usuário
                    document.querySelector('.valor-info:nth-of-type(1)').textContent = `#${String(user.id).padStart(3, '0')}`;
                    document.querySelector('.valor-info:nth-of-type(2)').textContent = user.full_name || 'N/A';
                    document.querySelector('.valor-info:nth-of-type(3)').textContent = user.email;
                    document.querySelector('.valor-info:nth-of-type(4)').textContent = user.cpf || 'N/A';
                    document.querySelector('.valor-info:nth-of-type(5)').textContent = endereco?.city || 'N/A';
                    document.querySelector('.valor-info:nth-of-type(6)').textContent = user.phone || 'N/A';
                    document.querySelector('.badge-status').textContent = endereco?.state 'N/A';
                    document.querySelector('.valor-info:nth-of-type(8)').textContent =`R$ ${totalGasto.toFixed(2).replace('.', ',')}`;

                    // Atualizar lista de compras
                    const listaCompras = document.querySelector('.lista-produtos-venda');
                    listaCompras.innerHTML = '';

                    if (orders.length > 0) {
                        orders.forEach(order => {
                            const dataFormatada = new Date(order.created_at).toLocaleDateString('pt-BR');
                            const html = `
                                <div class="item-produto-venda">
                                    <div class="info-produto-venda">
                                        <span class="nome-produto-venda">Pedido #${String(order.id).padStart(3, '0')}</span>
                                        <span class="valor-produto-venda">Data: ${dataFormatada} - Total: R$ ${order.total_amount.toFixed(2).replace('.', ',')}</span>
                                    </div>
                                </div>
                            `;
                            listaCompras.innerHTML += html;
                        });
                    } else {
                        listaCompras.innerHTML = `
                            <div class="item-produto-venda">
                                <div class="info-produto-venda">
                                    <span class="nome-produto-venda">Nenhuma compra</span>
                                    <span class="valor-produto-venda">Este usuário ainda não realizou nenhuma compra</span>
                                </div>
                            </div>
                        `;
                    }

                    // Abrir modal
                    const modal = document.getElementById('modalVisualizarVenda');
                    modal.classList.add('ativo');
                    document.body.style.overflow = 'hidden';
                })
                .catch(error => {
                    console.error('Erro ao buscar dados do usuário:', error);
                    alert('Erro ao carregar dados do usuário');
                });
        }

        function fecharModalVenda() {
            const modal = document.getElementById('modalVisualizarVenda');
            modal.classList.remove('ativo');
            document.body.style.overflow = '';
        }

        // Fechar modal ao clicar no overlay
        document.getElementById('modalVisualizarVenda').addEventListener('click', function (e) {
            if (e.target === this) {
                fecharModalVenda();
            }
        });

        // Fechar modal com ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                fecharModalVenda();
            }
        });
    </script>

    <script src="/js/admin/vendas.js"></script>
@endsection