<?php

/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

		<!-- custom  -->
		<?php
		// echo '<div class="d-flex"><span>Thương hiệu: </span>' . get_post_meta(get_the_ID(), 'brand', true) . '<br></div>';
		// echo '<div class="d-flex"><span>Thương hiệu: </span>' . get_post_meta(get_the_ID(), 'nameEN', true) . '<br></div>';
		// echo '<div class="d-flex"><span>Phương thức: </span>' . get_post_meta(get_the_ID(), '_thi_truong_phuc_vu', true) . '<br></div>';
		// You can also use
		echo '<div class="d-flex"><i class="fas fa-snowflake icon-cus"></i><span> Đóng gói: </span>' . get_post_meta(get_the_ID(), '_donggoi', true) . '<br></div>';
		echo '<div class="d-flex"><i class="fas fa-snowflake icon-cus"></i><span> Màu sắc: </span>' . get_post_meta(get_the_ID(), '_mausac', true) . '<br></div>';
		echo '<div class="d-flex"><i class="fas fa-snowflake icon-cus"></i><span> Gốc: </span>' . get_post_meta(get_the_ID(), '_goc', true) . '<br></div>';
		echo '<div class="d-flex"><i class="fas fa-snowflake icon-cus"></i><span> Ứng dụng: </span>' . get_post_meta(get_the_ID(), '_ungdung', true) . '<br></div>';
	

		// TRẠNG THÁI CÒN HÀNG
		// echo '<div class="d-flex"><span> Trạng thái: </span> ' . wc_get_stock_html($product) . '</div>';
		// ?>
		<!-- end custom  -->

		<!-- MÃ SẢN PHẨM -->
		<!-- <span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span> -->

	<?php endif; ?>

	<!-- DANH MỤC SẢN PHẨM -->
	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); 
	?>
	<br>

	<!-- TỪ KHOÁ -->
	<?php //echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); 
	?>

	<?php do_action('woocommerce_product_meta_end'); ?>

</div>