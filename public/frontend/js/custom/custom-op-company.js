(function($) { "use strict";


	//Preloader

	Royal_Preloader.config({
		mode           : 'progress',
		background     : '#ffffff',
		showProgress   : true,
		showPercentage : false
	});

	
	//Page Scroll to id
	
	$(window).on("load",function(){
				
		/* Page Scroll to id fn call */
		$("a.nav-link,a[href='#top'],a[data-gal='m_PageScroll2id']").mPageScroll2id({
			highlightSelector:"a.nav-link",
			offset: 110,
			scrollSpeed:800
		});
				
		/* demo functions */
		$("a[rel='next']").click(function(e){
			e.preventDefault();
			var to=$(this).parent().parent("section").next().attr("id");
			$.mPageScroll2id("scrollTo",to);
		});
				
	});

	
	/* Scroll Animation */
	
	window.scrollReveal = new scrollReveal();

	
	//Parallax & fade on scroll	
	
	function scrollBanner() {
	  $(document).on('scroll', function(){
		var scrollPos = $(this).scrollTop();
		$('.parallax-fade-top').css({
		  'top' : (scrollPos/2)+'px',
		  'opacity' : 1-(scrollPos/950)
		});
	  });    
	}
	scrollBanner();


	
	$(document).ready(function() {
	
	
		/* Scroll Too */
	
		$(".scroll").on('click', function(event){

			event.preventDefault();

			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top - 67;

			$('html, body').animate({scrollTop:target_top}, 800);
		});

			
		//Scroll back to top
	
		var offset = 300;
		var duration = 600;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.scroll-to-top').fadeIn(duration);
			} else {
				jQuery('.scroll-to-top').fadeOut(duration);
			}
		});
				
		jQuery('.scroll-to-top').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
		
		
		//Parallax
		
		$('.parallax').parallax("50%", 0.3);
		$('.parallax-1').parallax("50%", 0.3);
		
		
		/* Work Carousel */		
		
		$("#owl-work").owlCarousel({
			items : 3,
			itemsDesktop : [1350,2], 
			itemsDesktopSmall : [1000,2],
			itemsTablet: [768,1], 
			itemsMobile : false, 
			pagination : true,
			autoPlay : 8000,
			slideSpeed : 300
		});
		
		
		/* Progress Bar Animation */	
		
		$(function() {   
			var $meters = $(".progress > .progress-bar");
			var $section = $('#progress');
			var $queue = $({});
			
			function loadDaBars() {
						$(".progress > .progress-bar").each(function() {
							$(this)
								.data("origWidth", $(this).width())
								.width(0)
								.animate({
									width: $(this).data("origWidth")
								}, 2000);
						});
			}    
			$(document).bind('scroll.myScroll', function(ev) {
				var scrollOffset = $(document).scrollTop();
				var containerOffset = $section.offset().top - window.innerHeight;
				if (scrollOffset > containerOffset) {
					loadDaBars();
					// unbind event not to load scroll again
					$(document).unbind('.myScroll');
				}
			});    
		});		
	
	
		// Progress Counter 
	
		$('.counter').counterUp({
			delay: 20,
			time: 2000
		});
		
		
		//Chart
		
		$('.chart').easyPieChart({
			trackColor: '#000000',
			scaleColor: false,
			size: 120,
			lineWidth: 3,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
		
		
		/* Team Carousel */		
		
		$("#owl-team-1").owlCarousel({
			items : 3,
			itemsDesktop : [1350,3], 
			itemsDesktopSmall : [1000,2],
			itemsTablet: [600,1], 
			itemsMobile : false, 
			pagination : true,
			autoPlay : 8000,
			slideSpeed : 300
		});	

		
		// Activate Tooltip
		
		$(".tipped").tipper();
		
				
		/* Video */
		
		$(".container").fitVids();
						
		$('.vimeo a,.youtube a').on('click', function (e) {
			e.preventDefault();
			var videoLink = $(this).attr('href');
			var classeV = $(this).parent();
			var PlaceV = $(this).parent();
			if ($(this).parent().hasClass('youtube')) {
				$(this).parent().wrapAll('<div class="video-wrapper">');
				$(PlaceV).html('<iframe frameborder="0" height="333" src="' + videoLink + '?autoplay=1&showinfo=0" title="YouTube video player" width="547"></iframe>');
			} else {
				$(this).parent().wrapAll('<div class="video-wrapper">');
				$(PlaceV).html('<iframe src="' + videoLink + '?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;color=6dc234" width="500" height="281" frameborder="0"></iframe>');
			}
		});	
					
	});	

	
	
	
  })(jQuery); 