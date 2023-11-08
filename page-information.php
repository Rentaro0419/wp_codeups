<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/information-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/information-mv-sp.jpg')); ?>"
            alt="綺麗な海と魚たち" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">information</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
  </div>
  <div class="information-page">
    <div class="information-page__bg">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
        alt="キンギョハナダイ" />
    </div>
    <div class="information-page__inner inner">
      <div class="information-page__tab tab-list">
        <div class="tab js-tab active" data-category="license">
          <div class="tab__block">
            <img class="u-desktop" src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/whole.svg')); ?>"
              alt="くじら" />
            <p>ライセンス<br class="u-mobile" />講習</p>
          </div>
        </div>
        <div class="tab js-tab" data-category="fanDiving">
          <div class="tab__block">
            <img class="u-desktop" src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/shark.svg')); ?>"
              alt="くじら" />
            <p>ファン<br class="u-mobile" />ダイビング</p>
          </div>
        </div>
        <div class="tab js-tab" data-category="diving">
          <div class="tab__block">
            <img class="u-desktop"
              src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/one-fish.svg')); ?>" alt="くじら" />
            <p>体験<br class="u-mobile" />ダイビング</p>
          </div>
        </div>
      </div>
      <div class="tab-content js-tab-content show" data-target="license" id="tab_panel-1">
        <div class="tab-content__text">
          <h3>ライセンス講習</h3>
          <p>
            泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
          </p>
        </div>
        <figure class="tab-content__img">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/tab-content1.jpg')); ?>" alt="綺麗な海" />
        </figure>
      </div>
      <div class="tab-content js-tab-content" data-target="fanDiving" id="tab_panel-2">
        <div class="tab-content__text">
          <h3>ファンダイビング</h3>
          <p>
            ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
          </p>
        </div>
        <figure class="tab-content__img">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/tab-content2.jpg')); ?>" alt="綺麗な海" />
        </figure>
      </div>
      <div class="tab-content js-tab-content" data-target="diving" id="tab_panel-3">
        <div class="tab-content__text">
          <h3>体験ダイビング</h3>
          <p>
            ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
          </p>
        </div>
        <figure class="tab-content__img">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/tab-content3.jpg')); ?>" alt="綺麗な海" />
        </figure>
      </div>
    </div>
  </div>
  <?php echo get_template_part('/template/parts-contact')?>
</main>
<?php get_footer(); ?>