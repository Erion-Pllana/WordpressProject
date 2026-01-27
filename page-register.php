<?php
/* Template Name: Register Page */

get_header();

if ( isset($_POST['register_nonce']) && wp_verify_nonce($_POST['register_nonce'], 'register_user') ) {

  $user_id = wp_create_user(
    sanitize_text_field($_POST['username']),
    $_POST['password'],
    sanitize_email($_POST['email'])
  );

  if ( !is_wp_error($user_id) ) {
    wp_update_user([
      'ID' => $user_id,
      'role' => 'client'
    ]);
    wp_redirect(wp_login_url());
    exit;
  }
}
?>

<main class="container auth-page">
  <h1>Create Account</h1>

  <form method="post">
    <?php wp_nonce_field('register_user', 'register_nonce'); ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" class="btn-primary">Register</button>
  </form>
</main>

<?php get_footer(); ?>
