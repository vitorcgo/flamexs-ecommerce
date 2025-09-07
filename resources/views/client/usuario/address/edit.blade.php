<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Editar Endereço - Flamexs')
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
                    <div class="secao-endereco">
                        <div class="cabecalho-secao">
                            <h3 class="titulo-secao">EDITAR ENDEREÇO</h3>
                        </div>

                        <div class="campos-usuario">
                            <div class="campo-exibicao">
                                <span class="valor-campo">Rua das Flores, 123</span>
                            </div>
                            <div class="campo-exibicao">
                                <span class="valor-campo">Jardim Primavera</span>
                            </div>
                            <div class="campo-exibicao">
                                <span class="valor-campo">São Paulo - SP</span>
                            </div>
                            <div class="campo-exibicao">
                                <span class="valor-campo">01234-567</span>
                            </div>
                        </div>

                        <div class="btn-caixa">
                            <button class="btn-cancelar"><a href="/user">Cancelar</a></button>
                            <button class="btn-salvar"><a href="">Salvar Alterações</a></button>
                        </div>
                    </div>



                @endsection
