<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/faq-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/faq-mv-sp.jpg')); ?>" alt="綺麗な海と青空" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">FAQ</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="faq-page">
      <div class="faq-page__inner">
        <div class="faq-page__bg">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
            alt="キンギョハナダイ" />
        </div>
        <div class="faq-page__content">
          <div class="faq-page__list">
            <?php
              $fields = SCF::get_option_meta( 'theme-options', 'faq-list' );
              foreach ( $fields as $field_name => $fields_value ) {
            ?>
            <dl class="faq-page__items">
              <div class="faq-page__item">
                <dt class="faq-page__list-title js-faq-title">
                  <?php echo $fields_value['question']; ?>
                </dt>
                <dd>
                  <?php echo $fields_value['answers']; ?>
                </dd>
              </div>
            </dl>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo get_template_part('parts-contact')?>
</main>
<?php get_footer(); ?>