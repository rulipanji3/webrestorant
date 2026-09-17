import { initCartApp } from './cart-app';

const app = initCartApp();

const header = document.querySelector('#site-header');

// Counter animation
function animateCounter(el, target, suffix = '') {
    const duration = 1200;
    const start = performance.now();

    function update(now) {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(eased * target);

        el.textContent = current.toLocaleString() + suffix;

        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            el.textContent = target.toLocaleString() + suffix;
        }
    }

    requestAnimationFrame(update);
}

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const el = entry.target;
            const target = parseFloat(el.dataset.target);
            const suffix = el.dataset.suffix || '';
            if (!isNaN(target)) {
                animateCounter(el, target, suffix);
            }
            counterObserver.unobserve(el);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-target]').forEach((el) => counterObserver.observe(el));

window.addEventListener('scroll', () => {
    const scrolled = window.scrollY > 24;
    if (header) {
        header.classList.toggle('is-scrolled', scrolled);
    }
});

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (event) {
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) {
            return;
        }
        event.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
    });
});

document.querySelectorAll('.order-now').forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (app.getCartCount() > 0) {
            app.openCartDrawer();
        } else {
            const menu = document.querySelector('#menu');
            if (menu) menu.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Mobile menu toggle
const mobileMenuBtn = document.querySelector('#mobile-menu-btn');
const mobileMenuPanel = document.querySelector('#mobile-menu-panel');
if (mobileMenuBtn && mobileMenuPanel) {
    mobileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        mobileMenuPanel.classList.toggle('hidden');
    });
    document.addEventListener('click', (e) => {
        if (!mobileMenuPanel.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            mobileMenuPanel.classList.add('hidden');
        }
    });
}