<?php get_header(); ?>
<main id="primary" class="site-main error-page">
    <div class="site-container empty-state">
        <p class="error-page__code">404</p>
        <h1><?php esc_html_e('Page not found', 'avispa'); ?></h1>
        <p><?php esc_html_e('The page may have moved or no longer exists.', 'avispa'); ?></p>
        <a class="button-link" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'avispa'); ?></a>
    </div>
</main>
<?php get_footer(); ?>
