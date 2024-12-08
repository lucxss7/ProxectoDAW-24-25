document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    hamburger.addEventListener('click', () => {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('active');
    });
});