@extends('client.layouts.main')
@section('title', 'Minha Conta - Flamexs')

@section('content')
<link rel="stylesheet" href="/css/perfil-usuario.css">

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
                        <button class="botao-editar">EDITAR</button>
                    </div>
                    
                    <div class="campos-usuario">
                        <div class="campo-exibicao">
                            <span class="valor-campo">João Silva Santos</span>
                        </div>
                        <div class="campo-exibicao">
                            <span class="valor-campo">joao.silva@email.com</span>
                        </div>
                        <div class="campo-exibicao">
                            <span class="valor-campo">(11) 99999-9999</span>
                        </div>
                        <div class="campo-exibicao">
                            <span class="valor-campo">123.456.789-00</span>
                        </div>
                    </div>
                </div>

                <!-- Seção Endereço -->
                <div class="secao-endereco">
                    <div class="cabecalho-secao">
                        <h2 class="titulo-secao">ENDEREÇO</h2>
                        <button class="botao-editar">EDITAR</button>
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
                </div>

                <!-- Botão Finalizar Sessão -->
                <button class="botao-finalizar-sessao">FINALIZAR SESSÃO</button>
            </div>
        </div>

        <!-- Coluna Direita - Pedidos -->
        <div class="coluna-direita">
            <div class="lista-pedidos">
                <!-- Pedido 1 -->
                <div class="item-pedido">
                    <div class="cabecalho-pedido" onclick="alternarPedido('pedido-1')">
                        <div class="info-pedido">
                            <span class="numero-pedido">#1001</span>
                            <span class="data-pedido">15/12/2024</span>
                        </div>
                        <div class="icone-expandir" id="icone-pedido-1">+</div>
                    </div>
                    
                    <div class="conteudo-pedido" id="conteudo-pedido-1">
                        <div class="caixa-expandida">
                            <div class="detalhes-pedido">
                                <div class="coluna-info">
                                    <div class="status-pedido">
                                        <span class="badge-status">Entregue</span>
                                    </div>
                                    <div class="total-pedido">R$ 149,90</div>
                                    <button class="botao-acompanhar">ACOMPANHAR PEDIDO</button>
                                </div>
                                <div class="coluna-produto">
                                    <img src="/images/cocada.png" alt="Produto" class="imagem-produto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pedido 2 -->
                <div class="item-pedido">
                    <div class="cabecalho-pedido" onclick="alternarPedido('pedido-2')">
                        <div class="info-pedido">
                            <span class="numero-pedido">#1002</span>
                            <span class="data-pedido">10/12/2024</span>
                        </div>
                        <div class="icone-expandir" id="icone-pedido-2">+</div>
                    </div>
                    
                    <div class="conteudo-pedido" id="conteudo-pedido-2">
                        <div class="caixa-expandida">
                            <div class="detalhes-pedido">
                                <div class="coluna-info">
                                    <div class="status-pedido">
                                        <span class="badge-status">Em Trânsito</span>
                                    </div>
                                    <div class="total-pedido">R$ 89,90</div>
                                    <button class="botao-acompanhar">ACOMPANHAR PEDIDO</button>
                                </div>
                                <div class="coluna-produto">
                                    <img src="/images/1.png" alt="Produto" class="imagem-produto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function alternarPedido(pedidoId) {
    const conteudo = document.getElementById('conteudo-' + pedidoId);
    const icone = document.getElementById('icone-' + pedidoId);
    
    if (conteudo.style.maxHeight && conteudo.style.maxHeight !== '0px') {
        conteudo.style.maxHeight = '0px';
        icone.textContent = '+';
    } else {
        conteudo.style.maxHeight = conteudo.scrollHeight + 'px';
        icone.textContent = '✔';
    }
}
</script>

@endsection