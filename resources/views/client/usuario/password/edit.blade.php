<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Alterar Senha - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')

<div class="container-perfil-usuario">
    <div class="layout-duas-colunas">
        <!-- Coluna Esquerda - Dados do Usuário -->
        <div class="coluna-esquerda">
            <div class="caixa-dados-usuario">
                <!-- Seção Informações da Conta -->
                <div class="secao-conta">
                    <div class="cabecalho-secao">
                        <h2 class="titulo-secao">TROCA DE SENHA</h2>
                    </div>
                    
                    <form method="POST" action="{{ route('password.update') }}"> {{-- Rota padrão do Breeze --}}
                        @csrf
                        @method('PUT') {{-- O Laravel espera o método PUT para senhas --}}
                        <div class="campos-usuario">
                            <div class="campo-exibicao">
                                {{-- Nome padrão do Laravel para senha atual --}}
                                <input type="password" name="current_password" class="valor-campo" placeholder="Senha Atual" required>
                                @error('current_password') <span style="color:red">{{$message}}</span> @enderror
                            </div>
                            <div class="campo-exibicao">
                                {{-- Nome padrão do Laravel para nova senha --}}
                                <input type="password" name="password" class="valor-campo" placeholder="Nova Senha" required>
                                @error('password') <span style="color:red">{{$message}}</span> @enderror
                            </div>
                            <div class="campo-exibicao">
                                {{-- Nome padrão do Laravel para confirmação --}}
                                <input type="password" name="password_confirmation" class="valor-campo" placeholder="Confirme a Nova Senha" required>
                            </div>
                        </div>
                        <div class="btn-caixa">
                            <a href="/user" class="btn-cancelar">Cancelar</a>
                            <button type="submit" class="btn-salvar">Salvar Alterações</button>
                        </div>
                    </form>

@endsection