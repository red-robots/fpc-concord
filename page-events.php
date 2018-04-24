<?php
/**
 * Template Name: Events
 *
 * @package ACStarter
 */

get_header();

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
endwhile; // End of the loop.
 ?>
<div class="wrapper-page">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
			
			<?php
			while ( have_posts() ) : the_post(); ?>

				<section class="intro">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>

			<?php endwhile; // End of the loop.
			?>


			<?php
			// current date
			$today = date("Y-m-d H:i:s"); 

			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => 10,
				'paged' => $paged,
				'meta_key' => 'end_date',
			    'meta_value' => $today,
			    'meta_compare' => '>=',
			    'orderby' => 'meta_value',
			    'order' => 'ASC',

			));
			if ($wp_query->have_posts()) : ?>
			<section class="events-page">
			<div class="eventwrapper">
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

		    	// get raw date
				$date = get_field('date', false, false);
				$enddate = get_field('end_date', false, false);
				// make date object
				$date = new DateTime($date);
				$enddate = new DateTime($enddate);
				// example: echo $date->format('j M Y');
		    	$pTitle = get_field('title');
		    	$passage = get_field('passage');
		    	$minister = get_field('minister');
		    	$watch = get_field('watch');
		    	$download = get_field('download');

		    ?>

		    	<div class="event-card">
					<a href="<?php the_permalink(); ?>">
					
						<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
							}  ?>
						
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
				</div>

			<?php endwhile; 

			pagi_posts_nav();

			?>
			</div>
			</section>
		<?php endif; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
