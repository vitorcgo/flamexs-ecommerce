// Script para renderizar os itens do carrinho na página de checkout

document.addEventListener('DOMContentLoaded', function() {
    // Recuperar carrinho do localStorage
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    
    // Se o carrinho estiver vazio, redirecionar para a página principal
    if (carrinho.length === 0) {
        alert('Seu carrinho está vazio!');
        window.location.href = '/';
        return;
    }
    
    // Renderizar itens do carrinho na coluna direita
    renderizarItensCheckout(carrinho);
    
    // Calcular e exibir o total
    calcularTotal(carrinho);
});

function renderizarItensCheckout(carrinho) {
    const containerItens = document.querySelector('.coluna-direita');
    
    // Limpar itens hardcoded
    const itensAntigos = containerItens.querySelectorAll('.item-pedido');
    itensAntigos.forEach(item => item.remove());
    
    // Renderizar novos itens
    carrinho.forEach(item => {
        const itemHTML = `
            <div class="item-pedido">
                <div class="imagem-produto">
                    <img src="${item.imagem}" alt="${item.nome}">
                </div>
                <div class="detalhes-produto">
                    <h4 class="nome-produto">${item.nome}</h4>
                    <p class="variacao-produto">${item.tamanhos}</p>
                    <p class="preco-produto">${item.precoFormatado}</p>
                    <p class="quantidade-produto">Quantidade: ${item.quantidade}</p>
                </div>
            </div>
        `;
        
        // Inserir antes do resumo de valores
        const resumoValores = containerItens.querySelector('.resumo-valores');
        resumoValores.insertAdjacentHTML('beforebegin', itemHTML);
    });
    
    // Também renderizar na seção mobile
    const containerMobile = document.querySelector('.item-pedido-mobile');
    if (containerMobile && carrinho.length > 0) {
        const primeiroItem = carrinho[0];
        containerMobile.innerHTML = `
            <div class="imagem-produto">
                <img src="${primeiroItem.imagem}" alt="${primeiroItem.nome}">
            </div>
            <div class="detalhes-produto">
                <h4 class="nome-produto">${primeiroItem.nome}</h4>
                <p class="variacao-produto">${primeiroItem.tamanhos}</p>
                <p class="preco-produto">${primeiroItem.precoFormatado}</p>
                <p class="quantidade-produto">Quantidade: ${primeiroItem.quantidade}</p>
                ${carrinho.length > 1 ? `<p class="mais-itens">+${carrinho.length - 1} item(ns)</p>` : ''}
            </div>
        `;
    }
}

function calcularTotal(carrinho) {
    // Calcular subtotal
    const subtotal = carrinho.reduce((total, item) => {
        const preco = parseFloat(item.preco);
        return total + (preco * item.quantidade);
    }, 0);
    
    // Formatar valores
    const subtotalFormatado = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
    const totalFormatado = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
    
    // Atualizar elementos na página
    const subtotalElement = document.querySelector('.valor');
    const totalElement = document.querySelector('.valor-total');
    
    if (subtotalElement) {
        subtotalElement.textContent = subtotalFormatado;
    }
    
    if (totalElement) {
        totalElement.textContent = totalFormatado;
    }
    
    // Armazenar o total em um atributo data para uso posterior
    const resumoValores = document.querySelector('.resumo-valores');
    if (resumoValores) {
        resumoValores.setAttribute('data-total', subtotal);
    }
}

// Função para limpar o carrinho após a compra
function limparCarrinho() {
    localStorage.removeItem('carrinho');
    // Atualizar contador se existir
    const contador = document.getElementById('contador-carrinho');
    if (contador) {
        contador.textContent = '0';
        contador.classList.remove('ativo');
    }
}

// Função para processar o pedido no servidor
function processarPedido(formData) {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    
    if (carrinho.length === 0) {
        alert('Seu carrinho está vazio!');
        return false;
    }
    
    // Preparar dados para enviar ao servidor
    const pedidoData = {
        ...formData,
        carrinho: carrinho,
        _token: document.querySelector('input[name="_token"]').value
    };
    
    // Enviar para o servidor
    fetch('/user/pedidos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify(pedidoData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Limpar carrinho
            limparCarrinho();
            // Redirecionar para página de sucesso
            window.location.href = '/user/carrinho/sucesso';
        } else {
            alert('Erro ao processar pedido: ' + (data.error || 'Erro desconhecido'));
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao processar pedido. Tente novamente.');
    });
    
    return false;
}
