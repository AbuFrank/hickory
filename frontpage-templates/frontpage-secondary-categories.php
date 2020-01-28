<?php
/**
 * Template part for displaying Secondary Categories and Featured Item Carousel in front-page.php
 *
 * CB notes: 
 *		This section publishes two different ACF content types: repeater and group.
 *		The repeater field contains the Featured Items to be displayed in owl carousel slider
 *		The group field contains the Secondary Categories which contains two blocks of content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
 
<section id="secondary-featured" class="container">
	<div class="row no-gutters content-wrapper">
		<!-- Featured item carousel -->
		<div id="featured-block" class="col-sm-6">

			<?php //get featured carousel title
				$featured_title = get_sub_field( 'featured_title' );
				if ( $featured_title ):
				?>


				<h2 class="text-center featured-secondary-titles"><?php echo esc_html( $featured_title )?></h2>

				<?php	else:	?>

				<h2 class="text-center featured-secondary-titles">&ensp;</h2>

				<?php	
				endif;
			?>

			<div id="featured-carousel" class="owl-carousel">
				<?php 
				// check for content in Primary Categories
				if( have_rows( 'featured_slider' )): 
					// loop the repeater field to create carousel slides
					while( have_rows( 'featured_slider' )) : the_row(); 
						$productID		= get_sub_field( 'featured_link' ); 
						$featImg			= get_sub_field( 'featured_image' );
						$image_srcset = wp_get_attachment_image_srcset( $featImg, 'large' );
						$image_url 		= wp_get_attachment_image_url( $featImg, 'medium' );
						$alt					= get_post_meta( $featImg, '_wp_attachment_image_alt', true );
						if (!$productID) {
							$productURL = home_url( $path = '#secondary-featured', $scheme = relative );
						} else {
							$productURL = get_permalink($productID);
						}
					?>

					<a href="<?php echo esc_url( $productURL ); ?>">
						<div class="featured-slide">
							
							<img
								src="<?php echo esc_attr($image_url); ?>"
								srcset="<?php echo esc_attr($image_srcset); ?>"
								sizes="(min-width: 1200px) 460px, (min-width: 992px) 400px, (min-width: 768px) 300px, 250px"
								alt="<?php echo esc_attr($alt) ?>"
							>

							<div class="overlay-title">
								<?php
									$title = get_sub_field( 'featured_title' );
									$link  = get_sub_field( 'featured_link' );
								?>
								<h3 class="featured-slide-title">
									<?php echo esc_html($title); ?>
								</h3>
							</div>

						</div><!-- .featured-slide -->
					</a>
					
				<?php 
					endwhile;		
				endif; 
				?>
			</div><!-- #featured-carousel -->
		</div><!-- #featured-block -->

		<!-- Secondary Categories -->
		<div id="secondary-block" class="col-sm-6">

			<?php //get featured carousel title
				$secondary_category_title = get_sub_field( 'secondary_category_title' );
				if ( $secondary_category_title ): ?>

				<h2 class="text-center featured-secondary-titles">
					<?php echo esc_html( $secondary_category_title )?>
				</h2>

				<?php	else:	?>

				<h2 class="text-center featured-secondary-titles">&ensp;</h2>

				<?php	
				endif;
			?>

			<?php //retrieve and store the two categories' meta information
				if( have_rows( 'secondary_blocks' )): 
				while( have_rows( 'secondary_blocks' )) : the_row();
					
					// Secondary Category 1
					//image
					$cat_img1 			= get_sub_field( 'category_image_1' );
					$image_srcset1 	= wp_get_attachment_image_srcset( $cat_img1, 'large' );
					$image_url1			= wp_get_attachment_image_url( $cat_img1, 'medium' );
					$alt1						= get_post_meta( $cat_img1, '_wp_attachment_image_alt', true );
					//title and link
					$cat_title1	= get_sub_field( 'category_title_1' );
					$cat_link1	= get_sub_field( 'category_link_1' );
					// default link or pull url from acf
					(!$cat_link1) ? $cat_url1 = home_url('/store-tour') : $cat_url1 = $cat_link1['url'];

					// Secondary Category 2
					//image
					$cat_img2 			= get_sub_field( 'category_image_2' );
					$image_srcset2 	= wp_get_attachment_image_srcset( $cat_img2, 'large' );
					$image_url2			= wp_get_attachment_image_url( $cat_img2, 'medium' );
					$alt2						= get_post_meta( $cat_img2, '_wp_attachment_image_alt', true );
					//title and link
					$cat_title2	= get_sub_field( 'category_title_2' );
					$cat_link2	= get_sub_field( 'category_link_2' );
					// default link or pull url from acf
					(!$cat_link2) ? $cat_url2 = home_url('/store-products') : $cat_url2 = $cat_link2['url']; 

				endwhile;endif;
			?>
			<div class="secondary-frame">
				<div class="secondary-box">
					<a href="<?php echo esc_attr($cat_url1); ?>">
						<div class="secondary-image-frame">
							<?php 
							if ($cat_img1):  
							?>
							<img
								src="<?php echo esc_attr($image_url1); ?>"
								srcset="<?php echo esc_attr($image_srcset1); ?>"
								sizes="	(min-width: 1200px) 460px, 
												(min-width: 992px) 400px, 
												(min-width: 768px) 300px, 
												(min-width: 576px) 250px, 
												95vw"
								alt="<?php echo esc_attr( $alt1 ) ?>"
							>
							<?
							endif;
							?>
						</div>
						<div class="secondary-title">
							<h3 class="secondary-overlay-title"><?php if($cat_title1): echo esc_attr($cat_title1); else: echo 'Store Tour'; endif;?></h3>
						</div>
					</a><!-- .secondary-category-block 1 -->
				</div>
				<div class="secondary-box">
					<a href="<?php echo esc_attr($cat_url2); ?>">
						<div class="secondary-image-frame">
							<?php 
							if ($cat_img2):  
							?>
							<img
								src="<?php echo esc_attr($image_url2); ?>"
								srcset="<?php echo esc_attr($image_srcset2); ?>"
								sizes="	(min-width: 1200px) 460px, 
												(min-width: 992px) 400px, 
												(min-width: 768px) 300px, 
												(min-width: 576px) 250px, 
												90vw"
								alt="<?php echo esc_attr( $alt2 ) ?>"
							>
						<?
							endif;
							?>
						</div>
						<div class="secondary-title">
							<h3 class="secondary-overlay-title"><?php if($cat_title2): echo esc_attr($cat_title2); else: echo 'Store Products'; endif;?></h3>
						</div>	
					</a><!-- .secondary-category-block 2 -->
				</div>
			</div><!-- .secondary-flex-box -->
		</div><!-- #secondary-block -->
	</div><!-- .row -->
</section><!-- .container -->
	