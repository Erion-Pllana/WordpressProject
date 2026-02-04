<?php
/*
Template Name: Blog
Description: A rich blog landing page with featured post, category filters, tag cloud and paginated posts.
*/
get_header();

?>

<div class="wrap main-layout blog-landing">
    <div class="content-area">
        <header class="page-header">
            <h1>EcoSphere Blog</h1>
            <p class="lead">Stories, guides, and news about sustainability, nature, and community action. Explore in-depth articles and practical tips.</p>
        </header>

        <?php
        // Featured post (most recent sticky or latest)
        $featured_args = array('posts_per_page'=>1,'post_type'=>'post');
        $sticky = get_option('sticky_posts');
        if (!empty($sticky)) {
            $featured_args['post__in'] = $sticky;
            $featured_args['ignore_sticky_posts'] = 1;
        }
        $featured = new WP_Query($featured_args);
        if ($featured->have_posts()) : while ($featured->have_posts()) : $featured->the_post(); ?>
            <article class="featured-post">
                <?php if ( has_post_thumbnail() ) : ?><div class="featured-image"><?php the_post_thumbnail('large'); ?></div><?php endif; ?>
                <div class="featured-content">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta"><?php the_time('F j, Y'); ?> | <?php the_author(); ?></div>
                    <div class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>

        <div class="blog-filters">
            <div class="categories">
                <h3>Categories</h3>
                <ul>
                    <?php wp_list_categories(array('title_li'=>false,'show_count'=>true)); ?>
                </ul>
            </div>
            <div class="tags">
                <h3>Tags</h3>
                <div class="tag-cloud">
                    <?php wp_tag_cloud(array('smallest'=>10,'largest'=>14,'unit'=>'px','number'=>30)); ?>
                </div>
            </div>
        </div>

        <section class="recent-posts">
            <h2>Recent Posts</h2>
            <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array('post_type'=>'post','posts_per_page'=>6,'paged'=>$paged);
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                <article <?php post_class('list-item'); ?>>
                    <?php if (has_post_thumbnail()) : ?><a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><?php endif; ?>
                    <div class="inner">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="meta"><?php the_time('F j, Y'); ?> | <?php the_author(); ?></div>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        <p class="read-more"><a href="<?php the_permalink(); ?>">Read more »</a></p>
                    </div>
                </article>
            <?php endwhile; ?>

            <div class="pagination"><?php echo paginate_links(array('total'=>$loop->max_num_pages)); ?></div>

            <?php wp_reset_postdata(); else: ?>
                <p><?php _e('No posts found.','ecosphere'); ?></p>
            <?php endif; ?>
        </section>

        <section class="editor-picks">
            <h2>Editor Picks</h2>
            <div class="grid">
                <?php
                $picks = new WP_Query(array('posts_per_page'=>3,'orderby'=>'comment_count'));
                if ($picks->have_posts()) : while ($picks->have_posts()) : $picks->the_post(); ?>
                    <article class="card"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo wp_trim_words(get_the_excerpt(),20); ?></p></article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </section>

    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
