<?php
/**
 * Pages Template
 *
 *
 * @file           page.php
 * @package        Pilot Fish 
 * @filesource     wp-content/themes/pilotfish/page.php
 * @since          Pilot Fish 0.1
 */

get_header(); ?>

        <div id="content-full" class="row span12">
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header><h1><?php the_title(); ?></h1></header>
                <?php if ( comments_open() ) : ?>               
                <div class="post-meta">
                <?php pilotfish_entry_meta(); ?>
		<?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'pilotfish'), __('1 Comment &darr;', 'pilotfish'), __('% Comments &darr;', 'pilotfish')); ?>
                        </span>
                    <?php endif; ?> 
                </div><!-- end of .post-meta -->
                <?php endif; ?> 
                
                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'pilotfish')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'pilotfish'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <?php if ( comments_open() ) : ?>
                <footer class="post-data">
				    <?php the_tags(__('Tagged with:', 'pilotfish') . ' ', ', ', '<br />'); ?> 
                    <?php the_category(__('Posted in %s', 'pilotfish') . ', '); ?> 
                </footer><!-- end of .post-data -->
                <?php endif; ?>             
            
            <div class="post-edit"><?php edit_post_link(__('Edit', 'pilotfish')); ?></div> 
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
      
        </div><!-- end of #content-full -->
<?php get_footer(); ?>
