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

<div class="section__contact">
    <div class="section__breadcrumb">
        <div class="container">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-4 gap-3">
                <?php
                $arr_image = array();
                $arrayListMap = array();
                $arrayTitle = array();
                $arrayContent = array();
                $arrayLink = array();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'paged' => $paged,
                    'post_type' => 'post',
                    'posts_per_page' => 20,
                    'order' => 'DESC',
                );
                $the_query = new WP_Query($args);



                if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $category = get_the_category();
                        if (get_field("map")['lat'] != null && get_field("map")['lat'] != null):
                            ?>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <figure class="h-100">
                                            <a class="h-100" href=" <?php the_permalink(); ?>"><img class="card-img h-100"
                                                    src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body card-click-popup">
                                            <h5 class="card-title">
                                                <?php echo get_the_title() ?>
                                            </h5>
                                            <p class="card-text line-2">
                                                <?php echo excerpt(30) ?>
                                            </p>
                                            <p class="card-text"><small class="text-muted">
                                                    <a href=" <?php the_permalink(); ?>">Xem thêm </a></small>
                                           </p>
                                            <p class="lat" style="display: none;">
                                                <?php echo get_field("map")['lat'] ?>
                                            </p>
                                            <p class="lng" style="display: none;">
                                                <?php echo get_field("map")['lng'] ?>
                                            </p>


                                            <!-- thêm các trường của bài viết cào mảng -->
                                            <?php array_push($arr_image, get_the_post_thumbnail_url()) ?>
                                            <?php array_push($arrayTitle, get_the_title()) ?>
                                            <?php array_push($arrayContent, excerpt(30)) ?>
                                            <?php array_push($arrayLink, get_the_permalink()) ?>

                                            <!-- Thêm đối tượng map vào mảng -->
                                            <?php array_push($arrayListMap, get_field("map")) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        endif;
                    endwhile;
                else:
                    _e('Sorry, no posts matched your criteria.', 'textdomain');
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="col-8">
                <div class="test-map boxsticky-map">
                    <div id="sethPhatMap"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="section__recruit">
    <div class="container">
        <div class="row">
            <?php //get_template_part('templates/block/section', 'new'); ?>
            <div class="col-sm-12 col-md-12 col-lg-9 recruit-right">

            </div>
        </div>


        <div class="col-12 d-flex justify-content-center">
            <?php get_template_part('templates/block/bussiness', 'pagination'); ?>
        </div>
    </div>
</div>
<!-- <p id="test-map">
    <?php print_r($arrayListMap) ?>
</p> -->

<?php print_r(get_field("map")) ?>
<script type="text/javascript">
    var obj2 = <?php echo json_encode($arrayListMap); ?>;

    //encode array url list data
    var object_image = <?php echo json_encode($arr_image); ?>;

    //encode array url list title
    var object_title = <?php echo json_encode($arrayTitle); ?>;

    //encode array url list Content
    var object_Content = <?php echo json_encode($arrayContent); ?>;

    //encode array url list link
    var object_link = <?php echo json_encode($arrayLink); ?>;


    // console.log("data list map : "+obj2[1]['lat']);
    // console.log("data list map : "+obj2[1]['lng']);

</script>



<iframe
    src='https://kenhthoitiet.vn/iframe?term=32&days=3&hC=%23ffffff&hB=%23098d4b&bC=%23098d4b&tC=%2318211e&lC=%23dddddd'
    id='widgeturl' width='100%' height='330' scrolling='no' frameborder='0' allowtransparency='true'
    style='border:none;overflow:hidden;'></iframe>

<?php get_footer(); ?>