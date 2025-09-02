@extends('admin.layouts.main')
@section('title', 'Administradores - Painel de Controle')

@section('content')
<main class="painel-administradores">
    <div class="cabecalho-administradores">
        <h1 class="titulo-administradores">Administradores</h1>
    </div>

    <div class="container-pesquisa-admin">
        <div class="campo-pesquisa-admin">
            <svg class="icone-pesquisa-admin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="input-pesquisa-admin" placeholder="Pesquisar administradores...">
        </div>
    </div>

    <div class="container-acoes-gerais">
        <div class="botoes-acoes-gerais">
            <a href="/admin/administradores/create" class="botao-adicionar-admin">
                <svg class="icone-adicionar-admin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Adicionar
            </a>
        </div>
    </div>

    <div class="container-tabela-administradores">
        <table class="tabela-administradores">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="checkbox-selecionar-todos">
                    </th>
                    <th>ID</th>
                    <th>Administrador</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Ativo</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <tr class="linha-administrador" data-delay="0">
                    <td>
                        <input type="checkbox" class="checkbox-linha">
                    </td>
                    <td class="celula-id">#001</td>
                    <td>
                        <div class="info-administrador">
                            <div class="avatar-administrador">A</div>
                            <span class="nome-administrador">Admin Principal</span>
                        </div>
                    </td>
                    <td class="celula-email">admin@exemplo.com</td>
                    <td class="celula-senha">••••••••</td>
                    <td class="celula-ativo">
                        <div class="switch-categoria ativo">
                            <input type="checkbox" checked>
                            <span class="slider-categoria"></span>
                        </div>
                    </td>
                    <td class="celula-funcoes">
                        <div class="botoes-funcoes-categoria">
                            <button class="botao-funcao-categoria editar" title="Editar" onclick="window.location.href='/admin/administradores/edit/1'">
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

    <div class="rodape-paginacao-administradores">
        <div class="dropdown-itens-admin">
            <span>Mostrando</span>
            <select class="select-itens-admin">
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>itens</span>
        </div>
        
        <div class="controles-paginacao-administradores">
            <button class="botao-paginacao-administradores">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15,18 9,12 15,6"></polyline>
                </svg>
            </button>
            <button class="numero-pagina-administradores ativo">1</button>
            <button class="numero-pagina-administradores">2</button>
            <button class="numero-pagina-administradores">3</button>
            <button class="numero-pagina-administradores">4</button>
            <button class="botao-paginacao-administradores">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
            </button>
        </div>
    </div>
</main>

<script src="/js/admin/administradores.js"></script>
@endsection