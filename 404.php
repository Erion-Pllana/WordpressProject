<?php get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <h1>404 - <?php _e('Page Not Found','ecosphere'); ?></h1>
        <p><?php _e('Sorry, the page you tried to access does not exist. Try searching or return to the homepage.','ecosphere'); ?></p>
        <?php get_search_form(); ?>
        <p><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Return to homepage','ecosphere'); ?></a></p>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
