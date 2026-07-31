<?php
/**
 * Today's schedule section.
 *
 * Replace the sample items below with API or custom-field data when available.
 *
 * @package Avispa
 */

$schedule_date = wp_date('n.j (D)');
$schedule_groups = array(
    array(
        'title' => 'トップチーム・チーム',
        'items' => array(
            array('type' => '練習', 'time' => '12:00〜', 'text' => 'トレーニング／クラブハウス'),
            array('type' => 'チケット', 'time' => '10:00〜', 'text' => 'ホームゲーム チケット販売'),
            array('type' => 'イベント', 'time' => '10:00〜', 'text' => 'チームイベント・メディア情報'),
        ),
    ),
    array(
        'title' => 'アカデミー・スクール',
        'items' => array(
            array('type' => '練習', 'time' => '12:00〜', 'text' => 'アカデミートレーニング'),
            array('type' => 'スクール', 'time' => '10:00〜', 'text' => 'サッカースクール開催情報'),
            array('type' => 'イベント', 'time' => '10:00〜', 'text' => 'アカデミー試合・イベント'),
        ),
    ),
);
?>

<section
    class="today-schedule"
    aria-labelledby="today-schedule-title"
    style="--schedule-background: url('<?php echo esc_url(get_template_directory_uri() . '/images/home/shedule-background.webp?ver=' . filemtime(get_template_directory() . '/images/home/shedule-background.webp')); ?>');"
>

    <div class="site-container today-schedule__container">
        <header class="today-schedule__header">
            <h2 id="today-schedule-title">TODAY'S SCHEDULE</h2>
            <p>本日のスケジュール</p>
        </header>

        <div class="today-schedule__board">
            <?php foreach ($schedule_groups as $group) : ?>
                <article class="schedule-panel">
                    <h3><?php echo esc_html($group['title']); ?></h3>
                    <span class="schedule-panel__accent" aria-hidden="true"></span>

                    <div class="schedule-panel__list">
                        <time class="schedule-panel__date" datetime="<?php echo esc_attr(wp_date('Y-m-d')); ?>">
                            <?php echo esc_html($schedule_date); ?>
                        </time>

                        <ul>
                            <?php foreach ($group['items'] as $item) : ?>
                                <li>
                                    <div class="schedule-panel__meta">
                                        <span class="schedule-panel__type"><?php echo esc_html($item['type']); ?></span>
                                        <strong><?php echo esc_html($item['time']); ?></strong>
                                    </div>
                                    <p><?php echo esc_html($item['text']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <a class="schedule-panel__button" href="#">
                        <?php esc_html_e('カレンダーを見る', 'avispa'); ?>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
