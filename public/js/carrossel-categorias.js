document.addEventListener('DOMContentLoaded', function() {
    function isMobile() {
        return window.innerWidth <= 768;
    }

    const listaCategoria = document.querySelector('.lista-categorias');
    const cardsCategoria = document.querySelectorAll('.card-categoria');
    const containerCategorias = document.querySelector('.container-categorias');
    const miniProximo = document.getElementById('mini-proximo');

    let slideAtual = 0;
    const totalSlides = cardsCategoria.length;
    let autoPlayInterval;
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;

    function atualizarCarrossel() {
        if (!isMobile()) return;

        const larguraCard = cardsCategoria[0].offsetWidth + 16;
        const deslocamento = -slideAtual * larguraCard;
        listaCategoria.style.transform = `translateX(${deslocamento}px)`;
        currentTranslate = deslocamento;
        prevTranslate = deslocamento;
    }

    function proximoSlide() {
        if (!isMobile()) return;
        
        slideAtual = (slideAtual + 1) % totalSlides;
        atualizarCarrossel();
    }

    function slideAnterior() {
        if (!isMobile()) return;
        
        slideAtual = (slideAtual - 1 + totalSlides) % totalSlides;
        atualizarCarrossel();
    }

    function irParaSlide(index) {
        if (!isMobile()) return;
        
        slideAtual = index;
        atualizarCarrossel();
    }

    function iniciarAutoPlay() {
        if (!isMobile()) return;
        
        pararAutoPlay();
        autoPlayInterval = setInterval(() => {
            if (!isDragging) {
                proximoSlide();
            }
        }, 3000);
    }
    
    function pararAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }
    }

    function getPositionX(event) {
        return event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
    }

    function animation() {
        if (isDragging) {
            listaCategoria.style.transform = `translateX(${currentTranslate}px)`;
            requestAnimationFrame(animation);
        }
    }

    function setSliderPosition() {
        listaCategoria.style.transform = `translateX(${currentTranslate}px)`;
    }

    function setPositionByIndex() {
        const larguraCard = cardsCategoria[0].offsetWidth + 16;
        currentTranslate = slideAtual * -larguraCard;
        prevTranslate = currentTranslate;
        setSliderPosition();
    }

    listaCategoria.addEventListener('mousedown', dragStart);
    listaCategoria.addEventListener('mouseup', dragEnd);
    listaCategoria.addEventListener('mouseleave', dragEnd);
    listaCategoria.addEventListener('mousemove', dragMove);

    listaCategoria.addEventListener('touchstart', dragStart, { passive: false });
    listaCategoria.addEventListener('touchend', dragEnd);
    listaCategoria.addEventListener('touchmove', dragMove, { passive: false });

    function dragStart(event) {
        if (!isMobile()) return;
        
        event.preventDefault();
        isDragging = true;
        startPos = getPositionX(event);
        pararAutoPlay();
        
        listaCategoria.style.cursor = 'grabbing';
        listaCategoria.style.transition = 'none';
        
        animationID = requestAnimationFrame(animation);
    }

    function dragMove(event) {
        if (!isMobile() || !isDragging) return;
        
        event.preventDefault();
        const currentPosition = getPositionX(event);
        currentTranslate = prevTranslate + currentPosition - startPos;
    }

    function dragEnd() {
        if (!isMobile() || !isDragging) return;
        
        isDragging = false;
        cancelAnimationFrame(animationID);
        
        listaCategoria.style.cursor = 'grab';
        listaCategoria.style.transition = 'transform 0.3s ease';

        const movedBy = currentTranslate - prevTranslate;
        const threshold = 50;

        if (movedBy < -threshold && slideAtual < totalSlides - 1) {
            slideAtual += 1;
        }

        if (movedBy > threshold && slideAtual > 0) {
            slideAtual -= 1;
        }

        setPositionByIndex();
        iniciarAutoPlay();
    }

    if (miniProximo) {
        miniProximo.addEventListener('click', () => {
            proximoSlide();
            pararAutoPlay();
            iniciarAutoPlay();
        });
    }

    containerCategorias.addEventListener('mouseenter', pararAutoPlay);
    containerCategorias.addEventListener('mouseleave', () => {
        if (isMobile() && !isDragging) iniciarAutoPlay();
    });

    window.addEventListener('resize', () => {
        if (isMobile()) {
            atualizarCarrossel();
            iniciarAutoPlay();
        } else {
            listaCategoria.style.transform = 'translateX(0)';
            listaCategoria.style.transition = '';
            listaCategoria.style.cursor = '';
            slideAtual = 0;
            pararAutoPlay();
        }
    });

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            pararAutoPlay();
        } else if (isMobile() && !isDragging) {
            iniciarAutoPlay();
        }
    });

    if (isMobile()) {
        listaCategoria.style.cursor = 'grab';
        atualizarCarrossel();
        iniciarAutoPlay();
    }

    listaCategoria.addEventListener('selectstart', (e) => e.preventDefault());
});