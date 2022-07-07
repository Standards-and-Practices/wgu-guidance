<?php
/*
Template Name: Search 
*/

if (!defined('ABSPATH')) {
  exit(); // Exit if accessed directly.
}

// Get WP Header
get_header();

$search_args = array( 
  'post_type' => 'standards',
  'post_status' => 'publish',
  's' => 'Design'
);

$search = new WP_Query( $search_args );

echo '<pre>';
var_dump($search);
echo '</pre>';

get_footer();