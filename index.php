<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 


// pull homepage
$post = get_post(20); 
setup_postdata( $post );
 
	$banner = get_field('banner');
	$welcomebanner = get_field('left_image');
	$welcomeTitle = get_field('welcome_title');
	$welcomeCopy = get_field('welcome_text');
	$welcomeLink = get_field('welcome_link');
	$welcomeLinkText = get_field('welcome_link_text');
 
wp_reset_postdata();


// echo '<pre>';
// print_r($banner);
// echo '</pre>';


if( $banner !='' ) {
?>
	<section class="page-banner">
		<img src="<?php echo $banner['url']; ?>" <?php echo $banner['alt']; ?>>
	</section>
<?php } ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<section class="welcome">
			<div class="left">
				<img src="<?php echo $welcomebanner['url']; ?>" <?php echo $welcomebanner['alt']; ?>>
			</div>
			<div class="right">
				<h2><?php echo $welcomeTitle; ?></h2>
				<div class="copy"><?php echo $welcomeCopy; ?></div>
				<div class="btnlink">
					<a href="<?php echo $welcomeLink;?>">
					<?php echo $welcomeLinkText;?><i class="fas fa-chevron-circle-right"></i>
					</a>
				</div>
			</div>
		</section>

		<section class="worship-schedule">
			<h2>Worship Schedule</h2>
			
		</section>


		<section class="quicklinks">
			<h2>Quick Links</h2>
			<div class="icon-wrap">
				<div class="link">
					<a href="">
						<div class="icon"><i class="fas fa-calendar-alt fa-3x"></i></div>
						<h3>Calendar</h3>
					</a>
				</div>
				<div class="link">
					<a href="">
						<div class="icon"><i class="fas fa-user-plus fa-3x"></i></div>
						<h3>Sign-ups</h3>
					</a>
				</div>
				<div class="link">
					<a href="">
						<div class="icon"><i class="fal fa-newspaper fa-3x"></i></div>
						<h3>Newsletter Archive</h3>
					</a>
				</div>
				<div class="link">
					<a href="">
						<div class="icon"><i class="fas fa-phone fa-3x"></i></div>
						<h3>Contact</h3>
					</a>
				</div>
			</div>
		</section>

		<section class="upcoming-events">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="event-box">
					<a href="<?php the_permalink(); ?>">
						<img src="">
						<h3><?php the_title(); ?></h3>
						<div class="date">
							date
						</div>
					</a>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
