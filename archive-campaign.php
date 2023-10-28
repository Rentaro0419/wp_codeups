<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/campaign-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/campaign-mv-sp.jpg')); ?>"
            alt="チョウチョウウオが泳いでいる" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">campaign</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="campaign-page">
      <div class="campaign-page__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="campaign-page__category category">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'campaign' ) ); ?>"
          class="category__tab current">all</a>
        <?php
          $taxonomy_terms = get_terms( 'campaign_category', array( 'hide_empty' => false ) );
          foreach ( $taxonomy_terms as $taxonomy_term ) :
        ?>
        <a href="<?php echo esc_url( get_term_link( $taxonomy_term, 'campaign_category' ) ); ?>"
          class="category__tab"><?php echo esc_html( $taxonomy_term->name ); ?></a>
        <?php endforeach; ?>
      </div>
      <?php if (have_posts()) : ?>
      <div class="campaign-page__items">
        <?php while (have_posts()) : the_post(); ?>

        <div class="campaign-page__item campaign-card">

          <figure class="campaign-card__img">
            <?php the_post_thumbnail(); ?>
          </figure>
          <div class="slider__body">
            <?php
                  $taxonomy_terms = get_the_terms($post->ID, 'campaign_category'); 
                  if ( $taxonomy_terms ) {
                    echo '<p class="slider__meta-tag">'.$taxonomy_terms[0]->name.'</p>';
                  }
                  ?>
            <h3 class="slider__meta-title slider__meta-title--large">
              <?php the_title(); ?>
            </h3>
            <div class="slider__price">
              <p class="slider__price-plan">全部コミコミ(お一人様)</p>
              <div class="slider__price-box">
                <p class="slider__price-original">&yen;<?php the_field('list-price'); ?>
                </p>
                <p class="slider__price-discount">&yen; <?php the_field('discount-price'); ?>
                </p>
              </div>
            </div>
            <p class="slider__text u-desktop">
              <?php the_content(); ?>
            </p>
            <p class="slider__term u-desktop">
              <?php the_field('period'); ?>
            </p>
            <p class="slider__subtext u-desktop">
              ご予約・お問い合わせはコチラ
            </p>
            <div class="slider__btn u-desktop">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="common-btn">
                <p>Contact us</p>
              </a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif;?>
      </div>
      <div class="campaign-page__pagination">
        <div class="wp-pagenavi">
          <?php wp_pagenavi(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php echo get_template_part('parts-contact')?>
</main>
<?php get_footer(); ?>