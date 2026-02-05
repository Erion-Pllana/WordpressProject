</main>

<footer class="site-footer">
    <div class="wrap footer-line">
        <nav class="footer-navigation">
            <?php wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-menu'
            )); ?>
        </nav>

        <div class="site-info">
            © <?php echo date('Y'); ?> EcoSphere. All rights reserved.
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>">Contact</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
