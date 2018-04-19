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
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="sermons">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 

			// get raw date
				$date = get_field('date', false, false);
				// make date object
				$date = new DateTime($date);
				// example: echo $date->format('j M Y');
		    	$pTitle = get_field('title');
		    	$passage = get_field('passage');
		    	$minister = get_field('minister');
		    	$watch = get_field('watch');
		    	$download = get_field('download');

		    	$currentM = $date->format('M');
		    	

		    ?>

		    

		     	<div class="sermon-row">
		    	<div class="date">
		    	<span class="month"><?php echo $date->format('M'); ?></span>
		    		<span class="day"><?php echo $date->format('j'); ?></span>
		    	</div>
		    	<div class="sermon">
		    		<h3><?php echo $pTitle; ?></h3>
		    		<h4 class="minister"><?php echo $minister; ?></h4>
		    	</div>
		    	<div class="passage"><?php echo $passage; ?></div>
		    	<div class="downloads">
			    	<div class="watch">
				    	<?php if( $watch != '') { ?>
				    		<a href="<?php echo $watch; ?>" target="_blank">
				    			<i class="fas fa-video fa-lg"></i>
				    		</a>
			    		<?php } ?>
			    	</div>
			    	<div class="download">
			    		<?php if( $watch != '') { ?>
				    		<a href="<?php echo $download; ?>">
				    			<i class="fas fa-cloud-download-alt fa-lg"></i>
				    		</a>
			    		<?php } ?>
			    	</div>
			    </div>
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
