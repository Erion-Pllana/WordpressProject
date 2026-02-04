<?php
/* Template Name: Resources */
get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>

            <section class="about-content">
                <h2>About this content</h2>
                <p>These resources are selected to give you trustworthy starting points—guides, downloads and research reports that support practical action. Each link includes a short summary to help you choose what to read next.</p>
            </section>

            <section class="resources-list">
                <h2>External Resources</h2>
                <ul class="resource-list">
                    <li><a href="https://www.epa.gov/sustainability" target="_blank" rel="noopener">Sustainability 101 — Beginner's guide to green living (EPA)</a></li>
                    <li><a href="https://www.nationalparks.org/our-work/conservation" target="_blank" rel="noopener">Community Conservation Networks — Find local groups</a></li>
                    <li><a href="https://www.goodguide.org/" target="_blank" rel="noopener">Eco Product Reviews — Trusted sustainable buys</a></li>
                    <li><a href="https://www.ipbes.net/" target="_blank" rel="noopener">Research & Reports — Latest studies on biodiversity</a></li>
                </ul>
            </section>

            <section class="downloads">
                <h2>Downloadable Guides</h2>
                <ul>
                    <li><a href="/downloads/zero-waste-starter-kit.pdf">Zero Waste Starter Kit (PDF)</a></li>
                    <li><a href="/downloads/native-planting-guide.pdf">Native Planting Guide (PDF)</a></li>
                </ul>
                <p class="muted">If these files aren't present yet, you can upload them to the `downloads` folder in the site root or link to external copies.</p>
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
