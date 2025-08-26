<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/header.css">
    <link rel="stylesheet" href="/css/admin/produtocreate.css">
    <title>Criar Produto - Painel de Controle</title>
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
            <h1 class="titulo-principal">Adicionar Produto</h1>
            <div class="breadcrumbs">Produtos > Adicionar novo produto</div>
        </div>

        <form class="formulario-produto">
            <div class="grid-formulario">
                <div class="coluna-esquerda">
                    <div class="campo-formulario">
                        <label for="nome-produto" class="rotulo-campo">Nome do Produto</label>
                        <input type="text" id="nome-produto" name="nome-produto" class="entrada-texto" placeholder="Digite o nome do produto">
                    </div>

                    <div class="campo-formulario">
                        <label for="categorias" class="rotulo-campo">Categorias</label>
                        <select id="categorias" name="categorias" class="selecao-campo">
                            <option value="">Selecione uma categoria</option>
                            <option value="shorts">Shorts</option>
                            <option value="camisetas">Camisetas</option>
                            <option value="calcas">Calças</option>
                        </select>
                    </div>

                    <div class="campo-formulario">
                        <label for="valor" class="rotulo-campo">Valor</label>
                        <div class="campo-com-icone">
                            <input type="text" id="valor" name="valor" class="entrada-texto" placeholder="Ex: R$ 99,90">
                            <div class="icone-informacao">i</div>
                        </div>
                    </div>

                    <div class="campo-formulario">
                        <label for="estoque" class="rotulo-campo">Estoque</label>
                        <input type="number" id="estoque" name="estoque" class="entrada-texto" placeholder="Quantidade em estoque" min="0">
                    </div>
                </div>

                <div class="coluna-direita">
                    <div class="campo-formulario">
                        <label class="rotulo-campo">Tamanhos</label>
                        <div class="opcoes-tamanhos">
                            <div class="opcao-tamanho">
                                <input type="checkbox" id="tamanho-p" name="tamanhos[]" value="P">
                                <label for="tamanho-p" class="rotulo-tamanho">P</label>
                            </div>
                            <div class="opcao-tamanho">
                                <input type="checkbox" id="tamanho-m" name="tamanhos[]" value="M">
                                <label for="tamanho-m" class="rotulo-tamanho">M</label>
                            </div>
                            <div class="opcao-tamanho">
                                <input type="checkbox" id="tamanho-g" name="tamanhos[]" value="G">
                                <label for="tamanho-g" class="rotulo-tamanho">G</label>
                            </div>
                            <div class="opcao-tamanho">
                                <input type="checkbox" id="tamanho-gg" name="tamanhos[]" value="GG">
                                <label for="tamanho-gg" class="rotulo-tamanho">GG</label>
                            </div>
                        </div>
                    </div>

                    <div class="campo-formulario">
                        <label for="descricao" class="rotulo-campo">Descrição</label>
                        <textarea id="descricao" name="descricao" class="area-texto" rows="4" placeholder="Descreva as características do produto..."></textarea>
                    </div>

                    <div class="campo-formulario">
                        <label class="rotulo-campo">Status</label>
                        <div class="opcoes-radio">
                            <div class="opcao-radio">
                                <input type="radio" id="em-estoque" name="status" value="em-estoque" checked>
                                <label for="em-estoque" class="rotulo-radio">Em estoque</label>
                            </div>
                            <div class="opcao-radio">
                                <input type="radio" id="fora-estoque" name="status" value="fora-estoque">
                                <label for="fora-estoque" class="rotulo-radio">Fora de estoque</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="area-upload">
                <div class="container-upload" id="container-upload" onclick="document.getElementById('input-arquivo').click()">
                    <input type="file" id="input-arquivo" name="imagens-produto[]" accept=".jpeg,.jpg,.png" multiple style="display: none;">
                    <div class="conteudo-upload" id="conteudo-upload">
                        <div class="icone-upload">📁</div>
                        <div class="texto-upload">
                            Drag & Drop or <span class="texto-vermelho">choose files</span> to upload
                        </div>
                        <div class="texto-formatos">Formatos suportados: .jpeg, .png (máximo 4 imagens)</div>
                    </div>
                </div>
                
                <div class="grid-preview" id="grid-preview" style="display: none;">
                    <div class="preview-item" id="preview-0" style="display: none;">
                        <img class="imagem-preview" src="" alt="Preview 1">
                        <div class="overlay-preview">
                            <button type="button" class="botao-remover" onclick="removerImagemEspecifica(0)">✕</button>
                            <div class="numero-imagem">1</div>
                        </div>
                    </div>
                    <div class="preview-item" id="preview-1" style="display: none;">
                        <img class="imagem-preview" src="" alt="Preview 2">
                        <div class="overlay-preview">
                            <button type="button" class="botao-remover" onclick="removerImagemEspecifica(1)">✕</button>
                            <div class="numero-imagem">2</div>
                        </div>
                    </div>
                    <div class="preview-item" id="preview-2" style="display: none;">
                        <img class="imagem-preview" src="" alt="Preview 3">
                        <div class="overlay-preview">
                            <button type="button" class="botao-remover" onclick="removerImagemEspecifica(2)">✕</button>
                            <div class="numero-imagem">3</div>
                        </div>
                    </div>
                    <div class="preview-item" id="preview-3" style="display: none;">
                        <img class="imagem-preview" src="" alt="Preview 4">
                        <div class="overlay-preview">
                            <button type="button" class="botao-remover" onclick="removerImagemEspecifica(3)">✕</button>
                            <div class="numero-imagem">4</div>
                        </div>
                    </div>
                </div>
                
                <div class="botao-adicionar-mais" id="botao-adicionar-mais" style="display: none;" onclick="document.getElementById('input-arquivo').click()">
                    <span class="icone-mais">+</span>
                    <span class="texto-adicionar">Adicionar mais imagens</span>
                    <span class="contador-imagens" id="contador-imagens">(0/4)</span>
                </div>
            </div>

            <div class="botoes-acao">
                <button type="button" class="botao-cancelar">Cancelar</button>
                <button type="submit" class="botao-adicionar">Adicionar</button>
            </div>
        </form>
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
        const inputArquivo = document.getElementById('input-arquivo');
        const containerUpload = document.getElementById('container-upload');
        const conteudoUpload = document.getElementById('conteudo-upload');
        const gridPreview = document.getElementById('grid-preview');
        const botaoAdicionarMais = document.getElementById('botao-adicionar-mais');
        const contadorImagens = document.getElementById('contador-imagens');
        
        let imagensCarregadas = [];
        const maxImagens = 4;

        inputArquivo.addEventListener('change', function(e) {
            const arquivos = Array.from(e.target.files);
            processarArquivos(arquivos);
        });

        containerUpload.addEventListener('dragover', function(e) {
            e.preventDefault();
            containerUpload.style.backgroundColor = '#f0f0f0';
            containerUpload.style.borderColor = '#FF0000';
        });

        containerUpload.addEventListener('dragleave', function(e) {
            e.preventDefault();
            containerUpload.style.backgroundColor = '#fafafa';
            containerUpload.style.borderColor = '#FF0000';
        });

        containerUpload.addEventListener('drop', function(e) {
            e.preventDefault();
            containerUpload.style.backgroundColor = '#fafafa';
            containerUpload.style.borderColor = '#FF0000';
            
            const arquivos = Array.from(e.dataTransfer.files);
            processarArquivos(arquivos);
        });

        function processarArquivos(arquivos) {
            const arquivosImagem = arquivos.filter(arquivo => arquivo.type.startsWith('image/'));
            
            if (arquivosImagem.length === 0) {
                alert('Por favor, selecione apenas arquivos de imagem (.jpeg, .jpg, .png)');
                return;
            }

            const espacosDisponiveis = maxImagens - imagensCarregadas.length;
            const arquivosParaProcessar = arquivosImagem.slice(0, espacosDisponiveis);

            if (arquivosImagem.length > espacosDisponiveis) {
                alert(`Você pode adicionar no máximo ${maxImagens} imagens. ${espacosDisponiveis} imagens serão adicionadas.`);
            }

            arquivosParaProcessar.forEach(arquivo => {
                adicionarImagem(arquivo);
            });

            inputArquivo.value = '';
        }

        function adicionarImagem(arquivo) {
            if (imagensCarregadas.length >= maxImagens) {
                alert(`Máximo de ${maxImagens} imagens permitido.`);
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const indice = imagensCarregadas.length;
                imagensCarregadas.push({
                    arquivo: arquivo,
                    dataUrl: e.target.result
                });

                mostrarPreview(indice, e.target.result);
                atualizarInterface();
            };
            reader.readAsDataURL(arquivo);
        }

        function mostrarPreview(indice, dataUrl) {
            const previewItem = document.getElementById(`preview-${indice}`);
            const imagemPreview = previewItem.querySelector('.imagem-preview');
            
            imagemPreview.src = dataUrl;
            previewItem.style.display = 'block';
        }

        function removerImagemEspecifica(indice) {
            imagensCarregadas.splice(indice, 1);
            reorganizarPreviews();
            atualizarInterface();
        }

        function reorganizarPreviews() {
            for (let i = 0; i < maxImagens; i++) {
                const previewItem = document.getElementById(`preview-${i}`);
                previewItem.style.display = 'none';
                previewItem.querySelector('.imagem-preview').src = '';
            }

            imagensCarregadas.forEach((imagem, indice) => {
                mostrarPreview(indice, imagem.dataUrl);
            });
        }

        function atualizarInterface() {
            const totalImagens = imagensCarregadas.length;
            
            contadorImagens.textContent = `(${totalImagens}/${maxImagens})`;
            
            if (totalImagens === 0) {
                conteudoUpload.style.display = 'block';
                gridPreview.style.display = 'none';
                botaoAdicionarMais.style.display = 'none';
            } else {
                conteudoUpload.style.display = 'none';
                gridPreview.style.display = 'grid';
                
                if (totalImagens < maxImagens) {
                    botaoAdicionarMais.style.display = 'flex';
                } else {
                    botaoAdicionarMais.style.display = 'none';
                }
            }

            atualizarInputFile();
        }

        function atualizarInputFile() {
            const dt = new DataTransfer();
            imagensCarregadas.forEach(imagem => {
                dt.items.add(imagem.arquivo);
            });
            inputArquivo.files = dt.files;
        }

        function removerTodasImagens() {
            imagensCarregadas = [];
            reorganizarPreviews();
            atualizarInterface();
        }
    </script>

</body>
</html>