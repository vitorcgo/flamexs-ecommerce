<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Editar Perfil - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')


<!-- Faixa de Frete Grátis -->
<div id="faixa-frete-gratis" class="faixa-frete-gratis">
    <div class="conteudo-faixa-rolante">
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
        <span class="texto-frete">FRETE GRÁTIS NA BLACK FRIDAY</span>
    </div>
</div>

<div class="container-perfil-usuario">
    <div class="layout-duas-colunas">
        <!-- Coluna Esquerda - Dados do Usuário -->
        <div class="coluna-esquerda">
            <div class="caixa-dados-usuario">
                <!-- Seção Informações da Conta -->
                <div class="secao-conta">
                    <div class="cabecalho-secao">
                        <h2 class="titulo-secao">INFORMAÇÕES DA CONTA</h2>
                    </div>
                    
                {{-- Em resources/views/client/usuario/user/edit.blade.php --}}

                {{-- O NOME DA ROTA 'user.info.update' SERÁ CRIADO NO PASSO 2 --}}
                <form method="POST" action="{{ route('user.info.update') }}">
                    @csrf
                    @method('PATCH') {{-- <-- Método HTTP correto para atualização parcial --}}

                    <div class="campos-usuario">
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: name="full_name" e value dinâmico --}}
                            <input type="text" name="full_name" class="valor-campo" value="{{ old('full_name', auth()->user()->full_name) }}" placeholder="Nome completo" required>
                        </div>
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: value dinâmico --}}
                            <input type="email" name="email" class="valor-campo" value="{{ old('email', auth()->user()->email) }}" placeholder="E-mail" required>
                        </div>
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: value dinâmico --}}
                            <input type="tel" name="phone" id="phone" maxlength="15" class="valor-campo" value="{{ old('phone', auth()->user()->phone) }}" placeholder="Telefone" required>
                        </div>
                        <div class="campo-exibicao">
                            {{-- MODIFICADO: value dinâmico --}}
                            <input type="text" name="cpf" id="cpf" maxlength="14" class="valor-campo" value="{{ old('cpf', auth()->user()->cpf) }}" placeholder="CPF" required>
                        </div>
                    </div>

                    <div class="btn-caixa">
                        <a href="/user" class="btn-cancelar">Cancelar</a>
                        <button type="submit" class="btn-salvar">Salvar Alterações</button>
                    </div>
                </form>
                    <div class="btn-caixa">
                        <a href="/user/info/password" class="btn-senha">Quer mudar sua senha?</a>
                    </div>
                </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- MÁSCARA DE CPF ---
        const inputCPF = document.getElementById('cpf');
        if (inputCPF) {
            inputCPF.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/\D/g, ""); // Remove letras
                value = value.replace(/(\d{3})(\d)/, "$1.$2");
                value = value.replace(/(\d{3})(\d)/, "$1.$2");
                value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
                e.target.value = value;
            });
        }

        // --- MÁSCARA DE TELEFONE ---
        const inputPhone = document.getElementById('phone');
        if (inputPhone) {
            inputPhone.addEventListener('input', function(e) {
                let value = e.target.value;
                value = value.replace(/\D/g, ""); // Remove letras
                
                // Limita a 11 números
                if (value.length > 11) value = value.slice(0, 11);

                // Lógica para celular (9 dígitos) ou fixo (8 dígitos)
                if (value.length > 10) {
                    // Formato (11) 91234-5678
                    value = value.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (value.length > 5) {
                    // Formato (11) 1234-5678
                    value = value.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                } else if (value.length > 2) {
                    // Formato (11)...
                    value = value.replace(/^(\d\d)(\d{0,5}).*/, "($1) $2");
                }
                e.target.value = value;
            });
        }
    });
</script>

@endsection