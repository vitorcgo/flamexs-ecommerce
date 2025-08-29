// Categorias Admin - Flamexs E-commerce
document.addEventListener('DOMContentLoaded', function() {
    
    // Funcionalidade de Pesquisa
    const inputPesquisa = document.querySelector('.input-pesquisa-categorias');
    const linhasTabela = document.querySelectorAll('.linha-categoria');
    
    if (inputPesquisa) {
        inputPesquisa.addEventListener('input', function() {
            const termoPesquisa = this.value.toLowerCase().trim();
            
            linhasTabela.forEach(linha => {
                const nomeCategoria = linha.querySelector('.nome-categoria').textContent.toLowerCase();
                const mostrar = nomeCategoria.includes(termoPesquisa);
                
                linha.style.display = mostrar ? '' : 'none';
                
                // Animação suave ao mostrar/ocultar
                if (mostrar) {
                    linha.style.opacity = '0';
                    linha.style.transform = 'translateY(10px)';
                    
                    setTimeout(() => {
                        linha.style.transition = 'all 0.3s ease';
                        linha.style.opacity = '1';
                        linha.style.transform = 'translateY(0)';
                    }, 50);
                }
            });
        });
    }
    
    // Funcionalidade dos Switches Ativo/Inativo
    const switchesCategorias = document.querySelectorAll('.switch-categoria');
    
    switchesCategorias.forEach(switchElement => {
        const input = switchElement.querySelector('input[type="checkbox"]');
        
        input.addEventListener('change', function() {
            const linha = this.closest('.linha-categoria');
            const nomeCategoria = linha.querySelector('.nome-categoria').textContent;
            const isAtivo = this.checked;
            
            // Atualizar classe visual
            if (isAtivo) {
                switchElement.classList.add('ativo');
            } else {
                switchElement.classList.remove('ativo');
            }
            
            // Animação de feedback
            switchElement.style.transform = 'scale(1.1)';
            setTimeout(() => {
                switchElement.style.transform = 'scale(1)';
            }, 200);
            
            mostrarToast(
                `Categoria "${nomeCategoria}" ${isAtivo ? 'ativada' : 'desativada'} com sucesso`,
                isAtivo ? 'success' : 'warning'
            );
        });
    });
    
    // Funcionalidade dos Botões de Função - APENAS EDITAR (excluir usa modal global)
    const botoesEditar = document.querySelectorAll('.botao-funcao-categoria.editar');
    
    botoesEditar.forEach(botao => {
        botao.addEventListener('click', function() {
            const linha = this.closest('.linha-categoria');
            const nomeCategoria = linha.querySelector('.nome-categoria').textContent;
            
            // Animação de clique
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1.1)';
            }, 100);
            
            mostrarToast(`Editando categoria "${nomeCategoria}"`, 'info');
        });
    });
    
    // Funcionalidades do Modal
    const modal = document.getElementById('modalAdicionarCategoria');
    const botaoFecharModal = document.getElementById('fecharModal');
    const botaoCancelarModal = document.getElementById('cancelarModal');
    const formCategoria = document.getElementById('formAdicionarCategoria');
    const switchModal = document.querySelector('.switch-modal');
    const inputSwitchModal = switchModal ? switchModal.querySelector('input[type="checkbox"]') : null;
    
    // Função para abrir modal
    function abrirModal() {
        if (modal) {
            modal.classList.add('ativo');
            document.body.style.overflow = 'hidden';
            
            // Focar no campo de input
            const inputNome = document.getElementById('nomeCategoria');
            if (inputNome) {
                setTimeout(() => {
                    inputNome.focus();
                }, 300);
            }
        }
    }
    
    // Função para fechar modal
    function fecharModal() {
        if (modal) {
            modal.classList.remove('ativo');
            document.body.style.overflow = '';
            
            // Limpar formulário
            if (formCategoria) {
                formCategoria.reset();
            }
            
            // Resetar switch para ativo
            if (switchModal && inputSwitchModal) {
                switchModal.classList.add('ativo');
                inputSwitchModal.checked = true;
            }
        }
    }
    
    // Event listeners do modal
    if (botaoFecharModal) {
        botaoFecharModal.addEventListener('click', fecharModal);
    }
    
    if (botaoCancelarModal) {
        botaoCancelarModal.addEventListener('click', fecharModal);
    }
    
    // Fechar modal ao clicar no overlay
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                fecharModal();
            }
        });
    }
    
    // Fechar modal com ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.classList.contains('ativo')) {
            fecharModal();
        }
    });
    
    // Funcionalidade do switch do modal
    if (switchModal && inputSwitchModal) {
        inputSwitchModal.addEventListener('change', function() {
            if (this.checked) {
                switchModal.classList.add('ativo');
            } else {
                switchModal.classList.remove('ativo');
            }
            
            // Animação de feedback
            switchModal.style.transform = 'scale(1.1)';
            setTimeout(() => {
                switchModal.style.transform = 'scale(1)';
            }, 200);
        });
    }
    
    // Submissão do formulário
    if (formCategoria) {
        formCategoria.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const nomeCategoria = formData.get('nome');
            const ativo = formData.get('ativo') ? true : false;
            
            // Animação no botão adicionar
            const botaoSubmit = this.querySelector('.botao-adicionar');
            if (botaoSubmit) {
                botaoSubmit.style.transform = 'scale(0.95)';
                botaoSubmit.textContent = 'Adicionando...';
                
                setTimeout(() => {
                    botaoSubmit.style.transform = 'scale(1)';
                    botaoSubmit.textContent = 'Adicionar';
                }, 200);
            }
            
            // Simular adição da categoria
            setTimeout(() => {
                adicionarCategoriaTabela(nomeCategoria, ativo);
                fecharModal();
                mostrarToast(`Categoria "${nomeCategoria}" adicionada com sucesso!`, 'success');
            }, 1000);
        });
    }
    
    // Atualizar botão adicionar para abrir modal
    const botaoAdicionar = document.querySelector('.botao-adicionar-categorias');
    if (botaoAdicionar) {
        botaoAdicionar.addEventListener('click', function() {
            // Animação de clique
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1.05)';
            }, 100);
            
            // Abrir modal
            abrirModal();
        });
    }
    
    // Função para adicionar categoria na tabela
    function adicionarCategoriaTabela(nome, ativo) {
        const tbody = document.querySelector('.lista-arrastavel');
        if (!tbody) return;
        
        const novaLinha = document.createElement('tr');
        novaLinha.className = 'linha-categoria';
        novaLinha.draggable = true;
        novaLinha.setAttribute('data-delay', '0');
        novaLinha.setAttribute('data-id', Date.now()); // ID único
        
        novaLinha.innerHTML = `
            <td class="celula-arrastar">
                <div class="icone-arrastar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </div>
            </td>
            <td class="nome-categoria">${nome}</td>
            <td class="celula-ativo">
                <label class="switch-categoria ${ativo ? 'ativo' : ''}">
                    <input type="checkbox" ${ativo ? 'checked' : ''}>
                    <span class="slider-categoria"></span>
                </label>
            </td>
            <td class="celula-funcoes">
                <div class="botoes-funcoes-categoria">
                    <button class="botao-funcao-categoria editar" title="Editar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </button>
                    <button class="botao-funcao-categoria excluir" title="Excluir" onclick="confirmarExclusao(${Date.now()}, 'categoria')">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="3,6 5,6 21,6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </button>
                </div>
            </td>
        `;
        
        // Adicionar no início da tabela
        tbody.insertBefore(novaLinha, tbody.firstChild);
        
        // Animação de entrada
        novaLinha.style.opacity = '0';
        novaLinha.style.transform = 'translateY(-20px)';
        
        setTimeout(() => {
            novaLinha.style.transition = 'all 0.6s ease';
            novaLinha.style.opacity = '1';
            novaLinha.style.transform = 'translateY(0)';
        }, 100);
        
        // Reativar event listeners para a nova linha
        ativarEventListenersLinha(novaLinha);
        atualizarContadorResultados();
    }
    
    // Função para ativar event listeners em uma linha
    function ativarEventListenersLinha(linha) {
        // Switch
        const switchCategoria = linha.querySelector('.switch-categoria');
        const inputSwitch = switchCategoria ? switchCategoria.querySelector('input[type="checkbox"]') : null;
        
        if (switchCategoria && inputSwitch) {
            inputSwitch.addEventListener('change', function() {
                const nomeCategoria = linha.querySelector('.nome-categoria').textContent;
                const isAtivo = this.checked;
                
                if (isAtivo) {
                    switchCategoria.classList.add('ativo');
                } else {
                    switchCategoria.classList.remove('ativo');
                }
                
                switchCategoria.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    switchCategoria.style.transform = 'scale(1)';
                }, 200);
                
                mostrarToast(
                    `Categoria "${nomeCategoria}" ${isAtivo ? 'ativada' : 'desativada'} com sucesso`,
                    isAtivo ? 'success' : 'warning'
                );
            });
        }
        
        // Botão editar
        const botaoEditar = linha.querySelector('.botao-funcao-categoria.editar');
        
        if (botaoEditar) {
            botaoEditar.addEventListener('click', function() {
                const nomeCategoria = linha.querySelector('.nome-categoria').textContent;
                this.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    this.style.transform = 'scale(1.1)';
                }, 100);
                mostrarToast(`Editando categoria "${nomeCategoria}"`, 'info');
            });
        }
        
        // Hover effects
        linha.addEventListener('mouseenter', function() {
            if (!this.classList.contains('arrastando')) {
                this.style.transform = 'translateX(2px)';
            }
        });
        
        linha.addEventListener('mouseleave', function() {
            if (!this.classList.contains('arrastando')) {
                this.style.transform = 'translateX(0)';
            }
        });
    }
    
    // Funcionalidade da Paginação
    const numerosPagina = document.querySelectorAll('.numero-pagina-categorias');
    const botoesPaginacao = document.querySelectorAll('.botao-paginacao-categorias');
    
    numerosPagina.forEach(numero => {
        numero.addEventListener('click', function() {
            // Remove classe ativo de todos
            numerosPagina.forEach(n => n.classList.remove('ativo'));
            
            // Adiciona classe ativo ao clicado
            this.classList.add('ativo');
            
            // Animação de transição da página
            const containerLista = document.querySelector('.container-lista-categorias');
            containerLista.style.opacity = '0.5';
            containerLista.style.transform = 'translateY(10px)';
            
            setTimeout(() => {
                containerLista.style.transition = 'all 0.3s ease';
                containerLista.style.opacity = '1';
                containerLista.style.transform = 'translateY(0)';
                
                mostrarToast(`Página ${this.textContent} carregada`, 'info');
                atualizarContadorResultados();
            }, 200);
        });
    });
    
    // Funcionalidade dos botões de seta da paginação
    botoesPaginacao.forEach(botao => {
        botao.addEventListener('click', function() {
            const paginaAtiva = document.querySelector('.numero-pagina-categorias.ativo');
            const numeroAtual = parseInt(paginaAtiva.textContent);
            const isProximo = this.querySelector('polyline').getAttribute('points') === '9,18 15,12 9,6';
            
            let novaPagina;
            if (isProximo && numeroAtual < 4) {
                novaPagina = numeroAtual + 1;
            } else if (!isProximo && numeroAtual > 1) {
                novaPagina = numeroAtual - 1;
            }
            
            if (novaPagina) {
                const novoBotao = Array.from(numerosPagina).find(n => n.textContent == novaPagina);
                if (novoBotao) {
                    novoBotao.click();
                }
            }
        });
    });
    
    // Funcionalidade do Select de Itens por Página
    const selectItens = document.querySelector('.select-itens-categorias');
    
    if (selectItens) {
        selectItens.addEventListener('change', function() {
            const valor = this.value;
            
            // Animação de loading
            const containerLista = document.querySelector('.container-lista-categorias');
            containerLista.style.opacity = '0.7';
            
            setTimeout(() => {
                containerLista.style.opacity = '1';
                mostrarToast(`Mostrando ${valor} itens por página`, 'success');
                atualizarContadorResultados();
            }, 300);
        });
    }
    
    // Função para atualizar contador de resultados
    function atualizarContadorResultados() {
        const linhasVisiveis = Array.from(document.querySelectorAll('.linha-categoria')).filter(linha => 
            linha.style.display !== 'none'
        ).length;
        
        const infoResultados = document.querySelector('.info-resultados span');
        if (infoResultados) {
            const paginaAtual = document.querySelector('.numero-pagina-categorias.ativo').textContent;
            const itensPorPagina = document.querySelector('.select-itens-categorias').value;
            
            infoResultados.textContent = `Mostrando ${paginaAtual} de ${Math.ceil(linhasVisiveis / itensPorPagina)} entre ${linhasVisiveis} resultados`;
        }
    }
    
    // Função para mostrar toast notifications
    function mostrarToast(mensagem, tipo = 'info') {
        // Remove toast anterior se existir
        const toastAnterior = document.querySelector('.toast-notification');
        if (toastAnterior) {
            toastAnterior.remove();
        }
        
        // Cria novo toast
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${tipo}`;
        toast.textContent = mensagem;
        
        // Estilos do toast
        Object.assign(toast.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '12px 20px',
            borderRadius: '8px',
            color: 'white',
            fontFamily: 'Lexend, sans-serif',
            fontSize: '14px',
            fontWeight: '500',
            zIndex: '9999',
            opacity: '0',
            transform: 'translateX(100px)',
            transition: 'all 0.3s ease'
        });
        
        // Cores por tipo
        const cores = {
            info: '#3B82F6',
            success: '#10B981',
            warning: '#F59E0B',
            error: '#EF4444'
        };
        
        toast.style.backgroundColor = cores[tipo] || cores.info;
        
        // Adiciona ao DOM
        document.body.appendChild(toast);
        
        // Animação de entrada
        setTimeout(() => {
            toast.style.opacity = '1';
            toast.style.transform = 'translateX(0)';
        }, 100);
        
        // Remove após 3 segundos
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(100px)';
            
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.remove();
                }
            }, 300);
        }, 3000);
    }
    
    // Efeito de hover nas linhas da tabela
    linhasTabela.forEach(linha => {
        linha.addEventListener('mouseenter', function() {
            if (!this.classList.contains('arrastando')) {
                this.style.transform = 'translateX(2px)';
            }
        });
        
        linha.addEventListener('mouseleave', function() {
            if (!this.classList.contains('arrastando')) {
                this.style.transform = 'translateX(0)';
            }
        });
    });
    
    // Animação de entrada das linhas da tabela
    function animarLinhasTabela() {
        const linhas = document.querySelectorAll('.linha-categoria');
        
        linhas.forEach((linha, index) => {
            linha.style.opacity = '0';
            linha.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                linha.style.transition = 'all 0.6s ease';
                linha.style.opacity = '1';
                linha.style.transform = 'translateY(0)';
            }, 500 + (index * 100));
        });
    }
    
    // Inicializar contador de resultados
    setTimeout(() => {
        atualizarContadorResultados();
    }, 1000);
    
    // Inicializar animações
    setTimeout(animarLinhasTabela, 800);
});