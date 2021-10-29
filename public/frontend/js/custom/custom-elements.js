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
	  $(document).scroll(function(){
		var scrollPos = $(this).scrollTop();
		$('.parallax-fade-top').css({
		  'top' : (scrollPos/2)+'px',
		  'opacity' : 1-(scrollPos/750)
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
			var target_top = target_offset.top - 60;

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

			
		// Type text
		
		var typed = new Typed('#typed-1', {
			strings: ['Belgrade', 'New York', 'Athens', 'Berlin', 'Copenhagen', 'Moscow', 'Prague', 'Paris'],
			typeSpeed:45,
			backSpeed:0,
			startDelay:200,
			backDelay:2200,
			loop:true,
			loopCount:false,
			showCursor:true,
			cursorChar:"|",
			attr:null
		});	
		
		var typed2 = new Typed('#typed-2', {
			strings: ['a web developer.', 'a web designer.'],
			typeSpeed:45,
			backSpeed:0,
			startDelay:200,
			backDelay:2200,
			loop:true,
			loopCount:false,
			showCursor:true,
			cursorChar:"_",
			attr:null
		});	
		
		
		// Activate Carousel
		
		$('.carousel').carousel({
			interval: false
		});

		// Activate Tooltip
		
		$(".tipped").tipper();

		
		// Activate bootstrapSwitch
		
		$("[name='my-checkbox']").bootstrapSwitch();
	
	
		// Facts Counter 
	
		$('.counter-numb').counterUp({
			delay: 10,
			time: 1000
		});
		
		
		//Parallax
		
		$('.parallax').parallax("50%", 0.3);		
		
		
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
		
		
        // Range Sliders
		
        var slider = document.getElementById('sliderReg');

        noUiSlider.create(slider, {
            start: 27,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDoub');

        noUiSlider.create(slider2, {
            start: [12, 83],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg1');

        noUiSlider.create(slider, {
            start: 75,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDoub1');

        noUiSlider.create(slider2, {
            start: [19, 71],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg2');

        noUiSlider.create(slider, {
            start: 13,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDoub2');

        noUiSlider.create(slider2, {
            start: [7, 45],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg3');

        noUiSlider.create(slider, {
            start: 68,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDoub3');

        noUiSlider.create(slider2, {
            start: [25, 92],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg4');

        noUiSlider.create(slider, {
            start: 43,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDoub4');

        noUiSlider.create(slider2, {
            start: [13, 92],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });
		
        var slider = document.getElementById('sliderReg5');

        noUiSlider.create(slider, {
            start: 32,
            connect: [true, false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDoub5');

        noUiSlider.create(slider2, {
            start: [2, 34],
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg6');

        noUiSlider.create(slider, {
            start: 42,
            connect: [true, false],
			tooltips: [ true ],
            range: {
                min: 0,
                max: 100
            }
        });	

        var slider2 = document.getElementById('sliderDoub6');

        noUiSlider.create(slider2, {
            start: [2, 34],
            connect: true,
			tooltips: [ true, true ],
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg7');

        noUiSlider.create(slider, {
            start: 64,
            connect: [true, false],
			tooltips: [ true ],
            range: {
                min: 0,
                max: 100
            }
        });	

        var slider2 = document.getElementById('sliderDoub7');

        noUiSlider.create(slider2, {
            start: [32, 87],
            connect: true,
			tooltips: [ true, true ],
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg8');

        noUiSlider.create(slider, {
            start: 17,
            connect: [true, false],
			tooltips: [ true ],
            range: {
                min: 0,
                max: 100
            }
        });	

        var slider2 = document.getElementById('sliderDoub8');

        noUiSlider.create(slider2, {
            start: [12, 76],
            connect: true,
			tooltips: [ true, true ],
            range: {
                min: 0,
                max: 100
            }
        });	
		
        var slider = document.getElementById('sliderReg9');

        noUiSlider.create(slider, {
            start: 56,
            connect: [true, false],
			tooltips: [ true ],
            range: {
                min: 0,
                max: 100
            }
        });	

        var slider2 = document.getElementById('sliderDoub9');

        noUiSlider.create(slider2, {
            start: [34, 56],
            connect: true,
			tooltips: [ true, true ],
            range: {
                min: 0,
                max: 100
            }
        });		
		
        var slider = document.getElementById('sliderReg10');

        noUiSlider.create(slider, {
            start: 21,
            connect: [true, false],
			tooltips: [ true ],
            range: {
                min: 0,
                max: 100
            }
        });	

        var slider2 = document.getElementById('sliderDoub10');

        noUiSlider.create(slider2, {
            start: [23, 90],
            connect: true,
			tooltips: [ true, true ],
            range: {
                min: 0,
                max: 100
            }
        });		
		
        var slider = document.getElementById('sliderReg11');

        noUiSlider.create(slider, {
            start: 78,
            connect: [true, false],
			tooltips: [ true ],
            range: {
                min: 0,
                max: 100
            }
        });	

        var slider2 = document.getElementById('sliderDoub11');

        noUiSlider.create(slider2, {
            start: [34, 74],
            connect: true,
			tooltips: [ true, true ],
            range: {
                min: 0,
                max: 100
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