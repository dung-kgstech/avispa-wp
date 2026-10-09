<?php

/**
 * Home top team carousel.
 *
 * Add an `image` key to a player when official player photography is available.
 *
 * @package Avispa
 */

$top_team_background_path = get_template_directory() . '/images/home/topteam_bg.webp';
$top_team_background_url = get_template_directory_uri() . '/images/home/topteam_bg.webp';
$top_team_players = array(
    array('number' => '1', 'position' => 'GK', 'name' => '永石 拓海', 'roman' => 'NAGAISHI TAKUMI', 'image' => 'player_1.webp'),
    array('number' => '3', 'position' => 'DF', 'name' => '奈良 竜樹', 'roman' => 'NARA TATSUKI', 'image' => 'player_2.webp'),
    array('number' => '11', 'position' => 'MF', 'name' => '見木 友哉', 'roman' => 'MIKI TOMOYA', 'image' => 'player_3.webp'),
    array('number' => '25', 'position' => 'MF', 'name' => '北島 祐二', 'roman' => 'KITAJIMA YUJI', 'image' => 'player_4.webp'),
    array('number' => '2', 'position' => 'DF', 'name' => '湯澤 聖人', 'roman' => 'YUZAWA MASATO', 'image' => 'player_5.webp'),
);
?>
<section
    class="home-top-team"
    aria-labelledby="home-top-team-title"
    style="--top-team-background: url('<?php echo esc_url($top_team_background_url . '?ver=' . filemtime($top_team_background_path)); ?>');">
    <div class="home-top-team__inner">
        <div class="home-top-team__header">
            <h2 id="home-top-team-title">TOP TEAM</h2>
            <p>トップチーム選手</p>
        </div>
        <div class="top-team-carousel" data-top-team-carousel>
            <button class="top-team-carousel__arrow top-team-carousel__arrow--prev" type="button" aria-label="Previous players">‹</button>
            <div class="top-team-carousel__viewport">
                <div class="top-team-carousel__track">
                    <?php for ($group = 0; $group < 3; $group++) : ?>
                        <div class="top-team-carousel__group" <?php echo 1 !== $group ? ' aria-hidden="true"' : ''; ?>>
                            <?php foreach ($top_team_players as $player) : ?>
                                <article class="top-team-card">
                                    <div class="top-team-card__visual">
                                        <div class="top-team-card__number" aria-label="<?php echo esc_attr($player['number'] . ' ' . $player['position']); ?>">
                                            <strong><?php echo esc_html($player['number']); ?></strong>
                                            <span><?php echo esc_html($player['position']); ?></span>
                                        </div>
                                        <?php
                                        $player_image_path = get_template_directory() . '/images/topteam/' . $player['image'];
                                        $player_image_url = get_template_directory_uri() . '/images/topteam/' . $player['image'];
                                        ?>
                                        <img
                                            class="top-team-card__image"
                                            src="<?php echo esc_url($player_image_url . '?ver=' . filemtime($player_image_path)); ?>"
                                            alt="<?php echo esc_attr($player['name']); ?>"
                                            width="580"
                                            height="600"
                                            loading="lazy">
                                    </div>
                                    <div class="top-team-card__info">
                                        <h3><?php echo esc_html($player['name']); ?></h3>
                                        <p><?php echo esc_html($player['roman']); ?></p>
                                        <a href="#" <?php echo 1 !== $group ? ' tabindex="-1"' : ''; ?>>詳しく見る <span aria-hidden="true">→</span></a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <button class="top-team-carousel__arrow top-team-carousel__arrow--next" type="button" aria-label="Next players">›</button>
        </div>

        <a class="home-top-team__button" href="#">全選手を見る</a>
    </div>
</section>