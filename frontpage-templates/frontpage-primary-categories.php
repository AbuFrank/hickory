<?php
/**
 * Template part for displaying page content in front-page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
			
<?php 
	
	// check for content in primary categories
	if( have_rows( 'primary_categories' )): 
	
		// $category_list = array(); //create array to store category objects
		$category_list = array();
		while ( have_rows( 'primary_categories' ) ) : the_row();
			// get primary categories posts
			$name 		= get_sub_field( 'category_name' );	
			$image  	= get_sub_field( 'category_image' );
			$filter		= get_sub_field( 'category_filter' );

			$category_list[] = array(
				'name'  	=> $name,
				'image'		=> $image,
				'filter'	=> $filter,
			);
		endwhile; 
?>

	<section id="primary-categories" class="container">
		<div class="row">
			<?php
				// Blurb description
				$blurb = get_sub_field( 'primary_categories_blurb' );
			?>
			<div class="categories-blurb">
				<h2 class="text-center"><?php echo esc_html( $blurb ); ?></h2>
			</div>
			<div class="category-grid-wrapper">
				<div class="category-grid">
					<article class="fp-category-item fp-grid-sizer"></article>
					<article id="<?php echo esc_attr($category_list[0]['name']); ?>" class="fp-category-item fp-category-tall">
						<div class="category-frame">
							<a class="category-link" href="<?php echo home_url( 'store-products/#filter=.cat-'.$category_list[0]['filter'] ); ?>">
								<div class="category-image-wrapper blue-grey">
									<?php
										// get srcset and image attributes
										$id		= $category_list[0]['image'];
										$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
										$url 	= wp_get_attachment_image_url( $id, 'large' );
										$alt	= get_post_meta( $id, '_wp_attachment_image_alt', true );
									?>
									<img
										src="<?php echo esc_attr($url); ?>"
										srcset="<?php echo esc_attr($srcset); ?>"
										alt="<?php echo esc_attr($alt); ?>"
										sizes="(min-width: 1200px) 444px, (min-width: 992px) 372px, (min-width: 768px) 276px, (min-width: 576px) 520px, 95vw"
									>
								</div>
								<div class="fp-category-name">
									<h2 class="floating-category-name">
										<?php echo esc_html( $category_list[0]['name'] );?>
									</h2>
								</div>
							</a>
						</div>
					</article>
					<article id="<?php echo esc_attr($category_list[1]['name']) ?>" class="fp-category-item fp-category-wide">
						<div class="category-frame">
							<a class="category-link" href="<?php echo home_url( 'store-products/#filter=.cat-'.$category_list[1]['filter']); ?>">
								<div class="category-image-wrapper blue-grey">
									<?php
										// get srcset and image attributes
										$id		= $category_list[1]['image'];
										$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
										$url 	= wp_get_attachment_image_url( $id, 'large' );
										$alt	= get_post_meta( $id, '_wp_attachment_image_alt', true );
									?>
									<img
										src="<?php echo esc_attr($url); ?>"
										srcset="<?php echo esc_attr($srcset); ?>"
										alt="<?php echo esc_attr($alt); ?>"
										sizes="(min-width: 1200px) 666px, (min-width: 992px) 558px, (min-width: 768px) 414px, (min-width: 576px) 520px, 95vw"
									>
								</div>
								<div class="fp-category-name">
									<h2 class="floating-category-name">
										<?php echo esc_html( $category_list[1]['name'] ); ?>
									</h2>
								</div>
							</div>
						</a>
					</article>
					<article id="<?php echo esc_attr($category_list[2]['name']); ?>" class="fp-category-item fp-category-square">
						<div class="category-frame">
							<a class="category-link" href="<?php echo home_url( 'store-products/#filter=.cat-'.$category_list[2]['filter']); ?>">
								<div class="category-image-wrapper blue-grey">
									<?php
										// get srcset and image attributes
										$id			= $category_list[2]['image'];
										$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
										$url 		= wp_get_attachment_image_url( $id, 'large' );
										$alt		= get_post_meta( $id, '_wp_attachment_image_alt', true );
									?>
									<img
										src="<?php echo esc_attr($url); ?>"
										srcset="<?php echo esc_attr($srcset); ?>"
										alt="<?php echo esc_attr($alt); ?>"
										sizes="(min-width: 1200px) 333px, (min-width: 992px) 279px, (min-width: 768px) 207px, (min-width: 576px) 520px, 95vw"
									>
								</div>
								<div class="fp-category-name">
									<h2  class="floating-category-name">
										<?php echo esc_html( $category_list[2]['name'] ); ?>
									</h2>
								</div>
							</a>
						</div>
					</article>
					<article id="<?php echo esc_attr($category_list[3]['name']); ?>" class="fp-category-item fp-category-square">
						<div class="category-frame">
							<a class="category-link" href="<?php echo home_url( 'store-products/#filter=.cat-'.$category_list[3]['filter']); ?>">
								<div class="category-image-wrapper blue-grey">
									<?php
										// get srcset and image attributes
										$id			= $category_list[3]['image'];
										$srcset 	= wp_get_attachment_image_srcset( $id, 'x-large' );
										$url 		= wp_get_attachment_image_url( $id, 'large' );
										$alt		= get_post_meta( $id, '_wp_attachment_image_alt', true );
									?>
									<img
										src="<?php echo esc_attr($url); ?>"
										srcset="<?php echo esc_attr($srcset); ?>"
										alt="<?php echo esc_attr($alt); ?>"
										sizes="(min-width: 1200px) 333px, (min-width: 992px) 279px, (min-width: 768px) 207px, (min-width: 576px) 520px, 95vw"
									>
								</div>
								<div class="fp-category-name">
									<h2 class="floating-category-name">
										<?php echo esc_html( $category_list[3]['name'] ); ?>	
									</h2>
								</div>
							</a>
						</div>
					</article>
				</div>	<!-- .category-grid -->
			</div>	<!-- .category-grid-wrapper -->
		</div>	<!-- .row -->
	</section>	<!-- #primary-categories -->
<?php endif; ?>