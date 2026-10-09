<?php

/**
 * Homepage news section.
 *
 * @package Avispa
 */

$posts_page_id = (int) get_option('page_for_posts');
$news_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/news/');
$news_query = new WP_Query(array(
    'post_type'           => 'post',
    'posts_per_page'      => 8,
    'ignore_sticky_posts' => true,
));
$news_posts = $news_query->posts;
$news_image_path = get_template_directory() . '/images/home/new.webp';
$news_image_url = get_template_directory_uri() . '/images/home/new.webp';
$fallback_title = 'タイトルが入る。タイトルが入る。タイトルが入る。タイトルが入る。';
$fallback_row_title = 'ニュースのタイトルが入る。ニュースのタイトルが入る。ニュースのタイトルが入る。ニュースのタイトルが入る。ニュースのタイトルが入る。';
$fallback_row_categories = array('お知らせ', 'チケット', '試合・練習', 'ホームタウン活動');
$label_modifiers = array('notice', 'ticket', 'match', 'hometown');
$category_labels = array('ALL', 'ニュース', 'チケット', 'トップチーム', '試合・練習', 'グッズ・ショップ', 'アカデミー', 'スクール', 'ホームタウン活動', 'その他');
?>
<section class="home-latest-news" aria-labelledby="home-latest-news-title">
    <header class="home-latest-news__header">
        <h2 id="home-latest-news-title">NEWS</h2>
        <p>ニュース</p>
    </header>

    <nav class="home-latest-news__categories" aria-label="ニュースカテゴリー">
        <div class="home-latest-news__categories-track">
            <?php foreach ($category_labels as $index => $label) : ?>
                <a class="home-latest-news__category<?php echo 0 === $index ? ' is-active' : ''; ?>" href="<?php echo esc_url($news_url); ?>">
                    <?php echo esc_html($label); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <div class="site-container home-latest-news__inner">
        <div class="home-latest-news__featured">
            <?php for ($index = 0; $index < 4; $index++) :
                $news_post = $news_posts[$index] ?? null;
                $post_url = $news_post ? get_permalink($news_post) : $news_url;
                $post_title = $fallback_title;
                $post_date = '2026.00.00';
                $category = 'お知らせ';
            ?>
                <article class="home-news-card">
                    <a href="<?php echo esc_url($post_url); ?>">
                        <img src="<?php echo esc_url($news_image_url . '?ver=' . filemtime($news_image_path)); ?>" alt="" loading="lazy">
                        <h3><?php echo esc_html($post_title); ?></h3>
                        <div class="home-news-card__meta">
                            <time><?php echo esc_html($post_date); ?></time>
                            <span class="home-news-label home-news-label--notice"><?php echo esc_html($category); ?></span>
                        </div>
                    </a>
                </article>
            <?php endfor; ?>
        </div>

        <div class="home-latest-news__list">
            <?php for ($index = 4; $index < 8; $index++) :
                $news_post = $news_posts[$index] ?? null;
                $row_index = $index - 4;
                $post_url = $news_post ? get_permalink($news_post) : $news_url;
                $post_title = $fallback_row_title;
                $post_date = '2026.00.00';
                $category = $fallback_row_categories[$row_index];
            ?>
                <article class="home-news-row">
                    <a href="<?php echo esc_url($post_url); ?>">
                        <div class="home-news-row__meta">
                            <time><?php echo esc_html($post_date); ?></time>
                            <span class="home-news-label home-news-label--<?php echo esc_attr($label_modifiers[$row_index]); ?>"><?php echo esc_html($category); ?></span>
                        </div>
                        <h3><?php echo esc_html($post_title); ?></h3>
                    </a>
                </article>
            <?php endfor; ?>
        </div>

        <a class="home-latest-news__button" href="<?php echo esc_url($news_url); ?>">すべてのニュースを見る</a>
    </div>
</section>
<?php wp_reset_postdata(); ?>