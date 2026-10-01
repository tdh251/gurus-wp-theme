;(function ($) {

    "use strict";
    
    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = '';
    var pxl_last_scroll_top = 0;
    var pxl_post_slip = false;

    $(window).on('load', function () {
        $(".pxl-loader").addClass("is-loaded");
        $('.pxl-swiper-slider, .pxl-header-mobile-elementor, .pxl-slider').css('opacity', '1');
        $('.pxl-gallery-scroll').parents('body').addClass('body-overflow').addClass('body-visible-sm');
        pxl_window_width = $(window).width();
        pxl_window_height = $(window).height();
        gurus_header_sticky();
        gurus_header_mobile();
        gurus_scroll_to_top();
        gurus_footer_fixed();
        gurus_shop_quantity();
        gurus_submenu_responsive();
        gurus_panel_anchor_toggle();
        gurus_post_grid();
        
    });

    $(window).on('scroll', function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = 'up';
        } else {
            pxl_scroll_status = 'down';
        }
        pxl_last_scroll_top = pxl_scroll_top;
        gurus_header_sticky();
        gurus_scroll_to_top();
        gurus_footer_fixed();
        gurus_ptitle_scroll_opacity();
        if (pxl_scroll_top < 100) {
            $('.elementor > .pin-spacer').removeClass('scroll-top-active');
        }
        translateBackgroundSidebar();
    });


    $(window).on('resize', function () {
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        gurus_submenu_responsive();
        gurus_header_mobile();
        gurus_post_grid();
    });


    
    function translateBackgroundSidebar() {
        let section = $('#intro, #pxl-page-title-elementor, #pxl-page-title-default');
        let bgHeader = $('#pxl-header-elementor .pxl-header-sidebar--left .elementor-background-overlay').first();0
        if(section.length && bgHeader.length) {
            let sectionOffset = section.offset();
            let sectionHeight = section.outerHeight();
            let sectionBottom = sectionOffset.top + sectionHeight;
    
            let viewportHeight = $(window).height();
            let scrollTop = $(window).scrollTop();
            let viewportBottom = scrollTop + viewportHeight;
            
            let distanceToViewportBottom = viewportBottom - sectionBottom;
            if(distanceToViewportBottom > 0) {
                $(bgHeader).css({'transform' : 'translateX(0)'});
                return
            }
            $(bgHeader).css({'transform' : 'translateX(-100%)'});

        }
    }


    $(document).ready(function () {
        translateBackgroundSidebar();        
        gurus_backtotop_progess_bar();
        gurus_type_file_upload();
        gurus_zoom_point();
        on_submit_contact_form7();
        let focus = $(".focus");
        if(focus.length) {
            $(focus).on('mousemove', function (e) {
                let x = e.pageX;
                let y = e.pageY;
                $(this).css('background', "radial-gradient(circle at "+x+"px "+y+'px ,rgba(190, 255, 255, 0.2), transparent 5%)'); 
            })
        }
    
        // Hover Portfolio Accordion
        if($('.pxl-portfolio-accordion').length > 0) {
            $('.pxl-portfolio-accordion .pxl-item').on('click', function() {
                $('.pxl-portfolio-accordion .pxl-item').removeClass('active');
                $(this).addClass('active');
            });
        }

        // View Demos
        if($('.pxl-btn-view-demos').length){
            $('.pxl-btn-view-demos').on('click', function(e) {
                e.preventDefault();
                let section = $(document).find('.pxl-elementor-section-demos')[0];
                section.scrollIntoView({ behavior: 'smooth' });
            })
        } 

        // Marquee
        if($('.pxl-marquee').length > 0){
            $('.pxl-marquee').each(function(index, element) {
                let settings = $(this).find('.pxl-marquee-inner').data().settings;
                $(this).marquee({
                    allowCss3Support : true,
                    css3Easing       : settings['css3_easing'] ,
                    delayBeforeStart : settings['delay_before_start'] ,
                    direction        : settings['direction'] ,
                    duplicated       : settings['duplicated'] ,
                    duration         : settings['duration'] , 
                    gap              : settings['gap'] ,
                    pauseOnHover     : settings['pause_on_hover'] ,
                    startVisible     : settings['start_visible']
                });
            })
        }

        // Typewrriter
        if ($('.pxl-typewriter-effect').length > 0) {
            $('.pxl-typewriter-effect').each(function() {
                const typewriterTexts = $(this).find('.pxl-typewriter-text')[0];
                const settings = $(typewriterTexts).data('texts');
                if (settings) {
                    new Typed(typewriterTexts, {
                        strings: settings,
                        typeSpeed: 100,
                        backSpeed: 30,
                        loop: false,
                        showCursor: false,
                        startDelay: 500,
                    });
                }
            });
        }

        // Deactive Link
        $('.deactive-click a').on("click", function (e) {
            e.preventDefault();
        });

        /* Start Menu Mobile */
        $('.pxl-header-menu li.menu-item-has-children').append('<span class="pxl-menu-toggle"></span>');
        
        $('.pxl-menu-toggle').on('click', function () {
            if( $(this).hasClass('active')){
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();    
            }else{
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).toggleClass('active');
                $(this).parent().find('> .sub-menu').toggleClass('active');
                $(this).parent().find('> .sub-menu').slideToggle();
            }      
        });
    
        $("#pxl-nav-mobile, .pxl-anchor-mobile-menu").on('click', function () {
            $(this).toggleClass('active');
            $('body').toggleClass('body-overflow');
            $('.pxl-header-menu').toggleClass('active');
        });

        $(".pxl-menu-close, .pxl-header-menu-backdrop, #pxl-header-mobile .pxl-menu-primary a.is-one-page").on('click', function () {
            $(this).parents('.pxl-header-main').find('.pxl-header-menu').removeClass('active');
            $('#pxl-nav-mobile').removeClass('active');
            $('body').toggleClass('body-overflow');
        });
        /* End Menu Mobile */

        /* Menu Vertical */
        $('.pxl-nav-vertical li.menu-item-has-children > a').append('<span class="pxl-arrow-toggle"><i class="flaticon-right-arrow"></i></span>');
        $('.pxl-nav-vertical li.menu-item-has-children > a').on('click', function () {
            if( $(this).hasClass('active')){
                $(this).next().toggleClass('active').slideToggle(); 
            }else{
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
                $(this).find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).next().toggleClass('active').slideToggle();
            }   
        });

        /* Menu Hidden Sidebar Popup */
        $('.pxl-menu-hidden-sidebar li.menu-item-has-children > a').append('<span class="pxl-arrow-toggle"><i class="flaticon-right-arrow"></i></span>');
        $('.pxl-menu-hidden-sidebar li.menu-item-has-children > a').on('click', function () {
            if( $(this).hasClass('active')){
                $(this).next().toggleClass('active').slideToggle(); 
            }else{
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
                $(this).find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).next().toggleClass('active').slideToggle();
            }   
        });

        $('.pxl-menu-hidden-sidebar .pxl-menu-button').on('click', function () {
            $(this).parents('.pxl-menu-hidden-sidebar').toggleClass('active');
            $(this).parents('.pxl-menu-hidden-sidebar').removeClass('boxOut');
            $(this).parents('body').toggleClass('body-overflow');
        });
        $('.pxl-menu-popup-overlay').on('click', function () {
            $(this).parent().removeClass('active');
            $(this).parent().addClass('boxOut');
            $(this).parents('body').removeClass('body-overflow');
        });
        $('.pxl-menu-popup-close, .pxl-menu-hidden-sidebar .pxl-menu-hidden a.is-one-page').on('click', function () {
            $(this).parents('.pxl-menu-hidden-sidebar').removeClass('active');
            $(this).parents('.pxl-menu-hidden-sidebar').addClass('boxOut');
            $(this).parents('body').removeClass('body-overflow');
        });


        /* Mega Menu Max Height */
        var m_h_mega = $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').outerHeight();
        var w_h_mega = $(window).height();
        var w_h_mega_css = w_h_mega - 120;
        if(m_h_mega > w_h_mega) {
            $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').css('max-height', w_h_mega_css + 'px');
            $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').css('overflow-x', 'scroll');
        }
        /* End Mega Menu Max Height */

        /* Scroll To Top */
        $('.pxl-scroll-top').on('click', function () {
            $('html, body').animate({scrollTop: 0}, 1200);
            $(this).parents('.pxl-wrapper').find('.elementor > .pin-spacer').addClass('scroll-top-active');
            return false;
        });

        /* Animate Time Delay */
        $('.pxl-grid-masonry').each(function () {
            var eltime = 80;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl-grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 80;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        /* Lightbox Popup */
        setTimeout(function() {
            $('.pxl-action-popup').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }, 300);

        $('.pxl-gallery-lightbox').each(function () {
            $(this).magnificPopup({
                delegate: 'a.lightbox',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });
        /* Page Title Parallax */

        
        /* Cart Sidebar Popup */
        $(".pxl-cart-sidebar-button").on('click', function () {
            $('body').addClass('body-overflow');
            $('#pxl-cart-sidebar').addClass('active');
        });
        $("#pxl-cart-sidebar .pxl-popup--overlay").on('click', function () {
            $('body').removeClass('body-overflow');
            $('#pxl-cart-sidebar').removeClass('active');
        });

        /* Hover Active Item */
        $('.pxl--widget-hover').each(function () {
            $(this).on('mouseenter', function () {
                $(this).parents('.elementor-row').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).parents('.elementor-container').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).addClass('pxl--item-active');
            }).on('mouseleave', function () {
                // If you need to do something on mouse leave, add the logic here
                // For example, removing the class when the mouse leaves the element
                // $(this).removeClass('pxl--item-active');
            });
        });
        

        /* Start Icon Bounce */
        var boxEls = $('.el-bounce, .pxl-image-effect1, .el-effect-zigzag');
        $.each(boxEls, function(boxIndex, boxEl) {
            loopToggleClass(boxEl, 'active');
        });

        function loopToggleClass(el, toggleClass) {
            el = $(el);
            let counter = 0;
            if (el.hasClass(toggleClass)) {
                waitFor(function () {
                    counter++;
                    return counter == 2;
                }, function () {
                    counter = 0;
                    el.removeClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Deactivate', 1000);
            } else {
                waitFor(function () {
                    counter++;
                    return counter == 3;
                }, function () {
                    counter = 0;
                    el.addClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Activate', 1000);
            }
        }

        function waitFor(condition, callback, message, time) {
            if (message == null || message == '' || typeof message == 'undefined') {
                message = 'Timeout';
            }
            if (time == null || time == '' || typeof time == 'undefined') {
                time = 100;
            }
            var cond = condition();
            if (cond) {
                callback();
            } else {
                setTimeout(function() {
                    waitFor(condition, callback, message, time);
                }, time);
            }
        }
        /* End Icon Bounce */

        /* Image Effect */
        if($('.pxl-image-tilt').length){
            $('.pxl-image-tilt').parents('.elementor-top-section').addClass('pxl-image-tilt-active');
            $('.pxl-image-tilt').each(function () {
                var pxl_maxtilt = $(this).data('maxtilt'),
                    pxl_speedtilt = $(this).data('speedtilt'),
                    pxl_perspectivetilt = $(this).data('perspectivetilt');
                VanillaTilt.init(this, {
                    max: pxl_maxtilt,
                    speed: pxl_speedtilt,
                    perspective: pxl_perspectivetilt
                });
            });
        }

        /* Select Theme Style */
        $('.wpcf7-select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;
          
            $this.addClass('pxl-select-hidden'); 
            $this.wrap('<div class="pxl-select"></div>');
            $this.after('<div class="pxl-select-higthlight"></div>');

            var $styledSelect = $this.next('div.pxl-select-higthlight');
            $styledSelect.text($this.children('option').eq(0).text());
          
            var $list = $('<ul />', {
                'class': 'pxl-select-options'
            }).insertAfter($styledSelect);
          
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }
          
            var $listItems = $list.children('li');
          
            $styledSelect.on('click', function(e) {
                e.stopPropagation();
                $('div.pxl-select-higthlight.active').not(this).each(function(){
                    $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
                });
                $(this).toggleClass('active');
            });
          
            $listItems.on('click', function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
            });
          
            $(document).on('click', function() {
                $styledSelect.removeClass('active');
            });

        });

        /* Nice Select */
        $('.woocommerce-ordering .orderby, #pxl-sidebar-area select, .variations_form.cart .variations select, .pxl-open-table select, .pxl-nice-select').each(function () {
            $(this).niceSelect();
        });


        /* Section Particles */      
        setTimeout(function() {
            $(".pxl-row-particles").each(function() {
                particlesJS($(this).attr('id'), {
                  "particles": {
                    "number": {
                        "value": $(this).data('number'),
                    },
                    "color": {
                        "value": $(this).data('color')
                    },
                    "shape": {
                        "type": "circle",
                    },
                    "size": {
                        "value": $(this).data('size'),
                        "random": $(this).data('size-random'),
                    },
                    "line_linked": {
                        "enable": false,
                    },
                    "move": {
                        "enable": true,
                        "speed": 2,
                        "direction": $(this).data('move-direction'),
                        "random": true,
                        "out_mode": "out",
                    }
                  },
                  "retina_detect": true
                });
            });
        }, 400);

        /* Get checked input - Mailchimpp */
        $('.mc4wp-form input:checkbox').change(function(){
            if($(this).is(":checked")) {
                $('.mc4wp-form').addClass("pxl-input-checked");
            } else {
                $('.mc4wp-form').removeClass("pxl-input-checked");
            }
        });
        /* Item Hover Active */
        $('.pxl-hover-item').each(function () {
            $(this).on('mouseenter', function () {
                $(this).parent('.pxl-hover-wrap').find('.pxl-hover-item').removeClass('pxl-active');
                $(this).addClass('pxl-active');
            }).on('mouseleave', function () {
                ///
            });
        });
        

    });
    
    jQuery(document).ajaxComplete(function(event, xhr, settings){
        gurus_shop_quantity();
    });

    jQuery( document ).on( 'updated_wc_div', function() {
        gurus_shop_quantity();
    } );
     
    /* Header Sticky */
    function gurus_header_sticky() {
        if($('#pxl-header-elementor').hasClass('is-sticky')) {
            if (pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').addClass('pxl-header-fixed');
                $('#pxl-header-mobile').addClass('pxl-header-mobile-fixed');
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').removeClass('pxl-header-fixed');
                $('#pxl-header-mobile').removeClass('pxl-header-mobile-fixed');
            }

            if (pxl_scroll_status == 'up' && pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').addClass('pxl-header-fixed');
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').removeClass('pxl-header-fixed');
            }
        }

        $('.pxl-header-elementor-sticky').parents('body').addClass('pxl-header-sticky');
    }

    /* Header Mobile */
    function gurus_header_mobile() {
        var h_header_mobile = $('#pxl-header-elementor').outerHeight();
        if(pxl_window_width < 1199) {
            $('#pxl-header-elementor').css('min-height', h_header_mobile + 'px');
        }
    }

    /* Scroll To Top */
    function gurus_scroll_to_top() {
        if (pxl_scroll_top < pxl_window_height) {
            $('.pxl-scroll-top').addClass('pxl-off').removeClass('pxl-on');
        }
        if (pxl_scroll_top > pxl_window_height) {
            $('.pxl-scroll-top').addClass('pxl-on').removeClass('pxl-off');
        }
    }

    /* Footer Fixed */
    function gurus_footer_fixed() {
        setTimeout(function(){
            var h_footer = $('.pxl-footer-fixed #pxl-footer-elementor').outerHeight() - 1;
            $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
        }, 600);
    }

    /* WooComerce Quantity */
    function gurus_shop_quantity() {
        "use strict";
        $('#pxl-wrapper .quantity').append('<span class="quantity-icon quantity-down pxl-icon--minus"></span><span class="quantity-icon quantity-up pxl-icon--plus"></span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-icon').on('click', function () {
            var quantity_number = $(this).parents('.quantity').find('input[type="number"]').val();
            var add_to_cart_button = $(this).parents( ".product, .woocommerce-product-inner" ).find(".add_to_cart_button");
            add_to_cart_button.attr('data-quantity', quantity_number);
            add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") + "&quantity=" + quantity_number);
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }

    /* Menu Responsive Dropdown */
    function gurus_submenu_responsive() {
        var $gurus_menu = $('.pxl-header-elementor-main, .pxl-header-elementor-sticky');
        $gurus_menu.find('.pxl-menu-primary li').each(function () {
            var $gurus_submenu = $(this).find('> ul.sub-menu');
            if ($gurus_submenu.length == 1) {
                if ( ($gurus_submenu.offset().left + $gurus_submenu.width() + 0 ) > $(window).width()) {
                    $gurus_submenu.addClass('pxl-sub-reverse');
                }
            }
        });
    }

    function gurus_panel_anchor_toggle(){
        'use strict';
        $(document).on('click','.pxl-anchor-button',function(e){
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr('data-target');
            $(target).toggleClass('active');
            $('body').addClass('body-overflow');
            $('.pxl-popup--conent .wow').addClass('animated').removeClass('aniOut');
            $('.pxl-popup--conent .fadeInPopup').removeClass('aniOut');
            if($(target).find('.pxl-search-form').length > 0){
                setTimeout(function(){
                    $(target).find('.pxl-search-form .pxl-search-field').focus();
                },1000);
            }
        });

        $('.pxl-anchor-button').each(function () {
            var t_target = $(this).attr('data-target');
            var t_delay = $(this).attr('data-delay-hover');
            $(t_target).find('.pxl-popup--conent').css('transition-delay', t_delay + 'ms');
            $(t_target).find('.pxl-popup--overlay').css('transition-delay', t_delay + 'ms');
        });

        $(".pxl-hidden-panel-popup .pxl-popup--overlay, .pxl-hidden-panel-popup .pxl-close-popup").on('click', function () {
            $('body').removeClass('body-overflow');
            $('.pxl-hidden-panel-popup').removeClass('active');
            $('.pxl-popup--conent .wow').addClass('aniOut').removeClass('animated');
            $('.pxl-popup--conent .fadeInPopup').addClass('aniOut');
        });

        
        $(".pxl-hidden-panel-button.pxl-atc-popup").on('click', function () {
            $('body').addClass('body-overflow');
            // $(this).parents('.pxl-wrapper').find('.pxl-page-popup').addClass('active');
            $(this).parents('.pxl-wrapper').find('.pxl-hidden-panel-popup').addClass('active');
        });

        $(".pxl-button-anchor .pxl-button-toggle").on('click', function () {
            $('body').addClass('body-overflow');
            $(this).parents('.pxl-wrapper').find('.pxl-hidden-panel-popup').addClass('active');
        });
        
        $(".pxl-popup--close").on('click', function () {
            $('body').removeClass('body-overflow');
            $(this).parent().removeClass('active');
        });
    }

    /* Post Grid */
    function gurus_post_grid() {
        setTimeout(function(){
            $('.pxl-item--inner').each(function () {
                var item_w = $(this).outerWidth();
                var item_h = $(this).outerHeight();
                $(this).find('.pxl-item--imgfilter').css('width', item_w + 'px');
                $(this).find('.pxl-item--imgfilter').css('height', item_h + 'px');
            });
        }, 300);
    }

    /* Page Title Scroll Opacity */
    function gurus_ptitle_scroll_opacity() {
        var divs = $('#pxl-page-title-elementor.pxl-scroll-opacity .elementor-widget'),
            limit = $('#pxl-page-title-elementor.pxl-scroll-opacity').outerHeight();
        if (pxl_scroll_top <= limit) {
            divs.css({ 'opacity' : (1 - pxl_scroll_top/limit)});
        }
    }

    /* Preloader Default */
    $.fn.extend({
        jQueryImagesLoaded: function () {
          var $imgs = this.find('img[src!=""]')

          if (!$imgs.length) {
            return $.Deferred()
              .resolve()
              .promise()
          }

          var dfds = []

          $imgs.each(function () {
            var dfd = $.Deferred()
            dfds.push(dfd)
            var img = new Image()
            img.onload = function () {
              dfd.resolve()
            }
            img.onerror = function () {
              dfd.resolve()
            }
            img.src = this.src
          })

          return $.when.apply($, dfds)
        }
    })

    /* Back To Top Progress Bar */
    function gurus_backtotop_progess_bar() {
        if($('.pxl-scroll-top').length > 0) {
            var progressPath = document.querySelector('.pxl-scroll-top path');
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';      
            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }
            updateProgress();
            $(window).scroll(updateProgress);   
            var offset = 50;
            var duration = 550;
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > offset) {
                    $('.pxl-scroll-top').addClass('active-progress');
                } else {
                    $('.pxl-scroll-top').removeClass('active-progress');
                }
            });
        }
    }

    /* Custom Type File Upload*/
    function gurus_type_file_upload() {

        var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
        isIE = /msie/i.test( navigator.userAgent );

        $.fn.pxl_custom_type_file = function() {

            return this.each(function() {

            var $file = $(this).addClass('pxl-file-upload-hidden'),
            $wrap = $('<div class="pxl-file-upload-wrapper">'),
            $button = $('<button type="button" class="pxl-file-upload-button">Choose File</button>'),
            $input = $('<input type="text" class="pxl-file-upload-input" placeholder="No File Choose" />'),
            $label = $('<label class="pxl-file-upload-button" for="'+ $file[0].id +'">Choose File</label>');
            $file.css({
                position: 'absolute',
                opacity: '0',
                visibility: 'hidden'
            });

            $wrap.insertAfter( $file )
            .append( $file, $input, ( isIE ? $label : $button ) );

            $file.attr('tabIndex', -1);
            $button.attr('tabIndex', -1);

            $button.on('click', function () {
                $file.focus().click();
            });
            
            $file.change(function() {

            var files = [], fileArr, filename;

            if ( multipleSupport ) {
                fileArr = $file[0].files;
                for ( var i = 0, len = fileArr.length; i < len; i++ ) {
                files.push( fileArr[i].name );
                }
                filename = files.join(', ');
            } else {
                filename = $file.val().split('\\').pop();
            }

            $input.val( filename )
                .attr('title', filename)
                .focus();
            });

            $input.on({
                blur: function() { $file.trigger('blur'); },
                keydown: function( e ) {
                if ( e.which === 13 ) {
                    if ( !isIE ) { 
                        $file.trigger('click'); 
                    }
                } else if ( e.which === 8 || e.which === 46 ) {
                    $file.replaceWith( $file = $file.clone( true ) );
                    $file.trigger('change');
                    $input.val('');
                } else if ( e.which === 9 ){
                    return;
                } else {
                        return false;
                    }
                }
            });

            });

        };
        $('.wpcf7-file[type=file]').pxl_custom_type_file();
    }

    function on_submit_contact_form7() {
        let contactForms = $('.pxl-contact-form');
        contactForms.each(function() {
            let form = $(this).find('.wpcf7-form');
            let loader = $(this).find('.pxl-form-loader'); 
            $(form).on('wpcf7submit', function(e) {
                $(loader).css('visibility', 'hidden');
            });
            
            $(form).on('wpcf7beforesubmit', function(e) {
                $(loader).css('visibility', 'visible');
            });
        });
    }
    
    // Zoom Point
    function gurus_zoom_point() {
        $(".pxl-zoom-point").each(function () {

            let scaleOffset = $(this).data('offset');
            let scaleAmount = $(this).data('scale-mount');

            function scrollZoom() {
                const images = document.querySelectorAll("[data-scroll-zoom]");
                let scrollPosY = 0;
                scaleAmount = scaleAmount / 100;

                const observerConfig = {
                    rootMargin: "0% 0% 0% 0%",
                    threshold: 0
                };

                images.forEach(image => {
                    let isVisible = false;
                    const observer = new IntersectionObserver((elements, self) => {
                        elements.forEach(element => {
                            isVisible = element.isIntersecting;
                        });
                    }, observerConfig);

                    observer.observe(image);

                    image.style.transform = `scale(${1 + scaleAmount * percentageSeen(image)})`;

                    window.addEventListener("scroll", () => {
                    if (isVisible) {
                        scrollPosY = window.pageYOffset;
                        image.style.transform = `scale(${1 +
                        scaleAmount * percentageSeen(image)})`;
                    }
                    });
                });

                function percentageSeen(element) {
                    const parent = element.parentNode;
                    const viewportHeight = window.innerHeight;
                    const scrollY = window.scrollY;
                    const elPosY = parent.getBoundingClientRect().top + scrollY + scaleOffset;
                    const borderHeight = parseFloat(getComputedStyle(parent).getPropertyValue('border-bottom-width')) + parseFloat(getComputedStyle(element).getPropertyValue('border-top-width'));
                    const elHeight = parent.offsetHeight + borderHeight;

                    if (elPosY > scrollY + viewportHeight) {
                        return 0;
                    } else if (elPosY + elHeight < scrollY) {
                        return 100;
                    } else {
                        const distance = scrollY + viewportHeight - elPosY;
                        let percentage = distance / ((viewportHeight + elHeight) / 100);
                        percentage = Math.round(percentage);

                        return percentage;
                    }
                }
            }
            scrollZoom();
        });
    }



    

})(jQuery);