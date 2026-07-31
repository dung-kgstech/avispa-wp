<?php
/**
 * Front page template.
 *
 * @package Avispa
 */

get_header();
?>

<main id="primary" class="site-main home-page">
    <section class="home-hero" aria-labelledby="home-title">
        <div class="site-container home-hero__inner">
            <p class="home-hero__eyebrow"><?php esc_html_e('AVISPA FUKUOKA', 'avispa'); ?></p>
            <h1 id="home-title" class="home-hero__title"><?php echo esc_html(get_bloginfo('name')); ?></h1>
            <p class="home-hero__lead"><?php echo esc_html(get_bloginfo('description')); ?></p>
        </div>
    </section>

    <?php get_template_part('template-parts/home/todays', 'schedule'); ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php if (trim(get_the_content())) : ?>
                <section class="home-content">
                    <div class="site-container entry-content">
                        <?php the_content(); ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <section class="home-news" aria-labelledby="latest-news-title">
        <div class="site-container">
            <?php
            $posts_page_id = (int) get_option('page_for_posts');
            $news_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/news/');
            ?>
            <div class="section-heading">
                <div>
                    <p class="section-heading__eyebrow"><?php esc_html_e('LATEST', 'avispa'); ?></p>
                    <h2 id="latest-news-title"><?php esc_html_e('News', 'avispa'); ?></h2>
                </div>
                <a class="section-heading__link" href="<?php echo esc_url($news_url); ?>">
                    <?php esc_html_e('View all', 'avispa'); ?>
                </a>
            </div>

            <?php
            $latest_news = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'ignore_sticky_posts' => true,
            ));
            ?>

            <?php if ($latest_news->have_posts()) : ?>
                <div class="post-grid">
                    <?php while ($latest_news->have_posts()) : $latest_news->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'card'); ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <?php get_template_part('template-parts/home/goods'); ?>

    <?php get_template_part('template-parts/home/partners'); ?>
</main>

<?php get_footer(); ?>
