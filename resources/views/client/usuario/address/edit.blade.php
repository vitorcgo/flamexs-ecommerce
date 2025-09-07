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

                        <form method="POST" action="">
                            @csrf
                            <div class="campos-usuario">
                                <div class="campo-exibicao">
                                    <input type="text" name="address" class="valor-campo" value="Rua das Flores, 123" placeholder="Endereço" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="neighborhood" class="valor-campo" value="Jardim Primavera" placeholder="Bairro" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="city_state" class="valor-campo" value="São Paulo - SP" placeholder="Cidade - Estado" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="zipcode" class="valor-campo" value="01234-567" placeholder="CEP" required>
                                </div>
                            </div>

                            <div class="btn-caixa">
                                <a href="/user" class="btn-cancelar">Cancelar</a>
                                <button type="submit" class="btn-salvar">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>



                @endsection
