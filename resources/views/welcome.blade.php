
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/welcome.css">
    <title>Flamexs - Loja Virtual</title>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="barra-navegacao">
            <div class="secao-logo">
                <img src="./images/logo.gif" alt="">
            </div>
            
            <div class="links-navegacao">
                <a href="#">Início</a>
                <a href="#">Produtos</a>
                <a href="#">Sobre nós</a>
                <a href="#">FAQ</a>
                <a href="#">Trocas e Devoluções</a>
                <a href="#">Contato</a>
            </div>
            
            <div class="secao-usuario">
                <a href="/login"><img src="./images/user.svg" alt=""></a>
                <a href=""><img src="./images/carrinho.svg" alt=""></a>
            </div>

            <button id="botao-menu-mobile" class="botao-menu-mobile">
                <span class="linha-menu"></span>
                <span class="linha-menu"></span>
                <span class="linha-menu"></span>
            </button>
        </nav>

        <div id="menu-mobile" class="menu-mobile">
            <div class="menu-mobile-conteudo">
                <a href="#">Início</a>
                <a href="#">Produtos</a>
                <a href="#">Sobre nós</a>
                <a href="#">FAQ</a>
                <a href="#">Trocas e Devoluções</a>
                <a href="#">Contato</a>
            </div>
        </div>
    </header>

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



    <script src="js/carrossel.js"></script>
    <script src="js/menu-mobile.js"></script>
</body>
</html>

