<?php
/**
 * Homepage match and standings section.
 *
 * @package Avispa
 */

$theme_dir = get_template_directory();
$theme_uri = get_template_directory_uri();
$avispa_logo = '/images/match/FC_logo/FC_logo4.webp';
$next_opponent_logo = '/images/match/FC_logo/FC_logo1.webp';
$standings_background = '/images/match/standing_back.webp';
?>
<section class="home-match" aria-label="試合情報と順位表">
    <div class="home-match__inner">
        <article class="home-match__panel home-match__fixtures">
            <div class="home-match__tabs" role="tablist" aria-label="試合情報">
                <button class="home-match__tab is-active" type="button" role="tab" aria-selected="true" aria-controls="next-match-panel">NEXT MATCH</button>
                <button class="home-match__tab" type="button" role="tab" aria-selected="false" aria-controls="latest-match-panel">LATEST MATCH</button>
            </div>

            <div id="next-match-panel" class="home-match__tab-panel is-active" role="tabpanel" data-match-panel="next">
                <div class="match-carousel">
                    <button class="match-carousel__arrow match-carousel__arrow--prev" type="button" aria-label="前の試合">‹</button>
                    <div class="match-carousel__viewport">
                        <div class="match-carousel__track">
                            <?php
                            $next_matches = array(
                                array('date' => '4/4', 'day' => 'Sat.', 'time' => '00:00'),
                                array('date' => '4/4', 'day' => 'Sun.', 'time' => '14:00'),
                                array('date' => '4/4', 'day' => 'Sat.', 'time' => '13:00'),
                                array('date' => '4/4', 'day' => 'Sat.', 'time' => '15:00'),
                                array('date' => '4/4', 'day' => 'Sat.', 'time' => '14:00'),
                                array('date' => '4/4', 'day' => 'Sat.', 'time' => '16:00'),
                            );
                            foreach ($next_matches as $next_match) :
                            ?>
                                <article class="match-card">
                                    <p class="match-card__competition">2025明治安田J1リーグ　第◯節</p>
                                    <p class="match-card__date"><strong><?php echo esc_html($next_match['date']); ?></strong> <?php echo esc_html($next_match['day']); ?> <span><?php echo esc_html($next_match['time']); ?></span></p>
                                    <div class="match-card__teams">
                                        <img src="<?php echo esc_url($theme_uri . $avispa_logo . '?ver=' . filemtime($theme_dir . $avispa_logo)); ?>" alt="アビスパ福岡" width="110" height="110">
                                        <strong>VS</strong>
                                        <img class="match-card__opponent-logo" src="<?php echo esc_url($theme_uri . $next_opponent_logo . '?ver=' . filemtime($theme_dir . $next_opponent_logo)); ?>" alt="V・ファーレン長崎" width="100" height="100">
                                    </div>
                                    <div class="match-card__venue"><span>HOME</span><strong>ベスト電器スタジアム</strong></div>
                                    <div class="match-card__links"><a href="#">ホームゲーム情報</a><a href="#">チケット情報</a></div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button class="match-carousel__arrow match-carousel__arrow--next" type="button" aria-label="次の試合">›</button>
                </div>
            </div>

            <div id="latest-match-panel" class="home-match__tab-panel" role="tabpanel" data-match-panel="latest" hidden>
                <article class="latest-match-card">
                    <p class="latest-match-card__competition">明治安田 J1百年構想リーグ<br>プレーオフラウンド　第2戦</p>
                    <p class="latest-match-card__date"><strong>6/6</strong> Sat.</p>
                    <div class="latest-match-card__result">
                        <img src="<?php echo esc_url($theme_uri . $avispa_logo . '?ver=' . filemtime($theme_dir . $avispa_logo)); ?>" alt="アビスパ福岡" width="110" height="110">
                        <div class="latest-match-card__score"><strong>2-1</strong><span>［　0　前半　1　］</span><span>［　2　後半　0　］</span></div>
                        <span class="latest-match-card__opponent" aria-label="ジェフユナイテッド千葉">J</span>
                    </div>
                    <div class="latest-match-card__venue"><span>AWAY</span><strong>フクダ電子アリーナ</strong></div>
                </article>
            </div>

            <a class="home-match__button" href="#">試合日程を見る</a>
        </article>
        <article class="home-match__panel home-match__standings">
            <img class="home-match__standings-background" src="<?php echo esc_url($theme_uri . $standings_background . '?ver=' . filemtime($theme_dir . $standings_background)); ?>" alt="" width="1440" height="1380" loading="lazy">
            <div class="home-match__standings-content">
                <header class="standings-header">
                    <h2>STANDINGS</h2>
                    <u>2026 明治安田J1リーグ</u>
                </header>
                <div class="standings-summary">
                    <strong>12<small>位</small></strong>
                    <p><b>11<small>勝</small></b><b>10<small>分</small></b><b>17<small>敗</small></b><b>勝点 43</b></p>
                </div>
                <p class="standings-date">2025.12.08 現在</p>
                <div class="standings-table-wrap">
                    <table class="standings-table">
                        <thead><tr><th>J1年間順位（11/30）</th><th>勝点</th><th>勝</th><th>分</th><th>負</th><th>得失点</th></tr></thead>
                        <tbody>
                            <tr><td>10　<img class="standings-club__crest" src="<?php echo esc_url($theme_uri . '/images/match/FC_logo/FC_logo2.webp'); ?>" alt="">C大阪</td><td>52</td><td>14</td><td>10</td><td>13</td><td>5</td></tr>
                            <tr><td>11　<img class="standings-club__crest" src="<?php echo esc_url($theme_uri . '/images/match/FC_logo/FC_logo3.webp'); ?>" alt="">広島</td><td>49</td><td>13</td><td>10</td><td>14</td><td>-7</td></tr>
                            <tr class="is-current"><td>12　<img class="standings-club__crest" src="<?php echo esc_url($theme_uri . '/images/match/FC_logo/FC_logo4.webp'); ?>" alt="">福岡</td><td>48</td><td>12</td><td>12</td><td>13</td><td>-3</td></tr>
                            <tr><td>13　<img class="standings-club__crest" src="<?php echo esc_url($theme_uri . '/images/match/FC_logo/FC_logo5.webp'); ?>" alt="">清水</td><td>44</td><td>11</td><td>11</td><td>15</td><td>-9</td></tr>
                        </tbody>
                    </table>
                </div>
                <a class="home-match__button" href="#">順位表を見る</a>
            </div>
        </article>
    </div>
</section>