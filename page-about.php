<?php
/**
 * Template Name: About
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
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

		    	$email = get_field('email');
		    	$picture = get_field('picture');
		    	$bio = get_field('bio');
		    	$spammed = antispambot($email);

		    ?>
		    	<div class="staff-card">
			    	<a href="<?php the_permalink(); ?>">
			    		<img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['url']; ?>">
			    		<h3><?php the_title(); ?></h3>
			    		<div class="email">
			    			<a href="<?php echo $spammed; ?>"><?php echo $spammed; ?></a>
			    		</div>
		    		</a>
		    	</div>
		    <?php endwhile; endif; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
