@extends('admin.layouts.main')
@section('title', 'Adicionar Administrador - Painel de Controle')

@section('content')
<main class="painel-adicionar-admin">
    <div class="cabecalho-adicionar-admin">
        <h1 class="titulo-adicionar-admin">Adicionar administrador</h1>
        <nav class="breadcrumb-admin">
            <a href="/admin/administradores" class="breadcrumb-link">Administradores</a>
            <span class="breadcrumb-separador">></span>
            <span class="breadcrumb-atual">Adicionar administrador</span>
        </nav>
    </div>

    <div class="container-formulario-admin">
        <form class="formulario-admin" id="formAdicionarAdmin">
            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="nomeAdmin">Nome</label>
                <input 
                    type="text" 
                    class="campo-input-admin" 
                    id="nomeAdmin" 
                    name="nome" 
                    placeholder="Digite o nome do administrador"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="emailAdmin">E-mail</label>
                <input 
                    type="email" 
                    class="campo-input-admin" 
                    id="emailAdmin" 
                    name="email" 
                    placeholder="Digite o e-mail do administrador"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="senhaAdmin">Senha</label>
                <input 
                    type="password" 
                    class="campo-input-admin" 
                    id="senhaAdmin" 
                    name="senha" 
                    placeholder="Digite a senha do administrador"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin">Upload Foto</label>
                <div class="area-upload" id="areaUpload">
                    <input type="file" class="input-arquivo" id="inputArquivo" accept="image/jpeg,image/png" hidden>
                    <div class="conteudo-upload">
                        <svg class="icone-upload" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7,10 12,15 17,10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <p class="texto-upload">
                            Drag & Drop or <span class="link-upload">choose file</span> to upload
                        </p>
                        <p class="legenda-upload">Tamanhos suportados: jpeg, png</p>
                    </div>
                    <div class="preview-imagem" id="previewImagem" style="display: none;">
                        <img class="imagem-preview" id="imagemPreview" src="" alt="Preview">
                        <button type="button" class="botao-remover-imagem" id="removerImagem">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="botoes-formulario-admin">
                <a href="/admin/administradores" class="botao-cancelar-admin">
                    Cancelar
                </a>
                <button type="submit" class="botao-adicionar-form-admin">
                    Adicionar
                </button>
            </div>
        </form>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const areaUpload = document.getElementById('areaUpload');
    const inputArquivo = document.getElementById('inputArquivo');
    const previewImagem = document.getElementById('previewImagem');
    const imagemPreview = document.getElementById('imagemPreview');
    const removerImagem = document.getElementById('removerImagem');
    const conteudoUpload = document.querySelector('.conteudo-upload');

    areaUpload.addEventListener('click', function(e) {
        if (e.target !== removerImagem && !removerImagem.contains(e.target)) {
            inputArquivo.click();
        }
    });

    areaUpload.addEventListener('dragover', function(e) {
        e.preventDefault();
        areaUpload.classList.add('dragover');
    });

    areaUpload.addEventListener('dragleave', function(e) {
        e.preventDefault();
        areaUpload.classList.remove('dragover');
    });

    areaUpload.addEventListener('drop', function(e) {
        e.preventDefault();
        areaUpload.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            processarArquivo(files[0]);
        }
    });

    inputArquivo.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            processarArquivo(e.target.files[0]);
        }
    });

    function processarArquivo(arquivo) {
        if (!arquivo.type.match(/^image\/(jpeg|png)$/)) {
            alert('Apenas arquivos JPEG e PNG são suportados.');
            return;
        }

        if (arquivo.size > 5 * 1024 * 1024) {
            alert('O arquivo deve ter no máximo 5MB.');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            imagemPreview.src = e.target.result;
            conteudoUpload.style.display = 'none';
            previewImagem.style.display = 'flex';
        };
        reader.readAsDataURL(arquivo);
    }

    removerImagem.addEventListener('click', function(e) {
        e.stopPropagation();
        inputArquivo.value = '';
        imagemPreview.src = '';
        conteudoUpload.style.display = 'flex';
        previewImagem.style.display = 'none';
    });

    document.getElementById('formAdicionarAdmin').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const nome = formData.get('nome');
        const email = formData.get('email');
        const senha = formData.get('senha');
        
        console.log('Dados do administrador:', {
            nome: nome,
            email: email,
            senha: senha,
            foto: inputArquivo.files[0] ? inputArquivo.files[0].name : 'Nenhuma'
        });
        
        const botaoSubmit = this.querySelector('.botao-adicionar-form-admin');
        botaoSubmit.textContent = 'Adicionando...';
        botaoSubmit.disabled = true;
        
        setTimeout(() => {
            alert('Administrador adicionado com sucesso!');
            botaoSubmit.textContent = 'Adicionar';
            botaoSubmit.disabled = false;
        }, 2000);
    });

    document.querySelector('.painel-adicionar-admin').style.opacity = '0';
    document.querySelector('.painel-adicionar-admin').style.transform = 'translateY(20px)';
    
    setTimeout(() => {
        document.querySelector('.painel-adicionar-admin').style.transition = 'all 0.6s ease';
        document.querySelector('.painel-adicionar-admin').style.opacity = '1';
        document.querySelector('.painel-adicionar-admin').style.transform = 'translateY(0)';
    }, 100);
});
</script>
@endsection