<?php
/*
Plugin Name: Custom Post
Plugin URI: https://google.com
Description: Provides simple front end custom post view
Version: 1.0
Author: Niraj
Author URI: https://google.com
*/




// Creating a Deals Custom Post Type
function crunchify_deals_custom_post_type() {
	$labels = array(
		'name'                => __( 'Courses' ),
		'singular_name'       => __( 'Course'),
		'menu_name'           => __( 'Course'),
		'parent_item_colon'   => __( 'Parent Course'),
		'all_items'           => __( 'All Course'),
		'view_item'           => __( 'View Course'),
		'add_new_item'        => __( 'Add New Course'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Course'),
		'update_item'         => __( 'Update Course'),
		'search_items'        => __( 'Search Course'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'courses'),
		'description'         => __( 'Best Course'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
		'taxonomies' 	      => array('post_tag'),
		'publicly_queryable'  => true,
		'capability_type'     => 'page'
);
	register_post_type( 'courses', $args );
}
add_action( 'init', 'crunchify_deals_custom_post_type', 0 );



// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'crunchify_create_deals_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function crunchify_create_deals_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Subjects', 'taxonomy general name' ),
    'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Subjects' ),
    'all_items' => __( 'All Subjects' ),
    'parent_item' => __( 'Parent Subjects' ),
    'parent_item_colon' => __( 'Parent Subjects:' ),
    'edit_item' => __( 'Edit Subjects' ), 
    'update_item' => __( 'Update Subjects' ),
    'add_new_item' => __( 'Add New Subjects' ),
    'new_item_name' => __( 'New Subjects Name' ),
    'menu_name' => __( 'Subjects' ),
  ); 	
 
  register_taxonomy('types',array('courses'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'subjects' ),
  ));
}










//
//
//function add_post_meta_boxes() {
//    // see https://developer.wordpress.org/reference/functions/add_meta_box for a full explanation of each property
//    add_meta_box(
//        "post_metadata_advertising_category", // div id containing rendered fields
//        "short Description", // section heading displayed as text
//        "post_meta_box_advertising_category", // callback function to render fields
//        "courses", // name of post type on which to render fields
//        "side", // location on the screen
//        "low" // placement priority
//    );
//     add_meta_box(
//        "post_metadata_advertising_category_2", // div id containing rendered fields
//        "course Duration", // section heading displayed as text
//        "post_meta_box_advertising_category_2", // callback function to render fields
//        "courses", // name of post type on which to render fields
//        "side", // location on the screen
//        "low" // placement priority
//    );
//}
//add_action( "admin_init", "add_post_meta_boxes" );
//
//function save_post_meta_boxes(){
//    global $post;
//    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
//        return;
//    }
//    if ( get_post_status( $post->ID ) === 'auto-draft' ) {
//        return;
//    }
//    update_post_meta( $post->ID, "_post_advertising_category", sanitize_text_field( $_POST[ "_post_advertising_category" ] ) );
//    update_post_meta( $post->ID, "_post_advertising_html", sanitize_text_field( $_POST[ "_post_advertising_html" ] ) );
//}
//add_action( 'save_post', 'save_post_meta_boxes' );
//
//function post_meta_box_advertising_category(){
//    global $post;
//    $custom = get_post_custom( $post->ID );
//    $advertisingCategory = $custom[ "_post_advertising_category" ][ 0 ];
//    $advertisingHtml = $custom[ "_post_advertising_html" ][ 0 ];
//    wp_editor(
//        htmlspecialchars_decode( $advertisingHtml ),
//        '_post_advertising_html',
//        $settings = array(
//            'textarea_name' => '_post_advertising_html',
//        )
//    );
//    
//}
//function post_meta_box_advertising_category_2(){
//    global $post;
//    $custom = get_post_custom( $post->ID );
//    $advertisingCategory = $custom[ "_post_advertising_category" ][ 0 ];
//    $advertisingHtml = $custom[ "_post_advertising_html" ][ 0 ];
//    wp_editor(
//        htmlspecialchars_decode( $advertisingHtml ),
//        '_post_advertising_html',
//        $settings = array(
//            'textarea_name' => '_post_advertising_html_2',
//        )
//    );
//    
//}
