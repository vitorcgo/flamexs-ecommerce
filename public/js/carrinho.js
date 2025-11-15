class CarrinhoManager {
    constructor() {
        this.carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        this.init();
    }

    init() {
        this.atualizarContador();
        this.bindEvents();
        this.renderizarCarrinho();
    }

    bindEvents() {
        // Botões de adicionar ao carrinho
        document.querySelectorAll('.botao-carrinho').forEach(botao => {
            botao.addEventListener('click', (e) => {
                const produto = this.extrairDadosProduto(e.target);
                this.adicionarAoCarrinho(produto);
            });
        });

        // Botões de comprar agora
        document.querySelectorAll('.botao-comprar').forEach(botao => {
            botao.addEventListener('click', (e) => {
                const produto = this.extrairDadosProduto(e.target);
                this.adicionarAoCarrinho(produto);
                this.abrirModal();
            });
        });

        // Abrir modal ao clicar no ícone do carrinho
        document.getElementById('icone-carrinho').addEventListener('click', (e) => {
            e.preventDefault();
            this.abrirModal();
        });

        // Fechar modal
        document.getElementById('fechar-modal').addEventListener('click', () => {
            this.fecharModal();
        });

        // Continuar comprando
        document.getElementById('continuar-comprando').addEventListener('click', () => {
            this.fecharModal();
        });

        // Fechar modal clicando no overlay
        document.getElementById('modal-carrinho').addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                this.fecharModal();
            }
        });
    }

    extrairDadosProduto(botao) {
        const produtoElement = botao.closest('.produto');
        const nome = produtoElement.querySelector('.produto-nome').textContent;
        const preco = produtoElement.querySelector('.produto-preco').textContent;
        const tamanhos = produtoElement.querySelector('.produto-tamanhos').textContent;
        
        // Tentar pegar a imagem principal
        let imagem = '';
        const imagemPrincipal = produtoElement.querySelector('.produto-imagem-principal');
        if (imagemPrincipal) {
            imagem = imagemPrincipal.src;
        } else {
            const imagemContainer = produtoElement.querySelector('.produto-imagem-container img');
            if (imagemContainer) {
                imagem = imagemContainer.src;
            }
        }
        
        // Converter preço para número
        const precoNumerico = parseFloat(preco.replace('R$', '').replace(',', '.').trim());
        
        return {
            id: this.gerarId(nome),
            nome: nome,
            preco: precoNumerico,
            precoFormatado: preco,
            tamanhos: tamanhos,
            imagem: imagem,
            quantidade: 1,
            product_id: null
        };
    }

    gerarId(nome) {
        return nome.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
    }

    adicionarAoCarrinho(produto) {
        const itemExistente = this.carrinho.find(item => item.id === produto.id);
        
        if (itemExistente) {
            itemExistente.quantidade += 1;
        } else {
            this.carrinho.push(produto);
        }
        
        this.salvarCarrinho();
        this.atualizarContador();
        this.renderizarCarrinho();
        this.animarContador();
    }

    removerDoCarrinho(id) {
        this.carrinho = this.carrinho.filter(item => item.id !== id);
        this.salvarCarrinho();
        this.atualizarContador();
        this.renderizarCarrinho();
    }

    alterarQuantidade(id, novaQuantidade) {
        const item = this.carrinho.find(item => item.id === id);
        if (item) {
            if (novaQuantidade <= 0) {
                this.removerDoCarrinho(id);
            } else {
                item.quantidade = novaQuantidade;
                this.salvarCarrinho();
                this.atualizarContador();
                this.renderizarCarrinho();
            }
        }
    }

    atualizarContador() {
        const contador = document.getElementById('contador-carrinho');
        const totalItens = this.carrinho.reduce((total, item) => total + item.quantidade, 0);
        
        contador.textContent = totalItens;
        
        if (totalItens > 0) {
            contador.classList.add('ativo');
        } else {
            contador.classList.remove('ativo');
        }
    }

    animarContador() {
        const contador = document.getElementById('contador-carrinho');
        contador.classList.add('animacao');
        setTimeout(() => {
            contador.classList.remove('animacao');
        }, 600);
    }

    calcularSubtotal() {
        return this.carrinho.reduce((total, item) => total + (item.preco * item.quantidade), 0);
    }

    formatarPreco(preco) {
        return `R$ ${preco.toFixed(2).replace('.', ',')}`;
    }

    renderizarCarrinho() {
        const carrinhoVazio = document.getElementById('carrinho-vazio');
        const carrinhoItens = document.getElementById('carrinho-itens');
        const carrinhoResumo = document.getElementById('carrinho-resumo');
        const subtotalValor = document.getElementById('subtotal-valor');

        if (this.carrinho.length === 0) {
            carrinhoVazio.style.display = 'block';
            carrinhoItens.style.display = 'none';
            carrinhoResumo.style.display = 'none';
        } else {
            carrinhoVazio.style.display = 'none';
            carrinhoItens.style.display = 'block';
            carrinhoResumo.style.display = 'block';

            // Renderizar itens
            carrinhoItens.innerHTML = this.carrinho.map(item => `
                <div class="item-carrinho">
                    <img src="${item.imagem}" alt="${item.nome}" class="item-imagem">
                    <div class="item-info">
                        <h4 class="item-nome">${item.nome}</h4>
                        <p class="item-detalhes">(${item.tamanhos})</p>
                        <p class="item-preco">${item.precoFormatado}</p>
                    </div>
                    <div class="item-controles">
                        <div class="quantidade-controle">
                            <button class="btn-quantidade" onclick="carrinho.alterarQuantidade('${item.id}', ${item.quantidade - 1})">-</button>
                            <span class="quantidade-numero">${item.quantidade}</span>
                            <button class="btn-quantidade" onclick="carrinho.alterarQuantidade('${item.id}', ${item.quantidade + 1})">+</button>
                        </div>
                        <button class="btn-remover" onclick="carrinho.removerDoCarrinho('${item.id}')">remover</button>
                    </div>
                </div>
            `).join('');

            // Atualizar subtotal
            const subtotal = this.calcularSubtotal();
            subtotalValor.textContent = this.formatarPreco(subtotal);
        }
    }

    abrirModal() {
        document.getElementById('modal-carrinho').classList.add('ativo');
        document.body.style.overflow = 'hidden';
    }

    fecharModal() {
        document.getElementById('modal-carrinho').classList.remove('ativo');
        document.body.style.overflow = 'auto';
    }

    salvarCarrinho() {
        localStorage.setItem('carrinho', JSON.stringify(this.carrinho));
    }
}

