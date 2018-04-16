<?php
/**
 * Template Name: Sermons
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
<div class="wrapper-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			while ( have_posts() ) : the_post(); ?>
				<section class="intro">
				<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>
			<?php endwhile; // End of the loop. ?>

			<?php
			// set the date
			$prevMonth = '';

			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'sermon',
				'posts_per_page' => 30,
				'paged' => $paged,
				'meta_key'	=> 'date',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'DESC'
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

		    	$currentM = $date->format('M');
		    	

		    ?>

		    <?php 
		    	if( $currentM != $prevMonth ) {
		    		echo '<h2 class="month-sep">'.$date->format('M Y').'</h2>';
		    		$prevMonth = $currentM;
		    	}
		     ?>

		    <div class="sermon-row">
		    	<div class="date">
		    	<span class="month"><?php echo $date->format('M'); ?></span>
		    		<span class="day"><?php echo $date->format('j'); ?></span>
		    	</div>
		    	<div class="sermon">
		    		<h3><?php echo $pTitle; ?></h3>
		    		<h4 class="minister"><?php echo $minister; ?></h4>
		    	</div>
		    	<div class="passage"><?php echo $passage; ?></div>
		    	<div class="downloads">
			    	<div class="watch">
				    	<?php if( $watch != '') { ?>
				    		<a href="<?php echo $watch; ?>" target="_blank">
				    			<i class="fas fa-video fa-lg"></i>
				    		</a>
			    		<?php } ?>
			    	</div>
			    	<div class="download">
			    		<?php if( $download != '') { ?>
				    		<a href="<?php echo $download; ?>">
				    			<i class="fas fa-cloud-download-alt fa-lg"></i>
				    		</a>
			    		<?php } ?>
			    	</div>
			    </div>
		    </div>

				<?php endwhile; 

				pagi_posts_nav();

				?>
				</section>
			<?php endif; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">
		<div class="widget">
			<h2>Monthly Sermon Archives</h2>
		
			<?php $args = array(
				'type'            => 'monthly',
				'limit'           => '',
				'format'          => 'html', 
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC',
			        'post_type'     => 'sermon'
			);
			wp_get_archives( $args ); ?>
		</div>
	</div>

</div>
<?php
get_footer();
