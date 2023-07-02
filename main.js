/*---------- HOME PAGE SLIDER ----------*/
"use strict"
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'),
      rightArrow = document.querySelector('.right-arrow .bxs-right-arrow'),
      slider = document.querySelector('.slider');
      
/*---------- SCROLL TOP RIGHT ----------*/
function scrollRight(){
    if (slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });
    } else {
        slider.scrollBy({
            left: window.innerWidth,
            behavior: "smooth"
        });
    }
}
/*---------- SCROLL TO LEFT ----------*/
function scrollLeft(){
    slider.scrollBy({
        left: -window.innerWidth,
        behavior: "smooth"
    });
}
let timerId = setInterval(scrollRight, 7000);
/*---------- RESET TIMER TO SCROLL RIGHT ----------*/
function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);
}
/*---------- SCROLL EVENT ----------*/
slider.addEventListener('click', function(ev){
    if(ev.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
})
slider.addEventListener('click', function(ev){
    if(ev.target === rightArrow){
        scrollRight();
        resetTimer();
    }
})
