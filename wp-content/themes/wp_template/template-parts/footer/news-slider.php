<?php
/**
 * Continuously scrolling home news banners.
 *
 * @package Avispa
 */

$news_banner_path = get_template_directory() . '/images/home/new.png';
$news_banner_url  = get_template_directory_uri() . '/images/home/new.png';
$news_slides      = range(1, 7);
?>
<section class="footer-news-slider" aria-label="News highlights">
    <div class="footer-news-slider__viewport">
        <div class="footer-news-slider__track">
            <?php for ($group = 0; $group < 3; $group++) : ?>
                <div class="footer-news-slider__group"<?php echo $group !== 1 ? ' aria-hidden="true"' : ''; ?>>
                    <?php foreach ($news_slides as $slide_number) : ?>
                        <a class="footer-news-slider__item" href="#"<?php echo $group !== 1 ? ' tabindex="-1"' : ''; ?>>
                            <img
                                src="<?php echo esc_url($news_banner_url . '?ver=' . filemtime($news_banner_path)); ?>"
                                width="293"
                                height="140"
                                alt="<?php echo esc_attr(sprintf(__('News %d', 'avispa'), $slide_number)); ?>"
                            >
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="footer-news-slider__pagination" aria-hidden="true">
        <?php foreach ($news_slides as $slide_number) : ?>
            <span<?php echo 1 === $slide_number ? ' class="is-active"' : ''; ?>></span>
        <?php endforeach; ?>
    </div>
</section>