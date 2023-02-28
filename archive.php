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

<div class="section__recruit">
    <div class="container">
        <div class="row">
            <?php get_template_part('templates/block/section', 'new'); ?>
            <div class="col-sm-12 col-md-12 col-lg-9 recruit-right">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'paged' => $paged,
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
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
                        <div class="card card-cus" data-aos="fade-up" data-aos-offset="300" data-aos-easing="ease-in-sine">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <figure class="h-100">
                                        <a class="h-100" href=" <?php the_permalink(); ?>"><img class="card-img h-100" src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
                                    </figure>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title titile-cus"><?php echo $current_term->name ?></h5>
                                        <p class="card-text text-1"><?php echo get_the_title() ?></p>
                                        <p class="card-text text-2"><?php echo excerpt(30) ?></p>
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


        <div class="col-12 d-flex justify-content-center">
            <?php get_template_part('templates/block/bussiness', 'pagination'); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>