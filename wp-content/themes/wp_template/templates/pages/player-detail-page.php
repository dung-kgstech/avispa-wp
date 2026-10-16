<?php

/**
 * Template Name: Player Detail Page
 *
 * @package Avispa
 */

get_header();

$top_team_background_path = get_template_directory() . '/images/team/player/other-bg.webp';
$top_team_background_url = get_template_directory_uri() . '/images/team/player/other-bg.webp';
$top_team_players = array(
    array('number' => '1', 'position' => 'GK', 'name' => '永石 拓海', 'roman' => 'NAGAISHI TAKUMI', 'image' => 'player_1.webp'),
    array('number' => '3', 'position' => 'DF', 'name' => '奈良 竜樹', 'roman' => 'NARA TATSUKI', 'image' => 'player_2.webp'),
    array('number' => '11', 'position' => 'MF', 'name' => '見木 友哉', 'roman' => 'MIKI TOMOYA', 'image' => 'player_3.webp'),
    array('number' => '25', 'position' => 'MF', 'name' => '北島 祐二', 'roman' => 'KITAJIMA YUJI', 'image' => 'player_4.webp'),
    array('number' => '2', 'position' => 'DF', 'name' => '湯澤 聖人', 'roman' => 'YUZAWA MASATO', 'image' => 'player_5.webp'),
);

$player_slug = sanitize_key($_GET['player'] ?? 'player-1');
$player_name = 'Matsuyama Kenta';
$player_number = '21';
$player_position = 'GK / ゴールキーパー';
$player_nationality = 'Japan';
$player_bio = 'Cầu thủ thuộc đội hình chính của Avispa Fukuoka, được lựa chọn cho vai trò thủ môn và đóng vai trò quan trọng trong các trận quan trọng.';
?>

<div class="player-page-header player-page-header template_page">
    <nav class="player-breadcrumb" aria-label="Breadcrumb">
        <div class="player-breadcrumb-inner container_1440" typeof="BreadcrumbList" vocab="https://schema.org/">
            <span property="itemListElement" typeof="ListItem"><span property="name">ホーム</span>
                <meta property="position" content="1">
            </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">TEAM 選手・クラブ</span>
                <meta property="position" content="2">
        </div>
    </nav>

    <div class=" match-page-header_bg">
        <section class="team-info-banner-section container_1440">
            <div class="team-info-banner-inner">
                <div class="team-info-banner-content-wrap">
                    <div class="player-banner-number-wrap">
                        <span class="player-banner-number">11</span>
                        <span class="player-banner-position">MF</span>
                    </div>
                    <div class="player-banner-name-wrap">
                        <h2 class="player-banner-name-kanji">奈良 竜樹</h2>
                        <span class="player-banner-name-romaji">NARA Tatsuki</span>
                    </div>
                </div>

                <div class="team-info-banner-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/player/player-1.png" alt="トップチーム選手・スタッフ">
                </div>
            </div>
        </section>
    </div>
</div>

