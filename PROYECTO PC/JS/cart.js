const less = document.getElementById('value-quatity-less');
const plus = document.getElementById('value-quatity-plus');
const number = document.getElementById('items-quantity');

                /** Carrito -----------------------------*/

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}
else {
    ready()
};

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger');
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem);
    };   

    var quantityInputs = document.getElementsByClassName('items-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    };

    var addToCartButtons = document.getElementsByClassName('shop-item-btn');
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i];
        button.addEventListener('click', addToCartClicked);
    };
};

function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.parentElement.remove();
    updateCartTotal();
};

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    };
    updateCartTotal();
};

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement
    var titleConteiner = shopItem.getElementsByClassName('slider-2-box-title')[0];
    var title = titleConteiner.getElementsByClassName('slider-2-box-title-content')[0].innerText;
    var priceElement = titleConteiner.getElementsByClassName('slider-2-box-price-content')[0].innerText;
    var price = priceElement.replace('$', '');
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    addItemToCart(title, price, imageSrc);
    updateCartTotal()
};

function addItemToCart(title, price, imageSrc) {
    var cartRow = document.createElement('div');
    cartRow.classList.add('cart-row');
    var cartItems = document.getElementsByClassName('cart-items')[0];
    var cartItemsNames = document.getElementsByClassName('cart-item-title');
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title) {
            alert('Este prodcuto ya se encuentra en el carrito.')
            return
        };
    };
    var cartRowContents = `
            <div class="cart-row-content-1">
                <img class="cart-item-image" src="${imageSrc}">
                <div class="cart-item-title-conteiner">
                    <span class="cart-item-title"><a href="#"> ${title} </a></span>
                    <div class="input-number-button">
                        <button id="value-quatity-less"> - </button><input class="items-quantity" type="number" value="1" min="1" id="items-quantity"><button id="value-quatity-plus"> + </button>
                    </div>
                </div>
            </div>
            <div class="cart-item-details">
                <button class="btn-danger"><i class="far fa-trash-alt"></i></button><br>
                <p class="cart-item-price"><span>$</span>${price}</p>
            </div>`
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('items-quantity')[0].addEventListener('change', quantityChanged);
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemContainer.getElementsByClassName('cart-row');
    var total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElementConteiner = cartRow.getElementsByClassName('cart-item-details');
        var priceElement = priceElementConteiner[0].getElementsByClassName('cart-item-price')[0];
        var quantityElementConteiner = cartRows[0].getElementsByClassName('cart-row-content-1');
        var quantityElementContent = quantityElementConteiner[0].getElementsByClassName('cart-item-title-conteiner');
        var quantityElementSubContent = quantityElementContent[0].getElementsByClassName('input-number-button');
        var quantityElement = quantityElementSubContent[0].getElementsByClassName('items-quantity')[0];
        
        var price = parseFloat(priceElement.innerText.replace('$', ''));
        var quantity = quantityElement.value;
        total = total + (quantity * price);
    };
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total;
};

/*less.onclick = function(){
    number.stepDown(1)
    updateCartTotal();
}

plus.onclick = function(){
    number.stepUp(1)
    updateCartTotal();
}*/