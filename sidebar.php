<aside id="secondary" class="widget-area">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
        <section class="widget">
            <h3 class="widget-title">Search</h3>
            <?php get_search_form(); ?>
        </section>
        <section class="widget">
            <h3 class="widget-title">Recent Posts</h3>
            <ul>
            <?php
            $recent = wp_get_recent_posts(array('numberposts'=>5,'post_status'=>'publish'));
            foreach($recent as $post) {
                echo '<li><a href="' . get_permalink($post['ID']) . '">' . esc_html($post['post_title']) . '</a></li>';
            }
            ?>
            </ul>
        </section>
    <?php endif; ?>
</aside>
