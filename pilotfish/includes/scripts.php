<?php
/**
 *
 * Add Stylesheets and javascript files safely using wp_enqueue_style()
 *
 */
function pilotfish_scripts() {
  wp_enqueue_style('pilotfish_bootstrap_responsive_style', get_template_directory_uri() . '/css/bootstrap-responsive.css', false, null);
  wp_enqueue_style('pilotfish_main_style', get_template_directory_uri() . '/style.css', false, null);

  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '', '', '', false);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('pilotfish_modernizr', get_template_directory_uri() . '/js/modernizr.js', false, null, false);
  wp_register_script('pilotfish_main', get_template_directory_uri() . '/js/main.js', false, null, true);
  wp_register_script('pilotfish_respond', get_template_directory_uri() . '/js/respond.min.js', false, null, true);
  wp_enqueue_script('pilotfish_modernizr');
  wp_enqueue_script('pilotfish_respond');
  wp_enqueue_script('pilotfish_main');
}

add_action('wp_enqueue_scripts', 'pilotfish_scripts', 100);

/**
 * 
 * Show thumbnail
 *
 */ 
function pilotfish_the_thumbnail() {
	global $post;

	$id = (int) $post->ID;
	if ( $id == 0 ) {
		return false;
	}

	$html = get_the_post_thumbnail($id, array(306,175));
	if(!empty($html)){
		echo $html;
	}
}

/**
 *
 * Register a Custom Post Type 
 * Label: Project (for portfolio items)
 *
 */
	 
add_action( 'init', 'create_post_type' );
	
if (!function_exists('create_post_type')):
	
	function create_post_type() {
			register_post_type( 'project',
					array(
							'labels' => array(
									'name' => __( 'Projects','pilotfish' ),
									'singular_name' => __( 'Project','pilotfish' )
							),
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true, 
					'query_var' => true,
					'rewrite' => true,
					'capability_type' => 'post',
					'has_archive' => true, 
					'hierarchical' => false,
					'menu_position' => '5',
					'supports' => array('title',
					    'editor',
					    'author',
					    'thumbnail',
					    'excerpt',
					    'comments'
						)
					)
			);
	}
	
	endif;

register_taxonomy("Skills", array("project"), array("hierarchical" => true, "label" => "Skills", "singular_label" => "Skill", "rewrite" => true));	
