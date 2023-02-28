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

<div class="section__generic">
    <div class="container">
        <div class="row">
            <h2 class="main-tile text-center">
                Danh mục chủng loại sản phẩm
            </h2>
        </div>
        <div class="row g-1 g-md-2 g-lg-4">
            <?php $args = array(
                'hide_empty' => 0,
                'taxonomy' => 'product_cat',
                'orderby' => 'id',
                'parent' => 0,
                'include' => '31,35,38,43'
            );

            $cates = get_categories($args);
            foreach ($cates as $cate) {  ?>
                <div class="col-6 col-md-3 col-lg-3">
                    <a class="btn btn-cus d-flex justify-content-center align-items-center" href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>"><?php echo $cate->name; ?></a>
                </div>
            <?php } ?>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <?php get_template_part('templates/block/bussiness', 'pagination'); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>