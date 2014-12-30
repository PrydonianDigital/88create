<?php

function ee_init()  {
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	//add_theme_support( 'jetpack-responsive-videos' );
	set_post_thumbnail_size( 700, 394, true );
	add_image_size( 'work',  700, 394, true );
	add_image_size( 'big_case',  700, 700, true );
	add_image_size( 'case', 510, 510, true );
	add_image_size( 'timeline', 250, 150, true );
	add_image_size( 'portfolio', 640, 640, true );
	add_image_size( 'person', 320, 320, true );
	add_image_size( 'persondesktop', 365, 1000, true );
	add_editor_style( 'editor-style.css' );
	$background_args = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );
	$header_args = array(
		'default-image'          => get_template_directory_uri() . '/img/header/header.png',
		'width'                  => 2550,
		'height'                 => 1860,
		'flex-width'             => false,
		'flex-height'            => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'post-formats', array( 'video' ) );
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );	
}
add_action( 'after_setup_theme', 'ee_init' );

// Register Style
function ee_css() {
	wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', false, '2.8' );
	wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css', false, '2014' );
	wp_register_style( 'reveal', get_template_directory_uri() . '/css/reveal.min.css', false, '2014' );
	wp_register_style( 'default', get_template_directory_uri() . '/css/theme/default.css', false, '2014' );
	wp_register_style( 'eec', get_template_directory_uri() . '/css/eec.css', false, '1' );
	wp_enqueue_style( 'normalize' );
	wp_enqueue_style( 'animate' );
	wp_enqueue_style( 'eec' );
}
// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'ee_css' );

