<?php get_header(); ?>

<main class="site-main">
    <header class="archive-header">
        <h1 class="archive-title"><?php the_archive_title(); ?></h1>
        <div class="archive-description"><?php the_archive_description(); ?></div>
    </header>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <div class="entry-summary"><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
