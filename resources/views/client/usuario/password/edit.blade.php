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
                    
                    <form method="POST" action="">
                        @csrf
                        <div class="campos-usuario">
                            <div class="campo-exibicao">
                                <input type="password" name="current_password" class="valor-campo" placeholder="Confirme sua senha" required>
                            </div>
                            <div class="campo-exibicao">
                                <input type="password" name="new_password" class="valor-campo" placeholder="Coloque sua nova senha" required>
                            </div>
                            <div class="campo-exibicao">
                                <input type="password" name="new_password_confirmation" class="valor-campo" placeholder="Confirme sua nova senha" required>
                            </div>
                        </div>

                        <div class="btn-caixa">
                            <a href="/user" class="btn-cancelar">Cancelar</a>
                            <button type="submit" class="btn-salvar">Salvar Alterações</button>
                        </div>
                    </form>

@endsection