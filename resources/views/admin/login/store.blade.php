<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin/login-adm.css">
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

                {{-- Bloco para exibir erros de login --}}
                @if ($errors->any())
                    <div style="color: #c53030; background-color: #fed7d7; padding: 10px; border-radius: 5px; margin-bottom: 15px; width: 100%; box-sizing: border-box; text-align: center;">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                {{-- MODIFICADO: A 'action' agora usa o nome da rota que criamos --}}
                <form class="formulario-login" action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    {{-- MODIFICADO: Adicionado 'value' para manter o email em caso de erro --}}
                    <input type="email" name="email" placeholder="E-mail" class="campo-entrada" value="{{ old('email') }}" required>

                    <input type="password" name="password" placeholder="Senha" class="campo-entrada" required>

                    <button type="submit" class="botao-login">Entrar</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
