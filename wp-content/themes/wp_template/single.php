<?php get_header();

$top_team_background_path = get_template_directory() . '/images/team/player/other-bg.webp';
$top_team_background_url  = get_template_directory_uri() . '/images/team/player/other-bg.webp';

$top_team_background_path = get_template_directory() . '/images/team/player/other-bg.webp';
$top_team_background_url = get_template_directory_uri() . '/images/team/player/other-bg.webp';
$top_team_players = array(
	array('number' => '1', 'position' => 'GK', 'name' => '永石 拓海', 'roman' => 'NAGAISHI TAKUMI', 'image' => 'player_1.webp'),
	array('number' => '3', 'position' => 'DF', 'name' => '奈良 竜樹', 'roman' => 'NARA TATSUKI', 'image' => 'player_2.webp'),
	array('number' => '11', 'position' => 'MF', 'name' => '見木 友哉', 'roman' => 'MIKI TOMOYA', 'image' => 'player_3.webp'),
	array('number' => '25', 'position' => 'MF', 'name' => '北島 祐二', 'roman' => 'KITAJIMA YUJI', 'image' => 'player_4.webp'),
	array('number' => '2', 'position' => 'DF', 'name' => '湯澤 聖人', 'roman' => 'YUZAWA MASATO', 'image' => 'player_5.webp'),
);

$post_id = get_the_ID();
?>

