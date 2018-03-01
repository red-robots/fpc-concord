<?php
/**
 * Template Name: Events
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper-page">
			<?php
			while ( have_posts() ) : the_post(); ?>

				<section class="intro">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>

			<?php endwhile; // End of the loop.
			?>


			<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => -1,
				'paged' => $paged,
			));
			if ($wp_query->have_posts()) : ?>
			<section class="events">
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

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

		    ?>

			<?php endwhile; ?>
			</section>
		<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
