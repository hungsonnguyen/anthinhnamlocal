<?php /* Template Name: Trang chủ */ ?>

<?php get_header(); ?>
<main class="home">
    <section class="snh_atn-unitiess">
        <div class="container">
            <div id="owl-unitiess" class="owl-carousel owl-theme">
                <?php
                $images = get_field('unities', 5);
                if ($images) : ?>
                    <?php foreach ($images as $image) : ?>
                        <div class="item">
                            <div class="card card-cus">
                                <img class="card-img-top" src="<?php echo esc_url($image['url']); ?>" alt="Not found">
                                <h3 class="card-title text-center"><?php echo esc_html($image['title']); ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
    </section>

    <!-- Banner - Lôc -->
    <section class="bl__intro">
        <div class="container">
            <div class=" bl__intro-mobile bl__intro-d">
                <div class="bl__intro-left">
                    <div class="bl__intro-rel">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/intro.png" alt="" class="img-fluid">
                        <?php
                        if (have_rows('intro_image', 5)) :
                            while (have_rows('intro_image', 5)) : the_row();
                                $image1 = get_sub_field('main_image');
                                $image2 = get_sub_field('sub_image');
                        ?>
                                <div class="bl__intro-abs bl__intro-abs--top" data-aos="fade-down-right" data-aos-easing="linear" data-aos-duration="2000">
                                    <img src="<?php echo esc_url($image1['url']); ?>" alt="" class="img-top">
                                </div>

                                <div class="bl__intro-abs bl__intro-abs--bottom" data-aos="fade-up-left" data-aos-easing="linear" data-aos-duration="2000">
                                    <img src="<?php echo esc_url($image2['url']); ?>" alt="" class="img-bottom">
                                </div>
                        <?php
                            endwhile;
                        else :
                        // Do something...
                        endif;
                        ?>

                        <div class="bl__intro-abs bl__intro-exp" data-aos="fade-down-left" data-aos-easing="linear" data-aos-duration="2000">
                            <div class="bl__intro-ex">
                                <h1 class="bl__intro-h1">7+</h1>
                                <p class="bl__intro-p">Năm kinh nghiệm</p>
                            </div>
                        </div>

                        <div class="bl__intro-abs bl__intro-pro" data-aos="fade-up-right" data-aos-easing="linear" data-aos-duration="2000">
                            <div class="bl__intro-pr">
                                <h1 class="bl__intro-h1">100+</h1>
                                <p class="bl__intro-p">Sản phẩm các loại</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bl__intro-right" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="2000">
                    <h2 class="bigger main-co">An Thịnh Nam JSC</h2>
                    <p class="sub-co bl__intro-right--sub"><?php echo get_field('slogan_intro_home', 5); ?></p>
                    <div class="bl__intro-right--underline"></div>
                    <?php
                    if (have_rows('intro_owl_top', 293)) :
                        while (have_rows('intro_owl_top', 293)) : the_row();
                            $image1 = get_sub_field('img_intro_homepage');
                    ?>
                            <div class="bl__intro-right-description">
                                <div class="row bl__intro-right--des">
                                    <div class="col-3 d-flex align-items-center">
                                        <img class="bl__intro-right-thumb mx-auto d-block" src="<?php echo esc_url($image1['url']); ?>" alt="">
                                    </div>
                                    <div class="col-9">
                                        <h6><?php echo get_sub_field('owl_top_title'); ?></h6>
                                        <p><?php echo get_sub_field('owl_top_des'); ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    else :
                    endif;
                    ?>
                    <a href="gioi-thieu" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"><button class="btn btn-cus btn-cus--outline">Tìm hiểu thêm <i class="fa-light fa-arrow-right-long"></i></button></a>
                </div>
    </section>
    <!-- Banner - Lôc -->

    <section class="snh_atn-our-product auto-padding">
        <div class="container">
            <div class="row pb-2 pb-md-3 pb-lg-5">
                <div class="title">
                    <h2 class="product-title">Sản phẩm nổi bật</h2>
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                        <h6 class="product-sub-title"><?php echo get_field('slogan_intro_home', 5); ?></h6>
                        <a href="cua-hang">
                            Xem thêm sản phẩm
                            <i class="fal fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row gy-1 gy-md-2 gy-lg-3" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                <div class="owl-carousel owl-theme hvn_atn-home-product--owl-carousel" id="hvn_atn-home-product--owl-carousel">
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
                                                <a class="card-contact mt-auto" href="<?php the_permalink(); ?>"><button class="btn btn-cus"><?php do_action('woocommerce_after_shop_loop_item_title'); ?><?php echo get_field('options', $product->ID) ?></button></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="snh_atn-ourdata">
        <div class="image-data d-flex align-items-center">
            <div class="w-100 h-100" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="400">
                <img class="h-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/Rectangle147.png" alt="">
            </div>
            <div class="content" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="400">
                <h2 class="content-title" data-aos="zoom-in-left" data-aos-easing="linear" data-aos-duration="1000">
                    Chống thấm toàn diện bảo vệ mái ấm của bạn
                </h2>
                <h6 class="content-sub-title" data-aos="zoom-in-down" data-aos-easing="linear" data-aos-duration="1000">Cùng An Thịnh Nam khám phá thêm các dịch vụ - sản phẩm về chống thấm để
                    chọn cho mình gói chống thấm
                    phù hợp và hiệu quả nhất!
                </h6>
                <?php
                $args = array(
                    'post_type' => 'du-an',
                    'posts_per_page' => 1,
                );
                $the_query_new = new WP_Query($args);
                if ($the_query_new->have_posts()) :
                    while ($the_query_new->have_posts()) : $the_query_new->the_post();
                        $category = get_the_category();
                ?>
                        <a href="<?php the_permalink(); ?>">
                            Xem thêm các gói dịch vụ
                            <i class="fal fa-long-arrow-right"></i>
                        </a>
                <?php
                    endwhile;
                else :
                    _e('', 'textdomain');
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <section class="snh-atn-our-project auto-padding">
        <div class="container">
            <div class="row" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <div class="title">
                    <h2 class="project-title">Dự án nổi bật</h2>
                    <div class="d-flex justify-content-between">
                        <h6 class="project-sub-title">Cùng An Thịnh Nam khám phá các dự án của chúng tôi</h6>
                        <?php
                        $args = array(
                            'post_type' => 'du-an',
                            'posts_per_page' => 1,
                        );
                        $the_query_new = new WP_Query($args);
                        if ($the_query_new->have_posts()) :
                            while ($the_query_new->have_posts()) : $the_query_new->the_post();
                                $category = get_the_category();
                        ?>
                                <a href="<?php the_permalink(); ?>">
                                    Xem thêm dự án
                                    <i class="fal fa-long-arrow-right"></i>
                                </a>
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

            <div class="row pt-5" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div id="owl-snh-atn-our-project" class="owl-carousel owl-theme">
                    <?php
                    $args = array(
                        'post_type' => 'du-an',
                        'posts_per_page' => 3,
                    );
                    $the_query_new = new WP_Query($args);
                    if ($the_query_new->have_posts()) :
                        while ($the_query_new->have_posts()) : $the_query_new->the_post();
                            $category = get_the_category();
                    ?>
                            <div class="item">
                                <div class="project-card">
                                    <div class="project-image">
                                        <img class="image-main" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                                        <div class="image-overlay">
                                            <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                                                <h5 class="title"><?php echo get_the_title() ?></h5>
                                                <a class="link" href="<?php the_permalink(); ?>">
                                                    Xem thêm chi tiết dự án
                                                    <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
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
    </section>

    <section class="hvn_atn-home-product auto-padding">
        <div class="container">
            <div class="content">
                <h3 class="main-title"><span class="main-co">Danh mục sản phẩm theo thương hiệu</span></h3>
                <h6 class="sub-title"><span class="sub-co"><?php echo get_field('slogan_intro_home', 5); ?></span></h6>
                <div class="product">
                    <ul class="nav nav-pills mb-md-3 mb-lg-5" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link nav-link btn btn-cus--outline active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Thương hiệu NEOTEX</button>
                        </li>
                        <?php $args = array(
                            'hide_empty' => 0,
                            'taxonomy' => 'product_cat',
                            'parent' => 0,
                            'include' => '45,49,56',
                        );
                        $cates = get_categories($args);
                        foreach ($cates as $cate) {  ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn btn-cus--outline" id="<?php echo $cate->slug; ?>-tab" data-bs-toggle="pill" data-bs-target="#<?php echo $cate->slug; ?>" type="button" role="tab" aria-controls="<?php echo $cate->slug; ?>" aria-selected="false"><?php echo $cate->name; ?></button>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link btn btn-cus--outline" href="theo-thuong-hieu" type="button" role="tab">Thương hiệu khác</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Tab active start -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="owl-carousel owl-theme hvn_atn-home-product--owl-carousel" id="hvn_atn-home-product--owl-carousel">
                                <div class="item">
                                    <div class="grid-product">
                                        <div class="row gx-1 gx-lg-4 gy-1 gy-lg-4 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4">
                                            <?php
                                            $args = array(
                                                'post_type' => 'product',
                                                'posts_per_page' => 8,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'slug',
                                                        'terms' => 'neotex'
                                                    ),
                                                ),
                                            );
                                            ?>
                                            <?php $getposts = new WP_query($args); ?>
                                            <?php global $wp_query;
                                            $wp_query->in_the_loop = true; ?>
                                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                                <?php global $product; ?>
                                                <div class="col">
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
                                                            <a class="card-contact" href="<?php the_permalink(); ?>"><button class="btn btn-cus"><?php do_action('woocommerce_after_shop_loop_item_title'); ?><?php echo get_field('options', $product->ID) ?></button></a>
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
                            <div class="see-more">
                                <a href="<?php echo get_term_link("neotex", 'product_cat'); ?>"><button class="btn btn-cus btn-cus--outline">Xem thêm sản phẩm<i class="fal fa-long-arrow-right ms-2"></i></button></a>
                            </div>
                            <!--  -->
                        </div>
                        <!-- Tab active end -->

                        <!-- Tab other start -->
                        <?php $args = array(
                            'hide_empty' => 0,
                            'taxonomy' => 'product_cat',
                            'parent' => 0,
                            'include' => '45,49,56',
                        );
                        $cates = get_categories($args);
                        foreach ($cates as $cate) {  ?>
                            <div class="tab-pane fade" id="<?php echo $cate->slug; ?>" role="tabpanel" aria-labelledby="<?php echo $cate->slug; ?>-tab">
                                <!--  -->
                                <div class="owl-carousel owl-theme hvn_atn-home-product--owl-carousel" id="hvn_atn-home-product--owl-carousel">
                                    <div class="item">
                                        <div class="grid-product">
                                            <div class="row gx-1 gx-lg-4 gy-1 gy-lg-4 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4">
                                                <?php
                                                $args = array(
                                                    'post_type' => 'product',
                                                    'posts_per_page' => 8,
                                                    'product_cat' => $cate->slug
                                                );
                                                ?>
                                                <?php $getposts = new WP_query($args); ?>
                                                <?php global $wp_query;
                                                $wp_query->in_the_loop = true; ?>
                                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                                    <?php global $product; ?>
                                                    <div class="col">
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
                                                                    <p class="card-text">><?php echo get_the_title() ?></p>
                                                                </div>
                                                                <a class="card-contact" href="<?php the_permalink(); ?>"><button class="btn btn-cus"><?php do_action('woocommerce_after_shop_loop_item_title'); ?><?php echo get_field('options', 5) ?></button></a>
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
                                <div class="see-more">
                                    <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>"><button class="btn btn-cus btn-cus--outline">Xem thêm sản phẩm<i class="fal fa-long-arrow-right ms-2"></i></button></a>
                                </div>
                                <!--  -->

                            </div>
                        <?php } ?>
                    </div>
                    <!-- Tab other end -->

                </div>

            </div>
    </section>

    <section class="snh_atn-ourdata">
        <div class="image-data d-flex align-items-center">
            <div class="w-100 h-100">
                <img class="h-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/Rectangle146.png" alt="">
            </div>
            <div class="content-2">
                <h2 class="content-title" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    Bạn cần tư vấn thêm về chống thấm
                </h2>
                <h6 class="content-sub-title" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">Cùng An Thịnh Nam khám phá thêm các dịch vụ - sản phẩm về chống thấm để
                    chọn cho mình gói chống thấm phù hợp và hiệu quả nhất!
                </h6>
                <a href="contact-page">
                    Liên hệ tư vấn
                    <i class="fal fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="snh-atn-our-service auto-padding">
        <div class="container-fluid container-fluid-custome">
            <div class="d-flex justify-content-center">
                <div class="title" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                    <h2 class="service-title text-center">Dịch vụ của chúng tôi</h2>
                    <h6 class="service-sub-title text-center pb-2 pb-md-3 pb-lg-5"><?php echo get_field('slogan_intro_home', 5); ?></h6>
                </div>
            </div>
            <div class="d-flex" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div id="owl-snh-atn-our-service" class="owl-carousel owl-theme">
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

                            <div class="item">
                                <div class="service-card">
                                    <div class="service-image">
                                        <img class="image-main" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                                        <div class="image-overlay">
                                            <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                                                <h1 class="title text-center"><?php echo get_the_title() ?></h1>
                                                <p class="text-mid text-center"><?php echo excerpt(100) ?></p>
                                                <a class="link" href="<?php the_permalink(); ?>">
                                                    Xem thêm >>>
                                                </a>
                                            </div>
                                        </div>
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
    </section>

    <section class="nvt_atn-partners">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-carousel-partners owl-theme">
                    <?php
                    $images = get_field('logo_company', 5);
                    if ($images) : ?>
                        <?php foreach ($images as $image) : ?>
                            <div class="item">
                                <div class="nvt_atn-partner">
                                    <img class="card-img-top" src="<?php echo esc_url($image['url']); ?>" alt="Not found">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="snh_atn-ournew auto-padding">
        <div class="container">
            <div class="row" data-aos="fade-down" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <div class="title">
                    <h2 class="new-title text-center">CẬP NHẬT TIN TỨC MỖI NGÀY</h2>
                    <h6 class="new-sub-title text-center pb-2 pb-md-3 pb-lg-5"><?php echo get_field('slogan_intro_home', 5); ?></h6>
                </div>
            </div>

            <div id="owl-snh-atn-our-new" class="owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'tin_chuyen_nganh'
                        ),
                    ),
                    // 'posts_per_page' => '4',
                );
                $the_query_new = new WP_Query($args);
                if ($the_query_new->have_posts()) :
                    while ($the_query_new->have_posts()) : $the_query_new->the_post();
                        $category = get_the_category();
                ?>

                        <div class="card card-cus mb-3 mt-1">
                            <a href="#" alt="">
                                <figure>
                                    <a href=" <?php the_permalink(); ?>"><img class="card-img-top" src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
                                </figure>
                            </a>
                            <div class="card-body">
                                <h4 class="card-title mb-1 mb-md-2 mb-lg-2"><?php echo $category[0]->name ?></h4>
                                <p class="card-text-1 line-1 mb-1 mb-md-2 mb-lg-3"><?php echo get_the_title() ?></p>
                                <p class="card-text line-2"><?php echo excerpt(20) ?></p>
                                <div class="card-button">
                                    <a class="link-card" href="<?php the_permalink() ?>">Xem thêm >>></a>
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
            <div class="text-center pt-2 pt-md-3 pt-lg-5">
                <a href="category/tin_chuyen_nganh/" class="btn btn-cus btn-cus--outline">
                    Xem thêm tin tức <i class="fal fa-long-arrow-right"></i>
                </a>
            </div>

        </div>
    </section>

</main>


<?php get_footer(); ?>