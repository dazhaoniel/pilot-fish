<?php
/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Pilot Fish 
 * @filesource     wp-content/themes/pilotfish/index.php
 * @since          Pilot Fish 0.1
 */

get_header(); ?>

        <div id="content-full" class="row span12"> 
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'pilotfish'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1></header>
                
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
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_content(__('Continue Reading &rarr;', 'pilotfish')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'pilotfish'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <footer class="post-data">
				    <?php the_tags(__('TAGS:', 'pilotfish') . ' ', ', ', '<br />'); ?> 
					<?php printf(__('FILED UNDER: %s', 'pilotfish'), get_the_category_list(', ')); ?> 
                </footer><!-- end of .post-data -->             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'pilotfish')); ?></div>               
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php endwhile; ?> 
        
        <?php if ($wp_query->max_num_pages > 1) { ?>
		  <nav id="post-nav" class="pager">
		    <div class="previous"><?php next_posts_link(__('&larr; previous', 'pilotfish')); ?></div>
		    <div class="next"><?php previous_posts_link(__('next &rarr;', 'pilotfish')); ?></div>
		  </nav>
		<?php } ?>
<?php endif; ?>  
      
        </div><!-- end of #content-full -->
<?php get_footer(); ?>
