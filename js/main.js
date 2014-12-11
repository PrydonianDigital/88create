$(function() {
	$('header').on('click', '.toggle', function(){
		$(this).addClass('activated')
		$('#mobile').addClass('active');
	});
	$('header').on('click', '.activated', function(){
		$(this).removeClass('activated')
		$('#mobile').removeClass('active');
	});
	
	if($.cookie('legend')) {
		$('#legend').hide();
	} else {
		$('#legend #close').on('click', function(e){
			e.preventDefault();
			$.cookie('legend', 'yes', { expires: 700 });
			$('#legend').hide();
		});		
	}
	
	if($.cookie('cookies')) {
		$('aside').hide();
	} else {
		$('aside #close').on('click', function(e){
			e.preventDefault();
			$.cookie('cookies', 'yes', { expires: 700 });
			$('aside').hide();
		});		
	}

	var $timeline_block = $('.cd-timeline-block');
	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});
	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
	if(element_exists('.reveal')) {
		Reveal.initialize({
			width: 1200,
			touch: true,
			loop: true,
		});
		$('.roundel').on('click', function(e){
			e.preventDefault();
			var link = $(this).attr('href');
			Reveal.slide(link,0,0,0)
		});
	}
	if (element_exists('.rollover')){
		var $width = $('.rollover').width();
		$('.rollover').height($width);
	}
	if (element_exists('.mobileRollover')){
		var $width = $('.mobileRollover').width();
		$('.mobileRollover').height($width);
	}
	if (element_exists('body.single')){
		var $width = $('.col-1-1').width();	
		$('.col-1-1 iframe').width($width);
		$('.col-1-1 iframe').sixteenbynine();
	} 
	if (element_exists('body.post-type-archive-work')){ 
		var $width = $('.portfolio').width();
		$('.project').height($width);
		$('.portfolio iframe').width($width);
		$('.portfolio iframe').sixteenbynine();
		
		var $container = $('#portfolio');	
		$container.isotope({
			itemSelector: '.portfolio'
		});
		
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $('.portfolio').width();
			$('.format-standard').height($width);
			$('.portfolio iframe').width($width);
			$('.portfolio iframe').sixteenbynine();
			$container.isotope( 'appended', $( newElements ) ); 
		});	
				
		var $optionSets = $('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
			var $this = $(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('#filters');
			$optionSets.find('.selected').removeClass('selected');
			$this.addClass('selected');
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
	}
	if (element_exists('body.blog')){ 
		var $width = $('.portfolio').width();
		$('.project').height($width);
		$('.portfolio iframe').width($width);
		$('.portfolio iframe').sixteenbynine();
		
		var $container = $('#portfolio');	
		$container.isotope({
			itemSelector: '.portfolio'
		});
		
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $('.portfolio').width();
			$('.project').height($width);
			$('.portfolio iframe').width($width);
			$('.portfolio iframe').sixteenbynine();
			$container.isotope( 'appended', $( newElements ) ); 
		});	
				
		var $optionSets = $('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
			var $this = $(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('#filters');
			$optionSets.find('.selected').removeClass('selected');
			$this.addClass('selected');
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
	}
	if (element_exists('body.post-type-archive-case_studies')){ 
		var $width = $('.portfolio').width();
		$('.portfolio').height($width);
		$('.portfolio iframe').width($width);
		$('.portfolio iframe').sixteenbynine();
		
		var $container = $('#portfolio');	
		$container.isotope({
			itemSelector: '.portfolio'
		});
		
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $('.portfolio').width();
			$('.format-standard').height($width);
			$('.portfolio iframe').width($width);
			$('.portfolio iframe').sixteenbynine();
			$container.isotope( 'appended', $( newElements ) ); 
		});	
				
		var $optionSets = $('#filters'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
			var $this = $(this);
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('#filters');
			$optionSets.find('.selected').removeClass('selected');
			$this.addClass('selected');
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
	}
	
	if (element_exists('body.blog')){
		var $container = $('#portfolio');
		var $width = $('.category-88create').width();
		$('.category-88create').height($width);
		$('.portfolio iframe').width($width);
		$('.portfolio iframe').sixteenbynine();
		$container.isotope({
			itemSelector: '.portfolio'
		});
		$container.infinitescroll({
			navSelector: '.navigation',
			nextSelector: '.alignright a',
			itemSelector: '#portfolio .portfolio'
		},
		function( newElements ) {
			var $width = $('.category-88create').width();
			$('.category-88create').height($width);
			$('.category-88create iframe').width($width);
			$('.category-88create iframe').sixteenbynine();
			$container.isotope( 'appended', $( newElements ) ); 
		});	
	}
	if (element_exists('#map')){ 
		$("#map").gmap3({
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
						var map = $(this).gmap3('get'),
						infowindow = $(this).gmap3({get:{name:"infowindow"}});
						if (infowindow) {
							infowindow.open(map, marker);
							infowindow.setContent(context.data);
						} else {
							$(this).gmap3({
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
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
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
		$back_to_top = $('.cd-top');
	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	$(window).smartresize(function(){
		if (element_exists('#portfolio')){
			var $width = $('.type-work').width();
			$('.format-standard').height($width);
			$('.type-work iframe').width($width);
			$('.type-work iframe').sixteenbynine();
			var $container = $('#portfolio');
			$container.isotope({
				itemSelector: '.type-work',
				layoutMode: 'masonry',
				animationOptions: 'best-available'
			});			
		}  
	});

});

function element_exists(id){
	if($(id).length > 0){
		return true;
	}
	return false;
}

(function($){
	$.fn.sixteenbynine=function(){
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