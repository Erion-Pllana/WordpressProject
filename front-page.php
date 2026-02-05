<?php
/* Front Page Template */
get_header();
?>

<div class="hero">
    <div class="wrap">
        <h1>Welcome to EcoSphere</h1>
        <p>Your comprehensive guide to sustainable living. Discover practical eco-friendly solutions, expert tips, and evidence-based strategies to reduce your environmental impact and build a more sustainable future for our planet.</p>
        <a href="#guides" class="cta-button">Explore Our Guides</a>
    </div>
 </div>

<div class="wrap main-layout">
    <section class="about-content card" data-reveal="fade-up">
        <h2>About EcoSphere</h2>
        <p>EcoSphere is dedicated to empowering individuals and communities to make informed environmental choices. Our mission is to provide accessible, science-backed information on sustainable living practices that are both effective and achievable for everyday life.</p>
        <p>Whether you're just beginning your sustainability journey or looking to deepen your environmental impact, we offer curated guides, real-world case studies, and actionable tips from industry experts. Our content covers everything from renewable energy and waste reduction to organic gardening and ethical consumption—all designed to help you make a positive difference.</p>
        <p>Browse our latest guides and articles below to find solutions tailored to your lifestyle and values.</p>
    </section>
    <section class="featured-ecoguides" id="guides">
        <h2>Latest Eco Guides</h2>
        <p class="section-intro">Our comprehensive guides break down complex environmental topics into practical, actionable steps you can implement today. Each guide is thoroughly researched and written by sustainability experts.</p>
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
        <div class="blog-grid">
            <?php
            $blog = new WP_Query(array('post_type'=>'post','posts_per_page'=>3));
            if ($blog->have_posts()) : while ($blog->have_posts()) : $blog->the_post(); ?>
                <article class="blog-card card" data-reveal="fade-up">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="blog-thumbnail"><?php the_post_thumbnail('medium'); ?></a>
                    <?php endif; ?>
                    <div class="blog-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="meta">
                            <span class="author"><?php echo get_the_author(); ?></span>
                            <span class="date"><?php the_time('F j, Y'); ?></span>
                        </div>
                        <div class="excerpt"><?php echo wp_trim_words(get_the_excerpt(),20); ?></div>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); else: ?>
                <p class="no-posts"><?php _e('Check back soon for new articles!','ecosphere'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="featured-topics">
        <h2>Explore Our Topic Areas</h2>
        <p class="section-intro">Dive deeper into the environmental topics that matter most. Each category offers in-depth articles, how-to guides, and expert insights.</p>
        <div class="grid">
            <article class="card" data-reveal="fade-up"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'resources' ) ) ); ?>">Sustainable Gardening</a></h3><p>Learn how to create thriving gardens using native plants, improve soil health naturally, and support local biodiversity. Discover composting techniques, water conservation strategies, and pesticide-free gardening methods.</p></article>
            <article class="card" data-reveal="fade-up"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Climate Action</a></h3><p>Understand climate change and explore actionable steps you can take at home and in your community. From renewable energy adoption to carbon footprint reduction, learn how individual actions create collective impact.</p></article>
            <article class="card" data-reveal="fade-up"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'resources' ) ) ); ?>">Zero Waste Living</a></h3><p>Master the principles of reduce, reuse, and recycle. Explore sustainable alternatives to single-use products, learn packaging-free shopping strategies, and develop a zero-waste lifestyle that works for your household.</p></article>
            <article class="card" data-reveal="fade-up"><h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Wildlife Conservation</a></h3><p>Discover how to protect local ecosystems and wildlife habitats. Learn about endangered species in your region, support conservation efforts, and create wildlife-friendly spaces in your own backyard.</p></article>
        </div>
    </section>

    <sectionJoin Our Community</h2>
        <p>Subscribe to receive monthly eco-tips, featured guides, and exclusive insights delivered straight to your inbox. Stay informed about the latest sustainability trends and be part of a growing community committed to environmental action.</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Enter your email address" required>
            <button type="submit">Subscribe Now</button>
        </form>
        <p class="newsletter-note">We respect your privacy. Unsubscribe at any time. No spam, just actionable sustainability content.</p
        <form class="newsletter-form"><input type="email" placeholder="Your email"><button>Subscribe</button></form>
    </section>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
