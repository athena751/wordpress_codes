<?php
/*
 * Template Name: Template product-cat Page
 */
?>
<?php
    get_header();
    get_template_part('template_inc/inc','header');
//    get_template_part('template_inc/inc','breadcrumb');
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
<?php
    if(have_posts()):
        while(have_posts()):the_post();
            the_content();
            wp_link_pages();
        endwhile;
    endif;
    wp_reset_query();
    ?>
<div class="container custom-pro-cat">
        <ul>
            <?php 
            
            if( is_page( 'freestanding-wood-heaters-stoves' ) ){

                $custom_terms = 'freestanding-fireplaces';

            } else  if( is_page( 'inbulit-fireplaces' ) ){

                $custom_terms = 'inbuilt-fireplaces';

            } else  if( is_page( 'fireplaces' ) ){

                 $custom_terms = 'fireplaces';

            } else  if( is_page( 'linear-fireplaces' ) ){

                $custom_terms = 'linear-fireplaces';

            } else  if( is_page( 'gas-inserts' ) ){

                $custom_terms = 'gas-inserts';

            } else  if( is_page( 'freestanding-fireplaces' ) ){

                $custom_terms = 'freestanding-fireplaces-gas';
              
            } else{

            }
            

             $args = array(
                'post_type' => 'products',
                'order' => 'ASC',
                'tax_query' => array(
                        array(
                            'taxonomy' => 'product-categories',
                            'field' => 'slug',
                            'terms' => $custom_terms,
                        ),
                    ),
                 );

                 $loop = new WP_Query($args);
                 if($loop->have_posts()) {

                    while($loop->have_posts()) : $loop->the_post();
                    ?>
                    <li class="col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php the_permalink();?>">
                            <div class="custom-pro-cat-img">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="custom-pro-link">
                                
                                    <?php if( get_field('read_more_image') ): ?>

                                    <img src="<?php the_field('read_more_image'); ?>" />

                                <?php endif; ?>
                                
                            </div>
                            <h2><?php the_title();?></h2>
                            <?php the_excerpt();?>
                        </a>
                    </li>
                    
                    <?php
                    endwhile;
                 }
                 wp_reset_query();
            ?>
        </ul>
</div> 
<div class="pro-bottom-banner" style="background:url(<?php the_field('bg_image'); ?>)">
   <?php
    if(have_posts()):
        while(have_posts()):the_post();?>
           <?php the_field('banner-text'); ?>
    <?php
        endwhile;
    endif;
    wp_reset_query();
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