<?php
    $footer_class = 'footer';

    if (is_404()) {
        $footer_class .= '';
    } elseif (is_front_page()) {
        $footer_class .= ' top-footer';
    } else {
        $footer_class .= ' sub-footer';
    }
?>

<footer class="<?php echo $footer_class; ?>" id="footer">

  <div class="footer__inner inner">
    <div class="footer__img">
      <div class="footer__img-logo">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/logo.png')); ?>" alt="logo" />
      </div>
      <div class="footer__img-sns">
        <a href="#">
          <figure class="footer__img-facebook">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/FacebookLogo.svg')); ?>"
              alt="facebook" />
          </figure>
        </a>
        <a href="#">
          <figure class="footer__img-instagram">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/InstagramLogo.svg')); ?>"
              alt="instagram" />
          </figure>
        </a>
      </div>
    </div>
    <div class="footer__nav">
      <ul class="footer__nav-items">
        <li class="footer__nav-item footer__nav-item--bold">
          <a href="campaign.html">キャンペーン</a>
        </li>
        <li class="footer__nav-item"><a href="#">ライセンス取得</a></li>
        <li class="footer__nav-item"><a href="#">貸切体験ダイビング</a></li>
        <li class="footer__nav-item"><a href="#">ナイトダイビング</a></li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--padding">
          <a href="about.html">私たちについて</a>
        </li>
      </ul>
      <ul class="footer__nav-items">
        <li class="footer__nav-item footer__nav-item--bold">
          <a href="voice.html">お客様の声</a>
        </li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--paddingbottom">
          <a href="price.html">料金一覧</a>
        </li>
        <li class="footer__nav-item js-tab-link"><a href="information.html#tab_panel-1">ライセンス講習</a></li>
        <li class="footer__nav-item js-tab-link"><a href="information.html#tab_panel-2">体験ダイビング</a></li>
        <li class="footer__nav-item js-tab-link"><a href="information.html#tab_panel-3">ファンダイビング</a></li>
      </ul>
      <ul class="footer__nav-items">
        <li class="footer__nav-item footer__nav-item--bold">
          <a href="#">ダイビング情報</a>
        </li>
        <li class="footer__nav-item js-tab-link"><a href="#">ライセンス取得</a></li>
        <li class="footer__nav-item js-tab-link"><a href="#">体験ダイビング</a></li>
        <li class="footer__nav-item js-tab-link"><a href="#">ファンダイビング</a></li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--padding">
          <a href="home.html">ブログ</a>
        </li>
      </ul>

      <ul class="footer__nav-items">
        <li class="footer__nav-item footer__nav-item--bold">
          <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">よくある質問</a>
        </li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--padding">
          <a href="<?php echo esc_url( home_url( '/privacypolicy/' ) ); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
        </li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--padding">
          <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>">利用規約</a>
        </li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--padding">
          <a href="<?php echo esc_url( home_url( '/sitemap/' ) ); ?>">サイトマップ</a>
        </li>
        <li class="footer__nav-item footer__nav-item--bold footer__nav-item--padding">
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer__copyright">
    <small>Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>
  </div>
</footer>
<div class="pagetop" id="page-top">
  <a href="#" class="pagetop-btn"></a>
</div>
</body>
<?php wp_footer(); ?>

</html>