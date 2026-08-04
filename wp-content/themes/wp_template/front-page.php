<?php
/**
 * Front page template.
 *
 * @package Avispa
 */

get_header();

$home_sections = array(
    'ticket',
    'fanclub-guide',
    'news',
    'movie',
    'top-team',
    'goods',
    'partners',
);
?>

<main id="primary" class="site-main home-page">
    <?php get_template_part('template-parts/home/banner'); ?>

    <?php get_template_part('template-parts/home/match'); ?>

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

    <?php foreach ($home_sections as $home_section) : ?>
        <?php get_template_part('template-parts/home/' . $home_section); ?>
    <?php endforeach; ?>
</main>

<?php get_footer(); ?>
