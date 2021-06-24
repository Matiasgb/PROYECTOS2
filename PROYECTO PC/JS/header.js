var modal = document.getElementById('header-modal');
var search = document.getElementById('search-bar');
var favs = document.getElementById('favs-drop');
var underline = document.getElementById('subr');
var cart = document.getElementById('cart-modal');
var dropContent_1 = document.getElementById('drop1');
var dropContent_2 = document.getElementById('drop2');
var dropContent_3 = document.getElementById('drop3');
var dropContent_4 = document.getElementById('drop4');
var arrow_1 = document.getElementById('arrow-down-1');
var arrow_2 = document.getElementById('arrow-down-2');
var closeLogInModal = document.getElementById('close-log-in-modal');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == search) {
        search.style.display = "none";
    }
    if (event.target == dropContent_1) {
        dropContent_1.style.display = "none";
        arrow_1.classList.toggle('turn');
    }
    if (event.target == dropContent_2) {
        dropContent_2.style.display = "none";
    }
    if (event.target == dropContent_3) {
        dropContent_3.style.display = "none";
        arrow_2.classList.toggle('turn');
    }
}

closeLogInModal.onclick = function() {
    if (modal.style.display === 'block') {
        modal.style.display = 'none';
    }
}

function searchBar() {
    if (search.style.display === 'none' || search.style.display === '') {
        search.style.display = 'flex';
        if (dropContent_1.style.display === 'block') {
            dropContent_1.style.display = 'none';
            arrow_1.classList.toggle('turn');
        }
        if (dropContent_3.style.display === 'block') {
            dropContent_3.style.display = 'none';
            arrow_2.classList.toggle('turn');
        }
        if (dropContent_4.style.display === 'block') {
            dropContent_4.style.display = 'none';
        }
        if (favs.style.display === 'block') {
            favs.style.display = 'none';
        }
        if (cart.style.display === 'flex'){
            cart.style.display = 'none';
        }
    }
    else {
        search.style.display = 'none';
    }
}

function favsDropdown() {
    if (favs.style.display === 'none' || favs.style.display === '') {
        favs.style.display = 'block';
        if (dropContent_4.style.display === 'block') {
            dropContent_4.style.display = 'none'
        }
        if (dropContent_3.style.display === 'block') {
            dropContent_3.style.display = 'none';
            arrow_2.classList.toggle('turn');
        }
        if (dropContent_1.style.display === 'block') {
            dropContent_1.style.display = 'none';
            arrow_1.classList.toggle('turn');
        }
        if (search.style.display === 'flex') {
            search.style.display = 'none'
        }
        if (cart.style.display === 'flex'){
            cart.style.display = 'none';
        }
    }
    else {
        favs.style.display = 'none';
    }
}

var cart_slide = document.getElementById('cart-slide');

function cartOpen() {
    cart_slide.style.width = '450px';
}

function cartClose() {
    cart_slide.style.width = '0';
}

function dropdown_1() {
    if (dropContent_1.style.display === 'none' || dropContent_1.style.display === '') {
        dropContent_1.style.display = 'block';
        arrow_1.classList.toggle('turn');
        if (dropContent_3.style.display === 'block') {
            dropContent_3.style.display = 'none';
            arrow_2.classList.toggle('turn');
        }
        if (dropContent_4.style.display === 'block') {
            dropContent_4.style.display = 'none'
        }
        if (favs.style.display === 'block') {
            favs.style.display = 'none'
        }
        if (search.style.display === 'flex') {
            search.style.display = 'none'
        }
        if (cart.style.display === 'flex'){
            cart.style.display = 'none';
        }
    }
    else {
        dropContent_1.style.display = 'none';
        arrow_1.classList.toggle('turn');
    }
}

function dropdown_3() {
    if (dropContent_3.style.display === 'none' || dropContent_3.style.display === '') {
        dropContent_3.style.display = 'block';
        arrow_2.classList.toggle('turn');
        if (dropContent_1.style.display === 'block') {
            dropContent_1.style.display = 'none';
            arrow_1.classList.toggle('turn');
        }
        if (dropContent_4.style.display === 'block') {
            dropContent_4.style.display = 'none'
        }
        if (favs.style.display === 'block') {
            favs.style.display = 'none'
        }
        if (search.style.display === 'flex') {
            search.style.display = 'none'
        }
        if (cart.style.display === 'flex'){
            cart.style.display = 'none';
        }
    }
    else {
        dropContent_3.style.display = 'none';
        arrow_2.classList.toggle('turn');
    }
}

function dropdown_4() {
    if (dropContent_4.style.display === 'none' || dropContent_4.style.display === '') {
        dropContent_4.style.display = 'block';
        if (dropContent_3.style.display === 'block') {
            dropContent_3.style.display = 'none';
            arrow_2.classList.toggle('turn');
        }
        if (dropContent_1.style.display === 'block') {
            dropContent_1.style.display = 'none';
            arrow_1.classList.toggle('turn');
        }
        if (favs.style.display === 'block') {
            favs.style.display = 'none'
        }
        if (search.style.display === 'flex') {
            search.style.display = 'none'
        }
        if (cart.style.display === 'flex'){
            cart.style.display = 'none';
        }
    }
    else {
        dropContent_4.style.display = 'none';
    }
}

function header_modal() {
    modal.style.display = 'block';
}