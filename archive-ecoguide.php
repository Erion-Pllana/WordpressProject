<?php get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <h1>Eco Guides</h1>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                <?php endif; ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

        <?php else: ?>
            <p><?php _e('No guides found.','ecosphere'); ?></p>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
