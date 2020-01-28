<?php
/**
 * Custom Image Crop Sizes
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'cb_custom_add_image_sizes' );
function cb_custom_add_image_sizes() {
    add_image_size( 'xsmall', 320, 9999 ); // 320px wide unlimited height
    add_image_size( 'small', 450, 9999 ); // 450px wide unlimited height
    add_image_size( 'med-small', 575, 9999 ); // 575px wide unlimited height
    add_image_size( 'medium', 767, 9999 ); // 767px wide unlimited height
    add_image_size( 'med-large', 991, 9999 ); // 991px wide unlimited height
    add_image_size( 'large', 1024, 9999 ); // 1024px wide unlimited height
    add_image_size( 'xlarge', 1200, 9999 ); // 1200px wide unlimited height
    add_image_size( 'xxlarge', 1600, 9999 ); // 1600px wide unlimited height
    add_image_size( 'xxxlarge', 2000, 9999 ); // 2000px wide unlimited height
    add_image_size( 'portfolio_full', 9999, 900 ); // 900px tall unlimited width
}

add_filter( 'image_size_names_choose', 'cb_custom_add_image_size_names' );
function cb_custom_add_image_size_names( $sizes ) {
    return array_merge( $sizes, array(
        'xsmall' => __( 'Extra Small 320w' ),
        'small' => __( 'Small 450w' ),
        'med-small' => __( 'Medium Small 575w' ),
        'medium' => __( 'Medium 767w' ),
        'med-large' => __( 'Medium large 991w' ),
        'large' => __( 'Large 1024w' ),
        'xlarge' => __( 'Extra Large 1200w' ),
        'xxlarge' => __( '2X Large 1600w' ),
        'xxxlarge' => __( '3X Large 2000w' ),
        'portfolio_full' => __( 'Portfolio Full Size' ),
    ) );
}   