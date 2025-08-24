document.addEventListener('DOMContentLoaded', function() {
    const produtos = document.querySelectorAll('.produto');
    
    produtos.forEach(produto => {
        const imagem = produto.querySelector('.produto-imagem');
        const imagemOriginal = imagem.src;
        const imagemHover = './images/2.webp';
        
        function trocarImagem(novaImagem) {
            imagem.style.opacity = '0';
            
            setTimeout(() => {
                imagem.src = novaImagem;
                imagem.style.opacity = '1';
            }, 150);
        }
        
        produto.addEventListener('mouseenter', function() {
            trocarImagem(imagemHover);
        });
        
        produto.addEventListener('mouseleave', function() {
            trocarImagem(imagemOriginal);
        });
    });
});