<?php
/**
 * Template Name: Staff
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header();

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
endwhile; // End of the loop.
 ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
		<div class="wrapper-page">
			<?php
			while ( have_posts() ) : the_post(); ?>

				<section class="intro">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>

			<?php endwhile; // End of the loop. ?>

			<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'staff',
				'posts_per_page' => -1,
				'paged' => $paged,
			));
			if ($wp_query->have_posts()) : ?>
			<section class="staff">
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

		    	$email = get_field('email');
		    	$pTitle = get_field('title');
		    	$picture = get_field('picture');
		    	$bio = get_field('bio');
		    	$spammed = antispambot($email);
		    	$title = get_the_title();
		    	$dashedTitle = sanitize_title_with_dashes($title);

		    ?>
		    	<div class="staff-card">
			    	<a href="#pop-<?php echo $dashedTitle; ?>" class="pop">
			    		<img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['url']; ?>">
			    		<h3><?php the_title(); ?></h3>
			    		<h4 class="title"><?php echo $pTitle; ?></h4>
			    		<div class="email">
			    			<a href="<?php echo $spammed; ?>"><i class="fas fa-envelope fa-lg"></i></a>
			    		</div>
		    		</a>
		    	</div>
		    	<div style="display: none;">
			    	<div id="pop-<?php echo $dashedTitle; ?>" class="pop-bio">
			    	<div class="nav"></div>
			    	<div class="pop-wrap">
			    		<div class="pic"><img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['url']; ?>"></div>
			    		<div class="bio"><?php echo $bio; ?></div>
			    	</div>
			    	</div>
		    	</div>
		    <?php endwhile; ?>
		    </section>
		<?php endif; // End of the loop. ?>
		    </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
