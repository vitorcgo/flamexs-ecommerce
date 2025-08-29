<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Flamexs - Contato')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualqquer conteudo que esteja fora do footer e do navbar -->
@section('content')



<head>
    <link rel="stylesheet" href="css/contato.css">
</head>

    <div class="container">
    <h1>CONTATO</h1>
    
        <P>
        Entre em contato conosco através dos nossos canais de atendimento. <BR></BR>
        Telefone E-commerce: +55 (11) 96935-2617 <BR></BR>
        Telefone Loja: +55 (11) 99999-9999 <BR></BR>
        E-mail: contato@flamexs.com.br <BR></BR>
        Horário de atendimento: Segunda à sexta, das 09:00 às 18:00. <br>
        Nosso tempo de resposta através de e-mail e WhatsApp é de até 24 horas. <br>
        Estamos localizados em São Paulo, SP - Brasil. <br>
        Atendimento presencial mediante agendamento prévio.
        </P>
    </div>
@endsection

    