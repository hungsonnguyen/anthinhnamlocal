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

<main class="duan duan-detail">
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
                                    <P><?php the_content() ?></P>
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
</main>

<?php get_footer(); ?>