<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/price-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/price-mv-sp.jpg')); ?>"
            alt="チョウチョウウオが泳いでいる" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">price</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="price-page">
      <div class="price-page__inner">
        <div class="price-page__bg">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
            alt="キンギョハナダイ" />
        </div>

        <div class="price-page__block">
          <dl class="price-page__content">
            <dt>ライセンス講習</dt>
            <dd>
              <?php
                $license_fields = SCF::get_option_meta('price_options', 'license_lists');
                foreach ($license_fields as $license_field_name => $license_value) {
                  $license_content = esc_html($license_value['license_content']);
                  $license_subContent = esc_html($license_value['license_subContent']);
                  $license_price = esc_html($license_value['license_price']);
                ?>
              <div class="price-page__list">
                <?php if ($license_content && $license_subContent && $license_price) : ?>
                <div class="price-page__detail">
                  <?php echo $license_content; ?><br class="u-mobile"><?php echo $license_subContent; ?>
                </div>
                <div class="price-page__price">&yen;<?php
                          $license_prices = number_format($license_price);
                          echo $license_prices;
                          ?></div>
              </div>
              <?php endif; ?>
              <?php } ?>
            </dd>
          </dl>
          <dl class="price-page__content">
            <dt>体験ダイビング</dt>
            <dd>
              <?php
              $experience_fields = SCF::get_option_meta('price_options', 'experience_lists');
              foreach ($experience_fields as $experience_field) {
                $experience_content = esc_html($experience_field['experience_content']);
                $experience_subContent = esc_html($experience_field['experience_subContent']);
                $experience_price = esc_html($experience_field['experience_price']);
              ?>
              <?php if ($experience_content && $experience_subContent && $experience_price) : ?>
              <div class="price-page__list">
                <div class="price-page__detail">
                  <?php echo $experience_content; ?><br class="u-mobile"><?php echo $experience_subContent; ?>
                </div>
                <div class="price-page__price">&yen;<?php
                          $experience_prices = number_format($experience_price);
                          echo $experience_prices;
                          ?></div>
              </div>
              <?php endif; ?>
              <?php } ?>
            </dd>
          </dl>
          <dl class="price-page__content">
            <dt>ファンダイビング</dt>
            <dd>
              <?php
              $fan_fields = SCF::get_option_meta('price_options', 'fan_lists');
              foreach ($fan_fields as $fan_field) {
                $fan_content = esc_html($fan_field['fan_content']);
                $fan_subContent = esc_html($fan_field['fan_subContent']);
                $fan_price = esc_html($fan_field['fan_price']);
              ?>
              <?php if ($fan_content && $fan_subContent && $fan_price) : ?>
              <div class="price-page__list">
                <div class="price-page__detail">
                  <?php echo $fan_content; ?><br class="u-mobile"><?php echo $fan_subContent; ?>
                </div>
                <div class="price-page__price">&yen;<?php
                          $fan_prices = number_format($fan_price);
                          echo $fan_prices;
                          ?></div>
              </div>
              <?php endif; ?>
              <?php } ?>
            </dd>
          </dl>
          <dl class="price-page__content">
            <dt>スペシャルダイビング</dt>
            <dd>
              <?php
              $special_fields = SCF::get_option_meta('price_options', 'special_lists');
              foreach ($special_fields as $special_field) {
                $special_content = esc_html($special_field['special_content']);
                $special_subContent = esc_html($special_field['special_subContent']);
                $special_price = esc_html($special_field['special_price']);
              ?>
              <?php if ($special_content && $special_subContent && $special_price) : ?>
              <div class="price-page__list">
                <div class="price-page__detail">
                  <?php echo $special_content; ?><br class="u-mobile"><?php echo $special_subContent; ?>
                </div>
                <div class="price-page__price">&yen;<?php
                          $special_prices = number_format($special_price);
                          echo $special_prices;
                          ?></div>
              </div>
              <?php endif; ?>
              <?php } ?>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
  <?php echo get_template_part('parts-contact')?>
</main>
<?php get_footer(); ?>