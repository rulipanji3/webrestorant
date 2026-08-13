import { initCartApp } from './cart-app';

const app = initCartApp();

// Header scroll effect
window.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('shadow-lg');
        } else {
            header.classList.remove('shadow-lg');
        }
    }
});

const orderNowBtn = document.querySelector('#order-now-btn');
if (orderNowBtn) {
    orderNowBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (app.getCartCount() > 0) {
            app.openCartDrawer();
        } else {
            const menu = document.querySelector('#menu-grid');
            if (menu) menu.scrollIntoView({ behavior: 'smooth' });
        }
    });
}
