(function ($) {
  "use strict";

	$(document).on('clotyaShopPageInit', function () {
		clotyaThemeModule.sidebarfilter();
	});

	clotyaThemeModule.sidebarfilter = function() {
      var sidebar = $( '.filtered-sidebar' );
	  
	  if ( sidebar.length > 0 ) {
		  var button = $( '.filter-button' );
		  var siteOverlay = $( '.site-mask' );
		  var close = $( '.close-sidebar, .site-mask' );

		  

		  var tl = gsap.timeline( { paused: true, reversed: true } );
		  tl.set( sidebar, {
			autoAlpha: 1
		  }).to( sidebar, .5, {
			x:0,
					ease: 'power4.inOut'
		  }).to( siteOverlay, .5, {
			autoAlpha: 1,
			ease: 'power4.inOut'
		  }, "-=.5");

		  button.on( 'click', function(e) {
			  e.preventDefault();
			  siteOverlay.addClass( 'active' );
			  tl.reversed() ? tl.play() : tl.reverse();
		 });

		  close.on( 'click', function(e) {
			e.preventDefault();
			tl.reverse();
			setTimeout( function() {
			  siteOverlay.removeClass( 'active' );
			}, 1000);
		  });
		  

	  }
	}
	$(document).ready(function() {
		clotyaThemeModule.sidebarfilter();
	});

})(jQuery);
