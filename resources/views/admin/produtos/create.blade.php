@extends('admin.layouts.main')
@section('title', 'Criar Produto - Painel de Controle')

@section('content')
<main class="container-principal">
    <div class="cabecalho-conteudo">
        <h1 class="titulo-principal">Adicionar Produto</h1>
        <div class="breadcrumbs">Produtos > Adicionar novo produto</div>
    </div>

    <form class="formulario-produto" method="POST" action="{{ route('admin.produtos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid-formulario">
            <div class="coluna-esquerda">
                <div class="campo-formulario">
                    <label for="nome-produto" class="rotulo-campo">Nome do Produto</label>
                    <input type="text" id="nome-produto" name="nome-produto" class="entrada-texto" placeholder="Digite o nome do produto">
                </div>

                <div class="campo-formulario">
                    <label for="categorias" class="rotulo-campo">Categorias</label>
                    <select id="categorias" name="categorias" class="selecao-campo" required>
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->name_category }}">{{ $category->name_category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="campo-formulario">
                    <label for="valor" class="rotulo-campo">Valor</label>
                    <div class="campo-com-icone">
                        <input type="text" id="valor" name="valor" class="entrada-texto" placeholder="Ex: R$ 99,90">
                        <div class="icone-informacao">i</div>
                    </div>
                </div>
            </div>

            <div class="coluna-direita">
                <div class="campo-formulario">
                    <label class="rotulo-campo">Estoque por Tamanho</label>
                    <div class="estoque-tamanhos">
                        <div class="campo-tamanho">
                            <label for="estoque-p" class="rotulo-tamanho">P</label>
                            <input type="number" id="estoque-p" name="estoque_p" class="entrada-quantidade" placeholder="0" min="0" value="0">
                        </div>
                        <div class="campo-tamanho">
                            <label for="estoque-m" class="rotulo-tamanho">M</label>
                            <input type="number" id="estoque-m" name="estoque_m" class="entrada-quantidade" placeholder="0" min="0" value="0">
                        </div>
                        <div class="campo-tamanho">
                            <label for="estoque-g" class="rotulo-tamanho">G</label>
                            <input type="number" id="estoque-g" name="estoque_g" class="entrada-quantidade" placeholder="0" min="0" value="0">
                        </div>
                        <div class="campo-tamanho">
                            <label for="estoque-gg" class="rotulo-tamanho">GG</label>
                            <input type="number" id="estoque-gg" name="estoque_gg" class="entrada-quantidade" placeholder="0" min="0" value="0">
                        </div>
                    </div>
                    <small class="texto-ajuda">Digite a quantidade disponível para cada tamanho. Deixe 0 se não houver estoque.</small>
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
                <input type="file" id="input-arquivo" name="imagens-produto[]" accept=".jpeg,.jpg,.png,.webp" multiple style="display: none;">
                <div class="conteudo-upload" id="conteudo-upload">
                    <div class="icone-upload">📁</div>
                    <div class="texto-upload">
                        Drag & Drop or <span class="texto-vermelho">choose files</span> to upload
                    </div>
                    <div class="texto-formatos">Formatos suportados: .jpeg, .png, .webp (máximo 4 imagens)</div>
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
            <button type="button" class="botao-cancelar" onclick="window.location.href='/admin/produtos/index'">Cancelar</button>
            <button type="submit" class="botao-adicionar">Adicionar</button>
        </div>
    </form>
</main>

<script>
// Script para ativar/desativar estilo dos rótulos de tamanho
document.addEventListener('DOMContentLoaded', function() {
    const camposQuantidade = document.querySelectorAll('.entrada-quantidade');
    
    camposQuantidade.forEach(function(campo) {
        const rotuloTamanho = campo.parentElement.querySelector('.rotulo-tamanho');
        
        // Verificar valor inicial
        verificarValor(campo, rotuloTamanho);
        
        // Adicionar event listeners
        campo.addEventListener('input', function() {
            verificarValor(campo, rotuloTamanho);
        });
        
        campo.addEventListener('change', function() {
            verificarValor(campo, rotuloTamanho);
        });
    });
    
    function verificarValor(campo, rotulo) {
        const valor = parseInt(campo.value) || 0;
        if (valor > 0) {
            rotulo.classList.add('ativo');
        } else {
            rotulo.classList.remove('ativo');
        }
    }
});

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
        alert('Por favor, selecione apenas arquivos de imagem (.jpeg, .jpg, .png, .webp)');
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
@endsection