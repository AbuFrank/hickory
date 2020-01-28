<?php
/**
 * Template for displaying single product
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper cb-page-content" id="page-wrapper">

	<div class="container" id="content">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>
		<div class="row">

			<div
				class="col-lg-8 col-xl-7"
				id="single-product-images"
			>
			
				<main class="content-main wrapper" id="main" role="main">
					<div class="single-gallery-grid">
					<?php 
						
						$images = get_field( 'product_images' );
						if($images): ?>
						
						<div class="thumbnail-menu">
							<?php
							$num = 0;
							foreach ($images as $image):
								$variant_image = $image['image'];
								
								$image_url = wp_get_attachment_image_url( $variant_image, "thumbnail" );
								$image_alt = get_post_meta( $variant_image, '_wp_attachment_image_alt', true); 

								?>
								<img 
									src="<?php echo esc_attr($image_url) ?>"
									data-variant="variant<?php echo $num; ?>"
									/>
								<?php 
								$num++;
							endforeach; 
						?>
						</div><!-- .thumbnail-menu -->

						<div class="variant-images-wrapper">
						
						<?php
							$num = 0;
							foreach ($images as $image):
								$variant_image = $image['image'];
								// regular image, no larger than 500px
								$image_reg = wp_get_attachment_image_url($variant_image,"med-small");
								// zoom should be the 1024px wide photo hence "large"
								$image_zoom= wp_get_attachment_image_url( $variant_image, "large" );
								// al text
								$image_alt = get_post_meta( $variant_image, '_wp_attachment_image_alt', true); ?>

							<!-- standard image and what zoom acts on -->
							<div class="single-image-wrapper easyzoom--adjacent variant<?php echo $num; if($num == 0){echo " current";}?>">
								<a href="<?php echo esc_attr( $image_zoom ); ?>">
									<img 
										class="image-variant"
										src= "<?php echo esc_attr( $image_reg ); ?>"
										alt = "<?php echo esc_attr( $image_alt ); ?>"
									>
								</a>	
							</div>
							<?php
								$num++;
							endforeach; ?>

							<!-- information for users -->
							<div class="hover-info">
								<p>Hover image to see larger view</p>
							</div>

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
				<?php
					$price							= get_field('price');
					$product_text 			= get_field( 'description' );
					$shipping_available	= get_field('available_for_shipping');
				?>
				<div class="product-header">
					<h3 class="cb-page-header">
						<?php 
							$title = get_the_title();
							echo $title; ?>
					</h3>
				</div>
				<div class="product-price mb-5">
					<?php
						echo $price;
					?>
				</div>
				<div class="mb-5">
					<?php
						echo $product_text;
					?>
				</div>
				<?php if($shipping_available): ?>
					<h4 class="shipping-header">Ship it to me</h4>
					<p>Love this product? You can buy it over the phone and we'll ship it to you!</p>
					<p>Give us a call at (410) 639-7980 or send a message through the form and we'll be in touch to complete your purchase.</p>
					<?php 
							echo do_shortcode('[ninja_form id=2]');
					endif; 
				?>
				</section>

			</div>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
