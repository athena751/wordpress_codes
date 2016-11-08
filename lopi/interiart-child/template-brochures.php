<?php
/*
 * Template Name: Template brochures Page
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
<section class="brochure-tab">
    <div class="brochure-tab-bg">
        <div class="brochure-tab-bg-inner">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#wood-brochures">Wood Brochures</a></li>
                <li><a data-toggle="tab" href="#gas-brochures">Gas Brochures</a></li>
                <li><a data-toggle="tab" href="#other-brochures">Other Brochures</a></li>
            </ul>
        </div>
    </div>
        <div class="container">
            <div class="breadcrumbs">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>
         <?php 
              $wood_term = "59";
              $gas_term = "58";         
              $other_term = "83";         
          ?>
    <div class="brochure-tab-inner">
        <div class="tab-content">
            <div id="wood-brochures" class="tab-pane fade in active">
              
              <h3><?php the_field('brochure_tab_title', 'product-categories_'.$wood_term); ?></h3> 
              <p>
                <?php the_field('brochure_tab_description', 'product-categories_'.$wood_term); ?>
              </p>

              <ul>
                 
                <?php
                   $args = array(
                    'post_type' => 'products', 
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'product-categories',
                          'field' => 'term_id',
                          'terms' => $wood_term,
                        ),
                      ),
                    );
                    $the_query = new WP_Query( $args );
                      // The Loop
                    while ( $the_query->have_posts() ) {
                      $the_query->the_post();
                    ?>
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
                      wp_reset_query();
                      }
                  ?>
              </ul>
             
            </div>
            <div id="gas-brochures" class="tab-pane fade">
              <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
              <h3><?php the_field('brochure_tab_title', 'product-categories_'.$gas_term); ?></h3> 
              <p>
                <?php the_field('brochure_tab_description', 'product-categories_'.$gas_term); ?>
              </p>
              <ul> 
                <?php
                   $args = array(
                    'post_type' => 'products', 
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'product-categories',
                          'field' => 'term_id',
                          'terms' => $gas_term,
                        ),
                      ),
                    );
                    $the_query = new WP_Query( $args );
                      // The Loop
                    while ( $the_query->have_posts() ) {
                      $the_query->the_post();
                    ?>
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
                      wp_reset_query();
                      }
                ?>
              </ul>
             <?php endwhile; ?>
             <?php endif; ?>
            </div>
            <div id="other-brochures" class="tab-pane fade">
              
              <h3><?php the_field('brochure_tab_title', 'brochure-categories_'.$other_term); ?></h3> 
              <p>
                <?php the_field('brochure_tab_description', 'brochure-categories_'.$other_term); ?>
              </p>
              <ul>
                <?php
                   $args = array(
                    'post_type' => 'brochure', 
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'brochure-categories',
                          'field' => 'term_id',
                          'terms' => $other_term,
                        ),
                      ),
                    );
                    $the_query = new WP_Query( $args );
                      // The Loop
                    while ( $the_query->have_posts() ) {
                      $the_query->the_post();
                    ?>
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
                      wp_reset_query();
                      }
                ?>
              </ul>
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
