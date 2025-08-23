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
                
                <form class="formulario-login">
                    <input type="email" placeholder="E-mail" class="campo-entrada" required>
                    <input type="password" placeholder="Senha" class="campo-entrada" required>
                    <input type="password" placeholder="Confirmar Senha" class="campo-entrada" required>
                    
                    <div class="opcoes-formulario">
                        <div class="lembrar-me">
                            <input type="checkbox" id="lembrar">
                            <label for="lembrar">Aceito os termos</label>
                        </div>
                        <div class="link-cadastro">
                            <p>Já tem conta? <a href="/login" class="link">Faça login aqui</a></p>
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