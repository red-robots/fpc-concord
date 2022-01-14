<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  if ( is_front_page() || is_home() ) {
    $classes[] = 'homepage';
  } else {
    $classes[] = 'subpage';
  }

  $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
  $classes[] = join(' ', array_filter($browsers, function ($browser) {
    return $GLOBALS[$browser];
  }));

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );

function get_social_media_links() {
  $links['youtube'] = get_field("youtube_link","option");
  $links['facebook'] = get_field("facebook_link","option");
  $links['instagram'] = get_field("instagram_link","option");
  $links['twitter'] = get_field("twitter_link","option");
  $icons = social_icons();
  $social_links = array();
  foreach($links as $k=>$link) {
    if($link) {
      $icon_class = ( isset($icons[$k]) && $icons[$k] ) ? $icons[$k] : '';
      $social_links[$k] = array('icon'=>$icon_class,'url'=>$link);
    }
  }
  return $social_links;
}


function social_icons() {
    $social_types = array(
        'facebook'  => 'fab fa-facebook-f',
        'twitter'   => 'fab fa-twitter',
        'linkedin'  => 'fab fa-linkedin-in',
        'instagram' => 'fab fa-instagram',
        'youtube'   => 'fab fa-youtube',
        'vimeo'     => 'fab fa-vimeo',
    );
    return $social_types;
}

add_action( 'admin_head', 'my_custom_admin_styles' ); 
function my_custom_admin_styles() { ?>
  <style type="text/css">
    [data-name="service_time_info"] .mce-edit-area iframe {
      height: 90px!important;
      min-height: 90px!important;
    }
    [data-name="service_times"] {
      display: none!important;
    }
  </style>
<?php
}