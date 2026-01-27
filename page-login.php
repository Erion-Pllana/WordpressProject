<?php
/* Template Name: Login Page */

if ( is_user_logged_in() ) {
  wp_redirect(home_url('/dashboard'));
  exit;
}

get_header();
?>

<main class="container auth-page">
  <h1>Login</h1>

  <?php wp_login_form([
    'redirect' => home_url('/dashboard'),
    'remember' => true
  ]); ?>
</main>

<?php get_footer(); ?>
