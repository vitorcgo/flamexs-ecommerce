<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login-adm.css') }}">
    <title>Login - Administrador</title>
</head>
<body>
    <section class="secao-login-principal">
        <div class="container-imagem">
            <img src="{{ asset('images/login-adm.webp') }}" alt="Login Administrador" class="imagem-login">
        </div>
        <div class="container-login">
            <div class="conteudo-login">
                <img src="{{ asset('images/logo.gif') }}" alt="Logo" class="logotipo">
                <h1>Acesso Administrativo</h1>
                <p class="subtitulo">Faça seu login como administrador</p>
                
                <form class="formulario-login" action="/adm" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="E-mail" class="campo-entrada" required>
                    <input type="password" name="password" placeholder="Senha" class="campo-entrada" required>
                    
                    <button type="submit" class="botao-login">Entrar</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>