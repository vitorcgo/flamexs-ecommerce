<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Editar Perfil - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')


<!-- Faixa de Frete Grátis -->
<div id="faixa-frete-gratis" class="faixa-frete-gratis">
    <div class="conteudo-faixa-rolante">
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
    </div>
</div>

<div class="container-perfil-usuario">
    <div class="layout-duas-colunas">
        <!-- Coluna Esquerda - Dados do Usuário -->
        <div class="coluna-esquerda">
            <div class="caixa-dados-usuario">
                <!-- Seção Informações da Conta -->
                <div class="secao-conta">
                    <div class="cabecalho-secao">
                        <h2 class="titulo-secao">INFORMAÇÕES DA CONTA</h2>
                    </div>
                    
                {{-- Em resources/views/client/usuario/user/edit.blade.php --}}

                {{-- O NOME DA ROTA 'user.info.update' SERÁ CRIADO NO PASSO 2 --}}
                <form method="POST" action="{{ route('user.info.update') }}">
                    @csrf
                    @method('PATCH') {{-- <-- Método HTTP correto para atualização parcial --}}

                    <div class="campos-usuario">
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: name="full_name" e value dinâmico --}}
                            <input type="text" name="full_name" class="valor-campo" value="{{ old('full_name', auth()->user()->full_name) }}" placeholder="Nome completo" required>
                        </div>
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: value dinâmico --}}
                            <input type="email" name="email" class="valor-campo" value="{{ old('email', auth()->user()->email) }}" placeholder="E-mail" required>
                        </div>
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: value dinâmico --}}
                            <input type="tel" name="phone" class="valor-campo" value="{{ old('phone', auth()->user()->phone) }}" placeholder="Telefone" required>
                        </div>
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: value dinâmico --}}
                            <input type="text" name="cpf" class="valor-campo" value="{{ old('cpf', auth()->user()->cpf) }}" placeholder="CPF" required>
                        </div>
                    </div>

                    <div class="btn-caixa">
                        <a href="/user" class="btn-cancelar">Cancelar</a>
                        <button type="submit" class="btn-salvar">Salvar Alterações</button>
                    </div>
                </form>
                    <div class="btn-caixa">
                        <a href="/user/info/password" class="btn-senha">Quer mudar sua senha?</a>
                    </div>
                </div>


@endsection