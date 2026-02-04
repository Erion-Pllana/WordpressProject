<?php
/* Template Name: About */
get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>

            <section class="mission">
                <h2>Our Mission</h2>
                <p>EcoSphere exists to inform, inspire and empower people to make sustainable choices that protect nature and biodiversity. We create practical guides, curate resources, and build a caring community.</p>
            </section>

            <section class="vision">
                <h2>Our Vision</h2>
                <p>We envision a world where everyday actions contribute to a healthy planet—clean air, thriving ecosystems, and resilient communities.</p>
            </section>

            <section class="team">
                <h2>Meet the Team</h2>
                <div class="team-grid">
                    <div class="team-member"><h3>Alice Green</h3><p>Founder & Conservationist</p></div>
                    <div class="team-member"><h3>Ravi Patel</h3><p>Editor & Researcher</p></div>
                    <div class="team-member"><h3>Maria Lopez</h3><p>Community Manager</p></div>
                </div>
            </section>

            <section class="timeline">
                <h2>Journey So Far</h2>
                <ul>
                    <li><strong>2021:</strong> EcoSphere launched with 10 guides.</li>
                    <li><strong>2022:</strong> Grew community initiatives and partnerships.</li>
                    <li><strong>2024:</strong> Published multi-region conservation reports.</li>
                </ul>
            </section>

            <section class="cta">
                <h2>Join Us</h2>
                <p>Sign up for updates and monthly actions you can take to help nature.</p>
                <form class="newsletter-form"><input type="email" placeholder="Your email"><button>Subscribe</button></form>
            </section>

        <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
