<?php
/**
 * Template for displaying all products
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>
<div id="products-archive-page" class="container-fluid no-height">

	<div class="page-loading-overlay">
		<!-- wait for isotope to load before disappearing -->
	</div>

	<div class="row wrapper products-archive-wrapper">

		<?php 
			// insert template part with store products categories & subcategories menu
			get_template_part( 'sidebar-templates/sidebar', 'store-products' );  
		?>
		
		<div id="products-archive-gallery-column" class="col-md-9 col-xl-10">
			<section id="products-archive-gallery">
				<div class="product-tile-sizer"></div>
					<?php
					// loop through the posts and cache their data
					while ( have_posts() ) : the_post(); 
						
						// product info
						$product_title = get_the_title();
						$product_link = get_permalink();
						$price = get_field( 'price' );
						$product_categories = get_field( 'category' );
						$product_text = get_field( 'description' );
						$product_categories = get_field( 'product_categories' );

						// loop through each assigned category and construct a class string
						// start with empty array, add each category id to it, implode it into string
						$product_class_array = [];
						foreach ($product_categories as $cat_id) {
							$product_class_array[] = "cat-". $cat_id;
						}
						$product_class = implode(' ', $product_class_array);
						
						// store the first two images for each product
						$images = get_field('product_images');
						$image0 = $images[0]['image'];
						$image1 = $images[1]['image'];
					?>
					<a href="<?php echo esc_attr( $product_link ) ?>" 
						class="product-tile <?php echo esc_attr( $product_class );?>">
						<div class="tile-content-wrapper">
							<div class="tile-image-wrapper">
								
								<?php 
								//srcset
								$image_srcset0 = wp_get_attachment_image_srcset($image0,'xlarge');
								$image_url0 = wp_get_attachment_image_url( $image0, "xsmall" );
								$img_alt0 = get_post_meta( $image0, '_wp_attachment_image_alt', true);
								$image_srcset1 = wp_get_attachment_image_srcset($image1,'xlarge');
								$image_url1 = wp_get_attachment_image_url( $image1, "xsmall" );
								$img_alt1 = get_post_meta( $image1, '_wp_attachment_image_alt', true);
								?>

								<div class="image-flex-frame archive-variant-0">
									<img 
										src= "<?php echo esc_attr( $image_url0 ); ?>" 
										srcset = "<?php echo esc_attr( $image_srcset0 ); ?>"
										sizes = "(min-width: 1200px) 19vw, (min-width: 768px) 21vw, (min-width: 576px) 29vw, 42vw"
										alt = "<?php echo esc_attr( $image_alt0 ); ?>"
									/>
								</div>
								
								<?php if ($image1): ?>

								<div class="image-flex-frame archive-variant-1">
									<img 
										src = "<?php echo esc_attr( $image_url1 ); ?>" 
										srcset = "<?php echo esc_attr( $image_srcset1 ); ?>"
										sizes = "(min-width: 1200px) 19vw, (min-width: 768px) 21vw, (min-width: 576px) 29vw, 42vw"
										alt = "<?php echo esc_attr( $image_alt1 ); ?>"
									/>
								</div>

								<?php endif; ?>

							</div>
						</div>
						<div class="tour-title">
							<?php echo $product_title ?>
						</div>
						<div class="text-center" style="color: #333333;">
							<?php echo $price ?>
						</div>
					</a><!-- .product-tile -->

				<?php endwhile;?>
			</section>

			<div id="no-items-message">
				<h3>Sorry, no items for this category!</h3>
			</div>
			
		</div>
	</div><!-- #st-content-wrapper -->		
</div><!-- #store-tour-page -->
<?php get_footer(); ?>