<?php

/**
 * Template Name: Player Detail Page
 *
 * @package Avispa
 */

get_header();

$top_team_background_path = get_template_directory() . '/images/team/player/other-bg.webp';
$top_team_background_url = get_template_directory_uri() . '/images/team/player/other-bg.webp';
$top_team_players = array(
    array('number' => '1', 'position' => 'GK', 'name' => '永石 拓海', 'roman' => 'NAGAISHI TAKUMI', 'image' => 'player_1.webp'),
    array('number' => '3', 'position' => 'DF', 'name' => '奈良 竜樹', 'roman' => 'NARA TATSUKI', 'image' => 'player_2.webp'),
    array('number' => '11', 'position' => 'MF', 'name' => '見木 友哉', 'roman' => 'MIKI TOMOYA', 'image' => 'player_3.webp'),
    array('number' => '25', 'position' => 'MF', 'name' => '北島 祐二', 'roman' => 'KITAJIMA YUJI', 'image' => 'player_4.webp'),
    array('number' => '2', 'position' => 'DF', 'name' => '湯澤 聖人', 'roman' => 'YUZAWA MASATO', 'image' => 'player_5.webp'),
);

$player_slug = sanitize_key($_GET['player'] ?? 'player-1');
$player_name = 'Matsuyama Kenta';
$player_number = '21';
$player_position = 'GK / ゴールキーパー';
$player_nationality = 'Japan';
$player_bio = 'Cầu thủ thuộc đội hình chính của Avispa Fukuoka, được lựa chọn cho vai trò thủ môn và đóng vai trò quan trọng trong các trận quan trọng.';
?>


<?php get_footer(); ?>