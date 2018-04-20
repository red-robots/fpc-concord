<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 


// get the sermon page
$post = get_post(51); 
setup_postdata( $post );
 
	get_template_part('template-parts/page-banner');
 
wp_reset_postdata();
	


?>
<div class="wrapper-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
			<section class="intro">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				</section>
			</header><!-- .page-header -->
			<section class="newsletters">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 

			// get raw date
				$date = get_the_date();
		    	$currentM = get_the_date('M');
		    	

		    ?>

		    

		     	<div class="newsletter-link">
	     			<a href="<?php the_field('link_to_newsletter'); ?>" target="_blank">
	     				<h3><?php the_title(); ?> <i class="fas fa-chevron-circle-right"></i></h3>
	     			</a>
	     		</div>

				
			<?php endwhile;

			the_posts_navigation(); ?>
			</section>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">
		<div class="widget">
			<h2>Monthly Sermon Archives</h2>
		
			<?php $args = array(
				'type'            => 'monthly',
				'limit'           => '',
				'format'          => 'html', 
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC',
			        'post_type'     => 'sermon'
			);
			wp_get_archives( $args ); ?>
		</div>
	</div>

	
</div>
<?php
get_footer();
