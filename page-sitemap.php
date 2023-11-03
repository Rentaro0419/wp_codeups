<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sitemap-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sitemap-mv-sp.jpg')); ?>"
            alt="緑色の綺麗な海" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">site MAP</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="sitemap">
      <div class="sitemap__block">
        <div class="sitemap__nav">
          <ul class="sitemap__nav-items">
            <li class="sitemap__nav-item sitemap__nav-item--bold">
              <a href="campaign.html">キャンペーン</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">ライセンス取得</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">貸切体験ダイビング</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">ナイトダイビング</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--padding">
              <a href="about.html">私たちについて</a>
            </li>
          </ul>
          <ul class="sitemap__nav-items">
            <li class="sitemap__nav-item sitemap__nav-item--bold">
              <a href="voice.html">お客様の声</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--paddingbottom">
              <a href="<?php echo esc_url( home_url( '/price/' ) ); ?>">料金一覧</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">ライセンス講習</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">体験ダイビング</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">ファンダイビング</a>
            </li>
          </ul>
          <ul class="sitemap__nav-items">
            <li class="sitemap__nav-item sitemap__nav-item--bold">
              <a href="#">ダイビング情報</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">ライセンス取得</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">体験ダイビング</a>
            </li>
            <li class="sitemap__nav-item">
              <a href="#">ファンダイビング</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--padding">
              <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">ブログ</a>
            </li>
          </ul>

          <ul class="sitemap__nav-items">
            <li class="sitemap__nav-item sitemap__nav-item--bold">
              <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">よくある質問</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--padding">
              <a href="<?php echo esc_url( home_url( '/privacypolicy/' ) ); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--padding">
              <a href="<?php echo esc_url( home_url( '/terms-of-servises/' ) ); ?>">利用規約</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--padding">
              <a href="<?php echo esc_url( home_url( '/sitemap/' ) ); ?>">サイトマップ</a>
            </li>
            <li class="sitemap__nav-item sitemap__nav-item--bold sitemap__nav-item--padding">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php echo get_template_part('/template/parts-contact')?>
  </div>
</main>
<?php get_footer(); ?>