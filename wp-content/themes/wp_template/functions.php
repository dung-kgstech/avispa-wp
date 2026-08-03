<?php
/**
 * Theme setup and shared helpers.
 *
 * @package Avispa
 */

if (!defined('ABSPATH')) {
    exit;
}

function avispa_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(array(
        'primary' => __('Primary navigation', 'avispa'),
    ));
}
add_action('after_setup_theme', 'avispa_theme_setup');
/**
 * Return the shared social media configuration.
 *
 * @param string $context Asset context: default or footer-mobile.
 * @return array<int, array<string, string>>
 */
function avispa_get_social_items($context = 'default') {
    $items = array(
        array('label' => 'X', 'icon' => 'x-logo.webp', 'url' => '#'),
        array('label' => 'Instagram', 'icon' => 'instagram-logo.webp', 'url' => '#'),
        array('label' => 'Facebook', 'icon' => 'facebook-logo.webp', 'url' => '#'),
        array('label' => 'LINE', 'icon' => 'line-logo.webp', 'url' => '#'),
        array('label' => 'TikTok', 'icon' => 'tiktok-logo.webp', 'url' => '#'),
        array('label' => 'YouTube', 'icon' => 'youtube-logo.webp', 'url' => '#'),
    );

    if ('footer-mobile' !== $context) {
        return $items;
    }

    $items = array_slice($items, 0, 5);
    foreach ($items as &$item) {
        $item['icon'] = str_replace('-logo.webp', '-logo-footer.webp', $item['icon']);
    }
    unset($item);

    return $items;
}

function avispa_enqueue_assets() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style('avispa-theme', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('avispa-base', $theme_uri . '/css/base.css', array('avispa-theme'), filemtime($theme_dir . '/css/base.css'));
    wp_enqueue_style('avispa-header', $theme_uri . '/css/header.css', array('avispa-base'), filemtime($theme_dir . '/css/header.css'));
    wp_enqueue_style('avispa-footer', $theme_uri . '/css/footer.css', array('avispa-base'), filemtime($theme_dir . '/css/footer.css'));

    wp_enqueue_script('avispa-common', $theme_uri . '/common.js', array('jquery'), filemtime($theme_dir . '/common.js'), true);

    if (is_front_page()) {
        wp_enqueue_style('avispa-home', $theme_uri . '/css/home.css', array('avispa-base'), filemtime($theme_dir . '/css/home.css'));
        wp_enqueue_script('avispa-home', $theme_uri . '/home.js', array('avispa-common'), filemtime($theme_dir . '/home.js'), true);
    }
}
add_action('wp_enqueue_scripts', 'avispa_enqueue_assets');

function avispa_category_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'avispa_category_posts_per_page');

function avispa_breadcrumbs() {
    if (is_front_page()) {
        return '';
    }

    $items = array(
        sprintf('<a href="%s">%s</a>', esc_url(home_url('/')), esc_html__('Home', 'avispa')),
    );

    if (is_singular()) {
        foreach (array_reverse(get_post_ancestors(get_the_ID())) as $ancestor_id) {
            $items[] = sprintf(
                '<a href="%s">%s</a>',
                esc_url(get_permalink($ancestor_id)),
                esc_html(get_the_title($ancestor_id))
            );
        }
        $items[] = sprintf('<span aria-current="page">%s</span>', esc_html(get_the_title()));
    } elseif (is_archive()) {
        $items[] = sprintf('<span aria-current="page">%s</span>', esc_html(get_the_archive_title()));
    }

    return '<nav class="breadcrumbs" aria-label="Breadcrumb">' . implode('<span class="breadcrumbs__separator">/</span>', $items) . '</nav>';
}
add_shortcode('my_breadcrumbs', 'avispa_breadcrumbs');

remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');
