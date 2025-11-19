@extends('client.layouts.main')
@section('title', 'Carrinho de Compras - Flamexs')

@section('content')
<link rel="stylesheet" href="{{ asset('css/carrinho.css') }}">

<form method="POST" action="#" class="form-checkout">
    @csrf
    <div class="container-carrinho">
        <!-- Coluna Esquerda - Formulários -->
        <div class="coluna-esquerda">

            <!-- Item do Pedido - Mobile -->
            <div class="item-pedido-mobile">
                <!-- Será preenchido dinamicamente pelo JavaScript -->
            </div>

            <!-- Seção Contato -->
            <div class="secao-formulario">
                <h3 class="titulo-secao">Contato:</h3>
                <div class="campo-grupo-contato">
                    <input type="email" name="email" class="campo-input" placeholder="E-mail" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="erro-campo">{{ $message }}</span>
                @enderror
            </div>

            <!-- Seção Entrega -->
            <div class="secao-formulario">
                <h3 class="titulo-secao">Entrega:</h3>
                <div class="campos-entrega">
                    <!-- Linha 1: Nome -->
                    <div class="campo-grupo">
                        <input type="text" name="nome" class="campo-input" placeholder="Nome completo" value="{{ old('nome') }}" required>
                        @error('nome')
                            <span class="erro-campo">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Linha 2: CEP -->
                    <div class="campo-grupo">
                        <input type="text" name="cep" class="campo-input" placeholder="CEP" value="{{ old('cep') }}" required>
                        @error('cep')
                            <span class="erro-campo">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Linha 3: Endereço -->
                    <div class="campo-grupo">
                        <input type="text" name="endereco" class="campo-input" placeholder="Endereço (endereço e rua)" value="{{ old('endereco') }}" required>
                        @error('endereco')
                            <span class="erro-campo">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Linha 4: Complemento -->
                    <div class="campo-grupo">
                        <input type="text" name="complemento" class="campo-input" placeholder="Complemento" value="{{ old('complemento') }}">
                        @error('complemento')
                            <span class="erro-campo">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Linha 5: Cidade e Estado -->
                    <div class="campo-grupo-duplo">
                        <div class="campo-cidade">
                            <input type="text" name="cidade" class="campo-input" placeholder="Cidade" value="{{ old('cidade') }}" required>
                            @error('cidade')
                                <span class="erro-campo">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="campo-estado">
                            <div class="campo-com-icone">
                                <select name="estado" class="campo-select" required>
                                    <option value="">Estado</option>
                                    <option value="AC" {{ old('estado') == 'AC' ? 'selected' : '' }}>Acre</option>
                                    <option value="AL" {{ old('estado') == 'AL' ? 'selected' : '' }}>Alagoas</option>
                                    <option value="AP" {{ old('estado') == 'AP' ? 'selected' : '' }}>Amapá</option>
                                    <option value="AM" {{ old('estado') == 'AM' ? 'selected' : '' }}>Amazonas</option>
                                    <option value="BA" {{ old('estado') == 'BA' ? 'selected' : '' }}>Bahia</option>
                                    <option value="CE" {{ old('estado') == 'CE' ? 'selected' : '' }}>Ceará</option>
                                    <option value="DF" {{ old('estado') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                                    <option value="ES" {{ old('estado') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                                    <option value="GO" {{ old('estado') == 'GO' ? 'selected' : '' }}>Goiás</option>
                                    <option value="MA" {{ old('estado') == 'MA' ? 'selected' : '' }}>Maranhão</option>
                                    <option value="MT" {{ old('estado') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                                    <option value="MS" {{ old('estado') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                                    <option value="MG" {{ old('estado') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                                    <option value="PA" {{ old('estado') == 'PA' ? 'selected' : '' }}>Pará</option>
                                    <option value="PB" {{ old('estado') == 'PB' ? 'selected' : '' }}>Paraíba</option>
                                    <option value="PR" {{ old('estado') == 'PR' ? 'selected' : '' }}>Paraná</option>
                                    <option value="PE" {{ old('estado') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                                    <option value="PI" {{ old('estado') == 'PI' ? 'selected' : '' }}>Piauí</option>
                                    <option value="RJ" {{ old('estado') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                                    <option value="RN" {{ old('estado') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                                    <option value="RS" {{ old('estado') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                                    <option value="RO" {{ old('estado') == 'RO' ? 'selected' : '' }}>Rondônia</option>
                                    <option value="RR" {{ old('estado') == 'RR' ? 'selected' : '' }}>Roraima</option>
                                    <option value="SC" {{ old('estado') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                                    <option value="SP" {{ old('estado') == 'SP' ? 'selected' : '' }}>São Paulo</option>
                                    <option value="SE" {{ old('estado') == 'SE' ? 'selected' : '' }}>Sergipe</option>
                                    <option value="TO" {{ old('estado') == 'TO' ? 'selected' : '' }}>Tocantins</option>
                                </select>
                            </div>
                            @error('estado')
                                <span class="erro-campo">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Linha 6: Telefone -->
                    <div class="campo-grupo">
                        <input type="tel" name="telefone" class="campo-input" placeholder="Telefone (11) 9000-0000" value="{{ old('telefone') }}" required>
                        @error('telefone')
                            <span class="erro-campo">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Seção Frete -->
            <div class="secao-formulario">
                <h3 class="titulo-secao">Frete:</h3>
                <p class="descricao-frete">Insira o endereço de entrega para ver as formas de frete disponíveis.</p>
            </div>

            <!-- Seção Pagamento -->
            <div class="secao-formulario">
                <h3 class="titulo-secao">Pagamento:</h3>
                <div class="opcoes-pagamento">
                    <!-- Cartão de Crédito -->
                    <div class="container-pagamento">
                        <input type="radio" id="cartao" name="metodo_pagamento" value="cartao" class="radio-pagamento">
                        <label for="cartao" class="label-pagamento">
                            <div class="opcao-conteudo">
                                <span class="texto-opcao">Cartão de Crédito</span>
                                <div class="icones-pagamento">
                                    <img src="{{ asset('images/visa.svg') }}" alt="Visa" class="icone-bandeira">
                                    <img src="{{ asset('images/mastercard.svg') }}" alt="Mastercard" class="icone-bandeira">
                                    <img src="{{ asset('images/elo.svg') }}" alt="Elo" class="icone-bandeira">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icone-nfc">
                                        <path d="M6 8.32a7.43 7.43 0 0 1 0 7.36"/>
                                        <path d="M9.46 6.21a11.76 11.76 0 0 1 0 11.58"/>
                                        <path d="M12.91 4.1a15.91 15.91 0 0 1 .01 15.8"/>
                                        <path d="M16.37 2a20.16 20.16 0 0 1 0 20"/>
                                    </svg>
                                </div>
                            </div>
                        </label>
                        
                        <!-- Accordion Cartão -->
                        <div class="accordion-content" id="accordion-cartao">
                            <div class="cartao-visual">
                                <img src="{{ asset('images/cartao-template.svg') }}" alt="Cartão" class="imagem-cartao">
                            </div>
                            <div class="campos-cartao">
                                <div class="campo-grupo">
                                    <input type="text" name="numero_cartao" class="campo-input" placeholder="Número do cartão" maxlength="19">
                                    @error('numero_cartao')
                                        <span class="erro-campo">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="campo-grupo-duplo">
                                    <div class="campo-vencimento">
                                        <input type="text" name="vencimento_cartao" class="campo-input" placeholder="MM/AA" maxlength="5">
                                        @error('vencimento_cartao')
                                            <span class="erro-campo">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="campo-cvv">
                                        <input type="text" name="cvv_cartao" class="campo-input" placeholder="CVV" maxlength="4">
                                        @error('cvv_cartao')
                                            <span class="erro-campo">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="campo-grupo">
                                    <input type="text" name="nome_cartao" class="campo-input" placeholder="Nome no cartão">
                                    @error('nome_cartao')
                                        <span class="erro-campo">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Boleto -->
                    <div class="container-pagamento">
                        <input type="radio" id="boleto" name="metodo_pagamento" value="boleto" class="radio-pagamento">
                        <label for="boleto" class="label-pagamento">
                            <div class="opcao-conteudo">
                                <span class="texto-opcao">Boleto</span>
                                <div class="icones-pagamento">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icone-boleto">
                                        <rect x="3" y="4" width="18" height="16" rx="2"/>
                                        <path d="M7 8h10M7 12h10M7 16h6"/>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- PIX -->
                    <div class="container-pagamento">
                        <input type="radio" id="pix" name="metodo_pagamento" value="pix" class="radio-pagamento">
                        <label for="pix" class="label-pagamento">
                            <div class="opcao-conteudo">
                                <span class="texto-opcao">PIX</span>
                                <div class="icones-pagamento">
                                </div>
                            </div>
                        </label>
                        
                        <!-- Accordion PIX -->
                        <div class="accordion-content" id="accordion-pix">
                            <div class="campos-pix">
                                <div class="campo-grupo">
                                    <input type="email" name="email_pix" class="campo-input" placeholder="E-mail para PIX">
                                    @error('email_pix')
                                        <span class="erro-campo">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="campo-grupo">
                                    <input type="text" name="cpf_pix" class="campo-input" placeholder="CPF" maxlength="14">
                                    @error('cpf_pix')
                                        <span class="erro-campo">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @error('metodo_pagamento')
                    <span class="erro-campo">{{ $message }}</span>
                @enderror

                <button type="submit" class="botao-pagar">PAGAR AGORA</button>
            </div>
        </div>

    <!-- Coluna Direita - Resumo do Pedido -->
    <div class="coluna-direita">
        <!-- Itens do Pedido serão preenchidos dinamicamente pelo JavaScript -->

        <!-- Resumo de Valores -->
        <div class="resumo-valores">
            <div class="linha-valor">
                <span class="label-valor">Subtotal:</span>
                <span class="valor">R$ 0,00</span>
            </div>
            <div class="linha-valor">
                <span class="label-valor">Frete:</span>
                <span class="valor-frete">Inserir endereço de entrega.</span>
            </div>
            <div class="linha-valor linha-total">
                <span class="label-valor">Total:</span>
                <span class="valor-total">R$ 0,00</span>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('js/carrinho.js') }}"></script>
<script src="{{ asset('js/checkout.js') }}"></script>

@endsection