<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @package   WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<div class="related related-products-wrapper product-section mt-4">

    <?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
    <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase mb-4 mb-lg-5 fw-bold">
        <?php //echo esc_html( $heading ); ?>
		Sản phẩm liên quan
    </h3>
    <?php endif; ?>

    <ul class="list-unstyled feature-product owl-carousel owl-theme h-100" id="product-related">

        <?php foreach ( $related_products as $related_product ) : ?>

        <?php
			$post_object = get_post( $related_product->get_id() );

			setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

			// wc_get_template_part( 'content', 'product' );
			get_template_part('partials/loop','product-related');
		?>

        <?php endforeach; ?>
    </ul>

</div>

<?php
endif;

wp_reset_postdata();