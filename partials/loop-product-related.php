<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$terms = get_the_terms($product->get_id(), 'product_cat');
// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('product-related', $product); ?>>
    <!-- <div class="hvn_atn-item h-100">
        <div class="card h-100 d-flex flex-column">
            <div class="card-image">
                <a href="<?php the_permalink(); ?>">
                    <figure>
                        <img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() :  bloginfo('template_directory') . '/assets/images/thumbnail.jpg' ?>" class="card-img-top" alt="Not found">
                    </figure>
                </a>
                <a class="phone" href="tel:0916060241">
                    <button class="btn btn-cus">
                        <img class="logo" src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="Not found">
                        0916 060 241
                    </button>
                </a>
            </div>
            <div class="card-body">
                <p class="card-text line-2"><?php the_title(); ?></p>
            </div>
            <a class="card-contact" href="<?php the_permalink(); ?>"><button class="btn btn-cus"><?php do_action('woocommerce_after_shop_loop_item_title'); ?>  <?php echo get_field('options') ?></button></a>
        </div>
    </div> -->
    <div class="col-relate-prodcuct">
        <div class="hvn_atn-item h-100">
            <div class="card h-100 d-flex flex-column">
                <div class="card-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="card-img-top" alt="Not found">
                    </a>
                    <a class="phone" href="tel:0916060241">
                        <button class="btn btn-cus">
                            <img class="logo" src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="Not found">
                            0916 060 241
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text line-2 carttile-text"><?php echo get_the_title() ?></p>
                </div>
                <a class="card-contact" href="<?php the_permalink(); ?>"><button class="btn btn-cus">LIÊN
                                        HỆ</button></a>
            </div>
        </div>
    </div>
</li>