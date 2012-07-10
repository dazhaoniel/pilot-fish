<?php
/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/search.php
 * @since          Pilot Fish 0.1
 */

get_header(); ?>

        <div id="search-results" class="row span8">
            <h6><?php _e('We found','pilotfish'); ?> 
		<?php
                $allsearch = &new WP_Query("s=$s&showposts=-1");
                $key = esc_html($s, 1);
                $count = $allsearch->post_count;
                _e(' &#8211; ', 'pilotfish');
                echo $count . ' ';
                _e('articles for ', 'pilotfish');
                _e('<span class="post-search-terms">', 'pilotfish');
                echo $key;
                _e('</span><!-- end of .post-search-terms -->', 'pilotfish');
                wp_reset_query();
            ?>
            </h6>


<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
          
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'pilotfish'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1></header>

                <div class="post-meta">
                <?php pilotfish_entry_meta(); ?>
                </div><!-- end of .post-meta -->
                                
                <div class="post-entry">
                    <?php the_content(__('Continue Reading &rarr;', 'pilotfish')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'pilotfish'), 'after' => '</div><!-- end of .pagination -->')); ?>
                </div><!-- end of .post-entry -->
                
                <footer class="post-data">
				    <?php the_tags(__('Tagged with:', 'pilotfish') . ' ', ', ', '<br />'); ?> 
					<?php printf(__('Posted in %s', 'pilotfish'), get_the_category_list(', ')); ?> | 
					<?php edit_post_link(__('Edit', 'pilotfish'), '', ' &#124; '); ?>  
					<?php comments_popup_link(__('No Response &darr;', 'pilotfish'), __('One Response &darr;', 'pilotfish'), __('% Responses &darr;', 'pilotfish')); ?>
                </footer><!-- end of .post-data -->             
            
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
			<?php comments_template( '', true ); ?>
            
        <?php endwhile; ?> 
        
        <?php if ($wp_query->max_num_pages > 1) { ?>
		  <nav id="post-nav" class="pager">
		    <div class="previous"><?php next_posts_link(__('&larr; previous', 'pilotfish')); ?></div>
		    <div class="next"><?php previous_posts_link(__('next &rarr;', 'pilotfish')); ?></div>
		  </nav>
		<?php } ?>
<?php endif; ?>  
      
        </div><!-- end of #search-results -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
