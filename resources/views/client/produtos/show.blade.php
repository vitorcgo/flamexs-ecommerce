<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Camiseta Básica - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/produto-detalhes.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

    <!-- Faixa de Frete Grátis -->
    <div id="faixa-frete-gratis" class="faixa-frete-gratis">
        <div class="conteudo-faixa-rolante">
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        </div>
    </div>

    <!-- Produto Principal -->
    <div class="produto-container">
        <div class="produto-wrapper">
            <!-- Galeria de Imagens -->
            <section class="galeria-produto">
                <div class="imagem-destaque">
                    <img src="{{ asset('images/cocada.png') }}" alt="Camiseta Básica" id="imagem-principal" class="img-principal">
                    <button class="btn-zoom" onclick="abrirModalZoom(document.getElementById('imagem-principal').src)">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="21 21l-4.35-4.35"></path>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                    </button>
                </div>
                
                <div class="miniaturas-grid">
                    <div class="miniatura-item ativa" onclick="trocarImagem('{{ asset('images/cocada.png') }}')">
                        <img src="{{ asset('images/cocada.png') }}" alt="Vista 1">
                    </div>
                    <div class="miniatura-item" onclick="trocarImagem('{{ asset('images/cocada2.png') }}')">
                        <img src="{{ asset('images/cocada2.png') }}" alt="Vista 2">
                    </div>
                    <div class="miniatura-item" onclick="trocarImagem('{{ asset('images/cocada3.png') }}')">
                        <img src="{{ asset('images/cocada3.png') }}" alt="Vista 3">
                    </div>
                </div>
            </section>

            <!-- Informações do Produto -->
            <section class="info-produto">
                <div class="produto-header">
                    <h1 class="produto-titulo">Camiseta Básica Premium</h1>
                    <div class="produto-rating">
                        <div class="estrelas">
                            <span>★★★★★</span>
                        </div>
                        <span class="rating-text">(127 avaliações)</span>
                    </div>
                </div>

                <div class="preco-container">
                    <span class="preco-atual">R$ 49,90</span>
                    <div class="preco-info">
                        <span class="parcelas">ou 3x de R$ 16,63 sem juros</span>
                        <span class="pix-desconto">R$ 44,91 no PIX (10% off)</span>
                    </div>
                </div>

                <!-- Seleções -->
                <div class="selecoes-produto">
                    <div class="selecao-grupo">
                        <label class="selecao-label">Tamanho</label>
                        <div class="tamanhos-container">
                            <button class="tamanho-btn" data-tamanho="P">P</button>
                            <button class="tamanho-btn" data-tamanho="M">M</button>
                            <button class="tamanho-btn ativo" data-tamanho="G">G</button>
                            <button class="tamanho-btn" data-tamanho="GG">GG</button>
                        </div>
                        <a href="#" class="guia-tamanhos" onclick="abrirGuiaTamanhos()">Guia de tamanhos</a>
                    </div>

                    <div class="selecao-grupo">
                        <label class="selecao-label">Quantidade</label>
                        <div class="quantidade-container">
                            <button class="qty-btn" onclick="diminuirQuantidade()">−</button>
                            <input type="number" id="quantidade" value="1" min="1" max="10" readonly>
                            <button class="qty-btn" onclick="aumentarQuantidade()">+</button>
                        </div>
                    </div>

                    <!-- Seção de Frete -->
                    <div class="secao-frete">
                        <h3 class="frete-titulo">Calcular Frete</h3>
                        <div class="frete-input-container">
                            <input type="text" id="cep-input" class="frete-input" placeholder="Digite seu CEP" maxlength="9">
                            <button class="btn-calcular-frete" onclick="calcularFrete()">Calcular</button>
                        </div>
                        <div id="frete-resultados" class="frete-resultados" style="display: none;"></div>
                        <div id="frete-erro" class="frete-erro" style="display: none;"></div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="acoes-produto">
                    <button class="btn-comprar-agora">
                        <span>Comprar Agora</span>
                    </button>
                    <button class="btn-adicionar-carrinho">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span>Adicionar ao Carrinho</span>
                    </button>
                </div>

                <!-- Benefícios -->
                <div class="beneficios-produto">
                    <div class="beneficio-item">
                        <div class="beneficio-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <div class="beneficio-texto">
                            <strong>Frete Grátis</strong>
                            <span>Acima de R$ 599</span>
                        </div>
                    </div>

                    <div class="beneficio-item">
                        <div class="beneficio-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9,22 9,12 15,12 15,22"></polyline>
                            </svg>
                        </div>
                        <div class="beneficio-texto">
                            <strong>Troca Fácil</strong>
                            <span>7 dias para trocar</span>
                        </div>
                    </div>

                    <div class="beneficio-item">
                        <div class="beneficio-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <circle cx="12" cy="16" r="1"></circle>
                                <path d="m7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <div class="beneficio-texto">
                            <strong>Compra Segura</strong>
                            <span>Dados protegidos</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{ asset('js/produto-detalhes.js') }}"></script>

@endsection