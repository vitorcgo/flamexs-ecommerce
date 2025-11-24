<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Flamexs - Loja Virtual')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')

<!-- Hero Banner -->
    <div id="carrossel-container">
        <div id="carrossel-banners">
            <div class="banner-slide ativo">
                <img src="./images/banner3.png" alt="Banner 1">
            </div>
            <div class="banner-slide">
                <img src="./images/banner2.png" alt="Banner 2">
            </div>
            <div class="banner-slide">
                <img src="./images/banner.png" alt="Banner 3">
            </div>
        </div>
        
        <div id="indicadores-carrossel">
            <span class="indicador ativo" data-slide="0"></span>
            <span class="indicador" data-slide="1"></span>
            <span class="indicador" data-slide="2"></span>
        </div>
        
        <button id="botao-anterior" class="botao-navegacao">&lt;</button>
        <button id="botao-proximo" class="botao-navegacao">&gt;</button>

    </div>

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

    <!-- Categorias -->
    <div class="container-categorias">
        <h1>CATEGORIAS</h1>
        <section class="secao-categorias">
            <div class="carrossel-categorias">
                <div class="lista-categorias">
                    @php
                        $categoriasPorLinha = [];
                        $linhaAtual = [];
                        foreach($categories as $index => $categoria) {
                            $linhaAtual[] = $categoria;
                            if (count($linhaAtual) == 3 || $index == count($categories) - 1) {
                                $categoriasPorLinha[] = $linhaAtual;
                                $linhaAtual = [];
                            }
                        }
                    @endphp
                    
                    @foreach($categoriasPorLinha as $linhaIndex => $linhaCategories)
                        <div class="@if($linhaIndex == 0)primeira-linha @else segunda-linha @endif">
                            @foreach($linhaCategories as $categoria)
                                <div class="card-categoria">
                                    <a href="{{ route('client.produtos.index', ['categoria' => $categoria->name_category]) }}">
                                        @php
                                            $nomeCategoria = strtolower(str_replace(' ', '', $categoria->name_category));
                                            $imagemPossivel = "./images/{$nomeCategoria}.png";
                                        @endphp
                                        <img src="{{ $imagemPossivel }}" alt="{{ $categoria->name_category }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                
                <div class="mini-botoes-categoria">
                    <button class="mini-botao proximo" id="mini-proximo">›</button>
                </div>
            </div>
        </section>
    </div>

    <!-- Produtos -->
    <section id="sessao-produtos">
        <h2 class="titulo-produtos">PRODUTOS</h2>
        <div class="botao-ver-mais-container">
            <a href="{{ route('client.produtos.index') }}" class="botao-ver-mais">VER MAIS</a>
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
                            <img src="{{ $firstImage->image_data_url }}" alt="{{ $product->name }}" class="produto-imagem-principal">
                            @if($secondImage)
                                <img src="{{ $secondImage->image_data_url }}" alt="{{ $product->name }}" class="produto-imagem-hover">
                            @endif
                        @else
                            <img src="{{ $product->first_image }}" alt="{{ $product->name }}" class="produto-imagem-principal">
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

    <script>
        function adicionarAoCarrinho(productId) {
            // Redirecionar para a página do produto para o usuário escolher o tamanho
            window.location.href = '/produto/' + productId;
        }
    </script>

    <!-- FAQ -->
    <section id="faq">
        <div class="container-faq">
            <div class="faq-header">
                <h2 class="faq-titulo">PERGUNTAS FREQUENTES</h2>
                <p class="faq-descricao">Encontre respostas para as perguntas mais comuns sobre nossos produtos e processo de compra.</p>
            </div>
            
            <div class="faq-lista">
                <div class="faq-item">
                    <button class="faq-pergunta" data-faq="1">
                        <span>Quais formas de pagamento a loja aceita?</span>
                        <span class="faq-icone"><img src="./images/Vector.svg" alt=""></span>
                    </button>
                    <div class="faq-resposta" id="faq-1">
                        <p>Aceitamos cartões de crédito, débito, PIX e boleto bancário.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-pergunta" data-faq="2">
                        <span>Quanto tempo demora para meu pedido chegar?</span>
                        <span class="faq-icone"><img src="./images/Vector.svg" alt=""></span>
                    </button>
                    <div class="faq-resposta" id="faq-2">
                        <p>O prazo de entrega varia de acordo com a sua região. Normalmente, as entregas levam entre 3 a 10 dias úteis após a confirmação do pagamento.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-pergunta" data-faq="3">
                        <span>Posso trocar ou devolver um produto?</span>
                        <span class="faq-icone"><img src="./images/Vector.svg" alt=""></span>
                    </button>
                    <div class="faq-resposta" id="faq-3">
                        <p>Sim! Você pode solicitar a troca ou devolução em até 7 dias corridos após o recebimento do pedido, desde que a peça esteja sem uso e com etiqueta.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-pergunta" data-faq="4">
                        <span>Como descubro meu tamanho ideal?</span>
                        <span class="faq-icone"><img src="./images/Vector.svg" alt=""></span>
                    </button>
                    <div class="faq-resposta" id="faq-4">
                        <p>Disponibilizamos uma tabela de medidas em cada produto para ajudar na escolha. Se ainda tiver dúvidas, nossa equipe de atendimento pode auxiliar.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-pergunta" data-faq="5">
                        <span>Vocês oferecem frete grátis?</span>
                        <span class="faq-icone"><img src="./images/Vector.svg" alt=""></span>
                    </button>
                    <div class="faq-resposta" id="faq-5">
                        <p>Sim, oferecemos frete grátis em compras acima de R$ 599,00.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection