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
<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css" rel="stylesheet" type="text/css">
<!-- <script src="https://use.fontawesome.com/762c66dd2b.js"></script> -->
<!-- <script src="https://use.fontawesome.com/8f931eabc1.js"></script> -->
<script defer src="https://use.fontawesome.com/releases/5.0.6/js/all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/5.0.6/js/v4-shims.js"></script>
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
		<section class="top-header ">
			
			<div class="new-btn">
				<a href="<?php echo $newbtn; ?>">
					I'm New <i class="fas fa fa-chevron-circle-right"></i>
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
		
		<div class="sticker">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content ">
