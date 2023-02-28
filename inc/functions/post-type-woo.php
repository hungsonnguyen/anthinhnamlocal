<?php


// * Add quick buy button go to checkout after click

add_action('woocommerce_after_add_to_cart_button', 'devvn_quickbuy_after_addtocart_button');
function devvn_quickbuy_after_addtocart_button()
{
    global $product;
?>

    <button type="button" class="button buy_now_button">
        <a href="contact-page"><?php _e('Liên hệ báo giá', 'devvn'); ?><i class="fas fa-phone"></i></a>
    </button>
    <!-- <input type="hidden" name="is_buy_now" class="is_buy_now" value="0" autocomplete="off" /> -->
    <!-- <script>
        jQuery(document).ready(function() {
            jQuery('body').on('click', '.buy_now_button', function(e) {
                e.preventDefault();
                var thisParent = jQuery(this).parents('form.cart');
                if (jQuery('.single_add_to_cart_button', thisParent).hasClass('disabled')) {
                    jQuery('.single_add_to_cart_button', thisParent).trigger('click');
                    return false;
                }
                thisParent.addClass('devvn-quickbuy');
                jQuery('.is_buy_now', thisParent).val('1');
                jQuery('.single_add_to_cart_button', thisParent).trigger('click');
            });
        });
    </script> -->
    <?php
}
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url)
{
    if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
        $redirect_url = wc_get_checkout_url(); //or wc_get_cart_url()
    }
    return $redirect_url;
}





// hook single-pr 
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating',  10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',  20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',  40);
// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating',  20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',  20);

// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// ------------------------custom field single product-----------------------
// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields');

// Save Fields
add_action('woocommerce_process_product_meta', 'woo_add_custom_general_fields_save');

function woo_add_custom_general_fields()
{

    global $woocommerce, $post;

    echo '<div class="options_group">';
    // woocommerce_wp_text_input(
    //     array(
    //         'id'          => 'brand',
    //         'label'       => __('Thương hiệu', 'woocommerce'),
    //         'placeholder' => 'Tên thương hiệu',
    //         'desc_tip'    => 'true',
    //         'description' => __('Nhập tên thương hiệu', 'woocommerce')
    //     ),
    // );
    //     woocommerce_wp_text_input(
    //         array(
    //             'id'          => 'nameEN',
    //             'label'       => __('Tên tiếng anh', 'woocommerce'),
    //             'placeholder' => 'Tên tiếng anh',
    //             'desc_tip'    => 'true',
    //             'description' => __('Nhập tên tiếng anh', 'woocommerce')
    //         )
    //     );
    woocommerce_wp_text_input(
        array(
            'id'          => '_donggoi',
            'label'       => __('Đóng gói', 'woocommerce'),
            'placeholder' => 'Khối lượng sản phẩm',
            'desc_tip'    => 'true',
            'description' => __('Khối lượng sản phẩm', 'woocommerce')
        )
    );
    woocommerce_wp_text_input(
        array(
            'id'          => 'brand',
            'label'       => __('Thương hiệu', 'woocommerce'),
            'placeholder' => 'Tên thương hiệu',
            'desc_tip'    => 'true',
            'description' => __('Nhập tên thương hiệu', 'woocommerce')
        ),
    );
    woocommerce_wp_text_input(
        array(
            'id'          => '_mausac',
            'label'       => __('Màu sắc', 'woocommerce'),
            'placeholder' => 'Màu sắc sản phẩm',
            'desc_tip'    => 'true',
            'description' => __('Màu sắc sản phẩm', 'woocommerce')
        )
    );
    woocommerce_wp_text_input(
        array(
            'id'          => '_goc',
            'label'       => __('Gốc', 'woocommerce'),
            'placeholder' => 'Gốc sản phẩm',
            'desc_tip'    => 'true',
            'description' => __('Gốc sản phẩm', 'woocommerce')
        )
    );
    woocommerce_wp_text_input(
        array(
            'id'          => '_ungdung',
            'label'       => __('Ứng dụng', 'woocommerce'),
            'placeholder' => 'Ứng dụng',
            'desc_tip'    => 'true',
            'description' => __('Ứng dụng', 'woocommerce')
        )
    );
    echo '</div>';
}
// save data 


