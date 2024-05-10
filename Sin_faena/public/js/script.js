let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}

document.addEventListener("DOMContentLoaded", function() {
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const cardContent = document.querySelector(".card-content");

    const cardWidth = cardContent.querySelector(".producto-card").offsetWidth;
    let scrollAmount = 0;

    prevBtn.addEventListener("click", function() {
        if (scrollAmount > 0) {
            scrollAmount -= cardWidth + 20; // Incluir espacio entre tarjetas
            cardContent.style.transform = `translateX(${-scrollAmount}px)`;
        }
    });

    nextBtn.addEventListener("click", function() {
        if (scrollAmount < cardContent.scrollWidth - cardContent.clientWidth) {
            scrollAmount += cardWidth + 20; // Incluir espacio entre tarjetas
            cardContent.style.transform = `translateX(${-scrollAmount}px)`;
        }
    });
});
