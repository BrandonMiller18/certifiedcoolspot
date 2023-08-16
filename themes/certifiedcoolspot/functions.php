<?php

function load_stylesheets() {
    wp_register_style('stylesheet', get_template_directory_uri() . '/dist/app.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


function load_javascript() {
    wp_register_script('custom', get_template_directory_uri() . '/dist/app.js', 'jquery', 1, true);
    wp_enqueue_script('custom');

}
add_action('wp_enqueue_scripts', 'load_javascript');



add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('title-tag');
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
add_theme_support( 'automatic-feed-links' );


register_nav_menus(
    array(
        'top-menu' => 'Top Menu',
    )
);





function cool_spots_cpt() {

    $args = array(
        'labels' => array(
            'name' => 'Spots',
            'singular_name' => 'Spot',
        ),
        'description' => 'Make a post about a certified cool spot!',
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
    );

    register_post_type('spots', $args);

};
add_action('init', 'cool_spots_cpt');



function cool_spots_locations() {

    $args = array(
        'labels' => array(
            'name' => 'Locations',
            'singular_name' => 'Location',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'hierarchical' => true, 
        ),
    );

    register_taxonomy('locations', array('spots'), $args);

};
add_action('init', 'cool_spots_locations');


function cool_spots_certification() {

    $args = array(
        'labels' => array(
            'name' => 'Certifications',
            'singular_name' => 'Certification',
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'hierarchical' => true, 
        ),
    );

    register_taxonomy('certification', array('spots'), $args);

};
add_action('init', 'cool_spots_certification');



// get ACF spot fields
function get_acf_fields () {
    $website = get_field('website');
    $address = get_field('address');
    $year_founded = get_field('year_founded');
    $certified_since = get_field('certified_since');

    $data = array(
        'website'        => $website,
        'address'        => $address,
        'year_founded'   => $year_founded,
        'certified_since' => $certified_since,
    );

    return $data;

};

?>