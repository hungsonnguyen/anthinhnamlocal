<?php get_header() ?>
<section class="banner">
    <?php  
    $image = get_field('banner');
    if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
    <div class="breadcrumb d-flex justify-content-center">
        <a href=" <?php echo home_url() ?> "> CMILAN / </a>
        <p>&nbsp;TIÊU CHUẨN KỸ THUẬT</p>
    </div>
</section>
<div class="page-technology">
    <section class="hp-choose-us p-0">
        <div class="section-title mb-5">
            <h6 class="title-styleco title-styleco--lr mx-auto mb-4">TIÊU CHUẨN KỸ THUẬT</h6>
            <h2>CMILAN và các tiêu chuẩn kỹ thuật đi kèm với từng loại sơn cụ thể</h2>
        </div>
    </section>
    <section class="page-technology__banner">
        <div class="container">

            <div class="layout">

                <?php
                $args = array(
                    'post_type'       => 'post', 
                    'posts_per_page' => 5, 
                    // 'paged'           => get_query_var('paged'),
                    'orderby'           => 'date',
                    'order'             => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'tieu-chuan-ky-thuat',
                        ),
                    ),
                );
                ?>
                <?php $getposts = new WP_query($args); ?>
                <?php if ($getposts->have_posts()) : ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                <a href="<?php the_permalink();?>" class="layout-item rounded">
                    <!-- <div class="layout-item rounded"> -->
                    <img src="<?php the_post_thumbnail_url('full')?>" alt="" class="layout-img">

                    <div class="text text-light">
                        <h2 class="fw-bold line-2"><?php the_title();?></h2>
                        <!-- <p><i class="far fa-clock"></i><?php //echo get_the_date('y/m/d'); ?></p> -->
                    </div>
                    <!-- </div> -->
                </a>

                <?php endwhile;wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="clear"></div>
</div>
<?php get_footer() ?>