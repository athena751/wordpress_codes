<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles',11);
function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
}
///////products start/////////////////////////
add_action( 'init', 'register_interiart_products' );

function register_interiart_products() {

    $labels = array( 
        'name' => _x( 'Products', 'products' ),
        'singular_name' => _x( 'Products', 'products' ),
        'add_new' => _x( 'Add New', 'products' ),
        'add_new_item' => _x( 'Add New Products', 'products' ),
        'edit_item' => _x( 'Edit Products', 'products' ),
        'new_item' => _x( 'New Products', 'products' ),
        'view_item' => _x( 'View Products', 'products' ),
        'search_items' => _x( 'Search Products', 'products' ),
        'not_found' => _x( 'No Products found', 'products' ),
        'not_found_in_trash' => _x( 'No Products found in Trash', 'products' ),
        'parent_item_colon' => _x( 'Parent Products:', 'products' ),
        'menu_name' => _x( 'Products', 'products' ),
    );

    $args1 = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'product-categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'products', $args1 );
  
}
if ( ! function_exists( 'product_taxonomy' ) ) {

// Register Custom Taxonomy
function product_taxonomy() {

    $labels = array(
        'name'                       => _x( 'product-categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'product-category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Product-Categories', 'text_domain' ),
        'all_items'                  => __( 'All Product-Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent product-category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent product-category:', 'text_domain' ),
        'new_item_name'              => __( 'New product-category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New product-category', 'text_domain' ),
        'edit_item'                  => __( 'Edit product-category', 'text_domain' ),
        'update_item'                => __( 'Update product-category', 'text_domain' ),
        'view_item'                  => __( 'View product-category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate product-categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove product-categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular product-categories', 'text_domain' ),
        'search_items'               => __( 'Search product-categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No product-categories', 'text_domain' ),
        'items_list'                 => __( 'product-categories list', 'text_domain' ),
        'items_list_navigation'      => __( 'product-categories list navigation', 'text_domain' ),
    );
    $capabilities = array(
        'manage_terms'               => 'manage_categories',
        'edit_terms'                 => 'manage_categories',
        'delete_terms'               => 'manage_categories',
        'assign_terms'               => 'edit_posts',
    );
    $args1 = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'product-categories', array( 'products' ), $args1 );

}
add_action( 'init', 'product_taxonomy', 0 );

}
///////video start/////////////////////////
add_action( 'init', 'register_interiart_video' );

function register_interiart_video() {

    $labels = array( 
        'name' => _x( 'Video', 'video' ),
        'singular_name' => _x( 'Video', 'video' ),
        'add_new' => _x( 'Add New', 'video' ),
        'add_new_item' => _x( 'Add New Video', 'video' ),
        'edit_item' => _x( 'Edit Video', 'video' ),
        'new_item' => _x( 'New Video', 'video' ),
        'view_item' => _x( 'View Video', 'video' ),
        'search_items' => _x( 'Search Video', 'video' ),
        'not_found' => _x( 'No Video found', 'video' ),
        'not_found_in_trash' => _x( 'No Video found in Trash', 'video' ),
        'parent_item_colon' => _x( 'Parent Video:', 'video' ),
        'menu_name' => _x( 'Video', 'video' ),
    );

    $args2 = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'video-categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'video', $args2 );
  
}

if ( ! function_exists( 'video_taxonomy' ) ) {

// Register Custom Taxonomy
function video_taxonomy() {

    $labels = array(
        'name'                       => _x( 'video-categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'video-category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Video-Categories', 'text_domain' ),
        'all_items'                  => __( 'All Video-Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent video-category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent video-category:', 'text_domain' ),
        'new_item_name'              => __( 'New video-category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New video-category', 'text_domain' ),
        'edit_item'                  => __( 'Edit video-category', 'text_domain' ),
        'update_item'                => __( 'Update video-category', 'text_domain' ),
        'view_item'                  => __( 'View video-category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate video-categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove video-categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular video-categories', 'text_domain' ),
        'search_items'               => __( 'Search video-categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No video-categories', 'text_domain' ),
        'items_list'                 => __( 'video-categories list', 'text_domain' ),
        'items_list_navigation'      => __( 'video-categories list navigation', 'text_domain' ),
    );
    $capabilities = array(
        'manage_terms'               => 'manage_categories',
        'edit_terms'                 => 'manage_categories',
        'delete_terms'               => 'manage_categories',
        'assign_terms'               => 'edit_posts',
    );
    $args2 = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'video-categories', array( 'video' ), $args2 );

}
add_action( 'init', 'video_taxonomy', 0 );

}

