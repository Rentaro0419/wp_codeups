        <?php if (is_home()) { ?>
        <div class="blog-page__sidebar sidebar">
          <?php } elseif (is_single()) { ?>
          <div class="single__sidebar sidebar">
            <?php } ?>
            <div class="sidebar__article">
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

              <div class="sidebar-title">
                <figure>
                  <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/whole-black.svg')); ?>"
                    alt="くじら" />
                </figure>
                <h3>人気記事</h3>
              </div>
              <?php if ( $sidebar_query->have_posts() ) :
                // ループを開始
              while ( $sidebar_query->have_posts() ) :
              $sidebar_query->the_post();
              // 投稿の表示コードをここに追加
              ?>
              <!-- ここに投稿の内容などを表示するコードを追加 -->
              <a href="<?php the_permalink(); ?>" class="sidebar__article-item">
                <figure class="sidebar__article-item-img">
                  <?php the_post_thumbnail(); ?>
                </figure>
                <div class="sidebar__article-item-text">
                  <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
                  <h4><?php echo wp_trim_words( get_the_title(), 7, '…' ); ?></h4>
                </div>
              </a>

              <?php
                endwhile;
                endif;

                // メインクエリを元に戻す
                wp_reset_postdata();

                // メインクエリを復元
                $wp_query = $temp_query;
                ?>

            </div>
            <div class="sidebar__voice">
              <?php
                // メインクエリを一時的に保存
                $temp_query = $wp_query;

                // 新しいクエリを作成して指定の条件で投稿を取得
                $args = array(
                    'post_type' => 'voice', // 投稿タイプを指定
                    'posts_per_page' => 1, // 表示する投稿の数を指定
                );

                $sidebar_query = new WP_Query( $args );
                ?>

              <div class="sidebar-title">
                <figure>
                  <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/whole-black.svg')); ?>"
                    alt="くじら" />
                </figure>
                <h3>口コミ</h3>
              </div>
              <?php if ( $sidebar_query->have_posts() ) :
                // ループを開始
              while ( $sidebar_query->have_posts() ) :
              $sidebar_query->the_post();
              // 投稿の表示コードをここに追加
              ?>
              <a href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>">
                <figure class="sidebar__voice-img">
                  <?php the_post_thumbnail(); ?>
                </figure>
                <div class="sidebar__voice-text">
                  <p class="sidebar__voice-age">
                    <?php the_field('age')?>
                  </p>
                  <h4><?php the_title(); ?></h4>
                </div>
                <?php
                endwhile;
                endif;
                // メインクエリを元に戻す
                wp_reset_postdata();
                // メインクエリを復元
                $wp_query = $temp_query;
                ?>
              </a>
            </div>
            <div class="sidebar__campaign">
              <div class="sidebar-title">
                <figure>
                  <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/whole-black.svg')); ?>"
                    alt="くじら" />
                </figure>
                <h3>キャンペーン</h3>
              </div>
              <?php
                // メインクエリを一時的に保存
                $temp_query = $wp_query;

                // 新しいクエリを作成して指定の条件で投稿を取得
                $args = array(
                    'post_type' => 'campaign', // 投稿タイプを指定
                    'posts_per_page' => 2, // 表示する投稿の数を指定
                );

                $sidebar_query = new WP_Query( $args );
                ?>
              <div class="sidebar__campaign-cards">
                <?php if ( $sidebar_query->have_posts() ) :
                // ループを開始
                while ( $sidebar_query->have_posts() ) :
                $sidebar_query->the_post();
                // 投稿の表示コードをここに追加
                ?>
                <div class="sidebar__campaign-card">
                  <a href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>">
                    <figure class="sidebar__campaign-card-img">
                      <?php the_post_thumbnail(); ?>
                    </figure>
                    <div class="sidebar__campaign-card-body">
                      <h3 class="sidebar__campaign-card-title">
                        <?php the_title(); ?>
                      </h3>
                      <div class="sidebar__campaign-card-price slider__price">
                        <p class="slider__price-plan">
                          全部コミコミ(お一人様)
                        </p>
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
                <div class="sidebar__campaign-btn">
                  <a href="<?php echo esc_url( home_url( '/campaign/' ) ); ?>" class="common-btn">
                    <p>View more</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="sidebar__archive">
              <div class="sidebar-title">
                <figure>
                  <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/whole-black.svg')); ?>"
                    alt="くじら" />
                </figure>
                <h3>アーカイブ</h3>
              </div>
              <ul>
                <?php blog_get_archives(); ?>
              </ul>
            </div>
          </div>