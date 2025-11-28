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
                <input type="text" class="entrada-busca" placeholder="Pesquisar produtos..." id="pesquisaProdutosAdmin">
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

    </main>


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

            // Pesquisa de produtos em tempo real
            const inputPesquisa = document.getElementById('pesquisaProdutosAdmin');
            const cards = document.querySelectorAll('.card-produto');
            const gradeProdutos = document.querySelector('.grade-produtos');

            if (inputPesquisa) {
                inputPesquisa.addEventListener('keyup', function(e) {
                    const termo = e.target.value.toLowerCase().trim();
                    let produtosVisiveis = 0;

                    cards.forEach(card => {
                        const nome = card.querySelector('.nome-produto').textContent.toLowerCase();
                        const id = card.querySelector('.id-produto').textContent.toLowerCase();
                        const preco = card.querySelector('.preco-atual').textContent.toLowerCase();

                        if (nome.includes(termo) || id.includes(termo) || preco.includes(termo) || termo === '') {
                            card.style.display = '';
                            produtosVisiveis++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Mostrar mensagem se nenhum produto foi encontrado
                    let semProdutos = gradeProdutos.querySelector('.sem-produtos-pesquisa');
                    if (produtosVisiveis === 0 && termo !== '') {
                        if (!semProdutos) {
                            semProdutos = document.createElement('div');
                            semProdutos.className = 'sem-produtos-pesquisa';
                            semProdutos.style.cssText = 'grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #666;';
                            semProdutos.innerHTML = `
                                <div style="font-size: 48px; margin-bottom: 20px;">🔍</div>
                                <h3 style="font-size: 24px; margin-bottom: 10px; color: #333;">Nenhum produto encontrado</h3>
                                <p style="font-size: 16px;">Tente buscar por outro termo</p>
                            `;
                            gradeProdutos.appendChild(semProdutos);
                        }
                    } else if (semProdutos && termo === '') {
                        semProdutos.remove();
                    }
                });
            }
        });
    </script>
@endsection
