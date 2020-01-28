<?php
/**
 * ACF post type setup
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Custom post types function 
function create_custom_post_types(){

	// Create individual products
	register_post_type('products',
		array(
		'labels' => array(
			'name' => __('Store Products'),
			'singular_name' => __('Product'),
			),
		'public' => true,
		'has_archive' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array (
			'slug' => 'store-products'
			),
		)
	);

	// Create individual products
	register_post_type('store-tour',
		array(
		'labels' => array(
			'name' => __('Store Tour'),
			'singular_name' => __('Store Tour'),
			),
		'public' => true,
		'has_archive' => true,
		'show_in_nav_menus' => true,
		'supports' => array( 
			'title', 
			'editor', 
			'thumbnail' 
			),
		'rewrite' => array (
			'slug' => 'store-tour'
			),
		)
	);
	
}

// Hook this custom posts types function into the theme
add_action('init', 'create_custom_post_types');


// Add ACF Options
if( function_exists('acf_add_options_page') ) {

	// Store Hours
	$option_page = acf_add_options_page(array(
		'page_title'	  => 'Store Hours',
		'position'		  => '51.3',
		'icon_url'		  => 'dashicons-calendar-alt',
		'updated_message' => __("Store Hours Updated", 'acf'),
		'update_button'	  => __("Update Hours", 'acf'),
		'redirect'		  => false,
	));
 
	// Store Tour Options
	$option_page = acf_add_options_page(array(
		'page_title'	  => 'Store Tour Options',
		'position'		  => '35.3',
		'updated_message' => __("Store Tour Options Updated", 'acf'),
		'update_button'	  => __("Update Store Tour Options", 'acf'),
		'redirect'		  => false,
	));
 
}

// Customize specific post queries
function cb_custom_query_function( $query ) {
    
    // return if admin or query is blogs
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    // set post per page to 50 for store tour
    if ( is_post_type_archive( 'store-tour' ) 
    	|| is_post_type_archive( 'products' ) ) {
       $query->set( 'posts_per_page', 50 );
    }
}
add_filter( 'pre_get_posts', 'cb_custom_query_function' );