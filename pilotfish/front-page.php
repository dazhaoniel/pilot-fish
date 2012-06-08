<?php
/**
 * Front Page with Featured Content
 *
 *
 * @file           home.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/home.php
 * @since          Pilot Fish 0.1
 */
?>
<?php get_header(); ?>    
             <div id="featured" class="row span12 hidden-phone hidden-tablet">     
            <?php /*$options = get_option('pilotfish_theme_options');
			// First let's check if headline was set
			    if (!empty($options['featured_image'])) {
					 echo '<div id="featured" class="grid col-940" style="background-image:url('.$options['featured_image'].') ">';
		    // If not display default image for preview purposes
			      } else {             
                    			echo '<div id="featured" class="grid col-940" style="background-image:url('.get_stylesheet_directory_uri().'/images/home_banner.jpg)">';
 				  }*/
			?>

            <?php /*$options = get_option('pilotfish_theme_options');
			// First let's check if headline was set
			    if ($options['home_headline']) {
                    echo '<h1 class="featured-title">'; 
				    echo $options['home_headline'];
				    echo '</h1>'; 
			// If not display dummy headline for preview purposes
			      } else { */
			        echo '<h1 class="featured-title">';
				    echo __('Hello, World!','pilotfish');
				    echo '</h1>';
				/*  }
			?>

            <?php $options = get_option('pilotfish_theme_options');
			// First let's check if headline was set
			    if ($options['home_subheadline']) {
                    echo '<h2 class="featured-subtitle">'; 
				    echo $options['home_subheadline'];
				    echo '</h2>'; 
			// If not display dummy headline for preview purposes
			      } else { */
			        echo '<h2 class="featured-subtitle">';
				    echo __('A Minimal, Responsive Portfolio Theme','pilotfish');
				    echo '</h2>';
				/*  }
			?>
            
            <?php $options = get_option('pilotfish_theme_options');
			// First let's check if content is in place
			    if ($options['home_content_area']) {
                    echo '<p>'; 
				    echo $options['home_content_area'];
				    echo '</p>'; 
			// If not let's show dummy content for demo purposes
			      } else { */
			        echo '<p>';
				    echo __('You can edit this section from Theme Option in Admin Panel. Happy Blogging! 
					      ','pilotfish');
				    echo '</p>';
				/*  }*/
			?> 
        
        </div><!-- end of #featured -->
        <hr>      
	<div class="center"><h2>What I Do</h2></div>
	<hr>
<?php get_sidebar('home'); ?>
<?php get_footer(); ?>
