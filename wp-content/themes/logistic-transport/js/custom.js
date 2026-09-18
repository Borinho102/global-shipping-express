jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,                            
		animation: {opacity:'show',height:'show'},  
		speed:       'fast'                        
	});
});

function logistic_transport_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function logistic_transport_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

function logistic_transport_search_show() {
	jQuery(".search-outer").addClass('show');
	jQuery(".search-outer").fadeIn();
}
function logistic_transport_search_hide() {
	jQuery(".search-outer").removeClass('show');
	jQuery(".search-outer").fadeOut();
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header px-lg-3 px-2');
		else sticky.removeClass('fixed-header px-lg-3 px-2');
	});

	// Back to top
	jQuery(document).ready(function () {
	    jQuery(window).scroll(function () {
	        if (jQuery(this).scrollTop() > 0) {
	        	jQuery('.scrollup').fadeIn();
	        } else {
	            jQuery('.scrollup').fadeOut();
	        }
	    });
	    jQuery('.scrollup').click(function () {
	        jQuery("html, body").animate({
	            scrollTop: 0
	        }, 600);
	        return false;
	    });
	});

	// Window load function
	window.addEventListener('load', (event) => {
		$(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

( function( window, document ) {
	function logistic_transport_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const logistic_transport_nav = document.querySelector( '.side-menu' );

			if ( ! logistic_transport_nav || ! logistic_transport_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...logistic_transport_nav.querySelectorAll( 'input, a, button' )],
				logistic_transport_lastEl = elements[ elements.length - 1 ],
				logistic_transport_firstEl = elements[0],
				logistic_transport_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && logistic_transport_lastEl === logistic_transport_activeEl ) {
				e.preventDefault();
				logistic_transport_firstEl.focus();
			}

			if ( shiftKey && tabKey && logistic_transport_firstEl === logistic_transport_activeEl ) {
				e.preventDefault();
				logistic_transport_lastEl.focus();
			}
		} );
	}
	
	function logistic_transport_keepfocus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const logistic_transport_search = document.querySelector( '.search-outer' );

			if ( ! logistic_transport_search || ! logistic_transport_search.classList.contains( 'show' ) ) {
				return;
			}

			const elements = [...logistic_transport_search.querySelectorAll( 'input, a, button' )],
				logistic_transport_lastEl = elements[ elements.length - 1 ],
				logistic_transport_firstEl = elements[0],
				logistic_transport_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && logistic_transport_lastEl === logistic_transport_activeEl ) {
				e.preventDefault();
				logistic_transport_firstEl.focus();
			}

			if ( shiftKey && tabKey && logistic_transport_firstEl === logistic_transport_activeEl ) {
				e.preventDefault();
				logistic_transport_lastEl.focus();
			}
		} );
	}

	logistic_transport_keepFocusInMenu();

	logistic_transport_keepfocus_search();
} )( window, document );