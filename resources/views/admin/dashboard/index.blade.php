@extends('admin.layouts.main')
@section('title', 'Dashboard - Painel de Controle')

@section('content')
<main class="painel-principal">
    <!-- Seção de Boas-vindas -->
    <section class="secao-boas-vindas">
        <div class="conteudo-boas-vindas">
            <div class="texto-boas-vindas">
                <h1 class="titulo-boas-vindas">Bem vindo, Admin</h1>
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
                    <h3 class="numero-estatistica">R$ {{ number_format($totalVendas, 2, ',', '.') }}</h3>
                    <p class="titulo-estatistica">Total arrecadados</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+0%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="0"></div>
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
                    <h3 class="numero-estatistica">0</h3>
                    <p class="titulo-estatistica">Total de Produtos</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+0%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="0"></div>
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
                    <h3 class="numero-estatistica">0</h3>
                    <p class="titulo-estatistica">Total de Categorias</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+0%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="0"></div>
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
                    <h3 class="numero-estatistica">0</h3>
                    <p class="titulo-estatistica">Total de Administradores</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
                        <span class="porcentagem-estatistica positiva">+0%</span>
                        <div class="barra-progresso">
                            <div class="preenchimento-progresso" data-width="0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Chart -->
    <section class="secao-graficos">
        <div class="container-grafico-unico">
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
        </div>
    </section>

    <!-- Últimas Vendas -->
    <section class="secao-vendas">
        <div class="container-vendas">
            <div class="card-vendas">
                <div class="cabecalho-card">
                    <h2 class="titulo-card">Últimas Vendas</h2>
                    <a href="/admin/vendas" class="botao-ver-mais">Ver mais</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                @php
                                    $orderData = json_decode($order->order_data, true);
                                    $primeiraLetra = strtoupper(substr($order->user->full_name ?? 'U', 0, 1));
                                @endphp
                                <tr class="linha-venda" data-delay="0">
                                    <td>#{{ $order->id }}</td>
                                    <td>
                                        <div class="info-cliente">
                                            <div class="avatar-cliente">{{ $primeiraLetra }}</div>
                                            <span>{{ $order->user->full_name ?? 'Usuário' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>{{ $order->created_at->format('h:i A') }}</td>
                                    <td>R$ {{ number_format($order->total_amount, 2, ',', '.') }}</td>
                                    <td>{{ ucfirst($orderData['metodo_pagamento'] ?? 'N/A') }}</td>
                                    <td>
                                        <span class="badge-status {{ $order->status }}">{{ ucfirst($order->status) }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 20px;">
                                        Nenhuma venda registrada
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Inicializar gráfico
const ctx = document.getElementById('grafico-painel').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
        datasets: [{
            label: 'Vendas',
            data: [0, 0, 0, 0, 0, 0],
            borderColor: '#8B5CF6',
            backgroundColor: 'rgba(139, 92, 246, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script src="/js/admin/dashboard.js"></script>
@endsection