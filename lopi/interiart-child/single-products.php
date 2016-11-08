<?php
    get_header();
    get_template_part('template_inc/inc','header');
?>
<section class="product-cat-banner">
    <?php if(have_posts()):
        while(have_posts()):the_post();
    ?>
    <div class="product-cat-banner-img">
        <?php if( get_field('product-banner') ): ?>
            <img src="<?php the_field('product-banner'); ?>" />
        <?php endif; ?>
    </div>
    <div class="container product-cat-banner-inner">
        <h2><?php echo get_field('custom-title');?></h2>
        <p><?php echo get_field('description'); ?></p>
    </div>
    <?php 
        endwhile;
        endif;
         wp_reset_query();
    ?>
</section>
<div class="container">
    <div class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
</div>
<div class="container prod-decs">
<?php if(have_posts()):
    while(have_posts()):the_post();
?>
<?php $attachments = new Attachments( 'my_attachments' ); ?>

  <ul>
    
    <li class="col-md-5 col-sm-5 col-xs-12" >
       <div class="demo">

            <div class="zoom-section">      
                <?php
                 if( $attachments->exist() ) : 
                 $my_index = 0; 
                if( $attachment = $attachments->get_single( $my_index ) ) :
                    $large_img = $attachments->src('large-product', $my_index); 
                    $large_thumb_img = $attachments->src( 'thumb-product', $my_index  );

                ?>  
                <div class="zoom-small-image">
                    <a href='<?php echo $large_img; ?>' class = 'cloud-zoom' id='zoom1' rel="position:'inside',showTitle:false,adjustX:-4,adjustY:-4">
                        <img src="<?php echo $large_img; ?>" alt='' />
                    </a>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <div class="zoom-desc">    
                    <?php 
                if( $attachments->exist() ) : 
                    while( $attachments->get() ) : 
                        $main_img = $attachments->src('large-product'); 
                        $thumb_img = $attachments->src( 'thumb-product' );
                        $tiny_img = $attachments->src( 'tiny-product' );
                    ?>
                        <a href='<?php echo $main_img; ?>' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '<?php echo $main_img; ?>' ">
                            <img class="zoom-tiny-image" src="<?php echo $tiny_img; ?>" alt = "Thumbnail 1"/>
                        </a>
                    <?php endwhile; 
                    endif; 
                    ?>
                </div>
                
            </div><!--zoom-section end-->
            
       </div>
    </li>
     
    <li class="col-md-7 col-sm-7 col-xs-12">
        <?php echo get_field('product_description'); ?>
    </li>
</ul>



<?php 
        endwhile;
        endif;
         wp_reset_query();
    ?>

</div>
<div class="container product-tab-main">
<div class="product-tabs">
    <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#specification">Specification</a></li>
                <li><a data-toggle="tab" href="#options">Options</a></li>
                <li><a data-toggle="tab" href="#dimensions">Dimensions</a></li>
                <li><a data-toggle="tab" href="#spare-parts">Spare Parts</a></li>
                <li><a data-toggle="tab" href="#technical">Technical</a></li>
                <li><a data-toggle="tab" href="#brochures">Brochures</a></li>
                <li><a data-toggle="tab" href="#videos">Videos</a></li>
    </ul>
</div>
<div class="product-tabs-content">
    <div class="tab-content">
        <div id="specification" class="tab-pane fade in active">
            <?php
                the_content();
                           
            ?>             
        </div>
        <div id="options" class="tab-pane fade">
            <?php the_field('options_tab'); ?>
        </div>
        <div id="dimensions" class="tab-pane fade">
            <?php the_field('dimensions_tab'); ?>
        </div>
        <div id="spare-parts" class="tab-pane fade">
             <?php $file = get_field('project-brochure');
             if( $file ):  ?>
            <ul>      
                <li class="col-md-4 col-sm-4 col-xs-12">
                    <div class="spare-download-bro">
                    <p>Download</p>
                    <h6>
                    <?php //if( $file ): ?>
                        <a href="<?php echo $file['url']; ?>" target="_blank"><?php the_title(); ?><span class="spare-bro"> as PDF</span></a></a>
                    <?php //endif;?>
                    </h6>                            
                    </div>
                </li>
            </ul>
            <div class="spare-img col-md-12 col-sm-12 col-xs-12">
                <?php if( get_field('pdf-image') ): ?>
                    <img src="<?php the_field('pdf-image'); ?>" />
                <?php endif; ?>
            </div>
            <?php 
                endif;
            ?>
        </div>
        <div id="technical" class="tab-pane fade">
            <?php the_field('technical_tab'); ?>
        </div>
        <div id="brochures" class="tab-pane fade">
             <ul>
                <?php $attachments = new Attachments( 'my_brochures' ); ?>
                    <?php if( $attachments->exist() ) : ?>
                    <?php while( $attachments->get() ) : ?>
                    <li class="col-md-4 col-sm-4 col-xs-12">
                        <h4><?php echo $attachments->field( 'title' ); ?></h4>
                        <div class="brochure-btn">
                            <a href="<?php echo $attachments->url(); ?>" target="_blank">Download</a>
                        </div>
                    </li>
                <?php 
                    endwhile;
                    endif;
                ?>
            </ul>
        </div>
        <div id="videos" class="tab-pane fade">
            <ul>
            <?php $videos = get_post_meta( $post->ID, 'video-meta-box', true );
                if( !empty( $videos) ){
                   foreach( $videos as $video ){
            ?>
                    <li class="col-md-4 col-sm-4 col-xs-12">
                        <iframe src="https://player.vimeo.com/video/<?php echo $video['video-id']; ?>" width="370" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        <h4><?php  echo $video['video-title']; ?></h4>
                        <p>from <span class="italic-font"><?php  echo $video['video-author']; ?></span></p>  
                    </li>
                    <?php 
                    }
                }
            ?>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="container related-pro">

    <h2>Related Product</h2>
    <?php 

    $posts = get_field('related_products');

    if( $posts ): ?>
        <ul>
        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) 
        ?>
       
            <li>
                 <a href="<?php echo get_permalink( $p->ID ); ?>">
                    <?php echo get_the_post_thumbnail($p->ID, 'thumbnail');
                    ?>
                    <h3><?php echo get_the_title( $p->ID ); ?></h3>
                    <p><?php
                    echo get_post_field('post_content', $p->ID);
                    ?>
                    </p>
                 </a>
            </li>
       
        <?php endforeach; ?>
        </ul>
<?php endif; ?>
</div>
<div class="pro-bottom-banner" style="background:url(<?php the_field('bg_image'); ?>)">
   <?php
    /*if(have_posts()):
        while(have_posts()):the_post();*/?>
           <?php the_field('banner-text'); ?>
    <?php
      /*  endwhile;
    endif;
    wp_reset_query();*/
    ?>
</div>
<div class="pro-newsletter">
    <div class="container">
        <?php
            dynamic_sidebar('newsletter');
        ?>
    </div>
</div>
<?php
interiart_footer_type();
get_footer();
?>


