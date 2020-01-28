<?php 
/**
 * Understrap child theme enqueue scripts
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function cb_theme_scripts() {

	// Featherlight Stylesheet
	wp_enqueue_style( 'featherlight-styles', get_stylesheet_directory_uri() . '/lib/Featherlight/featherlight.min.css', array(), '1.7.13' );
	// Featherlight Gallery Stylesheet
	wp_enqueue_style( 'featherlight-gallery-styles', get_stylesheet_directory_uri() . '/lib/Featherlight/featherlight.gallery.min.css', array(), '1.7.13' );
	
	// creative custom styling and scripts
	wp_enqueue_style( 'creative-styles',
		get_stylesheet_directory_uri() . '/css/style-creative.css', array(), 1 );

	// Owl Carousel
	wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.carousel.min.css', array(), true );
	// default Owl Carousel e.g. nav buttons
	wp_enqueue_style( 'owl-theme-style', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.theme.default.min.css', array(), true );
	wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.carousel.min.js', array('jquery'), true );

	// Isotope library & Images loaded library
	wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array(), '3.0.6' );
	wp_enqueue_script( 'images-loaded-js', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4'  );

	// Parallax JS
	wp_enqueue_script( 'parallax-js', get_stylesheet_directory_uri() . '/lib/Parallax/jquery.parallax.min.js', array( 'jquery' ), '2.0.0' );

	// Featherlight JS
	wp_enqueue_script( 'j-swipe', get_stylesheet_directory_uri() . '/lib/Featherlight/jquery.detect_swipe.js', array('jquery'), '2.1.3' );
	wp_enqueue_script( 'featherlight-js', get_stylesheet_directory_uri() . '/lib/Featherlight/featherlight.min.js', array('jquery'), '1.7.13' );
	// Featherlight gallery JS
	wp_enqueue_script( 'featherlight-gallery-js', get_stylesheet_directory_uri() . '/lib/Featherlight/featherlight.gallery.min.js', array('jquery', 'j-swipe'), '1.7.13' );

	// EasyZoom
	wp_enqueue_style( 'ezzoom-style', get_stylesheet_directory_uri() . '/lib/EasyZoom/css/easyzoom.css', array(), '2.5.2' );
	wp_enqueue_script( 'ezzoom-js', get_stylesheet_directory_uri() . '/lib/EasyZoom/dist/easyzoom.js', array('jquery'), '2.5.2' );

	// Jack Zoom
	wp_enqueue_script( 'jack-zoom', get_stylesheet_directory_uri() . '/lib/Zoom/jquery.zoom.min.js', array('jquery'), '1.7.21' );

	// custom javascript
	wp_enqueue_script( 'creative-js', get_stylesheet_directory_uri() . '/js/creative.js', array( 'jquery' ), true );
}

add_action( 'wp_enqueue_scripts', 'cb_theme_scripts' );


// Admin
function cb_enqueue_admin_style() {

	// Update CSS within in Admin
	wp_enqueue_style( 'style-admin', get_stylesheet_directory_uri() . '/style-admin.css', array(), '1.0' );

}
add_action('admin_enqueue_scripts', 'cb_enqueue_admin_style');