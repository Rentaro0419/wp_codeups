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
  
  function custom_enqueue_scripts() {
    // ファビコン
    wp_enqueue_style('custom-favicon', get_theme_file_uri('/assets/images/common/coral.png'));

    // swiper
    wp_enqueue_style('swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);

    // theme css
    wp_enqueue_style('custom-styles', get_theme_file_uri('/assets/css/style.css'));

    // JavaScript & jQuery
    // 注意: WordPressはjQueryをバンドルしているため、独自のバージョンを読み込む前にWordPressのバージョンを登録解除することを検討してください。
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.0.min.js', array(), '3.7.0', true);

    // inview.js
    wp_enqueue_script('inview-js', get_theme_file_uri('/assets/js/jquery.inview.min.js'), array('jquery'), null, true);

    // 設定用js
    wp_enqueue_script('custom-script', get_theme_file_uri('/assets/js/script.js'), array('jquery'), null, true);

    // google font
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;700&display=swap',
        array(),
        null
      );
}

add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');


/* --------------------------------------------
 /*///smart custom field
 /* -------------------------------------------- */
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

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php',                 // ダッシュボード
        'edit.php?post_type=page',   // 固定ページ
        'edit.php',  // 投稿
        'edit.php?post_type=voice',  // お客様の声
        'edit.php?post_type=campaign',  // キャンペーン
        'admin.php?page=wpcf7', //お問い合わせ
        'admin.php?page=flamingo', //フラミンゴ（返信情報閲覧ツール）
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // メニューのカスタム順序を有効化
add_filter('menu_order', 'custom_menu_order');


function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'ブログ'; // メインメニューの「投稿」を「ブログ」に変更
    $submenu['edit.php'][5][0] = 'ブログ一覧'; // サブメニューの「投稿一覧」を「ブログ一覧」に変更
    $submenu['edit.php'][10][0] = '新しいブログを追加'; // サブメニューの「新規追加」を「新しいブログを追加」に変更
    echo '';
}

/* --------------------------------------------
/* 項目管理画面の『投稿』の名前を変えるには
/* -------------------------------------------- */

function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'ブログ';
    $labels->singular_name = 'ブログ';
    $labels->add_new = '新規追加';
    $labels->add_new_item = '新しいブログを追加';
    $labels->edit_item = 'ブログを編集';
    $labels->new_item = 'ブログ';
    $labels->view_item = 'ブログを表示';
    $labels->search_items = 'ブログを検索';
    $labels->not_found = 'ブログが見つかりません';
    $labels->not_found_in_trash = 'ゴミ箱にブログはありません';
    $labels->all_items = 'ブログ一覧';
    $labels->menu_name = 'ブログ';
    $labels->name_admin_bar = 'ブログ';
}
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );