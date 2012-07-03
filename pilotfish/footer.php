<?php
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/footer.php
 * @since          Pilot Fish 0.1
 */
?>

    </div><!-- end of #wrapper -->
    <?php pilotfish_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php pilotfish_container_end(); // after container hook ?>

<div id="footer" class="clearfix">
<?php pilotfish_in_footer(); ?>
    <div id="widgets-footer">
    
	    <div class="row span4">
	    <?php pilotfish_widgets(); // before widgets hook ?> 
	    	<?php dynamic_sidebar('sidebar-footer-1'); ?>
	    <?php pilotfish_widgets_end(); // after widgets hook ?>
	    </div>
	    
	    <div class="row span4">
	    <?php pilotfish_widgets(); // before widgets hook ?> 
	    	<?php dynamic_sidebar('sidebar-footer-2'); ?>
	    <?php pilotfish_widgets_end(); // after widgets hook ?>
	    </div>
	    
	    <div class="row span4 last">
	    <?php pilotfish_widgets(); // before widgets hook ?> 
	    	<?php dynamic_sidebar('sidebar-footer-3'); ?>
	    <?php pilotfish_widgets_end(); // after widgets hook ?>
	    </div>
    
    </div> <!-- end of #widgets-footer --> 
           
    <div id="copyright" class="clear">    
        <div class="row span6 copyright">
            <small><?php esc_attr_e('&copy;', 'pilotfish'); ?> <?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php bloginfo('name'); ?>
            </a>powered by <a href="<?php echo esc_url(__('http://wordpress.org','pilotfish')); ?>" title="<?php esc_attr_e('WordPress', 'pilotfish'); ?>">
                    <?php printf('WordPress'); ?></a></small><br />
            <small>Cover Photo from <a href="<?php echo esc_url(__('http://www.ks-image.com/','pilotfish')); ?>" target="_blank">Kimmo Savolainen</a>, licensed under Creative Commons.</small><br />
            <small>Designed and built by Daniel Zhao.</small>
        </div><!-- end of .copyright -->
        
        <div class="row span6 last scroll-top"><small><a href="#" title="<?php esc_attr_e( 'scroll to top', 'pilotfish' ); ?>"><?php _e( 'Back to Top', 'pilotfish' ); ?></a></small></div><!-- end of .scroll-top -->      
    </div><!-- end of #copyright -->

</div><!-- end of #footer -->
<?php pilotfish_footer_end(); // after footer hook ?>

<?php wp_footer(); ?>
<?php pilotfish_footer() ?>
</body>
</html>