function ee_scripts() {
	//wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.11.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'cookie', get_template_directory_uri() . '/js/cookie.js', false, '1.4.1', true );
	wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.js', false, '2.1.0', true );
	wp_register_script( 'lazyload', get_template_directory_uri() . '/js/lazyload.js', false, '1.9.3', true );
	wp_register_script( 'infinite', get_template_directory_uri() . '/js/infinite_scroll.js', false, '2.1.0', true );
	wp_register_script( 'gmap', '//maps.googleapis.com/maps/api/js?sensor=false&region=GB', false, '6.0.0', true );
	wp_register_script( 'gmap3', get_template_directory_uri() . '/js/gmap3.js', false, '6.0.0', true );
	wp_register_script( 'reveal', get_template_directory_uri() . '/js/reveal.js', false, '2014', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', false, '2.6', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cookie' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'ee_scripts' );

function map() {
    if ( is_page(array('contact')) ) {
        wp_enqueue_script('gmap');
        wp_enqueue_script('gmap3');
    } 
}
add_action('wp_enqueue_scripts', 'map');

function workPage() {
    if ( is_post_type_archive(array('work', 'case_studies')) ) {
        wp_enqueue_script('isotope');
        wp_enqueue_script('lazyload');
    } 
}
add_action('wp_enqueue_scripts', 'workPage');

function skillsPage() {
    if ( is_page(array('create', 'engage', 'about')) ) {
        wp_enqueue_style( 'reveal' );
        wp_enqueue_style( 'default' );
        wp_enqueue_script('reveal');
    } 
}
add_action('wp_enqueue_scripts', 'skillsPage');

function blogPage() {
    if ( is_home() ) {
        wp_enqueue_script('isotope');
        wp_enqueue_script('lazyload');
    } 
}
add_action('wp_enqueue_scripts', 'blogPage');

function ee_menu() {
	$locations = array(
		'eemenu' => __( '88Create Menu', 'ee' ),
		'eemobile' => __( '88Create Mobile Menu', 'ee' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'ee_menu' );

// Register Engage Post Type
function engage() {
	$labels = array(
		'name'                => _x( 'Engage', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Engage', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'Engage', 'ee' ),
		'parent_item_colon'   => __( 'Parent Engage:', 'ee' ),
		'all_items'           => __( 'All Engage', 'ee' ),
		'view_item'           => __( 'View Engage', 'ee' ),
		'add_new_item'        => __( 'Add New Engage', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Engage', 'ee' ),
		'update_item'         => __( 'Update Engage', 'ee' ),
		'search_items'        => __( 'Search Engage', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'engager', $args );
}
// Hook into the 'init' action
add_action( 'init', 'engage', 0 );

// Register Portfolio Post Type
function portfolio() {
	$labels = array(
		'name'                => _x( 'Work', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Work', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'Work', 'ee' ),
		'parent_item_colon'   => __( 'Parent Work:', 'ee' ),
		'all_items'           => __( 'Work', 'ee' ),
		'view_item'           => __( 'View Work', 'ee' ),
		'add_new_item'        => __( 'Add New Work', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Work', 'ee' ),
		'update_item'         => __( 'Update Work', 'ee' ),
		'search_items'        => __( 'Search Work', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'label'               => __( 'case_studies', 'ee' ),
		'description'         => __( 'Work', 'ee' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'post-formats' ),
		'taxonomies'          => array( 'type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => 'work',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'			  => array('slug' => 'work', 'with_front' => true),
		'capability_type'     => 'page',
	);
	register_post_type( 'work', $args );
}
// Hook into the 'init' action
add_action( 'init', 'portfolio', 0 );

// Register Portfolio Type Taxonomy
function portfolio_tax() {
	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'ee' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'ee' ),
		'menu_name'                  => __( 'Type', 'ee' ),
		'all_items'                  => __( 'All Types', 'ee' ),
		'parent_item'                => __( 'Parent Type', 'ee' ),
		'parent_item_colon'          => __( 'Parent Type:', 'ee' ),
		'new_item_name'              => __( 'New Type Name', 'ee' ),
		'add_new_item'               => __( 'Add New Type', 'ee' ),
		'edit_item'                  => __( 'Edit Type', 'ee' ),
		'update_item'                => __( 'Update Type', 'ee' ),
		'separate_items_with_commas' => __( 'Separate Types with commas', 'ee' ),
		'search_items'               => __( 'Search Types', 'ee' ),
		'add_or_remove_items'        => __( 'Add or remove Types', 'ee' ),
		'choose_from_most_used'      => __( 'Choose from the most used Types', 'ee' ),
		'not_found'                  => __( 'Not Found', 'ee' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'type', array( 'work' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'portfolio_tax', 0 );

// Register Services Post Type
function services() {
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'Services', 'ee' ),
		'parent_item_colon'   => __( 'Parent Service:', 'ee' ),
		'all_items'           => __( 'All Services', 'ee' ),
		'view_item'           => __( 'View Service', 'ee' ),
		'add_new_item'        => __( 'Add New Service', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Service', 'ee' ),
		'update_item'         => __( 'Update Service', 'ee' ),
		'search_items'        => __( 'Search Services', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'label'               => __( 'services', 'ee' ),
		'description'         => __( 'Services offered', 'ee' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'services', $args );
}
// Hook into the 'init' action
add_action( 'init', 'services', 0 );

// Register Case Studies Post Type
function case_studies() {
	$labels = array(
		'name'                => _x( 'Case Studies', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'Case Studies', 'ee' ),
		'parent_item_colon'   => __( 'Parent Case Study:', 'ee' ),
		'all_items'           => __( 'Case Studies', 'ee' ),
		'view_item'           => __( 'View Case Study', 'ee' ),
		'add_new_item'        => __( 'Add New Case Study', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Case Study', 'ee' ),
		'update_item'         => __( 'Update Case Study', 'ee' ),
		'search_items'        => __( 'Search Case Study', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'label'               => __( 'case_studies', 'ee' ),
		'description'         => __( 'Case Studies', 'ee' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'post-formats' ),
		'taxonomies'          => array( 'cs_type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'case_studies', $args );
}
// Hook into the 'init' action
add_action( 'init', 'case_studies', 0 );

// Register Case Study Type Taxonomy
function case_tax() {
	$labels = array(
		'name'                       => _x( 'Case Study Types', 'Taxonomy General Name', 'ee' ),
		'singular_name'              => _x( 'Case Study Type', 'Taxonomy Singular Name', 'ee' ),
		'menu_name'                  => __( 'Case Study Type', 'ee' ),
		'all_items'                  => __( 'All Case Study Types', 'ee' ),
		'parent_item'                => __( 'Parent Case Study Type', 'ee' ),
		'parent_item_colon'          => __( 'Parent Case Study Type:', 'ee' ),
		'new_item_name'              => __( 'New Case Study Type Name', 'ee' ),
		'add_new_item'               => __( 'Add New Case Study Type', 'ee' ),
		'edit_item'                  => __( 'Edit Case Study Type', 'ee' ),
		'update_item'                => __( 'Update Case Study Type', 'ee' ),
		'separate_items_with_commas' => __( 'Separate Case Study Types with commas', 'ee' ),
		'search_items'               => __( 'Search Case Study Types', 'ee' ),
		'add_or_remove_items'        => __( 'Add or remove Case Study Types', 'ee' ),
		'choose_from_most_used'      => __( 'Choose from the most used Case Study Types', 'ee' ),
		'not_found'                  => __( 'Not Found', 'ee' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'cs_type', array( 'case_studies' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'case_tax', 0 );

// Register Skills Post Type
function skills() {
	$labels = array(
		'name'                => _x( 'Skills', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Skill', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'Skills', 'ee' ),
		'parent_item_colon'   => __( 'Parent Skill:', 'ee' ),
		'all_items'           => __( 'All Skills', 'ee' ),
		'view_item'           => __( 'View Skill', 'ee' ),
		'add_new_item'        => __( 'Add New Skill', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Skill', 'ee' ),
		'update_item'         => __( 'Update Skill', 'ee' ),
		'search_items'        => __( 'Search Skill', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'label'               => __( 'skill', 'ee' ),
		'description'         => __( '88Creates Skillset', 'ee' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'page-attributes' ),
		'taxonomies'          => array(  ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'skill', $args );
}
// Hook into the 'init' action
add_action( 'init', 'skills', 0 );

// Register Timeline Post Type
function timeline() {
	$labels = array(
		'name'                => _x( 'Timelines', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Timeline', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'Timelines', 'ee' ),
		'parent_item_colon'   => __( 'Parent Timeline:', 'ee' ),
		'all_items'           => __( 'Timelines', 'ee' ),
		'view_item'           => __( 'View Timeline', 'ee' ),
		'add_new_item'        => __( 'Add New Timeline', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Timeline', 'ee' ),
		'update_item'         => __( 'Update Timeline', 'ee' ),
		'search_items'        => __( 'Search Timeline', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'label'               => __( 'case_studies', 'ee' ),
		'description'         => __( 'Timelines', 'ee' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'post',
	);
	register_post_type( 'timeline', $args );
}
// Hook into the 'init' action
add_action( 'init', 'timeline', 0 );

// Register People Post Type
function people() {
	$labels = array(
		'name'                => _x( 'People', 'Post Type General Name', 'ee' ),
		'singular_name'       => _x( 'Person', 'Post Type Singular Name', 'ee' ),
		'menu_name'           => __( 'People', 'ee' ),
		'parent_item_colon'   => __( 'Parent Person:', 'ee' ),
		'all_items'           => __( 'People', 'ee' ),
		'view_item'           => __( 'View Person', 'ee' ),
		'add_new_item'        => __( 'Add New Person', 'ee' ),
		'add_new'             => __( 'Add New', 'ee' ),
		'edit_item'           => __( 'Edit Person', 'ee' ),
		'update_item'         => __( 'Update Person', 'ee' ),
		'search_items'        => __( 'Search Person', 'ee' ),
		'not_found'           => __( 'Not found', 'ee' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ee' ),
	);
	$args = array(
		'label'               => __( 'people', 'ee' ),
		'description'         => __( 'People', 'ee' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'people', $args );
}
// Hook into the 'init' action
add_action( 'init', 'people', 0 );

function peoplecase() {
    p2p_register_connection_type( array(
        'name' => 'people_case',
        'from' => 'people',
        'to' => 'case_studies'
    ) );
}
add_action( 'p2p_init', 'peoplecase' );

function servicescase() {
    p2p_register_connection_type( array(
        'name' => 'services_case',
        'from' => 'services',
        'to' => 'case_studies',
        'reciprocal' => true,
    ) );
}
add_action( 'p2p_init', 'servicescase' );

function person_title( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['test_metabox'] = array(
        'id' => 'test_metabox',
        'title' => 'Job Title',
        'pages' => array('people'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Job Title',
                'desc' => '',
                'id' => $prefix . 'title',
                'type' => 'text'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'person_title' );

function year( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['year_metabox'] = array(
        'id' => 'year_box',
        'title' => 'Year',
        'pages' => array('timeline'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Year',
                'desc' => '',
                'id' => $prefix . 'year',
                'type' => 'text'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'year' );

function pageImage( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['image_metabox'] = array(
        'id' => 'bgimage',
        'title' => 'Background',
        'pages' => array('page', 'post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Background Image',
                'desc' => '',
                'id' => $prefix . 'bg',
                'type' => 'file'
            ),
            array(
            	'name' => 'Page Background Colour ',
            	'id'   => $prefix . 'colour',
            	'type' => 'colorpicker',
            	'default'  => '#ffffff',
            ),
            array(
                'name' => 'Dark Background',
                'desc' => '',
                'id' => $prefix . 'dbg',
                'type' => 'checkbox'
            ),
            array(
	            'name' => 'Left Roundel',
	            'desc' => '',
	            'id' => $prefix . 'lr',
	            'type' => 'text'
            ),
            array(
	            'name' => 'Right Roundel',
	            'desc' => '',
	            'id' => $prefix . 'rr',
	            'type' => 'text'
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'pageImage' );

function subhead( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['subhead_metabox'] = array(
        'id' => 'subhead',
        'title' => 'Extras',
        'pages' => array('services'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Subheading',
                'desc' => '',
                'id' => $prefix . 'sh',
                'type' => 'text'
            ),
            array(
                'name' => 'Button text',
                'desc' => '',
                'id' => $prefix . 'bt',
                'type' => 'text'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'subhead' );

function case_details( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['subhead_metabox'] = array(
        'id' => 'caseDetails',
        'title' => 'Case Study Details',
        'pages' => array('case_studies'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Quote',
                'desc' => '',
                'id' => $prefix . 'quote',
                'type' => 'text'
            ),
            array(
                'name' => 'Quote Author',
                'desc' => '',
                'id' => $prefix . 'author',
                'type' => 'text'
            ),
            array(
                'name' => 'Key Facts',
                'desc' => '',
                'id' => $prefix . 'key',
                'type' => 'wysiwyg'
            ),
			array(
			    'name' => 'Key Facts Colour Picker',
			    'id'   => $prefix . 'keycolour',
			    'type' => 'colorpicker',
			    'default'  => '#e6c680'
			),
            array(
                'name' => 'Solution',
                'desc' => '',
                'id' => $prefix . 'solution',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Background Image',
                'desc' => '',
                'id' => $prefix . 'bg',
                'type' => 'file'
            ),
            array(
            	'name' => 'Page Background Colour ',
            	'id'   => $prefix . 'colour',
            	'type' => 'colorpicker',
            	'default'  => '#ffffff',
            ),
            array(
                'name' => 'Dark Background',
                'desc' => '',
                'id' => $prefix . 'dbg',
                'type' => 'checkbox'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'case_details' );

function workStuff( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['workStuff_metabox'] = array(
        'id' => 'workStuff',
        'title' => 'Video',
        'pages' => array('work'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Display Title',
                'desc' => 'Enter a title to show on the work display page.',
                'id' => $prefix . 'title',
                'type' => 'text'
            ),
            array(
                'name' => 'Video',
                'desc' => 'Enter a YouTube, Vimeo, Twitter, or Instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
                'id' => $prefix . 'v',
                'type' => 'oembed'
            ),
            array(
                'name' => 'Background Image',
                'desc' => '',
                'id' => $prefix . 'bg',
                'type' => 'file'
            ),
            array(
                'name' => 'Dark Background',
                'desc' => '',
                'id' => $prefix . 'dbg',
                'type' => 'checkbox'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'workStuff' );

function skillset( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['video_metabox'] = array(
        'id' => 'extras',
        'title' => 'Extras',
        'pages' => array('skill', 'engager'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Background Image',
                'desc' => '',
                'id' => $prefix . 'bg',
                'type' => 'file'
            ),
            array(
                'name' => 'Dark Background',
                'desc' => '',
                'id' => $prefix . 'dbg',
                'type' => 'checkbox'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'skillset' );

add_action( 'init', 'init_meta', 9999 );
function init_meta() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta/init.php' );
    }
}

add_filter( 'post_class', 'work_post_class', 10, 3 );
if( !function_exists( 'work_post_class' ) ) {
	function work_post_class( $classes, $class, $ID ) {
		$taxonomy = 'type';
		$terms = get_the_terms( (int) $ID, $taxonomy );
		if( !empty( $terms ) ) {
			foreach( (array) $terms as $order => $term ) {
				if( !in_array( $term->slug, $classes ) ) {
					$classes[] = $term->slug;
				}
			}
		}
		return $classes;
	}
}

add_filter( 'post_class', 'case_post_class', 10, 3 );
if( !function_exists( 'case_post_class' ) ) {
	function case_post_class( $classes, $class, $ID ) {
		$taxonomy = 'cs_type';
		$terms = get_the_terms( (int) $ID, $taxonomy );
		if( !empty( $terms ) ) {
			foreach( (array) $terms as $order => $term ) {
				if( !in_array( $term->slug, $classes ) ) {
					$classes[] = $term->slug;
				}
			}
		}
		return $classes;
	}
}

add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);

function current_type_nav_class($classes, $item) {
    // Get post_type for this post
    $post_type = get_query_var('post_type');

    // Go to Menus and add a menu class named: {custom-post-type}-menu-item
    // This adds a 'current_page_parent' class to the parent menu item
    if( in_array( $post_type.'-menu-item', $classes ) )
        array_push($classes, 'current_page_parent');

    return $classes;
}
add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');

function wpclean_add_metabox_menu_posttype_archive() {
add_meta_box('wpclean-metabox-nav-menu-posttype', 'Custom Post Type Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}

function wpclean_metabox_menu_posttype_archive() {
	$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');
	if ($post_types) :
	    $items = array();
	    $loop_index = 999999;
	    foreach ($post_types as $post_type) {
	        $item = new stdClass();
	        $loop_index++;
	        $item->object_id = $loop_index;
	        $item->db_id = 0;
	        $item->object = 'post_type_' . $post_type->query_var;
	        $item->menu_item_parent = 0;
	        $item->type = 'custom';
	        $item->title = $post_type->labels->name;
	        $item->url = get_post_type_archive_link($post_type->query_var);
	        $item->target = '';
	        $item->attr_title = '';
	        $item->classes = array();
	        $item->xfn = '';
	        $items[] = $item;
	    }
	    $walker = new Walker_Nav_Menu_Checklist(array());
	    echo '<div id="posttype-archive" class="posttypediv">';
	    echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
	    echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
	    echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
	    echo '</ul>';
	    echo '</div>';
	    echo '</div>';
	    echo '<p class="button-controls">';
	    echo '<span class="add-to-menu">';
	    echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'andromedamedia') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
	    echo '<span class="spinner"></span>';
	    echo '</span>';
	    echo '</p>';
	endif;
}

add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );

function my_add_cpt_to_dashboard() {
	$showTaxonomies = 1;
	if ($showTaxonomies) {
		$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
		foreach ( $taxonomies as $taxonomy ) {
			$num_terms  = wp_count_terms( $taxonomy->name );
			$num = number_format_i18n( $num_terms );
			$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
			$associated_post_type = $taxonomy->object_type;
			if ( current_user_can( 'manage_categories' ) ) {
			  $output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
			}
			echo '<li class="taxonomy-count">' . $output . ' </li>';
		}
	}
	// Custom post types counts
	$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
	foreach ( $post_types as $post_type ) {
		if($post_type->show_in_menu==false) {
			continue;
		}
		$num_posts = wp_count_posts( $post_type->name );
		$num = number_format_i18n( $num_posts->publish );
		$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
		if ( current_user_can( 'edit_posts' ) ) {
			$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
		}
		echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
	}
}

function add_menu_icons_styles(){
	echo '<style>
	#adminmenu #menu-posts-work div.wp-menu-image:before, #dashboard_right_now .work-count a:before {
		content: "\f183";
	}
	#adminmenu #menu-posts-services div.wp-menu-image:before, #dashboard_right_now .services-count a:before {
		content: "\f339";
	}
	#adminmenu #menu-posts-case_studies div.wp-menu-image:before, #dashboard_right_now .case_studies-count a:before {
		content: "\f509";
	}
	#adminmenu #menu-posts-timeline div.wp-menu-image:before, #dashboard_right_now .timeline-count a:before {
	    content: "\f163";
	}
	#dashboard_right_now .feedback-count a:before {
	    content: "\f175";
	}
	#dashboard_right_now .taxonomy-count a:before {
	    content: "\f325";
	}
	#adminmenu #menu-posts-people div.wp-menu-image:before, #dashboard_right_now .people-count a:before {
	    content: "\f307";
	}
	#adminmenu #menu-posts-skill div.wp-menu-image:before, #dashboard_right_now .skill-count a:before {
		content: "\f313";
	}
	#adminmenu #menu-posts-engager div.wp-menu-image:before, #dashboard_right_now .engager-count a:before {
		content: "\f111";
	}
	</style>';
}
add_action( 'admin_head', 'add_menu_icons_styles' );

function remove_footer_admin () {
	echo '&copy; '. date('Y') . ' 88Create. Site built by <a href="http://www.prydonian.digital">Mark Duwe</a>.';
	echo '<style>#wp-admin-bar-updates,.update-plugins{display:none !important;}.category-adder {display: none !important;}</style>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

$wpdb->query( "DELETE FROM $wpdb->posts WHERE post_type = 'revision'" );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

function twtreplace($content) {
	$twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);
	return $twtreplace;
}

add_filter('the_content', 'twtreplace');   
add_filter('comment_text', 'twtreplace');

function my_login_logo() { ?>
    <style type="text/css">
		@font-face {
			font-family: '88ROb';
			src: url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regularoblique-webfont.eot');
			src: url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regularoblique-webfont.eot?#iefix') format('embedded-opentype'),
					 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regularoblique-webfont.woff2') format('woff2'),
					 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regularoblique-webfont.woff') format('woff'),
					 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regularoblique-webfont.ttf') format('truetype'),
					 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regularoblique-webfont.svg#88ROb') format('svg');
			font-weight: normal;
			font-style: normal;
		}
		@font-face {
			font-family: '88BOb';
			src:url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-boldoblique-webfont.eot');
			src:url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-boldoblique-webfont.eot?#iefix') format('embedded-opentype'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-boldoblique-webfont.woff2') format('woff2'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-boldoblique-webfont.woff') format('woff'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-boldoblique-webfont.ttf') format('truetype'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-boldoblique-webfont.svg#88BOb') format('svg');
			font-weight: normal;
			font-style: normal;
		}
		@font-face {
			font-family: '88B';
			src:url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-bold-webfont.eot');
			src:url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-bold-webfont.eot?#iefix') format('embedded-opentype'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-bold-webfont.woff2') format('woff2'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-bold-webfont.woff') format('woff'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-bold-webfont.ttf') format('truetype'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-bold-webfont.svg#88B') format('svg');
			font-weight: normal;
			font-style: normal;
		}
		@font-face {
			font-family: '88R';
			src:url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regular-webfont.eot');
			src:url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regular-webfont.eot?#iefix') format('embedded-opentype'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regular-webfont.woff2') format('woff2'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regular-webfont.woff') format('woff'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regular-webfont.ttf') format('truetype'),
				 url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/heroiccondensed-regular-webfont.svg#88R') format('svg');
			font-weight: normal;
			font-style: normal;
		}
        body.login  {
	    	background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/acorns.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center top;
			background-attachment: fixed;
			font-family: '88R', sans-serif;
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;	    	
	    }
	    .login label, #login_error {
		    font-size: 1.8rem;
			font-family: '88ROb', sans-serif;
			text-transform: uppercase;
			color: #000;
			letter-spacing: 1px;
	    }
	    #login_error, .message {
		    font-size: 1.4rem;
		    line-height: 1.2;
	    }
	    .login form .forgetmenot label {
		    font-size: 1.4rem;
			font-family: '88ROb', sans-serif;
			text-transform: uppercase;
			color: #000;
			letter-spacing: 1px;
	    }
	    .login .message {
			border-left: 4px solid #00ad5f;
	    }
	    .login #login_error {
		    border-left: 4px solid #ef4733;
	    }
	    .login form .input, .wp-core-ui .button, .login #nav, .login #backtoblog {
			font-family: '88R', sans-serif;
			font-size: 1.4rem;
		}
		.login form .input {
			border-radius: 10px;
			border: 1px solid #fff;
			padding: 5px;
			background: #fff;
			background: rgba(255,255,255,0.9);
			width: 100%;
		}
		.login #nav a, .login #backtoblog a {
			color: #fff;
		}
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png);
            padding-bottom: 30px;
		    background-position: center top;
		    background-repeat: no-repeat;
		    background-size: 100% auto;
		    height: 88px;
		    line-height: 1;
		    margin: 0 auto 25px;
		    outline: 0 none;
		    overflow: hidden;
		    padding: 0;
		    text-decoration: none;
		    text-indent: -9999px;
		    width: 146px;
		}
		.login form {
			background: #93afba;
			background: rgba(147,175,186,0.8);
			border-radius: 10px;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function tweakjp_custom_twitter_site( $og_tags ) {
    $og_tags['twitter:site'] = '@88Creates';
    $og_tags['twitter:card'] = 'summary';
    return $og_tags;
}
add_filter( 'jetpack_open_graph_tags', 'tweakjp_custom_twitter_site', 11 );