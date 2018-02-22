<?php
/**
 * Template Name: Sectional Template
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

			<?php if(have_rows()) : ?>
			<section class="sections">
				<?php while(have_rows()) : the_row() 
					$copy = get_sub_row(); 
					$img = get_sub_row('side_image'); 
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
