<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <a class="post-card__link" href="<?php the_permalink(); ?>">
        <div class="post-card__media">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large', array('loading' => 'lazy')); ?>
            <?php else : ?>
                <span class="post-card__placeholder" aria-hidden="true"></span>
            <?php endif; ?>
        </div>
        <div class="post-card__body">
            <div class="post-card__meta">
                <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                <?php $categories = get_the_category(); ?>
                <?php if ($categories) : ?>
                    <span><?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>
            </div>
            <h3 class="post-card__title"><?php the_title(); ?></h3>
        </div>
    </a>
</article>
