{{-- Vendas Admin - Flamexs E-commerce --}}
@extends('admin.layouts.main')
@section('title', 'Vendas - Painel de Controle')

@section('content')
<main class="painel-vendas">
    {{-- Título da Página --}}
    <div class="cabecalho-vendas">
        <h1 class="titulo-vendas">Vendas</h1>
    </div>

    {{-- Campo de Pesquisa --}}
    <div class="container-pesquisa">
        <div class="campo-pesquisa">
            <svg class="icone-pesquisa" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="input-pesquisa" placeholder="Pesquisar">
        </div>
    </div>

    {{-- Tabela de Vendas --}}
    <div class="container-tabela-vendas">
        <table class="tabela-vendas-admin">
            <thead>
                <tr>
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
                        <button class="botao-visualizar">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="linha-venda" data-delay="100">
                    <td>#98102331</td>
                    <td>
                        <div class="info-cliente">
                            <div class="avatar-cliente">J</div>
                            <span>Joselitom Lopes</span>
                        </div>
                    </td>
                    <td>Dez 25, 2024</td>
                    <td>08:20 PM</td>
                    <td>R$160.00</td>
                    <td>Crédito</td>
                    <td>
                        <span class="badge-status pendente">Pendente</span>
                    </td>
                    <td>
                        <button class="botao-visualizar">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="linha-venda" data-delay="200">
                    <td>#90881277</td>
                    <td>
                        <div class="info-cliente">
                            <div class="avatar-cliente">K</div>
                            <span>Kleber Machado</span>
                        </div>
                    </td>
                    <td>Dez 25, 2024</td>
                    <td>02:30 PM</td>
                    <td>R$200.00</td>
                    <td>Boleto</td>
                    <td>
                        <span class="badge-status pago">Pago</span>
                    </td>
                    <td>
                        <button class="botao-visualizar">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="linha-venda" data-delay="300">
                    <td>#90112937</td>
                    <td>
                        <div class="info-cliente">
                            <div class="avatar-cliente">C</div>
                            <span>Clonia de Souza</span>
                        </div>
                    </td>
                    <td>Dez 23, 2024</td>
                    <td>08:00 PM</td>
                    <td>R$110.00</td>
                    <td>Boleto</td>
                    <td>
                        <span class="badge-status pago">Pago</span>
                    </td>
                    <td>
                        <button class="botao-visualizar">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="linha-venda" data-delay="400">
                    <td>#90192837</td>
                    <td>
                        <div class="info-cliente">
                            <div class="avatar-cliente">A</div>
                            <span>Alonsa de Amargo</span>
                        </div>
                    </td>
                    <td>Dez 23, 2024</td>
                    <td>06:50 PM</td>
                    <td>R$350.00</td>
                    <td>Crédito</td>
                    <td>
                        <span class="badge-status pago">Pago</span>
                    </td>
                    <td>
                        <button class="botao-visualizar">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="linha-venda" data-delay="500">
                    <td>#96172839</td>
                    <td>
                        <div class="info-cliente">
                            <div class="avatar-cliente">G</div>
                            <span>Guy Silva</span>
                        </div>
                    </td>
                    <td>Dez 22, 2024</td>
                    <td>07:20 PM</td>
                    <td>R$210.00</td>
                    <td>PIX</td>
                    <td>
                        <span class="badge-status pendente">Pendente</span>
                    </td>
                    <td>
                        <button class="botao-visualizar">
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

    {{-- Paginação --}}
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

{{-- Scripts --}}
<script src="/js/admin/vendas.js"></script>
@endsection