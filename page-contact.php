<?php
/* Template Name: Contact */
get_header(); ?>

<div class="wrap main-layout">
    <div class="content-area">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>
        <?php endwhile; ?>

        <section class="about-content">
            <h2>About this content</h2>
            <p>This page helps you connect with EcoSphere — whether you have a contribution, partnership idea, or a question about our guides. Use the contact form or the details below to reach the right person quickly.</p>
        </section>

        <section class="contact-info">
            <h2>Contact Information</h2>
            <p>Email: <a href="mailto:hello@ecosphere.org">hello@ecosphere.org</a></p>
            <p>Phone: +1 (555) 123-4567</p>
            <p>Address: 123 Green Way, Springfield</p>
            <p>Hours: Mon–Fri, 9am–5pm local time</p>
        </section>

        <section class="contact-form">
            <h2>Send Us a Message</h2>
            <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
                <input type="hidden" name="action" value="ecosphere_contact">
                <p><label>Name<br><input type="text" name="name" required></label></p>
                <p><label>Email<br><input type="email" name="email" required></label></p>
                <p><label>Subject<br><input type="text" name="subject"></label></p>
                <p><label>Message<br><textarea name="message" rows="6" required></textarea></label></p>
                <p><button type="submit">Send</button></p>
            </form>
        </section>

        <section class="map-placeholder">
            <h2>Our Location</h2>
            <p class="muted">Map below is a general location. Click to open in Google Maps.</p>
            <a href="https://www.google.com/maps/search/?api=1&query=123+Green+Way+Springfield" target="_blank" rel="noopener">
                <img src="https://placehold.co/800x300?text=Map+Preview" alt="Map preview for EcoSphere location" style="width:100%;border:1px solid #dfe9df;border-radius:6px;">
            </a>
        </section>

        <section class="faq">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item"><strong>How can I contribute?</strong><p>Share guides, volunteer, or support our projects.</p></div>
            <div class="faq-item"><strong>Do you accept donations?</strong><p>Yes — we work with certified NGOs and will add donation links here.</p></div>
        </section>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
