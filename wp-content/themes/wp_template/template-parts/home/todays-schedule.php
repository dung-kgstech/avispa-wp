<?php
/**
 * Today's schedule section.
 *
 * Replace the sample items below with API or custom-field data when available.
 *
 * @package Avispa
 */

$schedule_date = wp_date('n.j (D)');
$shared_schedule_items = array(
    array(
        'type' => '練習',
        'type_class' => 'practice',
        'time' => '12:00〜',
        'text' => '沖縄キャンプ supported by 沖縄トヨタグループ RB大宮アルディージャ（45分×3本）',
        'location' => '南風原町 黄金森公園陸上競技場内 グラウンド',
    ),
    array(
        'type' => '誕生日',
        'type_class' => 'birthday',
        'text' => 'マルクス ヴィニシウス選手（28歳）',
    ),
    array(
        'type' => 'チケット',
        'type_class' => 'ticket',
        'time' => '10:00〜',
        'text' => '2/8(日) 清水エスパルス戦【ファンクラブ特典招待券取得開始】',
    ),
    array(
        'type' => 'チケット',
        'type_class' => 'ticket',
        'time' => '10:00〜',
        'text' => '2/21(土) V・ファーレン長崎戦【一般販売】',
    ),
    array(
        'type' => 'チケット',
        'type_class' => 'ticket',
        'time' => '10:00〜',
        'text' => '2/21(土) V・ファーレン長崎戦【駐車券販売】',
    ),
);
$schedule_groups = array(
    array(
        'title' => 'トップチーム・チーム',
        'items' => $shared_schedule_items,
    ),
    array(
        'title' => 'アカデミー・スクール',
        'items' => $shared_schedule_items,
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
                                        <span class="schedule-panel__type schedule-panel__type--<?php echo esc_attr($item['type_class']); ?>"><?php echo esc_html($item['type']); ?></span>
                                        <?php if (! empty($item['time'])) : ?>
                                            <strong><?php echo esc_html($item['time']); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                    <p class="schedule-panel__text"><?php echo esc_html($item['text']); ?></p>
                                    <?php if (! empty($item['location'])) : ?>
                                        <p class="schedule-panel__location"><?php echo esc_html($item['location']); ?></p>
                                    <?php endif; ?>
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
