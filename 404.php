<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper-page">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<section class="intro">
				
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
				

					<?php 

					echo '<section class="sitemap">';
						
						$args = array(
								'title_li' =>'',
								'exclude'  => '493',
							);
						wp_list_pages($args);
					echo '</section>';

					 ?>


			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
