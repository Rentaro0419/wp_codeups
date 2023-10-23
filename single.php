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
    <div class="single">
      <div class="single__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="single__block block">
        <div class="single__content block__left">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="single__meta">
            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
            <h2><?php the_title(); ?></h2>
          </div>
          <div class="single__text">
            <figure>
              <?php the_post_thumbnail(); ?>
            </figure>
            <?php the_content(); ?>
          </div>

          <?php
            $prev = get_previous_post();
            if (!empty($prev)) {
              $prev_url = esc_url(get_permalink($prev->ID));
            }
            $next = get_next_post();
            if (!empty($next)) {
              $next_url = esc_url(get_permalink($next->ID));
            }
            ?>
          <div class="single__pagenavi">
            <?php if (!empty($prev)) : ?>
            <a href="<?php echo $prev_url; ?>">
              <div class="prev-btn">
              </div>
            </a>
            <?php endif; ?>
            <?php if (!empty($next)) : ?>
            <a href="<?php echo $next_url; ?>">
              <div class="next-btn">
              </div>
            </a>
            <?php endif; ?>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="single__sidebar block__right">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php echo get_template_part('parts-contact')?>
</main>
<?php get_footer(); ?>