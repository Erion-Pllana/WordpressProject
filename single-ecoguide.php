<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="wrap main-layout ecoguide-single">
        <div class="content-area">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>
                <div class="meta">Topics: <?php echo get_the_term_list( get_the_ID(), 'topic', '', ', ' ); ?></div>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
