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
$facebook = get_field('facebook_link', 'option');
$twitter = get_field('twitter_link', 'option');
$instagram = get_field('instagram_link', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<section class="footer-address">
				<?php echo $address . ' | ' . $phone; ?>
			</section>
			<section class="social">
				<?php if( $facebook ) { ?>
					<div class="s-icon">
						<a target="_blank" href="<?php echo $facebook; ?>">
							<i class="fab fa-facebook-f"></i>
						</a>
					</div>
				<?php } if( $twitter ) { ?>
					<div class="s-icon">
						<a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></a>
					</div>
				<?php } if( $instagram ) { ?>
					<div class="s-icon">
						<a target="_blank" href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></a>
					</div>
				<?php } ?>
			</section>
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="bottom-red"></div>


<?php wp_footer(); ?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="//cdn.jsdelivr.net/stickynavbar.js/1.3.2/jquery.stickyNavbar.min.js"></script>

</body>
</html>
