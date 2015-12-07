 jQuery(document).ready(function($) {
	
	var smh = $('.sidebar-widget').outerHeight(true) + $('.sticky-widget').outerHeight(true) + 20;
	$('.secondary').css('min-height',smh);
 
	$('.sticky-widget').scrollToFixed({
            limit: function() {
                var limit = $('.footer').offset().top - $('.sticky-widget').outerHeight(true) -10;
                return limit;
            },
			marginTop: 0,
			minWidth: 750,
            zIndex: 998,
            fixed: function() {  },
            dontCheckForPositionFixedSupport: true
        });
	});
	