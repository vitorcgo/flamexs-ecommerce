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
                    
                    <form method="POST" action="">
                        @csrf
                        <div class="campos-usuario">
                            <div class="campo-exibicao">
                                <input type="text" name="name" class="valor-campo" value="João Silva Santos" placeholder="Nome completo" required>
                            </div>
                            <div class="campo-exibicao">
                                <input type="email" name="email" class="valor-campo" value="joao.silva@email.com" placeholder="E-mail" required>
                            </div>
                            <div class="campo-exibicao">
                                <input type="tel" name="phone" class="valor-campo" value="(11) 99999-9999" placeholder="Telefone" required>
                            </div>
                            <div class="campo-exibicao">
                                <input type="text" name="cpf" class="valor-campo" value="123.456.789-00" placeholder="CPF" required>
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