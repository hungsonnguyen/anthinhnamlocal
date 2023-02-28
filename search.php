<?php
get_header();
$queried_object = get_queried_object();
global $post;
?>
<section class="page-blogs pb-1 pb-md-3 pb-lg-5">
    <div class="breadcrumbs">
    </div>
    <div class="page-blog">
        <div class="container ">
            <div class="row">
                <div class="blog-list snh_atn-ournew">
                    <?php
                    $args = array(
                        'posts_per_page'     => -1,
                        'post_type'          => 'post',
                        'orderby'            => 'date',
                        'order'              => 'DESC',
                        'paged'             => get_query_var('paged'),
                        's'                  => get_search_query()
                    );
                    ?>
                    <?php $getposts = new WP_query($args); ?>
                    <?php if ($_GET['s'] == '') { ?>
                        <h4 class="mb-3 mb-md-4">Vui lòng nhập từ khóa bạn muốn tìm kiếm.</h4>
                    <?php } else { ?>
                        <p class="sub-title-search"> Kết quả tìm kiếm bài viết</p>
                        <h4 class="mb-3 mb-md-4"><?php echo count($getposts->posts) ? count($getposts->posts) . ' bài viết tìm kiếm được tìm thấy' : 'Không tìm thấy bài viết...' ?></h4>
                        <div class="row gx-1 gx-lg-4 gy-1 gy-lg-4">
                            <?php if ($getposts->have_posts()) : ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <div class="col-6 col-md-6 col-lg-3">
                                        <div class="card card-cus mb-3 mt-1 ">
                                            <a href="#" alt="">
                                                <figure>
                                                    <a href=" <?php the_permalink(); ?>"><img class="card-img-top" src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
                                                </figure>
                                            </a>
                                            <div class="card-body">
                                                <p class="card-text-1 line-1 mb-1 mb-md-2 mb-lg-3"><?php echo get_the_title() ?></p>
                                                <p class="card-text line-2"><?php echo excerpt(20) ?></p>
                                                <div class="card-button">
                                                    <a class="link-card" href="<?php the_permalink() ?>">Xem thêm >>></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    <?php } //if (function_exists('prw_wp_corenavi')) prw_wp_corenavi($getposts, $paged); 
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="blog-list list-unstyled">
                    <?php
                    $args = array(
                        'posts_per_page'     => -1,
                        'post_type'          => 'product',
                        'orderby'            => 'date',
                        'order'              => 'DESC',
                        'paged'             => get_query_var('paged'),
                        's'                  => get_search_query()
                    );
                    ?>
                    <?php $getposts = new WP_query($args); ?>
                    <?php if ($_GET['s'] == '') { ?>
                        <h4 class="mb-3 mb-md-4">Vui lòng nhập từ khóa bạn muốn tìm kiếm.</h4>
                    <?php } else { ?>
                        <p class="sub-title-search"> Kết quả tìm kiếm sản phẩm</p>
                        <h4 class="mb-3 mb-md-4"><?php echo count($getposts->posts) ? count($getposts->posts) . ' sản phẩm tìm kiếm được tìm thấy' : 'Không tìm thấy sản phẩm...' ?> </h4>
                        <div class="row gx-1 gx-lg-4 gy-1 gy-lg-4 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4">

                            <?php if ($getposts->have_posts()) : ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
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
                            <?php endif; ?>
                        </div>
                    <?php } //if (function_exists('prw_wp_corenavi')) prw_wp_corenavi($getposts, $paged); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<div class="clear"></div>

<?php get_footer(); ?>