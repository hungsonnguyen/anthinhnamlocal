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

<main class="giaiphap giaiphap-detail">

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
                    <?php get_template_part('templates/block/section', 'solutionsb'); ?>
                <div class="col-sm-12 col-md-12 col-lg-9 service-right">
                    <?php
                    $term_current_slug = get_the_terms(get_the_ID(), 'danh-muc-giai-phap')[0]->slug;
                    ?>
                    <div class="content-wrap">
                        <ul class="blog-list list-unstyled mb-lg-5 mb-4">
                            <?php
                            $args = array(
                                'post_status'     => 'publish',
                                'post_type'       => 'giai-phap',
                                // 'posts_per_page' => 5,
                                'paged'           => get_query_var('paged'),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'danh-muc-giai-phap',
                                        'field' => 'slug',
                                        'terms' =>  $term_current_slug
                                    )
                                )
                            );
                            ?>
                            <?php $getposts = new WP_query($args); ?>
                            <?php if ($getposts->have_posts()) : ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <li class="blog-item mb-4">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="blog-item-wrap">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-lg-3">
                                                        <div class="blog-item__img">
                                                            <img class="" src="<?php the_post_thumbnail_url('full') ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="blog-item__info">
                                                            <h4><?php the_title(); ?></h4>
                                                            <div class="excerpt line-2">
                                                                <?php echo wp_trim_words(get_the_content(), $num_words = 50, $more = null); ?>
                                                            </div>
                                                            <p class="next fw-nomal">Xem Thêm</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile;


                                wp_reset_postdata();
                                ?>
                            <?php endif; ?>
                        </ul>

                        <div class="col-12 d-flex justify-content-center">
                            <?php //get_template_part('templates/block/bussiness', 'pagination'); 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php get_footer(); ?>