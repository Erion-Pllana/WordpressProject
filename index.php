<?php get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                    <?php endif; ?>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-meta"><?php the_time('F j, Y'); ?><?php the_author_posts_link(); ?></div>
                    <div class="entry-summary"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('« Prev','ecosphere'),
                    'next_text' => __('Next »','ecosphere'),
                ));
                ?>
            </div>
        <?php else: ?>
            <p><?php _e('No posts found.','ecosphere'); ?></p>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