<div id="primary" class="player-bg">
    <div class="player-main">
        <ul class="player_anc">
            <li><a href="#link1"><span>プロフィール</span></a></li>
            <li><a href="#link2"><span>Q&A</span></a></li>
            <li><a href="#link3"><span>ギャラリー</span></a></li>
            <li><a href="#link4"><span>今シーズンの抱負</span></a></li>
        </ul>
    </div>

    <div class="player-profile-section">
        <div class="profile-block">
            <h3 class="team-staff-category-title information-category-title pc-profile-title">プロフィール</h3>
            <h3 class="team-staff-category-title information-category-title mobile-profile-title">プロフィール</h3>
            <table class="player-profile-table">
                <tbody>
                    <tr>
                        <th>プレーポジション</th>
                        <td>ディフェンダー</td>
                    </tr>
                    <tr>
                        <th>出身地</th>
                        <td>北海道</td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td>1993/09/19</td>
                    </tr>
                    <tr>
                        <th>身長/体重</th>
                        <td>180cm/74kg</td>
                    </tr>
                    <tr>
                        <th>利き足</th>
                        <td>右足</td>
                    </tr>
                    <tr>
                        <th>ニックネーム</th>
                        <td>ナラ</td>
                    </tr>
                    <tr>
                        <th>ユニフォーム表記</th>
                        <td>NARA</td>
                    </tr>
                    <tr>
                        <th>応援アンバサダー 担当市町村</th>
                        <td>
                            ホームタウン：福岡市<br>
                            フレンドリータウン：未定</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="profile-block">
            <h3 class="team-staff-category-title information-category-title">所属チーム歴</h3>

            <div class="profile-text-box">
                <p>北見ブルーサンダース～北見小泉中～コンサドーレ札幌U-18～コンサドーレ札幌～FC東京（期限付き移籍）～川崎フロンターレ～鹿島アントラーズ</p>
            </div>
        </div>

        <div class="profile-block">
            <h3 class="team-staff-category-title information-category-title">応援アンバサダー 担当市町村</h3>

            <div class="profile-text-box">
                <p>【ホームタウン】 福岡市</p>
                <p>【フレンドリータウン】 未定</p>
            </div>
        </div>

        <div class="player-qa-section">
            <h3 class="team-staff-category-title information-category-title">Q&amp;A</h3>
            <div class="qa-block">
                <h4 class="qa-sub-title qa-sub-title">サッカー編</h4>
                <table class="qa-table">
                    <tbody>
                        <tr>
                            <th>アビスパ福岡のここがすごい</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>アビスパ福岡のいいところ</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>アビスパ福岡の今シーズンの魅力</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>仲の良い選手</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>プロサッカー選手を目指す子どもたちへのメッセージ</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="qa-block">
                <h4 class="qa-sub-title qa-sub-title-2">プライベート編</h4>
                <table class="qa-table">
                    <tbody>
                        <tr>
                            <th>福岡のどこが好き？</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>福岡のおすすめスポット</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>趣味</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>好きな音楽</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                        <tr>
                            <th>MBTIを教えてください</th>
                            <td>ここに回答がはいります。この文言はダミーです。任意のテキストに置き換えてください。</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="profile-block">
                <h3 class="team-staff-category-title information-category-title">ギャラリー</h3>
                <div class="card-container">
                    <ul class="card-list">
                        <div class="card-item">
                            <a href="#" class="card-link">
                                <div class="card-thumb">
                                    <span>images</span>
                                </div>
                            </a>
                        </div>
                        <div class="card-item">
                            <a href="#" class="card-link">
                                <div class="card-thumb">
                                    <span>images</span>
                                </div>
                            </a>
                        </div>
                        <div class="card-item">
                            <a href="#" class="card-link">
                                <div class="card-thumb">
                                    <span>images</span>
                                </div>
                            </a>
                        </div>
                        <div class="card-item">
                            <a href="#" class="card-link">
                                <div class="card-thumb">
                                    <span>images</span>
                                </div>
                            </a>
                        </div>
                        <div class="card-item">
                            <a href="#" class="card-link">
                                <div class="card-thumb">
                                    <span>images</span>
                                </div>
                            </a>
                        </div>
                        <div class="card-item">
                            <a href="#" class="card-link">
                                <div class="card-thumb">
                                    <span>images</span>
                                </div>
                            </a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="player-ambition-section">
        <div class="ambition-banner-inner">
            <div class="ambition-content-wrap">
                <div class="ambition-badge">今シーズンの抱負</div>
                <div class="ambition-quote-box">
                    <span class="bracket tl"></span>
                    <span class="bracket tr"></span>
                    <span class="bracket bl"></span>
                    <span class="bracket br"></span>
                    <div class="ambition-text">
                        <p>今シーズンの抱負が入る</p>
                    </div>
                </div>
            </div>
            <div class="ambition-player-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/team/player/player-1.png" alt="トップチーム選手・スタッフ">
            </div>
        </div>
    </section>

    <section
        class="home-top-team"
        aria-labelledby="home-top-team-title"
        style="--top-team-background: url('<?php echo esc_url($top_team_background_url . '?ver=' . filemtime($top_team_background_path)); ?>');">
        <div class="home-top-team__inner">
            <div class="home-top-team__header">
                <h2 id="home-top-team-title">OTHER PLAYERS</h2>
                <p>他の選手を見る</p>
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

<?php get_footer(); ?>