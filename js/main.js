jQuery(document).ready(function() {

	/* How to Handle Hashtags */
	$(window).hashchange(function(){
		var hash = location.hash;
		$('a[href='+hash+']').trigger('click');
	});

	/* Main Navigation Clicks */
	$('.main-nav ul li a').click(function() {
		var link = jQuery(this).attr('href').substr(1);
		
		if ( !jQuery('section.content.show, section#' + link).is(':animated') ) {
			$('.main-nav ul li a').removeClass('active'); //remove active
			$('section.content.show').animate({'opacity' : 0}, {queue: false, duration: 1000,
				complete: function() {
					$('section.content.show').removeClass('show').addClass('hide');
					$('a[href="#'+link+'"]').addClass('active'); // add active
					$('section#' + link).animate({'opacity' : 1}, {queue: false, duration: 1000});	
					$('section#' + link).removeClass('hide').addClass('show');
				}
			});
		}
	});

});