<?php
/**
 * Template Name: About
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header();

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
endwhile; // End of the loop.
 ?>
asfdasfa
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper-page">
			<?php
			while ( have_posts() ) : the_post(); ?>

				<section class="intro">
				<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>

			<?php endwhile; // End of the loop. ?>

				<?php get_template_part('inc/box-button-links'); ?>


		    </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
