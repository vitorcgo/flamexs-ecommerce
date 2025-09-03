@extends('admin.layouts.main')
@section('title', 'Editar Administrador - Painel de Controle')

@section('content')
<main class="painel-adicionar-admin">
    <div class="cabecalho-adicionar-admin">
        <h1 class="titulo-adicionar-admin">Editar administrador</h1>
        <nav class="breadcrumb-admin">
            <a href="/admin/administradores" class="breadcrumb-link">Administradores</a>
            <span class="breadcrumb-separador">></span>
            <span class="breadcrumb-atual">Editar administrador</span>
        </nav>
    </div>

    <div class="container-formulario-admin">
        <form class="formulario-admin" id="formEditarAdmin" action="/admin/administradores/{{$admin->id}}" method="post">
            @method('PUT')
            @csrf    
        <input type="hidden" id="adminId" name="id" value="">
            
            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="user">Nome</label>
                <input 
                    type="text" 
                    class="campo-input-admin" 
                    id="user" 
                    name="user" 
                    placeholder="Digite o nome do administrador"
                    value="{{$admin->user}}"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="email">E-mail</label>
                <input 
                    type="email" 
                    class="campo-input-admin" 
                    id="email" 
                    name="email" 
                    placeholder="Digite o e-mail do administrador"
                     value="{{$admin->email}}"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="password">Nova Senha (deixe em branco para manter a atual)</label>
                <input 
                    type="password" 
                    class="campo-input-admin" 
                    id="password" 
                    name="password" 
                    placeholder="Digite a nova senha (opcional)"
                    
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="profile_photo_path">Upload Foto</label>
                <div class="area-upload" id="areaUpload">
                    <input type="file" class="input-arquivo" id="profile_photo_path" accept="image/jpeg,image/png" name="profile_photo_path" hidden>
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
                        <img class="imagem-preview" id="imagemPreview" src="{{$admin->profile_photo_path}}" alt="Preview">
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
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const areaUpload = document.getElementById('areaUpload');
    const profile_photo_path = document.getElementById('profile_photo_path');
    const previewImagem = document.getElementById('previewImagem');
    const imagemPreview = document.getElementById('imagemPreview');
    const removerImagem = document.getElementById('removerImagem');
    const conteudoUpload = document.querySelector('.conteudo-upload');

    areaUpload.addEventListener('click', function(e) {
        if (e.target !== removerImagem && !removerImagem.contains(e.target)) {
            profile_photo_path.click();
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

});
</script>
@endsection