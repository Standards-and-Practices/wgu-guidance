<?php

/**
 * Theme Coder Child functions and definitions
 *
 * @package Theme Coder
 *
 */

/**
 *  Enqueue scripts and styles.
 */
function wgu_theme_child_scripts()
{
    wp_enqueue_style( 'wgu-theme-stylesheet', get_stylesheet_uri(), array( 'hello-elementor' ), wp_get_theme());
    wp_enqueue_scripts( 'wgu-guidance-results-scripts', get_stylesheet_directory_uri() . '/results/dist/assets/index.js');
    wp_enqueue_style( 'wgu-guidance-results-styles', get_stylesheet_directory_uri() . '/results/dist/assets/index.css');
} 
add_action('wp_enqueue_scripts', 'wgu_theme_child_scripts');

/* You can add your own php functions and code snippets below */
if (!function_exists('get_category_label')) {

    function get_category_label($category)
    {
        $color = get_field("color", "category_$category->cat_ID");
        return "<span class='category' style='color: rgba(" . implode(',', $color) . ")'>$category->name</span>";
    }
}
