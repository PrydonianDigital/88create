var $j = jQuery.noConflict();

$j(function() {
	$j('header').on('click', '.toggle', function(){
		$j(this).addClass('activated')
		$j('#mobile').addClass('active');
	});
	$j('header').on('click', '.activated', function(){
		$j(this).removeClass('activated')
		$j('#mobile').removeClass('active');
	});
	
	if($j.cookie('legend')) {
		$j('#legend').hide();
	} else {
		$j('#legend #close').on('click', function(e){
			e.preventDefault();
			$j.cookie('legend', 'yes', { expires: 700 });
			$j('#legend').hide();
		});		
	}
	
	if($j.cookie('cookies')) {
		$j('aside').hide();
	} else {
		$j('aside #close').on('click', function(e){
			e.preventDefault();
			$j.cookie('cookies', 'yes', { expires: 700 });
			$j('aside').hide();
		});		
	}

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
	if(element_exists('.reveal')) {
		Reveal.initialize({
			width: 1200,
			touch: true,
			loop: true,
		});
		$j('.roundel').on('click', function(e){
			e.preventDefault();
			var link = $j(this).attr('href');
			Reveal.slide(link,0,0,0)
		});
	}
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
	if (element_exists('body.post-type-archive-work')){ 
		var $width = $j('.portfolio').width();
		$j('.project').height($width);
		$j('.portfolio iframe').width($width);
		$j('.portfolio iframe').sixteenbynine();
		
		var $container = $j('#portfolio');	
		$container.isotope({
			itemSelector: '.portfolio'
		});
		
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $j('.portfolio').width();
			$j('.format-standard').height($width);
			$j('.portfolio iframe').width($width);
			$j('.portfolio iframe').sixteenbynine();
			$container.isotope( 'appended', $j( newElements ) ); 
		});	
				
		var $optionSets = $j('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
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
	if (element_exists('body.blog')){ 
		var $width = $j('.portfolio').width();
		$j('.project').height($width);
		$j('.portfolio iframe').width($width);
		$j('.portfolio iframe').sixteenbynine();
		
		var $container = $j('#portfolio');	
		$container.isotope({
			itemSelector: '.portfolio'
		});
		
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $j('.portfolio').width();
			$j('.project').height($width);
			$j('.portfolio iframe').width($width);
			$j('.portfolio iframe').sixteenbynine();
			$container.isotope( 'appended', $j( newElements ) ); 
		});	
				
		var $optionSets = $j('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
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
	if (element_exists('body.post-type-archive-case_studies')){ 
		var $width = $j('.portfolio').width();
		$j('.portfolio').height($width);
		$j('.portfolio iframe').width($width);
		$j('.portfolio iframe').sixteenbynine();
		
		var $container = $j('#portfolio');	
		$container.isotope({
			itemSelector: '.portfolio'
		});
		
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $j('.portfolio').width();
			$j('.format-standard').height($width);
			$j('.portfolio iframe').width($width);
			$j('.portfolio iframe').sixteenbynine();
			$container.isotope( 'appended', $j( newElements ) ); 
		});	
				
		var $optionSets = $j('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
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
	
	if (element_exists('body.blog')){
		var $container = $j('#portfolio');
		var $width = $j('.category-88create').width();
		$j('.category-88create').height($width);
		$j('.portfolio iframe').width($width);
		$j('.portfolio iframe').sixteenbynine();
		$container.isotope({
			itemSelector: '.portfolio'
		});
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $j('.category-88create').width();
			$j('.category-88create').height($width);
			$j('.category-88create iframe').width($width);
			$j('.category-88create iframe').sixteenbynine();
			$container.isotope( 'appended', $j( newElements ) ); 
		});	
	}
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
			marker:{
				values: [
					{latLng:[51.523803, -0.098877], data: '<h4>88Create</h4><p>88 Goswell Road<br />London<br />EC1V 7DB</p>', options: {
						icon: '/wp-content/themes/88create/img/marker.png'
					}}
				],
				events: {
					mouseover: function(marker, event, context){
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
	$j(window).smartresize(function(){
		if (element_exists('#portfolio')){
			var $width = $j('.type-work').width();
			$j('.format-standard').height($width);
			$j('.type-work iframe').width($width);
			$j('.type-work iframe').sixteenbynine();
			var $container = $j('#portfolio');
			$container.isotope({
				itemSelector: '.type-work',
				layoutMode: 'masonry',
				animationOptions: 'best-available'
			});			
		}  
	});

});

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