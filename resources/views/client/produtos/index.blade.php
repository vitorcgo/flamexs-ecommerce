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
        <div class="grid-produtos">
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 1" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">CAMISETA BÁSICA</h3>
                    <p class="produto-preco">R$ 49,90</p>
                    <p class="produto-tamanhos">P, M, G, GG</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 2" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">REGATA ESPORTIVA</h3>
                    <p class="produto-preco">R$ 39,90</p>
                    <p class="produto-tamanhos">P, M, G</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 3" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">BLUSA FEMININA</h3>
                    <p class="produto-preco">R$ 59,90</p>
                    <p class="produto-tamanhos">PP, P, M, G</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 4" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">CALÇA JEANS</h3>
                    <p class="produto-preco">R$ 89,90</p>
                    <p class="produto-tamanhos">36, 38, 40, 42, 44</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 5" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">SHORTS CASUAL</h3>
                    <p class="produto-preco">R$ 34,90</p>
                    <p class="produto-tamanhos">P, M, G, GG</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 6" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">VESTIDO ELEGANTE</h3>
                    <p class="produto-preco">R$ 79,90</p>
                    <p class="produto-tamanhos">PP, P, M, G, GG</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 7" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">JAQUETA JEANS</h3>
                    <p class="produto-preco">R$ 99,90</p>
                    <p class="produto-tamanhos">P, M, G, GG, XG</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
            
            <div class="produto">
                <div class="produto-imagem-container">
                    <img src="./images/1.png" alt="Produto 8" class="produto-imagem">
                </div>
                <div class="produto-info">
                    <h3 class="produto-nome">TÊNIS ESPORTIVO</h3>
                    <p class="produto-preco">R$ 129,90</p>
                    <p class="produto-tamanhos">37, 38, 39, 40, 41, 42, 43</p>
                </div>
                <div class="produto-botoes">
                    <button class="botao-comprar">COMPRAR AGORA</button>
                    <button class="botao-carrinho">ADICIONAR AO CARRINHO</button>
                </div>
            </div>
        </div>
    </section>

@endsection