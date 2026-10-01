( function( $ ) {
    var pxl_widget_particle_handler = function( $scope, $ ) {
    	
        setTimeout(function(){
            $('body:not(.elementor-editor-active) .elementor > .elementor-element').each(function () {
                var _el_particle = $(this).find(".elementor-container .elementor-widget-particle"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .elementor-widget-particle"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });
        }, 100);

    };
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/particle.default', pxl_widget_particle_handler );
    } );
} )( jQuery );