///////brochure start/////////////////////////
add_action( 'init', 'register_interiart_brochure' );

function register_interiart_brochure() {

    $labels = array( 
        'name' => _x( 'Brochure', 'brochure' ),
        'singular_name' => _x( 'Brochure', 'brochure' ),
        'add_new' => _x( 'Add New', 'brochure' ),
        'add_new_item' => _x( 'Add New Brochure', 'brochure' ),
        'edit_item' => _x( 'Edit Brochure', 'brochure' ),
        'new_item' => _x( 'New Brochure', 'brochure' ),
        'view_item' => _x( 'View Brochure', 'brochure' ),
        'search_items' => _x( 'Search Brochure', 'brochure' ),
        'not_found' => _x( 'No Brochure found', 'brochure' ),
        'not_found_in_trash' => _x( 'No Brochure found in Trash', 'brochure' ),
        'parent_item_colon' => _x( 'Parent Brochure:', 'brochure' ),
        'menu_name' => _x( 'Brochure', 'brochure' ),
    );

    $args3 = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'brochure-categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'brochure', $args3 );
  
}

if ( ! function_exists( 'brochure_taxonomy' ) ) {

// Register Custom Taxonomy
function brochure_taxonomy() {

    $labels = array(
        'name'                       => _x( 'brochure-categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'brochure-category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Brochure-Categories', 'text_domain' ),
        'all_items'                  => __( 'All Brochure-Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent brochure-category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent brochure-category:', 'text_domain' ),
        'new_item_name'              => __( 'New brochure-category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New brochure-category', 'text_domain' ),
        'edit_item'                  => __( 'Edit brochure-category', 'text_domain' ),
        'update_item'                => __( 'Update brochure-category', 'text_domain' ),
        'view_item'                  => __( 'View brochure-category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate brochure-categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove brochure-categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular brochure-categories', 'text_domain' ),
        'search_items'               => __( 'Search brochure-categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No brochure-categories', 'text_domain' ),
        'items_list'                 => __( 'brochure-categories list', 'text_domain' ),
        'items_list_navigation'      => __( 'brochure-categories list navigation', 'text_domain' ),
    );
    $capabilities = array(
        'manage_terms'               => 'manage_categories',
        'edit_terms'                 => 'manage_categories',
        'delete_terms'               => 'manage_categories',
        'assign_terms'               => 'edit_posts',
    );
    $args3 = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'capabilities'               => $capabilities,
    );
    register_taxonomy( 'brochure-categories', array( 'brochure' ), $args3 );

}
add_action( 'init', 'brochure_taxonomy', 0 );

}

add_action( 'widgets_init', 'add_interiart_widgets' );
function add_interiart_widgets() {
    
    register_sidebar( array(
    'name' => 'Newsletter',
    'id' => 'newsletter',
    'description' => 'Appears in the bottom area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
}

add_image_size( 'large-product', 430, 383, array( 'center', 'center' ) ); 
add_image_size( 'thumb-product', 230, 183, array( 'center', 'center' ) ); 
add_image_size( 'tiny-product', 108, 94, array( 'center', 'center' ) ); 


function my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'My Product Gallery',

    // all post types to utilize (string|array)
    'post_type'     => array( 'products' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach files here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );

function my_brochures( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'My Product Brochures',

    // all post types to utilize (string|array)
    'post_type'     => array( 'products','brochure' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach files here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );
  $attachments->register( 'my_brochures', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_brochures' );




add_action( 'init', 'lopioutlets' );

function lopioutlets() {

    $labels = array( 
        'name' => _x( 'lopioutlets', 'lopioutlets' ),
        'singular_name' => _x( 'lopioutlets', 'lopioutlets' ),
        'add_new' => _x( 'Add New', 'lopioutlets' ),
        'add_new_item' => _x( 'Add New Outlet', 'lopioutlets' ),
        'edit_item' => _x( 'Edit Outlet', 'lopioutlets' ),
        'new_item' => _x( 'New Outlet', 'lopioutlets' ),
        'view_item' => _x( 'View Outlet', 'lopioutlets' ),
        'search_items' => _x( 'Search Outlet', 'lopioutlets' ),
        'not_found' => _x( 'No Outlets found', 'lopioutlets' ),
        'not_found_in_trash' => _x( 'No Outlets found in Trash', 'lopioutlets' ),
        'parent_item_colon' => _x( 'Parent Outlets:', 'lopioutlets' ),
        'menu_name' => _x( 'Outlets', 'lopioutlets' ),
    );

    $args1 = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title'),
        //'taxonomies' => array( 'product-categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    

    register_post_type( 'lopioutlets', $args1 );
  
}
