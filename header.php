<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
       <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:ital,wght@0,400;0,600;0,800;1,400;1,600;1,800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class('mb-0'); ?>>
    <div id="scroll-to-top"></div>
    <!-- <div id="loading">
        <div class="loader">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
    </div> -->
    <!-- Begin Header -->
    <header class="header">
        <div id="header__titile-top" class="header__titile-top d-none d-md-block">
            <div class="container h-100">
                <div class="d-flex justify-content-between header__titile-top-item h-100">
                    <div class="header__titile-top--left">
                        <p style="text-transform: uppercase;"><?php echo get_field('sologan_header_homepage',5)?></p>
                        <!-- <p>CÔNG TY CỔ PHẦN AN THỊNH NAM - CẤP VẬT TƯ CHỐNG THẤM VÀ THI CÔNG CHỐNG THẤM TẠI ĐÀ NẴNG VÀ QUẢNG NAM</p> -->
                    </div>
                    <div class="d-flex align-items-center header__titile-top--right h-100">
                        <div class="d-flex align-items-center justify-content-end header__titile-top--right--icon">
                            <?php
                            if (have_rows('footer_setting', 5)) :
                                while (have_rows('footer_setting', 5)) : the_row();
                                    $image = get_sub_field('image');
                            ?>
                                    <a target="_blank" href="<?php echo get_sub_field('link_facebook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/face.png" /></a>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta.png" /></a>
                                    <a target="_blank" href="<?php echo get_sub_field('link_youtube'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Youtube.png" /></a>
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
        </div>
        <div class="header__content">
            <div class="container">
                <div class="row h-100 align-items-center">
                    <div class=" col-lg-12 col-xl-6 d-flex header__content-item">
                        <div class="d-flex align-items-center d-md-flex d-xl-none col-md-1">
                            <nav>
                                <?php
                                $secondarymenu = array(
                                    'theme_location'  => 'secondary',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'slimmenu',
                                    'menu_id'         => 'secondary-menu',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new wp_bootstrap_navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="d-xl-flex d-none d-xl-none list-unstyled mb-0">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                if (has_nav_menu('secondary')) {
                                    wp_nav_menu($secondarymenu);
                                }
                                ?>
                            </nav>
                        </div>
                        <div class="header-logo d-flex align-items-center">
                            <a href="<?php echo get_home_url() ?>"><img href="<?php echo get_home_url() ?>" src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="logo"></a>
                        </div>
                        <div class="search">
                            <form action="<?php echo get_home_url() ?>" class="w-100 h-100">
                                <input name="s" class="form-control input" type="text" placeholder="Tìm kiếm...">
                                <button class="btn" type="submit">
                                    <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" />
                                </button>
                            </form>
                        </div>
                        <div class="d-flex align-items-center d-md-flex d-xl-none col-md-1">
                            <nav>
                                <?php
                                $primarymenu = array(
                                    'theme_location'  => 'primary',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'slimmenu',
                                    'menu_id'         => 'primary-menu',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new wp_bootstrap_navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="d-xl-flex d-none d-xl-none list-unstyled mb-0">%3$s</ul>',
                                    'depth'           => 0,
                                );
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu($primarymenu);
                                }
                                ?>
                            </nav>

                        </div>
                    </div>
                    <div class="col-lg-6 header__left">
                        <div class="d-flex h-100 align-items-center justify-content-between">
                            <?php
                            if (have_rows('footer_setting', 5)) :
                                while (have_rows('footer_setting', 5)) : the_row();
                                    $image = get_sub_field('image');
                            ?>
                                    <div class="d-flex justify-content-start item-content">
                                        <div class="d-flex align-items-center">
                                            <a href="tel:<?php echo get_sub_field('link_zalo'); ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calling.png" />
                                            </a>
                                        </div>
                                        <div>
                                            <p>Hotline</p>

                                            <p>0916 060 241 - 0934 333 943</p>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start item-content">
                                        <div class="d-flex align-items-center">
                                            <a href="mailto:info@cmilanpaint.com">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.png" />
                                            </a>
                                        </div>
                                        <div>
                                            <p>Email</p>
                                            <p>anthinhnamdng@gmail.com</p>
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
        </div>

<!-- tesst search -->
<?php echo do_shortcode('[ivory-search id="668" title="AJAX Search Form"]') ?>

        <!-- Main menu -->


        <div class="header__nabar d-none d-lg-none d-xl-block">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-3">
                        <!-- custome category -->
                        <div class="vertical-menu w-100">
                            <ul class="vertical-menu-list w-100">
                                <li class="d-flex justify-content-between align-items-center category-top">
                                    <div>
                                        <i class="far fa-list-ul"></i> Danh mục sản phẩm
                                    </div>
                                    <i class="fas fa-chevron-right"></i>
                                </li>
                                <li class="category-menu">
                                    <ul class="category-menu-list">

                                        <?php $args = array(
                                            'hide_empty' => 0,
                                            'taxonomy' => 'product_cat',
                                            'orderby' => 'id',
                                            'parent' => 0,
                                            'include' => '31,35,38,43'
                                        );

                                        $cates = get_categories($args);
                                        foreach ($cates as $cate) {  ?>
                                            <li>
                                                <a class="" href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>"><?php echo $cate->name; ?></a>
                                                <i class="fas fa-chevron-right"></i>
                                            </li>
                                        <?php } ?>

                                    </ul>

                                </li>

                            </ul>
                        </div>
                        <!-- custome category -->
                    </div>
                    <!-- Mega menu main -->
                    <div class="col-lg-9 " id="12">
                        <div class="row menu">
                            <div class="d-flex justify-content-between align-items-center">
                                <nav>
                                    <?php
                                    $primarymenu = array(
                                        'theme_location'  => 'primary',
                                        'menu'            => '',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => 'slimmenu',
                                        'menu_id'         => 'primary-menu',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                        'walker'          => new wp_bootstrap_navwalker(),
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="d-xl-flex d-none list-unstyled mb-0">%3$s</ul>',
                                        'depth'           => 0,
                                    );
                                    if (has_nav_menu('primary')) {
                                        wp_nav_menu($primarymenu);
                                    }
                                    ?>
                                </nav>
                                <div class="header-mid__cart ">
                                    <div class="header-cart-mini">
                                        <a id="link__cart-mini" href="<?php echo get_permalink(wc_get_page_id('cart')); ?>">
                                            <i class="far fa-shopping-cart"></i>
                                            <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                                            <div class="text-dark" id="mini-cart-count">
                                                <?php echo $items_count ? $items_count : '0'; ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Mega menu main end -->


                </div>

            </div>
            <div id="overlay-header" class="overlay"></div>
        </div>



        <!-- Main menu end -->




    </header>
    <div class="progress-container">
        <div class="progress-bar" id="scroll_indicator"></div>
    </div>
    <div class="header-banner mb-lg-5">
        <div class="container h-100">
            <div class="row pt-2 pb-2 h-100">
                <div class="col-md-12 col-lg-12 col-xl-3"></div>
                <div class="col-md-12 col-lg-12 col-xl-9 h-100">
                    <div id="owl-banner" class="owl-carousel owl-theme">
                        <?php
                        $images = get_field('banner', 5);
                        if ($images) : ?>
                            <?php foreach ($images as $image) : ?>
                                <div class="item item-cus">
                                    <div class="card card-cus">
                                        <img class="banner-main-menu" src="<?php echo esc_url($image['url']); ?>" alt="Not found">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Header -->