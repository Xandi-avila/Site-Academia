 // Dados dos itens
 const items = {
    luvas: { name: 'Luvas de Boxe', price: 99.99 },
    protetorBucal: { name: 'Protetor Bucal', price: 19.99 },
    sacoPancada: { name: 'Saco de Pancada', price: 149.99 },
    bandagens: { name: 'Bandagem de Boxe', price: 14.99 },
    protetorCabeca: { name: 'Protetor de Cabeça', price: 49.99 },
    shortBoxe: { name: 'Short de Boxe', price: 34.99 }
  }

  const itemQuantities = {
    luvas: 0,
    protetorBucal: 0,
    sacoPancada: 0,
    bandagens: 0,
    protetorCabeca: 0,
    shortBoxe: 0,
  }

  // Carrinho de compras
  const cart = [];

  function addToCart(itemId) {
    const item = items[itemId];
    if (item) {
      cart.push(item);
      itemQuantities[itemId]++;
      updateCart();
    }
  }
  datasets: [{
    label: 'Quantidade de Itens Comprados',
    data: Object.values(itemQuantities),
    borderWidth: 1,
  }]

  // Função para adicionar um item ao carrinho
  function addToCart(itemId) {
    const item = items[itemId];
    if (item) {
      cart.push(item);
      updateCart();
    }
  }

  // Função para atualizar o carrinho de compras
  function updateCart() {
    const cartList = document.getElementById('cart');
    const totalSpan = document.getElementById('total');
    cartList.innerHTML = '';

    // Atualiza a lista de itens no carrinho
    cart.forEach(item => {
      const listItem = document.createElement('li');
      listItem.className = 'list-group-item';
      listItem.textContent = item.name + ' - R$ ' + item.price.toFixed(2);
      cartList.appendChild(listItem);
    });

    // Calcula o valor total
    const total = cart.reduce((acc, item) => acc + item.price, 0);
    totalSpan.textContent = 'R$ ' + total.toFixed(2);
  }
  
  // Função para limpar o carrinho
  function clearCart() {
    cart.length = 0;
    updateCart();
  }

  // Função para simular o processo de finalização da compra
  function checkout() {
    alert('Compra finalizada!');
    clearCart();
  }
