<?php
/*
 * Template Name: Template video Page
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
        <h2><?php echo get_field('custom-title');?></h2>
        <p><?php echo get_field('description'); ?></p>
    </div>
    <?php 
        endwhile;
        endif;
    ?>
</section>
<section class="video-tab">
    <div class="video-tab-inner">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#564gs">564GS</a></li>
            <li><a data-toggle="tab" href="#564Ogsgs">564O GS GS</a></li>
            <li><a data-toggle="tab" href="#864gs">864GS</a></li>
            <li><a data-toggle="tab" href="#864stgs">864ST GS</a></li>
            <li><a data-toggle="tab" href="#dvlgs">DVL GS</a></li>
            <li><a data-toggle="tab" href="#lopiwoods">Lopi Woods</a></li>
            <li><a data-toggle="tab" href="#illuminations">Illuminations</a></li>
            <li><a data-toggle="tab" href="#tvshows">TV Shows/Promotional</a></li>
            <li><a data-toggle="tab" href="#general-instal">General Installation</a></li>
            <li><a data-toggle="tab" href="#other">other</a></li>
        </ul>
        <div class="container">
            <div class="breadcrumbs">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>
        <div class="tab-content">
            <div id="564gs" class="tab-pane fade in active">
              <h3>564GS</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div id="564Ogsgs" class="tab-pane fade">
              <h3>564O GS GS</h3>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="864gs" class="tab-pane fade">
              <h3>864GS</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="864stgs" class="tab-pane fade">
              <h3>864ST GS</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="dvlgs" class="tab-pane fade in active">
              <h3>DVL GS</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div id="lopiwoods" class="tab-pane fade">
              <h3>Lopi Woods</h3>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="illuminations" class="tab-pane fade">
              <h3>Illuminations</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="tvshows" class="tab-pane fade">
              <h3>TV Shows/Promotional</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="general-instals" class="tab-pane fade">
              <h3>General Installation</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="other" class="tab-pane fade">
              <h3>Other</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>
</section>

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