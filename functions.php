<?php

/**
 *  Enqueue scripts and styles.
 */
function wgu_theme_child_scripts()
{
    wp_enqueue_style( 'wgu-theme-stylesheet', get_stylesheet_uri(), array( 'hello-elementor' ), wp_get_theme());
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