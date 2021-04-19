<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
	//$theContent = get_the_content();
endwhile; // End of the loop.
?>
<div class="wrapper-page">
	<section class="intro">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</section>

	<section class="donation-links sections">
      <!-- <h2>Donation Links</h2> -->
      <div class="newsouts">
		<?php $wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 9,
				'paged' => $paged,
			));
			if ($wp_query->have_posts()) : ?>
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
		    	$btnUse = 'READ MORE';
		    ?>
		    

		    <div class="linkbox">
	          <h3><?php the_title(); ?></h3>
	            <?php if ( has_post_thumbnail() ) { ?>
	              <div class="img">
	                <?php  the_post_thumbnail();   ?>
	              </div>
	            <?php } ?>
	            <?php //if( $qdesc ) { ?>
	              <!-- <div class="desc"><?php echo $qdesc; ?></div> -->
	            <?php //} ?>
	          <div class="btn">
	            <a href="<?php the_permalink(); ?>">
	              <?php echo $btnUse; ?>  <i class="fas fa-chevron-circle-right"></i>
	            </a>
	          </div>
	        </div>


		<?php endwhile; ?>
		<?php pagi_posts_nav(); ?>
	<?php endif; ?>
		</div>
	</section>

	 <?php get_template_part('inc/box-button-links'); ?>

</div>
<?php
get_footer();
