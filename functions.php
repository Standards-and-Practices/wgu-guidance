<?php

/**
 *  Enqueue scripts and styles.
 */
function wgu_theme_child_scripts()
{
    wp_enqueue_style( 'wgu-theme-stylesheet', get_stylesheet_uri(), array( 'hello-elementor' ), wp_get_theme());
    wp_enqueue_style( 'elementor-frontend-css', plugins_url('/elementor/assets/css/frontend.min.css'), array( 'hello-elementor' ), wp_get_theme());
} 
add_action('wp_enqueue_scripts', 'wgu_theme_child_scripts');


/**
 *  Add category label as color
 */
if (!function_exists('get_category_label')) {

    function get_category_label($category)
    {
        $color = get_field("color", "category_$category->cat_ID");
        return "<span class='category' style='color: rgba(" . implode(',', $color) . ")'>$category->name</span>";
    }
}

/**
 *  Fix facet wp collapse styling
 */
add_filter( 'facetwp_assets', function( $assets ) {
    FWP()->display->json['expand'] = '<span class="facet-expand"></span>';
    FWP()->display->json['collapse'] = '<span class="facet-collapse"></span>';
    return $assets;
});

function get_domain_color ($data) {  
    
    $color = '#000000';
    $domains = get_the_terms($data, 'domains');

    if (isset($domains[0])) {
        $meta = get_term_meta($domains[0]->term_id);
        $color = $meta["color"][0];
    }

    return $color;
 }

 function get_domain_icon ($data) {  
    
    $icon = get_stylesheet_directory_uri("images/all.svg");
    $domains = get_the_terms($data, 'domains');

    if (isset($domains[0])) {
        $meta = get_term_meta($domains[0]->term_id);
        $icon = wp_get_attachment_image_url($meta["active_icon"][0]);
    }

    return $icon;
 }

 function get_domain_inactive_icon ($data) {  
    
    $icon = get_stylesheet_directory_uri("images/all.svg");
    $domains = get_the_terms($data, 'domains');

    if (isset($domains[0])) {
        $meta = get_term_meta($domains[0]->term_id);
        $icon = wp_get_attachment_image_url($meta["inactive_icon"][0]);

    }

    return $icon;
 }