<?php

function front_end_base_album_everline($album_ids, $album_name, $album_type, $album_id, $album_data_type, $album_single_id, $album_include,
                                       $album_exclude, $album_limit, $album_single_limit, $options_color, $options_columns, $options_padding, $options_height, $options_nav,
                                       $options_album1, $desk, $tablet, $mobile)
{
    wp_enqueue_style("plusgallery_css", plugins_url("tz-plus-gallery-pro/css/pro/plusgallery.css"), FALSE);
    wp_enqueue_style("plusgallery_everline", plugins_url("tz-plus-gallery-pro/css/pro/everline.css"), FALSE);
    wp_enqueue_style("plusgallery-font-awesome", plugins_url("tz-plus-gallery-pro/css/pro/font-awesome.min.css"), FALSE);
    wp_enqueue_script( 'plusgallery_resize', plugins_url("tz-plus-gallery-pro/js/resizeimage.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_resize_function', plugins_url("tz-plus-gallery-pro/js/plusgallery_resize.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_masonry', plugins_url("tz-plus-gallery-pro/js/masonry.pkgd.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_imageloader', plugins_url("tz-plus-gallery-pro/js/imagesloaded.pkgd.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery_masonry_library', plugins_url("tz-plus-gallery-pro/js/masonry.js"), array(), '1.0.0', true );
    wp_enqueue_script( 'plusgallery', plugins_url("tz-plus-gallery-pro/js/plusgallery_everline.js"), array(), '1.0.0', true );

    wp_localize_script('plusgallery','desktop_cols',$options_columns);
    wp_localize_script('plusgallery','desktop_small',$desk);
    wp_localize_script('plusgallery','tablet_cols',$tablet);
    wp_localize_script('plusgallery','mobile_cols',$mobile);

    $width = 100/$options_columns;
    $overlay = hex2rgba($options_color,0.75);
    $back = hex2rgba($options_color,0.5);
    $height2 = $options_height*2;
    $width2 = $width*2;

 ob_start();?>

    <style type="text/css">
        body  #pgzoomview.plusgallery<?php echo esc_attr($album_ids);?> a:hover,
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumlink:hover,
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumlink:hover .pgplus,
        #plusgallery<?php echo esc_attr($album_ids);?> #pgthumbcrumbs li#pgthumbhome:hover,
        #plusgallery<?php echo esc_attr($album_ids);?> .everline .effect-folio:hover figcaption{
            background-color:<?php echo esc_attr($options_color);?>;
        }

        li.everline .image{
            height:<?php echo esc_attr($options_height);?>px;
        }
        li.everline{
            padding:<?php echo esc_attr($options_padding);?>;
            width:<?php echo esc_attr($width);?>%;
        }
        li.everline.item_height2{
        height:<?php echo esc_attr($height2);?>px;
        }
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgthumb.item_width2{
        width:<?php echo esc_attr($width2);?>%;
        }
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgthumb, body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumthumb{
/*            width:*/<?php //echo esc_attr($width);?>/*%;*/
            margin:0;
            max-width:none;
        }

        body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumthumb{
            padding:<?php echo esc_attr($options_padding);?>;
        }
        #plusgallery<?php echo esc_attr($album_ids);?> .second-effect{

            margin:<?php echo esc_attr($options_padding);?>;
        }
        <?php echo esc_attr($options_album1);?>
    </style>
    <?php
if($album_type=='googleplus'){ ?>
    <div id="plusgallery<?php echo esc_attr($album_ids);?>" class="plusgallery nav_hide"
         data-userid="<?php echo esc_attr($album_id); ?>"
        <?php if($album_data_type=='single_album'){ ?>
            data-album-id="<?php echo esc_attr($album_single_id); ?>"
            data-limit="<?php echo esc_attr($album_single_limit); ?>"
        <?php } ?>
        <?php if($album_data_type=='multi_album'){ ?>
            data-include="<?php echo esc_attr($album_include); ?>"
            data-exclude="<?php echo esc_attr($album_exclude); ?>"
            data-album-limit="<?php echo esc_attr($album_limit); ?>"
            data-album-title="true"
            data-limit="<?php echo esc_attr($album_single_limit); ?>"
        <?php } ?>

        <?php if($album_data_type=='all_albums'){ ?>
            data-limit="<?php echo esc_attr($album_single_limit); ?>"
        <?php } ?>
         data-type="google">

    </div>
<?php } ?>

    <?php
if($album_type=='instagram'){?>
    <div id="plusgallery<?php echo esc_attr($album_ids);?>" class="plusgallery <?php echo esc_attr($options_nav);?>"
         data-userid="<?php echo esc_attr($album_id); ?>"
         data-limit="<?php echo esc_attr($album_single_limit); ?>"
         data-access-token="35163631.3a5ca5d.be9b66ad0f964d17b996d2a899bc8cd3"
         data-type="instagram">

    </div>
<?php } ?>

    <?php
if($album_type=='flickr'){?>
    <div id="plusgallery<?php echo esc_attr($album_ids);?>" class="plusgallery nav_hide"
         data-userid="<?php echo esc_attr($album_id); ?>"
         <?php if($album_data_type=='single_album'){ ?>
             data-album-id="<?php echo esc_attr($album_single_id); ?>"
             data-limit="<?php echo esc_attr($album_single_limit); ?>"
         <?php } ?>
         <?php if($album_data_type=='multi_album'){ ?>
             data-include="<?php echo esc_attr($album_include); ?>"
             data-exclude="<?php echo esc_attr($album_exclude); ?>"
             data-album-limit="<?php echo esc_attr($album_limit); ?>"
             data-album-title="true"
             data-limit="<?php echo esc_attr($album_single_limit); ?>"
         <?php } ?>
        <?php if($album_data_type=='all_albums'){ ?>
            data-limit="<?php echo esc_attr($album_single_limit); ?>"
         <?php } ?>
             data-api-key="c07f724ab7ed6a1b01b799fe753c6d13"
            data-font = "fa fa-search"
             data-type="flickr">
    </div>
<?php } ?>

    <?php
if($album_type=='facebook'){ ?>
    <div id="plusgallery<?php echo esc_attr($album_ids);?>" class="plusgallery <?php echo esc_attr($options_nav);?>"
         data-userid="<?php echo esc_attr($album_id); ?>"
         <?php if($album_data_type=='single_album'){ ?>
             data-album-id="<?php echo esc_attr($album_single_id); ?>"
             data-limit="<?php echo esc_attr($album_single_limit); ?>"
         <?php } ?>
         <?php if($album_data_type=='multi_album'){ ?>
             data-include="<?php echo esc_attr($album_include); ?>"
             data-exclude="<?php echo esc_attr($album_exclude); ?>"
             data-album-limit="<?php echo esc_attr($album_limit); ?>"
             data-album-title="true"
             data-limit="<?php echo esc_attr($album_single_limit); ?>"
         <?php } ?>
        <?php if($album_data_type=='all_albums'){ ?>
            data-limit="<?php echo esc_attr($album_single_limit); ?>"
        <?php } ?>
            data-access-token="150849908413827|uYDHoXrvPZOLkQ-zRz_XoYdEeYM"
             data-type="facebook">

    </div>
<?php } ?>

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
            var item_width = Math.floor(container_width/cols);
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
                    columnWidth: item_width
                });
            });
            TzPlusTemplateResizeImage(jQuery('.everline .image'));
        }
    </script>

    <script type="text/javascript">
        var tz_resizeTimer = null;
        jQuery(window).bind('load resize', function() {

            var album = jQuery('#pgalbums').children().length;

            if(album>0){
                TzPlusTemplateResizeImage(jQuery('.everline .image'));
            } else{
                if (tz_resizeTimer) clearTimeout(tz_resizeTimer);
                tz_resizeTimer = setTimeout("tz_init()", 100);
            }
            var window_width = jQuery(window).width();
            if (window_width>1200){
                var ab_cols = <?php echo $options_columns; ?>;
            }
            if ((992 < window_width) && (window_width<= 1200) ){
                var ab_cols = <?php echo $desk; ?>;
            }
            if ((480 <= window_width) && (window_width<= 992) ){
                var ab_cols = <?php echo $tablet; ?>;
            }
            if (window_width < 480){
                var ab_cols = <?php echo $mobile; ?>;
            }
            var album_item_width = 100/ab_cols;
            jQuery('body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumthumb').css({
                width:album_item_width+'%'
            })
        });

        jQuery(document).ready(function(){
          jQuery('#plusgallery<?php echo esc_attr($album_ids);?>').plusGallery();

        })

    </script>
 	  <?php
	return ob_get_clean();
}  
?>