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
            <div class="col-sm-12 col-md-12 col-lg-9 recruit-right">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'paged' => $paged,
                    'post_type' => 'service',
                    'posts_per_page' => 10,
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'danh-muc-dich-vu',
                            'field'    => 'id',
                            'terms'    => $current_term_id,
                        ),
                    ),
                );
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $category = get_the_category();
                ?>
                        <div class="card card-cus">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <figure class="h-100">
                                        <a href=" <?php the_permalink(); ?>"><img class="card-img h-100" src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
                                    </figure>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title title-cus"><?php echo $current_term->name ?></h5>
                                        <p class="card-text text-1"><?php echo the_title() ?></p>
                                        <p class="card-text text-2"><?php the_excerpt() ?></p>
                                        <p class="card-text text-3"><a href=" <?php the_permalink(); ?>">Xem thêm >></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    _e('Sorry, no posts matched your criteria.', 'textdomain');
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>



    </div>
</div>
</div>
</div>

<?php get_footer(); ?>