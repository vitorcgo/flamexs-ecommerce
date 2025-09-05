// Categorias Admin - Flamexs E-commerce (Versão sem API)
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
    
    // Funcionalidade dos Switches Ativo/Inativo - Agora usa formulários tradicionais
    // A funcionalidade do switch é tratada pela função submitForm() na view
    
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

    // Auto-hide das mensagens de sucesso/erro após 5 segundos
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 5000);
    });
});