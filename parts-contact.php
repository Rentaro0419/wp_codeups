<?php if (is_front_page()) { ?>
<section class="top-contact contact" id="contact">
  <?php } elseif (is_page('campaign')) { ?>
  <section class="campaign-contact contact" id="contact">
    <?php } else { ?>
    <section class="sub-contact contact" id="contact">
      <?php } ?>
      <div class="contact__bg-img">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-left.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="contact__inner">
        <div class="contact__nav">
          <div class="contact__address">
            <div class="contact__address-logo">
              <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/CodeUps-green.png')); ?>"
                alt="codeups" />
            </div>
            <div class="contact__address-map">
              <div class="contact__address-map-text">
                <p>沖縄県那覇市1-1</p>
                <p>TEL:0120-000-0000</p>
                <p>営業時間:8:30-19:00</p>
                <p>定休日:毎週火曜日</p>
              </div>
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d4256.997435032445!2d127.6465203045275!3d26.20663451255763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z6YKj6KaH56m65riv!5e0!3m2!1sja!2sjp!4v1688884096651!5m2!1sja!2sjp"
                style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
          <div class="contact__block">
            <div class="contact__title">
              <div class="title">
                <span class="title-en title-en--large">Contact</span>
                <h2 class="title-jp">お問い合わせ</h2>
              </div>
            </div>
            <p class="contact__block-text">ご予約・お問い合わせはコチラ</p>
            <div class="contact__btn">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="common-btn">
                <p>Contact us</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>