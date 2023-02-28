<?php
// $current_term = array_shift(array_values(get_the_terms(get_the_ID(), 'danh-muc-du-an')));
// $current_term = get_queried_object();
$current_term_slug = $current_term->slug;

$post_current_id = get_post()->ID;
// $current_post_name = $post->post_name;
?>

<div class="col-sm-12 col-md-12 col-lg-3 service-left">
    <div class="service-bg-pro">
        <h3 class="service-title-pro">Danh mục dự án</h3>
        <ul class="service-list-pro mb-0 pb-3">
            <?php
            $terms = get_terms([
                'taxonomy' => 'danh-muc-du-an',
                'hide_empty' => false,
                'orderby'       => 'id',
            ]);

            foreach ($terms as $term) {
            ?>
                <?php
                $args = array(
                    'post_type' => 'du-an',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'danh-muc-du-an',
                            'field' => 'slug',
                            'terms' => $term->slug
                        ),
                    ),
                );

                $loop = new WP_Query($args);
                if ($loop->have_posts()) : ?>
                    <?php while ($loop->have_posts()) : $loop->the_post();
                        $post_id = get_the_ID();
                    ?>
                        <li class="service-pro--list mb-2 <?php echo ($post_id == $post_current_id) ? "active-sidebar--pro" : ""; ?>">
                            <a class="nav-link a-nav-link" href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), 12)  ?></a>
                        </li>
                    <?php endwhile;
                else : ?>
                <?php endif; ?>
            <?php
            }
            ?>
        </ul>


    </div>

    <div class="service-contact my-5">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/2.png" alt="">

        <div class="phone">
            <a href="tel:+84916060241" >
                <svg version "1.1" id="phone" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3org/1999/xlink" x="0px" y="0px" viewBox="0 0 82 82" style="enable-background:new 0 0 82 82;" xml:space="preserve">

                    <path d="M64.5,78.2c1.7-1.9,3.6-3.6,5.4-5.4c2.6-2.7,2.7-5.9,0-8.6c-3.1-3.2-6.3-6.3-9.4-9.4
                        c-2.6-2.6-5.8-2.6-8.4,0c-2,1.9-3.9,3.9-5.9,5.9c-0.1,0.1-0.3,0.2-0.4,0.3l-1.3,1.3c-0.4,0.2-0.7,0.2-1.2,0
                        c-1.3-0.7-2.6-1.2-3.8-2c-5.7-3.6-10.5-8.2-14.7-13.4c-2.1-2.6-4-5.3-5.3-8.4c-0.2-0.5-0.2-0.9,0.1-1.3l1.3-1.3
                        c0.1-0.1,0.1-0.2,0.2-0.3c0.6-0.6,1.2-1.1,1.8-1.7c1.4-1.3,2.7-2.7,4.1-4.1c2.7-2.7,2.7-5.9,0-8.6c-1.5-1.5-3.1-3.1-4.6-4.6
                        c-1.6-1.6-3.2-3.2-4.8-4.8c-2.6-2.5-5.8-2.5-8.4,0c-2,1.9-3.9,3.9-5.9,5.9c-1.9,1.8-2.8,3.9-3,6.5c-0.3,4.1,0.7,8,2.1,11.8
                        C5.2,43.8,9.6,50.7,15,57.1c7.2,8.6,15.9,15.4,26,20.4c4.6,2.2,9.3,3.9,14.4,4.2C58.9,81.8,62,81,64.5,78.2z"></path>
                    <path d="M41.1,15.7
                        c-0.7,0-1.5,0.1-2.2,0.4c-1.7,0.8-2.5,2.8-2,4.8c0.4,1.8,2,3,3.9,3c4.6,0.1,8.6,1.5,12,4.6c3.7,3.4,5.4,7.7,5.6,12.8
                        c0,0.9,0.4,1.9,0.9,2.6c1.1,1.5,3,1.9,4.8,1.2c1.6-0.6,2.5-2,2.5-3.9c-0.1-7-2.6-12.9-7.5-18.1C54.1,18.4,48.1,15.8,41.1,15.7z"></path>
                    <path d="M69,11.4c8.5,8.7,12.5,18.1,12.8,29.1c0.1,2.5-1.5,4.2-3.9,4.3c-2.6,0.1-4.3-1.4-4.4-4c-0.1-5.4-1.4-10.5-4-15.2
                        C63.5,14.9,54.2,9.3,42,8.6c-1.4-0.1-2.6-0.2-3.6-1.3c-1.2-1.4-1.3-3-0.7-4.6c0.7-1.6,2-2.4,3.8-2.4c8,0.1,15.3,2.4,22,6.8
                    C65.7,8.6,67.8,10.4,69,11.4z"></path>
                </svg>
            </a>
        </div>

        <div class="service-content">
            <h5 class="text-center text-white">Bạn cần tư vấn?</h5>
            <h3 class="text-white">LIÊN HỆ NGAY VỚI CHÚNG TÔI</h3>
            <a href="tel:+84916060241" class="text-center">
                <h2 class="text-white">0916 060 241</h2>
            </a>
            <a href="tel:+84916860416" class="text-center">
                <h2 class="text-white">0916 860 416</h2>
            </a>
        </div>
    </div>
</div>