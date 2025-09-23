<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
    <title>Cadastro - Usuario</title>
</head>
<body>
    <section class="secao-login-principal">
        <div class="container-video">
            <video src="./images/video-login.mp4" autoplay muted loop playsinline></video>
        </div>
        <div class="container-login">
            <div class="conteudo-login">
                <img src="./images/logo.gif" alt="Logo" class="logotipo">
                <h1>Cadastre sua conta</h1>
                <p class="subtitulo">Crie sua conta aqui</p>
                
                {{-- Código simplificado para resources/views/client/cadastro/store.blade.php --}}

                <form class="formulario-login" method="POST" action="{{ route('register') }}">
                    @csrf

                    <input type="email" placeholder="E-mail" name="email" class="campo-entrada" value="{{ old('email') }}" required>
                    @error('email') <span style="color: red; font-size: 0.8em; display: block;">{{ $message }}</span> @enderror

                    <input type="password" placeholder="Senha" name="password" class="campo-entrada" required>
                    @error('password') <span style="color: red; font-size: 0.8em; display: block;">{{ $message }}</span> @enderror

                    <input type="password" placeholder="Confirmar Senha" name="password_confirmation" class="campo-entrada" required>

                    <div class="opcoes-formulario">
                        <div class="lembrar-me">
                            <input type="checkbox" id="lembrar" name="terms" required>
                            <label for="lembrar">Aceito os termos</label>
                        </div>
                        <div class="link-cadastro">
                            <p>Já tem conta? <a href="{{ route('login') }}" class="link">Faça login aqui</a></p>
                        </div>
                    </div>

                    <button type="submit" class="botao-login">Cadastrar</button>
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