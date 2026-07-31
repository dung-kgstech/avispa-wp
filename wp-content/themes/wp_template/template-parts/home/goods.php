<?php
/**
 * Home goods showcase.
 *
 * @package Avispa
 */

$goods_background_path = get_template_directory() . '/images/home/good-background.webp';
$goods_background_url = get_template_directory_uri() . '/images/home/good-background.webp';
$goods_items = array(
    array('image' => 'good-1.webp', 'label' => 'Avispa official goods 1'),
    array('image' => 'good-2.webp', 'label' => 'Avispa official goods 2'),
    array('image' => 'good-3.webp', 'label' => 'Avispa official goods 3'),
);
?>
<section
    class="home-goods"
    aria-labelledby="home-goods-title"
    style="--goods-background: url('<?php echo esc_url($goods_background_url . '?ver=' . filemtime($goods_background_path)); ?>');"
>
    <div class="site-container home-goods__inner">
        <div class="home-goods__header">
            <h2 id="home-goods-title">GOODS</h2>
            <p>グッズ</p>
        </div>

        <div class="home-goods__content">
            <div class="home-goods__brand" aria-label="Avispa online shop">
                <img class="home-goods__crest" src="<?php echo esc_url(get_template_directory_uri() . '/images/logo/logo_main.webp'); ?>" alt="" width="120" height="120">
                <?php
                $goods_text_path = get_template_directory() . '/images/home/good-text.webp';
                $goods_text_url = get_template_directory_uri() . '/images/home/good-text.webp';
                ?>
                <img
                    class="home-goods__wordmark"
                    src="<?php echo esc_url($goods_text_url . '?ver=' . filemtime($goods_text_path)); ?>"
                    alt="AVISPA ONLINE SHOP"
                    width="347"
                    height="156"
                >
            </div>

            <div class="goods-carousel" data-goods-carousel>
                <div class="goods-carousel__stage">
                    <?php foreach ($goods_items as $index => $goods_item) : ?>
                        <?php
                        $goods_image_path = get_template_directory() . '/images/home/' . $goods_item['image'];
                        $goods_image_url = get_template_directory_uri() . '/images/home/' . $goods_item['image'];
                        $position_class = 0 === $index ? 'is-active' : (1 === $index ? 'is-next' : 'is-prev');
                        ?>
                        <button class="goods-carousel__item <?php echo esc_attr($position_class); ?>" type="button" data-goods-index="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr($goods_item['label']); ?>">
                            <img
                                src="<?php echo esc_url($goods_image_url . '?ver=' . filemtime($goods_image_path)); ?>"
                                alt="<?php echo esc_attr($goods_item['label']); ?>"
                                loading="lazy"
                            >
                        </button>
                    <?php endforeach; ?>
                </div>

                <div class="goods-carousel__dots" aria-label="Choose goods slide">
                    <?php foreach ($goods_items as $index => $goods_item) : ?>
                        <button type="button" data-goods-dot="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr(sprintf('Slide %d', $index + 1)); ?>"<?php echo 0 === $index ? ' class="is-active" aria-current="true"' : ''; ?>></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <a class="home-goods__button" href="#">オフィシャルオンラインストアへ</a>
    </div>
</section>