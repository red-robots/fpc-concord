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
$facebook = get_field('facebook', 'option');
$twitter = get_field('twitter', 'option');
$instagram = get_field('instagram', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<section class="footer-address">
				<?php echo $address . ' | ' . $phone; ?>
			</section>
			<section class="social">
				<?php if( $facebook ) { ?>
					<div class="facebook">
						<a target="_blank" href="<?php echo $facebook; ?>">
							<i class="fab fa-facebook-f"></i>
						</a>
					</div>
				<?php } if( $twitter ) { ?>
					<div class="twitter">
						<a target="_blank" href="<?php echo $twitter; ?>"></a>
					</div>
				<?php } if( $instagram ) { ?>
					<div class="instagram">
						<a target="_blank" href="<?php echo $instagram; ?>"></a>
					</div>
				<?php } ?>
			</section>
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
