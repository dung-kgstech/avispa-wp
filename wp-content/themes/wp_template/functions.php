<?php
add_theme_support('post-thumbnails');


//固定ページで自動補完される<p>と<br>を無効化
function disable_page_wpautop() {
if ( is_page() ) remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );


//カテゴリーアーカイブのページネーション設定
function change_pre_get_posts($query){
if(!is_admin() && $query->is_main_query()){
	if(is_category()){
	$query->set('posts_per_page', 1);
	}
}
}
add_action('pre_get_posts', 'change_pre_get_posts');


//パンくずリストのショートコード生成
function my_breadcrumbs() {
	ob_start();
	
	echo '<a href="'.home_url('/').'">ホーム</a>';
	
	$ancestors = get_post_ancestors($post);
	if (!empty($ancestors)) {
		$ancestors = array_reverse($ancestors);
		foreach ($ancestors as $ancestor_id) {
			$ancestor_title = get_the_title($ancestor_id);
			$ancestor_link = get_permalink($ancestor_id);
			
// 			echo '<span>〉</span>';
			echo '<a href="'.$ancestor_link.'">'.$ancestor_title.'</a>';
		}
	}
	echo '<span>'.the_title().'</span>';

	$breadcrumbs = ob_get_contents();
	ob_end_clean();
	return $breadcrumbs;
}
add_shortcode( 'my_breadcrumbs', 'my_breadcrumbs' );

//バージョン情報を非表示にする
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

?>