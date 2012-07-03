<?php
/**
 * pilotfish functions
 */
 
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

require ( get_template_directory() . '/includes/scripts.php' );
require ( get_template_directory() . '/includes/hooks.php' );
require ( get_template_directory() . '/includes/template-tags.php' );
require ( get_template_directory() . '/includes/widgets.php' );

// Set the content width based on the theme's design and stylesheet
if (!isset($content_width)) { $content_width = 960; }

if (!function_exists('pilotfish_setup')):
function pilotfish_setup() {

// Make theme available for translation
  	load_theme_textdomain('pilotfish', get_template_directory() . '/languages');

// Register wp_nav_menu() menus 
  	register_nav_menus(array(
    		'primary-navigation' => __('Primary Navigation', 'pilotfish'),
  	));

// Add post thumbnails 
  	add_theme_support('post-thumbnails');
   	set_post_thumbnail_size(300, 175, true);


// Add post formats 
/*  	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat')); */
   
  	add_editor_style();
  
  	add_theme_support('automatic-feed-links');
  
  	add_theme_support( 'custom-background', array(
		// Let WordPress know what our default background color is.
		// This is dependent on our current color scheme.
		'default-color' => 'ffffff',
	) );


//Add custom header image
/*  	define('HEADER_TEXTCOLOR', '');
  	define('HEADER_IMAGE', ''); // 
  	define('HEADER_IMAGE_WIDTH', 400); // use width and height appropriate for your theme
  	define('HEADER_IMAGE_HEIGHT', 125);

  	define('NO_HEADER_TEXT', true);

// gets included in the admin header
  	function pilotfish_admin_header_style() {
  		?><style type="text/css">
  		#headimg {
        	border: none !important;
        	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
        	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        	}
        	</style><?php
  	}
  	add_theme_support('custom-header', 'pilotfish_admin_header_style');*/
  
// Add support for custom headers.
	$custom_header_support = array(
		// The default header text color.
		'default-text-color' => '',
		// The height and width of our custom header.
		'width' => apply_filters( 'pilotfish_header_image_width', 400 ),
		'height' => apply_filters( 'pilotfish_header_image_height', 125 ),
		// Callback for styling the header.
		'wp-head-callback' => 'pilotfish_header_style',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'pilotfish_admin_header_style',
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => 'pilotfish_admin_header_image',
	);
	
  	add_theme_support( 'custom-header', $custom_header_support );
}
endif;

add_action('after_setup_theme', 'pilotfish_setup');
