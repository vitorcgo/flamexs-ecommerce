// Vendas Admin - Flamexs E-commerce
document.addEventListener('DOMContentLoaded', function() {
    
    // Funcionalidade de Pesquisa
    const inputPesquisa = document.querySelector('.input-pesquisa');
    const linhasTabela = document.querySelectorAll('.linha-venda');
    
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
        const linhas = document.querySelectorAll('.linha-venda');
        
        linhas.forEach((linha, index) => {
            linha.style.opacity = '0';
            linha.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                linha.style.transition = 'all 0.6s ease';
                linha.style.opacity = '1';
                linha.style.transform = 'translateY(0)';
            }, 200 + (index * 100));
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
    
    // Inicializar animações
    setTimeout(animarLinhasTabela, 500);
    
    console.log('Vendas Admin - Sistema carregado com sucesso!');
});
