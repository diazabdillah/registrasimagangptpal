(function($) { "use strict";


	//Preloader

	Royal_Preloader.config({
		mode           : 'progress',
		background     : '#ffffff',
		showProgress   : true,
		showPercentage : false
	});

	
	/* Scroll Animation */
	
	window.scrollReveal = new scrollReveal();
		
		
	//Parallax & fade on scroll	
	
	function scrollBanner() {
	  $(document).on('scroll', function(){
		var scrollPos = $(this).scrollTop();
		$('.parallax-fade-top').css({
		  'top' : (scrollPos/2)+'px',
		  'opacity' : 1-(scrollPos/650)
		});
	  });    
	}
	scrollBanner();
		
		
	//Input number
	
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
	
	$(document).ready(function() {
	
	
		/* Scroll Too */
	
		$(".scroll").on('click', function(event){

			event.preventDefault();

			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top - 68;

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
		
		
		//Onboarding Carousel
 
		  var sync1 = $("#hero-sync3");
		  var sync2 = $("#hero-sync4");
		 
		  sync1.owlCarousel({
			singleItem : true,
			slideSpeed : 400,
			pagination:false,
			afterAction : syncPosition
		  });
		(function ($) { 
			var owl = $("#hero-sync3");
			owl.owlCarousel();	
			
			// Custom Navigation Events
			$(".next-hero-sync-2").click(function(){
				owl.trigger('owl.next');
			})
			$(".prev-hero-sync-2").click(function(){
				owl.trigger('owl.prev');
			})	
		} )(jQuery);
		  
		  sync2.owlCarousel({
			items : 4,
			itemsDesktop      : [1199,4],
			itemsDesktopSmall     : [979,4],
			itemsTablet       : [768,4],
			itemsMobile       : [479,2],
			pagination:false,
			responsiveRefreshRate : 100,
			afterInit : function(el){
			  el.find(".owl-item").eq(0).addClass("synced");
			}
		  });
		 
		  function syncPosition(el){
			var current = this.currentItem;
			$("#hero-sync4")
			  .find(".owl-item")
			  .removeClass("synced")
			  .eq(current)
			  .addClass("synced")
			if($("#hero-sync4").data("owlCarousel") !== undefined){
			  center(current)
			}
		  }
		 
		  $("#hero-sync4").on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			sync1.trigger("owl.goTo",number);
		  });
		 
		  function center(number){
			var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
			  if(num === sync2visible[i]){
				var found = true;
			  }
			}
		 
			if(found===false){
			  if(num>sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", num - sync2visible.length+2)
			  }else{
				if(num - 1 === -1){
				  num = 0;
				}
				sync2.trigger("owl.goTo", num);
			  }
			} else if(num === sync2visible[sync2visible.length-1]){
			  sync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
			  sync2.trigger("owl.goTo", num-1)
			}
			
		  }	
		
		
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