<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Flamexs - Sobre')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualqquer conteudo que esteja fora do footer e do navbar -->
@section('content')

<head>
    <link rel="stylesheet" href="css/sobre.css">
</head>

    <div class="container">
        <h1>SOBRE A FLAMES</h1>

        <P>
            Surgida em meio à crise de Covid como única esperança de sucesso depois de uma crise familiar, fundada em 2022 <BR></BR>
            O Time de 5 pessoas da Flames, leva a mensagem de que Flames representa flexibilidade e adaptação, sendo assim, Flames nunca falirá e se adaptará à qualquer crise. <BR></BR>
            “Não se coloque em uma forma, se adapte e construa sua própria, e deixe a expandir, pode fluir ou colidir. <br>
            Seja como Flames nos momentos bons e ruins.” <br>
            Se adapte às circunstâncias ao seu redor. Aprenda a viver o presente, e quando o tempo mudar não seja mais o mesmo do passado. Mude e cresça durante todos os desafios. <br>
            Trazendo para o vestuário referências asiáticas, transformando o básico e simples com modelagens elaboradas, rompendo fronteiras convencionais, unindo múltiplas estéticas da moda de rua. <br>
            Flames nega produtos populares convencionais, esperando trazer até do simples, o simples diferente do sistema tradicional. <br>
            Mostrando que pode mudar e redescobrir o estilo de muitos jovens.
        </P>
    </div>

@endsection
