<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Produtos - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')

    <!-- Faixa de Frete Grátis -->
    <div id="faixa-frete-gratis" class="faixa-frete-gratis">
        <div class="conteudo-faixa-rolante">
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
            <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        </div>
    </div>


    <!-- Produtos -->
    <section id="sessao-produtos">
        <h2 class="titulo-produtos">PRODUTOS</h2>

        <!-- Barra de Pesquisa -->
        <div class="container-pesquisa-produtos">
            <div class="campo-pesquisa-produtos">
                <svg class="icone-pesquisa-produtos" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" class="input-pesquisa-produtos" placeholder="Pesquisar produtos..." id="pesquisaProdutos">
            </div>
        </div>

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
        .container-pesquisa-produtos {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }

        .campo-pesquisa-produtos {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .icone-pesquisa-produtos {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #999;
            pointer-events: none;
        }

        .input-pesquisa-produtos {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #E0E0E0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Lexend', sans-serif;
            transition: all 0.3s ease;
        }

        .input-pesquisa-produtos:focus {
            outline: none;
            border-color: #FF0000;
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.1);
        }

        .input-pesquisa-produtos::placeholder {
            color: #999;
        }

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

        // Pesquisa de produtos em tempo real
        document.addEventListener('DOMContentLoaded', function() {
            const inputPesquisa = document.getElementById('pesquisaProdutos');
            const produtos = document.querySelectorAll('.produto');
            const gridProdutos = document.querySelector('.grid-produtos');

            if (inputPesquisa) {
                inputPesquisa.addEventListener('keyup', function(e) {
                    const termo = e.target.value.toLowerCase().trim();
                    let produtosVisiveis = 0;

                    produtos.forEach(produto => {
                        const nome = produto.querySelector('.produto-nome').textContent.toLowerCase();
                        const preco = produto.querySelector('.produto-preco').textContent.toLowerCase();
                        const tamanhos = produto.querySelector('.produto-tamanhos').textContent.toLowerCase();

                        if (nome.includes(termo) || preco.includes(termo) || tamanhos.includes(termo) || termo === '') {
                            produto.style.display = '';
                            produtosVisiveis++;
                        } else {
                            produto.style.display = 'none';
                        }
                    });

                    // Mostrar mensagem se nenhum produto foi encontrado
                    const semProdutos = gridProdutos.querySelector('.sem-produtos');
                    if (produtosVisiveis === 0 && termo !== '') {
                        if (!semProdutos) {
                            const mensagem = document.createElement('div');
                            mensagem.className = 'sem-produtos';
                            mensagem.innerHTML = `
                                <h3>Nenhum produto encontrado</h3>
                                <p>Tente buscar por outro termo</p>
                            `;
                            gridProdutos.appendChild(mensagem);
                        }
                    } else if (semProdutos && termo === '') {
                        semProdutos.remove();
                    }
                });
            }
        });
    </script>

@endsection