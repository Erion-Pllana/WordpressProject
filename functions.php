function rbp_enqueue_assets() {
  wp_enqueue_style(
    'rbp-main-style',
    get_template_directory_uri() . '/assets/css/main.css',
    [],
    '1.0'
  );
}
add_action('wp_enqueue_scripts', 'rbp_enqueue_assets');