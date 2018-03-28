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
	//$theContent = get_the_content();
	$titleLay = get_field('title_l');
	$saniL = sanitize_title_with_dashes($titleLay);
	$contentLay = get_field('content_l');
	$linkLay = get_field('link_l');
	$titleS = get_field('title_s');
	$saniS = sanitize_title_with_dashes($titleS);
	$contentS = get_field('content_s');
	$linkS = get_field('link_s');
	$form = get_field('form');
	$formtitle = get_field('title_e');
	$saniT = sanitize_title_with_dashes($formtitle);
	$formOutput = '[gravityform id="'.$form.'" title="false" description="false"]';

endwhile; // End of the loop.
?>
<section class="anchors">
	<a href="#<?php echo $saniL; ?>"><?php echo $titleLay; ?> <i class="fas fa-chevron-circle-down"></i></a>
	<a href="#<?php echo $saniS; ?>"><?php echo $titleS; ?> <i class="fas fa-chevron-circle-down"></i></a>
	<a href="#<?php echo $saniT; ?>"><?php echo $formtitle; ?> <i class="fas fa-chevron-circle-down"></i></a>
</section>
<div class="wrapper-page">
	<section class="intro">
		<h1><?php the_title(); ?></h1>
		<section class="basic-section">
			<h2 id="<?php echo $saniL; ?>"><?php echo $titleLay; ?></h2>
			<?php echo $contentLay; ?>
			<div class="btnlink">
				<a href="<?php echo $linkLay; ?>">Sign Up  <i class="fas fa-chevron-circle-right"></i></a>
			</div>
		</section>
		<section class="basic-section">
			<h2 id="<?php echo $saniS; ?>"><?php echo $titleS; ?></h2>
			<?php echo $contentS; ?>
			<div class="btnlink">
				<a href="<?php echo $linkS; ?>">Sign Up  <i class="fas fa-chevron-circle-right"></i></a>
			</div>
		</section>
		<section class="basic-section">
			<h2 id="<?php echo $saniT; ?>"><?php echo $formtitle; ?></h2>
			<?php if($form) {echo do_shortcode($formOutput);} ?>
		</section>
	</section>


	 <?php get_template_part('inc/box-button-links'); ?>

</div>
<?php
get_footer();
