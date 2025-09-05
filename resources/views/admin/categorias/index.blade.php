@extends('admin.layouts.main')
@section('title', 'Categorias - Painel de Controle')

@section('content')

    @if (session('success'))
        <div class="alert alert-success"
            style="background-color: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error"
            style="background-color: #f8d7da; color: #721c24; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #f5c6cb;">
            {{ session('error') }}
        </div>
    @endif

    <main class="painel-categorias">
        <div class="cabecalho-categorias">
            <h1 class="titulo-categorias">Categorias</h1>
        </div>

        <div class="container-pesquisa-categorias">
            <div class="campo-pesquisa-categorias">
                <svg class="icone-pesquisa-categorias" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" class="input-pesquisa-categorias" placeholder="Pesquisar categorias...">
            </div>
        </div>

        <div class="container-acoes-categorias">
            <div class="botoes-acoes-categorias">
                <button class="botao-adicionar-categorias" onclick="abrirModal()">
                    <svg class="icone-adicionar-categorias" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
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
                    @forelse ($allCategory as $category)
                        <tr class="linha-categoria" data-delay="0" draggable="true">
                            <td class="celula-id">#{{ $category->id }}</td>
                            <td class="celula-arrastar">
                                <div class="icone-arrastar">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </div>
                            </td>
                            <td>
                                <span class="nome-categoria">{{ $category->name_category }}</span>
                            </td>
                            <td class="celula-ativo">
                                <form action="/admin/categorias/{{ $category->id }}/status" method="POST"
                                    class="form-status-categoria">
                                    @csrf
                                    <div class="switch-categoria {{ $category->ativo ? 'ativo' : '' }}"
                                        onclick="this.closest('form').submit()">
                                        <span class="slider-categoria"></span>
                                    </div>
                                </form>
                            </td>
                            <td class="celula-funcoes">
                                <div class="botoes-funcoes-categoria">
                                    <button class="botao-funcao-categoria editar" title="Editar"
                                        onclick="abrirModalEdicao({{ $category->id }})">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="m18.5 2.5 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.categorias.destroy', $category->id) }}"
                                        onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="botao-funcao-categoria excluir" title="Excluir">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path
                                                    d="m19,6v14a2,2 0 0,1-2,2H7a2,2 0 0,1-2-2V6m3,0V4a2,2 0 0,1,2-2h4a2,2 0 0,1,2,2v2">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: #666;">
                                Nenhuma categoria encontrada
                            </td>
                        </tr>
                    @endforelse
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
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="15,18 9,12 15,6"></polyline>
                        </svg>
                    </button>
                    <button class="numero-pagina-categorias ativo">1</button>
                    <button class="numero-pagina-categorias">2</button>
                    <button class="numero-pagina-categorias">3</button>
                    <button class="numero-pagina-categorias">4</button>
                    <button class="botao-paginacao-categorias">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-categoria" id="formCategoria" method="POST" action="/admin/categorias">
                        @csrf
                        <div id="methodField"></div>
                        <input type="hidden" id="categoriaId" name="id">
                        <div class="campo-grupo">
                            <label class="campo-label" for="nomeCategoria">Nome da Categoria</label>
                            <input type="text" class="campo-input" id="nomeCategoria" name="name_category"
                                placeholder="Digite o nome da categoria" required>

                            @error('name_category')
                                <div style="color: #e3342f; font-size: 0.875rem; margin-top: 0.25rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="campo-grupo">
                            <label class="campo-label">Status</label>
                            <div class="campo-switch">
                                <div class="switch-modal ativo" id="switchAtivo">
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

            // Configurar formulário para criação (POST)
            const form = document.getElementById('formCategoria');
            form.action = '/admin/categorias';
            document.getElementById('methodField').innerHTML = '';

            // Resetar o switch para ativo (padrão)
            const switchAtivo = document.getElementById('switchAtivo');
            const checkbox = document.getElementById('categoriaAtiva');
            checkbox.checked = true;
            switchAtivo.classList.add('ativo');

            document.getElementById('modalCategoria').classList.add('ativo');
            document.body.style.overflow = 'hidden';
        }
        // Funcao para mudar todos os dados quando nos clicamos no botao de mudar a categoria
        function abrirModalEdicao(categoryId) {
            document.getElementById('modalTitulo').textContent = 'Editar Categoria';
            document.getElementById('botaoSubmit').textContent = 'Salvar Alterações';

            fetch(`/admin/categorias/${categoryId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nomeCategoria').value = data.name_category;
                    document.getElementById('categoriaAtiva').checked = data.ativo;

                    // Configurar formulário para edição (PUT)
                    const form = document.getElementById('formCategoria');
                    form.action = `/admin/categorias/${data.id}`;
                    document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';

                    // Atualizar o switch visual
                    const switchAtivo = document.getElementById('switchAtivo');
                    switchAtivo.classList.toggle('ativo', data.ativo);

                    document.getElementById('modalCategoria').classList.add('ativo');
                    document.body.style.overflow = 'hidden';
                })
                .catch(error => console.error('Erro ao buscar categoria:', error));
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
    </script>

    <script src="/js/admin/categorias.js"></script>
@endsection
