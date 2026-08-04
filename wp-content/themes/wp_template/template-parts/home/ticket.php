<?php
/**
 * Homepage ticket promotion.
 *
 * @package Avispa
 */

$ticket_dir = get_template_directory() . '/images/ticket/';
$ticket_uri = get_template_directory_uri() . '/images/ticket/';
$ticket_assets = array(
    'top_pc'    => 'ticket_back_top_pc.webp',
    'top_sp'    => 'ticket_back_top_sp.webp',
    'photo'     => 'ticket_img_1.webp',
    'bottom_pc' => 'ticket_back_bottom_pc.webp',
    'bottom_sp' => 'ticket_back_bottom_sp.webp',
);
?>
<section class="home-ticket" aria-labelledby="home-ticket-title">
    <div class="home-ticket__top">
        <img class="home-ticket__frame home-ticket__frame--desktop" src="<?php echo esc_url($ticket_uri . $ticket_assets['top_pc'] . '?ver=' . filemtime($ticket_dir . $ticket_assets['top_pc'])); ?>" alt="" width="2880" height="772">
        <img class="home-ticket__frame home-ticket__frame--mobile" src="<?php echo esc_url($ticket_uri . $ticket_assets['top_sp'] . '?ver=' . filemtime($ticket_dir . $ticket_assets['top_sp'])); ?>" alt="" width="786" height="378">

        <div class="home-ticket__content">
            <div class="home-ticket__heading">
                <h2 id="home-ticket-title">TICKET</h2>
                <p>チケット</p>
            </div>
            <p class="home-ticket__description">コピー要検討 / コピー要検討 / コピー要検討 / コピー要検討 /</p>
            <a class="home-ticket__button">チケットページを見る</a>
        </div>
    </div>

    <div class="home-ticket__media">
        <div class="home-ticket__media-inner">
            <img class="home-ticket__photo" src="<?php echo esc_url($ticket_uri . $ticket_assets['photo'] . '?ver=' . filemtime($ticket_dir . $ticket_assets['photo'])); ?>" alt="試合中のアビスパ福岡の選手" width="2910" height="944" loading="lazy">
        </div>
    </div>

    <div class="home-ticket__bottom" aria-hidden="true">
        <img class="home-ticket__frame home-ticket__frame--desktop" src="<?php echo esc_url($ticket_uri . $ticket_assets['bottom_pc'] . '?ver=' . filemtime($ticket_dir . $ticket_assets['bottom_pc'])); ?>" alt="" width="2880" height="864">
        <img class="home-ticket__frame home-ticket__frame--mobile" src="<?php echo esc_url($ticket_uri . $ticket_assets['bottom_sp'] . '?ver=' . filemtime($ticket_dir . $ticket_assets['bottom_sp'])); ?>" alt="" width="786" height="558">
    </div>
</section>