<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'wordpressproject' ), number_format_i18n( get_comments_number() ) ); ?></h2>
        <ol class="comment-list">
            <?php wp_list_comments(); ?>
        </ol>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
