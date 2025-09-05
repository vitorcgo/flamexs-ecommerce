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
            <input type="text" class="input-pesquisa" placeholder="Pesquisar vendas...">
        </div>
    </div>

    <div class="container-tabela-vendas">
        <table class="tabela-vendas-admin">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID da Compra</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <tr class="linha-venda" data-delay="0">
                    <td class="celula-id">#001</td>
                    <td>#9102344</td>
                    <td>
                        <div class="info-cliente">
                            <div class="avatar-cliente">G</div>
                            <span>Guilherme Navarro</span>
                        </div>
                    </td>
                    <td>Dez 25, 2024</td>
                    <td>04:00 PM</td>
                    <td>R$400.00</td>
                    <td>PIX</td>
                    <td>
                        <span class="badge-status pago">Pago</span>
                    </td>
                    <td>
                        <button class="botao-visualizar" onclick="abrirModalVenda()">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </td>
                </tr>
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

    <!-- Modal Visualizar Venda -->
    <div class="modal-overlay-venda" id="modalVisualizarVenda">
        <div class="modal-container-venda">
            <div class="modal-header-venda">
                <h2 class="modal-titulo-venda">Detalhes da Venda #9102344</h2>
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
                            <span class="valor-info">#001</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">ID da Compra:</span>
                            <span class="valor-info">#9102344</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Cliente:</span>
                            <span class="valor-info">Guilherme Navarro</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Data:</span>
                            <span class="valor-info">Dez 25, 2024</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Hora:</span>
                            <span class="valor-info">04:00 PM</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Tipo de Pagamento:</span>
                            <span class="valor-info">PIX</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Status:</span>
                            <span class="badge-status pago">Pago</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Valor Total:</span>
                            <span class="valor-info valor-destaque">R$400.00</span>
                        </div>
                    </div>
                </div>

                <!-- Produtos da Venda -->
                <div class="secao-produtos-venda">
                    <h3 class="subtitulo-modal">Produtos</h3>
                    <div class="lista-produtos-venda">
                        <div class="item-produto-venda">
                            <div class="info-produto-venda">
                                <span class="nome-produto-venda">Short Metallic Ultimate</span>
                                <span class="valor-produto-venda">R$150.00</span>
                            </div>
                        </div>
                        <div class="item-produto-venda">
                            <div class="info-produto-venda">
                                <span class="nome-produto-venda">Camiseta Premium Cotton</span>
                                <span class="valor-produto-venda">R$120.00</span>
                            </div>
                        </div>
                        <div class="item-produto-venda">
                            <div class="info-produto-venda">
                                <span class="nome-produto-venda">Boné Snapback Classic</span>
                                <span class="valor-produto-venda">R$80.00</span>
                            </div>
                        </div>
                        <div class="item-produto-venda">
                            <div class="info-produto-venda">
                                <span class="nome-produto-venda">Meia Esportiva Pro</span>
                                <span class="valor-produto-venda">R$50.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="total-produtos">
                        <span class="label-total">Total dos Produtos:</span>
                        <span class="valor-total">R$400.00</span>
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
function abrirModalVenda() {
    const modal = document.getElementById('modalVisualizarVenda');
    modal.classList.add('ativo');
    document.body.style.overflow = 'hidden';
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
</script>

<script src="/js/admin/vendas.js"></script>
@endsection