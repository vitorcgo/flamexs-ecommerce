// Header Admin - Flamexs E-commerce
document.addEventListener('DOMContentLoaded', function() {

    // Elementos do menu mobile
    const botaoMenuMobile = document.getElementById('botao-menu-mobile');
    const menuNavegacao = document.getElementById('menu-navegacao');
    const linksNavegacao = document.querySelectorAll('.link-navegacao');

    // Função para alternar o menu mobile
    function alternarMenuMobile() {
        if (botaoMenuMobile && menuNavegacao) {
            // Alterna as classes ativo
            botaoMenuMobile.classList.toggle('ativo');
            menuNavegacao.classList.toggle('ativo');

            // Previne scroll do body quando menu está aberto
            if (menuNavegacao.classList.contains('ativo')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    }

    // Função para fechar o menu mobile
    function fecharMenuMobile() {
        if (botaoMenuMobile && menuNavegacao) {
            botaoMenuMobile.classList.remove('ativo');
            menuNavegacao.classList.remove('ativo');
            document.body.style.overflow = '';
        }
    }

    // Event listener para o botão do menu mobile
    if (botaoMenuMobile) {
        botaoMenuMobile.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            alternarMenuMobile();
        });
    }

    // Fechar menu ao clicar em um link
    linksNavegacao.forEach(link => {
        link.addEventListener('click', function() {
            fecharMenuMobile();
        });
    });

    // Fechar menu ao clicar fora dele
    document.addEventListener('click', function(e) {
        if (menuNavegacao && menuNavegacao.classList.contains('ativo')) {
            // Verifica se o clique foi fora do menu e do botão
            if (!menuNavegacao.contains(e.target) && !botaoMenuMobile.contains(e.target)) {
                fecharMenuMobile();
            }
        }
    });

    // Fechar menu ao redimensionar a tela (para desktop)
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            fecharMenuMobile();
        }
    });

    // Fechar menu com tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && menuNavegacao && menuNavegacao.classList.contains('ativo')) {
            fecharMenuMobile();
        }
    });

    // Marcar link ativo baseado na URL atual
    function marcarLinkAtivo() {
        const urlAtual = window.location.pathname;

        linksNavegacao.forEach(link => {
            link.classList.remove('ativo');

            const href = link.getAttribute('href');
            if (href && urlAtual.includes(href.replace('/', ''))) {
                link.classList.add('ativo');
            }
        });
    }

    // Executar ao carregar a página
    marcarLinkAtivo();
    /*
    // Função de confirmação de logout
    window.confirmarLogout = function() {
        if (confirm('Tem certeza que deseja sair do painel administrativo?')) {
            // Aqui você pode adicionar a lógica de logout
            console.log('Fazendo logout...');

            // Exemplo de redirecionamento
            // window.location.href = '/adm/login';

            // Ou fazer uma requisição AJAX para logout
            // fetch('/adm/logout', { method: 'POST' })
            //     .then(() => window.location.href = '/adm/login');

            alert('Logout realizado com sucesso!');
        }
    };
    */
    // Animação suave para links de navegação
    linksNavegacao.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Efeito de ripple nos botões
    function criarEfeitoRipple(elemento, evento) {
        const rect = elemento.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = evento.clientX - rect.left - size / 2;
        const y = evento.clientY - rect.top - size / 2;

        const ripple = document.createElement('span');
        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        `;

        elemento.style.position = 'relative';
        elemento.style.overflow = 'hidden';
        elemento.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    // Adicionar efeito ripple aos links
    linksNavegacao.forEach(link => {
        link.addEventListener('click', function(e) {
            criarEfeitoRipple(this, e);
        });
    });

    // Adicionar CSS para animação do ripple
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        .link-navegacao {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);

    console.log('Header Admin - Sistema carregado com sucesso!');
});
