<!-- usado para puxando o layout da pagina main.blade.php -->
@extends('client.layouts.main')
<!-- Usado para puxar o nome da pagina que voce determinou como a tag yield apos chamar ele tera que colocar o nome da pagina que esta utilizando -->
@section('title', 'Editar Endereço - Flamexs')
<!-- Usado para puxar o conteudo principal da pagina, sendo ele qualquer conteudo que esteja fora do footer e do navbar -->
@section('content')

    <!-- Faixa de Frete Grátis -->
    <div id="faixa-frete-gratis" class="faixa-frete-gratis">
        <div class="conteudo-faixa-rolante">
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
            <span class="texto-frete">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$599</span>
        </div>
    </div>

    <div class="container-perfil-usuario">
        <div class="layout-duas-colunas">
            <!-- Coluna Esquerda - Dados do Usuário -->
            <div class="coluna-esquerda">
                <div class="caixa-dados-usuario">
                    <!-- Seção Informações da Conta -->
                    <div class="secao-endereco">
                        <div class="cabecalho-secao">
                            <h3 class="titulo-secao">EDITAR ENDEREÇO</h3>
                        </div>

                        <form method="POST" action="{{ route('user.address.update') }}">
                            @csrf
                            @method('PATCH') {{-- Método para atualização --}}

                            <div class="campos-usuario">
                                {{-- O '?? ""' garante que não dará erro se o usuário ainda não tiver um endereço cadastrado --}}
                                <div class="campo-exibicao">
                                    <input type="text" name="zip_code" id="cep" maxlength="9" class="valor-campo" value="{{ old('zip_code', auth()->user()->address->zip_code ?? '') }}" placeholder="CEP" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="street" class="valor-campo" value="{{ old('street', auth()->user()->address->street ?? '') }}" placeholder="Rua / Avenida" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="number" name="number" maxlength="6"class="valor-campo" value="{{ old('number', auth()->user()->address->number ?? '') }}" placeholder="Número" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="complement" class="valor-campo" value="{{ old('complement', auth()->user()->address->complement ?? '') }}" placeholder="Complemento (opcional)">
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="neighborhood" class="valor-campo" value="{{ old('neighborhood', auth()->user()->address->neighborhood ?? '') }}" placeholder="Bairro" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="city" class="valor-campo" value="{{ old('city', auth()->user()->address->city ?? '') }}" placeholder="Cidade" required>
                                </div>
                                <div class="campo-exibicao">
                                    <input type="text" name="state" class="valor-campo" value="{{ old('state', auth()->user()->address->state ?? '') }}" placeholder="Estado" required>
                                </div>
                            </div>

                            <div class="btn-caixa">
                                <a href="/user" class="btn-cancelar">Cancelar</a>
                                <button type="submit" class="btn-salvar">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div> 
        </div> 
    </div> 

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputCEP = document.getElementById('cep');
            
            if (inputCEP) {
                inputCEP.addEventListener('input', function(e) {
                    let value = e.target.value;
                    
                    // 1. Remove tudo que não é número
                    value = value.replace(/\D/g, "");
                    
                    // 2. Limita a 8 dígitos (caso o maxlength falhe)
                    if (value.length > 8) value = value.slice(0, 8);

                    // 3. Aplica a máscara: 12345-678
                    // Se tiver mais de 5 números, coloca o traço depois do quinto
                    value = value.replace(/^(\d{5})(\d)/, "$1-$2");
                    
                    e.target.value = value;
                });
            }
        });
    </script>
 @endsection
