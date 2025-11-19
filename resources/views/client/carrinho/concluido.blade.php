<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Pedido Concluído - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')
<link rel="stylesheet" href="{{ asset('css/compra-efetuada.css') }}">

    <div class="container">

        <div class="content">

            <div>
                <img src="/images/check.png" alt="">
            </div>

            <div class="textoPedido">
                <h3>COMPRA EFETUADA COM SUCESSO!</h3>
                <p>Nós da Flamexs agradecemos pela sua compra e esperamos que aproveite seu produto.</p>

                <div class="infoCompra">
                    <p>Seu pedido foi processado e armazenado em nosso sistema.</p>
                    <p>Você receberá um email de confirmação em breve.</p>
                </div>

                <div class="botoes-acao">
                    @auth
                        <a href="{{ route('user.orders.index') }}" class="botaoPreto">VER MEUS PEDIDOS</a>
                    @endauth
                    <a href="/" class="botaoPreto">VOLTAR A PÁGINA INICIAL</a>
                </div>
            </div>

        </div>
    </div>

    <style>
        .botoes-acao {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

        .botoes-acao .botaoPreto {
            display: inline-block;
            padding: 0.75rem 1.5rem;
        }

        @media (max-width: 768px) {
            .botoes-acao {
                flex-direction: column;
            }

            .botoes-acao .botaoPreto {
                width: 100%;
            }
        }
    </style>
    
@endsection