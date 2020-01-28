<?php
/**
 * Template part for displaying page content in front-page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
 
<section id="logo-slider" class="container">
	<div id="brand-carousel" class="owl-carousel logo-slider">
		<?php 
		// check for content in primary categories
		if( have_rows( 'brand_logos' )): 
			while( have_rows( 'brand_logos' )) : the_row(); 
				$logo 			= get_sub_field( 'logo_image' );
				$image_srcset 	= wp_get_attachment_image_srcset( $logo, 'large' );
				$image_url 		= wp_get_attachment_image_url( $logo, 'med' );
				$alt			= get_post_meta( $logo, '_wp_attachment_image_alt', true );
		?>

			<div class="brand-logo">
				<img
					src="<?php echo esc_attr($image_url); ?>"
					srcset="<?php echo esc_attr($image_srcset); ?>"
					sizes="30vw"
					alt="<?php echo esc_attr( $alt ); ?>"
				>
			</div>
			
		<?php 
			endwhile;		
		endif; 
		?>
	</div>
</section>
	