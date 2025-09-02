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
        {{-- O formulário precisa usar action e method para se comunicar com o Laravel --}}
        <form class="formulario-admin" action="/admin/administradores" method="POST" enctype="multipart/form-data">
            {{-- Adicione o token CSRF de segurança --}}
            @csrf

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="nomeAdmin">Nome</label>
                {{-- O atributo 'name' deve corresponder ao nome da coluna no seu banco de dados --}}
                <input
                    type="text"
                    class="campo-input-admin"
                    id="nomeAdmin"
                    name="user"
                    placeholder="Digite o nome do administrador"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin" for="emailAdmin">E-mail</label>
                {{-- O atributo 'name' deve ser 'email' --}}
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
                {{-- O atributo 'name' deve ser 'password' --}}
                <input
                    type="password"
                    class="campo-input-admin"
                    id="senhaAdmin"
                    name="password"
                    placeholder="Digite a senha do administrador"
                    required
                >
            </div>

            <div class="campo-grupo-admin">
                <label class="campo-label-admin">Upload Foto</label>
                <div class="area-upload" id="areaUpload">
                    {{-- O 'name' deve ser 'profile_photo_path' para salvar no banco --}}
                    <input type="file" class="input-arquivo" id="inputArquivo" name="profile_photo_path" accept="image/jpeg,image/png" hidden>
                    <div class="conteudo-upload">
                         {{-- Seu SVG e texto... --}}
                    </div>
                    <div class="preview-imagem" id="previewImagem" style="display: none;">
                        <img class="imagem-preview" id="imagemPreview" src="" alt="Preview">
                        <button type="button" class="botao-remover-imagem" id="removerImagem">
                            {{-- Seu SVG de remover... --}}
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

{{-- Mantenha apenas o JavaScript para o preview da imagem --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ... (código do JavaScript para o upload e preview da imagem) ...
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

        // Remova o código JavaScript de submissão do formulário
        // document.getElementById('formAdicionarAdmin').addEventListener('submit', function(e) { ... }

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
