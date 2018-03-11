<?php
$banner = get_field('banner');

if( $banner ) :?>
	<div class="page-banner">
		<?php
		// echo '<pre>';
		// 	print_r($banner);
		// echo '</pre>';
		?>
		 <img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>">
	</div>
<?php  endif; ?>