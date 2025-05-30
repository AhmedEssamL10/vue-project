const showMobMenuBtn = document.querySelector('.showMobMenu');
const mobMenu = document.querySelector('.mobMenu');
const closeMobMenuBtn = document.querySelector('.closeMobMenu');

showMobMenuBtn?.addEventListener('click', () => {
    mobMenu.classList.remove('mobMenuHidden');
    document.body.style.overflow = 'hidden';
});

closeMobMenuBtn?.addEventListener('click', () => {
    mobMenu.classList.add('mobMenuHidden');
    document.body.style.overflow = 'auto';
});