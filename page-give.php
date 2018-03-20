<?php
/**
 * Template Name: Give
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
	//$theContent = get_the_content();

	$subtitle = get_field('sub_title');
	$excerpt = get_field('excerpt');

endwhile; // End of the loop.
?>
<div class="wrapper-page">
	
	<section class="intro">
		<h1><?php the_title(); ?></h1>
		
	</section>



	<?php 
	/*
		Section for the Child Page buttons

	*/
		if( have_rows('buttons') ) : ?>
			<section class="donation-links sections">
			<!-- <h2>Donation Links</h2> -->
			<div class="linkouts">
				<?php while( have_rows('buttons') ) : the_row();

				$title = get_sub_field('title');
				$qdesc = get_sub_field('quick_description');
				$link = get_sub_field('link');
				$btnText = get_sub_field('button_text_optional');
				if( $btnText != '') {
					$btnUse = $btnText;
				} else {
					$btnUse = 'CLICK HERE';
				}
				
			 ?>

		 		<div class="linkbox">
		 			<h3><?php echo $title; ?></h3>
		 				<?php if( $qdesc ) { ?>
			 				<div class="desc"><?php echo $qdesc; ?></div>
			 			<?php } ?>
		 			<div class="btn">
		 				<a href="<?php echo $link; ?>">
		 					<?php echo $btnUse; ?>  <i class="fas fa-chevron-circle-right"></i>
		 				</a>
		 			</div>
		 		</div>

	<?php endwhile; ?>
	</div>
	</section>
<?php endif; ?>

<section class="intro"><?php the_content(); ?></section>
				
	<?php 
	/*

		Query Child pages if on Main Give page

	*/
	if( is_page(16) ) : ?>
		<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
			'post_type'=>'page',
			'posts_per_page' => -1,
			'post_parent'    => $post->ID,
		));
			if ($wp_query->have_posts()) : ?>
			<section class="cpages">
		    <?php while ($wp_query->have_posts()) : 

		    	$subtitle = get_field('sub_title');

		    ?>
		        
		    <?php $wp_query->the_post(); ?>	
		    <div class="cpage">
			    <h2><?php the_title(); ?></h2>
			    <?php if( $subtitle ) { ?><h3><?php echo $subtitle; ?></h3><?php } ?>
			    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			   <div class="btn">
			   	<a href="<?php the_permalink(); ?>">
			   		<?php the_title(); ?> <i class="fas fa-chevron-circle-right"></i>
			   	</a>
			   </div>
		   </div>

		<?php endwhile; ?>
		</section>
		<?php endif; ?>


	<?php endif; ?>


</div>
<?php
get_footer();
