<?php
/**
 * Custom Taxonomy
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function cb_add_custom_taxonomies() {

	// Product Categories

	// Labels array
	$labels = array(

		'name'				=> _x( 'Product Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'		=> _x( 'Product Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'		=> __( 'Search Product Categories', 'textdomain' ),
		'all_items'			=> __( 'All Product Categories', 'textdomain' ),
		'parent_item'		=> __( 'Parent Product Category', 'textdomain' ),
		'parent_item_colon'	=> __( 'Parent Product Category:', 'textdomain' ),
		'edit_item'			=> __( 'Edit Product Category', 'textdomain' ),
		'update_item'		=> __( 'Update Product Category', 'textdomain' ),
		'add_new_item'		=> __( 'Add New Product Category', 'textdomain' ),
		'new_item_name'		=> __( 'New Product Category Name', 'textdomain' ),
		'menu_name'			=> __( 'Product Categories', 'textdomain' ),
	);

	// Arguments array

	$args = array(
		'hierarchical'		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'query_var'			=> true,
		'rewrite'			=> array( 'slug' => 'product-categories' ),
	);

	// create taxonomy
	register_taxonomy( 'product-categories', 'products', $args);



	// Add Store Tour taxonomy, NOT hierarchical
	$labels = array(
		'name'                       => _x( 'Store Tour Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Store Tour Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Store Tour Categories', 'textdomain' ),
		'popular_items'              => __( 'Popular Store Tour Categories', 'textdomain' ),
		'all_items'                  => __( 'All Store Tour Categories', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Store Tour Category', 'textdomain' ),
		'update_item'                => __( 'Update Store Tour Category', 'textdomain' ),
		'add_new_item'               => __( 'Add New Store Tour Category', 'textdomain' ),
		'new_item_name'              => __( 'New Store Tour Category', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate store tour categories with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove store tour categories', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used store tour categories', 'textdomain' ),
		'not_found'                  => __( 'No store tour categories found.', 'textdomain' ),
		'menu_name'                  => __( 'Store Tour Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'store tour' ),
	);

	register_taxonomy( 'store-tour-categories', 'store-tour', $args );

}
add_action( 'init', 'cb_add_custom_taxonomies' );



// -----
// force product categories to single hierarchy
// --

function limit_product_hierarchy_depth_wp( $args, $taxonomy ) {

    if ( 'product-categories' != $taxonomy ) return $args; // no change

    $args['depth'] = '1';

    return $args;
}

add_filter( 'taxonomy_parent_dropdown_args', 'limit_product_hierarchy_depth_wp', 10, 2 );



// -----
// limit in ACF as well
// --

function limit_product_hierarchy_depth_acf( $args, $field ) {
	// Only limit product categories
	if ( $field['name'] != 'product_categories' ) {
		return $args;
	}
	$args['depth'] = '2';
	return $args;

}

add_filter('acf/fields/taxonomy/wp_list_categories', 'limit_product_hierarchy_depth_acf', 10, 2);