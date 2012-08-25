<?php
/**
 * The template for displaying quote post format
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header><h1><?php the_title(); ?></h1><h3 class="entry-format"><?php _e( 'Quote', 'pilotfish' ); ?></h3></header> <!-- Post Title -->
                <div class="post-meta">
                <?php pilotfish_entry_meta(); ?>
		<?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Response &darr;', 'pilotfish'), __('One Response &darr;', 'pilotfish'), __('% Responses &darr;', 'pilotfish')); ?>
                        </span>
                    <?php endif; ?> 
                </div><!-- end of .post-meta -->
                <div class="post-entry">
                    <?php the_content(__('Continue Reading &rarr;', 'pilotfish')); ?>
                    
                    <?php if ( get_the_author_meta('description') != '' ) : ?>
                    
                    <div id="author-meta">
                    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                        <div class="about-author"><?php _e('About','pilotfish'); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta('description') ?></p>
                    </div><!-- end of #author-meta -->
                    
                    <?php endif; // no description, no author's meta ?>
                    
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'pilotfish'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <footer class="post-data">  
			<?php the_tags(__('TAGS:', 'pilotfish') . ' ', ', ', '<br />'); ?>
			<?php printf(__('FILED UNDER: %s', 'pilotfish'), get_the_category_list(', ')); ?>
                </footer><!-- end of .post-data -->             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'pilotfish')); ?></div>             
            </article><!-- end of #post-<?php the_ID(); ?> -->
