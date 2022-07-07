<?php
/*
Template Name: Search Page
*/

if (!defined('ABSPATH')) {
  exit(); // Exit if accessed directly.
}

// Get WP Header
get_header();

global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

var_dump($search);

get_footer();