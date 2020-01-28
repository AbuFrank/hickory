<?php
/**
 * Template Name: Store Tour
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>
<div id="store-tour-page" class="container-fluid no-height">
	<div id="st-content-wrapper" class="row">
	
		<?php 
			// insert template part with store tour categories menu
			get_template_part( 'sidebar-templates/sidebar', 'store-tour' );  
		?>
		
		<div id="st-gallery-column" class="col-md-9 col-xl-10">
			<section id="store-tour-gallery">
				<div class="tour-tile-sizer"></div>
				<?php
					if( have_rows('store_tour') ):
						$num = 0;
						while( have_rows('store_tour') ): the_row();
							$tour_title = get_sub_field( 'title' );
							$tour_img = get_sub_field( 'image' );
							$tour_text = get_sub_field( 'description' );
							$tour_categories = get_sub_field( 'category' );
							//srcset
							$image_srcset = wp_get_attachment_image_srcset($tour_img,'xlarge');
							$image_url = wp_get_attachment_image_url( $tour_img, "med-large" );
							$img_alt = get_post_meta( $tour_img, '_wp_attachment_image_alt', true);
				?>
					<?php 
						if( $image_url ): ?>
						<!-- Gallery View of Image -->
						<div class="tour-tile">
							<a href="#featherlight-tile-<?php echo $num ?>" class="tour-tile-anchor" data-featherlight>
								<div class="tile-image-wrapper">
									<div class="image-flex-frame">
										<img 
											src= "<?php echo esc_attr( $image_url ); ?>" 
											srcset = "<?php echo esc_attr( $image_srcset ); ?>"
											sizes = "(min-width: 1200px) 25vw, (min-width: 768px) 33vw, 100vw"
											alt = "<?php echo $image_alt; ?>"
										/>
									</div>
									<div class="hover-overlay">
										<div class="cross-box">
											<div class="cross-background">
												<div id="cross"></div>
											</div>
										</div>
									</div>
								</div>
							</a><!-- .tour-tile -->
						</div>
					<?php endif; ?>

					<!-- Lightbox image view -->
					<?php 
						// Only show text area if text exists
						if($tour_text){ 
					?>
						<div id="featherlight-tile-<?php echo esc_attr( $num ) ?>" class="tile-featherlight">
							<div class="row no-gutters">
								<div class="col-md-7 feather-image-frame">
									<img 
										src="<?php echo esc_attr( $image_url ); ?>" 
										srcset = "<?php echo esc_attr( $image_srcset ); ?>"
										sizes = "(min-width: 567px) 50vw, 90vw"
										alt = "<?php echo $image_alt; ?>"
									>
								</div>
								<div class="tour-text col-md-5">
									<h2 class="feather-title text-center">
										<?php echo esc_html( $tour_title ) ?>
									</h2>
									<h4 class="feather-text">
										<?php echo $tour_text ?>
									</h4>
								</div>
							</div>
						</div>
					<?php 
						} else { 
					?>
						<div id="featherlight-tile-<?php echo $esc_attr( $num ) ?>" class="tile-featherlight">
							<div class="row no-gutters">
								<div class="col-md-12">
									<img 
										src="<?php echo esc_attr( $image_url ); ?>" 
										srcset = "<?php echo esc_attr( $image_srcset ); ?>"
										sizes = "(min-width: 567px) 50vw, 90vw"
										alt = "<?php echo $image_alt; ?>"
									>
								</div>
							</div>
						</div>
					<?php } // end if / else ?>
				<?php $num++; endwhile; endif;?>
			</section>
		</div>
	</div><!-- #st-content-wrapper -->		
</div><!-- #store-tour-page -->
<?php get_footer(); ?>