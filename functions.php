<?php

require get_template_directory() . '/inc/init.php';

function add_favicon()
{
    echo '<link rel="shortcut icon" type="image/png" href="' . get_theme_mod('html_favicon_icon') . '" />';
}
add_action('wp_head', 'add_favicon');

function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}
function toFriendlyTime($seconds)
{
    $measures = array(
        'ngày trước' => 24 * 60 * 60,
        'giờ trước' => 60 * 60,
        'phút trước' => 60,
        'giấy trước' => 1,
    );
    foreach ($measures as $label => $amount) {
        if ($seconds >= $amount) {
            $howMany = floor($seconds / $amount);
            // return $howMany." ".$label.($howMany > 1 ? "s" : "");
            return $howMany . " " . $label;
        }
    }
    return "Vừa đăng";
}

//  to include in functions.php
function the_breadcrumb()
{

    $sep = ' / ';

    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        //   bloginfo('name');
        echo $home = 'Trang chủ';
        echo '</a>' . $sep;

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single()) {
            the_category(' &nbsp;&nbsp;|&nbsp;&nbsp;');
        } elseif (is_archive() || is_single()) {
            if (is_day()) {
                printf(__('%s', 'text_domain'), get_the_date());
            } elseif (is_month()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
            } elseif (is_year()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
            } elseif (is_tax()) {
                $get = get_queried_object();
                echo '<a href="#" rel="nofollow">' . $get->name . '</a>';
            } else {
                _e('Blog Archives', 'text_domain');
            }
        }
        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            $flag = 0;
            $taxonomy_name = '';
            if (wp_get_post_terms(get_the_ID(), 'danh-muc-giai-phap') != null) {
                $term =  wp_get_post_terms(get_the_ID(), 'danh-muc-giai-phap');
                $flag = 1;
                $taxonomy_name = 'giải pháp ';
            } elseif (wp_get_post_terms(get_the_ID(), 'danh-muc-dich-vu') != null) {
                $term =  wp_get_post_terms(get_the_ID(), 'danh-muc-dich-vu');
                $flag = 1;
                $taxonomy_name = 'dịch vụ ';
            } elseif (wp_get_post_terms(get_the_ID(), 'danh-muc-du-an') != null) {
                $term =  wp_get_post_terms(get_the_ID(), 'danh-muc-du-an');
                $flag = 1;
                $taxonomy_name = 'dự án';
            }

            if ($flag) {
                $array = array_shift($term);
                $term_link = get_term_link($array->term_id);

                $string = $taxonomy_name . $array->name;
                $string = strtolower($string);

                if ($taxonomy_name == 'dịch vụ ' || $taxonomy_name == 'giải pháp ')
                    echo '<a href="#">' . ucfirst($taxonomy_name) . '</a>';
                elseif ($taxonomy_name == 'dự án')
                    echo '<a href="#">' . ucfirst($taxonomy_name) . '</a>';
                else echo '<a href="' . $term_link . '">' . ucfirst($string) . '</a>';
            }
            echo $sep;
            echo '<a href="#" rel="nofollow">' . ucfirst(get_the_title()) . '</a>';
        }
        // If the current page is a static page, show its title.
        if (is_page()) {
            echo '<a href="#" rel="nofollow">' . get_the_title() . '</a>';
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}

function get_breadcrumb()
{
    echo '<a href="' . get_home_url() . '" rel="nofollow">Trang chủ</a>';

    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        the_category(' &bull; ');
        if (is_single()) {
            $arrays =  wp_get_post_terms(get_the_ID(), 'danh-muc-khoa-hoc',  array("fields" => "names"));
            //$arrays =  wp_get_post_terms(get_the_ID(), 'danh-muc-san-pham',  array("fields" => "names"));
            $taxonamy_posy = array_shift($arrays);
            echo $taxonamy_posy;

            echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
            echo '<a href="#" rel="nofollow">' . get_the_title() . '</a>';
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        echo get_the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    } elseif (is_tax()) {
        // $get = get_queried_object();
        // echo " &nbsp;&nbsp;/&nbsp;&nbsp; ";
        // echo $get->name;
        the_category('title_li=');
    }
}

function PostViews($post_ID)
{
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count';

    $count = get_post_meta($post_ID, $count_key, true);

    if ($count == '') {
        $count = 1; // set the counter to zero.

        //Delete all custom fields with the specified key from the specified post. 
        // delete_post_meta($post_ID, $count_key);

        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '1');
        return $count;
    } else {
        $count++;

        update_post_meta($post_ID, $count_key, $count);

        // if ($count == '1') {
        //     return $count;
        // }

        // else {
        //     return $count;
        // }
        return $count;
    }
}
function GetView($post_ID)
{
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count';

    $count = get_post_meta($post_ID, $count_key, true);


    return $count;
}



?>




