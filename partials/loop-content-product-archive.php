<?php
$cat_url = get_queried_object();

?>
<!-- content  -->
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if (isset($cat_url->term_id)) {
    $args = array(
        'paged' => $paged,
        'post_type'               => 'product',
        'orderby'                => 'date',
        'order'                    => 'ASC',
        'posts_per_page' => 12,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $cat_url->term_id,
            ),
        ),
    );
} else {
    $args = array(
        'paged' => $paged,
        'post_type'               => 'product',
        'orderby'                => 'date',
        'order'                    => 'ASC',
        'posts_per_page' => 12,

    );
}

$wp_query = new WP_Query($args); ?>
<?php if ($wp_query->have_posts()) : ?>

    <?php while ($wp_query->have_posts()) : $wp_query->the_post();
        global $product;
        $terms = get_the_terms($product->get_id(), 'product_cat');
    ?>
        <div class="col-lg-4 col-6 mb-3">
            <div class="hvn_atn-item h-100">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-image">
                        <a href="<?php the_permalink(); ?>">
                            <figure>
                                <img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() :  bloginfo('template_directory') . '/assets/images/thumbnail.jpg' ?>" class="card-img-top" alt="Not found">
                            </figure>
                        </a>
                        <a class="phone" href="tel:0916060241">
                            <button class="btn btn-cus">
                                <img class="logo" src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="Not found">
                                0916 060 241
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text line-2"><?php the_title(); ?></p>
                    </div>
                        <a class="card-contact" href="<?php the_permalink(); ?>"><button class="btn btn-cus"><?php do_action('woocommerce_after_shop_loop_item_title'); ?>  <?php echo get_field('options') ?></button></a>   
                </div>
            </div>
        </div>

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
<?php endif; ?>

<!-- có thể thêm phân trang -->
<div class="container">
    <div class="d-flex justify-content-center texte">
        <div class="pagination">
            <?php
            // trong hàm truyền tham số $wp_query để xác định mảng cần hiển thị phân trang
            if (function_exists('prw_wp_corenavi')) prw_wp_corenavi($wp_query);
            ?>
        </div>
    </div>
</div>
<!-- <div class="col-12 d-flex justify-content-center">
    <?php #get_template_part('templates/block/bussiness', 'pagination'); 
    ?>
</div> -->