import Swiper from 'swiper/bundle';
import { createIcons, icons } from 'lucide';

const lucideIcons = createIcons({ icons });

document.addEventListener('DOMContentLoaded', () => {
    const homeIcon = lucideIcons.Home({ size: 24 });
    document.getElementById('home-icon-container').appendChild(homeIcon);

    const cartIcon = lucideIcons.ShoppingCart({ size: 24 });
    document.getElementById('cart-icon-container').appendChild(cartIcon);
});

var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});


