var $j = jQuery.noConflict();

$j(function() {
	//mobile toggle
	$j('header').on('click', '.toggle', function(){
		$j(this).addClass('activated')
		$j('#mobile').addClass('active');
	});
	$j('header').on('click', '.activated', function(){
		$j(this).removeClass('activated')
		$j('#mobile').removeClass('active');
	});
	
	// legend
	if($j.cookie('legend')) {
		$j('#legend').hide();
	} else {
		$j('#legend').show();
		$j('#legend #close').on('click', function(e){
			e.preventDefault();
			$j.cookie('legend', 'yes', { expires: 700, path: '/' });
			$j('#legend').hide();
		});		
	}
	// cookie
	if($j.cookie('cookies')) {
		$j('aside').hide();
	} else {
		$j('aside #close').on('click', function(e){
			e.preventDefault();
			$j.cookie('cookies', 'yes', { expires: 700, path: '/'  });
			$j('aside').hide();
		});		
	}
	
	// timeline
	var $timeline_block = $j('.cd-timeline-block');
	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($j(this).offset().top > $j(window).scrollTop()+$j(window).height()*0.75) {
			$j(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});
	
	//on scolling, show/animate timeline blocks when enter the viewport
	$j(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $j(this).offset().top <= $j(window).scrollTop()+$j(window).height()*0.75 && $j(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$j(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});

	if(element_exists('.workRoundel')) {
		(function fadeInDiv(){
		    var divs = $j('.workRoundel');
		    var divsize = (250).toFixed(),
		    	container = $j('.workRoundelContainer'),
		    	posx = (Math.random() * (container.width() - divsize)).toFixed(),
		    	posy = (Math.random() * (container.height() - divsize)).toFixed(),
		    	elem = divs.eq(Math.floor(Math.random()*divs.length));
		    if (!elem.is(':visible')){
		        elem.fadeIn((2000),fadeInDiv);
		        elem.css({
		            'left':posx+'px',
		            'top':posy+'px',
		        });
		    } else {
		        elem.fadeOut((2000),fadeInDiv); 
		    }
		})();
	}
	
	// people 
	if(element_exists('#people')) {
		$j('.person a').on('click', function(e){
			e.preventDefault();
			$j('#contact').show();
		});
		$j('#contact #close').on('click', function(e){
			e.preventDefault();
			$j('#contact').hide();
		});
	}
	
	// skills
	if(element_exists('.reveal')) {
		Reveal.initialize({
			width: 1200,
			touch: true,
			loop: false,
			backgroundTransition: 'none', // default/none/slide/concave/convex/zoom
		});
		$j('.roundel').on('click', function(e){
			e.preventDefault();
			var link = $j(this).attr('href');
			Reveal.slide(link,0,0,0)
		});
		$j('.home .reveal .controls').css('display', 'none');
	}
	
	// rollovers
	if (element_exists('.rollover')){
		var $width = $j('.rollover').width();
		$j('.rollover').height($width);
	}
	if (element_exists('.mobileRollover')){
		var $width = $j('.mobileRollover').width();
		$j('.mobileRollover').height($width);
	}
	if (element_exists('body.single')){
		var $width = $j('.col-1-1').width();	
		$j('.col-1-1 iframe').width($width);
		$j('.col-1-1 iframe').sixteenbynine();
	} 
	
	// masonry
	if (element_exists('#portfolio')){ 
		var $width = $j('.portfolio').width(),
			$vidWidth = $j('.format-video').width();
		$j('.portfolio:not(.format-video, .category-twitter)').height($width);
		$j('.format-video iframe').width($vidWidth);
		$j('.format-video iframe').sixteenbynine();
		
		var $container = $j('#portfolio'),
			$imgs = $j('#portfolio img.lazy');	
			
		$imgs.lazyload();
		
		$container.isotope({
			itemSelector: '.status-publish'
		});
		
		$imgs.lazyload({
        	failure_limit: Math.max($imgs.length - 1, 0)
        });	
				
		var $optionSets = $j('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
			$j('img.lazy').trigger('appear');
			var $this = $j(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('#filters');
			$optionSets.find('.selected').removeClass('selected');
			$this.addClass('selected');
			var selector = $j(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
	}

	// map
	if (element_exists('#map')){ 
		$j("#map").gmap3({
			map:{
				options:{
					center:[51.523803, -0.098877],
					zoom: 16,
					disableDefaultUI: true,
					mapTypeId: google.maps.MapTypeId.ROADMAP,

				}
			},
			infowindow:{
				latLng:[51.52419, -0.098877],
				options:{
					content: '<div style="width: 160px; height: 140px;" itemscope itemtype="http://schema.org/LocalBusiness"><h4 itemprop="name"><a itemprop="url" href="http://88create.london">88Create</a></h4><p><span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">88 Goswell Road</span><br /><span itemprop="addressLocality">London</span><br /><span itemprop="postalCode">EC1V 7DB</span><br /><a href="tel:+442072518617">+44 (0)20 7251 8617</a></p></div>>'
				},
				events:{
					closeclick: function(infowindow){}
			}
			},
			marker:{
				values: [
					{latLng:[51.523803, -0.098877], data: '<div style="width: 160px; height: 140px;" itemscope itemtype="http://schema.org/LocalBusiness"><h4 itemprop="name"><a itemprop="url" href="http://88create.london">88Create</a></h4><p><span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">88 Goswell Road</span><br /><span itemprop="addressLocality">London</span><br /><span itemprop="postalCode">EC1V 7DB</span><br /><a href="tel:+442072518617">+44 (0)20 7251 8617</a></p></div>', options: {
						icon: '/wp-content/themes/88create/img/marker.png'
					}}
				],
				events: {
					click: function(marker, event, context){
						var map = $j(this).gmap3('get'),
						infowindow = $j(this).gmap3({get:{name:"infowindow"}});
						if (infowindow) {
							infowindow.open(map, marker);
							infowindow.setContent(context.data);
						} else {
							$j(this).gmap3({
								infowindow: {
									anchor: marker,
									options:{content: context.data}
								}
							});
						}		
					}
				}
			}
		});
	}
	
	// smooth scroll
	$j('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $j(this.hash);
			target = target.length ? target : $j('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$j('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $j('.cd-top');
	//hide or show the "back to top" link
	$j(window).scroll(function(){
		( $j(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $j(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$j('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	
	// on resize
	$j(window).smartresize(function(){
		if (element_exists('#portfolio')){
			var $width = $j('.portfolio').width(),
				$vidWidth = $j('.format-video').width();
			$j('.portfolio:not(.format-video, .category-twitter)').height($width);
			$j('.format-video iframe').width($vidWidth);
			$j('.format-video iframe').sixteenbynine();
			var $container = $j('#portfolio');
			$container.isotope({
				itemSelector: '.status-publish',
				layoutMode: 'masonry',
				animationOptions: 'best-available'
			});			
		}  
	});

});

//functions
function element_exists(id){
	if($j(id).length > 0){
		return true;
	}
	return false;
}

(function($){
	$j.fn.sixteenbynine=function(){
		var width=this.width();
		this.height(width*9/16);
	};
})(jQuery);

(function($,sr){
	var debounce = function (func, threshold, execAsap) {
		var timeout;
		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
				if (!execAsap)
				func.apply(obj, args);
				timeout = null;
			};
			if (timeout)
			clearTimeout(timeout);
			else if (execAsap)
			func.apply(obj, args);
			timeout = setTimeout(delayed, threshold || 100);
		};
	}
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
})(jQuery,'smartresize');
;(function(e){e.fn.visible=function(t,n,r){var i=e(this).eq(0),s=i.get(0),o=e(window),u=o.scrollTop(),a=u+o.height(),f=o.scrollLeft(),l=f+o.width(),c=i.offset().top,h=c+i.height(),p=i.offset().left,d=p+i.width(),v=t===true?h:c,m=t===true?c:h,g=t===true?d:p,y=t===true?p:d,b=n===true?s.offsetWidth*s.offsetHeight:true,r=r?r:"both";if(r==="both")return!!b&&m<=a&&v>=u&&y<=l&&g>=f;else if(r==="vertical")return!!b&&m<=a&&v>=u;else if(r==="horizontal")return!!b&&y<=l&&g>=f}})(jQuery);