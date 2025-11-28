// Funcionalidades da página de detalhes do produto

// Variável global para armazenar frete selecionado
let freteSelecionado = null;

// Trocar imagem principal
function trocarImagem(src) {
    const imagemPrincipal = document.getElementById('imagem-principal');
    const miniaturas = document.querySelectorAll('.miniatura-item');

    imagemPrincipal.src = src;

    // Atualizar miniatura ativa
    miniaturas.forEach(miniatura => {
        miniatura.classList.remove('ativa');
        if (miniatura.onclick.toString().includes(src)) {
            miniatura.classList.add('ativa');
        }
    });
}

// Seleção de tamanho
document.addEventListener('DOMContentLoaded', function() {
    const tamanhos = document.querySelectorAll('.tamanho-btn:not(.indisponivel)');
    const estoqueInfo = document.querySelector('.estoque-info');
    const quantidadeInput = document.getElementById('quantidade');

    tamanhos.forEach(tamanho => {
        tamanho.addEventListener('click', function() {
            // Remove ativo de todos
            document.querySelectorAll('.tamanho-btn').forEach(t => t.classList.remove('ativo'));
            // Adiciona ativo ao clicado
            this.classList.add('ativo');

            // Atualizar quantidade disponível baseado no tamanho selecionado
            const estoque = parseInt(this.getAttribute('data-estoque')) || 0;
            const tamanhoSelecionado = this.getAttribute('data-tamanho');

            // Atualizar o input de quantidade máxima
            quantidadeInput.max = estoque;

            // Resetar quantidade para 1
            quantidadeInput.value = 1;

            // Atualizar texto de estoque
            if (estoqueInfo) {
                if (estoque > 0) {
                    estoqueInfo.textContent = `${estoque} unidades disponíveis em ${tamanhoSelecionado}`;
                    estoqueInfo.style.color = '#28a745';
                } else {
                    estoqueInfo.textContent = `Fora de estoque em ${tamanhoSelecionado}`;
                    estoqueInfo.style.color = '#dc3545';
                }
            }

            console.log(`Tamanho selecionado: ${tamanhoSelecionado}, Estoque: ${estoque}`);
        });
    });

    // Inicializar com o primeiro tamanho disponível
    const primeiroTamanhoDisponivel = document.querySelector('.tamanho-btn:not(.indisponivel)');
    if (primeiroTamanhoDisponivel) {
        primeiroTamanhoDisponivel.classList.add('ativo');
        const estoque = parseInt(primeiroTamanhoDisponivel.getAttribute('data-estoque')) || 0;
        const tamanho = primeiroTamanhoDisponivel.getAttribute('data-tamanho');
        quantidadeInput.max = estoque;
        if (estoqueInfo) {
            estoqueInfo.textContent = `${estoque} unidades disponíveis em ${tamanho}`;
        }
    }
});

// Controle de quantidade
function aumentarQuantidade() {
    const quantidadeInput = document.getElementById('quantidade');
    const valorAtual = parseInt(quantidadeInput.value);
    const maximo = parseInt(quantidadeInput.max) || 10;

    if (valorAtual < maximo) {
        quantidadeInput.value = valorAtual + 1;
    }
}

function diminuirQuantidade() {
    const quantidadeInput = document.getElementById('quantidade');
    const valorAtual = parseInt(quantidadeInput.value);
    const minimo = parseInt(quantidadeInput.min) || 1;

    if (valorAtual > minimo) {
        quantidadeInput.value = valorAtual - 1;
    }
}

// Abrir guia de tamanhos
function abrirGuiaTamanhos() {
    abrirModalZoom('/images/tamanhos.png');
}

// Máscara para CEP
document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('cep-input');

    if (cepInput) {
        cepInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 5) {
                value = value.replace(/^(\d{5})(\d)/, '$1-$2');
            }
            e.target.value = value;
        });

        cepInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                calcularFrete();
            }
        });
    }
});