<main class="news_main">
	<div class="news_wrap">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article class="news_detail_article">
					<div class="news_detail_body">
						<div class="player-page-header player-page-header template_page">
							<nav class="player-breadcrumb" aria-label="Breadcrumb">
								<div class="player-breadcrumb-inner container_1440" typeof="BreadcrumbList" vocab="https://schema.org/">
									<span property="itemListElement" typeof="ListItem"><span property="name">ホーム</span>
										<meta property="position" content="1">
									</span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">TEAM 選手・クラブ</span>
										<meta property="position" content="2">
								</div>
							</nav>

							<div class=" match-page-header_bg">
								<section class="team-info-banner-section container_1440">
									<div class="team-info-banner-inner">
										<div class="team-info-banner-content-wrap">
											<div class="player-banner-number-wrap">
												<span class="player-banner-number"><?php echo esc_html(get_field('player_number', $post_id)); ?></span>
												<span class="player-banner-position"><?php echo esc_html(get_field('position', $post_id)); ?></span>
											</div>
											<div class="player-banner-name-wrap">
												<h2 class="player-banner-name-kanji"><?php echo esc_html(get_field('player_name_kanji', $post_id)); ?></h2>
												<span class="player-banner-name-romaji"><?php echo esc_html(get_field('player_name_romaji', $post_id)); ?></span>
											</div>
										</div>

										<div class="team-info-banner-image">
											<?php
											$player_img = get_field('player_images', $post_id);

											if ($player_img):
											?>
												<img src="<?php echo esc_url($player_img['url']); ?>"
													alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
											<?php endif; ?>
										</div>
									</div>
								</section>
							</div>
						</div>

						<div id="primary" class="player-bg">
							<div class="player-main">
								<ul class="player_anc">
									<li><a href="#link1"><span>プロフィール</span></a></li>
									<li><a href="#link2"><span>Q&A</span></a></li>
									<li><a href="#link3"><span>ギャラリー</span></a></li>
									<li><a href="#link4"><span>今シーズンの抱負</span></a></li>
								</ul>
							</div>

							<div class="player-profile-section">
								<div class="profile-block">
									<h3 class="team-staff-category-title information-category-title pc-profile-title">GK /ゴールキーパー</h3>
									<h3 class="team-staff-category-title information-category-title mobile-profile-title">GK /ゴールキーパー</h3>
									<table class="player-profile-table">
										<tbody>
											<tr>
												<th>プレーポジション</th>
												<td><?php echo esc_html(get_field('player_position', $post_id)); ?></td>
											</tr>
											<tr>
												<th>出身地</th>
												<td><?php echo esc_html(get_field('player_birthplace', $post_id)); ?></td>
											</tr>
											<tr>
												<th>生年月日</th>
												<td><?php echo esc_html(get_field('player_birthdate', $post_id)); ?></td>
											</tr>
											<tr>
												<th>身長/体重</th>
												<td><?php echo esc_html(get_field('player_height', $post_id)); ?>cm / <?php echo esc_html(get_field('player_weight', $post_id)); ?>kg</td>
											</tr>
											<tr>
												<th>利き足</th>
												<td><?php echo esc_html(get_field('player_preferred_foot', $post_id)); ?></td>
											</tr>
											<tr>
												<th>ニックネーム</th>
												<td><?php echo esc_html(get_field('player_nickname', $post_id)); ?></td>
											</tr>
											<tr>
												<th>ユニフォーム表記</th>
												<td><?php echo esc_html(get_field('player_uniform_name', $post_id)); ?></td>
											</tr>
											<tr>
												<th>応援アンバサダー 担当市町村</th>
												<td><?php echo wp_kses_post(get_field('player_ambassador', $post_id)); ?></td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="profile-block">
									<h3 class="team-staff-category-title information-category-title">所属チーム歴</h3>
									<div class="profile-text-box">
										<p><?php echo esc_html(get_field('player_career', $post_id)); ?></p>
									</div>
								</div>

								<div class="profile-block">
									<h3 class="team-staff-category-title information-category-title">応援アンバサダー 担当市町村</h3>
									<div class="profile-text-box">
										<p><?php echo wp_kses_post(get_field('player_support', $post_id)); ?></p>
									</div>
								</div>

								<div class="player-qa-section">
									<h3 class="team-staff-category-title information-category-title">Q&amp;A</h3>
									<div class="qa-block">
										<h4 class="qa-sub-title">サッカー編</h4>
										<table class="qa-table">
											<tbody>
												<tr>
													<th>アビスパ福岡の<br>ここがすごい</th>
													<td><?php echo esc_html(get_field('qa_avispa_amazing', $post_id)); ?></td>
												</tr>
												<tr>
													<th>アビスパ福岡の<br>いいところ</th>
													<td><?php echo esc_html(get_field('qa_avispa_good_points', $post_id)); ?></td>
												</tr>
												<tr>
													<th>アビスパ福岡の<br>今シーズンの魅力</th>
													<td><?php echo esc_html(get_field('qa_avispa_season_charm', $post_id)); ?></td>
												</tr>
												<tr>
													<th>仲の良い選手</th>
													<td><?php echo esc_html(get_field('qa_close_friends', $post_id)); ?></td>
												</tr>
												<tr>
													<th>プロサッカー選手<br>を目指す子どもた<br>ちへのメッセージ</th>
													<td><?php echo esc_html(get_field('qa_message_to_kids', $post_id)); ?></td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="qa-block1">
										<h4 class="qa-sub-title">プライベート編</h4>
										<table class="qa-table">
											<tbody>
												<tr>
													<th>福岡のどこが<br>好き？</th>
													<td><?php echo esc_html(get_field('qa_avispa_amazing', $post_id)); ?></td>
												</tr>
												<tr>
													<th>福岡のおすすめ<br>スポット</th>
													<td><?php echo esc_html(get_field('qa_avispa_good_points', $post_id)); ?></td>
												</tr>
												<tr>
													<th>趣味</th>
													<td><?php echo esc_html(get_field('qa_avispa_season_charm', $post_id)); ?></td>
												</tr>
												<tr>
													<th>好きな音楽</th>
													<td><?php echo esc_html(get_field('qa_close_friends', $post_id)); ?></td>
												</tr>
												<tr>
													<th>MBTIを<br>教えてください</th>
													<td><?php echo esc_html(get_field('qa_message_to_kids', $post_id)); ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="card-container">
								<h3 class="team-staff-category-title information-category-title">ギャラリー</h3>
								<ul class="card-list">
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
										</a>
									</li>
								</ul>
							</div>

							<div class="player-ambition-section">
								<div class="ambition-banner-inner">
									<div class="ambition-content-wrap">
										<div class="ambition-badge">今シーズンの抱負</div>
										<div class="ambition-quote-box">
											<span class="bracket tl"></span>
											<span class="bracket tr"></span>
											<span class="bracket bl"></span>
											<span class="bracket br"></span>
											<div class="ambition-text">
												<p>今シーズンの抱負が入る</p>
											</div>
										</div>
									</div>
									<div class="ambition-player-image">
										<?php
										$player_img = get_field('player_images', $post_id);

										if ($player_img):
										?>
											<img src="<?php echo esc_url($player_img['url']); ?>"
												alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div
								class="home-top-team"
								aria-labelledby="home-top-team-title"
								style="--top-team-background: url('<?php echo esc_url($top_team_background_url . '?ver=' . filemtime($top_team_background_path)); ?>');">
								<div class="home-top-team__inner">
									<div class="home-top-team__header">
										<h2 id="home-top-team-title">TOP TEAM</h2>
										<p>トップチーム選手</p>
									</div>
									<div class="top-team-carousel" data-top-team-carousel>
										<!-- <button class="top-team-carousel__arrow top-team-carousel__arrow--prev" type="button" aria-label="Previous players">‹</button> -->
										<div class="top-team-carousel__viewport">
											<div class="top-team-carousel__track">
												<?php for ($group = 0; $group < 3; $group++) : ?>
													<div class="top-team-carousel__group" <?php echo 1 !== $group ? ' aria-hidden="true"' : ''; ?>>
														<?php foreach ($top_team_players as $player) : ?>
															<article class="top-team-card">
																<div class="top-team-card__visual">
																	<div class="top-team-card__number" aria-label="<?php echo esc_attr($player['number'] . ' ' . $player['position']); ?>">
																		<strong><?php echo esc_html($player['number']); ?></strong>
																		<span><?php echo esc_html($player['position']); ?></span>
																	</div>
																	<?php
																	$player_image_path = get_template_directory() . '/images/topteam/' . $player['image'];
																	$player_image_url = get_template_directory_uri() . '/images/topteam/' . $player['image'];
																	?>
																	<img
																		class="top-team-card__image"
																		src="<?php echo esc_url($player_image_url . '?ver=' . filemtime($player_image_path)); ?>"
																		alt="<?php echo esc_attr($player['name']); ?>"
																		width="580"
																		height="600"
																		loading="lazy">
																</div>
																<div class="top-team-card__info">
																	<h3><?php echo esc_html($player['name']); ?></h3>
																	<p><?php echo esc_html($player['roman']); ?></p>
																	<a href="#" <?php echo 1 !== $group ? ' tabindex="-1"' : ''; ?>>詳しく見る <span aria-hidden="true">→</span></a>
																</div>
															</article>
														<?php endforeach; ?>
													</div>
												<?php endfor; ?>
											</div>
										</div>
										<!-- <button class="top-team-carousel__arrow top-team-carousel__arrow--next" type="button" aria-label="Next players">›</button> -->
									</div>
									<a class="home-top-team__button" href="#">全選手を見る</a>
								</div>
							</div>

							<div class="card-container">
								<ul class="card-list">
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
											<div class="card-title">オフィシャルチアリーダーズ</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
											<div class="card-title">チーム強化支援募金</div>
										</a>
									</li>
									<li class="card-item">
										<a href="#" class="card-link">
											<div class="card-thumb">
												<span>images</span>
											</div>
											<div class="card-title">会社概要</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>