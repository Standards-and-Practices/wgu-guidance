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

while (have_posts()) : the_post();

    $principles = get_the_terms(get_the_ID(), 'principles');
    $domains = get_the_terms(get_the_ID(), 'domains');
    $domains_css = join(' ', wp_list_pluck($domains, 'slug'));

    if (isset($domains[0])) {
        $meta = get_term_meta($domains[0]->term_id);
        $active_icon = wp_get_attachment_image_src($meta["active_icon"][0], 'full')[0];
        $color = $meta["color"][0];
        $faded_color = $meta["faded_color"][0];
    }
?>
    <div class="guidance-wrapper">
        <div class="answer-mark">
            <svg width="39" height="251" viewBox="0 0 39 251" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M37 2C15.2759 1.9997 2 14.315 2 35.8559C2 57.3968 20.1034 68.5022 37 68.5022" stroke="<?php echo $color; ?>" stroke-width="4" stroke-linecap="square" />
                <line x1="37" y1="72.5022" x2="37" y2="136.502" stroke="<?php echo $color; ?>" stroke-width="4" stroke-linecap="square" />
                <line x1="37" y1="140.502" x2="37" y2="200.502" stroke="<?php echo $faded_color; ?>" stroke-width="4" stroke-linecap="square" stroke-dasharray="8 12" />
                <line x1="37" y1="204.502" x2="37" y2="248.502" stroke="<?php echo $faded_color; ?>" stroke-width="4" stroke-linecap="square" stroke-dasharray="8 12" />
            </svg>

            <img src="<?php echo $active_icon ?>" class="domain-button" />
        </div>
        <div class="the-domains <?php echo $domains_css; ?>">
            <?php
            foreach ($domains as $domain) {
                echo $domain->name;
            }
            ?>
        </div>
        <div class="the-title"><?php the_shortlink(get_the_title()); ?></div>
        <div class="the-principles <?php echo $domains_css; ?>">
            <svg width="8" height="9" viewBox="0 0 8 9" fill='<?php echo $color; ?>' xmlns="http://www.w3.org/2000/svg">
                <path d="M7.80465 0.773998C7.79537 0.680949 7.72095 0.60659 7.62789 0.597238L4.27905 0.401855C4.22325 0.401855 4.17672 0.420478 4.13954 0.457659L0.0558202 4.54138C-0.0186067 4.61581 -0.0186067 4.72741 0.0558202 4.80185L3.60001 8.34604C3.67443 8.42046 3.78604 8.42046 3.86047 8.34604L7.9442 4.26231C7.98138 4.22513 8 4.17861 8 4.1228L7.80462 0.773965L7.80465 0.773998ZM6.81862 2.35538C6.60468 2.56931 6.26045 2.56931 6.04653 2.35538C5.83259 2.14144 5.83259 1.7972 6.04653 1.58328C6.26046 1.36935 6.6047 1.36935 6.81862 1.58328C7.03256 1.79722 7.03256 2.14146 6.81862 2.35538Z" />
            </svg>
            <?php
            foreach ($principles as $principle) {
                echo "<span class='principle'>$principle->name</span>";
            }
            ?>
        </div>
        <div class="the-guidance">
            <?php the_content(); ?>
        </div>

    </div>
<?php
endwhile;

get_footer();