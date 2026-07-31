<?php
/**
 * Footer social media links.
 *
 * @package Avispa
 */

$sns_background_path = get_template_directory() . '/images/home/sns_background.webp';
$sns_background_url = get_template_directory_uri() . '/images/home/sns_background.webp';
$sns_background_mobile_path = get_template_directory() . '/images/home/sns_background_mobile.webp';
$sns_background_mobile_url = get_template_directory_uri() . '/images/home/sns_background_mobile.webp';
$social_items = avispa_get_social_items();
?>
<section
    class="footer-sns"
    aria-labelledby="footer-sns-title"
    style="--sns-background: url('<?php echo esc_url($sns_background_url . '?ver=' . filemtime($sns_background_path)); ?>'); --sns-background-mobile: url('<?php echo esc_url($sns_background_mobile_url . '?ver=' . filemtime($sns_background_mobile_path)); ?>');"
>
    <div class="site-container footer-sns__inner">
        <h2 id="footer-sns-title">SNS</h2>

        <nav class="footer-sns__links" aria-label="Social media">
            <?php foreach ($social_items as $social_item) : ?>
                <?php
                $icon_path = get_template_directory() . '/images/logo/' . $social_item['icon'];
                $icon_url = get_template_directory_uri() . '/images/logo/' . $social_item['icon'];
                ?>
                <a href="<?php echo esc_url($social_item['url']); ?>" aria-label="<?php echo esc_attr($social_item['label']); ?>">
                    <img
                        src="<?php echo esc_url($icon_url . '?ver=' . filemtime($icon_path)); ?>"
                        alt=""
                        width="auto"
                        height="42px"
                        loading="lazy"
                    >
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</section>
