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
        <a href="<?php echo esc_url( get_post_type_archive_link( 'campaign' ) ); ?>" class="category__tab">all</a>
        <?php
          $taxonomy_terms = get_terms( 'campaign_category', array( 'hide_empty' => false ) );
          foreach ( $taxonomy_terms as $taxonomy_term ) :
        ?>
        <a href="<?php echo esc_url( get_term_link( $taxonomy_term, 'campaign_category' ) ); ?>"
          class="category__tab <?php if($taxonomy_term->slug === $term){ echo 'current'; } ?>"><?php echo esc_html( $taxonomy_term->name ); ?></a>
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
            <?php
            $campaignPrice = get_field('campaign_price');
            ?>
            <div class="slider__price">
              <?php if( !empty($campaignPrice['text']) ): ?>
              <p class="slider__price-plan"><?php echo esc_html($campaignPrice['text']); ?></p>
              <?php endif; ?>

              <div class="slider__price-box">
                <?php if( !empty($campaignPrice['list-price']) ): ?>
                <p class="slider__price-original">&yen;<?php echo number_format($campaignPrice['list-price']); ?>
                </p>
                <?php endif; ?>

                <?php if( !empty($campaignPrice['discount-price']) ): ?>
                <p class="slider__price-discount">&yen;<?php echo number_format($campaignPrice['discount-price']); ?>
                </p>
                <?php endif; ?>
              </div>
            </div>
            <?php
            $campaignDetail= get_field('campaign_detail');
            ?>
            <?php if( !empty($campaignDetail['campaign-main-text']) ): ?>
            <p class="slider__text u-desktop">
              <?php echo esc_html($campaignDetail['campaign-main-text']); ?>
            </p>
            <?php endif; ?>
            <?php $campaignPeriod = $campaignDetail['campaign-period'];
                    if ($campaignPeriod) : ?>
            <p class="slider__term u-desktop">
              <?php echo $campaignPeriod['campaign-period-start']; ?>&thinsp;-&thinsp;<?php echo $campaignPeriod['campaign-period-done']; ?>
            </p>
            <?php endif; ?>
            <?php if( !empty($campaignDetail['campaign-sub-text']) ): ?>
            <p class="slider__subtext u-desktop">
              <?php echo esc_html($campaignDetail['campaign-sub-text']); ?>
            </p>
            <?php endif; ?>
            <div class="slider__btn u-desktop">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="common-btn">
                <p>Contact us</p>
              </a>
            </div>
          </div>
        </div>
        <?php endwhile;
        endif;
        ?>
      </div>
      <div class="campaign-page__pagination">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </div>
  <?php echo get_template_part('/template/parts-contact')?>
</main>
<?php get_footer(); ?>