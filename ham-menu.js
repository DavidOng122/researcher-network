// const hamMenu = document.querySelector('.ham-menu');
const offScreenMenu = document.querySelector('.off-screen-menu');
const hamburger = document.querySelector('.hamburger-menu');

function toggleMenu() {
    
    offScreenMenu.classList.toggle('active'); 
    hamburger.classList.toggle('active'); // Toggle X animation
}