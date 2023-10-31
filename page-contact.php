<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/contact-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/contact-mv-sp.jpg')); ?>"
            alt="綺麗な海と青空" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">contact</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="contact-page">
      <div class="contact-page__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="contact-page__inner">
        <div class="error js-errorMessage">
          <p>※必須項目が入力されていません。<br class="u-mobile">入力してください。</p>
        </div>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>