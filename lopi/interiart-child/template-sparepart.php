<?php
/*
 * Template Name: Template woodsparepart Page
 */
?>
<?php
    get_header();
    get_template_part('template_inc/inc','header');
//    get_template_part('template_inc/inc','breadcrumb');
?>
<section class="woodproduct-banner">
    <?php if(have_posts()):
        while(have_posts()):the_post();
    ?>
    <div class="banner-img">
        <?php  
         the_post_thumbnail();
        ?>
    </div>
    <div class="container woodproduct-banner-inner">
        
        <h2><?php the_title();?></h2>
        <p><?php echo get_field('description'); ?></p>
        <ul>
            <?php
              $parent_id ="3238";
             
                $mypages = get_pages( array( 'child_of' => $parent_id, 'sort_order' => 'desc' ) );

                foreach( $mypages as $page ) {      
                   
                ?>
                
                  <li class="page-<?php echo $page->ID; ?>">
                    <a href="<?php echo get_page_link( $page->ID ); ?>" title="<?php echo $page->post_title; ?>">
                        <div class="plus-icon">
                        </div>
                        <h6>
                        <?php echo $page->post_title; ?>
                        </h6>
                    </a>
                  </li>
                
                <?php
                }   
            ?>
        </ul>  
    </div>
    <?php 
        endwhile;
        endif;
        ?>
</section>
<?php 
if (is_page( 'wood-spare-parts' )) {
                   $term_id = "59";
                 } else if (is_page( 'gas-spare-parts' )) {
                    $term_id = "58";
                 } else{
                   $term_id = "";
                 }

                 
?>
<section class="spare-tab">
    <div class="spare-tab-bg">
        <div class="spare-tab-bg-inner">
            <ul class="nav nav-tabs">
                 <?php 
                 
                  $args = array( 
                    'post_type' => 'products', 
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'product-categories',
                          'field' => 'term_id',
                          'terms' => $term_id,
                        ),
                      ),
                    );
                  $c = 0;
                  $class = '';
                     $loop = new WP_Query( $args );
                     while ( $loop->have_posts() ) : $loop->the_post();
                      
                      $post_slug=  $post->post_name;
                      
                      $file = get_field('project-brochure');
                        if( $file ):
                          $c++;
                          if ( $c == 1 ){ $class = ' active';}
                          else{ $class='';} 
                     ?>
                     <li class="<?php echo $class; ?>"><a data-toggle="tab" href="#<?php echo $post_slug; ?>"><?php the_title();?></a></li>
                <?php 
                endif; 
                endwhile; 
                wp_reset_query();?>
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
    <div class="spare-tab-inner">
        <div class="tab-content">
            <?php   $args = array( 
                    'post_type' => 'products', 
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      array(
                          'taxonomy' => 'product-categories',
                          'field' => 'term_id',
                          'terms' => $term_id,
                        ),
                      ),
                    );
                  $c = 0;
                    $class = '';
                     $loop = new WP_Query( $args );
                     while ( $loop->have_posts() ) : $loop->the_post();
                     
                      $post_slug=  $post->post_name;
                     

                        $file = get_field('project-brochure');
                        if( $file ): 
                          $c++;
                           if ( $c == 1 ){ $class = 'in active';}
                            else{ $class='';} 
                      ?>
                      <div id="<?php echo $post_slug; ?>" class="tab-pane fade <?php echo $class; ?>">
                        <ul>
                          <li class="col-md-8 col-sm-8 col-xs-12">
                            <h3><?php the_title();?></h3>
                            <p><?php the_excerpt();?></p>
                          </li>
                          <li class="col-md-4 col-sm-4 col-xs-12">
                            <?php if( get_field('product-image') ): ?>
                                <img src="<?php the_field('product-image'); ?>" />
                            <?php endif; ?>
                            
                              <div class="spare-download-bro">
                                <a href="<?php echo $file['url']; ?>" target="_blank">
                                  <p>Download</p>
                                  <h6>
                                    <?php //if( $file ): ?>
                                      <?php the_title(); ?><span class="spare-bro"> as PDF</span>
                                    <?php //endif;?>
                                  </h6>
                                </a>
                              </div>
                            
                          </li>
                        </ul>
                        <div class="spare-img col-md-12 col-sm-12 col-xs-12">
                            <?php if( get_field('pdf-image') ): ?>
                                <img src="<?php the_field('pdf-image'); ?>" />
                            <?php endif; ?>
                         </div>
                      </div>
                      <?php endif; ?>
                <?php endwhile; wp_reset_query();?>

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