<?php

add_theme_support('post-thumbnails');


//smart custom field
/**
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page( 'よくある質問', '質問情報', 'manage_options', 'theme-options' );
SCF::add_options_page( '料金表', '料金一覧', 'manage_options', 'price_options' );

//---------------------------------------
// 【投稿記事の画像挿入時にwidthとheightを削除】
//---------------------------------------
function remove_width_attribute( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );