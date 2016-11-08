<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$thumbnail_idcat    = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
$imagecat           = wp_get_attachment_url( $thumbnail_idcat );
?>
<li <?php wc_product_cat_class(); ?>>
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

    <div class="tz-shop-subcategory">
        <div class="tz-shop-subcategory-inner">
            <img src="<?php echo esc_url($imagecat);?>" alt="<?php echo esc_attr($category->name);?>"  />
            <div class="tz-subcategory-overlay"></div>
            <div class="tz-subcategory-info">
                <div class="tz-subcategory-table">
                    <div class="tz-subcategory-table-cell">
                        <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
                            <?php echo esc_html($category->name);?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>