// Função para calcular frete (simulado)
function calcularFrete() {
    const cepInput = document.getElementById('cep-input');
    const cep = cepInput.value.replace(/\D/g, '');
    const resultadosDiv = document.getElementById('frete-resultados');
    const erroDiv = document.getElementById('frete-erro');
    const botaoCalcular = document.querySelector('.btn-calcular-frete');

    // Limpar resultados anteriores
    resultadosDiv.style.display = 'none';
    erroDiv.style.display = 'none';

    // Validar CEP
    if (cep.length !== 8) {
        mostrarErroFrete('Por favor, digite um CEP válido com 8 dígitos.');
        return;
    }

    // Mostrar loading
    botaoCalcular.disabled = true;
    botaoCalcular.textContent = 'Calculando...';

    // Simulação de dados de frete
    setTimeout(() => {
        const dadosSimulados = {
            success: true,
            data: [
                {
                    nome: 'PAC',
                    preco: 15.50,
                    prazo: '8 a 12 dias úteis'
                },
                {
                    nome: 'SEDEX',
                    preco: 25.90,
                    prazo: '2 a 4 dias úteis'
                },
                {
                    nome: 'SEDEX 10',
                    preco: 35.50,
                    prazo: '1 dia útil'
                }
            ]
        };

        processarResultadoFrete(dadosSimulados);
        botaoCalcular.disabled = false;
        botaoCalcular.textContent = 'Calcular';
    }, 1500);
}

function processarResultadoFrete(data) {
    const resultadosDiv = document.getElementById('frete-resultados');

    if (data.success && data.data && data.data.length > 0) {
        let html = '';

        data.data.forEach((opcao, index) => {
            html += `
                <div class="frete-opcao" onclick="selecionarFrete(${index}, '${opcao.nome}', ${opcao.preco})">
                    <div class="frete-info">
                        <div class="frete-nome">${opcao.nome}</div>
                        <div class="frete-prazo">${opcao.prazo}</div>
                    </div>
                    <div class="frete-preco">R$ ${opcao.preco.toFixed(2).replace('.', ',')}</div>
                </div>
            `;
        });

        resultadosDiv.innerHTML = html;
        resultadosDiv.style.display = 'block';
    } else {
        mostrarErroFrete('Não foi possível calcular o frete para este CEP.');
    }
}

function selecionarFrete(index, nome, preco) {
    // Remove seleção anterior
    document.querySelectorAll('.frete-opcao').forEach(opcao => {
        opcao.classList.remove('selecionada');
    });

    // Adiciona seleção atual
    document.querySelectorAll('.frete-opcao')[index].classList.add('selecionada');

    // Armazena frete selecionado
    freteSelecionado = {
        nome: nome,
        preco: preco
    };

    console.log('Frete selecionado:', freteSelecionado);
}

function mostrarErroFrete(mensagem) {
    const erroDiv = document.getElementById('frete-erro');
    erroDiv.textContent = mensagem;
    erroDiv.style.display = 'block';
}

