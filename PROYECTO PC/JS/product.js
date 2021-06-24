    /* Slider --------------------- end */

const carouselSlide_5 = document.querySelector(".slider-5-conteiner");
const carouselImages_5 = document.querySelectorAll(".slider-5-conteiner section");
const prevBtn_5 = document.querySelector("#prevBtn_5");
const nextBtn_5 = document.querySelector("#nextBtn_5");

let counter_5 = 1;
const size_5 = carouselImages_5[0].clientWidth;

carouselSlide_5.style.transform = 'translateX(' + (-size_5 * counter_5) + 'px)';

nextBtn_4.addEventListener('click',()=> {
    if(counter_5 >= carouselImages_5.length - 1) return;
    carouselSlide_5.style.transition = "transform 0.8s ease-in-out";
    counter_5++;
    carouselSlide_5.style.transform = 'translateX(' + (-size_5 * counter_5) + 'px)';
});

prevBtn_4.addEventListener('click',()=> {
    if(counter_5 <= 0) return;
    carouselSlide_5.style.transition = "transform 0.8s ease-in-out";
    counter_5--;
    carouselSlide_5.style.transform = 'translateX(' + (-size_5 * counter_5) + 'px)';
});

carouselSlide_5.addEventListener('transitionend', () => {
    if(carouselImages_5[counter_5].id === 'lastClone_5') {
        carouselSlide_5.style.transition = "none";
        counter_5 = carouselImages_5.length - 2;
        carouselSlide_5.style.transform = 'translateX(' + (-size_5 * counter_5) + 'px)';
    }
    if(carouselImages_5[counter_5].id === 'firstClone_5') {
        carouselSlide_5.style.transition = "none";
        counter_5 = carouselImages_5.length - counter_5;
        carouselSlide_5.style.transform = 'translateX(' + (-size_5 * counter_5) + 'px)';
    }
});

    /* Slider --------------------- end */

    /** Colapse ------- start -- */

var arrow_1_ = document.getElementById('arrow_1');
var arrow_2_ = document.getElementById('arrow_2');
var arrow_3_ = document.getElementById('arrow_3');
var btn_1 = document.getElementsByClassName('details-btn-1')[0];

function openEsp_1() {
    arrow_1_.classList.toggle('turn-black');
}

function openEsp_2() {
    arrow_2_.classList.toggle('turn-black');
}

function openEsp_3() {
    arrow_3_.classList.toggle('turn-black');
}

$(document).ready(function(){
    $(".details-btn-1").click(function(){
        $(".specification-content").animate({
            height: 'toggle'
        });
    });
});

$(document).ready(function(){
    $(".details-btn-2").click(function(){
        $(".pyr-conteiner").animate({
            height: 'toggle'
        });
    });
});

$(document).ready(function(){
    $(".details-btn-3").click(function(){
        $(".details-reviews-conteiner").animate({
            height: 'toggle'
        });
    });
});

    /** Colapse --------- end -- */