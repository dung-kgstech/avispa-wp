<?php

/**
 * Official fanclub and first-time supporter guide banners.
 *
 * @package Avispa
 */

$guide_dir = get_template_directory();
$guide_uri = get_template_directory_uri();
$fanclub_background_path = $guide_dir . '/images/guide/guide_1.webp';
$guide_background_path = $guide_dir . '/images/guide/guide_2.webp';
$naybee_logo_path = $guide_dir . '/images/guide/offical_naybee_1.webp';
$official_coupon_path = $guide_dir . '/images/guide/official_img_2.webp';
?>
<section class="home-fanclub-guide" aria-label="ファンクラブと観戦ガイド">
    <div class="site-container home-fanclub-guide__inner">
        <article class="fanclub-panel">
            <img class="fanclub-panel__background" src="<?php echo esc_url($guide_uri . '/images/guide/guide_1.webp?ver=' . filemtime($fanclub_background_path)); ?>" alt="" width="1440" height="1380" loading="lazy">
            <div class="fanclub-panel__content">
                <header class="fanclub-panel__header">
                    <h2>OFFICIAL FANCLUB</h2>
                    <p>公式ファンクラブ「TEAM NAYBee」</p>
                    <img src="<?php echo esc_url($guide_uri . '/images/guide/offical_naybee_1.webp?ver=' . filemtime($naybee_logo_path)); ?>" alt="TEAM NAYBee" width="385" height="111">
                </header>

                <img class="fanclub-coupon" src="<?php echo esc_url($guide_uri . '/images/guide/official_img_2.webp?ver=' . filemtime($official_coupon_path)); ?>" alt="前売りチケット50%OFFなどのファンクラブ入会特典" width="1101" height="484" loading="lazy">

                <a class="fanclub-panel__button" href="#">公式ファンクラブサイトへ</a>
            </div>
        </article>

        <article class="supporter-guide-panel">
            <img class="supporter-guide-panel__background" src="<?php echo esc_url($guide_uri . '/images/guide/guide_2.webp?ver=' . filemtime($guide_background_path)); ?>" alt="" width="1440" height="1380" loading="lazy">
            <div class="supporter-guide-panel__content">
                <header class="supporter-guide-panel__title">
                    <h2>GUIDE</h2>
                    <p>観戦ガイド</p>
                </header>
                <p class="supporter-guide-panel__lead">初めての試合観戦でも安心！<br>観戦ガイド</p>
                <a class="supporter-guide-panel__button" href="#">観戦ガイドを見る</a>
            </div>
        </article>
    </div>
</section>