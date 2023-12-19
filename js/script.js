document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper('.swiper', {
        slidesPerView: getSlidesPerView(),
        spaceBetween: 10,
        direction: 'horizontal',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection('horizontal');
                swiper.params.slidesPerView = getSlidesPerView();
            },
            reachEnd: function () {
                removeGradientRight();
                restoreGradientLeft();
            },
            reachBeginning: function () {
                restoreGradientRight();
                removeGradientLeft();
            },
            fromEdge: function () {
                restoreGradientRight();
                restoreGradientLeft();
            }
        },        
    });

    function getSlidesPerView() {
        var windowWidth = window.innerWidth;
        if (windowWidth < 767.98) {
            return 2;
        } else if (windowWidth < 991.98) {
            return 3;
        } else {
            return 4;
        }
    }
    function removeGradientLeft() {
        var swiperWrapper = document.querySelector('.swiper');
        swiperWrapper.classList.remove('at-begin');
    }

    function restoreGradientLeft() {
        var swiperWrapper = document.querySelector('.swiper');
        swiperWrapper.classList.add('at-begin');
    }

    function removeGradientRight() {
        var swiperWrapper = document.querySelector('.swiper');
        swiperWrapper.classList.add('at-end');
    }

    function restoreGradientRight() {
        var swiperWrapper = document.querySelector('.swiper');
        swiperWrapper.classList.remove('at-end');
    }
});
  