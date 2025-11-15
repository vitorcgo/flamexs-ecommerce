// Dashboard Admin - Flamexs
document.addEventListener('DOMContentLoaded', function() {
    
    // Inicializar animações dos cards
    inicializarAnimacoesCards();
    
    // Inicializar gráfico
    inicializarGrafico();
    
    // Inicializar toggles
    inicializarToggles();
    
    // Inicializar botões de ação (SEM exclusão automática)
    inicializarBotoesAcao();
    
    // Inicializar barras de progresso
    inicializarBarrasProgresso();
    
    // Inicializar botões de detalhes do pedido
    inicializarBotoesDetalhes();
});

// Animações dos cards
function inicializarAnimacoesCards() {
    const cards = document.querySelectorAll('.card-estatistica');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, {
        threshold: 0.1
    });
    
    cards.forEach(card => {
        observer.observe(card);
    });
}

// Inicializar gráfico do dashboard
function inicializarGrafico() {
    const ctx = document.getElementById('grafico-painel');
    if (!ctx) return;
    
    const dadosGrafico = {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Vendas',
            data: [400, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            borderColor: '#FF4D4D',
            backgroundColor: 'rgba(255, 77, 77, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#FF4D4D',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8,
            pointHoverBackgroundColor: '#FF4D4D',
            pointHoverBorderColor: '#ffffff',
            pointHoverBorderWidth: 3
        }]
    };
    
    const configuracao = {
        type: 'line',
        data: dadosGrafico,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    borderColor: '#FF4D4D',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        title: function(context) {
                            return context[0].label;
                        },
                        label: function(context) {
                            return `$${context.parsed.y.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            family: 'Lexend',
                            size: 12
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    max: 3500,
                    grid: {
                        color: '#F3F4F6',
                        borderDash: [5, 5]
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            family: 'Lexend',
                            size: 12
                        },
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            },
            elements: {
                point: {
                    hoverRadius: 8
                }
            }
        }
    };
    
    new Chart(ctx, configuracao);
}

// Inicializar toggles das categorias
function inicializarToggles() {
    const toggles = document.querySelectorAll('.interruptor-toggle');
    
    toggles.forEach(toggle => {
        const input = toggle.querySelector('input[type="checkbox"]');
        const slider = toggle.querySelector('.slider-toggle');
        
        // Definir estado inicial
        if (input.checked) {
            toggle.classList.add('ativo');
        }
        
        // Adicionar evento de clique
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Toggle do estado
            input.checked = !input.checked;
            
            // Animação do toggle
            if (input.checked) {
                toggle.classList.add('ativo');
                animarToggleLigado(slider);
            } else {
                toggle.classList.remove('ativo');
                animarToggleDesligado(slider);
            }
            
            // Feedback visual
            toggle.style.transform = 'scale(0.95)';
            setTimeout(() => {
                toggle.style.transform = 'scale(1)';
            }, 150);
        });
    });
}

// Animação toggle ligado
function animarToggleLigado(slider) {
    slider.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
    slider.style.backgroundColor = '#10B981';
}

// Animação toggle desligado
function animarToggleDesligado(slider) {
    slider.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
    slider.style.backgroundColor = '#D1D5DB';
}

// Inicializar botões de ação (SEM exclusão automática)
function inicializarBotoesAcao() {
    const botoesAcao = document.querySelectorAll('.botao-acao');
    
    botoesAcao.forEach(botao => {
        // REMOVER event listener que causava exclusão automática
        // Apenas adicionar animação visual
        botao.addEventListener('click', function(e) {
            // Animação de clique
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 100);
            }, 100);
            
            // Determinar ação baseada na classe (SEM executar exclusão)
            if (this.classList.contains('visualizar')) {
                mostrarToast('Visualizando item...', 'info');
            } else if (this.classList.contains('editar')) {
                mostrarToast('Editando item...', 'warning');
            }
            // REMOVIDO: else if (this.classList.contains('excluir')) - não executa mais automaticamente
        });
    });
}

// Inicializar barras de progresso
function inicializarBarrasProgresso() {
    const barrasProgresso = document.querySelectorAll('.preenchimento-progresso');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const barraProgresso = entry.target;
                const largura = barraProgresso.getAttribute('data-width');
                
                setTimeout(() => {
                    barraProgresso.style.width = largura + '%';
                }, 500);
            }
        });
    }, {
        threshold: 0.5
    });
    
    barrasProgresso.forEach(barra => {
        observer.observe(barra);
    });
}

// Sistema de toast notifications
function mostrarToast(mensagem, tipo = 'info') {
    // Remover toast existente
    const toastExistente = document.querySelector('.toast');
    if (toastExistente) {
        toastExistente.remove();
    }
    
    // Criar novo toast
    const toast = document.createElement('div');
    toast.className = `toast toast-${tipo}`;
    toast.innerHTML = `
        <div class="conteudo-toast">
            <span class="icone-toast">${obterIconeToast(tipo)}</span>
            <span class="mensagem-toast">${mensagem}</span>
        </div>
    `;
    
    // Estilos do toast
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${obterCorToast(tipo)};
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        font-family: 'Lexend', sans-serif;
        font-weight: 500;
        font-size: 14px;
        transform: translateX(100%);
        transition: all 0.3s ease;
    `;
    
    // Adicionar ao DOM
    document.body.appendChild(toast);
    
    // Animar entrada
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // Remover após 3 segundos
    setTimeout(() => {
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

// Ícones para toast
function obterIconeToast(tipo) {
    const icones = {
        info: '📋',
        warning: '✏️',
        error: '🗑️',
        success: '✅'
    };
    return icones[tipo] || icones.info;
}

// Cores para toast
function obterCorToast(tipo) {
    const cores = {
        info: '#3B82F6',
        warning: '#F59E0B',
        error: '#EF4444',
        success: '#10B981'
    };
    return cores[tipo] || cores.info;
}

// Funcionalidades dos dropdowns
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('dropdown-mes') || e.target.classList.contains('dropdown-grafico')) {
        // Animação de seleção
        e.target.style.transform = 'scale(0.98)';
        setTimeout(() => {
            e.target.style.transform = 'scale(1)';
        }, 150);
    }
});

// Funcionalidade dos botões "Ver mais"
document.querySelectorAll('.botao-ver-mais').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Determinar qual seção
        const ehCategorias = this.closest('.card-categorias');
        const mensagem = ehCategorias ? 'Carregando todas as categorias...' : 'Carregando todas as vendas...';
        
        mostrarToast(mensagem, 'info');
    });
});

