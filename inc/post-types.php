<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Sermons
  
     $labels = array(
	'name' => _x('Sermons', 'post type general name'),
    'singular_name' => _x('Sermon', 'post type singular name'),
    'add_new' => _x('Add New', 'Sermon'),
    'add_new_item' => __('Add New Sermon'),
    'edit_item' => __('Edit Sermons'),
    'new_item' => __('New Sermon'),
    'view_item' => __('View Sermons'),
    'search_items' => __('Search Sermons'),
    'not_found' =>  __('No Sermons found'),
    'not_found_in_trash' => __('No Sermons found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Sermons'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('sermon',$args); // name used in query

    // Register the Homepage Events
  
     $labels = array(
  'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'Event'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Events'),
    'new_item' => __('New Event'),
    'view_item' => __('View Events'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No Events found'),
    'not_found_in_trash' => __('No Events found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Events'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('event',$args); // name used in query



  
  // Add more between here
  
  // and here
  
  } // close custom post type