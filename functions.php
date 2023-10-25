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



// Contact Form7の送信ボタンをクリックした後の遷移先設定
add_action( 'wp_footer', 'add_origin_thanks_page' );
function add_origin_thanks_page() {
$thanks = home_url('/contact-thanks/');
  echo <<< EOC
    <script>
      var thanksPage = {
        9722bf2: '{$thanks}',
      };
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      location = thanksPage[event.detail.contactFormId];
    }, false );
    </script>
  EOC;
}



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
  $arcResults = $wpdb->get_resu.bclts($query, ARRAY_A);
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