// Smooth scroll para elementos que entram na tela
const opcoeObserver = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observerFadeIn = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, opcoeObserver);

// Aplicar observer a elementos que precisam de fade-in
document.querySelectorAll('.card-categorias, .card-vendas').forEach(el => {
    observerFadeIn.observe(el);
});

// Adicionar efeitos de loading state
function mostrarEstadoCarregamento(elemento) {
    elemento.style.opacity = '0.6';
    elemento.style.pointerEvents = 'none';
    
    // Criar spinner
    const spinner = document.createElement('div');
    spinner.className = 'spinner-carregamento';
    spinner.style.cssText = `
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border: 2px solid #E5E7EB;
        border-top: 2px solid #8B5CF6;
        border-radius: 50%;
        animation: girar 1s linear infinite;
    `;
    
    elemento.style.position = 'relative';
    elemento.appendChild(spinner);
    
    // Remover loading após 2 segundos (simulação)
    setTimeout(() => {
        elemento.style.opacity = '1';
        elemento.style.pointerEvents = 'auto';
        spinner.remove();
    }, 2000);
}

// Adicionar animação de spin para o spinner
const estilo = document.createElement('style');
estilo.textContent = `
    @keyframes girar {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
`;
document.head.appendChild(estilo);

// Inicializar botões de detalhes do pedido
function inicializarBotoesDetalhes() {
    const botoesDetalhes = document.querySelectorAll('.btn-detalhes-pedido');
    
    botoesDetalhes.forEach(botao => {
        botao.addEventListener('click', function(e) {
            e.preventDefault();
            const orderId = this.getAttribute('data-order-id');
            const orderJsonBase64 = this.getAttribute('data-order-json');
            
            // Decodificar dados do pedido
            try {
                const orderJson = atob(orderJsonBase64);
                const order = JSON.parse(orderJson);
                criarModalDetalhes(order);
            } catch (error) {
                console.error('Erro ao decodificar dados do pedido:', error);
                mostrarToast('Erro ao carregar detalhes do pedido', 'error');
            }
        });
    });
}

// Abrir modal com detalhes do pedido (alternativa com AJAX)
function abrirModalDetalhes(orderId) {
    console.log('Abrindo detalhes do pedido:', orderId);
    
    // Buscar dados do pedido via AJAX
    fetch(`/admin/api/orders/${orderId}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        }
    })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Dados recebidos:', data);
            criarModalDetalhes(data);
        })
        .catch(error => {
            console.error('Erro ao buscar detalhes do pedido:', error);
            mostrarToast('Erro ao carregar detalhes do pedido: ' + error.message, 'error');
        });
}

// Criar e exibir modal com detalhes
function criarModalDetalhes(order) {
    // Remover modal anterior se existir
    const modalAnterior = document.querySelector('.modal-detalhes-pedido');
    if (modalAnterior) {
        modalAnterior.remove();
    }
    
    // Criar HTML do modal
    const modal = document.createElement('div');
    modal.className = 'modal-detalhes-pedido ativo';
    
    // Formatar dados
    const orderData = JSON.parse(order.order_data);
    const dataFormatada = new Date(order.created_at).toLocaleDateString('pt-BR');
    const horaFormatada = new Date(order.created_at).toLocaleTimeString('pt-BR');
    
    // Gerar linhas da tabela de itens
    let linhasItens = '';
    if (order.items && order.items.length > 0) {
        order.items.forEach(item => {
            const produtoNome = item.product ? item.product.name : 'Produto removido';
            linhasItens += `
                <tr>
                    <td>${produtoNome}</td>
                    <td>${item.qty}</td>
                    <td>R$ ${parseFloat(item.price).toFixed(2).replace('.', ',')}</td>
                    <td>R$ ${(item.qty * item.price).toFixed(2).replace('.', ',')}</td>
                </tr>
            `;
        });
    } else {
        linhasItens = '<tr><td colspan="4" style="text-align: center;">Nenhum item neste pedido</td></tr>';
    }
    
    // Endereço completo
    const endereco = `${orderData.endereco}${orderData.complemento ? ', ' + orderData.complemento : ''}, ${orderData.cidade} - ${orderData.estado}, ${orderData.cep}`;
    
    modal.innerHTML = `
        <div class="modal-conteudo-detalhes">
            <div class="modal-cabecalho-detalhes">
                <h2 class="modal-titulo-detalhes">Detalhes do Pedido #${order.id}</h2>
                <button class="modal-fechar-detalhes" onclick="fecharModalDetalhes()">×</button>
            </div>
            
            <div class="modal-info-pedido">
                <div class="modal-info-item">
                    <span class="modal-info-label">ID do Pedido</span>
                    <span class="modal-info-valor">#${order.id}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Data</span>
                    <span class="modal-info-valor">${dataFormatada}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Hora</span>
                    <span class="modal-info-valor">${horaFormatada}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Status</span>
                    <span class="modal-info-valor" style="text-transform: capitalize;">${order.status}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Cliente</span>
                    <span class="modal-info-valor">${order.user.full_name || 'Usuário'}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Email</span>
                    <span class="modal-info-valor">${orderData.email}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Telefone</span>
                    <span class="modal-info-valor">${orderData.telefone}</span>
                </div>
                <div class="modal-info-item">
                    <span class="modal-info-label">Método de Pagamento</span>
                    <span class="modal-info-valor" style="text-transform: capitalize;">${orderData.metodo_pagamento}</span>
                </div>
            </div>
            
            <h3 style="font-family: 'Lexend', sans-serif; font-weight: 600; font-size: 16px; color: #1F2937; margin-bottom: 12px;">Itens do Pedido</h3>
            <table class="modal-tabela-itens">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    ${linhasItens}
                </tbody>
            </table>
            
            <div class="modal-info-endereco">
                <div class="modal-endereco-titulo">Endereço de Entrega</div>
                <div class="modal-endereco-texto">${endereco}</div>
            </div>
            
            <div style="background: #F9FAFB; padding: 16px; border-radius: 12px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
                <span style="font-family: 'Lexend', sans-serif; font-weight: 600; font-size: 16px; color: #1F2937;">Total do Pedido:</span>
                <span style="font-family: 'Lexend', sans-serif; font-weight: 700; font-size: 20px; color: #8B5CF6;">R$ ${parseFloat(order.total_amount).toFixed(2).replace('.', ',')}</span>
            </div>
            
            <div class="modal-rodape-detalhes">
                <button class="modal-botao-fechar" onclick="fecharModalDetalhes()">Fechar</button>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Fechar ao clicar fora do modal
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            fecharModalDetalhes();
        }
    });
}

// Fechar modal
function fecharModalDetalhes() {
    const modal = document.querySelector('.modal-detalhes-pedido');
    if (modal) {
        modal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            modal.remove();
        }, 300);
    }
}

// Adicionar animação de fade out
const estiloFadeOut = document.createElement('style');
estiloFadeOut.textContent = `
    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
`;
document.head.appendChild(estiloFadeOut);