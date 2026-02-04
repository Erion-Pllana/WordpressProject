    </main>

    <footer class="site-footer">
        <div class="wrap">
            <nav class="footer-navigation">
                <?php wp_nav_menu(array('theme_location'=>'footer','container'=>false,'menu_class'=>'footer-menu')); ?>
            </nav>
            <div class="footer-blurb">
                <p>EcoSphere shares practical guides, community stories, and research-backed tips to help you live more sustainably. New articles every week — <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>">get in touch</a> or subscribe for updates.</p>
            </div>
            <div class="site-info">&copy; <?php echo date('Y'); ?> EcoSphere. All rights reserved.</div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
