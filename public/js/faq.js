document.addEventListener('DOMContentLoaded', function() {
    const faqPerguntas = document.querySelectorAll('.faq-pergunta');
    let faqAtivoAtual = null;

    faqPerguntas.forEach(pergunta => {
        pergunta.addEventListener('click', function() {
            const faqId = this.getAttribute('data-faq');
            const resposta = document.getElementById(`faq-${faqId}`);
            const icone = this.querySelector('.faq-icone');
            
            // Se há uma pergunta ativa e não é a atual, fecha ela
            if (faqAtivoAtual && faqAtivoAtual !== this) {
                const respostaAtiva = faqAtivoAtual.nextElementSibling;
                const iconeAtivo = faqAtivoAtual.querySelector('.faq-icone');
                
                // Remove classes ativas
                faqAtivoAtual.classList.remove('ativo');
                respostaAtiva.classList.remove('ativo');
                
                // Anima o fechamento
                respostaAtiva.style.maxHeight = '0';
                respostaAtiva.style.padding = '0 2rem';
                
                // Reset do ícone
                iconeAtivo.style.transform = 'rotate(0deg)';
            }
            
            // Se a pergunta clicada já está ativa, fecha ela
            if (this.classList.contains('ativo')) {
                this.classList.remove('ativo');
                resposta.classList.remove('ativo');
                
                // Anima o fechamento
                resposta.style.maxHeight = '0';
                resposta.style.padding = '0 2rem';
                
                // Reset do ícone
                icone.style.transform = 'rotate(0deg)';
                
                faqAtivoAtual = null;
            } else {
                // Abre a pergunta clicada
                this.classList.add('ativo');
                resposta.classList.add('ativo');
                
                // Calcula a altura necessária
                const alturaConteudo = resposta.scrollHeight;
                resposta.style.maxHeight = alturaConteudo + 'px';
                resposta.style.padding = '0 2rem 2rem 2rem';
                
                // Rotaciona o ícone
                icone.style.transform = 'rotate(180deg)';
                
                faqAtivoAtual = this;
            }
        });
    });

    // Smooth scroll para a seção FAQ quando clicado no link do header
    const faqLink = document.querySelector('a[href="#faq"]');
    if (faqLink) {
        faqLink.addEventListener('click', function(e) {
            e.preventDefault();
            const faqSection = document.getElementById('faq');
            if (faqSection) {
                faqSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // Smooth scroll para links do FAQ no menu mobile também
    const faqLinkMobile = document.querySelector('.menu-mobile-conteudo a[href="#faq"]');
    if (faqLinkMobile) {
        faqLinkMobile.addEventListener('click', function(e) {
            e.preventDefault();
            const faqSection = document.getElementById('faq');
            if (faqSection) {
                faqSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Fecha o menu mobile se estiver aberto
                const menuMobile = document.getElementById('menu-mobile');
                const botaoMenu = document.getElementById('botao-menu-mobile');
                if (menuMobile && menuMobile.classList.contains('ativo')) {
                    menuMobile.classList.remove('ativo');
                    botaoMenu.classList.remove('ativo');
                    document.body.classList.remove('menu-aberto');
                }
            }
        });
    }
});