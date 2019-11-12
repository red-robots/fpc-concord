<?php
/**
 * Template Name: Signups
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

while ( have_posts() ) : the_post(); 
	get_template_part('template-parts/page-banner');
	$form = get_field('form');
	$formOutput = '[gravityform id="'.$form.'" title="false" description="false"]';
	//$theContent = get_the_content();
	//$titleLay = get_field('title_l');
	//$saniL = sanitize_title_with_dashes($titleLay);
	//$contentLay = get_field('content_l');
	// $linkLay = get_field('link_l');
	// $titleS = get_field('title_s');
	// $saniS = sanitize_title_with_dashes($titleS);
	// $contentS = get_field('content_s');
	// $linkS = get_field('link_s');
	//$formtitle = get_field('title_e');
	// $titleE = get_field('title_e');
	// $contentE = get_field('content_e');
	// $linkE = get_field('link_e');
	// $saniT = sanitize_title_with_dashes($formtitle);
	

endwhile; // End of the loop.
?>
<section class="anchors">
	<?php if( have_rows('signups')) : while(have_rows('signups')) : the_row(); 
			$title = get_sub_field('title');
			$content = get_sub_field('content');
			$link = get_sub_field('link');
			$saniTitle = sanitize_title_with_dashes($title);
				?>
	<a href="#<?php echo $saniTitle; ?>">
		<?php echo $title; ?> <i class="fas fa-chevron-circle-down"></i>
	</a>
	<?php endwhile; endif; ?>
</section>
<div class="wrapper-page">
	<section class="intro">
		<h1><?php the_title(); ?></h1>
		<?php if( have_rows('signups')) : while(have_rows('signups')) : the_row(); 
				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$link = get_sub_field('link');
				$saniTitle = sanitize_title_with_dashes($title);
		?>
			<section class="basic-section">
				<h2 id="<?php echo $saniTitle; ?>"><?php echo $title; ?></h2>
				<?php echo $content; ?>
				<div class="btnlink">
					<a href="<?php echo $link; ?>">Sign Up  <i class="fas fa-chevron-circle-right"></i></a>
				</div>
			</section>
		<?php endwhile; endif; ?>
		
		
	</section>


	 <?php get_template_part('inc/box-button-links'); ?>

</div>
<?php
get_footer();
