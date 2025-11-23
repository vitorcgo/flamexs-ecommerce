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

        {{-- BLOCO DE CÓDIGO ADICIONADO PARA EXIBIR ERROS DE VALIDAÇÃO --}}
        @if ($errors->any())
            <div class="alert alert-danger"
                style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- FIM DO BLOCO DE ERROS --}}

        <div class="container-formulario-admin">
            <form class="formulario-admin" id="formAdicionarAdmin" action="/admin/administradores" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="campo-grupo-admin">
                    <label class="campo-label-admin" for="user">Nome</label>
                    <input type="text" class="campo-input-admin" id="user" name="user"
                        placeholder="Digite o nome do administrador" value="{{ old('user') }}" required>
                </div>

                <div class="campo-grupo-admin">
                    <label class="campo-label-admin" for="email">E-mail</label>
                    <input type="email" class="campo-input-admin" id="email" name="email"
                        placeholder="Digite o e-mail do administrador" value="{{ old('email') }}" required>
                </div>

                <div class="campo-grupo-admin">
                    <label class="campo-label-admin" for="password">Senha</label>
                    <input type="password" class="campo-input-admin" id="password" name="password"
                        placeholder="Digite a senha com mais de 8 caracteres!" required>
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
@endsection
