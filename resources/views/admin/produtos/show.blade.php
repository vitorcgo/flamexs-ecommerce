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
                    <div class="valor-campo">-</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Categoria</label>
                    <div class="valor-campo">-</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Valor</label>
                    <div class="valor-campo valor-preco">R$ 0,00</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Estoque</label>
                    <div class="valor-campo">0 unidades</div>
                </div>
            </div>

            <div class="coluna-direita">
                <div class="campo-visualizacao">
                    <label class="rotulo-campo">ID do Produto</label>
                    <div class="valor-campo">#000</div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Tamanhos Disponíveis</label>
                    <div class="tamanhos-disponiveis">
                        <span class="tamanho-badge">Nenhum tamanho cadastrado</span>
                    </div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Descrição</label>
                    <div class="valor-campo descricao-texto">
                        Nenhuma descrição cadastrada
                    </div>
                </div>

                <div class="campo-visualizacao">
                    <label class="rotulo-campo">Status</label>
                    <div class="status-badge status-inativo">Inativo</div>
                </div>
            </div>
        </div>

        <div class="galeria-imagens">
            <h3 class="titulo-galeria">Imagens do Produto</h3>
            <div class="grid-imagens">
                <div class="sem-imagens">
                    <p>Nenhuma imagem cadastrada para este produto</p>
                </div>
            </div>
        </div>

        <div class="botoes-acao">
            <button type="button" class="botao-voltar" onclick="window.location.href='/admin/produtos/index'">Voltar</button>
            <button type="button" class="botao-editar" onclick="window.location.href='/admin/produtos/edit/1'">Editar Produto</button>
        </div>
    </div>
</main>
@endsection