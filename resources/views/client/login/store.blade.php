<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
    <title>Login - Usuario</title>
</head>
<body>
    <section class="secao-login-principal">
        <div class="container-video">
            <video src="./images/video-login.mp4" autoplay muted loop playsinline></video>
        </div>
        <div class="container-login">
            <div class="conteudo-login">
                <img src="./images/logo.gif" alt="Logo" class="logotipo">
                <h1>Entrar na sua conta</h1>
                <p class="subtitulo">Faça seu login aqui</p>
                
                {{-- ADICIONADO: Bloco para exibir erros gerais de login --}}
                @if ($errors->any())
                    <div style="color: #c53030; background-color: #fed7d7; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                        Ops! Verifique seus dados e tente novamente.
                    </div>
                @endif
                
                {{-- MODIFICADO: Adicionado method e action --}}
                <form class="formulario-login" method="POST" action="{{ route('login') }}">
                    {{-- ADICIONADO: Token de segurança do Laravel --}}
                    @csrf

                    {{-- MODIFICADO: Adicionado name="email" --}}
                    <input type="email" placeholder="E-mail" name="email" class="campo-entrada" value="{{ old('email') }}" required>
                    
                    {{-- MODIFICADO: Adicionado name="password" --}}
                    <input type="password" placeholder="Senha" name="password" class="campo-entrada" required>
                    
                    <div class="opcoes-formulario">
                        <div class="lembrar-me">
                            {{-- MODIFICADO: Adicionado name="remember" --}}
                            <input type="checkbox" id="lembrar" name="remember">
                            <label for="lembrar">Lembre-se</label>
                        </div>
                        <div class="link-cadastro">
                            {{-- MODIFICADO: Link usando a rota do Laravel --}}
                            <p>Não tem conta? <a href="{{ route('register') }}" class="link">Cadastre-se aqui</a></p>
                        </div>
                    </div>
                    
                    <button type="submit" class="botao-login">Entrar</button>
                </form>

                <div class="divisor">
                    <div class="linha"></div>
                    <p>ou</p>
                    <div class="linha"></div>
                </div>
                
                <button class="botao-google">
                    <img src="./images/google.svg" alt="Google">
                    <span>Continuar com Google</span>
                </button>
            </div>
        </div>
    </section>
</body>
</html>