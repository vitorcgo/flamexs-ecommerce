@extends('admin.layouts.main')
@section('title', 'Dashboard - Painel de Controle')

@section('content')
<main class="painel-principal">
    <!-- Seção de Boas-vindas -->
    <section class="secao-boas-vindas">
        <div class="conteudo-boas-vindas">
            <div class="texto-boas-vindas">
                <h1 class="titulo-boas-vindas">Bem vindo, Vitor</h1>
                <p class="subtitulo-boas-vindas">Cuide do seu site comigo!</p>
            </div>
            <div class="acoes-boas-vindas">
                <div class="container-dropdown">
                    <select class="dropdown-mes">
                        <option>Mês atual</option>
                        <option>Janeiro</option>
                        <option>Fevereiro</option>
                        <option>Março</option>
                        <option>Abril</option>
                        <option>Maio</option>
                        <option>Junho</option>
                        <option>Julho</option>
                        <option>Agosto</option>
                        <option>Setembro</option>
                        <option>Outubro</option>
                        <option>Novembro</option>
                        <option>Dezembro</option>
                    </select>
                </div>
                <button class="botao-download">
                    <span>Download</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7,10 12,15 17,10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Cards de Resumo -->
    <section class="secao-estatisticas">
        <div class="grade-estatisticas">
            <div class="card-estatistica" data-delay="0">
                <div class="icone-estatistica roxo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
                <div class="conteudo-estatistica">
                    <h3 class="numero-estatistica">$48,78,620</h3>
                    <p class="titulo-estatistica">Total arrecadados</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+15%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="75"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-estatistica" data-delay="100">
                <div class="icone-estatistica roxo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </div>
                <div class="conteudo-estatistica">
                    <h3 class="numero-estatistica">3,580</h3>
                    <p class="titulo-estatistica">Total de Produtos</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+20%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="80"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-estatistica" data-delay="200">
                <div class="icone-estatistica roxo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div class="conteudo-estatistica">
                    <h3 class="numero-estatistica">16,490</h3>
                    <p class="titulo-estatistica">Total de Categorias</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+10%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="60"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-estatistica" data-delay="300">
                <div class="icone-estatistica roxo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="conteudo-estatistica">
                    <h3 class="numero-estatistica">750</h3>
                    <p class="titulo-estatistica">Total de Administradores</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+30%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="90"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard e Categorias lado a lado -->
    <section class="secao-graficos">
        <div class="container-graficos-categorias">
            <!-- Dashboard Chart -->
            <div class="card-grafico">
                <div class="cabecalho-grafico">
                    <h2 class="titulo-grafico">Dashboard</h2>
                    <select class="dropdown-grafico">
                        <option>Mês atual</option>
                        <option>Último trimestre</option>
                        <option>Último ano</option>
                    </select>
                </div>
                <div class="container-grafico">
                    <canvas id="grafico-painel"></canvas>
                </div>
            </div>

            <!-- Categorias -->
            <div class="card-categorias">
                <div class="cabecalho-card">
                    <h2 class="titulo-card">Categorias</h2>
                    <button class="botao-ver-mais">Ver mais</button>
                </div>
                <div class="container-tabela">
                    <table class="tabela-categorias">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ativo</th>
                                <th>Funções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td>Shorts</td>
                                <td>
                                    <label class="interruptor-toggle ativo">
                                        <input type="checkbox" checked>
                                        <span class="slider-toggle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao(1, 'categoria')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <td>Calça Jeans</td>
                                <td>
                                    <label class="interruptor-toggle">
                                        <input type="checkbox">
                                        <span class="slider-toggle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao(2, 'categoria')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="3">
                                <td>Camiseta</td>
                                <td>
                                    <label class="interruptor-toggle ativo">
                                        <input type="checkbox" checked>
                                        <span class="slider-toggle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao(3, 'categoria')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="4">
                                <td>Boné</td>
                                <td>
                                    <label class="interruptor-toggle ativo">
                                        <input type="checkbox" checked>
                                        <span class="slider-toggle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao(4, 'categoria')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="5">
                                <td>Tênis</td>
                                <td>
                                    <label class="interruptor-toggle ativo">
                                        <input type="checkbox" checked>
                                        <span class="slider-toggle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao(5, 'categoria')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="6">
                                <td>Blusas de Frio</td>
                                <td>
                                    <label class="interruptor-toggle">
                                        <input type="checkbox">
                                        <span class="slider-toggle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao(6, 'categoria')">
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
            </div>
        </div>
    </section>

    <!-- Últimas Vendas (embaixo, largura total) -->
    <section class="secao-vendas">
        <div class="container-vendas">
            <div class="card-vendas">
                <div class="cabecalho-card">
                    <h2 class="titulo-card">Últimas Vendas</h2>
                    <button class="botao-ver-mais">Ver mais</button>
                </div>
                <div class="container-tabela">
                    <table class="tabela-vendas">
                        <thead>
                            <tr>
                                <th>ID Compra</th>
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
                            <tr data-id="800129">
                                <td>#800129</td>
                                <td>
                                    <div class="info-usuario">
                                        <div class="avatar-usuario">K</div>
                                        <span>Kaian</span>
                                    </div>
                                </td>
                                <td>Dez 25, 2025</td>
                                <td>07:20 PM</td>
                                <td>R$210.00</td>
                                <td>PIX</td>
                                <td>
                                    <span class="badge-status pago">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20,6 9,17 4,12"></polyline>
                                        </svg>
                                        Pago
                                    </span>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao('800129', 'venda')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="894212">
                                <td>#894212</td>
                                <td>
                                    <div class="info-usuario">
                                        <div class="avatar-usuario">A</div>
                                        <span>Adilson</span>
                                    </div>
                                </td>
                                <td>Dez 25, 2025</td>
                                <td>04:00 PM</td>
                                <td>R$400.00</td>
                                <td>Crédito</td>
                                <td>
                                    <span class="badge-status cancelado">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                        Cancelado
                                    </span>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao('894212', 'venda')">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="891029">
                                <td>#891029</td>
                                <td>
                                    <div class="info-usuario">
                                        <div class="avatar-usuario">Q</div>
                                        <span>Quyntas</span>
                                    </div>
                                </td>
                                <td>Dez 24, 2025</td>
                                <td>08:20 PM</td>
                                <td>R$250.00</td>
                                <td>Boleto</td>
                                <td>
                                    <span class="badge-status pendente">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12,6 12,12 16,14"></polyline>
                                        </svg>
                                        Aguardando
                                    </span>
                                </td>
                                <td>
                                    <div class="botoes-acao">
                                        <button class="botao-acao editar">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>
                                        <button class="botao-acao excluir" onclick="confirmarExclusao('891029', 'venda')">
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
            </div>
        </div>
    </section>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/js/admin/dashboard.js"></script>
@endsection