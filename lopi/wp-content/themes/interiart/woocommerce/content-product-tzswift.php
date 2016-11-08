<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$interiart_Shop_ColumnGrid          =   ot_get_option('interiart_TzShopGrid_Column','4');
$interiart_Shop_ColumnList          =   ot_get_option('interiart_TzShopList_Column','1');
$interiart_Shop_Height_Image        =   ot_get_option('interiart_TzBlog_Product_Height_Option','fix');

$interiart_shop_height_class = '';
if($interiart_Shop_Height_Image == 'fix'){
    $interiart_shop_height_class = 'tzShop-item_image_fix';
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();

// TZ COLUMNS

if($interiart_Shop_ColumnGrid == '4'){
    $classes[] = 'tzShop-item tzShop-4column';
}elseif($interiart_Shop_ColumnGrid == '3'){
    $classes[] = 'tzShop-item tzShop-3column';
}else{
    $classes[] = 'tzShop-item tzShop-2column';
}

if($interiart_Shop_ColumnList == '2'){
    $classes[] = 'tzShopList-2column';
}else{
    $classes[] = 'tzShopList-1column';
}

?>

<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <div class="tzShop-item_inner">
        <div class="tzShop-item_image <?php echo esc_attr($interiart_shop_height_class);?>">
            <?php
            /**
             * woocommerce_before_shop_loop_item_title hook
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>

            <div class="tzShop-item_overlay"></div>

            <?php
            if (interiart_is_out_of_stock()) {

                echo '<span class="tzOut-of-stock">' . __( 'Out of Stock', TEXT_DOMAIN ) . '</span>';
            }else{
                if (interiart_is_featured_product()){
                    echo '<span class="tzFeatured_product">' . __('Featured', TEXT_DOMAIN ) . '</span>';
                }
                if ($product->is_on_sale()) {

                    echo apply_filters('woocommerce_sale_flash', '<span class="tzProductSale">'.__( 'On Sale', TEXT_DOMAIN ).'</span>', $post, $product);

                }elseif (!$product->get_price()) {

                    echo '<span class="tzProductfree">' . __( 'Free', TEXT_DOMAIN ) . '</span>';
                }else{
                    $postdate 		= get_the_time( 'Y-m-d' );			// Post date
                    $postdatestamp 	= strtotime( $postdate );			// Timestamped post date
                    $newness 		= 7; 	// Newness in days

                    if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
                        echo '<span class="tzProductNew">' . __( 'New', TEXT_DOMAIN ) . '</span>';
                    }
                }
            }
            ?>

            <?php echo interiart_wishlist_button(); ?>
            <div class="tzShop-item_button">
                <?php
                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item' );
                ?>
            </div>
            <div class="tzShop-item_detail">
                <a href="<?php the_permalink();?>"><?php esc_html_e('View Detail','interiart')?></a>
            </div>
        </div>
        <div class="tzShop-item_info">
            <h3 class="tzShop-item_title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
            <?php
            /**
             * woocommerce_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
//            do_action( 'woocommerce_shop_loop_item_title' );

            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>

            <div class="tzShop-item_des">
                <?php do_action( 'interiart_woocommerce_excerpt'); ?>
            </div>

            <div class="tzShop-item_button_list">
                <?php echo interiart_wishlist_button(); ?>
                <div class="tzShop-item_button">
                    <?php
                    /**
                     * woocommerce_after_shop_loop_item hook
                     *
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     */
                    do_action( 'woocommerce_after_shop_loop_item' );
                    ?>
                </div>
            </div>
        </div>
        <span class="line-left"></span>
        <span class="line-right"></span>
    </div>
</li>
