@extends('admin.layouts.main')
@section('title', 'Vendas - Painel de Controle')

@section('content')
<main class="painel-vendas">
    <div class="cabecalho-vendas">
        <h1 class="titulo-vendas">Vendas</h1>
    </div>

    <div class="container-pesquisa">
        <div class="campo-pesquisa">
            <svg class="icone-pesquisa" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="input-pesquisa" placeholder="Pesquisar vendas..." id="pesquisaVendas">
        </div>
    </div>

    <div class="container-tabela-vendas">
        <table class="tabela-vendas-admin">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Data</th>
                    <th>Qtd. Produtos</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="linha-venda" data-delay="{{ $loop->index * 100 }}">
                        <td class="celula-id">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div class="info-cliente">
                                <span>{{ $order->user->full_name ?? 'S/N' }}</span>
                            </div>
                        </td>
                        <td>{{ $order->user->email ?? 'N/A' }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ $order->items->count() }}</td>
                        <td>R$ {{ number_format($order->total_amount, 2, ',', '.') }}</td>
                        <td>
                            <span class="badge-status pago">Pago</span>
                        </td>
                        <td>
                            <button class="botao-visualizar" onclick="abrirModalVenda({{ $order->id }})">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 40px; color: #999;">
                            Nenhum pedido encontrado
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="rodape-paginacao-vendas">
        <div class="dropdown-itens">
            <span>Mostrando</span>
            <span style="font-weight: 600;">{{ $orders->count() }}</span>
            <span>de</span>
            <span style="font-weight: 600;">{{ $orders->total() }}</span>
            <span>itens</span>
        </div>
        
        <div class="controles-paginacao-vendas">
            {{ $orders->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Modal Visualizar Venda -->
    <div class="modal-overlay-venda" id="modalVisualizarVenda">
        <div class="modal-container-venda">
            <div class="modal-header-venda">
                <h2 class="modal-titulo-venda" id="modalTitulo">Detalhes da Venda</h2>
                <button class="modal-fechar-venda" onclick="fecharModalVenda()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body-venda">
                <!-- Informações da Venda -->
                <div class="secao-info-venda">
                    <h3 class="subtitulo-modal">Informações da Venda</h3>
                    <div class="grid-info-venda">
                        <div class="campo-info">
                            <span class="label-info">ID:</span>
                            <span class="valor-info" id="modalId"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Cliente:</span>
                            <span class="valor-info" id="modalCliente"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Email:</span>
                            <span class="valor-info" id="modalEmail"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Telefone:</span>
                            <span class="valor-info" id="modalTelefone"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">CPF:</span>
                            <span class="valor-info" id="modalCpf"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Data:</span>
                            <span class="valor-info" id="modalData"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Qtd. Produtos:</span>
                            <span class="valor-info" id="modalQtdProdutos"></span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Status:</span>
                            <span class="badge-status pago" id="modalStatus">Pago</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Valor Total:</span>
                            <span class="valor-info valor-destaque" id="modalValorTotal"></span>
                        </div>
                    </div>

                    <!-- Endereço de Entrega -->
                    <div class="campo-endereco-venda">
                        <span class="label-info">Endereço de Entrega:</span>
                        <span class="valor-info" id="modalEndereco"></span>
                    </div>
                </div>

                <!-- Produtos da Venda -->
                <div class="secao-produtos-venda">
                    <h3 class="subtitulo-modal">Produtos</h3>
                    <div class="lista-produtos-venda" id="listaProdutos">
                        <!-- Preenchido dinamicamente -->
                    </div>
                    <div class="total-produtos">
                        <span class="label-total">Total dos Produtos:</span>
                        <span class="valor-total" id="modalTotalProdutos"></span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer-venda">
                <button type="button" class="botao-fechar-modal" onclick="fecharModalVenda()">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</main>

<script>
function abrirModalVenda(orderId) {
    // Buscar dados do pedido via API
    fetch(`/admin/api/orders/${orderId}`)
        .then(response => response.json())
        .then(order => {
            // Preencher informações da venda
            document.getElementById('modalTitulo').textContent = `Detalhes da Venda #${String(order.id).padStart(4, '0')}`;
            document.getElementById('modalId').textContent = `#${String(order.id).padStart(4, '0')}`;
            document.getElementById('modalCliente').textContent = order.user?.full_name || 'Usuário Deletado';
            document.getElementById('modalEmail').textContent = order.user?.email || 'N/A';
            document.getElementById('modalTelefone').textContent = order.user?.phone || 'N/A';
            document.getElementById('modalCpf').textContent = order.user?.cpf || 'Não informado';
            document.getElementById('modalData').textContent = new Date(order.created_at).toLocaleDateString('pt-BR');
            document.getElementById('modalQtdProdutos').textContent = order.items?.length || 0;
            document.getElementById('modalValorTotal').textContent = `R$ ${parseFloat(order.total_amount).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            document.getElementById('modalTotalProdutos').textContent = `R$ ${parseFloat(order.total_amount).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

            // Preencher endereço de entrega
            const endereco = order.user?.address;
            if (endereco) {
                const enderecoCompleto = `${endereco.street}, ${endereco.city} - ${endereco.state}, ${endereco.zip_code}`;
                document.getElementById('modalEndereco').textContent = enderecoCompleto;
            } else {
                document.getElementById('modalEndereco').textContent = 'Endereço não informado';
            }

            // Preencher lista de produtos
            const listaProdutos = document.getElementById('listaProdutos');
            listaProdutos.innerHTML = '';

            if (order.items && order.items.length > 0) {
                order.items.forEach(item => {
                    const subtotal = (item.qty * item.price).toFixed(2);
                    const produtoHTML = `
                        <div class="item-produto-venda">
                            <div class="info-produto-venda">
                                <div style="flex: 1;">
                                    <span class="nome-produto-venda">${item.product?.name || 'Produto Deletado'}</span>
                                    <div style="font-size: 12px; color: #666; margin-top: 4px;">
                                        Qtd: <strong>${item.qty}</strong> | Preço Unit.: <strong>R$ ${parseFloat(item.price).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong>
                                    </div>
                                </div>
                                <span class="valor-produto-venda">R$ ${parseFloat(subtotal).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</span>
                            </div>
                        </div>
                    `;
                    listaProdutos.innerHTML += produtoHTML;
                });
            } else {
                listaProdutos.innerHTML = '<p style="text-align: center; color: #999;">Nenhum produto neste pedido</p>';
            }

            // Abrir modal
            const modal = document.getElementById('modalVisualizarVenda');
            modal.classList.add('ativo');
            document.body.style.overflow = 'hidden';
        })
        .catch(error => {
            console.error('Erro ao buscar detalhes do pedido:', error);
            alert('Erro ao carregar detalhes do pedido');
        });
}

function fecharModalVenda() {
    const modal = document.getElementById('modalVisualizarVenda');
    modal.classList.remove('ativo');
    document.body.style.overflow = '';
}

// Fechar modal ao clicar no overlay
document.getElementById('modalVisualizarVenda').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharModalVenda();
    }
});

