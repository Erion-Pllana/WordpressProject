<?php
/* Front Page Template */
get_header();
?>

<div class="hero">
    <div class="wrap">
        <h1>Welcome to EcoSphere</h1>
        <p>Discover guides, tips and resources to live more sustainably.</p>
    </div>
 </div>

<div class="wrap main-layout">
    <section class="about-content card" data-reveal="fade-up">
        <h2>About this content</h2>
        <p>This homepage highlights our latest eco-guides and blog posts to help you find practical, evidence-based actions quickly. Use the sections below to explore guides, trending topics, and featured articles curated by our editors.</p>
    </section>
    <section class="featured-ecoguides">
        <h2>Latest Eco Guides</h2>
        <div class="grid">
            <?php
            $args = array('post_type'=>'ecoguide','posts_per_page'=>4);
            $eco = new WP_Query($args);
            if ($eco->have_posts()) : while ($eco->have_posts()) : $eco->the_post(); ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="excerpt"><?php echo wp_trim_words(get_the_excerpt(),18); ?></div>
                </article>
            <?php endwhile; wp_reset_postdata(); else: ?>
                <p><?php _e('No guides found.','ecosphere'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="latest-posts">
        <h2>From the Blog</h2>
        <?php
        $blog = new WP_Query(array('post_type'=>'post','posts_per_page'=>3));
        if ($blog->have_posts()) : while ($blog->have_posts()) : $blog->the_post(); ?>
            <article>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="meta"><?php the_time('F j, Y'); ?></div>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; wp_reset_postdata(); else: ?>
            <p><?php _e('No blog posts yet.','ecosphere'); ?></p>
        <?php endif; ?>
    </section>

    <section class="featured-topics">
        <h2>Explore Topics</h2>
        <div class="grid">
            <article class="card"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'resources' ) ) ); ?>">Sustainable Gardening</a></h3><p>Native plants, soil health and biodiversity.</p></article>
            <article class="card"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Climate Action</a></h3><p>Local and global actions to reduce emissions.</p></article>
            <article class="card"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'resources' ) ) ); ?>">Zero Waste</a></h3><p>Reduce, reuse, recycle, and resourceful living.</p></article>
            <article class="card"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Wildlife Conservation</a></h3><p>Protecting habitats and species in your area.</p></article>
        </div>
    </section>

    <section class="newsletter">
        <h2>Stay Updated</h2>
        <p>Get monthly eco-tips and featured guides.</p>
        <form class="newsletter-form"><input type="email" placeholder="Your email"><button>Subscribe</button></form>
    </section>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
