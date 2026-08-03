<?php
/**
 * Home movie carousel.
 *
 * Replace the sample thumbnails with official movie artwork when available.
 *
 * @package Avispa
 */

$movie_items = array(
    array('image' => 'movie_1.webp', 'label' => 'Match highlights 1'),
    array('image' => 'movie_2.webp', 'label' => 'Match highlights 2'),
    array('image' => 'movie_3.webp', 'label' => 'Match highlights 3'),
);
?>
<section class="home-movie" aria-labelledby="home-movie-title">
    <div class="home-movie__header">
        <h2 id="home-movie-title">MOVIE</h2>
        <p>ムービー</p>
    </div>

    <div class="movie-carousel" data-movie-carousel>
        <div class="movie-carousel__stage">
            <?php foreach ($movie_items as $index => $movie_item) : ?>
                <?php
                $movie_image_path = get_template_directory() . '/images/movie/' . $movie_item['image'];
                $movie_image_url = get_template_directory_uri() . '/images/movie/' . $movie_item['image'];
                $movie_position = 0 === $index ? 'is-active' : (1 === $index ? 'is-next' : (count($movie_items) - 1 === $index ? 'is-prev' : ''));
                ?>
                <a
                    class="movie-card <?php echo esc_attr($movie_position); ?>"
                    href="#"
                    data-movie-index="<?php echo esc_attr($index); ?>"
                    aria-label="<?php echo esc_attr($movie_item['label']); ?>"
                >
                    <img src="<?php echo esc_url($movie_image_url . '?ver=' . filemtime($movie_image_path)); ?>" alt="" loading="lazy">
                    <span class="movie-card__play" aria-hidden="true">▶</span>
                </a>
            <?php endforeach; ?>

            <button class="movie-carousel__arrow movie-carousel__arrow--prev" type="button" aria-label="Previous movie">‹</button>
            <button class="movie-carousel__arrow movie-carousel__arrow--next" type="button" aria-label="Next movie">›</button>
        </div>

        <div class="movie-carousel__dots" aria-label="Choose movie">
            <?php foreach ($movie_items as $index => $movie_item) : ?>
                <button type="button" data-movie-dot="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr(sprintf('Movie %d', $index + 1)); ?>"<?php echo 0 === $index ? ' class="is-active" aria-current="true"' : ''; ?>></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>