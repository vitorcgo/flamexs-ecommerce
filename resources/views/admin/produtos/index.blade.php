<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/header.css">
    <link rel="stylesheet" href="/css/admin/produtoindex.css">
    <title>Estoque de Produtos - Painel de Controle</title>
</head>
<body>
    <header class="cabecalho-navegacao">
        <div class="container-navegacao">
            <div class="logo">
                <img src="/images/logo.gif" alt="Logo" class="logo-imagem">
            </div>
            <nav class="menu-navegacao" id="menu-navegacao">
                <a href="#" class="link-navegacao">Dashboard</a>
                <a href="#" class="link-navegacao">Vendas</a>
                <a href="#" class="link-navegacao ativo">Produtos</a>
                <a href="#" class="link-navegacao">Administradores</a>
                <a href="#" class="link-navegacao">Categorias</a>
            </nav>
            <div class="perfil-usuario">
                <div class="avatar-usuario"></div>
                <div class="info-usuario">
                    <div class="nome-usuario">Vitor Gomes</div>
                    <div class="cargo-usuario">Admin</div>
                </div>
                <a href="#" class="botao-logout" onclick="confirmarLogout()">
                    Sair
                </a>
            </div>
            <button class="botao-menu-mobile" id="botao-menu-mobile">
                <div class="linha-menu"></div>
                <div class="linha-menu"></div>
                <div class="linha-menu"></div>
            </button>
        </div>
    </header>

    <main class="container-principal">
        <div class="cabecalho-conteudo">
            <h1 class="titulo-principal">Estoque de Produtos</h1>
            
            <div class="barra-acoes">
                <div class="campo-busca">
                    <svg class="icone-busca" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input type="text" placeholder="Buscar produtos..." class="entrada-busca">
                </div>
                
                <div class="botoes-acao">
                    <button class="botao-filtros">
                        <svg class="icone-filtros" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m0 12h9.75m-9.75 0a1.5 1.5 0 0 1 3 0m-3 0a1.5 1.5 0 0 0 3 0m0 0h3.75M7.5 18v-3m0 0a1.5 1.5 0 0 1 3 0m-3 0a1.5 1.5 0 0 0 3 0m0 3" />
                        </svg>
                        Filtros
                    </button>
                    <button class="botao-adicionar">
                        <svg class="icone-adicionar" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Adicionar produto
                    </button>
                </div>
            </div>
        </div>

        <div class="container-produtos">
            <div class="grade-produtos">
                <div class="card-produto">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="#" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="#" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="#" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="#" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="#" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rodape-paginacao">
            <div class="dropdown-showing">
                <span>Showing</span>
                <select class="select-showing">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <svg class="icone-dropdown" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            
            <div class="controles-paginacao">
                <button class="botao-paginacao">
                    <svg class="icone-seta" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <div class="numero-pagina ativo">1</div>
                <div class="numero-pagina">2</div>
                <div class="numero-pagina">3</div>
                <div class="numero-pagina">4</div>
                <button class="botao-paginacao">
                    <svg class="icone-seta" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>
    </main>

    <script>
        const botaoMenuMobile = document.getElementById('botao-menu-mobile');
        const menuNavegacao = document.getElementById('menu-navegacao');

        botaoMenuMobile.addEventListener('click', function() {
            botaoMenuMobile.classList.toggle('ativo');
            menuNavegacao.classList.toggle('ativo');
        });

        const linksNavegacao = document.querySelectorAll('.link-navegacao');
        linksNavegacao.forEach(link => {
            link.addEventListener('click', function() {
                botaoMenuMobile.classList.remove('ativo');
                menuNavegacao.classList.remove('ativo');
            });
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                botaoMenuMobile.classList.remove('ativo');
                menuNavegacao.classList.remove('ativo');
            }
        });

        function confirmarLogout() {
            if (confirm('Tem certeza que deseja sair do sistema?')) {
                alert('Logout realizado com sucesso!');
            }
        }
    </script>
    
    <script>
        const campoBusca = document.querySelector('.entrada-busca');
        campoBusca.addEventListener('input', function(e) {
            console.log('Buscando por:', e.target.value);
        });

        document.querySelectorAll('.numero-pagina').forEach(numero => {
            numero.addEventListener('click', function() {
                document.querySelector('.numero-pagina.ativo').classList.remove('ativo');
                this.classList.add('ativo');
                console.log('Página selecionada:', this.textContent);
            });
        });
    </script>

</body>
</html>