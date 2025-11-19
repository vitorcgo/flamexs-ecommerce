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
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                                fill="#F6F3FF" />
                            <circle cx="20.0001" cy="20" r="8.33333" stroke="#9058F9" />
                            <path
                                d="M21.6666 18.3333C21.6666 17.4129 20.9204 16.6667 19.9999 16.6667C19.0794 16.6667 18.3333 17.4129 18.3333 18.3333C18.3333 19.2538 19.0794 20 19.9999 20"
                                stroke="#9058F9" stroke-linecap="round" />
                            <path
                                d="M19.9999 20C20.9204 20 21.6666 20.7462 21.6666 21.6667C21.6666 22.5872 20.9204 23.3334 19.9999 23.3334C19.0794 23.3334 18.3333 22.5872 18.3333 21.6667"
                                stroke="#9058F9" stroke-linecap="round" />
                            <path d="M20 15.4166V16.6666" stroke="#9058F9" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20 23.3334V24.5834" stroke="#9058F9" stroke-linecap="round" stroke-linejoin="round" />
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
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                                fill="#F6F3FF" />
                            <path
                                d="M13.3334 17.5V23.6667C13.3334 25.3235 14.6765 26.6667 16.3334 26.6667H23.6667C25.3236 26.6667 26.6667 25.3235 26.6667 23.6667V17.5"
                                stroke="#9058F9" />
                            <path
                                d="M20 13.3334H26.0524C26.3384 13.3334 26.6034 13.487 26.7505 13.738L28.2161 16.238C28.5417 16.7934 28.1508 17.5 27.5179 17.5H23.3645C22.7925 17.5 22.2625 17.1929 21.9682 16.6909L20 13.3334Z"
                                stroke="#9058F9" />
                            <path
                                d="M20 13.3334H13.9476C13.6616 13.3334 13.3966 13.487 13.2494 13.738L11.7839 16.238C11.4583 16.7934 11.8492 17.5 12.4821 17.5H16.6355C17.2075 17.5 17.7375 17.1929 18.0318 16.6909L20 13.3334Z"
                                stroke="#9058F9" />
                        </svg>
                    </div>
                    <div class="conteudo-estatistica">
                        <h3 class="numero-estatistica">{{ $totalProdutos }}</h3>
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
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                                fill="#F6F3FF" />
                            <path
                                d="M16.6667 18.3333H23.3333M16.6667 21.6666H23.3333M16.6667 25H20M16.6667 13.3333C16.6667 14.2538 17.4129 15 18.3333 15H21.6667C22.5871 15 23.3333 14.2538 23.3333 13.3333M16.6667 13.3333C16.6667 12.4128 17.4129 11.6666 18.3333 11.6666H21.6667C22.5871 11.6666 23.3333 12.4128 23.3333 13.3333M16.6667 13.3333H15.8333C13.9924 13.3333 12.5 14.8257 12.5 16.6666V25C12.5 26.8409 13.9924 28.3333 15.8333 28.3333H24.1667C26.0076 28.3333 27.5 26.8409 27.5 25V16.6666C27.5 14.8257 26.0076 13.3333 24.1667 13.3333H23.3333"
                                stroke="#9058F9" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="conteudo-estatistica">
                        <h3 class="numero-estatistica">{{ $totalCategorias }}</h3>
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
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                                fill="#F6F3FF" />
                            <ellipse cx="18.3333" cy="24.5833" rx="5.83333" ry="2.91667" stroke="#9058F9"
                                stroke-linejoin="round" />
                            <circle cx="18.3333" cy="15.8333" r="3.33333" stroke="#9058F9" stroke-linejoin="round" />
                            <path
                                d="M22.85 13.6882C24.3418 13.8617 25.5004 15.1283 25.5004 16.6667C25.5003 18.3234 24.157 19.6665 22.5004 19.6667C22.2151 19.6667 21.9395 19.6239 21.6781 19.5496C21.9704 19.2863 22.2308 18.9888 22.4545 18.6638C22.4696 18.6642 22.4851 18.6667 22.5004 18.6667C23.6047 18.6665 24.5003 17.7711 24.5004 16.6667C24.5004 15.8188 23.9718 15.0954 23.2269 14.8044C23.1452 14.4135 23.0172 14.0398 22.85 13.6882Z"
                                fill="#9058F9" />
                            <path
                                d="M23.3949 21.2009C24.4753 21.2789 25.4569 21.494 26.2279 21.8152C26.7163 22.0187 27.1449 22.274 27.4584 22.5828C27.7735 22.8932 28.0003 23.2882 28.0004 23.7498C28.0003 24.2113 27.7734 24.6062 27.4584 24.9167C27.1449 25.2256 26.7164 25.4808 26.2279 25.6843C26.0027 25.7782 25.7586 25.861 25.5004 25.9363C25.6881 25.5645 25.7993 25.1728 25.8256 24.7673C25.8312 24.765 25.8375 24.7638 25.8431 24.7615C26.2591 24.5881 26.5638 24.3944 26.7562 24.2048C26.9468 24.0171 27.0003 23.8632 27.0004 23.7498C27.0003 23.6364 26.9466 23.4833 26.7562 23.2957C26.5638 23.1061 26.2592 22.9114 25.8431 22.738C25.5863 22.6311 25.295 22.5376 24.9769 22.4568C24.5706 21.9838 24.0342 21.5584 23.3949 21.2009Z"
                                fill="#9058F9" />
                        </svg>
                    </div>
                    <div class="conteudo-estatistica">
                        <h3 class="numero-estatistica">{{ $totalAdmins }}</h3>
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
                                    label += new Intl.NumberFormat('pt-BR', {
                                        style: 'currency',
                                        currency: 'BRL'
                                    }).format(context.parsed.y);
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
