<?php

/**
 * Template Name: Team Page
 *
 * @package Avispa
 */

get_header();
?>

<main id="primary" class="site-main team-page">
    <section class="team-page__hero" aria-label="Team page hero">
        <div class="team-page__hero-copy">
            <div class="team-page__eyebrow">
                <span class="team-page__eyebrow-mark" aria-hidden="true"></span>
                TEMPLATE
            </div>
            <h1>下層ページテンプレート</h1>
        </div>

        <div class="team-page__hero-media">
            <span>画像が入る</span>
        </div>
    </section>
    <section class="team-page__container">
        <aside class="team-page__toc">
            <h2 class="team-page__toc-title">目次</h2>
            <ul class="team-page__toc-list">
                <li class="team-page__toc-item">
                    <a href="#" class="team-page__toc-link">大見出しが入る。大見出しが入る。大見出しが入る。</a>
                </li>
                <li class="team-page__toc-item is-expanded">
                    <a href="#" class="team-page__toc-link">大見出しが入る。大見出しが入る。大見出しが入る。</a>
                    <span class="team-page__toc-icon"></span>
                    <ul class="team-page__toc-sublist">
                        <li><a href="#">中見出しが入る。中見出しが入る。中見出しが入る。</a></li>
                        <li><a href="#">中見出しが入る。中見出しが入る。中見出しが入る。</a></li>
                        <li><a href="#">中見出しが入る。中見出しが入る。中見出しが入る。</a></li>
                    </ul>
                </li>
                <li class="team-page__toc-item">
                    <a href="#" class="team-page__toc-link">大見出しが入る。大見出しが入る。大見出しが入る。</a>
                </li>
            </ul>
        </aside>

        <article class="team-page__content">
            <h2 class="team-page__h2">
                大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。大見出しが入る。
            </h2>

            <h3 class="team-page__h3">
                中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。中見出しが入る。
            </h3>

            <h4 class="team-page__h4">
                小見出しが入る。小見出しが入る。小見出しが入る。小見出しが入る。小見出しが入る。小見出しが入る。小見出しが入る。小見出しが入る。小見出しが入る。
            </h4>

            <div class="team-page__body">
                <p>
                    本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。本文が入る。
                </p>
                <p>
                    <a href="https://xxx.com" target="_blank" rel="noopener noreferrer">https://xxx.com</a>
                </p>
            </div>

            <div class="team-media-block">
                <div class="team-media-main">
                    <span>写真</span>
                </div>
            </div>

            <div class="team-media-slider-container">

                <div class="team-slider-wrapper">
                    <div class="team-media-main">
                        <button class="team-slider-btn team-slider-btn--prev" aria-label="Previous slide">&lt;</button>
                        <span class="team-media-text">写真</span>
                        <button class="team-slider-btn team-slider-btn--next" aria-label="Next slide">&gt;</button>
                    </div>
                    <div class="team-thumbnails">
                        <div class="team-thumb is-active"><span>写真</span></div>
                        <div class="team-thumb"><span>写真</span></div>
                        <div class="team-thumb"><span>写真</span></div>
                        <div class="team-thumb"><span>写真</span></div>
                    </div>
                    <div class="team-slider-dots">
                        <span class="dot is-active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>

            </div>

            <div class="team-media-block">
                <div class="team-media-main team-media-video">
                    <span>動画</span>
                </div>
            </div>

            <div class="team-info-table-container">
                <table class="team-info-table">
                    <tbody>
                        <tr>
                            <th class="info-label">名称</th>
                            <td class="info-value">ベスト電器スタジアム</td>
                        </tr>
                        <tr>
                            <th class="info-label">住所</th>
                            <td class="info-value">
                                <p class="address-text">
                                    〒812-0852<br>
                                    福岡県福岡市博多区東平尾公園2-1-1<br>
                                    （<a href="https://maps.google.com" target="_blank" rel="noopener noreferrer">Google Map ↗</a>、詳細のアクセス方法はこちら）
                                </p>
                                <div class="map-container">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/map-images.webp" alt="ベスト電器スタジアム Map" class="map-image">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="info-label">収容人員</th>
                            <td class="info-value">
                                21,562名<br>
                                （イス席20,077名、立見席1,485名）
                            </td>
                        </tr>
                        <tr>
                            <th class="info-label">フィールド</th>
                            <td class="info-value">
                                面積 154m×90m=13,860m2<br>
                                天然芝 144m×80m=11,520m2
                            </td>
                        </tr>
                        <tr>
                            <th class="info-label">対象競技</th>
                            <td class="info-value">
                                サッカー、ラグビー、アメリカンフットボール 等
                            </td>
                        </tr>
                        <tr>
                            <th class="info-label">指定管理者</th>
                            <td class="info-value">
                                公益財団法人 福岡市緑のまちづくり協会
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="team-store-table-container">
                <table class="team-store-table">
                    <thead>
                        <tr>
                            <th>店舗名</th>
                            <th>住所</th>
                            <th>営業時間／お問合せ先</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="store-name">Alpen FUKUOKA</td>
                            <td class="store-address">
                                福岡市博多区住吉1-2-74<br>
                                キャナルシティ博多<br>
                                （サウスビル1階～3階）
                            </td>
                            <td class="store-info">
                                10:00～21:00<br>
                                定休日：なし<br>
                                TEL <a href="tel:0922833401">092-283-3401</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="store-name">サッカーショップKAMO福岡店</td>
                            <td class="store-address">
                                福岡市中央区大名1-1-15<br>
                                ダイヤモンドヒルズ大名サカグチビル 2F
                            </td>
                            <td class="store-info">
                                11:00～20:00<br>
                                定休日：なし
                            </td>
                        </tr>
                        <tr>
                            <td class="store-name">ローソン(福岡市役所店)</td>
                            <td class="store-address">
                                福岡市中央区天神1丁目8-1
                            </td>
                            <td class="store-info">
                                24時間営業<br>
                                年中無休
                            </td>
                        </tr>
                        <tr>
                            <td class="store-name">ローソン(福岡県庁店)</td>
                            <td class="store-address">
                                福岡市博多区東公園7番7号<br>
                                福岡県本庁舎北棟地下1階
                            </td>
                            <td class="store-info">
                                営業時間：7:00～21:00<br>
                                定休日：土日祝日および年末年始<br>
                                TEL <a href="tel:0926512020">092-651-2020</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</main>

<?php get_footer(); ?>