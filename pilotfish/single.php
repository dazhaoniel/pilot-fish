<?php
/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/single.php
 * @since          Pilot Fish 0.1
 */
?>
<?php get_header(); ?>

        <div id="post" class="row span8">
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?> 
          
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1> <!-- Post Title -->
		<hr>
                <div class="post-meta">
                <?php pilotfish_entry_meta(); ?>
		<?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'pilotfish'), __('1 Comment &darr;', 'pilotfish'), __('% Comments &darr;', 'pilotfish')); ?>
                        </span>
                    <?php endif; ?> 
                </div><!-- end of .post-meta -->
                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'pilotfish')); ?>
                    
                    <?php if ( get_the_author_meta('description') != '' ) : ?>
                    
                    <div id="author-meta">
                    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                        <div class="about-author"><?php _e('About','pilotfish'); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta('description') ?></p>
                    </div><!-- end of #author-meta -->
                    
                    <?php endif; // no description, no author's meta ?>
                    
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'pilotfish'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'pilotfish') . ' ', ', ', '<br />'); ?> 
					<?php printf(__('Posted in %s', 'pilotfish'), get_the_category_list(', ')); ?> 
                </div><!-- end of .post-data -->             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'pilotfish')); ?></div>             
            </div><!-- end of #post-<?php the_ID(); ?> -->
            
			<?php comments_template( '', true ); ?>
            
        <?php endwhile; ?> 

        <?php if ($wp_query->max_num_pages > 1) { ?>
		  <nav id="post-nav" class="pager">
		    <div class="previous"><?php next_posts_link(__('&larr; previous', 'pilotfish')); ?></div>
		    <div class="next"><?php previous_posts_link(__('next &rarr;', 'pilotfish')); ?></div>
		  </nav>
		<?php } ?>
<?php endif; ?>  
        </div><!-- end of #post -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
