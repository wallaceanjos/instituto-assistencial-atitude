// JavaScript para mudar a cor da navbar ao rolar a página
window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
    if (window.scrollY > 50) { // Ajuste o valor conforme necessário
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});