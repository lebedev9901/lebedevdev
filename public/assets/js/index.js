document.addEventListener("DOMContentLoaded", () => {

    const burger = document.getElementById('burger');
    const nav = document.getElementById('nav');

    burger.addEventListener('click', () => {
        nav.classList.toggle('active');
    });

    const hero = document.querySelector('.hero');

    if (hero) {
        hero.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.clientX) / 45;
            const y = (window.innerHeight / 2 - e.clientY) / 45;

            hero.style.setProperty('--moveX', `${x}px`);
            hero.style.setProperty('--moveY', `${y}px`);
        });

        hero.addEventListener('mouseleave', () => {
            hero.style.setProperty('--moveX', '0px');
            hero.style.setProperty('--moveY', '0px');
        });
    }
});
