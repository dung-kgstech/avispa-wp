<?php
/**
 * Homepage hero banner carousel.
 *
 * @package Avispa
 */

$banner_dir = get_template_directory() . '/images/banner/';
$banner_uri = get_template_directory_uri() . '/images/banner/';
$banner_images = array('banner_1.webp', 'banner_2.webp', 'banner_3.webp', 'banner_4.webp', 'banner_5.webp', 'banner_6.webp');
$banner_thumbnail_order = array(1, 2, 3, 4, 5, 1, 2, 3, 4, 5);
?>
<section class="home-banner" aria-label="ピックアップ情報" data-home-banner>
    <div class="home-banner__stage">
        <?php foreach ($banner_images as $banner_index => $banner_image) : ?>
            <a class="home-banner__slide<?php echo 0 === $banner_index ? ' is-active' : ''; ?>" href="#" data-banner-slide="<?php echo esc_attr($banner_index); ?>" aria-hidden="<?php echo 0 === $banner_index ? 'false' : 'true'; ?>">
                <img src="<?php echo esc_url($banner_uri . $banner_image . '?ver=' . filemtime($banner_dir . $banner_image)); ?>" alt="ピックアップバナー <?php echo esc_attr($banner_index + 1); ?>" width="2166" height="1044"<?php echo 0 === $banner_index ? ' fetchpriority="high"' : ' loading="lazy"'; ?>>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="home-banner__thumbnails" aria-label="バナーを選択">
        <?php foreach ($banner_thumbnail_order as $banner_index) : ?>
            <?php $banner_image = $banner_images[$banner_index]; ?>
            <button class="home-banner__thumbnail" type="button" data-banner-thumbnail="<?php echo esc_attr($banner_index); ?>" aria-label="バナー <?php echo esc_attr($banner_index + 1); ?> を表示">
                <img src="<?php echo esc_url($banner_uri . $banner_image . '?ver=' . filemtime($banner_dir . $banner_image)); ?>" alt="" width="2166" height="1044" loading="lazy">
            </button>
        <?php endforeach; ?>
    </div>
</section>