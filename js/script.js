let searchForm, shoppingCart, shoppingClose, loginForm, navbar;
//var slogan = document.querySelector(".header-slogan");


$(document).ready(function() {
    searchForm = document.querySelector('.search-form');
    shoppingCart = document.querySelector('.shopping-cart');
    shoppingClose = document.querySelector('.shopping-close');
    loginForm = document.querySelector('.login-form');
    navbar = document.querySelector('.navbar');
})

document.querySelector('#search-btn').onclick = () => {
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    searchForm.classList.toggle('active');
}

document.querySelector('#cart-btn').onclick = () => {
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    shoppingCart.classList.toggle('active');
}

document.querySelector('#login-btn').onclick = () => {
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
    loginForm.classList.toggle('active');
}

document.querySelector('#menu-btn').onclick = () => {
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () => {
    shoppingCart.classList.toggle('active', false);
}

window.onscroll = () => {
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');

    //scrollY > 500 ? slogan.style.display = 'none' : slogan.style.display = 'block';
}