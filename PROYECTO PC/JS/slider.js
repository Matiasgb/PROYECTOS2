var counter_1 = 1;

        /* Primer Slider ---------------------- start*/

setInterval(function() {
    document.getElementById('radio' + counter_1).checked = true;
    counter_1++;
    if (counter_1 > 4) {
        counter_1 = 1;
    }
}, 5000);

        /* Primer Slider ---------------------- end*/


        /* Segundo Slider --------------------- start */

const carouselSlide = document.querySelector(".slider-2-conteiner");
const carouselImages = document.querySelectorAll(".slider-2-conteiner section");
const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");

let counter_2 = 1;
const size = carouselImages[0].clientWidth;

carouselSlide.style.transform = 'translateX(' + (-size * counter_2) + 'px)';

nextBtn.addEventListener('click',()=> {
    if(counter_2 >= carouselImages.length - 1) return;
    carouselSlide.style.transition = "transform 0.8s ease-in-out";
    counter_2++;
    carouselSlide.style.transform = 'translateX(' + (-size * counter_2) + 'px)';
});

prevBtn.addEventListener('click',()=> {
    if(counter_2 <= 0) return;
    carouselSlide.style.transition = "transform 0.8s ease-in-out";
    counter_2--;
    carouselSlide.style.transform = 'translateX(' + (-size * counter_2) + 'px)';
});

carouselSlide.addEventListener('transitionend', () => {
    if(carouselImages[counter_2].id === 'lastClone') {
        carouselSlide.style.transition = "none";
        counter_2 = carouselImages.length - 2;
        carouselSlide.style.transform = 'translateX(' + (-size * counter_2) + 'px)';
    }
    if(carouselImages[counter_2].id === 'firstClone') {
        carouselSlide.style.transition = "none";
        counter_2 = carouselImages.length - counter_2;
        carouselSlide.style.transform = 'translateX(' + (-size * counter_2) + 'px)';
    }
});

        /* Segundo Slider --------------------- end */

        /* Tercero Slider --------------------- end */

const carouselSlide_3 = document.querySelector(".slider-4-conteiner");
const carouselImages_3 = document.querySelectorAll(".slider-4-conteiner section");
const prevBtn_3 = document.querySelector("#prevBtn_3");
const nextBtn_3 = document.querySelector("#nextBtn_3");

let counter_4 = 1;
const size_3 = carouselImages_3[0].clientWidth;

carouselSlide_3.style.transform = 'translateX(' + (-size_3 * counter_4) + 'px)';

nextBtn_3.addEventListener('click',()=> {
    if(counter_4 >= carouselImages_3.length - 1) return;
    carouselSlide_3.style.transition = "transform 0.8s ease-in-out";
    counter_4++;
    carouselSlide_3.style.transform = 'translateX(' + (-size_3 * counter_4) + 'px)';
});

prevBtn_3.addEventListener('click',()=> {
    if(counter_4 <= 0) return;
    carouselSlide_3.style.transition = "transform 0.8s ease-in-out";
    counter_4--;
    carouselSlide_3.style.transform = 'translateX(' + (-size_3 * counter_4) + 'px)';
});

carouselSlide_3.addEventListener('transitionend', () => {
    if(carouselImages_3[counter_4].id === 'lastClone_3') {
        carouselSlide_3.style.transition = "none";
        counter_4 = carouselImages_3.length - 2;
        carouselSlide_3.style.transform = 'translateX(' + (-size_3 * counter_4) + 'px)';
    }
    if(carouselImages_3[counter_4].id === 'firstClone_3') {
        carouselSlide_3.style.transition = "none";
        counter_4 = carouselImages_3.length - counter_4;
        carouselSlide_3.style.transform = 'translateX(' + (-size_3 * counter_4) + 'px)';
    }
});

        /* Tercero Slider --------------------- end */

        /* Cuarto Slider --------------------- start */

const carouselSlide_2 = document.querySelector(".slider-3-conteiner");
const carouselImages_2 = document.querySelectorAll(".slider-3-conteiner section");
const prevBtn_2 = document.querySelector("#prevBtn_2");
const nextBtn_2 = document.querySelector("#nextBtn_2");

let counter_3 = 1;
const size_2 = carouselImages_2[0].clientWidth;

carouselSlide_2.style.transform = 'translateX(' + (-size_2 * counter_3) + 'px)';

nextBtn_2.addEventListener('click',()=> {
    if(counter_3 >= carouselImages_2.length - 1) return;
    carouselSlide_2.style.transition = "transform 0.8s ease-in-out";
    counter_3++;
    carouselSlide_2.style.transform = 'translateX(' + (-size_2 * counter_3) + 'px)';
});

prevBtn_2.addEventListener('click',()=> {
    if(counter_3 <= 0) return;
    carouselSlide_2.style.transition = "transform 0.8s ease-in-out";
    counter_3--;
    carouselSlide_2.style.transform = 'translateX(' + (-size_2 * counter_3) + 'px)';
});

carouselSlide_2.addEventListener('transitionend', () => {
    if(carouselImages_2[counter_3].id === 'lastClone_2') {
        carouselSlide_2.style.transition = "none";
        counter_3 = carouselImages_2.length - 2;
        carouselSlide_2.style.transform = 'translateX(' + (-size_2 * counter_3) + 'px)';
    }
    if(carouselImages_2[counter_3].id === 'firstClone_2') {
        carouselSlide_2.style.transition = "none";
        counter_3 = carouselImages_2.length - counter_3;
        carouselSlide_2.style.transform = 'translateX(' + (-size_2 * counter_3) + 'px)';
    }
});

        /* Cuarto Slider --------------------- end */
        
        