<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/blog-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/blog-mv-sp.jpg')); ?>" alt="魚の群れ" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">blog</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="blog-page">
      <div class="blog-page__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="blog-page__block block">
        <div class="block__left">
          <div class="blog-page__list">
            <?php if (have_posts()) : ?>
            <div class="blog-page__items blog-cards blog-cards--col2">
              <?php while (have_posts()) : the_post(); ?>
              <article class="blog-cards__item card">
                <a href="<?php the_permalink(); ?>">
                  <figure class="card__img">
                    <img src="<?php the_post_thumbnail(); ?>" alt="珊瑚礁" />
                  </figure>
                  <div class="card__body">
                    <div class="card__meta">
                      <time datetime="<?php the_time('Y-m-d'); ?>"
                        class="card__meta-date"><?php the_time('Y/m/d'); ?></time>
                      <h3 class="card__meta-title"><?php echo wp_trim_words( get_the_title(), 20, '…' ); ?></h3>
                    </div>
                    <div class="card__content">
                      <p>
                        <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?> </p>
                    </div>
                  </div>
                </a>
              </article>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="blog-page__pagenavi">
              <?php wp_pagenavi(); ?>
            </div>
          </div>
        </div>
        <div class="block__right">
          <aside class="blog-page__sidebar sidebar">
            <?php get_sidebar(); ?>
          </aside>
        </div>
      </div>
    </div>
    <?php echo get_template_part('/template/parts-contact')?>
</main>
<?php get_footer(); ?>