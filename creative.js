/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

// return focus rings to selectable elements if user presses the "tab" key
// for accessibility
function handleFirstTab(e) {
    if (e.keyCode === 9) { // if user uses the "tab" key
        document.body.classList.add('user-is-tabbing');
        window.removeEventListener('keydown', handleFirstTab);
    }
}

window.addEventListener('keydown', handleFirstTab);



jQuery(document).ready(function($) {

	var $body = $('body');
	
	// check if is homepage
	if( $body.hasClass('home') ){

		// Hero Owl Carousel
		var $heroCarousel = $('#hero-carousel');
		//include owl carousel
		$heroCarousel.owlCarousel({
			autoplay: true,
			autoplayTimeout: 10000,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			center: true,
			items: 1,
			loop: true,
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
		});

		// Isotope
		//Front Page Primary Categories Section
		var $categoryGrid = $('.category-grid');
		$categoryGrid.isotope({
			itemSelector: '.fp-category-item',
			masonry: {
				columnWidth: '.fp-grid-sizer'
			},
			percentPosition: true,
		});// end frontpage GALLERIES function

		// Front Page Brand Owl Carousel
		var $brandCarousel = $('#brand-carousel');
		$brandCarousel.owlCarousel({
			responsive: {
				0: {
					items: 2,
					slideBy: 2,
					margin: 50,
				},
				768: {
					center: true,
					items: 3,
					slideBy: 3,
					margin: 150,
				},
				992: {
					items: 3,
					slideBy: 3,
					margin: 200,
				},
				1200: {
					items: 4,
					slideBy: 4,
					margin: 150,
				},
			},
			loop: true,
			autoplay: true,
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
		});//Front Page Brand Carousel

		// Front Page Featured Products
		var $featuredCarousel = $('#featured-carousel');
		$featuredCarousel.owlCarousel({
			autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			center: true,
			items: 1,
			lazyLoad: true,
			loop: true,
			mouseDrag: true,
			nav: true,
			navText : [ '<svg class="svg-chevron"><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/></svg>',
						'<svg class="svg-chevron"><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/></svg>'],
			touchDrag: true,
		});

		// Front Page parallax - not currently in use
		//var $parallaxContainer 	= $( '#fp-parallax' );
		//	$parallaxItem		= $( '>.parallax-image' );
		//$( '#fp-parallax' ).parallax({
		//	speed: .2,
		//	sliderSelector: '>.parallax-image',
		//});
		//// Reinitialize parallax when screen width changes
		//$( window ).resize( function() {
			//// kill current to prevent duplicates
			//$( '#fp-parallax' ).parallax( 'destroy' );
			//$( '#fp-parallax' ).parallax({
			//	speed: .2,
			//	sliderSelector: '>.parallax-image',
		//	});
		//} );

	} // End Home Functions

	//Store Tour Page
	if( $body.hasClass('post-type-archive-store-tour') || $body.hasClass( 'page-template-page-store-tour' ) ) {
		// Store Tour isotope gallery tiles
		var $tourGallery = $('#store-tour-gallery').isotope({
			itemSelector: '.tour-tile',
			percentPosition: true,
			stagger: 10,
			layoutMode: 'fitRows',
		});

		// remove overlay after isotope init
		$('.page-loading-overlay').fadeOut(1000);

		// filter tour tiles on menu-item click
		var $tourMenuColumn = $( '#st-menu-column' );
		var	$categoryFilter = $( '.category-filter' );
		// retrieve category info from clicked item and 
		// set all relative isotope tiles to active using 
		// the custom WP taxonomies
		$tourMenuColumn.on( 'click', 'li', function() {
			$categoryFilter.removeClass( 'active' );
			$(this).addClass( 'active' );
			var filterValue = $(this).attr('data-filter');
			$tourGallery.isotope({ filter: filterValue });
		});

		// Store Tour featherlight gallery
		$('a.tour-tile-anchor').featherlightGallery({
			targetAttr: 'href',
			previousIcon: '<div class="tour-prev"><svg class="svg-chevron"><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/></svg></div>',
			nextIcon: '<div class="tour-next"><svg class="svg-chevron"><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/></svg></div>',
		});

		// Add "floating-menu" class to select objects when the category menu toggle is clicked
		// toggles mobile category menu on and off
		var $tourMenuToggle = $( '.gallery-menu-toggle' );
			$tourMenuColumn = $( '#st-menu-column' );
			$tourContent 	= $( '#store-tour-page' );
	
		$tourMenuToggle.click(function() {
			$tourMenuColumn.toggleClass( 'floating-menu' );
			$tourContent.toggleClass( 'floating-menu' );
			if ($tourContent.hasClass( 'no-height' )) {
				$tourContent.removeClass( 'no-height' );
			}
			else {
				//queue the removal of height to wait until transition finishes
				$tourContent.delay( 300 ).queue( function(){
					$tourContent.addClass( 'no-height' ).dequeue();
				});
			}
		});
	}

	//Products Archive Page (all products)

	// checks if current page is Product Archive
	if( $body.hasClass( 'post-type-archive-products' ) ) {
		
		// clean url path if linked from Frontpage Primary/Secondary Categories
		function removeHash () { 
			history.pushState("", document.title, window.location.pathname + window.location.search);
		}

		// retrieve hash from url
		function getHashFilter() {
			var matches = location.hash.match( /filter=([^&]+)/i );
			var $catID = '';
			var hashFilter = matches && matches[1];
			removeHash();
			if(!matches){ $catID = '*'}
				else{$catID = matches[1]}
			$( '.category-filter[data-filter="' + $catID + '"]' ).addClass( 'active' );
			return hashFilter;
		}
		
		// get hash then remove from url when page loads
		var hashFilter = getHashFilter();

		// Init Store Products isotope gallery
		var $productsGallery = $( '#products-archive-gallery' ).isotope({
			itemSelector: '.product-tile',
			filter: hashFilter,
			layoutMode: 'fitRows',
			percentPosition: true,
			stagger: 10,
		});

		// Show no items message only if the category from Front Page link hash contains no items
		var noItemsMessage = $('#no-items-message');
		var numItems = $('.product-tile:visible').length;
		if (numItems == 0) {
			noItemsMessage.show();
		}

		// waits till isotope gallery loads, then reveals gallery
		$('.page-loading-overlay').fadeOut(1000);

		// filter items on menu-item click using custom WP category ids
		var $productsMenuColumn = $( '#products-archive-menu-column' );
		var	$categoryFilter 		= $( '.category-filter' );
		$productsMenuColumn.on( 'click', '.category-filter', function() {
			var filterValue = $(this).attr('data-filter');
			$categoryFilter.removeClass( 'active' );
			$(this).addClass( 'active' );
			noItemsMessage.hide();
			$productsGallery.isotope({ filter: filterValue });
		});

		// Add "floating-menu" class to select objects when the category menu title is clicked
		// Mobile category menu toggle functionality
		var $productsMenuToggle = $( '.gallery-menu-toggle' );
			$productsContent = $( '#products-archive-page' );
	
		$productsMenuToggle.click(function() {
			$productsMenuColumn.toggleClass( 'floating-menu' );
			$productsContent.toggleClass( 'floating-menu' );
			if ($productsContent.hasClass( 'no-height' )) {
				$productsContent.removeClass( 'no-height' );
			}
			else {
				//queue the removal of height to wait until transition finishes
				$productsContent.delay( 300 ).queue( function(){
					$productsContent.addClass( 'no-height' ).dequeue();
				});
			}
		});
	}

	//Products Single Page
	if( $body.hasClass('single-products') ) {
		
		var $galleryContainer 	= $( '.single-gallery-grid' ),
			$imageVariants		= $( '.single-image-wrapper' ),
			$imageMenu 			= $( '.thumbnail-menu' );

		// gallery works by hiding all images except active image
		// page loads with first image active. Flex is used for dynamic image
		// sizing. one-size-fits all.
		$imageVariants.css( "display", "flex" ).hide();
		$( '.single-image-wrapper.current' ).css( "display", "flex" );

		//Create function for determining which zoom plugin to use based on screen size
		$.fn.chooseZoomPlugin = function() {
			// return this.css('justify-content') == 'center';
			// fires appropriate zoom js at major media query at 768px based on column layout
			// check for screen size based on css media query breakpoints
			$currentImage = $( '.single-image-wrapper.current' );
			if ( this.css('justify-content') == 'center' ) { //mobile
				// search for src image to be used as zoom
				$bigImage = $currentImage.find( 'img' ).attr( 'src' );
				$currentImage.zoom({
					url: $bigImage,
					on: 'toggle',
				});
			}else {
				// Instantiate EasyZoom instances
				var $zoomed = $currentImage.easyZoom();
			}
		}

		// Check and intialize immediately upon page load
		$galleryContainer.chooseZoomPlugin();	
		
		// Clean HTML when window resizes to prevent duplicates
		// $.fn.cleanObject = function(className) {
		// 	this.children().not(className).remove();
		// }

		// Recheck and reinitialize on window resize
		$( window ).resize( function() {
			// $currentImage.cleanObject( '.product-image-sizer' );
			$galleryContainer.chooseZoomPlugin();
		} );

		// 
		$imageMenu.on( 'click', 'img', function(){
			$imgSelector = $(this).data( 'variant' );
			$imageVariants.hide( 0 );
			$whichClass = '.' + $imgSelector;
			$imageVariants.removeClass( 'current' );
			$currentImage = $imageVariants.filter($whichClass).addClass( 'current' )
				// give it display flex, then hide, then fade in
				.css( "display", "flex" ).hide().fadeIn();
			// Also reinitalize zooms now that the photo changed
			$galleryContainer.chooseZoomPlugin();
		});	
	} // end if products page

}); // end document.ready()