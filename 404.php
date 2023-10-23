<?php get_header(); ?>
<main>
  <div class="page-404">
    <div class="page-404__inner inner">
      <?php echo get_template_part('/template/breadcrumb')?>
      <figure class="page-404__bg">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/404.png')); ?>" alt="くじら" />
      </figure>
      <div class="page-404__block">
        <div class="page-404__content">
          <h2 class="page-404__title">404</h2>
          <p class="page-404__text">
            申し訳ありません。<br />お探しのページが見つかりません。
          </p>
          <div class="page-404__btn">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="common-btn common-btn--white">
              <p>Page TOP</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>