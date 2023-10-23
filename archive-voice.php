<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/voice-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/voice-mv-sp.jpg')); ?>"
            alt="緑色の綺麗な海" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">voice</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="voice-page">
      <div class="voice-page__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="voice-page__category category">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'voice' ) ); ?>" class="category__tab current">all</a>
        <?php
          $taxonomy_terms = get_terms( 'voice_category', array( 'hide_empty' => false ) );
          foreach ( $taxonomy_terms as $taxonomy_term ) :
        ?>
        <a href="<?php echo esc_url( get_term_link( $taxonomy_term, 'voice_category' ) ); ?>"
          class="category__tab"><?php echo esc_html( $taxonomy_term->name ); ?></a>
        <?php endforeach; ?>
      </div>
      <div class="voice-page__block">

        <div class="voice-page__content voice-cards">

          <?php
                $wp_query = new WP_Query();
                $my_posts = array(
                    'post_type' => 'voice',// 投稿タイプを設定
                    'posts_per_page' => '6',// 表示する記事数を設定
                );

                $wp_query->query($my_posts);
                if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                $obj = get_post_type_object($post->post_type); //投稿タイプ情報を取得
                ?>
          <article class="voice-cards__item box">
            <div class="box__head">
              <div class="box__block">
                <div class="box__meta">
                  <p class="box__meta-age">
                    <?php the_field('age'); ?>
                  </p>
                  <?php
                  $taxonomy_terms = get_the_terms($post->ID, 'voice_category'); 
                  if ( $taxonomy_terms ) {
                    echo '<p class="box__meta-tag">'.$taxonomy_terms[0]->name.'</p>';
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
              <p><?php the_content(); ?></p>
            </div>
          </article>
          <?php endwhile;
              endif;
              wp_reset_postdata();
              ?>
        </div>
        <div class="voice-page__pagenavi">
          <div class="wp-pagenavi">
            <?php wp_pagenavi(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo get_template_part('parts-contact')?>
</main>
<?php get_footer(); ?>