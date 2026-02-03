<?php
/*
Template Name: About
*/
get_header();
?>

<main class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
