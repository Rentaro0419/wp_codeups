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
SCF::add_options_page( 'ギャラリー','ギャラリー画像', 'manage_options', 'gallery_options');
//---------------------------------------
// 【投稿記事の画像挿入時にwidthとheightを削除】
//---------------------------------------
function remove_width_attribute( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );




/* --------------------------------------------
 /* Archiveページ月別選択
 /* -------------------------------------------- */
function blog_get_archives_callback($item, $index, $currYear)
{
  global $wp_locale;

  if ($item['year'] == $currYear) {
    $url = get_month_link($item['year'], $item['month']);
    // 月名と年の表示
    $text = $wp_locale->get_month($item['month']);
    echo '<li class="archive__sub-item archive__sub-item--layout"><a href="' . esc_url($url) . '">' . esc_html($text) . '</a></li>';
  }
}

function blog_get_archives()
{
  global $wpdb;

  $query = "SELECT YEAR(post_date) AS `year` FROM $wpdb->posts WHERE `post_type` = 'post' AND `post_status` = 'publish' GROUP BY `year` ORDER BY `year` DESC";
  $arcResults = $wpdb->get_results($query);
  $years = array();

  if ($arcResults) {
    foreach ((array)$arcResults as $arcResult) {
      array_push($years, $arcResult->year);
    }
  }

$query = "SELECT YEAR(post_date) as `year`, MONTH(post_date) as `month` FROM $wpdb->posts WHERE `post_type` = 'post' AND `post_status` = 'publish' GROUP BY `year`, `month` ORDER BY `year` DESC, `month` ASC";
  $arcResults = $wpdb->get_results($query, ARRAY_A);
  $months = array();

  if ($arcResults) {
    foreach ($years as $year) {
      echo '<li class="sidebar__archive-title js-toggle-title">';
      echo  $year;
      echo '</li>';
      echo '<ul class="sidebar__archive-item js-toggle-item">';
      array_walk($arcResults, "blog_get_archives_callback", $year);
      echo '</ul>';
    }
  }
}

/* --------------------------------------------
/* 投稿ページの表示件数を変更する
/* -------------------------------------------- */
function custom_posts_per_page($query)
{
if(!is_admin() && $query->is_main_query()){
  //カスタム投稿のスラッグを記述
  if(is_post_type_archive('campaign')){
    //表示件数を指定
    $query->set('posts_per_page', 4);
  }
  if(is_tax('campaign_category')){
    //表示件数を指定
    $query->set('posts_per_page', 4);
  }
  if(is_post_type_archive('voice')){
    //表示件数を指定
    $query->set('posts_per_page', 6);
  }
  if(is_tax('voice_category')){
    //表示件数を指定
    $query->set('posts_per_page', 6);
  }
}
}
add_action('pre_get_posts', 'custom_posts_per_page');