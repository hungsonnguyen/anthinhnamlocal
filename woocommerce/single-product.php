<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>
<div class="container single-product-wp">
	<div class="main-content mt-3">
		<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
		?>

		<?php while (have_posts()) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part('content', 'single-product'); ?>

		<?php endwhile; // end of the loop. 
		?>

		<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
		?>

		<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
		?>
	</div>
	<!-- <div class="greeting">
		<p>hello!</p>
	</div> -->
	<div class="greeting" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Thông tin đơn hàng</h4>
					<button type="button" class="btn-close"></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<?php echo $product->get_name();; ?> vừa được thêm vào giỏ hàng
				</div>

				<!-- Modal footer -->
				<div class="modal-footer d-flex justify-content-between">
					<a href="gio-hang" type="button" class="btn btn-info">Xem giỏ hàng <i class="fal fa-shopping-cart"></i></a>
					<button type="button" class="btn btn-danger">Đóng <i class="fal fa-times-circle"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
