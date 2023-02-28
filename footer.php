        <!-- Begin Footer -->
        <footer class="footer">
          <div class="footer_main pb-5">
            <div class="container">
              <div class="footer-logo">
                <h1 class="footer-logo--banner" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">AN THỊNH NAM JSC</h1>
              </div>
              <div class="row" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="col-lg-4">
                  <div class="footer-item">
                    <h3 class="mb-2 mb-md-3 mb-lg-4">Thông tin liên hệ</h3>
                    <?php
                    if (have_rows('footer_setting', 5)) :
                      while (have_rows('footer_setting', 5)) : the_row();
                        $image = get_sub_field('image');
                    ?>
                        <h6 class="footer-item-info mb-3">CÔNG TY CỔ PHẦN AN THỊNH NAM</h6>
                        <h6 class="footer-item-address">Người đại diện: <a href="" target="_blank"><?php echo get_sub_field('representative'); ?></a> </h6>
                        <h6 class="footer-item-address">Mã số thuế: <a href="" target="_blank"><?php echo get_sub_field('tax_code'); ?></a> </h6>
                        <h6 class="footer-item-address">Trụ sở chính: <a href="<?php echo get_sub_field('link_gg_map_tru_so_chinh'); ?>" target="_blank"><?php echo get_sub_field('tru-so-chinh'); ?></a> </h6>
                        <h6 class="footer-item-address">Cửa hàng: <a href="<?php echo get_sub_field('link_gg_map_cua_hang'); ?>" target="_blank"><?php echo get_sub_field('cua-hang'); ?></a> </h6>
                        <ul class="footer-item-contact list-unstyle">
                          <li>
                            <h6 class="footer-item-address">Hotline Đà Nẵng: <a href="tel:<?php echo get_sub_field('holine_number1'); ?>"><?php echo get_sub_field('hotline1'); ?></a></h6>
                          </li>
                          <li>
                            <h6 class="footer-item-address">Hotline Tp Hồ Chí Minh: <a href="tel:<?php echo get_sub_field('holine_number2'); ?>"><?php echo get_sub_field('hotline2'); ?></a></h6>
                          </li>
                          <li>
                            <h6 class="footer-item-address">Hotline Hà Nội: <a href="tel:<?php echo get_sub_field('holine_number3'); ?>"><?php echo get_sub_field('hotline3'); ?></a></h6>
                          </li>
                          <li>
                            <h6 class="footer-item-address">Email: <a href="mailto:<?php echo get_sub_field('link_email'); ?>"><?php echo get_sub_field('email'); ?></a></h5>
                          </li>
                        </ul>
                    <?php
                      endwhile;
                    else :
                    // Do something...
                    endif;
                    ?>
                  </div>
                </div>

                <div class="col-lg-2">
                  <div class="footer-item">
                    <h3 class="mb-2 mb-md-3 mb-lg-4">Danh mục</h3>
                    <ul class="footer-item-contact list-unstyle">
                      <?php
                      $primarymenu = array(
                        'theme_location'  => 'footer',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'slimmenu',
                        'menu_id'         => 'footer-menu',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker(),
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="footer-item-contact list-unstyled mb-0">%3$s</ul>',
                        'depth'           => 0,
                      );
                      if (has_nav_menu('primary')) {
                        wp_nav_menu($primarymenu);
                      }
                      ?>
                    </ul>
                  </div>
                </div>

                <div class="col-lg-3">
                  <div class="footer-item">
                    <h3 class="mb-2 mb-md-3 mb-lg-4">Giải pháp</h3>
                    <ul class="footer-item-contact list-unstyle">
                      <?php
                      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                      $args = array(
                        'paged' => $paged,
                        'post_type' => 'giai-phap',
                        'posts_per_page' => 3,
                        'order' => 'DESC',
                      );
                      $the_query = new WP_Query($args);

                      if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                          $category = get_the_category();
                      ?>
                          <li>
                            <a href="<?php the_permalink(); ?>"><?php echo the_title() ?></a>
                          </li>
                      <?php
                        endwhile;
                      else :
                        _e('Sorry, no posts matched your criteria.', 'textdomain');
                      endif;
                      wp_reset_postdata();
                      ?>


                      <?php
                      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                      $args = array(
                        'paged' => $paged,
                        'post_type' => 'chinh-sach',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                      );
                      $the_query = new WP_Query($args);

                      if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                          $category = get_the_category();
                      ?>
                          <li>
                            <a href="<?php the_permalink(); ?>"><?php echo the_title() ?></a>
                          </li>
                      <?php
                        endwhile;
                      else :
                        _e('Sorry, no posts matched your criteria.', 'textdomain');
                      endif;
                      wp_reset_postdata();
                      ?>

                    </ul>


                  </div>
                </div>

                <div class="col-lg-3">
                  <h3 class="footer-item-title mb-2 mb-md-3 mb-lg-4">Theo dõi chúng tôi</h3>

                  <div class="footer-item-fanpage">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCongtycophanAnThinhNam&tabs=timeline&width=336px&height=207px&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="336px" height="207px" style="border: none; overflow: hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer_copyright">
            <div class="container">
              <div class="footer_copyright-content">
                <p class="mb-0 text-center">
                  © Copyright by An Thịnh Nam. All rights reserved |
                  <a href="https://biti.vn/" target="blank"><span class="color-copyright">Design by BITI.VN</span></a>

                </p>
              </div>
            </div>
          </div>
          <!-- Icon cart mini -->
          <div class="header-mid__cart d-block d-md-none">
            <div class="header-cart-mini">
              <a href="<?php echo get_permalink(wc_get_page_id('cart')); ?>">
                <i class="far fa-shopping-cart"></i>
                <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                <div class="text-dark" id="mini-cart-count">
                  <?php echo $items_count ? $items_count : '0'; ?>
                </div>
              </a>
            </div>
          </div>
          <!-- Icon cart mini -->
        </footer>
        <!-- bottom to top -->
        <div id="bottom_to_top" style="bottom: 30px;">
          <div class="h-100 d-flex justify-content-center align-items-center">
            <i class="fas fa-arrow-up text-white"></i>
          </div>
        </div>
        <!-- Icon-contact-logo  -->
        <div class="parent">
          <?php
          if (have_rows('footer_setting', 5)) :
            while (have_rows('footer_setting', 5)) : the_row();
              $image = get_sub_field('image');
          ?>
              <div class="heart">
                <span>
                  <a target="_blank" href="<?php echo get_sub_field('link_message'); ?>">
                    <i class="fab fa-facebook-messenger"></i>
                  </a>
                </span>
              </div>
              <div class="heart">
                <span>
                  <a target="_blank" href="https://zalo.me/<?php echo get_sub_field('link_zalo'); ?>">
                    <p>Zalo</p>
                  </a>
                </span>
              </div>
              <div class="heart">
                <span>
                  <a href="tel:<?php echo get_sub_field('link_zalo'); ?>"> <i class="far fa-phone"></i></a></p>
                </span>
              </div>
          <?php
            endwhile;
          else :
          // Do something...
          endif;
          ?>

        </div>
        <!-- Icon-contact-logo-end  -->

        <?php wp_footer(); ?>
        </div>
        </body>

        </html>