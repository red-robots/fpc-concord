<?php
/**
 * Template Name: Sermons
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>
				<section class="intro">
					<?php the_content(); ?>
				</section>
			<?php endwhile; // End of the loop. ?>

			<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => -1,
				'paged' => $paged,
			));
			if ($wp_query->have_posts()) : ?>
			<section class="sermons">
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

		    <div class="sermon-row">
		    	<h2><?php echo $pTitle; ?></h2>
		    	<div class="date"><?php echo $date->format('j M Y'); ?></div>
		    	<div class="passage"><?php echo $passage; ?></div>
		    	<div class="minister"><?php echo $minister; ?></div>
		    	<div class="watch">
		    		<a href="<?php echo $watch; ?>">
		    			<i class="fas fa-video fa-lg"></i>
		    		</a>
		    	</div>
		    	<div class="download">
		    		<a href="<?php echo $download; ?>">
		    			<i class="fas fa-cloud-download-alt fa-lg"></i>
		    		</a>
		    	</div>
		    </div>

				<?php endwhile; ?>
				</section>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
