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
                <h3>COMPRA EFETUADA</h3>
                <p>Nós da Flamexs agradecemos pela sua compra e esperamos que aproveite seu produto.</p>

                <div class="infoCompra">
                    <p>ID da Compra: <span class="textoNegrito">#2223</span></p>
                    <p>Data da Compra: <span class="textoNegrito">05/09/2025</span></p>
                </div>

                <a href="/" class="botaoPreto">VOLTAR A PÁGINA INICIAL</a>
            </div>

        </div>
    </div>

@endsection