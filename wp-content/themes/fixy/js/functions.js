jQuery(document).ready(function($) {
    /*---Navigation--------------------------*/
	 // By Jonathan Schnittger
	 //http://schnittger.me/
	 
	 $.fn.navigation = function( options ) {
        var settings = $.extend({
            duration: "500",
         }, options );
 
        return this.each(function() {
            var article = $(this);
            $('div.secondary aside.navigation-widget div.widget-content').html('<div class="navigation-content"><ul></ul></div>');
            var list = $('.main div.secondary').find('aside.navigation-widget div.navigation-content:first > ul:first');
            
            article.find('h1, h2, h3, h4').each(function(){
                var heading = $(this);
                var tag = heading[0].tagName.toLowerCase();
                var title = heading.text();
                var id = heading.attr('id');
                
                if(typeof id === "undefined") {
                    id = Math.random().toString(36).substring(7);
                    heading.attr('id', id);
                }
                list.append('<li class="' + tag + '"><i class="icon-star"></i><a href="#' + id + '" title="' + title + '">' + title + '</a></li>');
            });
            
            list.on('click', function(event){
                var target = $(event.target);
                if(target.is('a')){
                    event.preventDefault();
                    $('html,body').animate({
                        scrollTop: $(target.attr('href')).offset().top - 30
                    }, settings.duration);
                    return false;
                }
            });
        });
 
    };
	if ('aside.navigation-widget') {
		$('div.primary').navigation();
	};
	
	//end of navigation
   
	$('article').prepend('<a class="focus" ><i class="icon-lightbulb"></i></a><a class="close-focus"><i class="icon-off"></i></a>');
		
	
	$('a.comment-reply-link').on('click', function(comment_focus){
		$('div.body-overlay').remove();
		$('body').prepend('<div class="body-overlay-on-comment"></div>');
			var replylink = $(this);
			var comment = $(this).closest('article');
			comment.addClass('element-overlay');
			$('#respond').addClass('element-overlay');
			$('a.focus').css('display','none');
			$('a.close-focus').css('display','none');
			replylink.hide();
		
			
			$('a#cancel-comment-reply-link').on('click', function(rl){
				$('div.body-overlay-on-comment').remove();
				comment.removeClass('element-overlay');   
				$('#respond').removeClass('element-overlay');
				$('a.focus').css('display','block');
				replylink.show();
		});
        comment_focus.preventDefault();
    });
	
       
    	
	$('a.focus').on('click', function(focus){
        $('div.body-overlay-on-comment').remove();
		$('body').prepend('<div class="body-overlay"></div>');
			var article = $(this).closest('article');
			var closefocus = article.children('a.close-focus');
			article.addClass('element-overlay');
			closefocus.css('display','block');
			$(this).css('display','none');
		
		$('div.body-overlay, article a.close-focus').on('click', function(e){
					$('div.body-overlay').remove();
			article.removeClass('element-overlay'); 
			$('a.close-focus').css('display','none');
			$('a.focus').css('display','block');
		
			
		});
        focus.preventDefault();
	});
	
	
    

	
	$('a.advancesearch,a.advancesearch-cancel').on('click', function(event){
		 event.preventDefault();
		$('div.advance-search-slide').slideToggle( "slow");
		$('html,body').animate({scrollTop: $('div.advance-search-slide').offset().top - 20});
		});
				
	$('a#userlogin,a#userlogin-cancel').on('click',function(aul){
		$('div.login-panel').slideToggle( "slow");
		});
		
		
  // Select first word of every paragraph in post format chat
  $('.format-chat .post-content p').each(function(){
    var text_splited = $(this).text().split(" ");
   $(this).html("<strong>"+text_splited.shift()+"</strong> "+text_splited.join(" "));
  });

								
		$.fn.windowCenter = function (event) {
			var mrtop = (($(window).height() - $(this).height()-35)/2);
			var mrleft = (($(window).width() - $(this).width()-35)/2);
			$(this).css('margin-top',mrtop);
			$(this).css('margin-left',mrleft);
			
			};
		
		if ($('.external-ok').attr('id') == 'yes') {
			$("a[href*='http://']:not([href*='"+location.hostname+"']),[href*='https://']:not([href*='"+location.hostname+"'])").each(function(){
				$(this).addClass("external");
			});
		}
		
		$('a.external').click(function(event){
			event.preventDefault();
			var address= $(this).attr('href');
			$('body').prepend('<div class="body-overlay-on-image"></div>');
			$('body').append('<div class="iframe-temp-area"><iframe class="iframe-temp"  src="'+ address +'"/></div>');
			$('.iframe-temp-area').windowCenter();
						
						
			$(".body-overlay-on-image").on("click",function(){
				$(".body-overlay-on-image").remove();
				$(".iframe-temp-area").remove();
				
			});
		});
		
				
	
	$(window).resize(function(event){
		if ($(window).width() > 458){
			$('.header-menu').removeClass('display');
		}
		$('.iframe-temp-area').windowCenter();
	});
	
	$('button.menu-toggler').on("click",function(e){
		$('.header-menu').toggleClass('display');	
	});	
	
	 $(".post-content").fitVids();
	 
	 
	 // Lazy Content
	 
	 
if($('span.lazy-ok').attr('id') == 'yes'){
	$('.post-content, .post-excerpt, .post-header').find('li').each(function(){
		$(this).attr('data-scrollreveal','enter from the bottom over 0.9s but wait 0.6s');
	});	
	$('.post-content, .post-excerpt, .comment-respond').find('p').each(function(){
		$(this).wrap('<div class="p-wrapper" data-scrollreveal="over 0.8s move 60px but wait 0.3s and enter from the bottom"></div>');
	});
	
	
	
	if ($('body').hasClass('rtl')){
		$('.comments-area').find('article').each(function(){		
			$(this).attr('data-scrollreveal','enter left and move 60px over 1.2s');
		});
		$('.post-content, .post-excerpt, .post-header, .comment-respond').find('h1,h2,h3,h4,h5,quote,bquote').each(function(){		
			$(this).attr('data-scrollreveal','enter left and move 60px over 1.2s');
		});
		$('.post-content,.post-excerpt, .post-header').find('img').each(function(){
			$(this).attr('data-scrollreveal','over 1.2s move 80px but wait 0.4s and enter from the right');
		});
	} else {
		$('.comments-area').find('article').each(function(){		
			$(this).attr('data-scrollreveal','enter right and move 60px over 1.2s');
		});
		$('.post-content, .post-excerpt, .post-header, .comment-respond').find('h1,h2,h3,h4,h5,quote,bquote').each(function(){		
			$(this).attr('data-scrollreveal','enter right and move 60px over 1.2s');
		});
		$('.post-content,.post-excerpt, .post-header').find('img').each(function(){
			$(this).attr('data-scrollreveal','over 1.2s move 80px but wait 0.4s and enter from the left');
		});
	
	}
};	 
	 	 
	
});