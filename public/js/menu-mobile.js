document.addEventListener('DOMContentLoaded', function() {
    const botaoMenuMobile = document.getElementById('botao-menu-mobile');
    const menuMobile = document.getElementById('menu-mobile');
    const linksMenuMobile = document.querySelectorAll('.menu-mobile-conteudo a');

    // Função para alternar o menu
    function alternarMenu() {
        menuMobile.classList.toggle('ativo');
        botaoMenuMobile.classList.toggle('ativo');
        document.body.classList.toggle('menu-aberto');
    }

    // Função para fechar o menu
    function fecharMenu() {
        menuMobile.classList.remove('ativo');
        botaoMenuMobile.classList.remove('ativo');
        document.body.classList.remove('menu-aberto');
    }

    // Event listener para o botão do menu
    if (botaoMenuMobile) {
        botaoMenuMobile.addEventListener('click', alternarMenu);
    }

    // Event listeners para fechar o menu ao clicar nos links
    linksMenuMobile.forEach(link => {
        link.addEventListener('click', fecharMenu);
    });

    // Fechar menu ao clicar fora dele
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = menuMobile.contains(event.target);
        const isClickOnButton = botaoMenuMobile.contains(event.target);
        
        if (!isClickInsideMenu && !isClickOnButton && menuMobile.classList.contains('ativo')) {
            fecharMenu();
        }
    });

    // Fechar menu ao redimensionar a tela para desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && menuMobile.classList.contains('ativo')) {
            fecharMenu();
        }
    });
});