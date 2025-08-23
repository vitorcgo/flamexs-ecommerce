document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.banner-slide');
    const indicadores = document.querySelectorAll('.indicador');
    const botaoAnterior = document.getElementById('botao-anterior');
    const botaoProximo = document.getElementById('botao-proximo');
    const carrosselContainer = document.getElementById('carrossel-container');
    let slideAtual = 0;

    // Define a altura do container baseada na primeira imagem
    function definirAlturaContainer() {
        const primeiraImagem = slides[0].querySelector('img');
        if (primeiraImagem.complete) {
            carrosselContainer.style.height = primeiraImagem.offsetHeight + 'px';
        } else {
            primeiraImagem.onload = function() {
                carrosselContainer.style.height = this.offsetHeight + 'px';
            };
        }
    }

    function mostrarSlide(indice) {
        // Remove classe ativo de todos os slides e indicadores
        slides.forEach(slide => slide.classList.remove('ativo'));
        indicadores.forEach(indicador => indicador.classList.remove('ativo'));

        // Adiciona classe ativo ao slide e indicador atual
        slides[indice].classList.add('ativo');
        indicadores[indice].classList.add('ativo');
    }

    function proximoSlide() {
        slideAtual = (slideAtual + 1) % slides.length;
        mostrarSlide(slideAtual);
    }

    function slideAnterior() {
        slideAtual = (slideAtual - 1 + slides.length) % slides.length;
        mostrarSlide(slideAtual);
    }

    // Inicializar carrossel
    if (slides.length > 0) {
        definirAlturaContainer();
        mostrarSlide(0);

        // Event listeners para botões de navegação
        if (botaoProximo) {
            botaoProximo.addEventListener('click', proximoSlide);
        }
        if (botaoAnterior) {
            botaoAnterior.addEventListener('click', slideAnterior);
        }

        // Event listeners para indicadores
        indicadores.forEach((indicador, indice) => {
            indicador.addEventListener('click', () => {
                slideAtual = indice;
                mostrarSlide(slideAtual);
            });
        });

        // Auto-play do carrossel (opcional)
        setInterval(proximoSlide, 5000); // Muda slide a cada 5 segundos
    }

    // Redimensionar altura quando a janela for redimensionada
    window.addEventListener('resize', definirAlturaContainer);
});