( function( $ ) {
    var SlickCarouselHandler = function( $scope, $ ) {
        var breakpoints = elementorFrontend.config.breakpoints;
        var carousel = $scope.find(".pxl-slick-slider");
        var data = carousel.data();
        var slickOptions = {
            slidesToShow: data.colxl,
            slidesToScroll: data.slidestoscroll,
            autoplay: true === data.autoplay,
            autoplaySpeed: data.autoplayspeed,
            infinite: true === data.infinite,
            pauseOnHover: true === data.pauseonhover,
            speed: data.speed,
            arrows: true === data.arrows,
            dots: true === data.dots,
            rtl: true === data.dir,
            nextArrow: '<span class="slick-arrow slick-next caseicon-angle-arrow-right rtl-icon"></span>',
            prevArrow: '<span class="slick-arrow slick-prev caseicon-angle-arrow-left rtl-icon"></span>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: data.collg
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: data.colmd
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: data.colsm
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: data.colxs,
                        slidesToScroll: data.colxs,
                    }
                },
            ]
        };
        if(typeof carousel.attr('data-vertical') !== 'undefined') {
            slickOptions.vertical = carousel.attr('data-vertical') == 'true' ? true : false;
        }
        carousel.slick(slickOptions);

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_history.default', SlickCarouselHandler );
    } );
} )( jQuery );