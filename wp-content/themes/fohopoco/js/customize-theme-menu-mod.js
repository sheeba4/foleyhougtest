/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	
	wp.customize( 'body_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'background-color', to );
		} );
	} );
	
	wp.customize( 'background_image', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'background-image', to );
		} );
	} );
	
	wp.customize( 'body_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'color', to );
		} );
	} );
	
	wp.customize( 'body_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'body a, #content a, #sidebar .widget a' ).css( 'color', to );
		} );
	} );
	
	wp.customize( 'body_linkhover_color', function( value ) {
		value.bind( function( to ) {
			$( 'body a:hover, #content a:hover, #sidebar .widget a:hover' ).css( 'color', to );
		} );
	} );
	
	
	
	wp.customize( 'header_bg_image', function( value ) {
		value.bind( function( to ) {
			$( '#header' ).css( 'background-image', to );
		} );
	} );
	
	wp.customize( 'header_image', function( value ) {
		value.bind( function( to ) {
			$( '#header .site-name span' ).css( 'background-image', to );
		} );
	} );
	
	wp.customize( 'header_custom_css', function( value ) {
		value.bind( function( to ) {
			$("#header .site-name span").attr('style', to);
		} );
	} );
	
	wp.customize( 'h1_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#content h1 a' ).css( 'color', to );
		} );
	} );
	
	wp.customize( 'h1_linkhover_color', function( value ) {
		value.bind( function( to ) {
			$("#content h1 a").on({
				mouseover: function () {
					$orig = $(this).css('color');
					$(this).css( 'color' , to );
				},
				mouseout: function () {
					$(this).css( 'color' , $orig );
				}
			});
		} );
	} );
	
	wp.customize( 'navmenu_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#navigation li' ).css( 'background', to );
		} );
	} );
	
	wp.customize( 'navmenu_bghover_color', function( value ) {
		value.bind( function( to ) {
			$orig = $("#navigation li").css('background');
			$("#navigation li").on({
				mouseover: function () {	
					$(this).css( 'background', to ).css( 'font-weight', 'inherit');
				},
				mouseout: function () {
					$(this).css( 'background' , $orig );
				}
			});
		} );
	} );
	
	wp.customize( 'button_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.widget #searchsubmit, .widget #feedburner_email_widget_sbef_submit' ).css( 'background', to );
		} );
	} );
	
	wp.customize( 'button_bghover_color', function( value ) {
		value.bind( function( to ) {
			$orig = $('.widget #searchsubmit').css('background');
			$('.widget #searchsubmit, .widget #feedburner_email_widget_sbef_submit').on({
				mouseover: function () {	
					$(this).css( 'background', to );
				},
				mouseout: function () {
					$(this).css( 'background' , $orig );
				}
			});
		} );
	} );
	
	
	wp.customize( 'footercontainer_bg_image', function( value ) {
		value.bind( function( to ) {
			$( '.footer-container' ).css( 'background-image', to );
		} );
	} );
	
	wp.customize( 'footer_bg_image', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).css( 'background', to );
		} );
	} );
	
	wp.customize( 'footer_infolink_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer .info-links, #footer .info-links a' ).css( 'color', to );
			$( '#footer .info-links li + li' ).css( 'border-color', to );
		} );
	} );
	
	wp.customize( 'footer_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).css( 'color', to );
		} );
	} );
	
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).css( 'background-color', to );
		} );
	} );
	
	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer .col strong, #footer .col a' ).css( 'color', to );
		} );
	} );
	
	wp.customize( 'footer_linkhover_color', function( value ) {
		value.bind( function( to ) {
			$orig = $('#footer .col a').css('color');
			$('#footer .col a, #footer .col strong').on({
				mouseover: function () {	
					$(this).css( 'color', to );
				},
				mouseout: function () {
					$(this).css( 'color' , $orig );
				}
			});
		} );
	} );
	
	wp.customize( 'footer_copyright_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer .copyright' ).css( 'color', to );
		} );
	} );
	
	
	
} )( jQuery );