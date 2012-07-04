<?php
/**
 * Add Stylesheets and javascript files safely using wp_enqueue_style()
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

  	//wp_register_script('pilotfish_bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), null, true);
  	wp_register_script('pilotfish_modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), null, false);
  	wp_register_script('pilotfish_main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
  	//wp_enqueue_script('pilotfish_bootstrap');
  	wp_enqueue_script('pilotfish_modernizr');
  	wp_enqueue_script('pilotfish_main');
}

add_action('wp_enqueue_scripts', 'pilotfish_scripts');


/**
 * Show post thumbnail
 */ 
function pilotfish_the_thumbnail() {
	global $post;

	$id = (int) $post->ID;
	if ( $id == 0 ) {
		return false;
	}

	$html = get_the_post_thumbnail($id, array(300,175));
	if(!empty($html)){
		echo $html;
	}
}


/**
 * Register a Custom Post Type 
 * 
 * Label: Project (for portfolio items)
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


/**
 * Show Home and Portfolio Links in the Primary Navigation 
 */
/*   
add_filter( 'wp_nav_menu_items', 'add_portfolio_link', 10, 2 );
  
function add_portfolio_link( $items, $args ) {
    	if ( $args->theme_location == 'primary-navigation' ) {
        	$items .= '<li><a href="'.home_url('/').'project/">Portfolio</a></li>';
    	}
    	return $items;
}*/
  
function portfolio_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'portfolio_page_menu_args' );	

/**
 * Where the post has no post title, but must still display a link to the single-page post view.
 */


function pilotfish_title($title) {
        if ($title == '') {
            return __('Untitled','pilotfish');
        } else {
            return $title;
        }
}
add_filter('the_title', 'pilotfish_title');


/**
 * Sets the post excerpt length to 60 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function pilotfish_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'pilotfish_excerpt_length' );


/**
 * Returns a "Continue Reading" link for excerpts
 */
function pilotfish_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue Reading <span class="meta-nav">&rarr;</span>', 'pilotfish' ) . '</a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and pilotfish_continue_reading_link().
 */
function pilotfish_auto_excerpt_more( $more ) {
	return ' &hellip;' . pilotfish_continue_reading_link();
}
add_filter( 'excerpt_more', 'pilotfish_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function pilotfish_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= pilotfish_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'pilotfish_custom_excerpt_more' );
