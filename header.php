<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Ubuntu:400,700" rel="stylesheet">
<?php 

wp_head(); 

$newbtn = get_field('im_new', 'option');
$phone = get_field('phone_number', 'option');

?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<div class="upper-bar"></div>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<section class="top-header">
			
			<div class="new-btn">
				<a href="<?php echo $newbtn; ?>">
					I'm New <i class="fas fa-chevron-circle-right"></i>
				</a>
			</div>

			<?php if(is_home()) { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="First Pres Concord">
		            </a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="First Pres Concord">
		            </a>
	            </div>
	        <?php } ?>

	        <div class="phonenum">
	        	<a href="<?php echo 'tel:'.$phone; ?>"><?php echo $phone; ?></a>
	        </div>

			
		</section><!-- wrapper -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content ">
