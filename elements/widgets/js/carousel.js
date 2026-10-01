( function( $ ) {

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_post_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_testimonial_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_team_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_partner_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_image_box_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_service_box.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_service_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_icon_box_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_news_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_service_grid.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_portfolio_carousel.default', function( $scope ) {
            pxl_swiper_handler($scope);
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_slider1.default', function( $scope ) {
            pxl_swiper_handler($scope);
        });
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_slider2.default', function( $scope ) {
            pxl_swiper_handler($scope);
        });
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_slider3.default', function( $scope ) {
            pxl_swiper_handler($scope);
        });
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_slider4.default', function( $scope ) {
            pxl_swiper_handler($scope);
        });
    } );


    let addClassActiveHover = (element) => {
        if (element.hasClass('pxl-portfolio-carousel2')) {
            let slides = element.find('.pxl-swiper-slide');
            let slideVisible = element.find('.swiper-slide-visible');
            let countSlidesVisible = slideVisible.length;
            let indexActive = (countSlidesVisible > 1) ? Math.ceil(countSlidesVisible/2) : countSlidesVisible;
            slides.removeClass('pxl-active-hover')
            slideVisible.each(function(index) {
                if((index + 1) === indexActive) {
                    $(this).addClass('pxl-active-hover');
                }
            })
        }
    }

    let swiperFilterChange = (swiper, $this, carousel_settings) => {
        let filterItems = $this.find('.pxl-swiper-filter .filter-item');
        if(filterItems.length <= 0) return;
        
        let swiperContainer = $this.find(".pxl-swiper-container")[0];
        let swiperWrapper = $this.find(".pxl-swiper-wrapper")[0];
        let slides = $this.find('.pxl-swiper-slide');
        filterItems.each(function (index, item) {
            $(item).on('click', function () {  
                filterItems.removeClass('active');
                $(item).addClass('active');
                let target = $(item).attr('data-filter').replace('.','');
                $(swiperWrapper).empty();
                slides.each(function (index, slide) {
                    if ($(slide).hasClass(target) || target === '*') {
                        let newSlide = $(slide).clone();
                        $(swiperWrapper).append(newSlide);
                    }
                });
                swiper.destroy();
                swiper = new Swiper(swiperContainer, carousel_settings);
            })    
        })
    }

    
    function pxl_swiper_handler($scope){
        if($scope.find('.pxl-swiper-slider.pxl-slider').length) {
            $scope.find('.pxl-slider').each(function(index, element) {
                let _this = $(element);
                let settings = _this.find(".pxl-swiper-container").data().settings;
    
                let autoPlay = settings['opt_auto_play'] === true ? { delay: settings['delay'], disableOnInteraction: settings['disable_on_interaction'] } : null;
                let swiperOptions = {
                    loop: settings['opt_loop'],
                    wrapperClass : 'pxl-swiper-wrapper',
                    slideClass: 'pxl-swiper-slide',
                    initialSlide: 0,
                    centeredSlides: true,
                    observer: true,
                    observeParents: true,
                    watchSlidesProgress: true,
                    watchSlidesVisibility: true,
                    grabCursor: true,
                    effect: settings['opt_effect'] ?? 'fade',
                    allowTouchMove: settings['opt_allow_touch_move'],
                    fadeEffect: {
                        crossFade: true,
                    },
                    speed: settings['opt_speed'],
                    autoplay: autoPlay ? autoPlay : undefined,
                    pagination: {
                        type: 'bullets',
                        el: _this.find('.pxl-swiper-dots')[0] || null,
                        modifierClass: 'pxl-swiper-pagination-',
                        bulletClass : 'pxl-swiper-pagination-bullet',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: _this.find('.pxl-swiper-arrow-next')[0] || null,
                        prevEl: _this.find('.pxl-swiper-arrow-prev')[0] || null,
                    },
                    on: {
                        init: function (swiper) {
                            let activeIndex = this.params.loop ? this.activeIndex : this.activeIndex + 1;
                            let paginationDOM = _this.find('.pxl-swiper-dots');
                            let numberFirst = activeIndex < 10 ? '0' + activeIndex : activeIndex  ;
                            let numberTotal = this.params.loop ? (this.slides.length-2)  : this.slides.length;
                            numberTotal = numberTotal < 10 ? '0' + numberTotal : numberTotal;
                            if(paginationDOM.length ) {
                                paginationDOM.before(`<div class="pxl-swiper-fraction pxl-swiper-fraction-first">${numberFirst}</div>`) 
                                paginationDOM.after(`<div class="pxl-swiper-fraction pxl-swiper-fraction-total">${numberTotal}</div>`)
                            };
                        },
                        slideChange: function(swiper) {
                            let activeIndex = this.realIndex + 1;
                            let pagination = _this.find('.pxl-item--index');
                            if (pagination.length) {
                                pagination.removeClass('active');
                                pagination.each(function() {
                                    const active = $(this).attr('data-index');
                                    if (active == activeIndex) {
                                        $(this).addClass('active');
                                    }
                                });
                            }  
                        }
                    }
                };
                let swiper = new Swiper(_this.find(".pxl-swiper-container")[0], swiperOptions);
            });
        }  
        if($scope.find('.pxl-swiper-slider:not(.pxl-slider)').length) {
            $scope.find('.pxl-swiper-slider').each(function(index, element) {
                var $this = $(this);
                const thisClass = $this.attr('class')
                var settings = $this.find(".pxl-swiper-container").data().settings;
                var closestElementorSection = $this.closest('.elementor-section');
                let isSlider = thisClass.includes('pxl-slider') ? true : false;
                let navButton = false;
                if(settings['arrow'] == true) {
                    navButton = {
                        nextEl: $this.find('.pxl-swiper-arrow-next')[0],
                        prevEl: $this.find('.pxl-swiper-arrow-prev')[0],
                    };
                }
                if (closestElementorSection.length > 0 && closestElementorSection.find('.pxl-navigation-carousel').length > 0) { 
                    let navButtonCopy = closestElementorSection.find('.pxl-navigation-carousel')[0];
                    navButton = {
                        nextEl: $(navButtonCopy).find('.pxl-arrow--next')[0],
                        prevEl: $(navButtonCopy).find('.pxl-arrow--prev')[0],
                    }
                } 
                var carousel_settings = {
                    direction: settings['slide_direction'],
                    effect: settings['slide_mode'] ?? 'slide' ,
                    wrapperClass : 'pxl-swiper-wrapper',
                    slideClass: 'pxl-swiper-slide',
                    slidesPerView: settings['slides_to_show'],
                    slidesPerGroup: settings['slides_to_scroll'],
                    slidesPerColumn: settings['slide_percolumn'],
                    spaceBetween: 0,
                    observer: true,
                    observeParents: true,
                    initialSlide: 0,
                    navigation: navButton,
                    pagination : {
                        type: settings['pagination_type'],
                        el: $this.find('.pxl-swiper-dots')[0],
                        clickable : true,
                        modifierClass: 'pxl-swiper-pagination-',
                        bulletClass : 'pxl-swiper-pagination-bullet',
                        renderCustom: function (swiper, element, current, total) {
                            return current + ' of ' + total;
                        }
                    },
                    speed: settings['speed'],
                    watchSlidesProgress: true,
                    watchSlidesVisibility: true,
                    breakpoints: {
                        0 : {
                            slidesPerView: settings['slides_to_show_xs'],
                            slidesPerGroup: settings['slides_to_scroll'],
                        },
                        576 : {
                            slidesPerView: settings['slides_to_show_sm'],
                            slidesPerGroup: settings['slides_to_scroll'],
                        },
                        768 : {
                            slidesPerView: settings['slides_to_show_md'],
                            slidesPerGroup: settings['slides_to_scroll'],
                        },
                        992 : {
                            slidesPerView: settings['slides_to_show_lg'],
                            slidesPerGroup: settings['slides_to_scroll'],
                        },
                        1200 : {
                            slidesPerView: settings['slides_to_show'],
                            slidesPerGroup: settings['slides_to_scroll'],
                        },
                        1400 : {
                            slidesPerView: settings['slides_to_show_xxl'],
                            slidesPerGroup: settings['slides_to_scroll'],
                        }
                    },
                    on: {
                        init: function (swiper) {
                            addClassActiveHover($this)
                        },
    
                        slideChangeTransitionStart : function (swiper){
                            var activeIndex = this.activeIndex;
                            $(this.slides).each(function(index){
                                if(index == activeIndex)
                                    $(this).find('.wow').removeClass('pxl-invisible').addClass('animated');
                                else
                                    $(this).find('.wow').removeClass('animated').addClass('pxl-invisible');
                            });                        
                        },
    
                        slideChange: function (swiper) { 
                            addClassActiveHover($this)
                        },

                        slideChangeTransitionEnd : function (swiper) { 
                        },
    
                        sliderMove: function (swiper) { 
                            var activeIndex = this.activeIndex; 
                            $(this.slides).each(function(index){
                                if(index == activeIndex)
                                    $(this).find('.wow').removeClass('pxl-invisible').addClass('animated');
                                else
                                    $(this).find('.wow').removeClass('animated').addClass('pxl-invisible');
                            });
     
                        },
                        
    
                    }
                };    
                if(isSlider) {
                    carousel_settings['allowTouchMove'] = settings['opt_allow_touch_move'];
                }
                if(settings['center_slide'] || settings['center_slide'] == 'true')
                    carousel_settings['centeredSlides'] = true;
    
                if(settings['loop'] || settings['loop'] === 'true'){
                    carousel_settings['loop'] = true;
                }
    
                if(settings['autoplay'] || settings['autoplay'] === 'true'){
                    carousel_settings['autoplay'] = {
                        delay : settings['delay'],
                        disableOnInteraction : settings['pause_on_interaction']
                    };
                } else {
                    carousel_settings['autoplay'] = false;
                }
    
                // Start Swiper Thumbnail
                if($this.find('.pxl-swiper-thumbs').length > 0) {
                    var thumb_settings = $this.find('.pxl-swiper-thumbs').data().settings;
                    var thumb_carousel_settings = {
                        effect: thumb_settings['slide_mode'],
                        direction: thumb_settings['slide_direction'],
                        spaceBetween: 0,
                        slidesPerView: thumb_settings['slides_to_show'],
                        centeredSlides: false,
                        loop: thumb_settings['loop'],  
                        watchSlidesProgress: true,
                        slideToClickedSlide: true,
                    };  
    
                    var slide_thumbs = new Swiper($this.find('.pxl-swiper-thumbs')[0], thumb_carousel_settings);
                    carousel_settings['thumbs'] = { swiper: slide_thumbs };
                }
                // End Swiper Thumbnail
    
                
                var swiper = new Swiper($this.find(".pxl-swiper-container")[0], carousel_settings);
    
                swiperFilterChange(swiper, $this, carousel_settings);

                if(settings['autoplay'] === 'true' && settings['pause_on_hover'] === 'true'){
                    $( $this.find('.pxl-swiper-container') ).on({
                        mouseenter: function mouseenter() {
                            this.swiper.autoplay.stop();
                        },
                        mouseleave: function mouseleave() {
                            this.swiper.autoplay.start();
                        }
                    });
                }

            });  
        }
    };
} )( jQuery );