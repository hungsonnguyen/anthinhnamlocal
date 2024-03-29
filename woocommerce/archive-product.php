<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

?>
<div class="container">

<!-- <div class="container"> -->
<?php
do_action('woocommerce_before_main_content');
?>
<header class="woocommerce-products-header pb-3">
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<!-- <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1> -->
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action('woocommerce_archive_description');
	?>
</header>
	<div class="row">
		<div class="col-md-4 col-lg-3 ">
			<div class="filters-products boxsticky">
				<?php echo do_shortcode('[yith_wcan_filters slug="theo-chung-loai"]') ?>
			</div>
		</div>
		<div class="col-md-8 col-lg-9 ">
			<div class="feature-product">
				<?php
				if (woocommerce_product_loop()) {
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					//do_action( 'woocommerce_before_shop_loop' );
					woocommerce_product_loop_start();
					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();
							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');
							wc_get_template_part('content', 'product');
						}
					}
					woocommerce_product_loop_end();
					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				}
				/**
				 * Hook: woocommerce_after_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action('woocommerce_after_main_content');
				?>
			</div>
			<!-- custom -->
			<!-- <div class="feature-product products mt-0">
				<div class="mb-2 mb-lg-4 ">
					<h2>Danh mục sản phẩm</h2>
				</div>
				<div class="row">

					<?php get_template_part('partials/loop', 'content-product-archive'); ?>

					<div class="arc-pr-bot d-flex flex-column flex-md-row justify-content-center justify-content-md-between pt-4 pb-4">

						<?php
						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						#do_action('woocommerce_after_shop_loop');
						?>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
<!-- </div> -->
<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );
?>
</div>
<?php get_footer('shop'); ?>