@extends('admin.layouts.main')
@section('title', 'Visualizar Produto - Painel de Controle')

@section('content')
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
                    <div class="valor-campo">{{ $product->name }}</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Categoria</label>
                    <div class="valor-campo">{{ $product->category }}</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Valor</label>
                    <div class="valor-campo valor-preco">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                </div>
            </div>

            <div class="coluna-direita">
                <div class="campo-visualizacao">
                    <label class="rotulo-campo">ID do Produto</label>
                    <div class="valor-campo">#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Estoque por Tamanho</label>
                    <div class="estoque-tamanhos-visualizacao">
                        <div class="item-estoque {{ ($sizes['P'] ?? 0) > 0 ? 'com-estoque' : '' }}">
                            <span class="tamanho-label">P:</span>
                            <span class="quantidade-estoque">{{ $sizes['P'] ?? 0 }} unidades</span>
                        </div>
                        <div class="item-estoque {{ ($sizes['M'] ?? 0) > 0 ? 'com-estoque' : '' }}">
                            <span class="tamanho-label">M:</span>
                            <span class="quantidade-estoque">{{ $sizes['M'] ?? 0 }} unidades</span>
                        </div>
                        <div class="item-estoque {{ ($sizes['G'] ?? 0) > 0 ? 'com-estoque' : '' }}">
                            <span class="tamanho-label">G:</span>
                            <span class="quantidade-estoque">{{ $sizes['G'] ?? 0 }} unidades</span>
                        </div>
                        <div class="item-estoque {{ ($sizes['GG'] ?? 0) > 0 ? 'com-estoque' : '' }}">
                            <span class="tamanho-label">GG:</span>
                            <span class="quantidade-estoque">{{ $sizes['GG'] ?? 0 }} unidades</span>
                        </div>
                    </div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Descrição</label>
                    <div class="valor-campo descricao-texto">
                        {{ $product->description ?? 'Nenhuma descrição cadastrada' }}
                    </div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Status</label>
                    <div class="status-badge {{ $product->status == 'available' ? 'status-ativo' : 'status-inativo' }}">
                        {{ $product->status == 'available' ? 'Ativo' : 'Inativo' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="galeria-imagens">
            <h3 class="titulo-galeria">Imagens do Produto</h3>
            <div class="grid-imagens">
                @if($product->media->count() > 0)
                    @foreach($product->media as $media)
                        <div class="item-imagem">
                            <img src="{{ $media->image_data_url }}" alt="{{ $product->name }}" class="imagem-galeria">
                            <div class="info-imagem">
                                <p class="nome-arquivo">{{ $media->original_name }}</p>
                                <p class="tamanho-arquivo">{{ $media->formatted_file_size }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="item-imagem">
                        <img src="{{ $product->first_image }}" alt="{{ $product->name }}" class="imagem-galeria">
                        <p class="legenda-imagem">Imagem padrão (baseada no ID do produto)</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="botoes-acao">
            <button type="button" class="botao-voltar" onclick="window.location.href='{{ route('admin.produtos.index') }}'">Voltar</button>
            <button type="button" class="botao-editar" onclick="window.location.href='{{ route('admin.produtos.edit', $product->id) }}'">Editar Produto</button>
        </div>
    </div>
</main>
@endsection