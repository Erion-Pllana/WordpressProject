    </main>

    <footer class="site-footer">
        <div class="wrap">
            <nav class="footer-navigation">
                <?php wp_nav_menu(array('theme_location'=>'footer','container'=>false,'menu_class'=>'footer-menu')); ?>
            </nav>
            <div class="site-info">&copy; <?php echo date('Y'); ?> EcoSphere. All rights reserved.</div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
