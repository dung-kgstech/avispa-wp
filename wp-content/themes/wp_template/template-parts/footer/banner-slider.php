<?php
/**
 * Continuously scrolling home promotional banners.
 *
 * @package Avispa
 */

$banner_image_path = get_template_directory() . '/images/home/new.png';
$banner_image_url  = get_template_directory_uri() . '/images/home/new.png';
$banner_slides      = range(1, 7);
?>
<section class="footer-banner-slider" aria-label="Banner highlights">
    <div class="footer-banner-slider__viewport">
        <div class="footer-banner-slider__track">
            <?php for ($group = 0; $group < 3; $group++) : ?>
                <div class="footer-banner-slider__group"<?php echo $group !== 1 ? ' aria-hidden="true"' : ''; ?>>
                    <?php foreach ($banner_slides as $slide_number) : ?>
                        <a class="footer-banner-slider__item" href="#"<?php echo $group !== 1 ? ' tabindex="-1"' : ''; ?>>
                            <img
                                src="<?php echo esc_url($banner_image_url . '?ver=' . filemtime($banner_image_path)); ?>"
                                width="293"
                                height="140"
                                alt="<?php echo esc_attr(sprintf(__('Banner %d', 'avispa'), $slide_number)); ?>"
                            >
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="footer-banner-slider__pagination" aria-hidden="true">
        <?php foreach ($banner_slides as $slide_number) : ?>
            <span<?php echo 1 === $slide_number ? ' class="is-active"' : ''; ?>></span>
        <?php endforeach; ?>
    </div>
</section>