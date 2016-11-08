<?php

function wp_front_end_base_album_zumion($album_ids, $options_color, $options_columns, $options_padding,
                                        $options_height,  $options_album1, $desk, $tablet, $mobile)
{
    wp_enqueue_style("plusgallerypro_css", plugins_url("tz-plus-gallery-pro/css/pro/plusgallery.css"), FALSE);
    wp_enqueue_style("prettyPhoto", plugins_url("tz-plus-gallery-pro/css/prettyPhoto.css"), FALSE);
    wp_enqueue_script( 'prettyphoto', plugins_url("tz-plus-gallery-pro/js/jquery.prettyPhoto.js"), array(), '1.0.0', true );
    wp_enqueue_style("plusgallery_aragon", plugins_url("tz-plus-gallery-pro/css/pro/zumion.css"), FALSE);
    wp_enqueue_style("plusgallery-font-awesome", plugins_url("tz-plus-gallery-pro/css/pro/font-awesome.min.css"), FALSE);
    wp_enqueue_script( 'plusgallery_resize', plugins_url("tz-plus-gallery-pro/js/resizeimage.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_resize_function', plugins_url("tz-plus-gallery-pro/js/plusgallery_resize.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_masonry', plugins_url("tz-plus-gallery-pro/js/masonry.pkgd.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_imageloader', plugins_url("tz-plus-gallery-pro/js/imagesloaded.pkgd.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_masonry_library', plugins_url("tz-plus-gallery-pro/js/masonry.js"), array(), '1.0.0', true );
    $width = 100/$options_columns;
    global $wpdb;
    $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."tz_plusgallery_images WHERE album_id = '%d' ORDER BY ordering ASC",$album_ids);
    $wpimages=$wpdb->get_results($query);
    ob_start();
    ?>

    <style type="text/css">
        #plusgallery<?php echo esc_attr($album_ids);?> figure.effect-bubba{
            background-color:<?php echo esc_attr($options_color);?>;
        }
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgthumb{
            width:<?php echo esc_attr($width);?>%;
            margin:0;
            max-width:none;
        }
        li.zumion{
            padding:<?php echo esc_attr($options_padding);?>;
            width:<?php echo esc_attr($width);?>%;
        }
        <?php echo esc_attr($options_album1); ?>
    </style>

    <div class="tzwpgallery plusgallery no-touch pg loaded" id="plusgallery<?php echo esc_attr($album_ids);?>">
        <ul class="clearfix tzmasonry" id="pgthumbs">
            <?php foreach($wpimages as $wpimage): ?>

                <li class="pgthumb zumion">
                    <figure class="effect-bubba">
                        <img
                            style="background: transparent url(<?php echo esc_url($wpimage->image_url);?>) no-repeat scroll 50% 50% / cover ;"
                            alt="<?php echo esc_attr($wpimage->image_title);?>"
                            src="<?php echo plugins_url("tz-plus-gallery-pro/images/plusgallery/square.png"); ?>">
                        <figcaption>
                            <?php if($wpimage->image_title){ ?>
                                <h2><?php echo esc_attr($wpimage->image_title);?></h2>
                            <?php }?>

                            <div class="bubba-info <?php if(empty($wpimage->image_title)){ echo "bubba_none_title"; } ?>">
                                <a title="<?php echo esc_attr($wpimage->image_title);?>" class="info pgthumbimg"
                                   href="<?php echo esc_url($wpimage->image_url);?>" rel="prettyPhoto[<?php echo esc_attr($album_ids);?>]"><i class="fa fa-search"></i>
                                </a>
                                <?php if($wpimage->image_link){ ?>
                                    <a title="<?php echo esc_attr($wpimage->image_title);?>" class="image_url"
                                       href="<?php echo esc_url($wpimage->image_link);?>" <?php if($wpimage->link_target){ ?> target="_blank" <?php } ?>><i class="fa fa-link"></i>
                                    </a>
                                <?php }?>
                            </div>
                        </figcaption>

                    </figure>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>

    <script type="text/javascript">
        function tz_init(){

            var window_width = jQuery(window).width();
            if (window_width>1200){
                var cols = <?php echo $options_columns; ?>;
            }
            if ((992 < window_width) && (window_width<= 1200) ){
                var cols = <?php echo $desk; ?>;
            }
            if ((480 <= window_width) && (window_width<= 992) ){
                var cols = <?php echo $tablet; ?>;
            }
            if (window_width < 480){
                var cols = <?php echo $mobile; ?>;
            }

            var container_width = jQuery('.tzmasonry').width();
            var item_width = container_width/cols;
            var item_width2 = item_width*2;
            jQuery('.pgthumb').css({
                width:item_width+'px'
            })
            jQuery('.item_width2').css({
                width:item_width2+'px'
            })
            var $grid = jQuery('.tzmasonry').imagesLoaded( function() {
                $grid.masonry({
                    itemSelector: '.pgthumb',
                    percentPosition: true,
                    columnWidth: item_width
                });
            });
            TzPlusTemplateResizeImage(jQuery('.zumion'));
            jQuery("a[rel^='prettyPhoto']").prettyPhoto({
                social_tools:''
            });
        }
    </script>

    <script type="text/javascript">
        var tz_resizeTimer = null;
        jQuery(window).bind('load resize', function() {
            if (tz_resizeTimer) clearTimeout(tz_resizeTimer);
            tz_resizeTimer = setTimeout("tz_init()", 100);
        });

    </script>

    <?php
    return ob_get_clean();
}
?>

