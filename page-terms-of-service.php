<?php get_header(); ?>
<main>
  <section class="mv-sub">
    <div class="mv-sub__img">
      <div class="mv-sub__img-filter">
        <picture>
          <source media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sitemap-mv-pc.jpg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sitemap-mv-sp.jpg')); ?>" alt="魚の群れ" />
        </picture>
      </div>
    </div>
    <h1 class="mv-sub__title">terms of service</h1>
  </section>
  <div class="inner">
    <?php echo get_template_part('/template/breadcrumb')?>
    <div class="service">
      <div class="service__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/fish-green-right.png')); ?>"
          alt="キンギョハナダイ" />
      </div>
      <div class="service__inner">
        <div class="service__block">
          <h2 class="service__title"><?php the_title(); ?></h2>
          <div class="service__content">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

            <?php endwhile;
              endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo get_template_part('/template/parts-contact')?>
</main>
<?php get_footer(); ?>