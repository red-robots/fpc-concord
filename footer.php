<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
$address = get_field('address', 'option');
$phone = get_field('phone_number', 'option');
$email = get_field('email', 'option');
$spambot = antispambot($email);
$facebook = get_field('facebook_link', 'option');
$twitter = get_field('twitter_link', 'option');
$instagram = get_field('instagram_link', 'option');

// let's get a clean slate
wp_reset_postdata();
wp_reset_query();

if( !is_front_page() ) {
	get_template_part('inc/quicklinks'); 
}
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<section class="footer-address">
				<?php echo $address . ' | ' . $phone . ' | <a href="mailto:'.$spambot.'">'.$spambot.'</a>'; ?>
			</section>
			<section class="social">
				<?php if( $facebook ) { ?>
					<div class="s-icon">
						<a target="_blank" href="<?php echo $facebook; ?>">
							<i class="fab fa-facebook-f fa-lg"></i>
						</a>
					</div>
				<?php } if( $twitter ) { ?>
					<div class="s-icon">
						<a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter fa-lg"></i></a>
					</div>
				<?php } if( $instagram ) { ?>
					<div class="s-icon">
						<a target="_blank" href="<?php echo $instagram; ?>"><i class="fab fa-instagram fa-lg"></i></a>
					</div>
				<?php } ?>
			</section>
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="bottom-red"></div>


<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="//cdn.jsdelivr.net/stickynavbar.js/1.3.2/jquery.stickyNavbar.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69030153-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
