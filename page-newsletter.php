<?php
/**
 * Template Name: Newsletters
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
	//$theContent = get_the_content();
endwhile; // End of the loop.
?>
<div class="wrapper-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<?php
			while ( have_posts() ) : the_post(); ?>
				<section class="intro">
				<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>
			<?php endwhile; // End of the loop. ?>

			<?php
			// set the date
			$prevMonth = '';

			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'newsletter',
				'posts_per_page' => 30,
				'paged' => $paged,
				'orderby'	=> 'date',
				'order'		=> 'DESC'
			));
			if ($wp_query->have_posts()) : ?>
			<section class="newsletters">
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
		    	$date = get_the_date();
		    	$currentM = get_the_date('M');
		    ?>

		     <?php 
		    	if( $currentM != $prevMonth ) {
		    		echo '<h2 class="month-sep">'.get_the_date('M Y').'</h2>';
		    		$prevMonth = $currentM;
		    	}
		     ?>
		     		<div class="newsletter-link">
		     			<a href="<?php the_field('link_to_newsletter'); ?>" target="_blank">
		     				<h3><?php the_title(); ?> <i class="fas fa-chevron-circle-right"></i></h3>
		     			</a>
		     		</div>
		     <?php endwhile; 

				pagi_posts_nav();

				?>
				</section>
			<?php endif; ?>

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
			        'post_type'     => 'newsletter'
			);
			wp_get_archives( $args ); ?>
		</div>
	</div>

</div>
<?php
get_footer();
