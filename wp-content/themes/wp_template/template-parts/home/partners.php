<?php
/**
 * Home partners showcase.
 *
 * Replace the sample data with partner logos and campaign links when available.
 *
 * @package Avispa
 */

$partner_logos = array(
    array('name' => '新日本製薬', 'image' => 'logo-company-1.webp'),
    array('name' => 'アパマンショップ', 'image' => 'logo-company-2.webp'),
    array('name' => 'エイジェック', 'image' => 'logo-company-3.webp'),
    array('name' => 'HAKATA GREEN HOTEL', 'image' => 'logo-company-4.webp'),
    array('name' => 'SEPTENI', 'image' => 'logo-company-5.webp'),
    array('name' => '福岡市', 'image' => 'logo-company-6.webp'),
    array('name' => 'Soft Service', 'image' => 'logo-company-7.webp'),
    array('name' => 'Oral Care Clinic', 'image' => 'logo-company-8.webp'),
    array('name' => 'YONEX', 'image' => 'logo-company-9.webp'),
    array('name' => 'AIWA GROUP', 'image' => 'logo-company-10.webp'),
    array('name' => 'KIRIN', 'image' => 'logo-company-11.webp'),
    array('name' => '日本パーク', 'image' => 'logo-company-12.webp'),
    array('name' => '明治安田', 'image' => 'logo-company-13.webp'),
);

$partner_cards = array(
    array('image' => 'video-1.webp', 'title' => '福岡トヨペット｜アビスパ福岡を応援しよう！'),
    array('image' => 'video-2.webp', 'title' => '福岡トヨペット KICK OFF!'),
    array('image' => 'video-3.webp', 'title' => '店舗数・契約数 No.1'),
    array('image' => 'video-4.webp', 'title' => 'さあ、理想のお部屋へ'),
);
?>
<section class="home-partners" aria-labelledby="home-partners-title">
    <?php
    $partner_top_path = get_template_directory() . '/images/home/partner_back_top.webp';
    $partner_top_url = get_template_directory_uri() . '/images/home/partner_back_top.webp';
    ?>
    <img
        class="home-partners__top-background"
        src="<?php echo esc_url($partner_top_url . '?ver=' . filemtime($partner_top_path)); ?>"
        alt=""
        width="2880"
        height="300"
        loading="lazy"
    >
    <div class="site-container home-partners__inner">
        <header class="home-partners__header">
            <h2 id="home-partners-title">PARTNER</h2>
            <p>パートナー</p>
        </header>

        <ul class="home-partners__logos" aria-label="Partner companies">
            <?php foreach ($partner_logos as $partner_logo) : ?>
                <?php
                $partner_logo_path = get_template_directory() . '/images/logo/' . $partner_logo['image'];
                $partner_logo_url = get_template_directory_uri() . '/images/logo/' . $partner_logo['image'];
                ?>
                <li>
                    <img
                        src="<?php echo esc_url($partner_logo_url . '?ver=' . filemtime($partner_logo_path)); ?>"
                        alt="<?php echo esc_attr($partner_logo['name']); ?>"
                        loading="lazy"
                    >
                </li>
            <?php endforeach; ?>
        </ul>

        <a class="home-partners__button" href="#">パートナー一覧を見る</a>
        <div class="partner-stories" data-partner-slider>
            <button class="partner-stories__arrow partner-stories__arrow--prev" type="button" aria-label="Previous partner stories">‹</button>
            <div class="partner-stories__viewport">
                <div class="partner-stories__track">
                    <?php foreach ($partner_cards as $partner_card) : ?>
                        <?php
                        $partner_video_path = get_template_directory() . '/images/logo/' . $partner_card['image'];
                        $partner_video_url = get_template_directory_uri() . '/images/logo/' . $partner_card['image'];
                        ?>
                        <a class="partner-story" href="#" aria-label="<?php echo esc_attr($partner_card['title']); ?>">
                            <img
                                src="<?php echo esc_url($partner_video_url . '?ver=' . filemtime($partner_video_path)); ?>"
                                alt="<?php echo esc_attr($partner_card['title']); ?>"
                                loading="lazy"
                            >
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="partner-stories__arrow partner-stories__arrow--next" type="button" aria-label="Next partner stories">›</button>
        </div>

    </div>
</section>