// Inicializar o carrinho quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    window.carrinho = new CarrinhoManager();
    
    // Botão de iniciar compra no modal do carrinho
    const iniciarCompraBtn = document.querySelector('.btn-iniciar-compra');
    if (iniciarCompraBtn) {
        iniciarCompraBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '/user/carrinho/comprar';
        });
    }
});


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
            
            // Validação específica para PIX - SEMPRE PERMITIDO PARA TESTES
            // PIX não requer validação obrigatória para facilitar testes
            
            // Se chegou aqui, todas as validações passaram
            // Processar pedido no servidor
            e.preventDefault();
            
            // Coletar dados do formulário
            const formData = {
                email: document.querySelector('input[name="email"]').value,
                nome: document.querySelector('input[name="nome"]').value,
                cep: document.querySelector('input[name="cep"]').value,
                endereco: document.querySelector('input[name="endereco"]').value,
                complemento: document.querySelector('input[name="complemento"]').value,
                cidade: document.querySelector('input[name="cidade"]').value,
                estado: document.querySelector('select[name="estado"]').value,
                telefone: document.querySelector('input[name="telefone"]').value,
                metodo_pagamento: metodoSelecionado.value,
            };
            
            // Chamar função para processar pedido
            if (typeof processarPedido === 'function') {
                processarPedido(formData);
            }
        });
    }
});
