<?php
/*
 * Template Name: Template custom Page
 */
?>
<?php
    get_header();
    get_template_part('template_inc/inc','header');
//    get_template_part('template_inc/inc','breadcrumb');
?>
<section class="custom-tem-banner">
    <?php if(have_posts()):
        while(have_posts()):the_post();
    ?>
    <div class="custom-tem-banner-img">
        <?php  
         the_post_thumbnail();
        ?>
    </div>
    <div class="container custom-tem-banner-inner">
        <h2><?php echo get_field('title');?></h2>
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
    ?>
<?php
    interiart_footer_type();
    get_footer();
?>