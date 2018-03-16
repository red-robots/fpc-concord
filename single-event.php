<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
			<section class="entry-content">
					<h1><?php the_title(); ?></h1>
					<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}  ?>
					<?php the_content(); ?>
				</section>
		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="widget-area">
	<h2>Other Events</h2>
	<div class="widget event">
	
	<?php 	// current date
			$today = date("Y-m-d H:i:s"); 
			
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => 10,
				'paged' => $paged,
				'meta_key' => 'date',
			    'meta_value' => $today,
			    'meta_compare' => '>=',
			    'orderby' => 'meta_value',
			    'order' => 'ASC',
			));
			if ($wp_query->have_posts()) : ?>
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

		   		 // get raw date
				$date = get_field('date', false, false);
				$enddate = get_field('end_date', false, false);
				// make date object
				$date = new DateTime($date);
				$enddate = new DateTime($enddate);
				// example: echo $date->format('j M Y');
				// echo '<pre>';
				// print_r($date);
				// echo '</pre>';

		    ?>
				<li class="sideevent">
					<a href="<?php the_permalink(); ?>">
					
						
						<h3><?php the_title(); ?></h3>
						<div class="datetime">
							<?php 
							if($date->format('g:i A') == '12:00 AM') {
								echo $date->format('j M Y');
							} else {
								echo $date->format('j M Y | g:i A');
							}
							 
							if( $enddate != '' ) :
								echo ' - '.$enddate->format('j M Y'); 
							 endif; ?>
						</div>
					</a>
				</li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>


<?php

get_footer();
