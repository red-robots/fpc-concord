<?php
/**
 * Template Name: Give
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
	//$theContent = get_the_content();
endwhile; // End of the loop.
?>
<div class="wrapper-page">
				<section class="intro">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>

				



</div>
<?php
get_footer();
