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
<!-- <div class="container">

    <div class="single-news">
        <?php the_post_thumbnail('full'); ?>
        <div class="single-news-overlay">
            <h4><?php echo get_field('single-news-title');?></h4>
        </div>
    </div>
    
</div> -->
<?php
    if(have_posts()):
        while(have_posts()):the_post();
            the_content();
            wp_link_pages();
        endwhile;
    endif;
    wp_reset_query();
?>
<?php
interiart_footer_type();
get_footer();
?>
