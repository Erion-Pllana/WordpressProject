<?php get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <h1><?php printf(__('Search Results for: %s','ecosphere'), get_search_query()); ?></h1>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>

        <div class="pagination"><?php the_posts_pagination(); ?></div>

        <?php else: ?>
            <p><?php _e('No results found. Try another search.','ecosphere'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
