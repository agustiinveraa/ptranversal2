window.addToCart = function addToCart(productId, title, image, price) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    const existingProduct = cart.find(item => item.productId === productId);

    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({ productId, title, image, price, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    updateCartCount();
}

function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

    $('.cart-count').text(totalItems > 9 ? '9+' : totalItems);
    $('.cart-count-total').text(totalItems);
}

$(document).ready(updateCartCount);

function getCart() {
    return JSON.parse(localStorage.getItem('cart')) || [];
}