// Fechar modal com ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        fecharModalVenda();
    }
});

// Pesquisa em tempo real
document.getElementById('pesquisaVendas').addEventListener('keyup', function(e) {
    const termo = e.target.value.toLowerCase();
    const linhas = document.querySelectorAll('.linha-venda');
    
    linhas.forEach(linha => {
        const texto = linha.textContent.toLowerCase();
        if (texto.includes(termo)) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
});
</script>

<style>
    /* Ajuste para paginação */
    .rodape-paginacao-vendas .pagination {
        margin: 0;
        gap: 8px;
    }

    .rodape-paginacao-vendas .page-link {
        border-radius: 8px;
        border: 1px solid #E0E0E0;
        color: #666666;
        padding: 8px 12px;
        font-family: 'Lexend', sans-serif;
        transition: all 0.3s ease;
    }

    .rodape-paginacao-vendas .page-link:hover {
        background-color: #F5F5F5;
        border-color: #FF0000;
        color: #FF0000;
    }

    .rodape-paginacao-vendas .page-item.active .page-link {
        background-color: #FF0000;
        border-color: #FF0000;
        color: white;
    }

    .rodape-paginacao-vendas .page-item.disabled .page-link {
        color: #ccc;
        cursor: not-allowed;
    }
</style>

@endsection
