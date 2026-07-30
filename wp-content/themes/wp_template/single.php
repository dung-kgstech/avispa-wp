<?php get_header(); ?>

<main class="news_main">
	<div class="news_wrap">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="news_detail_article">
					<div class="news_detail_head">
						<div class="date">
							<time><?php the_time('Y.m.d') ?></time>
							<?php
								$categories = get_the_category();
								foreach( $categories as $category ) {
									echo '<div class="category '.$category->slug.'">'.$category->name.'</div>';
								}
							?>
						</div>
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="news_detail_body">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
        <?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>