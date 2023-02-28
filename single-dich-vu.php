<?php
get_header();
$queried_object = get_queried_object();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
global $post;
?>

<?php
$current_term = get_queried_object();
$current_term_id = $current_term->term_id;
?>

<main class="dichvu dichvu-detail">
    <section>
        <div class="bl__navigation">
            <div class="container">
                <div class="breadcrumb"><?php the_breadcrumb(); ?></div>
            </div>
        </div>
    </section>

    <div class="section__service">
        <div class="container">
            <div class="row section__service-mt48">
                <?php get_template_part('templates/block/section', 'sidebar'); ?>
                <div class="col-sm-12 col-md-12 col-lg-9 service-right">
                    <!-- Get post mặt định -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <div class="service-content">
                                <div class="service-avt mb-5">
                                    <img class="card-img h-100" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                                </div>

                                <div class="service-content--daySingle mb-4">
                                    <i class="far fa-clock"></i>
                                    <?php $post_date = get_the_date('d/m/Y');
                                    echo $post_date; ?>
                                </div>

                                <div class="service-content--textSingle">
                                    <p><?php the_content() ?></p>
                                </div>
                            </div>
                        <?php endwhile;
                    else : ?>
                        <p>Không có</p>
                    <?php endif; ?>
                    <!-- Get post mặt định -->
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
                                        <a class="card-contact" href="<?php the_permalink(); ?>"><button class="btn btn-cus">LIÊN
                                                HỆ</button></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>


                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>