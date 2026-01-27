<?php
/* Template Name: Provider Dashboard */

if ( !is_user_logged_in() ) {
  wp_redirect(wp_login_url());
  exit;
}

$user = wp_get_current_user();
if ( !in_array('provider', $user->roles) ) {
  wp_redirect(home_url());
  exit;
}

get_header();
?>

<main class="container dashboard">
  <h1>Provider Dashboard</h1>

  <section>
    <h2>Upcoming Bookings</h2>

    <?php
    $appointments = new WP_Query([
      'post_type' => 'appointment',
      'meta_query' => [
        [
          'key' => 'provider_id',
          'value' => get_current_user_id()
        ]
      ]
    ]);

    if ($appointments->have_posts()) :
      while ($appointments->have_posts()) : $appointments->the_post();
    ?>
        <div class="appointment-card">
          <h3><?php the_title(); ?></h3>
          <p><?php echo get_post_meta(get_the_ID(), 'appointment_date', true); ?></p>
        </div>
    <?php
      endwhile;
    else :
      echo '<p>No upcoming appointments.</p>';
    endif;
    wp_reset_postdata();
    ?>
  </section>
</main>

<?php get_footer(); ?>
