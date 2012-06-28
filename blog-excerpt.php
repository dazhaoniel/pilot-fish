<?php
/**
 * Blog Template
 *
 * Template Name: Blog Excerpt (summary)
 *
 * @file           blog-excerpt.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/blog-excerpt.php
 * @since          Pilot Fish 0.1
 */

get_header(); ?>

    <div id="content-blog" class="row span8">
<?php
    $limit = get_option('posts_per_page');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts('showposts=' . $limit . '&paged=' . $paged);
    $wp_query->is_archive = true; $wp_query->is_home = false;
    ?> 
<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'pilotfish'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
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
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'pilotfish'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'pilotfish') . ' ', ', ', '<br />'); ?> 
					<?php printf(__('Posted in %s', 'pilotfish'), get_the_category_list(', ')); ?> 
                </div><!-- end of .post-data -->             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'pilotfish')); ?></div>               
            </div><!-- end of #post-<?php the_ID(); ?> -->
        <?php endwhile; ?> 
        <?php if ($wp_query->max_num_pages > 1) { ?>
		  <nav id="post-nav" class="pager">
		    <div class="previous"><?php next_posts_link(__('&larr; previous', 'pilotfish')); ?></div>
		    <div class="next"><?php previous_posts_link(__('next &rarr;', 'pilotfish')); ?></div>
		  </nav>
		<?php } ?>
<?php endif; ?>  
        </div><!-- end of #content-blog -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
