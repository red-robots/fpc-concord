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
			<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</section>

			<?php if(have_rows('sections')) : ?>
				<section class="sections">
					<?php while(have_rows('sections')) : the_row();
						$copy = get_sub_field('section'); 
						// $img = get_sub_field('side_image'); 
					?>
						<div class="section">
							<div class="copy">
								<?php echo $copy; ?>
							</div>
							<div class="img">
								<?php 
								$images = get_sub_field('side_image');
								$size = 'full';
								// echo '<pre>';
								// print_r($images);
								// echo '</pre>';
								if( $images ) :
									foreach( $images as $image ):
								 ?>
										<div class="single-image">
											<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; 
				if( !is_page(45) ) { ?></section><?php } ?>
			<?php endif; ?>

			<?php endwhile; // End of the loop.
			

			if(is_page(45)) : ?>

			

					<div class="section">
						<div class="copy">
							<?php the_field('directions_block'); ?>
						</div>
						<div class="img">
							<?php the_field('map'); ?>
						</div>
					</div>

					<?php if( is_page(45) ) { ?></sectino><?php } endif; ?>
			</div>
			<!-- wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
