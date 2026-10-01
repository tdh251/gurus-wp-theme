( function( $ ) {

    function gurus_section_start_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        
        _elementor.hooks.addFilter( 'pxl_section_start_render', function( html, settings, el ) {
            
            if(typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != ''){
                html += '<div class="pxl-section-bg-parallax"></div>';
            }

            if(typeof settings.pxl_color_offset != 'undefined' && settings.pxl_color_offset != 'none'){
                html += '<div class="pxl-section-overlay-color"></div>';
            }

            if(typeof settings.pxl_overlay_img != 'undefined' && settings.pxl_overlay_img.url != ''){
                html += '<div class="pxl-overlay--image pxl-overlay--imageLeft"><div class="bg-image"></div></div>';
            }

            if(typeof settings.pxl_overlay_img2 != 'undefined' && settings.pxl_overlay_img2.url != ''){
                html += '<div class="pxl-overlay--image pxl-overlay--imageRight"><div class="bg-image"></div></div>';
            }

            return html;
        } );

        $('.pxl-section-bg-parallax').parent('.elementor-element').addClass('pxl-section-parallax-overflow');
    }

    function gurus_column_before_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-column/before-render', function( html, settings, el ) {
            if(typeof settings.rellax_background != 'undefined' && settings.rellax_background.url != ''){
                html += '<div class="pxl-rellax-parallax"></div>';
            }
            return html;
        } );
    }

    function gurus_css_inline_js(){
        var _inline_css = "<style>";
        $(document).find('.pxl-inline-css').each(function () {
            var _this = $(this);
            _inline_css += _this.attr("data-css") + " ";
            _this.remove();
        });
        _inline_css += "</style>";
        $('head').append(_inline_css);
    }

    function gurus_section_before_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-section/before-render', function( html, settings, el ) {
            if (typeof settings['row_divider'] !== 'undefined') {
                if(settings['row_divider'] == 'angle-top' || settings['row_divider'] == 'angle-bottom' || settings['row_divider'] == 'angle-top-right' || settings['row_divider'] == 'angle-bottom-left') {
                    html =  '<svg class="pxl-row-angle" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
                    return html;
                }
                if(settings['row_divider'] == 'angle-top-bottom' || settings['row_divider'] == 'angle-top-bottom-left') {
                    html =  '<svg class="pxl-row-angle pxl-row-angle-top" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg><svg class="pxl-row-angle pxl-row-angle-bottom" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
                    return html;
                }
                if(settings['row_divider'] == 'wave-animation-top' || settings['row_divider'] == 'wave-animation-bottom') {
                    html =  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 150" fill="#fff"><path d="M 0 26.1978 C 275.76 83.8152 430.707 65.0509 716.279 25.6386 C 930.422 -3.86123 1210.32 -3.98357 1439 9.18045 C 2072.34 45.9691 2201.93 62.4429 2560 26.198 V 172.199 L 0 172.199 V 26.1978 Z"><animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z; M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z; M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z; M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate></path></svg>';
                    return html;
                }
                if(settings['row_divider'] == 'curved-top' || settings['row_divider'] == 'curved-bottom') {
                    html =  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 128" version="1.1" preserveAspectRatio="none" style="fill:#ffffff"><path stroke-width="0" d="M-1,126a3693.886,3693.886,0,0,1,1921,2.125V-192H-7Z"></path></svg>';
                    return html;
                }
            }
        } );
    } 

    var PXL_Icon_Contact_Form = function( $scope, $ ) {
        setTimeout(function () {
            $('.pxl--item').each(function () {
                var icon_input = $(this).find(".pxl--form-icon"),
                    control_wrap = $(this).find('.wpcf7-form-control');
                control_wrap.before(icon_input.clone());
                icon_input.remove();
            });
        }, 10);

    };


    function gurus_scroll_fixed_section(){
        if($('.pxl-section-fix-top').length > 0) {
            ScrollTrigger.matchMedia({
                "(min-width: 991px)": function() {
                    const pinnedSections = ['.pxl-section-fix-top'];
                    pinnedSections.forEach(className => {
                        gsap.to(".pxl-section-fix-bottom", {
                            scrollTrigger: {
                                trigger: ".pxl-section-fix-bottom",
                                scrub: true,
                                pin: className,
                                pinSpacing: false,
                                start: 'top bottom',
                                end: "bottom top",
                            },
                        });
                    });
                }
            });
        }
    }


    function gurus_section_bg_parallax(){
        let backgrounds = $('body').find('.pxl-rellax-parallax');
        if(backgrounds.length) {
            backgrounds.each(function(i, el) {
                // const url = $(this).attr('data-url');
                // if(url) {
                //     $(this).css('background-image', 'url("' + url + '")');
                // }
            })
            
            new Rellax('.pxl-rellax-parallax', {
                center: true,
                round: true,
                vertical: true,
                horizontal: false
            });
        }
    }

    function gurus_split_text($scope){

        // setTimeout(function () {

            var st = $scope.find(".pxl-split-text, .pxl-split-text > p");
            if(st.length == 0) return;
            gsap.registerPlugin(SplitText);
            st.each(function(index, el) {
                el.split = new SplitText(el, { 
                    type: "words,chars",
                    wordsClass: "split-word",
                    charsClass: "split-char"
                });
                gsap.set(el, { perspective: 400 });

                if( $(el).hasClass('split-in-fade') ){
                    $(el).addClass('active');
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        ease: "Back.easeOut",
                    });
                }
                if( $(el).hasClass('split-in-right') ){
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        x: "50",
                        ease: "Back.easeOut",
                    });
                }
                if( $(el).hasClass('split-in-left') ){
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        x: "-50",
                        ease: "circ.out",
                    });
                }
                if( $(el).hasClass('split-in-up') ){
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        y: "80",
                        ease: "circ.out",
                    });
                }
                if( $(el).hasClass('split-in-down') ){
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        y: "-80",
                        ease: "circ.out",
                    });
                }
                if( $(el).hasClass('split-in-rotate') ){
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        rotateX: "50deg",
                        ease: "circ.out",
                    });
                }
                if( $(el).hasClass('split-in-scale') ){
                    gsap.set(el.split.chars, {
                        opacity: 0,
                        scale: "0.5",
                        ease: "circ.out",
                    });
                }
                el.anim = gsap.to(el.split.chars, {
                    scrollTrigger: {
                        trigger: el,
                        toggleActions: "play none none none",
                        start: "top 90%",
                    },
                    x: "0",
                    y: "0",
                    rotateX: "0",
                    scale: 1,
                    opacity: 1,
                    duration: 0.8, 
                    stagger: 0.02,
                });
            });

        // }, 200);
    }


    $( window ).on( 'elementor/frontend/init', function() {
        gurus_section_start_render();
        gurus_column_before_render();
        gurus_css_inline_js();
        gurus_section_before_render();
        gurus_scroll_fixed_section();
        gurus_section_bg_parallax();
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_contact_form.default', PXL_Icon_Contact_Form );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_heading.default', function( $scope ) {
            gurus_split_text($scope);
        });
    } );

} )( jQuery );