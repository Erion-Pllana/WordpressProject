<?php
/*
Template Name: Contact
*/
get_header();

// Handle basic contact form submission
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['wp_contact_nonce'] ) && wp_verify_nonce( $_POST['wp_contact_nonce'], 'wp_contact' ) ) {
    $name = sanitize_text_field( $_POST['contact_name'] );
    $email = sanitize_email( $_POST['contact_email'] );
    $message = sanitize_textarea_field( $_POST['contact_message'] );

    $to = get_option( 'admin_email' );
    $subject = sprintf( 'Contact form message from %s', $name ?: $email );
    $body = "From: $name <$email>\n\n" . $message;

    if ( wp_mail( $to, $subject, $body ) ) {
        $contact_sent = true;
    } else {
        $contact_error = true;
    }
}
?>

<main class="site-main">
    <article>
        <h1><?php the_title(); ?></h1>

        <?php if ( ! empty( $contact_sent ) ) : ?>
            <p>Thank you — your message was sent.</p>
        <?php elseif ( ! empty( $contact_error ) ) : ?>
            <p>Sorry — there was an error sending your message.</p>
        <?php endif; ?>

        <form method="post">
            <?php wp_nonce_field( 'wp_contact', 'wp_contact_nonce' ); ?>
            <p><label>Name<br><input type="text" name="contact_name" required></label></p>
            <p><label>Email<br><input type="email" name="contact_email" required></label></p>
            <p><label>Message<br><textarea name="contact_message" rows="6" required></textarea></label></p>
            <p><button type="submit">Send</button></p>
        </form>
    </article>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
