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
        const imagem = produtoElement.querySelector('.produto-imagem').src;
        
        // Converter preço para número
        const precoNumerico = parseFloat(preco.replace('R$', '').replace(',', '.').trim());
        
        return {
            id: this.gerarId(nome),
            nome: nome,
            preco: precoNumerico,
            precoFormatado: preco,
            tamanhos: tamanhos,
            imagem: imagem,
            quantidade: 1
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
});