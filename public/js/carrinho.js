document.addEventListener('DOMContentLoaded', function() {
    // Elementos dos radio buttons
    const radioCartao = document.getElementById('cartao');
    const radioPix = document.getElementById('pix');
    const radioBoleto = document.getElementById('boleto');
    
    // Elementos dos accordions
    const accordionCartao = document.getElementById('accordion-cartao');
    const accordionPix = document.getElementById('accordion-pix');
    
    // Função para fechar todos os accordions
    function fecharTodosAccordions() {
        accordionCartao.classList.remove('active');
        accordionPix.classList.remove('active');
    }
    
    // Event listeners para os radio buttons
    radioCartao.addEventListener('change', function() {
        if (this.checked) {
            fecharTodosAccordions();
            accordionCartao.classList.add('active');
        }
    });
    
    radioPix.addEventListener('change', function() {
        if (this.checked) {
            fecharTodosAccordions();
            accordionPix.classList.add('active');
        }
    });
    
    radioBoleto.addEventListener('change', function() {
        if (this.checked) {
            fecharTodosAccordions();
        }
    });
    
    // Máscaras para os campos do cartão
    const numeroCartao = document.querySelector('input[name="numero_cartao"]');
    const vencimentoCartao = document.querySelector('input[name="vencimento_cartao"]');
    const cvvCartao = document.querySelector('input[name="cvv_cartao"]');
    const cepInput = document.querySelector('input[name="cep"]');
    const telefoneInput = document.querySelector('input[name="telefone"]');
    const cpfPixInput = document.querySelector('input[name="cpf_pix"]');
    
    // Máscara para número do cartão
    if (numeroCartao) {
        numeroCartao.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            if (formattedValue.length > 19) {
                formattedValue = formattedValue.substring(0, 19);
            }
            e.target.value = formattedValue;
        });
    }
    
    // Máscara para vencimento do cartão (MM/AA)
    if (vencimentoCartao) {
        vencimentoCartao.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });
    }
    
    // Máscara para CVV (apenas números)
    if (cvvCartao) {
        cvvCartao.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });
    }
    
    // Máscara para CEP
    if (cepInput) {
        cepInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 5) {
                value = value.substring(0, 5) + '-' + value.substring(5, 8);
            }
            e.target.value = value;
        });
    }
    
    // Máscara para telefone
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 10) {
                value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
            } else {
                value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }
            e.target.value = value;
        });
    }
    
    // Máscara para CPF do PIX
    if (cpfPixInput) {
        cpfPixInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
            e.target.value = value;
        });
    }
    
    // Buscar CEP automaticamente
    if (cepInput) {
        cepInput.addEventListener('blur', function() {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            const enderecoInput = document.querySelector('input[name="endereco"]');
                            const cidadeInput = document.querySelector('input[name="cidade"]');
                            const estadoSelect = document.querySelector('select[name="estado"]');
                            
                            if (enderecoInput && data.logradouro) {
                                enderecoInput.value = data.logradouro;
                            }
                            if (cidadeInput && data.localidade) {
                                cidadeInput.value = data.localidade;
                            }
                            if (estadoSelect && data.uf) {
                                estadoSelect.value = data.uf;
                            }
                        }
                    })
                    .catch(error => {
                        console.log('Erro ao buscar CEP:', error);
                    });
            }
        });
    }
    
    // Validação do formulário
    const form = document.querySelector('.form-checkout');
    if (form) {
        form.addEventListener('submit', function(e) {
            const metodoSelecionado = document.querySelector('input[name="metodo_pagamento"]:checked');
            
            if (!metodoSelecionado) {
                e.preventDefault();
                alert('Por favor, selecione um método de pagamento.');
                return;
            }
            
            // Validação específica para cartão
            if (metodoSelecionado.value === 'cartao') {
                const numeroCartao = document.querySelector('input[name="numero_cartao"]').value;
                const vencimento = document.querySelector('input[name="vencimento_cartao"]').value;
                const cvv = document.querySelector('input[name="cvv_cartao"]').value;
                const nomeCartao = document.querySelector('input[name="nome_cartao"]').value;
                
                if (!numeroCartao || !vencimento || !cvv || !nomeCartao) {
                    e.preventDefault();
                    alert('Por favor, preencha todos os campos do cartão.');
                    return;
                }
                
                // Validação básica do número do cartão (deve ter 16 dígitos)
                const numeroLimpo = numeroCartao.replace(/\s/g, '');
                if (numeroLimpo.length < 16) {
                    e.preventDefault();
                    alert('Número do cartão deve ter 16 dígitos.');
                    return;
                }
                
                // Validação do vencimento
                if (vencimento.length !== 5) {
                    e.preventDefault();
                    alert('Data de vencimento inválida.');
                    return;
                }
                
                // Validação do CVV
                if (cvv.length < 3) {
                    e.preventDefault();
                    alert('CVV deve ter pelo menos 3 dígitos.');
                    return;
                }
            }
            
            // Validação específica para PIX
            if (metodoSelecionado.value === 'pix') {
                const emailPix = document.querySelector('input[name="email_pix"]').value;
                const cpfPix = document.querySelector('input[name="cpf_pix"]').value;
                
                if (!emailPix || !cpfPix) {
                    e.preventDefault();
                    alert('Por favor, preencha todos os campos do PIX.');
                    return;
                }
                
                // Validação básica do CPF (deve ter 11 dígitos)
                const cpfLimpo = cpfPix.replace(/\D/g, '');
                if (cpfLimpo.length !== 11) {
                    e.preventDefault();
                    alert('CPF deve ter 11 dígitos.');
                    return;
                }
                
                // Validação básica do e-mail
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailPix)) {
                    e.preventDefault();
                    alert('Por favor, insira um e-mail válido.');
                    return;
                }
            }
        });
    }
});