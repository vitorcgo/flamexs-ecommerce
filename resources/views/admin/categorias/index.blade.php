{{-- Categorias Admin - Flamexs E-commerce --}}
@extends('admin.layouts.main')
@section('title', 'Categorias - Painel de Controle')

@section('content')
<main class="painel-categorias">
    {{-- Título da Página --}}
    <div class="cabecalho-categorias">
        <h1 class="titulo-categorias">Categorias</h1>
    </div>

    {{-- Barra de Pesquisa --}}
    <div class="container-pesquisa-categorias">
        <div class="campo-pesquisa-categorias">
            <svg class="icone-pesquisa-categorias" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="input-pesquisa-categorias" placeholder="Pesquisar">
        </div>
    </div>

    {{-- Botões de Ações --}}
    <div class="container-acoes-categorias">
        <div class="botoes-acoes-categorias">
            <button class="botao-adicionar-categorias">
                <svg class="icone-adicionar-categorias" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Adicionar categoria
            </button>
        </div>
    </div>

    {{-- Lista de Categorias --}}
    <div class="container-lista-categorias">
        <table class="tabela-categorias-admin">
            <thead>
                <tr>
                    <th class="coluna-arrastar"></th>
                    <th class="coluna-nome">Nome da Categoria</th>
                    <th class="coluna-ativo">Ativo</th>
                    <th class="coluna-funcoes">Funções</th>
                </tr>
            </thead>
            <tbody class="lista-arrastavel">
                <tr class="linha-categoria" data-delay="0" data-id="1" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Camisetas</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(1, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="100" data-id="2" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Regatas</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria">
                            <input type="checkbox">
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(2, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="200" data-id="3" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Blusas de Frio</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(3, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="300" data-id="4" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Jaqueta</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(4, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="400" data-id="5" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Bonés</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(5, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="500" data-id="6" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Calça Jeans</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria">
                            <input type="checkbox">
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(6, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="600" data-id="7" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">M</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(7, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="700" data-id="8" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">Shorts</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(8, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="800" data-id="9" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">P</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria">
                            <input type="checkbox">
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(9, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="linha-categoria" data-delay="900" data-id="10" draggable="true">
                    <td class="celula-arrastar">
                        <div class="icone-arrastar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </td>
                    <td class="nome-categoria">G</td>
                    <td class="celula-ativo">
                        <label class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </label>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(10, 'categoria')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Paginação --}}
    <div class="rodape-paginacao-categorias">
        <div class="info-resultados">
            <span>Mostrando 1 de 12 entre 50 resultados</span>
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

    {{-- Modal Adicionar Categoria --}}
    <div class="modal-overlay" id="modalAdicionarCategoria">
        <div class="modal-container">
            <div class="modal-header">
                <h2 class="modal-titulo">Adicionar Categoria</h2>
                <button class="modal-fechar" id="fecharModal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            
            <div class="modal-body">
                <form class="form-categoria" id="formAdicionarCategoria">
                    <div class="campo-grupo">
                        <label class="campo-label" for="nomeCategoria">Nome da Categoria</label>
                        <input 
                            type="text" 
                            class="campo-input" 
                            id="nomeCategoria" 
                            name="nome" 
                            placeholder="Camisetas"
                            required
                        >
                    </div>
                    
                    <div class="campo-grupo">
                        <label class="campo-label">Ativo</label>
                        <div class="campo-switch">
                            <label class="switch-modal ativo">
                                <input type="checkbox" name="ativo" checked>
                                <span class="slider-modal"></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="botao-cancelar" id="cancelarModal">
                    Cancelar
                </button>
                <button type="submit" class="botao-adicionar" form="formAdicionarCategoria">
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</main>

{{-- Scripts --}}
<script src="/js/admin/categorias.js"></script>
@endsection