<?php
/**
 * Template Name: Sectional Template
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
				<?php the_content(); ?>
			</section>

			<?php if(have_rows('sections')) : ?>
				<section class="sections">
					<?php while(have_rows('sections')) : the_row();
						$copy = get_sub_field('section'); 
						$img = get_sub_field('side_image'); 
					?>
						<div class="section">
							<div class="copy">
								<?php echo $copy; ?>
							</div>
							<div class="img">
								<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							</div>
						</div>
					<?php endwhile; ?>
				</section>
			<?php endif; ?>

			<?php endwhile; // End of the loop.
			?>
			</div>
			<!-- wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
