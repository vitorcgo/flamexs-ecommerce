@extends('admin.layouts.main')
@section('title', 'Categorias - Painel de Controle')

@section('content')
<main class="painel-categorias">
    <div class="cabecalho-categorias">
        <h1 class="titulo-categorias">Categorias</h1>
    </div>

    <div class="container-pesquisa-categorias">
        <div class="campo-pesquisa-categorias">
            <svg class="icone-pesquisa-categorias" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="input-pesquisa-categorias" placeholder="Pesquisar categorias...">
        </div>
    </div>

    <div class="container-acoes-categorias">
        <div class="botoes-acoes-categorias">
            <button class="botao-adicionar-categorias" onclick="abrirModal()">
                <svg class="icone-adicionar-categorias" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Adicionar
            </button>
        </div>
    </div>

    <div class="container-lista-categorias">
        <table class="tabela-categorias-admin">
            <thead>
                <tr>
                    <th class="coluna-id">ID</th>
                    <th class="coluna-arrastar">Arrastar</th>
                    <th class="coluna-nome">Nome</th>
                    <th class="coluna-ativo">Ativo</th>
                    <th class="coluna-funcoes">Funções</th>
                </tr>
            </thead>
            <tbody id="lista-categorias">
                <tr class="linha-categoria" data-delay="0" draggable="true">
                    <td class="celula-id">#001</td>
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td>
                        <span class="nome-categoria">Camisetas</span>
                    </td>
                    <td class="celula-ativo">
                        <div class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </div>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar" onclick="abrirModalEdicao()">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="m18.5 2.5 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="m19,6v14a2,2 0 0,1-2,2H7a2,2 0 0,1-2-2V6m3,0V4a2,2 0 0,1,2-2h4a2,2 0 0,1,2,2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="rodape-paginacao-categorias">
        <div class="info-resultados">
            Mostrando 1 de 1 resultados
        </div>
        
        <div class="controles-paginacao-categorias">
            <div class="dropdown-itens-categorias">
                <select class="select-itens-categorias">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            
            <div class="navegacao-paginas">
                <button class="botao-paginacao-categorias">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15,18 9,12 15,6"></polyline>
                    </svg>
                </button>
                <button class="numero-pagina-categorias ativo">1</button>
                <button class="numero-pagina-categorias">2</button>
                <button class="numero-pagina-categorias">3</button>
                <button class="numero-pagina-categorias">4</button>
                <button class="botao-paginacao-categorias">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9,18 15,12 9,6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Categoria -->
    <div class="modal-overlay" id="modalCategoria">
        <div class="modal-container">
            <div class="modal-header">
                <h2 class="modal-titulo" id="modalTitulo">Adicionar Categoria</h2>
                <button class="modal-fechar" onclick="fecharModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <form class="form-categoria" id="formCategoria">
                    <input type="hidden" id="categoriaId" name="id">
                    
                    <div class="campo-grupo">
                        <label class="campo-label" for="nomeCategoria">Nome da Categoria</label>
                        <input 
                            type="text" 
                            class="campo-input" 
                            id="nomeCategoria" 
                            name="nome" 
                            placeholder="Digite o nome da categoria"
                            required
                        >
                    </div>
                    
                    <div class="campo-grupo">
                        <label class="campo-label">Status</label>
                        <div class="campo-switch">
                            <div class="switch-modal" id="switchAtivo">
                                <input type="checkbox" id="categoriaAtiva" name="ativo" checked>
                                <span class="slider-modal"></span>
                            </div>
                            <span>Categoria ativa</span>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="botao-cancelar" onclick="fecharModal()">
                    Cancelar
                </button>
                <button type="submit" class="botao-adicionar" form="formCategoria" id="botaoSubmit">
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</main>

<script>
function abrirModal() {
    document.getElementById('modalTitulo').textContent = 'Adicionar Categoria';
    document.getElementById('botaoSubmit').textContent = 'Adicionar';
    document.getElementById('formCategoria').reset();
    document.getElementById('categoriaId').value = '';
    document.getElementById('modalCategoria').classList.add('ativo');
    document.body.style.overflow = 'hidden';
}

function abrirModalEdicao() {
    document.getElementById('modalTitulo').textContent = 'Editar Categoria';
    document.getElementById('botaoSubmit').textContent = 'Salvar';
    document.getElementById('categoriaId').value = '1';
    document.getElementById('nomeCategoria').value = 'Camisetas';
    document.getElementById('categoriaAtiva').checked = true;
    document.getElementById('modalCategoria').classList.add('ativo');
    document.body.style.overflow = 'hidden';
}

function fecharModal() {
    document.getElementById('modalCategoria').classList.remove('ativo');
    document.body.style.overflow = '';
}

// Fechar modal ao clicar no overlay
document.getElementById('modalCategoria').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharModal();
    }
});

// Fechar modal com ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        fecharModal();
    }
});

// Switch toggle
document.getElementById('switchAtivo').addEventListener('click', function() {
    const checkbox = document.getElementById('categoriaAtiva');
    checkbox.checked = !checkbox.checked;
    this.classList.toggle('ativo', checkbox.checked);
});

// Form submit
document.getElementById('formCategoria').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const isEdit = document.getElementById('categoriaId').value !== '';
    
    console.log('Dados da categoria:', {
        id: formData.get('id'),
        nome: formData.get('nome'),
        ativo: formData.get('ativo') ? true : false,
        acao: isEdit ? 'editar' : 'adicionar'
    });
    
    const botaoSubmit = document.getElementById('botaoSubmit');
    const textoOriginal = botaoSubmit.textContent;
    botaoSubmit.textContent = isEdit ? 'Salvando...' : 'Adicionando...';
    botaoSubmit.disabled = true;
    
    setTimeout(() => {
        alert(`Categoria ${isEdit ? 'editada' : 'adicionada'} com sucesso!`);
        fecharModal();
        botaoSubmit.textContent = textoOriginal;
        botaoSubmit.disabled = false;
    }, 2000);
});
</script>

<script src="/js/admin/categorias.js"></script>
@endsection