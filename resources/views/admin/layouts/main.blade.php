@php
    use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/header.css">
    <link rel="stylesheet" href="/css/admin/produtoindex.css">
    <link rel="stylesheet" href="/css/admin/produtocreate.css">
    <link rel="stylesheet" href="/css/admin/produtoshow.css">
    <link rel="stylesheet" href="/css/admin/dashboard.css">
    <link rel="stylesheet" href="/css/admin/vendas.css">
    <link rel="stylesheet" href="/css/admin/administradores.css">
    <link rel="stylesheet" href="/css/admin/administrador-create.css">
    <link rel="stylesheet" href="/css/admin/categorias.css">
    <link rel="stylesheet" href="/css/admin/modal-excluir.css">
    <title>@yield('title')</title>
</head>

<body>
    <!--Comeco do Header -->
    <header class="cabecalho-navegacao">
        <div class="container-navegacao">
            <div class="logo">
                <img src="/images/FLAMES.png" alt="FLAMES" class="logo-imagem">
            </div>

            {{-- Só mostramos o menu se o admin estiver logado --}}
            @auth('admin')
                <nav class="menu-navegacao" id="menu-navegacao">
                    <a href="/admin/dashboard" class="link-navegacao">Dashboard</a>
                    <a href="/admin/vendas" class="link-navegacao">Vendas</a>
                    <a href="/admin/users" class="link-navegacao">Usuarios</a>
                    <a href="/admin/produtos/index" class="link-navegacao">Produtos</a>
                    <a href="/admin/administradores" class="link-navegacao">Administradores</a>
                    <a href="/admin/categorias" class="link-navegacao">Categorias</a>

                    <div class="separador-menu-mobile"></div>
                    {{-- MODIFICADO: Adicionado 'onclick' para logout --}}
                    <a href="#" class="botao-logout-mobile" onclick="confirmarLogout(event)">
                        Sair
                    </a>
                </nav>

                <div class="perfil-usuario">
                    @php
                        // Pegamos os dados do admin logado
                        $admin = Auth::guard('admin')->user();
                        // Pegamos a primeira letra do nome de usuário
                        $initial = strtoupper(substr($admin->user, 0, 1));
                    @endphp

                    {{-- MODIFICADO: Lógica do Avatar (Foto ou Inicial) --}}
                    @if ($admin->profile_photo_path)
                        {{-- Trocamos 'asset' por 'Storage::url' --}}
                        <img src="{{ Storage::url($admin->profile_photo_path) }}" alt="Foto" class="avatar-usuario">
                    @else
                        <div class="avatar-usuario">{{ $initial }}</div>
                    @endif

                    <div class="info-usuario">
                        {{-- MODIFICADO: Nome do Admin --}}
                        <div class="nome-usuario">{{ $admin->user }}</div>
                    </div>
                    <div class="separador-perfil"></div>

                    {{-- MODIFICADO: 'onclick' agora chama a função correta --}}
                    <a href="#" class="botao-logout" onclick="confirmarLogout(event)">
                        Sair
                    </a>
                </div>

                <button class="botao-menu-mobile" id="botao-menu-mobile">
                    <div class="linha-menu"></div>
                    <div class="linha-menu"></div>
                    <div class="linha-menu"></div>
                </button>
            @endauth
        </div>
    </header>
    <!-- Final do Header -->

    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Comeco da Main -->
    @yield('content')
    <!-- Final da Main -->

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal-overlay-excluir" id="modalExcluir">
        <div class="modal-container-excluir">
            <div class="modal-icone-excluir">
                <svg class="icone-lixeira" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="3,6 5,6 21,6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
            </div>

            <div class="modal-conteudo-excluir">
                <h2 class="modal-titulo-excluir">Tem certeza que deseja excluir?</h2>
                <p class="modal-descricao-excluir">Essa ação não da para ser desfeita.</p>
            </div>

            <div class="modal-botoes-excluir">
                <button type="button" class="botao-cancelar-excluir" id="cancelarExclusao">
                    Cancelar
                </button>
                <button type="button" class="botao-confirmar-excluir" id="confirmarExclusao">
                    Sim, delete!
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts do Header -->
    <script src="/js/admin/header.js"></script>
    <script src="/js/admin/modal-excluir.js"></script>
    <script>
        function confirmarLogout(event) {
            event.preventDefault();

            if (confirm('Tem certeza que deseja sair do sistema?')) {
                // Se confirmar, encontra o formulário de logout e o envia
                document.getElementById('admin-logout-form').submit();
            }
        }
    </script>
</body>

</html>
