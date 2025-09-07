<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/produto-detalhes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal-carrinho.css') }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
    <link rel="stylesheet" href="{{ asset('css/troca.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil-usuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil-edit-usuario.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="barra-navegacao">
            <div class="secao-logo">
                <img src="{{ asset('images/logo.gif') }}" alt="">
            </div>

            <div class="links-navegacao">
                <a href="/">Início</a>
                <a href="/produtos">Produtos</a>
                <a href="/sobre">Sobre nós</a>
                <a href="/#faq">FAQ</a>
                <a href="/troca">Trocas e Devoluções</a>
                <a href="/contato">Contato</a>
            </div>

            <div class="secao-usuario">
                <a href="/login"><img src="{{ asset('images/user.svg') }}" alt=""></a>
                <a href="#" id="icone-carrinho" style="position: relative;">
                    <img src="{{ asset('images/carrinho.svg') }}" alt="">
                    <span class="contador-carrinho" id="contador-carrinho">0</span>
                </a>
            </div>

            <button id="botao-menu-mobile" class="botao-menu-mobile">
                <span class="linha-menu"></span>
                <span class="linha-menu"></span>
                <span class="linha-menu"></span>
            </button>
        </nav>

        <div id="menu-mobile" class="menu-mobile">
            <div class="menu-mobile-conteudo">
                <a href="/">Início</a>
                <a href="/produtos">Produtos</a>
                <a href="/sobre">Sobre nós</a>
                <a href="/#faq">FAQ</a>
                <a href="/troca">Trocas e Devoluções</a>
                <a href="/contato">Contato</a>
            </div>
        </div>
    </header>
    <!-- final do header -->
    <!-- comeco da main -->

    <main style="padding: 40px 0;">
        <div class="container-fluid">
            @yield('content') <!-- Aqui ira ficar todo o conteudo da pagina que nao foi puxado da main -->
        </div>
    </main>


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Flamexs</h3>
                    <p>Sua loja de moda online com as melhores tendências e qualidade excepcional. Estilo e conforto em
                        cada peça.</p>
                    <div class="redes-sociais">
                        <a href="#" class="rede-social facebook">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="rede-social instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="rede-social twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#" class="rede-social youtube">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Links Rápidos</h3>
                    <ul>
                        <li><a href="/">Início</a></li>
                        <li><a href="/produtos">Produtos</a></li>
                        <li><a href="/sobre">Sobre Nós</a></li>
                        <li><a href="/#faq">FAQ</a></li>
                        <li><a href="/contato">Contato</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Atendimento</h3>
                    <ul>
                        <li><a href="/troca">Trocas e Devoluções</a></li>
                        <li><a href="/politica">Política de Privacidade</a></li>
                        <li><a href="/termos">Termos de Uso</a></li>
                        <li><a href="/entrega">Prazos de Entrega</a></li>
                        <li><a href="/tamanhos">Guia de Tamanhos</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Contato</h3>
                    <div class="contato-item email">contato@flamexs.com.br</div>
                    <div class="contato-item telefone">(11) 99999-9999</div>
                    <div class="contato-item endereco">São Paulo, SP - Brasil</div>

                    <div class="newsletter">
                        <p>Receba nossas novidades:</p>
                        <form class="newsletter-form">
                            <input type="email" class="newsletter-input" placeholder="Seu e-mail">
                            <button type="submit" class="newsletter-btn">Inscrever</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Flamexs. Todos os direitos reservados.</p>
                <div class="pagamentos">
                    <span class="pagamento-item">PIX</span>
                    <span class="pagamento-item">Visa</span>
                    <span class="pagamento-item">Master</span>
                    <span class="pagamento-item">Elo</span>
                    <span class="pagamento-item">Boleto</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal do Carrinho -->
    <div class="modal-overlay" id="modal-carrinho">
        <div class="modal-carrinho">
            <div class="modal-header">
                <h2 class="modal-titulo">CARRINHO DE COMPRAS</h2>
                <button class="modal-fechar" id="fechar-modal">&times;</button>
            </div>

            <div class="modal-body" id="carrinho-conteudo">
                <div class="carrinho-vazio" id="carrinho-vazio">
                    <p>Seu carrinho está vazio</p>
                </div>

                <div class="carrinho-itens" id="carrinho-itens" style="display: none;">
                    <!-- Itens do carrinho serão inseridos aqui via JavaScript -->
                </div>
            </div>

            <div class="carrinho-resumo" id="carrinho-resumo" style="display: none;">
                <div class="subtotal">
                    <p class="subtotal-titulo">Subtotal</p>
                    <p class="subtotal-info">(sem frete)</p>
                    <p class="subtotal-valor" id="subtotal-valor">R$ 0,00</p>
                </div>

                <div class="carrinho-acoes">
                    <button class="btn-iniciar-compra">INICIAR A COMPRA</button>
                    <button class="btn-continuar-comprando" id="continuar-comprando">CONTINUAR COMPRANDO</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/carrossel.js') }}"></script>
    <script src="{{ asset('js/menu-mobile.js') }}"></script>
    <script src="{{ asset('js/carrossel-categorias.js') }}"></script>
    <script src="{{ asset('js/produtos-hover.js') }}"></script>
    <script src="{{ asset('js/produto-detalhes.js') }}"></script>
    <script src="{{ asset('js/carrinho.js') }}"></script>
    <script src="{{ asset('js/faq.js') }}"></script>


</body>

</html>