// Adicionar ao carrinho
document.addEventListener('DOMContentLoaded', function() {
    const btnAdicionarCarrinho = document.querySelector('.btn-adicionar-carrinho');
    const btnComprarAgora = document.querySelector('.btn-comprar-agora');

    if (btnAdicionarCarrinho) {
        btnAdicionarCarrinho.addEventListener('click', function() {
            // Validar se um tamanho foi selecionado
            const tamanhoSelecionado = document.querySelector('.tamanho-btn.ativo')?.dataset.tamanho;

            if (!tamanhoSelecionado) {
                // Mostrar mensagem de erro
                alert('Por favor, selecione um tamanho antes de adicionar ao carrinho.');
                return;
            }

            // Obter ID do produto do atributo data
            const produtoContainer = document.querySelector('.produto-container');
            const productId = produtoContainer ? produtoContainer.getAttribute('data-product-id') : null;

            // Coletar informações do produto
            const nome = document.querySelector('.produto-titulo').textContent;
            const precoTexto = document.querySelector('.preco-atual').textContent;
            const quantidade = parseInt(document.getElementById('quantidade').value);
            const imagem = document.getElementById('imagem-principal').src;

            // Converter preço para número
            const precoNumerico = parseFloat(precoTexto.replace('R$', '').replace(',', '.').trim());

            // Criar ID único combinando product_id e tamanho
            const idUnico = productId ? `produto-${productId}-${tamanhoSelecionado}` : `produto-${Date.now()}-${tamanhoSelecionado}`;

            // Criar objeto do produto
            const produto = {
                id: idUnico,
                product_id: productId,
                nome: nome,
                preco: precoNumerico,
                precoFormatado: precoTexto,
                tamanhos: tamanhoSelecionado,
                imagem: imagem,
                quantidade: quantidade,
                frete: freteSelecionado // Incluir frete selecionado
            };

            // Usar o sistema de carrinho existente se disponível
            if (window.carrinho && typeof window.carrinho.adicionarAoCarrinho === 'function') {
                for (let i = 0; i < quantidade; i++) {
                    const produtoUnitario = { ...produto, quantidade: 1 };
                    window.carrinho.adicionarAoCarrinho(produtoUnitario);
                }
                window.carrinho.abrirModal();
            } else {
                // Fallback: usar localStorage diretamente
                let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

                const produtoExistente = carrinho.find(item =>
                    item.id === produto.id &&
                    item.tamanhos === produto.tamanhos
                );

                if (produtoExistente) {
                    produtoExistente.quantidade += produto.quantidade;
                } else {
                    carrinho.push(produto);
                }

                localStorage.setItem('carrinho', JSON.stringify(carrinho));

                // Atualizar contador
                const contadorCarrinho = document.getElementById('contador-carrinho');
                if (contadorCarrinho) {
                    const totalItens = carrinho.reduce((total, item) => total + item.quantidade, 0);
                    contadorCarrinho.textContent = totalItens;
                    contadorCarrinho.classList.add('ativo');
                }

                // Abrir modal
                const modalCarrinho = document.getElementById('modal-carrinho');
                if (modalCarrinho) {
                    modalCarrinho.classList.add('ativo');
                    document.body.style.overflow = 'hidden';
                }
            }

            // Feedback visual
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    }

    if (btnComprarAgora) {
        btnComprarAgora.addEventListener('click', function() {
            // Validar se um tamanho foi selecionado
            const tamanhoSelecionado = document.querySelector('.tamanho-btn.ativo')?.dataset.tamanho;

            if (!tamanhoSelecionado) {
                // Mostrar mensagem de erro
                alert('Por favor, selecione um tamanho antes de comprar.');
                return;
            }

            // Obter ID do produto do atributo data
            const produtoContainer = document.querySelector('.produto-container');
            const productId = produtoContainer ? produtoContainer.getAttribute('data-product-id') : null;

            // Coletar informações do produto
            const nome = document.querySelector('.produto-titulo').textContent;
            const precoTexto = document.querySelector('.preco-atual').textContent;
            const quantidade = parseInt(document.getElementById('quantidade').value);
            const imagem = document.getElementById('imagem-principal').src;

            // Converter preço para número
            const precoNumerico = parseFloat(precoTexto.replace('R$', '').replace(',', '.').trim());

            // Criar ID único combinando product_id e tamanho
            const idUnico = productId ? `produto-${productId}-${tamanhoSelecionado}` : `produto-${Date.now()}-${tamanhoSelecionado}`;

            // Criar objeto do produto
            const produto = {
                id: idUnico,
                product_id: productId,
                nome: nome,
                preco: precoNumerico,
                precoFormatado: precoTexto,
                tamanhos: tamanhoSelecionado,
                imagem: imagem,
                quantidade: quantidade,
                frete: freteSelecionado
            };

            // Adicionar ao carrinho
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

            const produtoExistente = carrinho.find(item =>
                item.id === produto.id &&
                item.tamanhos === produto.tamanhos
            );

            if (produtoExistente) {
                produtoExistente.quantidade += produto.quantidade;
            } else {
                carrinho.push(produto);
            }

            localStorage.setItem('carrinho', JSON.stringify(carrinho));

            // Redirecionar para o checkout
            window.location.href = '/user/carrinho/comprar';
        });
    }
});

// Função para abrir modal de zoom com qualidade
function abrirModalZoom(srcImagem) {
    // Criar overlay do modal
    const modalOverlay = document.createElement('div');
    modalOverlay.className = 'modal-zoom-overlay';
    modalOverlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
        backdrop-filter: blur(10px);
    `;

    // Criar container da imagem
    const imagemContainer = document.createElement('div');
    imagemContainer.style.cssText = `
        position: relative;
        max-width: 90%;
        max-height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
    `;

    // Criar imagem ampliada
    const imagemZoom = document.createElement('img');
    imagemZoom.src = srcImagem;
    imagemZoom.style.cssText = `
        max-width: 50%;
        max-height: 50%;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        cursor: pointer;
        transition: transform 0.3s ease;
    `;

    // Criar botão de fechar
    const botaoFechar = document.createElement('button');
    botaoFechar.innerHTML = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    `;
    botaoFechar.style.cssText = `
        position: absolute;
        top: -20px;
        right: -20px;
        width: 48px;
        height: 48px;
        border: none;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        color: #1a1a1a;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.2s ease;
        backdrop-filter: blur(10px);
        z-index: 10001;
    `;

    // Hover effect no botão fechar
    botaoFechar.addEventListener('mouseenter', function() {
        this.style.background = 'rgba(255, 255, 255, 1)';
        this.style.transform = 'scale(1.1)';
    });

    botaoFechar.addEventListener('mouseleave', function() {
        this.style.background = 'rgba(255, 255, 255, 0.9)';
        this.style.transform = 'scale(1)';
    });

    // Criar indicador de carregamento
    const loadingIndicator = document.createElement('div');
    loadingIndicator.innerHTML = `
        <div style="
            width: 40px;
            height: 40px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        "></div>
        <style>
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    `;
    loadingIndicator.style.cssText = `
        color: white;
        font-size: 18px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    `;

    // Montar estrutura
    imagemContainer.appendChild(loadingIndicator);
    modalOverlay.appendChild(imagemContainer);
    document.body.appendChild(modalOverlay);

    // Animar entrada
    setTimeout(() => {
        modalOverlay.style.opacity = '1';
    }, 10);

    // Quando a imagem carregar
    imagemZoom.addEventListener('load', function() {
        loadingIndicator.remove();
        imagemContainer.appendChild(imagemZoom);
        imagemContainer.appendChild(botaoFechar);

        // Adicionar efeito de zoom ao passar mouse
        imagemZoom.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });

        imagemZoom.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Função para fechar modal
    function fecharModal() {
        modalOverlay.style.opacity = '0';
        setTimeout(() => {
            if (document.body.contains(modalOverlay)) {
                document.body.removeChild(modalOverlay);
            }
        }, 300);
        document.body.style.overflow = '';
    }

    // Eventos para fechar
    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) {
            fecharModal();
        }
    });

    botaoFechar.addEventListener('click', function(e) {
        e.stopPropagation();
        fecharModal();
    });

    // Fechar com ESC
    const handleEscape = function(e) {
        if (e.key === 'Escape') {
            fecharModal();
            document.removeEventListener('keydown', handleEscape);
        }
    };

    document.addEventListener('keydown', handleEscape);

    // Prevenir scroll do body
    document.body.style.overflow = 'hidden';
}

// Lazy loading para imagens
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => {
        imageObserver.observe(img);
    });
});

// Smooth scroll para âncoras
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Adicionar efeitos de hover nos botões
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('button, .btn');

    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
});
