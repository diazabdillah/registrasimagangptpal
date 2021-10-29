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
		  'opacity' : 1-(scrollPos/650)
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

		
		/* Testimonials Carousel */		
		
		$("#owl-testimonials-1").owlCarousel({
			transitionStyle : "goDown",
			singleItem: true, 
			itemsMobile : false, 
			pagination : false,
			autoPlay : 5000,
			slideSpeed : 300
		});	
		(function ($) { 
			var owl = $("#owl-testimonials-1");
			owl.owlCarousel();	
			
			// Custom Navigation Events
			$(".next-testimonials-1").click(function(){
				owl.trigger('owl.next');
			})
			$(".prev-testimonials-1").click(function(){
				owl.trigger('owl.prev');
			})	
		} )(jQuery);
	
	
		// Facts Counter 
	
		$('.counter-numb').counterUp({
			delay: 20,
			time: 2000
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
		
		
		//Set your google maps parameters

		var latitude = 40.726595,
			longitude = -73.9963497,
			map_zoom = 14;

		//google map custom marker icon - .png fallback for IE11
		var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
		var marker_url = ( is_internetExplorer11 ) ? 'img/cd-icon-location.png' : 'img/cd-icon-location.svg';
			
		//define the basic color of your map, plus a value for saturation and brightness
		var	main_color = '#ffffff';

		//we define here the style of the map
		var style= [
		  {
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#ffffff"
			  }
			]
		  },
		  {
			"elementType": "geometry.fill",
			"stylers": [
			  {
				"color": "#f9f9f9"
			  },
			  {
				"lightness": 35
			  },
			  {
				"visibility": "on"
			  }
			]
		  },
		  {
			"elementType": "labels.icon",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"visibility": "simplified"
			  }
			]
		  },
		  {
			"elementType": "labels.text.stroke",
			"stylers": [
			  {
				"color": "#f5f5f5"
			  }
			]
		  },
		  {
			"featureType": "administrative",
			"elementType": "labels.text",
			"stylers": [
			  {
				"color": "#7f7f7f"
			  },
			  {
				"lightness": 25
			  }
			]
		  },
		  {
			"featureType": "administrative",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "administrative.land_parcel",
			"elementType": "labels",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "administrative.land_parcel",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#f6f6f6"
			  }
			]
		  },
		  {
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#eeeeee"
			  }
			]
		  },
		  {
			"featureType": "poi",
			"elementType": "labels.text",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "poi",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#757575"
			  }
			]
		  },
		  {
			"featureType": "poi.business",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#e5e5e5"
			  }
			]
		  },
		  {
			"featureType": "poi.park",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#9e9e9e"
			  }
			]
		  },
		  {
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#cccccc"
			  }
			]
		  },
		  {
			"featureType": "road",
			"elementType": "geometry.fill",
			"stylers": [
			  {
				"color": "#cccccc"
			  },
			  {
				"lightness": 70
			  }
			]
		  },
		  {
			"featureType": "road",
			"elementType": "labels.icon",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "road.arterial",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#757575"
			  }
			]
		  },
		  {
			"featureType": "road.highway",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#dadada"
			  }
			]
		  },
		  {
			"featureType": "road.highway",
			"elementType": "geometry.fill",
			"stylers": [
			  {
				"color": "#f7f7f7"
			  }
			]
		  },
		  {
			"featureType": "road.highway",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#616161"
			  }
			]
		  },
		  {
			"featureType": "road.local",
			"elementType": "labels",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "road.local",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#9e9e9e"
			  }
			]
		  },
		  {
			"featureType": "transit",
			"stylers": [
			  {
				"visibility": "off"
			  }
			]
		  },
		  {
			"featureType": "transit.line",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#e5e5e5"
			  }
			]
		  },
		  {
			"featureType": "transit.station",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#eeeeee"
			  }
			]
		  },
		  {
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
			  {
				"color": "#ededed"
			  }
			]
		  },
		  {
			"featureType": "water",
			"elementType": "geometry.fill",
			"stylers": [
			  {
				"color": "#ededed"
			  }
			]
		  },
		  {
			"featureType": "water",
			"elementType": "labels.text.fill",
			"stylers": [
			  {
				"color": "#ededed"
			  }
			]
		  }
		];

			
		//set google map options
		var map_options = {
			center: new google.maps.LatLng(latitude, longitude),
			zoom: map_zoom,
			panControl: false,
			zoomControl: false,
			mapTypeControl: false,
			streetViewControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			styles: style,
		}
		//inizialize the map
		var map = new google.maps.Map(document.getElementById('google-container'), map_options);
		//add a custom marker to the map				
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(latitude, longitude),
			map: map,
			visible: true,
			icon: marker_url,
		});

		//add custom buttons for the zoom-in/zoom-out on the map
		function CustomZoomControl(controlDiv, map) {
			//grap the zoom elements from the DOM and insert them in the map 
			var controlUIzoomIn= document.getElementById('cd-zoom-in'),
				controlUIzoomOut= document.getElementById('cd-zoom-out');
			controlDiv.appendChild(controlUIzoomIn);
			controlDiv.appendChild(controlUIzoomOut);

			// Setup the click event listeners and zoom-in or out according to the clicked element
			google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
				map.setZoom(map.getZoom()+1)
			});
			google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
				map.setZoom(map.getZoom()-1)
			});
		}

		var zoomControlDiv = document.createElement('div');
		var zoomControl = new CustomZoomControl(zoomControlDiv, map);

		//insert the zoom div on the top left of the map
		map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
					
	});	

	
	
	
  })(jQuery); 