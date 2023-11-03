<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/aboutus-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/aboutus-mv-sp.jpg')); ?>" alt="シーサー" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">about us</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
  </div>
  <section class="about-page" id="about">
    <div class="about-page__bg">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
        alt="キンギョハナダイ" />
    </div>
    <div class="about__inner inner">
      <div class="about__block">
        <div class="about__img u-desktop">
          <figure class="about__img-sky">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/about1.jpg')); ?>" alt="綺麗な青色" />
          </figure>
          <figure class="about__img-sea">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/about2.jpg')); ?>" alt="綺麗な海" />
          </figure>
        </div>
        <div class="about-page__img-sp">
          <figure class="about__img-sp u-mobile">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/about-sp.jpg')); ?>" alt="綺麗な青色" />
          </figure>
          <h3 class="about-page__title u-mobile">
            Dive into <br />the Ocean
          </h3>
        </div>
        <div class="about-page__content">
          <h3 class="about-page__content-title u-desktop">
            Dive into <br />the Ocean
          </h3>
          <div class="about-page__content-text">
            <p>
              私たちは情熱を持ってダイビングの世界を案内するダイビングインストラクター集団です。海の美しさと驚異に魅了され、その素晴らしさを多くの人々と共有することに情熱を燃やしています。<br
                class="u-desktop">
              安全性を最優先に考えながら、初心者から経験豊富なダイバーまで、様々なレベルの方々に楽しいダイビング体験を提供しています。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about-page__gallery gallery">
    <div class="gallery__inner inner">
      <div class="gallery__bg u-desktop">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-left.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="gallery__title title">
        <span class="title-en">Gallery</span>
        <h2 class="title-jp">フォト</h2>
      </div>
      <div class="gallery__block">
        <?php
        $repeat_item = SCF::get_option_meta('gallery_options', 'gallery_lists');
        foreach ($repeat_item as $index => $fields) {
          $image_url = wp_get_attachment_image_src($fields['gallery_item'], 'full');
        ?>
        <figure class="gallery__image" data-micromodal-trigger="js-modal<?php echo $index + 1; ?>">
          <img src="<?php echo $image_url[0]; ?>" alt="ギャラリーの画像" />
        </figure>
        <?php
        }
        ?>
      </div>
      <?php
        $repeat_item = SCF::get_option_meta('gallery_options', 'gallery_lists');
        foreach ($repeat_item as $index => $fields) {
          $image_url = wp_get_attachment_image_src($fields['gallery_item'], 'full');
        ?>
      <div class="gallery__modal modal modal--slide" id="js-modal<?php echo $index + 1; ?>" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__image" role="dialog" aria-modal="true">
            <img src="<?php echo $image_url[0]; ?>" alt="" data-micromodal-close />
          </div>
        </div>
      </div>
      <?php
        }
        ?>
    </div>
  </section>
  <?php echo get_template_part('/template/parts-contact')?>
</main>
<?php get_footer(); ?>