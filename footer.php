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
    <div id="widgets-footer" class="row span12 aligncenter">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    </div> <!-- end of #widgets-footer --> 
           
    <div id="copyright" class="row span12 aligncenter">    
        <div class="row span4 copyright">
            <small><?php esc_attr_e('&copy;', 'pilotfish'); ?> <?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php bloginfo('name'); ?>
            </a></small>
        </div><!-- end of .copyright -->
        
        <div class="row span4 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'pilotfish' ); ?>"><?php _e( '&uarr;', 'pilotfish' ); ?></a></div><!-- end of .scroll-top -->
       
        <div class="row span4 last powered">
            <small><a href="<?php echo esc_url(__('http://danielatwork.com','pilotfish')); ?>" title="<?php esc_attr_e('pilotfish - A Minimal Portfolio Theme', 'pilotfish'); ?>">
                    <?php printf('Pilot Fish'); ?></a>
            powered by <a href="<?php echo esc_url(__('http://wordpress.org','pilotfish')); ?>" title="<?php esc_attr_e('WordPress', 'pilotfish'); ?>">
                    <?php printf('WordPress'); ?></a></small>
        </div><!-- end of .powered -->       
    </div><!-- end of #copyright .span12 -->

</div><!-- end of #footer -->
<?php pilotfish_footer_end(); // after footer hook ?>

<?php wp_footer(); ?>
<?php pilotfish_footer() ?>
</body>
</html>
