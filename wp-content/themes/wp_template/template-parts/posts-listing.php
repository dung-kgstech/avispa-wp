<main id="primary" class="site-main listing-page">
    <div class="site-container">
        <header class="page-header">
            <?php if (is_archive()) : ?>
                <h1><?php the_archive_title(); ?></h1>
                <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
            <?php else : ?>
                <h1><?php esc_html_e('News', 'avispa'); ?></h1>
            <?php endif; ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="post-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'card'); ?>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(array('mid_size' => 1)); ?>
        <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
</main>
