<!doctype html>
<html lang="ja">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <!-- meta情報 -->
    <title><?php the_title(); ?></title>
    <meta name="description" content="<blog_info('description')>" />
    <meta name="keywords" content="ダイビング、" />
    <!-- ogp -->
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="<blog_info('name')>" />
    <meta property="og:description" content="<blog_info('description')>" />
    <!-- ファビコン -->
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('/assets/images/common/coral.png')); ?>" />
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo esc_url(get_theme_file_uri('/assets/css/style.css')); ?>" />
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- jQuery本体 -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- inview.js -->
    <script src="<?php echo esc_url(get_theme_file_uri('/assets/js/jquery.inview.min.js')); ?>">
    </script>
    <!-- 設定用js -->
    <script defer src="<?php echo esc_url(get_theme_file_uri('/assets/js/script.js')); ?>"></script>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif:wght@400;500;700&display=swap"
      rel="stylesheet" />
    <?php wp_head(); ?>
  </head>

  <body>
    <?php wp_body_open(); ?>
    <?php if (is_front_page()) { ?>
    <div class="loading">
      <div class="loading__logo">
        <h2 class="loading__logo-main">diving</h2>
        <p class="loading__logo-sub">into the ocean</p>
      </div>
    </div>
    <?php } ?>
    <header class="header">
      <div class="header__inner">
        <div class="header__block">
          <div class="header__logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <picture>
                <source media="(min-width: 430px)"
                  srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/logo.png')); ?>" />
                <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/logo-sp.png')); ?>"
                  alt="codeups" />
              </picture>
            </a>
          </div>
          <ul class="header__menu">
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>">
                <span class="header__menu-item-en">Campaign</span>
                <span class="header__menu-item-jp">キャンペーン</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/aboutus/' ) ); ?>">
                <span class="header__menu-item-en">About us</span>
                <span class="header__menu-item-jp">私たちについて</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/information/' ) ); ?>">
                <span class="header__menu-item-en">Information</span>
                <span class="header__menu-item-jp">ダイビング情報</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
                <span class="header__menu-item-en">Blog</span>
                <span class="header__menu-item-jp">ブログ</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">
                <span class="header__menu-item-en">Voice</span>
                <span class="header__menu-item-jp">お客様の声</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/price/' ) ); ?>">
                <span class="header__menu-item-en">Price</span>
                <span class="header__menu-item-jp">料金一覧</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">
                <span class="header__menu-item-en">FAQ</span>
                <span class="header__menu-item-jp">よくある質問</span>
              </a>
            </li>
            <li class="header__menu-item">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                <span class="header__menu-item-en">Contact</span>
                <span class="header__menu-item-jp">お問合せ</span>
              </a>
            </li>
          </ul>
          <button class="header__hamburger js-hamburger u-mobile">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
      <div class="header__drawer js-drawer-menu">
        <div class="header__drawer-inner">
          <div class="header__drawer-block">
            <div class="header__drawer-nav">
              <ul class="header__drawer-nav-items">
                <li class="header__drawer-nav-item header__drawer-nav-item--bold">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>">キャンペーン</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="#">ライセンス取得</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="#">貸切体験ダイビング</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="#">ナイトダイビング</a>
                </li>
                <li class="header__drawer-nav-item header__drawer-nav-item--bold header__drawer-nav-item--padding">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/aboutus/' ) ); ?>">私たちについて</a>
                </li>
              </ul>
              <ul class="header__drawer-nav-items">
                <li class="header__drawer-nav-item header__drawer-nav-item--bold">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客様の声</a>
                </li>
                <li
                  class="header__drawer-nav-item header__drawer-nav-item--bold header__drawer-nav-item--paddingbottom">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/price/' ) ); ?>">料金一覧</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="#">ライセンス講習</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="#">体験ダイビング</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="#">ファンダイビング</a>
                </li>
              </ul>
              <ul class="header__drawer-nav-items">
                <li class="header__drawer-nav-item header__drawer-nav-item--bold">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/information/' ) ); ?>">ダイビング情報</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/information/' ) ); ?>">ライセンス取得</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/information/' ) ); ?>">体験ダイビング</a>
                </li>
                <li class="header__drawer-nav-item">
                  <a class="js-hamburger__link"
                    href="<?php echo esc_url( home_url( '/information/' ) ); ?>">ファンダイビング</a>
                </li>
                <li class="header__drawer-nav-item header__drawer-nav-item--bold header__drawer-nav-item--padding">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/home/' ) ); ?>">ブログ</a>
                </li>
              </ul>

              <ul class="header__drawer-nav-items">
                <li class="header__drawer-nav-item header__drawer-nav-item--bold">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">よくある質問</a>
                </li>
                <li class="header__drawer-nav-item header__drawer-nav-item--bold header__drawer-nav-item--padding">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/privacypolicy/' ) ); ?>">プライバシー<br
                      class="u-mobile" />ポリシー</a>
                </li>
                <li class="header__drawer-nav-item header__drawer-nav-item--bold header__drawer-nav-item--padding">
                  <a class="js-hamburger__link"
                    href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>">利用規約</a>
                </li>
                <li class="header__drawer-nav-item header__drawer-nav-item--bold header__drawer-nav-item--padding">
                  <a class="js-hamburger__link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>