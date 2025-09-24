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
                <div class="secao-conta">
                    <div class="cabecalho-secao">
                        <h2 class="titulo-secao">INFORMAÇÕES DA CONTA</h2>
                         <!--  Exibir a Mensagem de Sucesso -->
                        @if (session('status'))
                        <div class="alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <a href="/user/info" class="botao-editar">EDITAR</a>
                    </div>
                    
                    <div class="campos-usuario">
                        <div class="campo-exibicao">
                            {{-- Usamos ?? para mostrar uma mensagem caso o campo esteja vazio --}}
                            <span class="valor-campo">{{ auth()->user()->full_name ?? 'Preencha seu nome completo' }}</span>
                        </div>
                        <div class="campo-exibicao">
                            <span class="valor-campo">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="campo-exibicao">
                            <span class="valor-campo">{{ auth()->user()->phone ?? 'Preencha seu telefone' }}</span>
                        </div>
                        <div class="campo-exibicao">
                            <span class="valor-campo">{{ auth()->user()->cpf ?? 'Preencha seu CPF' }}</span>
                        </div>
                    </div>
                </div>

               {{-- Em /resources/views/client/usuario/user/index.blade.php --}}

                <div class="secao-endereco">
                    <div class="cabecalho-secao">
                        <h2 class="titulo-secao">ENDEREÇO</h2>
                        <a href="{{ route('user.address.edit') }}" class="botao-editar">EDITAR</a>
                    </div>
                    
                    <div class="campos-usuario">
                        @if(auth()->user()->address)
                            <div class="campo-exibicao">
                                <span class="valor-campo">{{ auth()->user()->address->street }}, {{ auth()->user()->address->number }}</span>
                            </div>
                            <div class="campo-exibicao">
                                <span class="valor-campo">{{ auth()->user()->address->neighborhood }}</span>
                            </div>
                            <div class="campo-exibicao">
                                <span class="valor-campo">{{ auth()->user()->address->city }}</span>
                            </div>
                            <div class="campo-exibicao">
                                <span class="valor-campo">{{ auth()->user()->address->zip_code }}</span>
                            </div>
                        @else
                            <div class="campo-exibicao">
                                <span class="valor-campo">Nenhum endereço cadastrado</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- MODIFICADO: O botão agora é um formulário seguro --}}
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="botao-finalizar-sessao">FINALIZAR SESSÃO</button>
                </form>
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