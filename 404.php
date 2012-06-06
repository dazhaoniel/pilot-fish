<?php
/**
 * 404 Not Found Template
 *
 *
 * @file           404.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/404.php
 * @since          Pilot Fish 0.1
 */
?>
 
<?php get_header(); ?>

        <div id="content-full" class="row span12">
            <div id="post-0" class="error404">
                <div class="post-entry">
                    <h1 class="title-404"><?php _e('404 &#8212; Oops! Deadend Here...', 'pilotfish'); ?></h1>
                    <h6><?php _e( 'You can return', 'pilotfish' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'pilotfish' ); ?>"><?php _e( '&larr; Home', 'pilotfish' ); ?></a> <?php _e( 'or explore other pages and posts.', 'pilotfish' ); ?></h6>
                </div><!-- end of .post-entry -->
            </div><!-- end of #post-0 -->
        </div><!-- end of #content-full-->

<?php get_footer(); ?>
