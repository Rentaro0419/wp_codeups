<?php
  function my_setup()
  {
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // タイトルタグ自動生成
    add_theme_support('html5', array( // HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      )
    );
  }
  

  //  add_action('after_setup_theme', 'my_setup');
  // /* CSSとJavaScriptの読み込み */
  // function my_script_init()
  //   { // WordPress提供のjquery.jsを読み込まない
  //     wp_deregister_script('jquery');
  //     // jQueryの読み込み
  //     wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "1.0.1", true );
  //     // Google Fonts(2つ以上ある場合は1つずつ書く)
  //     wp_enqueue_style( 'gotu', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap' );
  //     wp_enqueue_style( 'Lexend', '//fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500&display=swap' );
  //     // micromodal
  //     wp_enqueue_script( 'micromodal', '//unpkg.com/micromodal/dist/micromodal.min.js', "", "1.0.1", false );
	// 		// google maps
	// 		wp_enqueue_script( 'map', '//maps.googleapis.com/maps/api/js?key=APIキーを入れます', "", "1.0.1", false );      
	// 		// slick
  //     wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', "", "1.0.1", true );
  //     wp_enqueue_style( 'slick',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', "", "1.0.1", false );
  //     wp_enqueue_style( 'slick-theme',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.0.1', false );
  //     // swiper
  //     wp_enqueue_script( 'swiper', '//unpkg.com/swiper@8/swiper-bundle.min.js', "", "1.0.1", true );
  //     wp_enqueue_style( 'swiper', '//unpkg.com/swiper@8/swiper-bundle.min.css', "", "1.0.1", false );
  //     // 自作jsファイルの読み込み
  //     wp_enqueue_script( 'main', get_template_directory_uri() . '/js/script.js?20231029', array( 'jquery' ), '1.0.1', true );
  //     // 自作cssファイルの読み込み
  //     wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/style.css?20231029', array(), '1.0.1', false );
  //   }
  //   add_action('wp_enqueue_scripts', 'my_script_init');

  
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