<?php
/* Front page template */
get_header();
?>

<main class="site-main front-page">
    <section class="hero">
        <h1>Welcome to <?php bloginfo( 'name' ); ?></h1>
        <p><?php bloginfo( 'description' ); ?></p>
    </section>

    <section class="latest-posts">
        <h2>Latest Posts</h2>
        <?php
        $recent = new WP_Query( array( 'posts_per_page' => 3 ) );
        if ( $recent->have_posts() ) :
            while ( $recent->have_posts() ) : $recent->the_post(); ?>
                <article>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </section>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
