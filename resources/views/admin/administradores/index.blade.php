@extends('admin.layouts.main')
@section('title', 'Administradores - Painel de Controle')

@section('content')
<main class="painel-administradores">
    <div class="cabecalho-administradores">
        <h1 class="titulo-administradores">Administradores</h1>
    </div>

    <div class="container-pesquisa-admin">
        <div class="campo-pesquisa-admin">
            <svg class="icone-pesquisa-admin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" class="input-pesquisa-admin" placeholder="Pesquisar administradores...">
        </div>
    </div>

    <div class="container-acoes-gerais">
        <div class="botoes-acoes-gerais">
            <a href="/admin/administradores/create" class="botao-adicionar-admin">
                <svg class="icone-adicionar-admin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Adicionar
            </a>
        </div>
    </div>

    <div class="container-tabela-administradores">
        <table class="tabela-administradores">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="checkbox-selecionar-todos">
                    </th>
                    <th>ID</th>
                    <th>Administrador</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Ativo</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <div class="container-tabela-administradores">
    <table class="tabela-administradores">

        <tbody>
            {{-- Verificação: Se a lista de administradores não estiver vazia --}}
            @if(count($allAdmins) > 0)
                {{-- Loop: Percorre cada administrador na lista --}}
                @foreach($allAdmins as $admin)
                <tr>
                    <td><input type="checkbox" class="checkbox-selecionar-item"></td>
                    <td>{{ $admin->id }}</td>
                    <td>
                        <div class="perfil-administrador">
                            {{-- Exibe a imagem de perfil, se existir --}}
                            @if($admin->profile_photo_path)
                            <img src="{{ asset('storage/' . $admin->profile_photo_path) }}" alt="Foto de Perfil {{ $admin->user }}" style="width: 50px; height: 50px; border-radius: 50%;">
                            @endif
                            <span>{{ $admin->user }}</span>
                        </div>
                    </td>
                    <td>{{ $admin->email }}</td>
                    {{-- A coluna de senha não deve ser mostrada por segurança --}}
                    <td><span class="status-admin status-{{ $admin->status }}">{{ ucfirst($admin->status) }}</span></td>
                    <td>
                        <div class="acoes-admin">
                            <a href="/admin/administradores/{{ $admin->id }}/edit" class="botao-editar-admin">
                                 ✏️ Editar
                            </a>
                            <form action="/admin/administradores/{{ $admin->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="botao-deletar-admin" onclick="return confirm('Tem certeza que deseja deletar este administrador?')">
                                 🗑️ Deletar
                             </button>
                            </form>
                     </div>
                    </td>
                </tr>
                @endforeach
            @else
            {{-- Se a lista estiver vazia, exibe esta mensagem --}}
            <tr>
                <td colspan="6" style="text-align: center; padding: 40px; color: #666;">
                    Nenhum administrador encontrado
                </td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
        </table>
    </div>

    <div class="rodape-paginacao-administradores">
        <div class="dropdown-itens-admin">
            <span>Mostrando</span>
            <select class="select-itens-admin">
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>itens</span>
        </div>

        <div class="controles-paginacao-administradores">
            <button class="botao-paginacao-administradores">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15,18 9,12 15,6"></polyline>
                </svg>
            </button>
            <button class="numero-pagina-administradores ativo">1</button>
            <button class="numero-pagina-administradores">2</button>
            <button class="numero-pagina-administradores">3</button>
            <button class="numero-pagina-administradores">4</button>
            <button class="botao-paginacao-administradores">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9,18 15,12 9,6"></polyline>
                </svg>
            </button>
        </div>
    </div>
</main>

<script src="/js/admin/administradores.js"></script>
@endsection
