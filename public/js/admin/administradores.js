// Administradores Admin - Flamexs E-commerce
document.addEventListener('DOMContentLoaded', function() {
    
    // Funcionalidade de Pesquisa
    const inputPesquisa = document.querySelector('.input-pesquisa-admin');
    const linhasTabela = document.querySelectorAll('.linha-administrador');
    
    if (inputPesquisa) {
        inputPesquisa.addEventListener('input', function() {
            const termoPesquisa = this.value.toLowerCase().trim();
            
            linhasTabela.forEach(linha => {
                const textoLinha = linha.textContent.toLowerCase();
                const mostrar = textoLinha.includes(termoPesquisa);
                
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
    
    // Funcionalidade de Seleção de Checkboxes
    const checkboxTodos = document.querySelector('.checkbox-selecionar-todos');
    const checkboxesLinha = document.querySelectorAll('.checkbox-linha');
    
    if (checkboxTodos) {
        checkboxTodos.addEventListener('change', function() {
            const isChecked = this.checked;
            
            checkboxesLinha.forEach(checkbox => {
                checkbox.checked = isChecked;
                
                // Animação visual
                const linha = checkbox.closest('.linha-administrador');
                if (isChecked) {
                    linha.style.backgroundColor = 'rgba(255, 0, 0, 0.05)';
                } else {
                    linha.style.backgroundColor = '';
                }
            });
            
            mostrarToast(
                isChecked ? 'Todos os administradores selecionados' : 'Seleção removida',
                isChecked ? 'success' : 'info'
            );
        });
    }
    
    // Funcionalidade individual dos checkboxes
    checkboxesLinha.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const linha = this.closest('.linha-administrador');
            
            if (this.checked) {
                linha.style.backgroundColor = 'rgba(255, 0, 0, 0.05)';
            } else {
                linha.style.backgroundColor = '';
            }
            
            // Atualizar checkbox "selecionar todos"
            const todosChecked = Array.from(checkboxesLinha).every(cb => cb.checked);
            const nenhumChecked = Array.from(checkboxesLinha).every(cb => !cb.checked);
            
            if (checkboxTodos) {
                checkboxTodos.checked = todosChecked;
                checkboxTodos.indeterminate = !todosChecked && !nenhumChecked;
            }
        });
    });
    
    // Funcionalidade dos Switches Ativo/Inativo
    const switchesAtivo = document.querySelectorAll('.switch-ativo');
    
    switchesAtivo.forEach(switchElement => {
        const input = switchElement.querySelector('input[type="checkbox"]');
        
        input.addEventListener('change', function() {
            const linha = this.closest('.linha-administrador');
            const nomeAdmin = linha.querySelector('.nome-administrador').textContent;
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
                `${nomeAdmin} ${isAtivo ? 'ativado' : 'desativado'} com sucesso`,
                isAtivo ? 'success' : 'warning'
            );
        });
    });
    
    // Funcionalidade dos Botões de Função - APENAS EDITAR (excluir usa modal global)
    const botoesEditar = document.querySelectorAll('.botao-funcao.editar');
    
    botoesEditar.forEach(botao => {
        botao.addEventListener('click', function() {
            const linha = this.closest('.linha-administrador');
            const nomeAdmin = linha.querySelector('.nome-administrador').textContent;
            
            // Animação de clique
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1.1)';
            }, 100);
            
            mostrarToast(`Editando ${nomeAdmin}`, 'info');
        });
    });
    
    // Funcionalidade da Paginação
    const numerosPagina = document.querySelectorAll('.numero-pagina-administradores');
    const botoesPaginacao = document.querySelectorAll('.botao-paginacao-administradores');
    
    numerosPagina.forEach(numero => {
        numero.addEventListener('click', function() {
            // Remove classe ativo de todos
            numerosPagina.forEach(n => n.classList.remove('ativo'));
            
            // Adiciona classe ativo ao clicado
            this.classList.add('ativo');
            
            // Animação de transição da página
            const containerTabela = document.querySelector('.container-tabela-administradores');
            containerTabela.style.opacity = '0.5';
            containerTabela.style.transform = 'translateY(10px)';
            
            setTimeout(() => {
                containerTabela.style.transition = 'all 0.3s ease';
                containerTabela.style.opacity = '1';
                containerTabela.style.transform = 'translateY(0)';
                
                mostrarToast(`Página ${this.textContent} carregada`, 'info');
            }, 200);
        });
    });
    
    // Funcionalidade dos botões de seta da paginação
    botoesPaginacao.forEach(botao => {
        botao.addEventListener('click', function() {
            const paginaAtiva = document.querySelector('.numero-pagina-administradores.ativo');
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
    const selectItens = document.querySelector('.select-itens-admin');
    
    if (selectItens) {
        selectItens.addEventListener('change', function() {
            const valor = this.value;
            
            // Animação de loading
            const containerTabela = document.querySelector('.container-tabela-administradores');
            containerTabela.style.opacity = '0.7';
            
            setTimeout(() => {
                containerTabela.style.opacity = '1';
                mostrarToast(`Mostrando ${valor} itens por página`, 'success');
            }, 300);
        });
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
            this.style.transform = 'translateX(2px)';
        });
        
        linha.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Animação de entrada das linhas da tabela
    function animarLinhasTabela() {
        const linhas = document.querySelectorAll('.linha-administrador');
        
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
    
    // Inicializar animações
    setTimeout(animarLinhasTabela, 800);
});