function woo_add_custom_general_fields_save($post_id)
{
    // // Select
    // $woocommerce_select = $_POST['brand'];
    // // if( !empty( $woocommerce_select ) )
    // update_post_meta($post_id, 'brand', esc_attr($woocommerce_select));


    // $woocommerce_select_2 = $_POST['nameEN'];
    // // if( !empty( $woocommerce_select_2 ) )
    // update_post_meta($post_id, 'nameEN', esc_attr($woocommerce_select_2));

    $woocommerce_text_field_1 = $_POST['_donggoi'];
    if (!empty($woocommerce_text_field_1))
        update_post_meta($post_id, '_donggoi', esc_attr($woocommerce_text_field_1));

    $woocommerce_text_field_2 = $_POST['brand'];
    if (!empty($woocommerce_text_field_2))
        update_post_meta($post_id, 'brand', esc_attr($woocommerce_text_field_2));

    $woocommerce_text_field_3 = $_POST['_mausac'];
    if (!empty($woocommerce_text_field_3))
        update_post_meta($post_id, '_mausac', esc_attr($woocommerce_text_field_3));

    $woocommerce_text_field_4 = $_POST['_goc'];
    if (!empty($woocommerce_text_field_4))
        update_post_meta($post_id, '_goc', esc_attr($woocommerce_text_field_4));

    $woocommerce_text_field_5 = $_POST['_ungdung'];
    if (!empty($woocommerce_text_field_5))
        update_post_meta($post_id, '_ungdung', esc_attr($woocommerce_text_field_5));
}

// ------------------------custom field single product-----------------------


//------------remove message add to cart----------------
add_filter( 'wc_add_to_cart_message', 'remove_add_to_cart_message' );

function remove_add_to_cart_message() {
    return;
}

// remove tab review 

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
    unset($tabs['reviews']); // Bỏ tab đánh giá
    unset($tabs['additional_information']); // Bỏ tab thông tin bổ xung
    return $tabs;
}


// thêm sản phẩm kh có giá vào giỏ hàng
function custom_woocommerce_is_purchasable_filter($can, $product)
{
    if ('' == $product->get_price()) {
        $can = $product->exists() && ('publish' === $product->get_status() || current_user_can('edit_post', $product->get_id()));
    }

    return $can;
}

add_filter('woocommerce_is_purchasable', 'custom_woocommerce_is_purchasable_filter', 10, 2);

function wc_product_data_filter($value, $data)
{
    if (empty($value)) {
        $value = 'lienhe';
    }
    return $value;
}

add_filter('woocommerce_product_get_price', 'wc_product_data_filter', 10, 2);
// thêm sản phẩm kh có giá vào giỏ hàng end...


function devvn_wc_custom_get_price_html($price, $product)
{
    if ($product->get_price() == 0) {
        if ($product->is_on_sale() && $product->get_regular_price()) {
            $regular_price = wc_get_price_to_display($product, array('qty' => 1, 'price' => $product->get_regular_price()));

            $price = wc_format_price_range($regular_price, __('Free!', 'woocommerce'));
        } else {
            $price = '<span class="amount">' . __('Liên hệ', 'woocommerce') . '</span>';
        }
    }
    return $price;
}
add_filter('woocommerce_get_price_html', 'devvn_wc_custom_get_price_html', 10, 2);

// ham phan trang
function prw_wp_corenavi($custom_query = null, $paged = null)
{
    global $wp_query;
    if ($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
    if ($total > 1) echo '<div class="pagenavi">';
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $total,
        'mid_size' => '4', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
        'prev_text' => '<i class="far fa-chevron-left"></i>',
		'next_text' => '<i class="far fa-chevron-right"></i>',
    ));
    if ($total > 1) echo '</div>';
}

// Hien thi trang thai con hang, het hang trong trang san pham
add_filter('woocommerce_get_availability', 'custom_override_get_availability', 10, 2);
function custom_override_get_availability($availability, $_product)
{
    if ($_product->is_in_stock()) $availability['availability'] = __('In stock', 'woocommerce');
    return $availability;
}

// limit pagina 
function product_pagination_by_category()
{
    $limit = 12;
    return $limit;
}
add_filter('loop_shop_per_page', 'product_pagination_by_category');


// Custome display add to cart
add_action('wp_footer', 'single_added_to_cart_event');
function single_added_to_cart_event()
{
    if (isset($_POST['add-to-cart']) && isset($_POST['quantity'])) {
        // Get added to cart product ID (or variation ID) and quantity (if needed)
        $quantity   = $_POST['quantity'];
        $product_id = isset($_POST['variation_id']) ? $_POST['variation_id'] : $_POST['add-to-cart'];

        // JS code goes here below
    ?>
        <script>
            jQuery(function($) {
                $('.greeting').slideToggle(500);
            });
        </script>
<?php
    }
}


