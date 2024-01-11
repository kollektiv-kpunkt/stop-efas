<?php
function efas_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_editor_style('gutenberg/fixes.css' );

    // register_nav_menus( array(
    //     'primary_menu' => __( 'Primary Menu', 'efas' ),
    //     'footer_menu'  => __( 'Footer Menu', 'efas' ),
    //     "some_menu" => __("Social Media Menu", "efas")
    // ) );

    $textdomain = load_theme_textdomain( 'efas', get_template_directory() . '/languages' );
    if (!$textdomain) {
        add_action( 'admin_notices', function() {
            echo '<div class="error"><p>' . __( 'Error loading textdomain for theme "efas": ' . get_locale() . '.mo missing', 'efas' ) . '</p></div>';
        });
    }

}

add_action( 'after_setup_theme', 'efas_theme_support' );

function get_nav_menu_items_by_location( $location, $args = [] ) {

    // Get all locations
    $locations = get_nav_menu_locations();

    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );

    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );

    // Return menu post objects
    return $menu_items;
}


include_once(__DIR__ ."/inc.polylang_nav_menu.php");