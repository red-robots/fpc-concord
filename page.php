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
	//$theContent = get_the_content();
endwhile; // End of the loop.
?>
<div class="wrapper-page">
				<section class="intro">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>

				<?php if( is_page('sitemap') ) : 
					echo '<section class="sitemap">';
						
						$args = array(
								'title_li' =>'',
								'exclude'  => '493',
							);
						wp_list_pages($args);
					echo '</section>';
				 endif; ?>



</div>
<?php
get_footer();
