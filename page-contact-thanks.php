<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/contact-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/contact-mv-sp.jpg')); ?>"
            alt="緑色の綺麗な海" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">contact</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="thanks">
      <div class="thanks__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <p>お問い合わせ内容を送信完了しました。</p>
      <p>
        このたびは、お問い合わせ頂き<br class="u-mobile" />誠にありがとうございます。<br />
        お送り頂きました内容を確認の上、<br class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。<br />
        また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />自動返信の確認メールをお送りしております。
      </p>
    </div>
  </div>
</main>
<?php get_footer(); ?>