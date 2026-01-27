<?php
/* Template Name: Home Page */
get_header();
?>

<main class="container home-page">

  <section class="hero">
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    <a href="<?php echo site_url('/booking'); ?>" class="btn-primary">
      Book an Appointment
    </a>
  </section>

  <section class="services-preview">
    <h2>Popular Services</h2>

    <div class="grid">
      <?php
      $services = new WP_Query([
        'post_type' => 'service',
        'posts_per_page' => 3
      ]);

      while ($services->have_posts()) : $services->the_post();
        get_template_part('template-parts/service/service', 'card');
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>
