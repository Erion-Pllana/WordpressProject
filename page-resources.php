<?php
/* Template Name: Resources */
get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>

            <section class="resources-list">
                <h2>External Resources</h2>
                <ul class="resource-list">
                    <li><a href="#">Sustainability 101 — Beginner's guide to green living</a></li>
                    <li><a href="#">Community Conservation Networks — Find local groups</a></li>
                    <li><a href="#">Eco Product Reviews — Trusted sustainable buys</a></li>
                    <li><a href="#">Research & Reports — Latest studies on biodiversity</a></li>
                </ul>
            </section>

            <section class="downloads">
                <h2>Downloadable Guides</h2>
                <ul>
                    <li><a href="#">Zero Waste Starter Kit (PDF)</a></li>
                    <li><a href="#">Native Planting Guide (PDF)</a></li>
                </ul>
            </section>

            <section class="partners">
                <h2>Partners & Organizations</h2>
                <p>We collaborate with local NGOs and research institutions to bring trustworthy resources.</p>
            </section>

        <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
