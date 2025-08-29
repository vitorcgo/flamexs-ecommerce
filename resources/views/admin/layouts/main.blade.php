<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/header.css">
    <link rel="stylesheet" href="/css/admin/produtoindex.css">
    <title>@yield('title')</title>
</head>

<body>
    <!--Comeco do Header -->
    <header class="cabecalho-navegacao">
        <div class="container-navegacao">
            <div class="logo">
                <img src="/images/logo.gif" alt="Logo" class="logo-imagem">
            </div>
            <nav class="menu-navegacao" id="menu-navegacao">
                <a href="/adm/dashboard" class="link-navegacao">Dashboard</a>
                <a href="/adm/vendas" class="link-navegacao">Vendas</a>
                <a href="/adm/produtos/index" class="link-navegacao">Produtos</a>
                <a href="/adm/administradores" class="link-navegacao">Administradores</a>
                <a href="/adm/categorias" class="link-navegacao">Categorias</a>
            </nav>
            <div class="perfil-usuario">
                <div class="avatar-usuario">
                    
                </div>
                <div class="info-usuario">
                    <div class="nome-usuario">Vitor Gomes</div>
                    <div class="cargo-usuario">Admin</div>
                </div>
                <a href="#" class="botao-logout" onclick="confirmarLogout()">
                    Sair
                </a>
            </div>
            <button class="botao-menu-mobile" id="botao-menu-mobile">
                <div class="linha-menu"></div>
                <div class="linha-menu"></div>
                <div class="linha-menu"></div>
            </button>
        </div>
    </header>
    <!-- Final do Header -->
    <!-- Comeco  da Main-->
    @yield('content')

</body>

</html>