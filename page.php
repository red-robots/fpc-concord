<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
	$theContent = get_the_content();
endwhile; // End of the loop.
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper-page">
			

				<section class="intro">
					<h1><?php the_title(); ?></h1>
					<?php echo $theContent; ?>
				</section>

			
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
