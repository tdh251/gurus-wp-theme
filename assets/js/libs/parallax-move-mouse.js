;(function ($) {

    $('.elementor-top-section').each(function () {
        let parallaxWraps = $(this).find('.pxl-parallax-hover-wrap');
        if(parallaxWraps.length > 0) {
            parallaxWraps.each(function() {
                $(this).on('mousemove', function(e) {
                    let items = $(this).find('.pxl-parallax-hover, .pxl-parallax-hover .pxl-item--image');
                    if (items.length > 0) {
                        items.each(function () {
                            var el_move = $(this);
                            var el_value = $(this).data('parallax-value');
                            var el_parent = $(this).closest('.elementor-top-section');
                            pxl_parallax_move(e, el_move, -el_value, el_parent);
                        });
                    }
                });
            })
        }else {
            $(this).on('mousemove', function(e) {
                $(this).removeClass('pxl-section-mouseleave');
                let items = $(this).find('.pxl-parallax-hover, .pxl-parallax-hover .pxl-item--image');
                if (items.length > 0) {
                    items.each(function () {
                        var el_move = $(this);
                        var el_value = $(this).data('parallax-value');
                        var el_parent = $(this).closest('.elementor-top-section');
                        pxl_parallax_move(e, el_move, -el_value, el_parent);
                    });
                }
            });
        }
    
        $(this).on('mouseleave', function() {
            $(this).addClass('pxl-section-mouseleave');
        });
    });
    

    function pxl_parallax_move(e, target, movement, section) {
        var relX = e.pageX - section.offset().left;
        var relY = e.pageY - section.offset().top;

        TweenMax.to(target, 1, {
            x: (relX - section.width() / 2) / section.width() * movement,
            y: (relY - section.height() / 2) / section.height() * movement
        });
    }

})(jQuery);
