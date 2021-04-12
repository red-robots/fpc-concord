<?php
/**
 * Template Name: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter0
 */

get_header();

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
endwhile; // End of the loop.
 ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
			<div class="wrapper-page">
		

			<section class="intro">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</section>

		
			

			
			<section class="contact">
				<div class="section">
					<div class="copy">
						<?php the_field('directions_block'); ?>
					</div>
					<div class="img">
						<?php the_field('map'); ?>
					</div>
				</div>
			</section>

			

					

			</div>	
			<!-- wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
