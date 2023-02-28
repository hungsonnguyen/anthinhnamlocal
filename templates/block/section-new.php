<?php
// global $current_term;

// $current_term = array_shift(array_values(get_the_terms(get_the_ID(), 'category')));
// print_r(get_the_terms(get_the_ID(), 'category'));
$current_term = get_queried_object();
$current_term_slug = $current_term->slug;
?>
<div class="col-md-12 col-lg-3 d-flex flex-column left-side">
    <div class="box-sticky">
        <div class="search-new-page w-100">
            <form action="<?php echo get_home_url() ?>" class="w-100 h-100">
                <input name="s" class="form-control input-section-new" type="text" placeholder="Tìm kiếm...">
                <button class="btn" type="submit">
                    <i class="fas fa-search search-icon"></i>
                </button>
            </form>
        </div>
        <ul class="left-side-top">
            <div class="left-item d-flex align-items-center">
                <h3 class="title-side">Danh mục tin tức</h3>
            </div>

            <?php
            $terms = get_terms([
                'taxonomy' => 'category',
                'hide_empty' => true,
                'orderby'       => 'id',
            ]);
            foreach ($terms as $term) {
            ?>
                <div>
                    <a href="<?php echo get_home_url(); ?><?php echo  "/" . $term->taxonomy . "/" . $term->slug; ?>">
                        <button id="btn-category" class="btn <?php echo ($current_term_slug == $term->slug) ? "active" : ""; ?>"><span><?php echo $term->name; ?></span>
                        </button>
                    </a>
                </div>

            <?php
            }
            ?>
        </ul>
        <ul class="">
            <?php
            $term_name = get_term_by('name', 'Tin chuyên ngành', 'category')->name;
            ?>
            <div class="left-side-title">
                <h3><span>
                    <!-- <?php echo $term_name ?> -->
                    Tin nổi bật<tr></tr>
                </span></h3>
            </div>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'paged' => $paged,
                'post_type' => 'post',
                'posts_per_page' => 5,
                'order' => 'DESC',
                // 'tax_query' => array(
                //     array(
                //         'taxonomy' => 'category',
                //         'field'    => 'slug',
                //         'terms'    => 'tin_chuyen_nganh',
                //     ),
                // ),
            );
            $the_new_special = new WP_Query($args);

            if ($the_new_special->have_posts()) :
                while ($the_new_special->have_posts()) : $the_new_special->the_post();
                    $category = get_the_category();
            ?>
                    <li class="d-flex">
                        <div class="image-box position-relative">
                            <figure>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </figure>
                        </div>
                        <div class="content d-flex align-items-center">
                            <a class="text-line2" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                    </li>
            <?php
                endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'textdomain');
            endif;
            wp_reset_postdata();
            ?>
        </ul>
    </div>
</div>