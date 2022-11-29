(function ($) {
    'use strict';
    // ========= Common ===========
    // Variables
    var waitForFinalEvent = (function () {
        var timers = {};
        return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout(timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    var backdrop = $('<div class="modal-backdrop in"></div>');

    function mask() {
        $('.phone-mask').mask('+7 (000) 000-00-00');
    }

    function mainSlider() {
        // var prev = $('.main-slider .slider-controls .btn-switch.prev');
        // var next = $('.main-slider .slider-controls .btn-switch.next');
        $('.main-slider').each(function () {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows:  false,
                // prevArrow: prev,
                // nextArrow: next,
                autoplay: true,
                autoplaySpeed: 3000,
                fade: true
            });
        });
    }

    function promoSlider() {
        let prev = $('.promo-slider .slider-controls .btn-switch.prev');
        let next = $('.promo-slider .slider-controls .btn-switch.next');
        $('.promo-slider .promo-slider__slides').each(function () {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                prevArrow: prev,
                nextArrow: next,
                autoplay: false,
                autoplaySpeed: 5000,
                fade: true,
            });
        });
    }

    function fancyboxOurWorks () {
        $('[data-fancybox="gallery"]').fancybox({
            // Options will go here
        });
    }

    function promoCardToggleInfo() {
        $(".promo-all .promo-card .promo-card__preview .promo-card__btn").on("click", function (e) {
            e.preventDefault();

            let promoCard = $(this).parent().parent();
            promoCard.find(".promo-card__preview").toggleClass("promo-card__hidden");
            promoCard.find(".promo-card__info").toggleClass("promo-card__hidden");
        })
    }

    function promoCardOpenModalEvent () {
        $(".btn-modal-promo-request").on("click", function (e) {
            e.preventDefault();

            let promoTitle = $(this).parent().find(".promo-card__title").html();
            let promoId = $(this).attr("data-promo-id");

            $("#modalPromo #promoModalLabel").html(promoTitle);
            $("#modalPromo #input_promo_id").val(promoId);
        })
    }

    function promoSliderOpenModalEvent () {
        $(".promo-slider__slide .promo-slide__link").on("click", function (e) {
            e.preventDefault();

            let promoTitle = $(this).parent().find(".promo-slide__title").html();

            $("#modalPromo #promoModalLabel").html(promoTitle);
        })
    }

    function mainMenuToggleVisibility() {
        $(".header__menu-button.button-hamburger, .main-menu__button-close").on("click", function (e) {
            e.preventDefault();

            $(".header__menu").toggleClass("main-menu_visible");
        })
    }

    function shield() {
        $('.shield-start').focus(function () {
            $('.shield').val(142);
        });
    }

    // Initializing all scripts
    $(document).ready(function () {
        mask();
        mainMenuToggleVisibility();

        mainSlider();
        promoSlider();

        promoCardToggleInfo();
        promoCardOpenModalEvent();
        promoSliderOpenModalEvent();

        shield();
    });
})(jQuery);