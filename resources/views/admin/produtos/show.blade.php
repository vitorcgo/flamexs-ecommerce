<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/header.css">
    <link rel="stylesheet" href="/css/admin/produtoshow.css">
    <title>Visualizar Produto - Painel de Controle</title>
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
            <h1 class="titulo-principal">Detalhes do Produto</h1>
            <div class="breadcrumbs">Produtos > Visualizar produto</div>
        </div>

        <div class="detalhes-produto">
            <div class="grid-detalhes">
                <div class="coluna-esquerda">
                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Nome do Produto</label>
                        <div class="valor-campo">Shorts SS25</div>
                    </div>

                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Categoria</label>
                        <div class="valor-campo">Shorts</div>
                    </div>

                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Valor</label>
                        <div class="valor-campo valor-preco">R$ 350,00</div>
                    </div>

                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Estoque</label>
                        <div class="valor-campo">35 unidades</div>
                    </div>
                </div>

                <div class="coluna-direita">
                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">ID do Produto</label>
                        <div class="valor-campo">#10</div>
                    </div>

                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Tamanhos Disponíveis</label>
                        <div class="tamanhos-disponiveis">
                            <span class="tamanho-badge">P</span>
                            <span class="tamanho-badge">M</span>
                            <span class="tamanho-badge">G</span>
                            <span class="tamanho-badge">GG</span>
                        </div>
                    </div>

                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Descrição</label>
                        <div class="valor-campo descricao-texto">
                            Shorts moderno da coleção SS25, confeccionado em tecido de alta qualidade. 
                            Ideal para o verão, oferece conforto e estilo. Disponível em diversos tamanhos 
                            para atender todas as necessidades.
                        </div>
                    </div>

                    <div class="campo-visualizacao">
                        <label class="rotulo-campo">Status</label>
                        <div class="status-badge status-ativo">Em estoque</div>
                    </div>
                </div>
            </div>

            <div class="galeria-imagens">
                <h3 class="titulo-galeria">Imagens do Produto</h3>
                <div class="grid-imagens">
                    <div class="imagem-produto">
                        <img src="/images/1.png" alt="Produto - Imagem 1" class="img-produto">
                        <div class="numero-imagem-show">1</div>
                    </div>
                    <div class="imagem-produto">
                        <img src="/images/1.png" alt="Produto - Imagem 2" class="img-produto">
                        <div class="numero-imagem-show">2</div>
                    </div>
                    <div class="imagem-produto">
                        <img src="/images/1.png" alt="Produto - Imagem 3" class="img-produto">
                        <div class="numero-imagem-show">3</div>
                    </div>
                </div>
            </div>

            <div class="botoes-acao">
                <button type="button" class="botao-voltar" onclick="history.back()">Voltar</button>
                <button type="button" class="botao-editar">Editar Produto</button>
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
        const imagensProduto = document.querySelectorAll('.img-produto');
        
        imagensProduto.forEach((img, index) => {
            img.addEventListener('click', function() {
                const modal = document.createElement('div');
                modal.className = 'modal-imagem';
                modal.innerHTML = `
                    <div class="modal-conteudo">
                        <span class="fechar-modal">&times;</span>
                        <img src="${img.src}" alt="Imagem ampliada" class="imagem-ampliada">
                        <div class="info-imagem">Imagem ${index + 1} do produto</div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                modal.querySelector('.fechar-modal').addEventListener('click', function() {
                    document.body.removeChild(modal);
                });
                
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        document.body.removeChild(modal);
                    }
                });
            });
        });
    </script>

</body>
</html>