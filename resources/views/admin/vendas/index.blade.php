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
                <tr>
                    <td colspan="9" style="text-align: center; padding: 40px; color: #666;">
                        Nenhuma venda encontrada
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
                <h2 class="modal-titulo-venda">Detalhes da Venda</h2>
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
                            <span class="valor-info">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">ID da Compra:</span>
                            <span class="valor-info">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Cliente:</span>
                            <span class="valor-info">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Data:</span>
                            <span class="valor-info">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Hora:</span>
                            <span class="valor-info">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Tipo de Pagamento:</span>
                            <span class="valor-info">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Status:</span>
                            <span class="badge-status">-</span>
                        </div>
                        <div class="campo-info">
                            <span class="label-info">Valor Total:</span>
                            <span class="valor-info valor-destaque">R$ 0,00</span>
                        </div>
                    </div>
                </div>

                <!-- Produtos da Venda -->
                <div class="secao-produtos-venda">
                    <h3 class="subtitulo-modal">Produtos</h3>
                    <div class="lista-produtos-venda">
                        <div class="sem-produtos-venda">
                            <p>Nenhum produto encontrado nesta venda</p>
                        </div>
                    </div>
                    <div class="total-produtos">
                        <span class="label-total">Total dos Produtos:</span>
                        <span class="valor-total">R$ 0,00</span>
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