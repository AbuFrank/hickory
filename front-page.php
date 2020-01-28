<?php
/**
 * The template for displaying the front page.
 *
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="content-frontpage" tabindex="-1">

		<main class="site-main" id="main">

			<?php 

			 	if ( have_rows('homepage_layout') ):  
					while ( have_rows('homepage_layout')) : the_row(); 
					
						// Hero Carousel
						if ( get_row_layout() == 'hero_image_carousel' )
							get_template_part( 'frontpage-templates/frontpage', 'hero' ); 
					 
						// About Section
						if ( get_row_layout() == 'frontpage_about' )
							get_template_part( 'frontpage-templates/frontpage', 'about' );

					 	// Primary Featured Categories
					 	if ( get_row_layout() == 'primary_categories' )
						 	get_template_part( 'frontpage-templates/frontpage', 'primary-categories' ); 

						// Brand Logo Bar
						if ( get_row_layout() == 'brand_bar' )
							get_template_part( 'frontpage-templates/frontpage', 'brands' );

						// Parallax Section
						// if ( get_row_layout() == 'testimonial_parallax' )
						// 	get_template_part( 'frontpage-templates/frontpage', 'parallax' );

						// Secondary Categories
						if ( get_row_layout() == 'secondary_categories' )
							get_template_part( 'frontpage-templates/frontpage', 'secondary-categories' );	
									 
					endwhile; 
				endif; // end flexible content loop  

		 	?>
			
		</main><!-- #main -->
			
	</div><!-- Container end -->


<?php get_footer(); ?>