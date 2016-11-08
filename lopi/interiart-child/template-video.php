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
    <div class="video-tab-bg">
        <div class="video-tab-bg-inner">
            <ul class="nav nav-tabs">
                <?php  
                $args = array( 'post_type' => 'products', 'posts_per_page' => -1);
                  $c = 0;
                  $class = '';
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                     
                    $post_slug=  $post->post_name;
                    
                    $videos = get_post_meta( $post->ID, 'video-meta-box', true );
                    if( !empty( $videos) ){
                      $c++;
                        if ( $c == 1 ){ $class = ' active';}
                          else{ $class='';} 
                ?>
                  <li class="<?php echo $class; ?>"><a data-toggle="tab" href="#<?php echo $post_slug; ?>"><?php the_title();?></a></li>

                <?php  } ?>

                <?php 
                endwhile;  
                wp_reset_query();
                    $terms = get_terms( array(
                        'taxonomy' => 'video-categories',
                        'hide_empty' => false,
                    ) );  
                     foreach( $terms as $term ){
                      $id_class =  $term->term_id;

                      ?>
                       <li class="term-<?php echo $id_class; ?>"><a data-toggle="tab" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>

                      <?php
                     }
                ?>
                
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
    <div class="video-tab-inner">
        <div class="tab-content">
          <?php  $args = array( 'post_type' => 'products', 'posts_per_page' => -1);
           $c = 0;
                    $class = '';
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                    
                    $post_slug=  $post->post_name;
                    
                     $videos = get_post_meta( $post->ID, 'video-meta-box', true );
                              if( !empty( $videos) ){
                                $c++;
                                 if ( $c == 1 ){ $class = 'in active';}
                      else{ $class='';} 
                    ?>
            <div id="<?php echo $post_slug; ?>" class="tab-pane fade <?php echo $class; ?>">
              <h3><?php the_title();?></h3>
              <ul>
                <?php 
                      foreach( $videos as $video ){
                ?>
                        <li class="col-md-4 col-sm-4 col-xs-12">
                             
                                  <iframe src="https://player.vimeo.com/video/<?php echo $video['video-id']; ?>" width="370" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                  <h4><?php  echo $video['video-title']; ?></h4>
                                  <p>from <span class="italic-font"><?php  echo $video['video-author']; ?></span></p>
                               
                      </li>
                 <?php  } ?>
              </ul>
            </div>
            <?php  } ?>
            <?php endwhile;   wp_reset_query();
             $terms = get_terms( array(
                        'taxonomy' => 'video-categories',
                        'hide_empty' => false,
                    ) );  
                     foreach( $terms as $term ){
                      

                      ?>
                      <div id="<?php echo $term->slug; ?>" class="tab-pane fade <?php echo $class; ?>">

                        <?php

                         $args = array(
                        'post_type' => 'video',
                        'order' => 'ASC',
                        'tax_query' => array(
                                array(
                                    'taxonomy' => 'video-categories',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            ),
                         );

                 $loop = new WP_Query($args);
                 if($loop->have_posts()) {

                    while($loop->have_posts()) : $loop->the_post();
                    ?>
                      <h3><?php the_title();?></h3>
                      <ul>
                        <?php 
                              foreach( $videos as $video ){
                        ?>
                                <li class="col-md-4 col-sm-4 col-xs-12">
                                     
                                          <iframe src="https://player.vimeo.com/video/<?php echo $video['video-id']; ?>" width="370" height="210" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                          <h4><?php  echo $video['video-title']; ?></h4>
                                          <p>from <span class="italic-font"><?php  echo $video['video-author']; ?></span></p>
                                       
                              </li>
                         <?php  } ?>
                      </ul>
                      <?php endwhile;
                 }
                 wp_reset_query();
                 ?>
                    </div>
                      <?php
                     }
            ?>
           <!--  <div id="564Ogsgs" class="tab-pane fade">
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
           <div id="dvlgs" class="tab-pane fade in">
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
           </div> -->
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