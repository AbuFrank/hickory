<?php
/**
 * Template part for displaying About Section in front-page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<section id="fp-about" class="container">
	<div class="row">
		<div class="col-lg-5">
				<div class="about-content-block">
					<div class="about-content-wrapper">
					<?php
						// retrieve About content from ACF
						$aboutTitle = get_sub_field( 'about_title' );
						$aboutText = get_sub_field( 'about_text' );
						$aboutButton = get_sub_field( 'about_button' );
						if(!$aboutButton){ $aboutButton = "Read More"; }
					?>
					<p>
						<span class="fp-about-title">
							<?php 
								echo esc_html( $aboutTitle );
							?>
						</span>
						<span class="fp-about-text">
							<?php
								echo $aboutText;
							?>
						</span>
					</p>
					<!-- Button link takes user to About Us page -->
					<div class="about-button-wrapper">
						<a href="<?php echo home_url(); ?>/our-story">
							<button type="button" class="btn cb-button-primary"><?php echo esc_html( $aboutButton ); ?></button>
						</a>
					</div>
				</div><!-- .about-content-wrapper -->
			</div><!-- .about-content-block -->
		</div><!-- .col -->
		<div class="col-lg-7">
			<div class="about-image-block">
				<?php 
				// check for content in primary categories
					$aboutImage 	= get_sub_field( 'about_image' );
					$image_srcset = wp_get_attachment_image_srcset( $aboutImage, 'xxxlarge' );
					$image_url 		= wp_get_attachment_image_url( $aboutImage, 'xlarge' );
					$alt					= get_post_meta( $aboutImage, '_wp_attachment_image_alt', true );
				?>
				<div id="fp-about-image">
					<img
						src="<?php echo esc_attr($image_url); ?>"
						srcset="<?php echo esc_attr($image_srcset); ?>"
						sizes="(min-width: 768px) 50vw, 100vw"
						alt="<?php echo esc_attr( $alt ); ?>"
					/>
				</div><!-- .fp-about-image -->
			</div><!-- .about-image-block -->
		</div><!-- .col -->
	</div><!-- .row -->
</section><!-- .container -->