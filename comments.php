<?php
/**
 * Comments Template
 *
 *
 * @file           comments.php
 * @package        Pilot Fish
 * @filesource     wp-content/themes/pilotfish/comments.php
 * @since          Pilot Fish 0.1
 */
?>
<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', 'pilotfish'); ?></p>
    
	<?php return; } ?>

<?php if (have_comments()) : ?>
    <h6 id="comments"><?php comments_number(__('No Comments &#187;', 'pilotfish'), __('1 Comment &#187;', 'pilotfish'), __('% Comments &#187;', 'pilotfish')); ?> for <?php the_title(); ?></h6>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="pager">
        <div class="previous"><?php previous_comments_link(__( '&#8249; previous','pilotfish' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'next &#8250;','pilotfish', 0 )); ?></div><!-- end of .next -->
    </nav><!-- end of.pager -->
    <?php endif; ?>

    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=60&type=comment'); ?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="pager">
        <div class="previous"><?php previous_comments_link(__( '&#8249; previous','pilotfish' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'next &#8250;','pilotfish', 0 )); ?></div><!-- end of .next -->
    </nav><!-- end of.pager -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks','pilotfish') : $txt = __('Pings&#47;Trackbacks','pilotfish');
?>

    <h6 id="pings"><?php echo $count . " " . $txt; ?> <?php _e('for','pilotfish'); ?> "<?php the_title(); ?>"</h6>

    <ol class="commentlist">
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>
<?php endif; ?>

<?php if (comments_open()) : ?>

    <?php
    $fields = array(
        'author' => '<p id="comment-form-author">' . '<label for="author">' . __('Name','pilotfish') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
        'email' => '<p id="comment-form-email"><label for="email">' . __('E-mail','pilotfish') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>',
        'url' => '<p id="comment-form-url"><label for="url">' . __('Website','pilotfish') . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
    );

    $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields));

    comment_form($defaults);
    ?>

    <?php endif; ?>
