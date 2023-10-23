<?php get_header(); ?>
<main>
  <div class="mv">
    <div class="mv__inner">
      <div class="mv__slider swiper js-main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide mv__swiper-slide">
            <div class="slide-img mv__swiper-img">
              <picture>
                <source srcset="<?php the_field('image1-pc'); ?>" media="(min-width:1024px)" />
                <img src="<?php the_field('image1-sp'); ?>" alt="" />
              </picture>
            </div>
          </div>
          <div class="swiper-slide mv__swiper-slide">
            <div class="slide-img mv__swiper-img">
              <picture>
                <source srcset="<?php the_field('image2-pc'); ?>" media="(min-width:1024px)" />
                <img src="<?php the_field('image2-sp'); ?>" alt="" />
              </picture>
            </div>
          </div>
          <div class="swiper-slide mv__swiper-slide">
            <div class="slide-img mv__swiper-img">
              <picture>
                <source srcset="<?php the_field('image3-pc'); ?>" media="(min-width:1024px)" />
                <img src="<?php the_field('image3-sp'); ?>" alt="" />
              </picture>
            </div>
          </div>
          <div class="swiper-slide mv__swiper-slide">
            <div class="slide-img mv__swiper-img">
              <picture>
                <source srcset="<?php the_field('image4-pc'); ?>" media="(min-width:1024px)" />
                <img src="<?php the_field('image4-sp'); ?>" alt="" />
              </picture>
            </div>
          </div>
        </div>
        <div class="mv__title">
          <h1 class="mv__title-main">diving</h1>
          <div class="mv__title-sub">into the ocean</div>
        </div>
      </div>
    </div>
  </div>
  <section class="top-campaign campaign" id="campaign">
    <div class="campaign__inner inner">
      <div class="campaign__title title">
        <span class="title-en">Campaign</span>
        <h2 class="title-jp">キャンペーン</h2>
      </div>
      <div class="swiper campaign__slider slider js-campaign-swiper">
        <?php
        // メインクエリを一時的に保存
        $temp_query = $wp_query;

        // 新しいクエリを作成して指定の条件で投稿を取得
        $args = array(
            'post_type' => 'campaign', // 投稿タイプを指定
            'posts_per_page' => 10, // 表示する投稿の数を指定
        );

        $sidebar_query = new WP_Query( $args );
        ?>
        <div class="swiper-wrapper slider__items">
          <?php if ( $sidebar_query->have_posts() ) :
                // ループを開始
                while ( $sidebar_query->have_posts() ) :
                $sidebar_query->the_post();
                // 投稿の表示コードをここに追加
                ?>
          <div class="swiper-slide slider__item">
            <a href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>">
              <figure class="slider__img">
                <?php the_post_thumbnail(); ?>
              </figure>
              <div class="slider__body">
                <?php
              $taxonomy_terms = get_the_terms($post->ID, 'campaign_category'); 
              if ( $taxonomy_terms ) {
                echo '<p class="slider__meta-tag">'.$taxonomy_terms[0]->name.'</p>';
              }
              ?>
                <h3 class="slider__meta-title"><?php the_title(); ?></h3>
                <div class="slider__price">
                  <p class="slider__price-plan">全部コミコミ(お一人様)</p>
                  <div class="slider__price-box">
                    <p class="slider__price-original">&yen;<?php the_field('list-price'); ?></p>
                    <p class="slider__price-discount">&yen;<?php the_field('discount-price'); ?></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
        </div>
      </div>
      <div class="slider-button-prev u-desktop slider-button">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/campaign-prev.png')); ?>"
          alt="左のキャンペーンカードを選択するボタン" />
      </div>
      <div class="slider-button-next u-desktop slider-button">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/campaign-next.png')); ?>"
          alt="右のキャンペーンカードを選択するボタン" />
      </div>
      <div class="campaign__btn">
        <a href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>" class="common-btn">
          <p>View more</p>
        </a>
      </div>
    </div>
  </section>
  <section class="top-about about" id="about">
    <div class="about__bg-img u-desktop">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/coral.png')); ?>" alt="珊瑚礁" />
    </div>
    <div class="about__inner inner">
      <div class="about__title title">
        <span class="title-en">About us</span>
        <h2 class="title-jp">私たちについて</h2>
      </div>
      <div class="about__block">
        <div class="about__img u-desktop">
          <figure class="about__img-sky">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/about1.jpg')); ?>" alt="綺麗な青色" />
          </figure>
          <figure class="about__img-sea">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/about2.jpg')); ?>" alt="綺麗な海" />
          </figure>
        </div>
        <figure class="about__img-sp u-mobile">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/about-sp.png')); ?>" alt="綺麗な青色" />
        </figure>
        <div class="about__content">
          <h3 class="about__content-title">Dive into <br />the Ocean</h3>
          <div class="about__content-text">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
            <div class="about__content-btn">
              <a href="<?php echo esc_url( home_url( '/aboutus/' ) ); ?>" class="common-btn">
                <p>View more</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="top-info information" id="information">
    <div class="information__inner inner">
      <div class="information-title title">
        <span class="title-en">Information</span>
        <h2 class="title-jp">ダイビング情報</h2>
      </div>
      <div class="information__block">
        <figure class="information__img js-colorbox colorbox">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/information.jpg')); ?>"
            alt="綺麗な海とチョウチョウウオ" />
        </figure>
        <div class="information__content">
          <h3 class="information__content-title">ライセンス講習</h3>
          <p class="information__content-text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__btn">
            <a href="<?php echo esc_url( home_url( '/information/' ) ); ?>" class="common-btn">
              <p>View more</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="top-blog blog" id="blog">
    <div class="blog__bg">
      <div class="blog__bg-img u-desktop">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-lightgreen.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
    </div>
    <div class="blog__inner inner">
      <div class="blog__title title">
        <span class="title-en title-en--white">Blog</span>
        <h2 class="title-jp title-jp--white">ブログ</h2>
      </div>
      <div class="blog__list">
        <?php
        // メインクエリを一時的に保存
        $temp_query = $wp_query;

        // 新しいクエリを作成して指定の条件で投稿を取得
        $args = array(
            'post_type' => 'post', // 投稿タイプを指定
            'posts_per_page' => 3, // 表示する投稿の数を指定
        );

        $sidebar_query = new WP_Query( $args );
        ?>
        <div class="blog__items blog-cards">
          <?php if ( $sidebar_query->have_posts() ) :
                // ループを開始
              while ( $sidebar_query->have_posts() ) :
              $sidebar_query->the_post();
              // 投稿の表示コードをここに追加
              ?>
          <article class="blog-cards__item card">
            <a href="<?php the_permalink(); ?>">
              <figure class="card__img">
                <?php the_post_thumbnail(); ?>
              </figure>
              <div class="card__body">
                <div class="card__meta">
                  <time datetime="<?php the_time('Y-m-d'); ?>"
                    class="card__meta-date"><?php the_time('Y/m/d'); ?></time>
                  <h3 class="card__meta-title"><?php echo wp_trim_words( get_the_title(), 17, '…' ); ?></h3>
                </div>
                <div class="card__content">
                  <p>
                    <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
                  </p>
                </div>
              </div>
            </a>
          </article>
          <?php
          endwhile;
          endif;
          // メインクエリを元に戻す
          wp_reset_postdata();
          // メインクエリを復元
          $wp_query = $temp_query;
          ?>
        </div>
      </div>
      <div class="blog__btn">
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="common-btn">
          <p>View more</p>
        </a>
      </div>
    </div>
  </section>
  <section class="top-voice voice" id="voice">
    <div class="voice__bg-img u-desktop">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
        alt="キンギョハナダイ" />
    </div>
    <div class="voice__bg-img2 u-desktop">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/seahorse.png')); ?>" alt="タツノオトシゴ" />
    </div>
    <div class="voice__inner inner">
      <div class="voice__title title">
        <span class="title-en">Voice</span>
        <h2 class="title-jp">お客様の声</h2>
      </div>
      <?php
                  // メインクエリを一時的に保存
                  $temp_query = $wp_query;

                  // 新しいクエリを作成して指定の条件で投稿を取得
                  $args = array(
                      'post_type' => 'voice', // 投稿タイプを指定
                      'posts_per_page' => 2, // 表示する投稿の数を指定
                  );

                  $sidebar_query = new WP_Query( $args );
              ?>
      <div class="voice__items voice-cards">
        <?php if ( $sidebar_query->have_posts() ) :
                // ループを開始
              while ( $sidebar_query->have_posts() ) :
              $sidebar_query->the_post();
              // 投稿の表示コードをここに追加
              ?>
        <article class="voice-cards__item box">
          <div class="box__head">
            <div class="box__block">
              <div class="box__meta">
                <p class="box__meta-age"><?php the_field('age')?></p>
                <?php
            $taxonomy_terms = get_the_terms($post->ID, 'campaign_category'); 
            if ( $taxonomy_terms ) {
              echo '<p class="slider__metabox__meta-tag">'.$taxonomy_terms[0]->name.'</p>';
            }
            ?>
              </div>
              <div class="box__box">
                <h3 class="box__title">
                  <?php the_title(); ?>
                </h3>
              </div>
            </div>
            <figure class="box__img js-colorbox colorbox">
              <?php the_post_thumbnail(); ?>
            </figure>
          </div>
          <div class="box__body">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
                endwhile;
                endif;
                // メインクエリを元に戻す
                wp_reset_postdata();
                // メインクエリを復元
                $wp_query = $temp_query;
                ?>
      </div>
      <div class="voice__btn">
        <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>" class="common-btn">
          <p>View more</p>
        </a>
      </div>
    </div>
  </section>
  <section class="top-price price" id="price">
    <figure class="price__bg-img u-desktop">
      <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-left.png')); ?>"
        alt="キンギョハナダイ" />
    </figure>
    <div class="price__inner">
      <div class="price__title title">
        <span class="title-en">Price</span>
        <h2 class="title-jp">料金一覧</h2>
      </div>
      <div class="price__block">
        <div class="price__block-img js-colorbox colorbox">
          <picture>
            <source media="(min-width: 768px)"
              srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/price-pc.jpg')); ?>" />
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/price-pc.jpg')); ?>" alt="亀の泳ぐ姿" />
          </picture>
        </div>
        <?php
          $page_id = get_page_by_path('price');
          $page_id = $page_id->ID; //ページIDを取得して$page_idに代入
        ?>
        <div class="price__block-list">
          <div class="price__block-items">
            <h3>ライセンス講習</h3>
            <dl>
              <div class="price__block-item">
                <dt><?php the_field('licence-course1', $page_id); ?></dt>
                <dd>&yen;<?php the_field('licence-price1', $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('licence-course2', $page_id); ?></dt>
                <dd>&yen;<?php the_field('licence-price2', $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('licence-course3', $page_id); ?></dt>
                <dd>&yen;<?php the_field('licence-price3', $page_id); ?></dd>
              </div>
            </dl>
          </div>
          <div class="price__block-items">
            <h3>体験ダイビング</h3>
            <dl>
              <div class="price__block-item">
                <dt><?php the_field('experience-course1', $page_id); ?></dt>
                <dd>&yen;<?php the_field('experience-price1' , $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('experience-course2', $page_id); ?></dt>
                <dd>&yen;<?php the_field('experience-price2' , $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('experience-course3', $page_id); ?></dt>
                <dd>&yen;<?php the_field('experience-price3' , $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('experience-course4', $page_id); ?></dt>
                <dd>&yen;<?php the_field('experience-price4' , $page_id); ?></dd>
              </div>
            </dl>
          </div>
          <div class="price__block-items">
            <h3>ファンダイビング</h3>
            <dl>
              <div class="price__block-item">
                <dt><?php the_field('fandiving-course1', $page_id); ?></dt>
                <dd>&yen;<?php the_field('fandiving-price1', $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('fandiving-course2', $page_id); ?></dt>
                <dd>&yen;<?php the_field('fandiving-price2', $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('fandiving-course3', $page_id); ?></dt>
                <dd>&yen;<?php the_field('fandiving-price3', $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('fandiving-course4', $page_id); ?></dt>
                <dd>&yen;<?php the_field('fandiving-price4', $page_id); ?></dd>
              </div>
            </dl>
          </div>
          <div class="price__block-items">
            <h3>スペシャルダイビング</h3>
            <dl>
              <div class="price__block-item">
                <dt><?php the_field('special-course1', $page_id); ?></dt>
                <dd>&yen;<?php the_field('special-price1' , $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('special-course2', $page_id); ?></dt>
                <dd>&yen;<?php the_field('special-price2' , $page_id); ?></dd>
              </div>
              <div class="price__block-item">
                <dt><?php the_field('special-course3', $page_id); ?></dt>
                <dd>&yen;<?php the_field('special-price3' , $page_id); ?></dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
      <div class="price__btn">
        <a href="<?php echo esc_url( home_url( '/price/' ) ); ?>" class="common-btn">
          <p>View more</p>
        </a>
      </div>
    </div>
  </section>
  <?php echo get_template_part('parts-contact')?>
</main>
<?php get_footer(); ?>