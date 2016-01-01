/* Menubox.js v1.0 */
jQuery(document).ready(function($) {
		var stickyHeaderTop = $('.menu-panel-wrapper').offset().top;
		$(window).scroll(function(){
		    if( $(window).scrollTop() > stickyHeaderTop ) {
			$('.menu-panel-wrapper').addClass("sticky-nav");
		    } else {
			$('.menu-panel-wrapper').removeClass("sticky-nav");
		    }
		});
});