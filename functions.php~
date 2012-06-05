<?php
/**
 * pilotfish functions
 */
 
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

require ( get_template_directory() . '/includes/scripts.php' );
//require ( get_template_directory() . '/includes/theme-options.php' );
require ( get_template_directory() . '/includes/hooks.php' );
require ( get_template_directory() . '/includes/template-tags.php' );
require ( get_template_directory() . '/includes/widgets.php' );

// Set the content width based on the theme's design and stylesheet
if (!isset($content_width)) { $content_width = 960; }

if (!function_exists('pilotfish_setup')):
function pilotfish_setup() {

  // Make theme available for translation
  //load_theme_textdomain('pilotfish', get_template_directory() . '/languages');

  // Register wp_nav_menu() menus 
  register_nav_menus(array(
    'primary-navigation' => __('Primary Navigation', 'pilotfish'),
  ));

  // Add post thumbnails 
  add_theme_support('post-thumbnails');
   set_post_thumbnail_size(306, 175, false);

  // Add post formats 
  //add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
   
  add_editor_style();
  
  add_theme_support('automatic-feed-links');
  
  add_custom_background();

  //Add custom header image
  define('HEADER_TEXTCOLOR', '');
  define('HEADER_IMAGE', ''); // %s is the template dir uri (%s/images/default-logo.png)
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
  add_custom_image_header('', 'pilotfish_admin_header_style');

}
endif;

add_action('after_setup_theme', 'pilotfish_setup');
