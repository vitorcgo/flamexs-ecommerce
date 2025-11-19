<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Produto - Flamexs')
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
    <div class="produto-container" data-product-id="{{ $product->id }}">
        <div class="produto-wrapper">
            <!-- Galeria de Imagens -->
            <section class="galeria-produto">
                <div class="imagem-destaque">
                    @if($product->media->first())
                        <img src="{{ $product->media->first()->image_data_url }}" alt="{{ $product->name }}" id="imagem-principal" class="img-principal">
                    @else
                        <img src="{{ $product->first_image }}" alt="{{ $product->name }}" id="imagem-principal" class="img-principal">
                    @endif
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
                    @forelse($product->media as $index => $media)
                        <div class="miniatura-item {{ $index === 0 ? 'ativa' : '' }}" onclick="trocarImagem('{{ $media->image_data_url }}')">
                            <img src="{{ $media->image_data_url }}" alt="Vista {{ $index + 1 }}">
                        </div>
                    @empty
                        <div class="miniatura-item ativa" onclick="trocarImagem('{{ $product->first_image }}')">
                            <img src="{{ $product->first_image }}" alt="Vista 1">
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- Informações do Produto -->
            <section class="info-produto">
                <div class="produto-header">
                    <h1 class="produto-titulo">{{ $product->name }}</h1>
                    <div class="produto-rating">
                        <div class="estrelas">
                            <span>★★★★★</span>
                        </div>
                        <span class="rating-text">(127 avaliações)</span>
                    </div>
                </div>

                @php
                    $preco = $product->price;
                    $precoParcelado = $preco / 3;
                    $precoPixDesconto = $preco * 0.9;
                @endphp

                <div class="preco-container">
                    <span class="preco-atual">R$ {{ number_format($preco, 2, ',', '.') }}</span>
                    <div class="preco-info">
                        <span class="parcelas">ou 3x de R$ {{ number_format($precoParcelado, 2, ',', '.') }} sem juros</span>
                        <span class="pix-desconto">R$ {{ number_format($precoPixDesconto, 2, ',', '.') }} no PIX (10% off)</span>
                    </div>
                </div>

                <!-- Descrição do Produto -->
                @if($product->description)
                <div class="produto-descricao">
                    <p>{{ $product->description }}</p>
                </div>
                @endif

                <!-- Seleções -->
                <div class="selecoes-produto">
                    <div class="selecao-grupo">
                        <label class="selecao-label">Tamanho</label>
                        <div class="tamanhos-container">
                            @php
                                $todosOsTamanhos = ['P', 'M', 'G', 'GG'];
                            @endphp
                            @foreach($todosOsTamanhos as $size)
                                @if(isset($sizes[$size]) && $sizes[$size] > 0)
                                    <button class="tamanho-btn {{ $loop->first ? 'ativo' : '' }}" data-tamanho="{{ $size }}" data-estoque="{{ $sizes[$size] }}">
                                        {{ $size }}
                                    </button>
                                @else
                                    <button class="tamanho-btn indisponivel" data-tamanho="{{ $size }}" data-estoque="0" disabled title="Fora de estoque">
                                        {{ $size }} <span class="badge-indisponivel">Indisponível</span>
                                    </button>
                                @endif
                            @endforeach
                        </div>
                        <a href="#" class="guia-tamanhos" onclick="abrirGuiaTamanhos()">Guia de tamanhos</a>
                    </div>

                    <div class="selecao-grupo">
                        <label class="selecao-label">Quantidade</label>
                        <div class="quantidade-container">
                            <button class="qty-btn" onclick="diminuirQuantidade()">−</button>
                            <input type="number" id="quantidade" value="1" min="1" max="{{ $product->stock }}" readonly>
                            <button class="qty-btn" onclick="aumentarQuantidade()">+</button>
                        </div>
                        @php
                            $primeiroTamanho = array_key_first($sizes) ?? 'G';
                            $primeiroEstoque = $sizes[$primeiroTamanho] ?? 0;
                        @endphp
                        <span class="estoque-info">{{ $primeiroEstoque }} unidades disponíveis em {{ $primeiroTamanho }}</span>
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

    <style>
        .produto-descricao {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }
        
        .produto-descricao p {
            margin: 0;
            color: #666;
            line-height: 1.6;
        }
        
        .estoque-info {
            font-size: 12px;
            color: #28a745;
            margin-top: 5px;
            display: block;
        }
        
        .tamanho-btn[data-estoque="0"] {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #e9ecef;
            color: #6c757d;
        }
        
        .tamanho-btn[data-estoque="0"]:hover {
            background-color: #e9ecef;
            color: #6c757d;
        }
    </style>

@endsection