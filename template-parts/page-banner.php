<?php
$banner = get_field('banner');
$default = get_field('default_page_banner', 'option');

// echo '<pre>';
// 	print_r($banner);
// echo '</pre>';

if( $banner ) :?>
	<div class="page-banner">
		<img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>">
	</div>
<?php else: ?>
	<div class="page-banner">
		<img src="<?php echo $default['url']; ?>" alt="<?php echo $default['alt']; ?>">
	</div>
<?php  endif; ?>