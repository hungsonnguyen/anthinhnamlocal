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
<div class="section__breadcrumb">
    <div class="container">
        <?php the_breadcrumb(); ?>
    </div>
</div>
<!-- --------------------- Lấy danh mục kèm hình ảnh-->
<div class="section__trademark">
    <div class="container">
        <div class="row">
            <h2 class="main-tile text-center">
                Danh mục theo thương hiệu
            </h2>
        </div>
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
                        <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                            <h4 class="card-title text-center line-2"><?php echo $cate->name; ?></h4>
                        </a>
                    </div>


                </div>
            <?php } ?>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <?php get_template_part('templates/block/bussiness', 'pagination'); ?>
        </div>
    </div>
</div>


<!-- --------------------- -->
<?php get_footer(); ?>