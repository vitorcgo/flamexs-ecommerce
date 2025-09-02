@extends('admin.layouts.main')
@section('title', 'Produtos - Painel de Controle')

@section('content')
<main class="cabecalho-conteudo">
    <h1 class="titulo-principal">Produtos</h1>
    
    <div class="barra-acoes">
        <div class="campo-busca">
            <svg class="icone-busca" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="entrada-busca" placeholder="Pesquisar produtos...">
        </div>
        
        <div class="botoes-acao">
            <button class="botao-filtros" onclick="abrirModalFiltros()">
                <svg class="icone-filtros" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="22,3 2,3 10,12.46 10,19 14,21 14,12.46"></polygon>
                </svg>
                Filtros
            </button>
            <a href="/admin/produtos/create" class="botao-adicionar">
                <svg class="icone-adicionar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Adicionar
            </a>
        </div>
    </div>
    
    <div class="container-produtos">
        <div class="grade-produtos">
            <div class="card-produto">
                <div class="id-produto">#001</div>
                <div class="container-imagem">
                    <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                </div>
                <div class="info-produto">
                    <div class="acoes-card">
                        <a href="/admin/produtos/show" class="acao-link">
                            <img src="/images/ver.svg" alt="Visualizar" class="icone-acao-card">
                        </a>
                        <a href="/admin/produtos/edit/1" class="acao-link">
                            <img src="/images/editar.svg" alt="Editar" class="icone-acao-card">
                        </a>
                        <button class="acao-link" onclick="confirmarExclusao()">
                            <img src="/images/deletar.svg" alt="Excluir" class="icone-acao-card">
                        </button>
                    </div>
                    <h3 class="nome-produto">Short Metallic Ultimate</h3>
                    <div class="precos">
                        <span class="preco-atual">R$150.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rodape-paginacao">
        <div class="dropdown-showing">
            <span>Mostrando</span>
            <select class="select-showing">
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>itens</span>
            <svg class="icone-dropdown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="6,9 12,15 18,9"></polyline>
            </svg>
        </div>
        
        <div class="controles-paginacao">
            <button class="botao-paginacao">
                <svg class="icone-seta" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15,18 9,12 15,6"></polyline>
                </svg>
            </button>
            <button class="numero-pagina ativo">1</button>
            <button class="numero-pagina">2</button>
            <button class="numero-pagina">3</button>
            <button class="numero-pagina">4</button>
            <button class="botao-paginacao">
                <svg class="icone-seta" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
            </button>
        </div>
    </div>

    <!-- Modal de Filtros -->
    <div class="modal-overlay-filtros" id="modalFiltros">
        <div class="modal-container-filtros">
            <div class="modal-header-filtros">
                <h2 class="modal-titulo-filtros">Filtros</h2>
                <button class="modal-fechar-filtros" onclick="fecharModalFiltros()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body-filtros">
                <div class="campo-pesquisa-modal">
                    <svg class="icone-pesquisa-modal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" class="input-pesquisa-modal" placeholder="Pesquisar...">
                </div>
                
                <div class="secao-filtro">
                    <h3 class="subtitulo-filtro">Categorias</h3>
                    <div class="grid-checkboxes">
                        <div class="coluna-checkboxes">
                            <label class="checkbox-filtro">
                                <input type="checkbox" name="categoria" value="camisetas">
                                <span class="checkmark"></span>
                                Camisetas
                            </label>
                            <label class="checkbox-filtro">
                                <input type="checkbox" name="categoria" value="shorts">
                                <span class="checkmark"></span>
                                Shorts
                            </label>
                            <label class="checkbox-filtro">
                                <input type="checkbox" name="categoria" value="calcas">
                                <span class="checkmark"></span>
                                Calças
                            </label>
                        </div>
                        <div class="coluna-checkboxes">
                            <label class="checkbox-filtro">
                                <input type="checkbox" name="categoria" value="bones">
                                <span class="checkmark"></span>
                                Bonés
                            </label>
                            <label class="checkbox-filtro">
                                <input type="checkbox" name="categoria" value="meias">
                                <span class="checkmark"></span>
                                Meias
                            </label>
                            <label class="checkbox-filtro">
                                <input type="checkbox" name="categoria" value="acessorios">
                                <span class="checkmark"></span>
                                Acessórios
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="secao-filtro">
                    <h3 class="subtitulo-filtro">Status</h3>
                    <div class="radio-group">
                        <label class="radio-filtro">
                            <input type="radio" name="status" value="todos" checked>
                            <span class="radiomark"></span>
                            Todos
                        </label>
                        <label class="radio-filtro">
                            <input type="radio" name="status" value="ativo">
                            <span class="radiomark"></span>
                            Ativo
                        </label>
                        <label class="radio-filtro">
                            <input type="radio" name="status" value="inativo">
                            <span class="radiomark"></span>
                            Inativo
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer-filtros">
                <button type="button" class="botao-resetar-filtros" onclick="resetarFiltros()">
                    Resetar
                </button>
                <button type="button" class="botao-aplicar-filtros" onclick="aplicarFiltros()">
                    Aplicar Filtros
                </button>
            </div>
        </div>
    </div>
</main>

<script>
function abrirModalFiltros() {
    document.getElementById('modalFiltros').classList.add('ativo');
    document.body.style.overflow = 'hidden';
}

function fecharModalFiltros() {
    document.getElementById('modalFiltros').classList.remove('ativo');
    document.body.style.overflow = '';
}

function resetarFiltros() {
    const checkboxes = document.querySelectorAll('#modalFiltros input[type="checkbox"]');
    const radios = document.querySelectorAll('#modalFiltros input[type="radio"]');
    const pesquisa = document.querySelector('.input-pesquisa-modal');
    
    checkboxes.forEach(checkbox => checkbox.checked = false);
    radios.forEach(radio => radio.checked = radio.value === 'todos');
    pesquisa.value = '';
}

function aplicarFiltros() {
    const categorias = [];
    const checkboxes = document.querySelectorAll('#modalFiltros input[name="categoria"]:checked');
    checkboxes.forEach(checkbox => categorias.push(checkbox.value));
    
    const status = document.querySelector('#modalFiltros input[name="status"]:checked').value;
    const pesquisa = document.querySelector('.input-pesquisa-modal').value;
    
    console.log('Filtros aplicados:', {
        categorias: categorias,
        status: status,
        pesquisa: pesquisa
    });
    
    fecharModalFiltros();
}

function confirmarExclusao() {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        console.log('Produto excluído');
    }
}

// Fechar modal ao clicar no overlay
document.getElementById('modalFiltros').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharModalFiltros();
    }
});

// Fechar modal com ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        fecharModalFiltros();
    }
});
</script>

<script src="/js/admin/produtos.js"></script>
@endsection