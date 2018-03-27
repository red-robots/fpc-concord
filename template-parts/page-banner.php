<?php
$banner = get_field('banner');
$default = get_field('default_page_banner', 'option');
$noBanner = get_field('no_banner');
// echo '<pre>';
// print_r($noBanner);
// echo '</pre>';
// set to empty if no banner is checked.
if( $noBanner != '' ) {
	$banner = '';
	$default = '';
}

// echo '<pre>';
// 	print_r($banner);
// echo '</pre>';

if( $banner ) : ?>
	<div class="page-banner">
		<img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>">
	</div>
<?php elseif( $default ) : ?>
	<div class="page-banner">
		<img src="<?php echo $default['url']; ?>" alt="<?php echo $default['alt']; ?>">
	</div>
<?php  endif; ?>