@extends('admin.layouts.main')
@section('title', 'Admin - Produtos')

@section('content')

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
                    <button class="botao-filtros" id="abrirModalFiltros">
                        <svg class="icone-filtros" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m0 12h9.75m-9.75 0a1.5 1.5 0 0 1 3 0m-3 0a1.5 1.5 0 0 0 3 0m0 0h3.75M7.5 18v-3m0 0a1.5 1.5 0 0 1 3 0m-3 0a1.5 1.5 0 0 0 3 0m0 3" />
                        </svg>
                        Filtros
                    </button>
                    <a href="/adm/produtos/create" class="botao-adicionar">
                        <svg class="icone-adicionar" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Adicionar produto
                    </a>
                </div>
            </div>
        </div>

        <div class="container-produtos">
            <div class="grade-produtos">
                <div class="card-produto" data-id="1">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="/adm/produtos/show/1" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="/adm/produtos/edit/1" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir" onclick="confirmarExclusao(1, 'produto')">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto" data-id="2">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="/adm/produtos/show/2" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="/adm/produtos/edit/2" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir" onclick="confirmarExclusao(2, 'produto')">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto" data-id="3">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="/adm/produtos/show/3" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="/adm/produtos/edit/3" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir" onclick="confirmarExclusao(3, 'produto')">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto" data-id="4">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="/adm/produtos/show/4" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="/adm/produtos/edit/4" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir" onclick="confirmarExclusao(4, 'produto')">
                                <img src="/images/deletar.svg.svg" alt="Excluir" class="icone-acao-card">
                            </a>
                        </div>
                        <h3 class="nome-produto">Short Metallic Ultimate</h3>
                        <div class="precos">
                            <span class="preco-atual">R$30,00</span>
                        </div>
                    </div>
                </div>

                <div class="card-produto" data-id="5">
                    <div class="container-imagem">
                        <img src="/images/1.png" alt="Short Metallic Ultimate" class="imagem-produto">
                    </div>
                    <div class="info-produto">
                        <div class="acoes-card">
                            <a href="/adm/produtos/show/5" class="acao-link" title="Visualizar">
                                <img src="/images/ver.svg.svg" alt="Ver" class="icone-acao-card">
                            </a>
                            <a href="/adm/produtos/edit/5" class="acao-link" title="Editar">
                                <img src="/images/editar.svg.svg" alt="Editar" class="icone-acao-card">
                            </a>
                            <a href="#" class="acao-link" title="Excluir" onclick="confirmarExclusao(5, 'produto')">
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

        {{-- Modal de Filtros --}}
        <div class="modal-overlay-filtros" id="modalFiltros">
            <div class="modal-container-filtros">
                <div class="modal-header-filtros">
                    <h2 class="modal-titulo-filtros">Filtros</h2>
                    <button class="modal-fechar-filtros" id="fecharModalFiltros">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                
                <div class="modal-body-filtros">
                    {{-- Campo de Pesquisa --}}
                    <div class="campo-pesquisa-modal">
                        <svg class="icone-pesquisa-modal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        <input type="text" class="input-pesquisa-modal" placeholder="Pesquisar">
                    </div>

                    {{-- Seção Geral --}}
                    <div class="secao-filtro">
                        <h3 class="subtitulo-filtro">Geral</h3>
                        <div class="grid-checkboxes">
                            <div class="coluna-checkboxes">
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="camisetas">
                                    <span class="checkmark"></span>
                                    Camisetas
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="calcas">
                                    <span class="checkmark"></span>
                                    Calças
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="meias">
                                    <span class="checkmark"></span>
                                    Meias
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="tamanho" value="g">
                                    <span class="checkmark"></span>
                                    G
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="tamanho" value="p">
                                    <span class="checkmark"></span>
                                    P
                                </label>
                            </div>
                            <div class="coluna-checkboxes">
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="blusas-frio">
                                    <span class="checkmark"></span>
                                    Blusas de Frio
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="jaquetas">
                                    <span class="checkmark"></span>
                                    Jaquetas
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="tamanho" value="gg">
                                    <span class="checkmark"></span>
                                    GG
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="regatas">
                                    <span class="checkmark"></span>
                                    Regatas
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="tamanho" value="m">
                                    <span class="checkmark"></span>
                                    M
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Seção Status --}}
                    <div class="secao-filtro">
                        <h3 class="subtitulo-filtro">Status</h3>
                        <div class="radio-group">
                            <label class="radio-filtro">
                                <input type="radio" name="status" value="em-estoque" checked>
                                <span class="radiomark"></span>
                                Em estoque
                            </label>
                            <label class="radio-filtro">
                                <input type="radio" name="status" value="fora-estoque">
                                <span class="radiomark"></span>
                                Fora de Estoque
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer-filtros">
                    <button type="button" class="botao-resetar-filtros" id="resetarFiltros">
                        Resetar
                    </button>
                    <button type="button" class="botao-aplicar-filtros" id="aplicarFiltros">
                        Aplicar filtros
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Modal de Filtros
        const modalFiltros = document.getElementById('modalFiltros');
        const botaoAbrirModal = document.getElementById('abrirModalFiltros');
        const botaoFecharModal = document.getElementById('fecharModalFiltros');
        const botaoResetar = document.getElementById('resetarFiltros');
        const botaoAplicar = document.getElementById('aplicarFiltros');

        // Abrir modal
        botaoAbrirModal.addEventListener('click', function() {
            modalFiltros.classList.add('ativo');
            document.body.style.overflow = 'hidden';
        });

        // Fechar modal
        function fecharModalFiltros() {
            modalFiltros.classList.remove('ativo');
            document.body.style.overflow = '';
        }

        botaoFecharModal.addEventListener('click', fecharModalFiltros);

        // Fechar modal ao clicar no overlay
        modalFiltros.addEventListener('click', function(e) {
            if (e.target === modalFiltros) {
                fecharModalFiltros();
            }
        });

        // Fechar modal com ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalFiltros.classList.contains('ativo')) {
                fecharModalFiltros();
            }
        });

        // Resetar filtros
        botaoResetar.addEventListener('click', function() {
            // Desmarcar todos os checkboxes
            document.querySelectorAll('.checkbox-filtro input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
            
            // Selecionar "Em estoque" por padrão
            document.querySelector('input[value="em-estoque"]').checked = true;
            
            // Limpar campo de pesquisa
            document.querySelector('.input-pesquisa-modal').value = '';
            
            console.log('Filtros resetados');
        });

        // Aplicar filtros
        botaoAplicar.addEventListener('click', function() {
            const filtros = {
                categorias: [],
                tamanhos: [],
                status: '',
                pesquisa: document.querySelector('.input-pesquisa-modal').value
            };

            // Coletar checkboxes marcados
            document.querySelectorAll('.checkbox-filtro input[type="checkbox"]:checked').forEach(checkbox => {
                if (checkbox.name === 'categoria') {
                    filtros.categorias.push(checkbox.value);
                } else if (checkbox.name === 'tamanho') {
                    filtros.tamanhos.push(checkbox.value);
                }
            });

            // Coletar status selecionado
            const statusSelecionado = document.querySelector('input[name="status"]:checked');
            if (statusSelecionado) {
                filtros.status = statusSelecionado.value;
            }

            console.log('Filtros aplicados:', filtros);
            
            // Aqui você faria a requisição para filtrar os produtos
            alert('Filtros aplicados com sucesso!');
            
            fecharModalFiltros();
        });
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
    @endsection