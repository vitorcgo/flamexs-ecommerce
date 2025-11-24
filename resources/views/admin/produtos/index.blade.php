@extends('admin.layouts.main')
@section('title', 'Produtos - Painel de Controle')

@section('content')
    <main class="cabecalho-conteudo">
        <h1 class="titulo-principal">Produtos</h1>

        @if (session('success'))
            <div class="alert alert-success"
                style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error"
                style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                {{ session('error') }}
            </div>
        @endif

        <div class="barra-acoes">
            <div class="campo-busca">
                <svg class="icone-busca" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" class="entrada-busca" placeholder="Pesquisar produtos...">
            </div>

            <div>
            <a href="{{ route('admin.produtos.create') }}" class="botao-adicionar">
                    <svg class="icone-adicionar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Adicionar
                </a>
                </div>
        </div>

        <div class="container-produtos">
            <div class="grade-produtos">
                @forelse($products as $product)
                    <div class="card-produto">
                        <div class="id-produto">#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }} -
                            <span class="status-produto {{ $product->status == 'available' ? 'ativo' : 'inativo' }}">
                                {{ $product->status == 'available' ? 'Ativo' : 'Inativo' }}
                            </span>
                        </div>

                        <div class="container-imagem">
                            <img src="{{ $product->first_image }}" alt="{{ $product->name }}" class="imagem-produto">
                        </div>
                        <div class="info-produto">
                            <div class="acoes-card">
                                <a href="{{ route('admin.produtos.show', $product->id) }}" class="acao-link">
                                    <img src="/images/ver.svg" alt="Visualizar" class="icone-acao-card">
                                </a>
                                <a href="{{ route('admin.produtos.edit', $product->id) }}" class="acao-link">
                                    <img src="/images/editar.svg" alt="Editar" class="icone-acao-card">
                                </a>
                                <form method="POST" action="{{ route('admin.produtos.destroy', $product->id) }}"
                                    style="display: inline;"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este produto? Esta ação não pode ser desfeita.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="acao-link"
                                        style="border: none; background: none; padding: 0; cursor: pointer;">
                                        <img src="/images/deletar.svg" alt="Excluir" class="icone-acao-card">
                                    </button>
                                </form>
                            </div>
                            <h3 class="nome-produto">{{ $product->name }}</h3>
                            <div class="precos">
                                <span class="preco-atual">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                            </div>
                            <div class="info-adicional">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="sem-produtos">
                        <div class="icone-sem-produtos">📦</div>
                        <h3>Nenhum produto encontrado</h3>
                        <p>Comece adicionando seu primeiro produto ao catálogo.</p>
                        <a href="{{ route('admin.produtos.create') }}" class="botao-adicionar-primeiro">
                            Adicionar Primeiro Produto
                        </a>
                    </div>
                @endforelse
            </div>
        </div>


        </div>

        {{-- <!-- Modal de Filtros -->
        <div class="modal-overlay-filtros" id="modalFiltros">
            <div class="modal-container-filtros">
                <div class="modal-header-filtros">
                    <h2 class="modal-titulo-filtros">Filtros</h2>
                    <button class="modal-fechar-filtros" onclick="fecharModalFiltros()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <div class="modal-body-filtros">
                    <div class="campo-pesquisa-modal">
                        <svg class="icone-pesquisa-modal" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        <input type="text" class="input-pesquisa-modal" placeholder="Pesquisar...">
                    </div>

                    <div class="secao-filtro">
                        <h3 class="subtitulo-filtro">Categorias</h3>
                        <div class="grid-checkboxes">
                            <div class="coluna-checkboxes">
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="camisetas">
                                    <span class="checkmark"></span>
                                    {{}}
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="shorts">
                                    <span class="checkmark"></span>
                                    Shorts
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="calcas">
                                    <span class="checkmark"></span>
                                    Calças
                                </label>
                            </div>
                            <div class="coluna-checkboxes">
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="bones">
                                    <span class="checkmark"></span>
                                    Bonés
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="meias">
                                    <span class="checkmark"></span>
                                    Meias
                                </label>
                                <label class="checkbox-filtro">
                                    <input type="checkbox" name="categoria" value="acessorios">
                                    <span class="checkmark"></span>
                                    Acessórios
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="secao-filtro">
                        <h3 class="subtitulo-filtro">Status</h3>
                        <div class="radio-group">
                            <label class="radio-filtro">
                                <input type="radio" name="status" value="todos" checked>
                                <span class="radiomark"></span>
                                Todos
                            </label>
                            <label class="radio-filtro">
                                <input type="radio" name="status" value="ativo">
                                <span class="radiomark"></span>
                                Ativo
                            </label>
                            <label class="radio-filtro">
                                <input type="radio" name="status" value="inativo">
                                <span class="radiomark"></span>
                                Inativo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer-filtros">
                    <button type="button" class="botao-resetar-filtros" onclick="resetarFiltros()">
                        Resetar
                    </button>
                    <button type="button" class="botao-aplicar-filtros" onclick="aplicarFiltros()">
                        Aplicar Filtros
                    </button>
                </div>
            </div>
        </div> --}}
    </main>

    {{-- <script>
        function abrirModalFiltros() {
            document.getElementById('modalFiltros').classList.add('ativo');
            document.body.style.overflow = 'hidden';
        }

        function fecharModalFiltros() {
            document.getElementById('modalFiltros').classList.remove('ativo');
            document.body.style.overflow = '';
        }

        function resetarFiltros() {
            const checkboxes = document.querySelectorAll('#modalFiltros input[type="checkbox"]');
            const radios = document.querySelectorAll('#modalFiltros input[type="radio"]');
            const pesquisa = document.querySelector('.input-pesquisa-modal');

            checkboxes.forEach(checkbox => checkbox.checked = false);
            radios.forEach(radio => radio.checked = radio.value === 'todos');
            pesquisa.value = '';
        }

        function aplicarFiltros() {
            const categorias = [];
            const checkboxes = document.querySelectorAll('#modalFiltros input[name="categoria"]:checked');
            checkboxes.forEach(checkbox => categorias.push(checkbox.value));

            const status = document.querySelector('#modalFiltros input[name="status"]:checked').value;
            const pesquisa = document.querySelector('.input-pesquisa-modal').value;

            console.log('Filtros aplicados:', {
                categorias: categorias,
                status: status,
                pesquisa: pesquisa
            });

            fecharModalFiltros();
        }


        // Fechar modal ao clicar no overlay
        document.getElementById('modalFiltros').addEventListener('click', function(e) {
            if (e.target === this) {
                fecharModalFiltros();
            }
        });

        // Fechar modal com ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalFiltros();
            }
        });
    </script> --}}

    <script src="/js/admin/produtos.js"></script>

    <script>
        // Auto-ocultar mensagens de alerta após 5 segundos
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 5000);
            });
        });
    </script>
@endsection
