<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));

}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


add_action( 'after_setup_theme', 'register_primary_menu' );

function register_primary_menu() {
	register_nav_menu( 'primary', __( 'Menu principal', 'planty' ) );
}


add_action( 'after_setup_theme', 'register_footer_menu' );

function register_footer_menu() {
	register_nav_menu( 'footer', __( 'Footer menu', 'planty' ) );
}


function my_custom_menu_item($items, $args)
{
    if(is_user_logged_in() && $args->theme_location == 'primary')
    {
        $user=wp_get_current_user();
        $name=$user->display_name; // or user_login , user_firstname, user_lastname
        $items .= '<li><a class="admin" href="'. site_url('wp-login.php') .'">Admin</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. site_url('wp-login.php') .'"></a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'my_custom_menu_item', 10, 2);
