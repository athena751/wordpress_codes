<?php
/*
 * Template Name: Template Woodproduct Page
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

                <?php/*
                    $term_id = 59;
                    $taxonomy_name = 'product-categories';
                    $orderby        = 'ASC';
                    $termchildren = get_term_children( $term_id, $taxonomy_name );
                ?>
                <?php
               foreach ( $termchildren as $child ) {
                $term = get_term_by( 'id', $child, $taxonomy_name ); 
                $term_link = get_term_link( $child, $taxonomy_name );
                ?>
                    
                                <li>
                                    <div class="plus-icon">
                                        <a href="<?php echo $term_link; ?>" title="<?php echo $term->name; ?>"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
                                    </div>
                                    <h6>
                                        <a href="<?php get_term_link( $child, $taxonomy_name ); ?>" title="<?php echo $term->name; ?>">
                                            <?php echo $term->name; ?>
                                        </a>
                                    </h6>
                                </li>
                   
                <?php
            }*/
                ?>
            <?php
              $parent_id ="18";
             
                $mypages = get_pages( array( 'child_of' => $parent_id, 'sort_order' => 'asc' ) );

                foreach( $mypages as $page ) {      
                   
                ?>
                <a href="<?php echo get_page_link( $page->ID ); ?>">
                    <li class="page-<?php echo $page->ID; ?>">
                        <div class="plus-icon">
                        </div> 
                        <h6>
                            <?php echo $page->post_title; ?>
                        </h6>
                    </li> 
                </a>
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