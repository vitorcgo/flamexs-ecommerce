<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Produtos - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')

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


    <!-- Produtos -->
    <section id="sessao-produtos">
        <h2 class="titulo-produtos">PRODUTOS</h2>

         <!-- Filtro de Categorias -->
    <div class="container-filtro-categorias">
        <div class="filtro-categorias">
            <div class="opcoes-filtro">
                <a href="{{ route('client.produtos.index') }}" class="opcao-filtro @if(!$categoriaAtiva) ativa @endif">
                    Todas as Categorias
                </a>
                @foreach($categories as $categoria)
                    <a href="{{ route('client.produtos.index', ['categoria' => $categoria->name_category]) }}" 
                       class="opcao-filtro @if($categoriaAtiva === $categoria->name_category) ativa @endif">
                        {{ $categoria->name_category }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

        <div class="grid-produtos">
            @forelse($products as $product)
                @php
                    $sizes = json_decode($product->size, true) ?? [];
                    $sizeLabels = array_keys($sizes);
                    $firstImage = $product->media->first();
                    $secondImage = $product->media->skip(1)->first();
                @endphp
                <div class="produto" onclick="window.location.href='{{ route('client.produtos.show', $product->id) }}'">
                    <div class="produto-imagem-container">
                        @if($firstImage)
                            <img src="{{ $firstImage->image_data_url }}" alt="{{ $product->name }}" class="produto-imagem produto-imagem-principal">
                            @if($secondImage)
                                <img src="{{ $secondImage->image_data_url }}" alt="{{ $product->name }}" class="produto-imagem produto-imagem-hover">
                            @endif
                        @else
                            <img src="{{ $product->first_image }}" alt="{{ $product->name }}" class="produto-imagem produto-imagem-principal">
                        @endif
                    </div>
                    <div class="produto-info">
                        <h3 class="produto-nome">{{ strtoupper($product->name) }}</h3>
                        <p class="produto-preco">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        <p class="produto-tamanhos">{{ implode(', ', $sizeLabels) }}</p>
                    </div>
                    <div class="produto-botoes">
                        <button class="botao-comprar" onclick="event.stopPropagation(); window.location.href='{{ route('client.produtos.show', $product->id) }}'">COMPRAR AGORA</button>
                        <button class="botao-carrinho" onclick="event.stopPropagation(); adicionarAoCarrinho({{ $product->id }})">ADICIONAR AO CARRINHO</button>
                    </div>
                </div>
            @empty
                <div class="sem-produtos">
                    <h3>Nenhum produto disponível no momento</h3>
                    <p>Volte em breve para conferir nossos novos produtos!</p>
                </div>
            @endforelse
        </div>
    </section>

    <style>
        .produto {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        
        .produto:hover {
            transform: translateY(-5px);
        }
        
        .produto-imagem-container {
            position: relative;
            overflow: hidden;
        }
        
        .produto-imagem-hover {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .produto-imagem-container:hover .produto-imagem-principal {
            opacity: 0;
        }
        
        .produto-imagem-container:hover .produto-imagem-hover {
            opacity: 1;
        }
        
        .sem-produtos {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .sem-produtos h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .sem-produtos p {
            font-size: 16px;
        }
    </style>

    <script>
        function adicionarAoCarrinho(productId) {
            // Redirecionar para a página do produto para o usuário escolher o tamanho
            window.location.href = '/produto/' + productId;
        }
    </script>

@endsection