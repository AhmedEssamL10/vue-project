import Swiper from 'swiper/bundle';
import 'swiper/css';
import 'swiper/css/bundle';

document.querySelectorAll('.dynamicSwiper').forEach((swiperElement) => {
    // Retrieve data attributes
    const loop = swiperElement.getAttribute('data-loop') == 'true';
    const direction = swiperElement.getAttribute('data-direction') || 'horizontal';
    const effect = swiperElement.getAttribute('data-effect') || 'slide';
    const spaceBetween = swiperElement.getAttribute('data-space-between') || '0';
    const grabCursor = swiperElement.getAttribute('data-grab-cursor') === 'true';
    const slidesPerViewDefault = JSON.parse(swiperElement.getAttribute('data-slides-per-view-default') || 'auto');
    const autoplay = JSON.parse(swiperElement.getAttribute('data-autoplay') || '{}');
    const breakpoints = JSON.parse(swiperElement.getAttribute('data-breakpoints') || '{}');
    
    let swiperOptions = {
        loop: loop,
        direction: direction,
        effect: effect,
        grabCursor: grabCursor,
        spaceBetween: spaceBetween,
        breakpoints: breakpoints,
        slidesPerView: slidesPerViewDefault,
        pagination: {
          el: swiperElement.querySelector('.swiper-pagination'),
          clickable: true,
        },
        navigation: {
          nextEl: swiperElement.querySelector('.swiper-button-next'),
          prevEl: swiperElement.querySelector('.swiper-button-prev'),
        },
    };

    if(autoplay.delay){
      swiperOptions.autoplay = autoplay;
    }

    // Initialize Swiper for the current swiper-container
    new Swiper(swiperElement, swiperOptions);
  });