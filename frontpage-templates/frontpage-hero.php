<?php
/**
 * Template part for displaying page content in front-page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<section id="hero">
	<div id="hero-carousel" class="owl-carousel owl-theme cb-hero-slider">
		<?php 
			if( have_rows( 'hero_images' )): 
				while ( have_rows( 'hero_images' ) ) : the_row();
			
				// get text overlay details
				$image			= get_sub_field( 'image' );	
				$text 			= get_sub_field( 'image_text' );
				$position 		= get_sub_field( 'text_position' );
				$overlay_color 	= get_sub_field( 'text_background_color' );

				// get srcset and image attributes
				$image_srcset	= wp_get_attachment_image_srcset( $image, 'x-large' );
				$image_url 		= wp_get_attachment_image_url( $image, 'large' );
				$alt			= get_post_meta( $image, '_wp_attachment_image_alt', true );
		?>
		<div class="hero-image-wrapper"> 
			<img
				id="hero-image"
				src="<?php echo esc_attr($image_url); ?>"
				srcset="<?php echo esc_attr($image_srcset); ?>"
				sizes="100vw"
				alt="<?php echo esc_attr( $alt ) ?>"
			>
			<div class="hero-text hero-text-<?php echo esc_attr( $position ); ?> hero-<?php echo esc_attr( $overlay_color ); ?>">
				<?php echo esc_html( $text ); ?>
			</div>
		</div>

		<?php 
				endwhile; 
			endif; 
		?>
	</div>
</section>
	