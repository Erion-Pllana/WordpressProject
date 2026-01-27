<?php
/* Template Name: Booking Page */

if ( !is_user_logged_in() ) {
  wp_redirect(wp_login_url());
  exit;
}

get_header();
?>

<main class="container booking-page">
  <h1>Book an Appointment</h1>

  <form method="post" class="booking-form">
    <?php wp_nonce_field('create_booking', 'booking_nonce'); ?>

    <?php
      get_template_part('template-parts/booking/step', 'service');
      get_template_part('template-parts/booking/step', 'date');
      get_template_part('template-parts/booking/step', 'time');
      get_template_part('template-parts/booking/step', 'confirm');
    ?>
  </form>
</main>

<?php get_footer(); ?>
