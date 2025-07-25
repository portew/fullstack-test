import './bootstrap';
import '../css/app.css';
import 'animate.css';
import 'flowbite';
// core version + navigation modules:
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';

import Cleave from 'cleave.js';


import.meta.glob([
    '../images/**'
]);
let navbarButton = document.getElementById('navbar-default-button'),
    navContainer = document.getElementById('navbar-default');

if (navbarButton) {
    navbarButton.onclick = function() {
        navContainer.classList.toggle('hidden');
        navContainer.classList.toggle('flex');
    }
}

const purchaseDateInput = document.getElementById('purchase-date');
if (purchaseDateInput) {
    new Cleave(purchaseDateInput, {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
}


function fadeOut(el) {
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= .1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
}

function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "block";
    (function fade() {
        var val = parseFloat(el.style.opacity);
        if (!((val += 0.05) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}

// obsługa toastów
function showToast(element) {
    fadeIn(element, "flex");
}

function hideToast(element) {
    fadeOut(element)
}

let toasts = document.querySelectorAll('.toast');
if (toasts.length > 0) {
    toasts.forEach(toast => {
        window.setTimeout(() => {
            showToast(toast);
            window.setTimeout(() => {
                hideToast(toast);
            }, 8000);
        }, 1000);
    })
}


let photoInput = document.getElementById('receipt-image');
if(photoInput){
    photoInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            const fileName = this.files[0].name;
            const pEl = document.querySelector('label[for="receipt-image"] p');
            if (pEl) {
                pEl.textContent = fileName;
            }
        }
    });
}
const animateCSS = (element, animation, prefix = 'animate__',addClass) =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
        const animationName = `${prefix}${animation}`;
        const node = document.querySelector(element);

        node.classList.add(`${prefix}animated`, animationName,`${addClass}`);


        // When the animation ends, we clean the classes and resolve the Promise
        function handleAnimationEnd(event) {
            event.stopPropagation();
            node.classList.remove(`${prefix}animated`, animationName,`${addClass}`);
            resolve('Animation ended');
        }

        node.addEventListener('animationend', handleAnimationEnd, {once: true});
    });

// Funkcja pomocnicza, która tworzy pętlę animacji dla podanej tablicy selektorów
const createAnimationLoop = (
    selectors,
    fadeInAnimation = 'fadeIn',
    fadeOutAnimation = 'fadeOut',
    animationPrefix = 'animate__',
    costumClass = 'opacity-0'

) => {
    // Funkcja wykonująca animacje dla pojedynczego elementu
    const animateSequence = (selector) => {
        return animateCSS(selector, fadeInAnimation, animationPrefix,costumClass)
            .then(() => animateCSS(selector, fadeOutAnimation, animationPrefix , costumClass))
            .then(() => {
                // Po fadeOut ustawiamy opacity na 0
                const node = document.querySelector(selector);
                if (node) node.style.opacity = '0';
            });
    };

    // Funkcja uruchamiająca pętlę animacji
    return async function runLoop() {
        // Ustawiamy początkowo opacity: 0 dla wszystkich elementów
        selectors.forEach(selector => {
            const node = document.querySelector(selector);
            if (node) node.style.opacity = '0';
        });

        // Pętla nieskończona, która kolejno animuje elementy
        while (true) {
            for (let i = 0; i < selectors.length; i++) {
                // Upewnij się, że kolejny element (jeśli istnieje) ma opacity: 0
                if (i + 1 < selectors.length) {
                    const nextNode = document.querySelector(selectors[i + 1]);
                    if (nextNode) nextNode.style.opacity = '0';
                }
                await animateSequence(selectors[i]);
            }
        }
    };
};
const animationLoopFace = createAnimationLoop([
    '.animation_face_1',
    '.animation_face_2',
    '.animation_face_3'
]);
animationLoopFace();
// const animationLoopBottlesLight = createAnimationLoop([
//     '.opak_lagodny_1',
//     '.opak_lagodny_2',
// ]);
//
// animationLoopBottlesLight();
const animationLoopBottlesHot = createAnimationLoop([
    '.opak_hot_1',
    '.opak_hot_2',
    '.opak_hot_3',
]);
animationLoopBottlesHot();

const opakLightElement = document.querySelector('.opak_lagodny_1');
let rotatedUp = false;

if (opakLightElement) {
    setInterval(() => {
        if (!rotatedUp) {
            // Obrót o 15 stopni "w górę" (czyli +15deg)
            opakLightElement.style.transform = 'rotate(15deg)';
        } else {
            // Obrót o 15 stopni "w dół" (czyli -15deg)
            opakLightElement.style.transform = 'rotate(0deg)';
        }
        rotatedUp = !rotatedUp;
    }, 2000);
}

const animationLoopFork = createAnimationLoop([
    '.fork_1',
    '.fork_2',
    '.fork_3'
], 'slideInRight','slideOutRight','animate__','!opacity-100');
animationLoopFork();

// init Swiper:
window.addEventListener('load', () => {
    let loopedSlides = document.querySelectorAll('.swiper-slide').length;
    const videoCarousel = new Swiper('.video-carousel', {
        // configure Swiper to use modules
        modules: [Navigation],
        spaceBetween: 30,
        slidesPerView: 3,
        centeredSlides: true,
        roundLengths: true,
        loop: false,
        loopAdditionalSlides: 30,
        loopedSlides: loopedSlides,
        allowTouchMove: false,
        keyboard: {
            enabled: true,
        },
        observer: true,
        observeParents: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        },
        on: {
            init: function () {
                const activeSlide = this.slides[this.activeIndex];
                const video = activeSlide.querySelector('video');
                if (video) {
                    video.play();
                }
            },
            slideChangeTransitionEnd: function () {
                // Zatrzymaj wszystkie wideo
                document.querySelectorAll('.video-carousel .swiper-slide video').forEach(video => {
                    video.pause();
                    video.currentTime = 0; // resetuje wideo, opcjonalnie
                });

                // Włącz tylko aktywne
                const activeSlide = this.slides[this.activeIndex];
                const video = activeSlide.querySelector('video');
                if (video) {
                    video.play();
                }
            },
        },
    });

    window.setTimeout(() => {
        videoCarousel.update();
        videoCarousel.slideToLoop(videoCarousel.realIndex, 0, false);
        window.dispatchEvent(new Event('resize'));
    }, 300);

    // Gdy wszystkie wideo załadują się, zaktualizuj swiper
    const videos = document.querySelectorAll('.video-carousel video');
    let loadedCount = 0;

    videos.forEach(video => {
        video.addEventListener('loadedmetadata', () => {
            loadedCount++;
            if (loadedCount === videos.length) {
                videoCarousel.update();
            }
        });
    });


});

function animateOnScrollWithDelay() {
    const elements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const animationClass = el.dataset.animate || 'animate__fadeIn';
                const delay = el.dataset.delay;

                el.classList.add('animate__animated', animationClass);

                if (delay) {
                    el.style.setProperty('--animate-delay', delay);
                }

                obs.unobserve(el); // animuj tylko raz
            }
        });
    }, {
        threshold: 0.2
    });

    elements.forEach(el => observer.observe(el));
}

document.addEventListener('DOMContentLoaded', animateOnScrollWithDelay);

