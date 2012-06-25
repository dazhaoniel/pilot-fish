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

get_header(); ?>
    
	<div id="featured" class="row span12 hidden-phone">     
		<h1 class="featured-title">Hello World!</h1>
		<h2 class="featured-subtitle"><?php echo __('A Minimal, Responsive Portfolio Theme','pilotfish'); ?></h2>
            	<p><?php echo __('You can edit this section from front-page.php in the Edit Panel. Happy Blogging! ','pilotfish'); ?></p>
        </div><!-- end of #featured -->
        
        <hr>      
	<div class="center"><h2>What I Do</h2></div>
	<hr>
	
<?php get_sidebar('home'); ?>
<?php get_footer(); ?>
