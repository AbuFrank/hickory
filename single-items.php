<?php
/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper" id="page-wrapper">

	<div class="container" id="content">

		<div class="row">

			<div
				class="col-lg-8 col-xl-7"
				id="single-product-images">

				<main class="content-main wrapper" id="main" role="main">
					<div class="single-gallery-grid">
					<?php 
						
						$images = get_field( 'product_images' );
						if($images): ?>
						<!-- comments are for removing white space -->
						<div class="thumbnail-menu"><!-- 
						 --><?php 
							$num = 0;
							foreach ($images as $image):
								$variant_image = $image['image'];
								
								$image_url = wp_get_attachment_image_url( $variant_image, "thumbnail" );
								$image_alt = get_post_meta( $variant_image, '_wp_attachment_image_alt', true); 

								?><!-- 
								 --><img 
									src="<?php echo esc_attr($image_url) ?>"
									data-variant="variant<?php echo $num; ?>"
									><!-- 
							 --><?php 
								$num++;
							endforeach; 
						?><!-- 
						 --></div><!-- .thumbnail-menu -->

						<div class="variant-images-wrapper">
						<?php
							$num = 0;
							foreach ($images as $image):
								$variant_image = $image['image'];
								//srcset
								$image_srcset = wp_get_attachment_image_srcset($variant_image,'full');
								$image_url = wp_get_attachment_image_url( $variant_image, "full" );
								$image_alt = get_post_meta( $variant_image, '_wp_attachment_image_alt', true); ?>
							<div class="single-image-wrapper variant<?php echo $num; if($num == 0){echo " current";}?>">
								<div class="product-image-sizer">
									<img 
										class="image-variant"
										src= "<?php echo esc_attr( $image_url ); ?>" 
										srcset = "<?php echo esc_attr( $image_srcset ); ?>"
										sizes = "(min-width: 768px) 500px, 100vw"
										alt = "<?php echo $image_alt; ?>"
									>
								</div>
							</div>
							<?php
								$num++;
							endforeach; ?>

						</div><!-- .single-product-image -->

						<?php
						endif; ?>

					</div><!-- .single-gallery-grid -->

				</main><!-- #main -->

			</div><!-- #primary -->
			
			<div 
				id="single-product-sidebar" 
				class="col-lg-4 col-xl-5">
				
				<section class="product-sidebar-wrapper">
				
				<div class="product-header">
					<h2 class="cb-page-header">
						<?php 
							$title = get_the_title();
							echo $title; ?>
					</h2>
				</div>
				<?php
					$product_text = get_field( 'description' );
					echo $product_text;
				?>

				</section>

			</div>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
