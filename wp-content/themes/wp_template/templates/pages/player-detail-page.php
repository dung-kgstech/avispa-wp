<?php

/**
 * Template Name: Player Detail Page
 *
 * @package Avispa
 */

get_header();

$player_slug = sanitize_key($_GET['player'] ?? 'player-1');
$player_name = 'Matsuyama Kenta';
$player_number = '21';
$player_position = 'GK / ゴールキーパー';
$player_nationality = 'Japan';
$player_bio = 'Cầu thủ thuộc đội hình chính của Avispa Fukuoka, được lựa chọn cho vai trò thủ môn và đóng vai trò quan trọng trong các trận quan trọng.';
?>

<main id="primary" class="site-main player-detail-page">
    <div class="site-container player-detail-page__wrap">
        <div class="player-detail-page__hero">
            <div class="player-detail-page__media">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/topteam/player_3.webp'); ?>" alt="<?php echo esc_attr($player_name); ?>">
            </div>

            <div class="player-detail-page__info">
                <span class="player-detail-page__badge">Player profile</span>
                <h1 class="player-detail-page__name"><?php echo esc_html($player_name); ?></h1>
                <p class="player-detail-page__meta">
                    <span>#<?php echo esc_html($player_number); ?></span>
                    <span><?php echo esc_html($player_position); ?></span>
                </p>
                <p class="player-detail-page__nationality"><?php echo esc_html($player_nationality); ?></p>
            </div>
        </div>

        <div class="player-detail-page__content">
            <section class="player-detail-page__section">
                <h2>Profile</h2>
                <p><?php echo esc_html($player_bio); ?></p>
            </section>

            <section class="player-detail-page__section">
                <h2>Details</h2>
                <ul>
                    <li><strong>Player:</strong> <?php echo esc_html($player_name); ?></li>
                    <li><strong>Number:</strong> <?php echo esc_html($player_number); ?></li>
                    <li><strong>Position:</strong> <?php echo esc_html($player_position); ?></li>
                    <li><strong>Slug:</strong> <?php echo esc_html($player_slug); ?></li>
                </ul>
            </section>
        </div>

        <div class="player-detail-page__back">
            <a href="<?php echo esc_url(home_url('/team/')); ?>">← Back to Team</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>