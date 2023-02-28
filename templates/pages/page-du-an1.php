<?php
get_header();
?>

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
            <?php get_template_part('templates/block/section', 'projectsb'); ?>
            <div class="col-sm-12 col-md-12 col-lg-9 service-right">
                <!-- Get post mặt định -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="service-content">
                            <div class="service-content--textSingle">
                                <pre><?php echo get_the_content() ?></pre>
                            </div>
                        </div>
                    <?php endwhile;
                else : ?>
                    <p>Không có</p>
                <?php endif; ?>
                <!-- Get post mặt định -->
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php get_footer(); ?>