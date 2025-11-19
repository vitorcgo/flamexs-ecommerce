@extends('admin.layouts.main')
@section('title', 'Dashboard - Painel de Controle')

@section('content')
<main class="painel-principal">
    <!-- Seção de Boas-vindas -->
    <section class="secao-boas-vindas">
        <div class="conteudo-boas-vindas">
            <div class="texto-boas-vindas">
                <h1 class="titulo-boas-vindas">Bem vindo ao painel!</h1>
                <p class="subtitulo-boas-vindas">Cuide do seu site comigo!</p>
            </div>
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
                    <h3 class="numero-estatistica">{{$totalProdutos}}</h3>
                    <p class="titulo-estatistica">Total de Produtos</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
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
                    <h3 class="numero-estatistica">{{$totalCategorias}}</h3>
                    <p class="titulo-estatistica">Total de Categorias</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
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
                    <h3 class="numero-estatistica">{{$totalAdmins}}</h3>
                    <p class="titulo-estatistica">Total de Administradores</p>
                    <p class="descricao-estatistica">Dado obtido com bases em um mês.</p>
                    <div class="rodape-estatistica">
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
                </div>
                <div class="container-grafico">
                    <canvas id="grafico-painel"></canvas>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartLabels = @json($chartLabels ?? []);
    const chartData = @json($chartData ?? []);

    const ctx = document.getElementById('grafico-painel').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            // Usa os dados do Controller
            labels: chartLabels, 
            datasets: [{
                label: 'Valor Total de Vendas Diárias',
                data: chartData, 
                borderColor: '#8B5CF6',
                backgroundColor: 'rgba(139, 92, 246, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        // Formata o valor na tooltip para R$
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    // Formata a escala Y para mostrar como moeda (R$)
                    ticks: {
                        callback: function(value, index, ticks) {
                            return 'R$' + value.toLocaleString('pt-BR');
                        }
                    }
                }
            }
        }
    });
</script>

<script src="/js/admin/dashboard.js"></script>
@endsection