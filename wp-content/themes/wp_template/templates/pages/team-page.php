<?php

/**
 * Template Name: team Page
 *
 * @package Avispa
 */

get_header();
?>

<div class="team-page-header team-page-header template_page">
    <section class="team-banner has-image">
        <div class="team-banner-inner">
            <div class="team-banner-text">
                <span class="team-banner-subtitle">TEAM</span>
                <h1 class="team-banner-title">トップチーム選手・スタッフ</h1>
            </div>
        </div>

        <div class="team-banner-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/team/team-bg.webp" alt="トップチーム選手・スタッフ">
        </div>
    </section>

    <nav class="team-breadcrumb" aria-label="Breadcrumb">
        <div class="team-breadcrumb-inner container_1440" typeof="BreadcrumbList" vocab="https://schema.org/">
            <span property="itemListElement" typeof="ListItem"><span property="name">ホーム</span>
                <meta property="position" content="1">
            </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">TEAM – 選手・クラブ</span>
                <meta property="position" content="2">
            </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name" class="post post-page current-item">TEAM-トップチーム選手・スタッフ</span>
                <meta property="url" content="https://www.avispa.co.jp/team/topteam">
                <meta property="position" content="3">
            </span>
        </div>
    </nav>
</div>

<div id="primary" class="team-bg">
    <div class="team-main">
        <ul class="team_anc">
            <li><a href="#link1"><span>GK /ゴールキーパー</span></a></li>
            <li><a href="#link2"><span>DF&nbsp;/ディフェンダー</span></a></li>
            <li><a href="#link3"><span>MF&nbsp;/<br>ミッドフィルダー</span></a></li>
            <li><a href="#link4"><span>FW&nbsp;/フォワード</span></a></li>
        </ul>

        <div class="team_boxes">
            <div class="team_box">
                <div id="link1" class="anclink"></div>
                <h2 class="team_boxes_ttl">GK /ゴールキーパー</h2>
                <?php
                $players = new WP_Query([
                    'post_type'      => 'player',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,

                    'meta_query'     => [
                        [
                            'key'     => 'position',
                            'value'   => 'GK',
                            'compare' => '=',
                        ],
                    ],
                ]);
                ?>
                <div class="team_box_lists">
                    <?php if ($players->have_posts()) : ?>
                        <?php while ($players->have_posts()) : $players->the_post(); ?>

                            <?php
                            $player_id = get_the_ID();

                            $player_avarta = get_post_meta($player_id, 'player_avarta', true);
                            $player_avarta_url = wp_get_attachment_image_url($player_avarta, 'medium');
                            $player_number = get_post_meta($player_id, 'player_number', true);
                            $player_name_kanji = get_post_meta($player_id, 'player_name_kanji', true);
                            $player_name_romaji = get_post_meta($player_id, 'player_name_romaji', true);
                            ?>

                            <div class="team_box_list">
                                <div class="team_box_list_img">
                                    <img
                                        src="<?php echo esc_url($player_avarta_url); ?>"
                                        alt="<?php echo esc_attr($player_name_kanji); ?>">

                                    <div class="team_box_list_name">
                                        <div class="team_box_list_name_num">
                                            <?php echo esc_html($player_number); ?>
                                        </div>

                                        <div class="team_box_list_name_jp">
                                            <?php echo esc_html($player_name_kanji); ?>
                                        </div>

                                        <div class="team_box_list_name_en">
                                            <?php echo esc_html($player_name_romaji); ?>
                                        </div>
                                    </div>

                                    <ul class="team_box_list_sns">
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_x.png" alt="X">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_ig.png" alt="Instagram">
                                            </a>
                                        </li>
                                    </ul>

                                    <a href="<?php the_permalink(); ?>" class="team_box_list_link"></a>
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                            </div>
                </div>
            </div>

            <div class="team_boxes">
                <div class="team_box">
                    <div id="link1" class="anclink"></div>
                    <h2 class="team_boxes_ttl">DF /ディフェンダー</h2>
                    <?php
                    $players = new WP_Query([
                        'post_type'      => 'player',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,

                        'meta_query'     => [
                            [
                                'key'     => 'position',
                                'value'   => 'DF',
                                'compare' => '=',
                            ],
                        ],
                    ]);
                    ?>
                    <div class="team_box_lists">
                        <?php if ($players->have_posts()) : ?>
                            <?php while ($players->have_posts()) : $players->the_post(); ?>

                                <?php
                                $player_id = get_the_ID();

                                $player_number = get_post_meta($player_id, 'player_number', true);
                                $player_name_kanji = get_post_meta($player_id, 'player_name_kanji', true);
                                $player_name_romaji = get_post_meta($player_id, 'player_name_romaji', true);
                                ?>

                                <div class="team_box_list">
                                    <div class="team_box_list_img">
                                        <img
                                            src="<?php echo esc_url(get_template_directory_uri() . '/images/topteam/player_3.webp'); ?>"
                                            alt="<?php echo esc_attr($player_name_kanji); ?>">
                                    </div>

                                    <div class="team_box_list_name">
                                        <div class="team_box_list_name_num">
                                            <?php echo esc_html($player_number); ?>
                                        </div>

                                        <div class="team_box_list_name_jp">
                                            <?php echo esc_html($player_name_kanji); ?>
                                        </div>

                                        <div class="team_box_list_name_en">
                                            <?php echo esc_html($player_name_romaji); ?>
                                        </div>
                                    </div>

                                    <ul class="team_box_list_sns">
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_x.png" alt="X">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_ig.png" alt="Instagram">
                                            </a>
                                        </li>
                                    </ul>

                                    <a href="<?php the_permalink(); ?>" class="team_box_list_link"></a>
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="team_boxes">
                <div class="team_box">
                    <div id="link1" class="anclink"></div>
                    <h2 class="team_boxes_ttl">MF /ミッドフィルダー</h2>
                    <?php
                    $players = new WP_Query([
                        'post_type'      => 'player',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,

                        'meta_query'     => [
                            [
                                'key'     => 'position',
                                'value'   => 'MF',
                                'compare' => '=',
                            ],
                        ],
                    ]);
                    ?>
                    <div class="team_box_lists">
                        <?php if ($players->have_posts()) : ?>
                            <?php while ($players->have_posts()) : $players->the_post(); ?>

                                <?php
                                $player_id = get_the_ID();

                                $player_number = get_post_meta($player_id, 'player_number', true);
                                $player_name_kanji = get_post_meta($player_id, 'player_name_kanji', true);
                                $player_name_romaji = get_post_meta($player_id, 'player_name_romaji', true);
                                ?>

                                <div class="team_box_list">
                                    <div class="team_box_list_img">
                                        <img
                                            src="<?php echo esc_url(get_template_directory_uri() . '/images/topteam/player_3.webp'); ?>"
                                            alt="<?php echo esc_attr($player_name_kanji); ?>">
                                    </div>

                                    <div class="team_box_list_name">
                                        <div class="team_box_list_name_num">
                                            <?php echo esc_html($player_number); ?>
                                        </div>

                                        <div class="team_box_list_name_jp">
                                            <?php echo esc_html($player_name_kanji); ?>
                                        </div>

                                        <div class="team_box_list_name_en">
                                            <?php echo esc_html($player_name_romaji); ?>
                                        </div>
                                    </div>

                                    <ul class="team_box_list_sns">
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_x.png" alt="X">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_ig.png" alt="Instagram">
                                            </a>
                                        </li>
                                    </ul>

                                    <a href="<?php the_permalink(); ?>" class="team_box_list_link"></a>
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="team_boxes">
                <div class="team_box">
                    <div id="link1" class="anclink"></div>
                    <h2 class="team_boxes_ttl">FW /フォワード</h2>
                    <?php
                    $players = new WP_Query([
                        'post_type'      => 'player',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,
                        'meta_query'     => [
                            [
                                'key'     => 'position',
                                'value'   => 'FW',
                                'compare' => '=',
                            ],
                        ],
                    ]);
                    ?>
                    <div class="team_box_lists">
                        <?php if ($players->have_posts()) : ?>
                            <?php while ($players->have_posts()) : $players->the_post(); ?>

                                <?php
                                $player_id = get_the_ID();

                                $player_number = get_post_meta($player_id, 'player_number', true);
                                $player_name_kanji = get_post_meta($player_id, 'player_name_kanji', true);
                                $player_name_romaji = get_post_meta($player_id, 'player_name_romaji', true);
                                ?>

                                <div class="team_box_list">
                                    <div class="team_box_list_img">
                                        <img
                                            src="<?php echo esc_url(get_template_directory_uri() . '/images/topteam/player_3.webp'); ?>"
                                            alt="<?php echo esc_attr($player_name_kanji); ?>">
                                    </div>

                                    <div class="team_box_list_name">
                                        <div class="team_box_list_name_num">
                                            <?php echo esc_html($player_number); ?>
                                        </div>

                                        <div class="team_box_list_name_jp">
                                            <?php echo esc_html($player_name_kanji); ?>
                                        </div>

                                        <div class="team_box_list_name_en">
                                            <?php echo esc_html($player_name_romaji); ?>
                                        </div>
                                    </div>

                                    <ul class="team_box_list_sns">
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_x.png" alt="X">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank" rel="noreferrer noopener">
                                                <img src="https://www.avispa.co.jp/wp-content/themes/custom/assets/images/icon_sns_ig.png" alt="Instagram">
                                            </a>
                                        </li>
                                    </ul>

                                    <a href="<?php the_permalink(); ?>" class="team_box_list_link"></a>
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="card-container">
                <ul class="card-list">
                    <li class="card-item">
                        <a href="#" class="card-link">
                            <div class="card-thumb">
                                <span>images</span>
                            </div>
                            <div class="card-title">オフィシャルチアリーダーズ</div>
                        </a>
                    </li>
                    <li class="card-item">
                        <a href="#" class="card-link">
                            <div class="card-thumb">
                                <span>images</span>
                            </div>
                            <div class="card-title">チーム強化支援募金</div>
                        </a>
                    </li>
                    <li class="card-item">
                        <a href="#" class="card-link">
                            <div class="card-thumb">
                                <span>images</span>
                            </div>
                            <div class="card-title">会社概要</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>