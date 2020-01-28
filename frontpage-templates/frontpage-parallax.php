<?php
/**
 * Template part for displaying Parallax Section in front-page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<section id="fp-parallax">
	<div class="parallax-image">
		<?php 
		// check for content in Parallax section
			$aboutImage 	= get_sub_field( 'parallax_image' );
			$image_srcset 	= wp_get_attachment_image_srcset( $aboutImage, 'xxxlarge' );
			$image_url 		= wp_get_attachment_image_url( $aboutImage, 'xlarge' );
			$alt			= get_post_meta( $aboutImage, '_wp_attachment_image_alt', true );
		?>
		<img
			id="parallax-image"
			src="<?php echo esc_attr($image_url); ?>"
			srcset="<?php echo esc_attr($image_srcset); ?>"
			sizes="100vw"
			alt="<?php echo esc_attr( $alt ); ?>"
		/>
	</div><!-- .parallax-image -->
	<div class="static-text">
		<?php if ( have_rows( 'testimonials' ) ):
			while ( have_rows( 'testimonials' ) ): the_row();
			?>

			<?php
				// retrieve testimonial text
				$testimonialText = get_sub_field( 'text_area' );
				$testimonialPerson = get_sub_field( 'person' );
			?>
			<div class="testimonial-block container">
				<p><?php echo esc_html( $testimonialText ); ?></p>
				<p><?php echo esc_html( $testimonialPerson ); ?></p>
			</div>
		<?php endwhile; endif;?>
	</div><!-- .static-text -->
</section><!-- #fp-parallax -->