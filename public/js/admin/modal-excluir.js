// Modal de Confirmação de Exclusão
document.addEventListener('DOMContentLoaded', function() {
    const modalExcluir = document.getElementById('modalExcluir');
    const cancelarExclusao = document.getElementById('cancelarExclusao');
    const confirmarExclusao = document.getElementById('confirmarExclusao');
    
    let callbackExclusao = null;
    let itemParaExcluir = null;

    // Função global para abrir o modal de exclusão
    window.abrirModalExclusao = function(callback, item = null) {
        callbackExclusao = callback;
        itemParaExcluir = item;
        modalExcluir.classList.add('ativo');
        document.body.style.overflow = 'hidden';
        
        // Reinicia a animação do ícone
        const icone = document.querySelector('.modal-icone-excluir');
        icone.style.animation = 'none';
        setTimeout(() => {
            icone.style.animation = 'shakeIcon 0.6s ease-in-out';
        }, 10);
    };

    // Função para fechar o modal
    function fecharModalExclusao() {
        modalExcluir.classList.remove('ativo');
        document.body.style.overflow = '';
        callbackExclusao = null;
        itemParaExcluir = null;
    }

    // Botão Cancelar
    cancelarExclusao.addEventListener('click', function() {
        fecharModalExclusao();
    });

    // Botão Confirmar
    confirmarExclusao.addEventListener('click', function() {
        if (callbackExclusao && typeof callbackExclusao === 'function') {
            callbackExclusao(itemParaExcluir);
        }
        fecharModalExclusao();
    });

    // Fechar modal ao clicar no overlay
    modalExcluir.addEventListener('click', function(e) {
        if (e.target === modalExcluir) {
            fecharModalExclusao();
        }
    });

    // Fechar modal com ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalExcluir.classList.contains('ativo')) {
            fecharModalExclusao();
        }
    });

    // Função global para substituir os confirms antigos
    window.confirmarExclusao = function(id, tipo = 'item') {
        abrirModalExclusao(function(item) {
            // Aqui você pode fazer a requisição AJAX para excluir
            // Por enquanto, apenas simula a exclusão
            setTimeout(() => {
                alert(`${tipo.charAt(0).toUpperCase() + tipo.slice(1)} excluído com sucesso!`);
                
                // Se for uma linha de tabela, remove ela
                const linha = document.querySelector(`[data-id="${item}"]`);
                if (linha) {
                    linha.style.transition = 'all 0.3s ease';
                    linha.style.opacity = '0';
                    linha.style.transform = 'translateX(-20px)';
                    setTimeout(() => {
                        linha.remove();
                    }, 300);
                }
                
                // Ou recarrega a página
                // location.reload();
            }, 500);
        }, id);
    };
});