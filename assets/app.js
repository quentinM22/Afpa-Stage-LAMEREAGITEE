/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


$('select').select2();


window.addEventListener('DOMContentLoaded', event => { // Navbar shrink function
var navbarShrink = function () {
const navbarCollapsible = document.body.querySelector('#mainNav');
if (! navbarCollapsible) {
return;
}
if (window.scrollY === 0) {
navbarCollapsible.classList.remove('navbar-shrink')
} else {
navbarCollapsible.classList.add('navbar-shrink')
}

};

// Shrink the navbar
navbarShrink();

// Shrink the navbar when page is scrolled
document.addEventListener('scroll', navbarShrink);

// Activate Bootstrap scrollspy on the main nav element
const mainNav = document.body.querySelector('#mainNav');
if (mainNav) {
new bootstrap.ScrollSpy(document.body, {
target: '#mainNav',
offset: 74
});
};

// Collapse responsive navbar when toggler is visible
// const navbarToggler = document.body.querySelector('.navbar-toggler');
// const responsiveNavItems = [].slice.call(document.querySelectorAll('#navbarResponsive .nav-link'));
// responsiveNavItems.map(function (responsiveNavItem) {
// responsiveNavItem.addEventListener('click', () => {
// if (window.getComputedStyle(navbarToggler).display !== 'none') {
// navbarToggler.click();
// }
// });
// });

// Activate SimpleLightbox plugin for portfolio items
// new SimpleLightbox({
//    elements: '#portfolio a.portfolio-box'
// });

});
// --Affichage PopUp
let btnPopup = document.querySelector('#btnPopup');
let overlay = document.querySelector('#overlay');
btnPopup.addEventListener('click', openMoadl);
function openMoadl() {
overlay.style.display = 'block';
}
// --Fermé PopUp
let btnClose = document.getElementById('btnClose');
btnClose.addEventListener('click', closeModal);
function closeModal() {
overlay.style.display = 'none';
}
