<?php
get_header();
?>


<div class="section__breadcrumb">
    <div class="container">
        <?php the_breadcrumb(); ?>
    </div>
</div>

<div class="section__recruit">
    <div class="container">
        <div class="row">
            <?php get_template_part('templates/block/section', 'new'); ?>
            <div class="col-sm-12 col-md-9 col-lg-9 recruit-right">
                <img class="image-main" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                <p class="post-date"><i class="far fa-clock" style="color: #CC8056;"></i> <?php echo get_post_time('d/m/y'); ?></p>
                <p class="post-title"><?php echo get_the_title() ?></p>
                <p class="post-content"><?php the_content() ?></p>
            </div>
        </div>


        <div class="col-12 d-flex justify-content-center">
            <?php get_template_part('templates/block/bussiness', 'pagination'); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>