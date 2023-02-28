<?php get_header(); ?>

<main class="gioithieu">

  <section>
    <div class="bl__navigation">
      <div class="container">
        <div class="breadcrumb"><?php the_breadcrumb(); ?></div>
      </div>
    </div>
  </section>

  <section class="bl__menu">
    <div class="container">
      <div class="bl-flex">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item bl-flex-1" role="presentation">
            <button class="nav-link btn btn-cus active" id="pills-gtc-tab" data-bs-toggle="pill" data-bs-target="#pills-gtc" type="button" role="tab" aria-controls="pills-gtc" aria-selected="true">Giới thiệu chung</button>
          </li>
          <li class="nav-item bl-flex-2" role="presentation">
            <button class="nav-link btn btn-cus" id="pills-spdv-tab" data-bs-toggle="pill" data-bs-target="#pills-spdv" type="button" role="tab" aria-controls="pills-spdv" aria-selected="false">Sản phẩm dịch vụ</button>
          </li>
          <li class="nav-item bl-flex-3" role="presentation">
            <button class="nav-link btn btn-cus" id="pills-qtct-tab" data-bs-toggle="pill" data-bs-target="#pills-qtct" type="button" role="tab" aria-controls="pills-qtct" aria-selected="false">Quy trình chống thấm</button>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-gtc" role="tabpanel" aria-labelledby="pills-gtc-tab">
      <section class="bl__about auto-padding">
        <div class="container">
          <div class="about__des-content">
            
                <?php the_content() ?>
              
          </div>
        </div>
      </section>

      <section class="bl__abouticon auto-padding">
        <div class="container">
          <div id="owl-abouticon" class="owl-carousel owl-theme">
            <?php
            if (have_rows('intro_owl_top')) :
              while (have_rows('intro_owl_top')) : the_row();
                $image1 = get_sub_field('owl_top_img');
            ?>
                <div class="item">
                  <div class="card card-cus">
                    <div class="item-img">
                      <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                    </div>
                    <h3><?php echo get_sub_field('owl_top_title'); ?></h3>
                    <p>
                      <?php echo get_sub_field('owl_top_des'); ?>
                    </p>
                  </div>
                </div>
            <?php
              endwhile;
            else :
            // Do something...
            endif;
            ?>
          </div>
        </div>

      </section>


      <section class="bl__aboutimg auto-padding">
        <div class="container">
          <?php
          if (have_rows('company_images')) :
            while (have_rows('company_images')) : the_row();
              $image1 = get_sub_field('img_1');
              $image2 = get_sub_field('img_2');
              $image3 = get_sub_field('img_3');
          ?>
              <div class="bl__aboutimg-title">
                <h2><?php echo get_sub_field('company_img_title'); ?></h2>
                <span><?php echo get_sub_field('company_img_des'); ?></span>
              </div>

              <div class="bl__aboutimg-image">
                <div class="row">
                  <div class="col-6">
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                  </div>

                  <div class="col-6 d-flex flex-column justify-content-between">
                    <div class="row">
                      <img src="<?php echo esc_url($image2['url']); ?>" alt="">
                    </div>

                    <div class="row">
                      <img src="<?php echo esc_url($image3['url']); ?>" alt="">
                    </div>
                  </div>
                </div>
              </div>
          <?php
            endwhile;
          else :
          // Do something...
          endif;
          ?>
        </div>
      </section>


      <section class="bl__customersay">
        <div class="bl__abs auto-padding">
          <div class="bl__aboutus">
            <div class="container">
              <div class="aboutus-max">
                <div class="aboutus-title">
                  <h2>KHÁCH HÀNG NÓI GÌ VỀ CHÚNG TÔI</h2>
                  <span>Niềm vui của khách hàng tạo động lực cho chúng tôi hoàn thiện mình từng ngày!</span>
                </div>
                <div id="owl-aboutus" class="owl-carousel owl-theme">
                  <?php
                  if (have_rows('review_use')) :
                    while (have_rows('review_use')) : the_row();
                      $image1 = get_sub_field('avt_use');
                  ?>
                      <div class="item">
                        <div class="card card-cus">
                          <div class="bl__aboutus-top">
                            <div class="aboutus-left">
                              <img class="card-img-top " src="<?php echo esc_url($image1['url']); ?>" alt="">
                            </div>
                            <div class="aboutus-center">
                              <span class="aboutus-block"><?php echo get_sub_field('use_name'); ?></span>
                              <span class="aboutus-block"><?php echo get_sub_field('post_datetime'); ?></span>
                            </div>

                            <div class="aboutus-right">
                              <img src="<?php bloginfo('template_url'); ?>/assets/img/icon/pp.png" alt="">
                            </div>
                          </div>
                          <div class="bl__aboutus-bottom">
                            <p class="line-3"><?php echo get_sub_field('review_content'); ?></p>
                          </div>
                        </div>
                      </div>

                  <?php
                    endwhile;
                  else :
                  // Do something...
                  endif;
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="nvt_atn-partners">
            <div class="container">
              <div class="row">
                <div class="owl-carousel owl-carousel-partners owl-theme">
                  <div class="nvt_atn-partner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/partner1.png" alt="partner1" />
                  </div>
                  <div class="nvt_atn-partner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/partner2.png" alt="partner2" />
                  </div>
                  <div class="nvt_atn-partner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/partner3.png" alt="partner3" />
                  </div>
                  <div class="nvt_atn-partner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/partner4.png" alt="partner4" />
                  </div>
                  <div class="nvt_atn-partner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/partner5.png" alt="partner5" />
                  </div>
                  <div class="nvt_atn-partner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/partner6.png" alt="partner6" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="tab-pane fade" id="pills-spdv" role="tabpanel" aria-labelledby="pills-spdv-tab">
      <section class="bl__spdv auto-padding">
        <div class="container">
          <nav>

            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link col-4 bl__spdv-cusnav active" id="nav-thnt-tab" data-bs-toggle="tab" data-bs-target="#nav-thnt" type="button" role="tab" aria-controls="nav-thnt" aria-selected="true"> <img src="<?php bloginfo('template_url'); ?>/assets/img/icon/hc.png" alt="" class="bl-thumb">100+ Thương hiệu nổi tiếng</button>
              <button class="nav-link col-4 bl__spdv-cusnav" id="nav-spcl-tab" data-bs-toggle="tab" data-bs-target="#nav-spcl" type="button" role="tab" aria-controls="nav-spcl" aria-selected="false"> <img src="<?php bloginfo('template_url'); ?>/assets/img/icon/box.png" alt="" class="bl-thumb"> 1000+ sản phẩm chất lượng chính hãng</button>
              <button class="nav-link col-4 bl__spdv-cusnav" id="nav-dvcn-tab" data-bs-toggle="tab" data-bs-target="#nav-dvcn" type="button" role="tab" aria-controls="nav-dvcn" aria-selected="false"> <img src="<?php bloginfo('template_url'); ?>/assets/img/icon/settinh.png" alt="" class="bl-thumb"> 10+ các gói dịch vụ chuyên nghiệp</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-thnt" role="tabpanel" aria-labelledby="nav-thnt-tab">
              <section class="section__trademark">
                <div class="container">
                  <div class="row g-1 g-md-2 g-lg-4">
                    <?php $args = array(
                      'hide_empty' => 0,
                      'taxonomy' => 'product_cat',
                      'orderby' => 'id',
                      'parent' => 0,
                      'exclude' => '31,35,38,43'
                    );
                    $cates = get_categories($args);
                    foreach ($cates as $cate) {  ?>
                      <?php
                      $thumbnail_id = get_woocommerce_term_meta($cate->term_id, 'thumbnail_id', true);
                      $image = wp_get_attachment_url($thumbnail_id);
                      ?>
                      <div class="col-4 col-md-2 col-lg-2">
                        <div class="card card-cus">
                          <div class="image-cus">
                            <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                              <img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $cate->name; ?>">
                            </a>
                          </div>
                        </div>


                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <?php get_template_part('templates/block/bussiness', 'pagination'); ?>
                  </div>
                </div>
              </section>
            </div>
            <div class="tab-pane fade" id="nav-spcl" role="tabpanel" aria-labelledby="nav-spcl-tab">
              <section class="hvn_atn-home-product auto-padding">
                <div class="row gy-1 gy-md-2 gy-lg-3">
                  <div class="item">
                    <div class="grid-product">
                      <div class="row gx-1 gx-lg-4 gy-1 gy-lg-4 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4">
                        <?php
                        $args = array(
                          'post_type' => 'product',
                          'posts_per_page' => 8,

                        );
                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php global $wp_query;
                        $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                          <?php global $product; ?>
                          <div class="col-6 col-md-3 col-lg-3">
                            <div class="hvn_atn-item h-100">
                              <div class="card h-100 d-flex flex-column">
                                <div class="card-image">
                                  <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="card-img-top" alt="Not found">
                                  </a>
                                  <a class="phone" href="tel:0916060241">
                                    <button class="btn btn-cus">
                                      <img class="logo" src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="Not found">
                                      0916 060 241
                                    </button>
                                  </a>
                                </div>
                                <div class="card-body">
                                  <p class="card-text"><?php echo get_the_title() ?></p>
                                </div>
                                <a class="card-contact mt-auto" href="<?php the_permalink(); ?>"><button class="btn btn-cus">LIÊN
                                    HỆ</button></a>
                              </div>
                            </div>
                          </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Button see more -->
                <div class="see-more mt-2 mt-md-2 mt-lg-4">
                  <a href="cua-hang"><button class="btn btn-cus btn-cus--outline">Xem thêm sản phẩm<i class="fal fa-long-arrow-right ms-2"></i></button></a>
                </div>
                <!--  -->
              </section>
            </div>
            <div class="tab-pane fade" id="nav-dvcn" role="tabpanel" aria-labelledby="nav-dvcn-tab">
              <div class="auto-padding">
                <div class="row">
                  <?php
                  $args = array(
                    'post_type' => 'dich-vu',
                    'posts_per_page' => 3,

                    // 'posts_per_page' => '4',
                  );
                  $the_query_new = new WP_Query($args);
                  if ($the_query_new->have_posts()) :
                    while ($the_query_new->have_posts()) : $the_query_new->the_post();
                      $category = get_the_category();
                  ?>
                      <div class="col-md-4 col-6 my-3">
                        <div class="card bl-overlay-rel">
                          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                          <div class="bl-overlay">
                            <a class="bl-overlay-text" href="<?php the_permalink(); ?>"><?php echo get_the_title() ?> >>></a>
                          </div>
                        </div>
                      </div>

                  <?php
                    endwhile;
                  else :
                    _e('', 'textdomain');
                  endif;
                  wp_reset_postdata();
                  ?>


                </div>


              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="tab-pane fade" id="pills-qtct" role="tabpanel" aria-labelledby="pills-qtct-tab">
      <section class="bl__qtct">
        <div class="container" style="padding-top:48px;">
          <h2>Quy trình chống thấm tại Đà Nẵng - An Thịnh Nam JSC</h2>
          <span>Chuyên nghiệp - Tận tâm - Chất lượng vượt trội là những điều đặc biệt mà An Thịnh Nam mang đến cho quý khách hàng. Cùng đọc qua quy trình thực hiện để có cái nhìn đúng hơn về cách mà chúng tôi thực hiện các công trình của mình!</span>
        </div>

        <section class="bl__qtct-content auto-padding">
          <div class="container-fluid h-100">
            <div class="row">
              <div class="col-md-12 col-lg-6 left-half-container">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/liti.png" alt="">
                <div class="bl__qtct-right-block">
                  <div class="bl__qtct-right--img">
                    <?php
                    if (have_rows('image_qtct')) :
                      while (have_rows('image_qtct')) : the_row();
                        $image1 = get_sub_field('image_right_qtct');
                    ?>
                        <div class="bl__qtct-right--box">
                          <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                        </div>
                    <?php
                      endwhile;
                    else :
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="half-container align-content-center right-half-container row h-100">
                  <?php
                  if (have_rows('qtct')) :
                    while (have_rows('qtct')) : the_row();
                      $image1 = get_sub_field('img_step');
                  ?>
                      <div class="col-12 d-flex align-items-center my-3">
                        <div class="bl__qtct-left--item">
                          <div class="d-flex">
                            <div class="bl-qtct-thumb col-3">
                              <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                            </div>
                            <div class="bl__qtct-left--title col-9">
                              <h3><?php echo get_sub_field('des_title_step'); ?></h3>
                              <p><?php echo get_sub_field('des_content_step'); ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php
                    endwhile;
                  else :
                  endif;
                  ?>



                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="container">
          <div class="bl__qtct-partnerlh">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/lienhepartner.png" alt="">
            <div class="bl__qtct-partnerlh--abs">
              <h2>Bạn cần tư vấn thêm về Quy trình thực hiện chống thấm</h2>
              <p>Liên hệ ngay để được chuyên gia của An Thịnh Nam hỗ trợ đầy đủ hơn về quy trình thực hiện cũng như các gói dịch vụ và sản phẩm của chúng tôi</p>
              <a href="contact-page"><button class="btn btn-cus">Liên hệ tư vấn &nbsp; &#10140;</button></a>
            </div>
          </div>

        </div>

        <section class="snh_atn-our-product auto-padding">
          <div class="container">
            <div class="row pb-2 pb-md-3 pb-lg-5">
              <div class="title">
                <h2 class="product-title">Sản phẩm nổi bật</h2>
                <div class="d-flex justify-content-between  flex-wrap">
                  <h6 class="product-sub-title">Chuyên cung cấp vật tư chống thấm và dịch vụ chống thấm uy tín tại
                    Đà Nẵng và Quảng Nam</h6>
                  <a href="cua-hang">
                    Xem thêm sản phẩm
                    <i class="fal fa-long-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="row gy-1 gy-md-2 gy-lg-3">
              <?php
              $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
              );
              ?>
              <?php $getposts = new WP_query($args); ?>
              <?php global $wp_query;
              $wp_query->in_the_loop = true; ?>
              <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <?php global $product; ?>
                <div class="col-6 col-md-3 col-lg-3">
                  <div class="hvn_atn-item h-100">
                    <div class="card h-100 d-flex flex-column">
                      <div class="card-image">
                        <a href="<?php the_permalink(); ?>">
                          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="card-img-top" alt="Not found">
                        </a>
                        <a class="phone" href="tel:0916060241">
                          <button class="btn btn-cus">
                            <img class="logo" src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="Not found">
                            0916 060 241
                          </button>
                        </a>
                      </div>
                      <div class="card-body">
                        <p class="card-text"><?php echo get_the_title() ?></p>
                      </div>
                      <a class="card-contact mt-auto" href="<?php the_permalink(); ?>"><button class="btn btn-cus">LIÊN
                          HỆ</button></a>
                    </div>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata(); ?>


            </div>
          </div>
        </section>
      </section>
    </div>
  </div>

</main>

<?php get_footer(); ?>