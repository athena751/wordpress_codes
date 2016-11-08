<?php

function front_end_base_album($album_ids, $album_name, $album_type, $album_id, $album_data_type, $album_single_id, $album_include,
                              $album_exclude, $album_limit, $album_single_limit, $options_color, $options_columns, $options_padding, $options_height,
                              $options_nav, $options_album1, $desk, $tablet, $mobile)
{
    wp_enqueue_style("plusgallery_css", plugins_url("css/plusgallery.css", __FILE__), FALSE);
    wp_enqueue_script( 'plusgallery', plugins_url("js/plusgallery.js", __FILE__), array(), '1.0.0', true );
    $width = 100/$options_columns;
 ob_start();?>

    <style type="text/css">
        body #plusgallery<?php echo esc_attr($album_ids);?> a:hover, body  #pgzoomview.plusgallery<?php echo esc_attr($album_ids);?> a:hover,
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumlink:hover .pgplus,
        #plusgallery<?php echo esc_attr($album_ids);?> #pgthumbcrumbs li#pgthumbhome:hover{
            background-color:<?php echo esc_attr($options_color); ?>
        }
        body #plusgallery<?php echo esc_attr($album_ids);?> .pgthumb, body #plusgallery<?php echo esc_attr($album_ids);?> .pgalbumthumb{
            width:<?php echo esc_attr($width);?>%;
            margin:0;
            padding:<?php echo esc_attr($options_padding);?>;
            max-width:none;
            height:auto;
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
         data-access-token="<?php echo esc_attr($album_include);?>"
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
        jQuery(document).ready(function(){
            jQuery('#plusgallery<?php echo esc_attr($album_ids);?>').plusGallery();

        })
        jQuery(window).bind('load resize', function() {
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
            var item_width = 100/cols;
            jQuery('.pgthumb').css({
                width:item_width+'%'
            })
        })
    </script>
 	  <?php
	return ob_get_clean();
}  
?>

