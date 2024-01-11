<?php

function efas_element_shortcode($atts, $content = null) {
    ob_start();
    get_template_part("template-parts/elements/" . $atts['element']);
    return ob_get_clean();
}

add_shortcode('efas-element', 'efas_element_shortcode');

/**
 * Return Breadcrump for current page
 */

function efas_get_menu_item( $field, $object_id, $items ){
    foreach( $items as $item ){
        if( $item->$field == $object_id ) return $item;
    }
    return false;
}

function the_breadcrumbs( $args = array() ){
    // get menu items by menu id, slug, name, or object
    $args = wp_parse_args($args, array(
        "menu" => "primary_menu",
        "text-color" => "text-black",
        "opacity" => "opacity-60"
    ));
    $items = get_nav_menu_items_by_location( $args['menu'] );
    if( false === $items ){
        return;
    }
    // get the menu item for the current page
    $item = efas_get_menu_item( 'object_id', get_queried_object_id(), $items );
    if( false === $item ){
        return;
    }
    // start an array of objects for the crumbs
    $menu_item_objects = array( $item );
    // loop over menu items to get the menu item parents
    while( 0 != $item->menu_item_parent ){
        $item = efas_get_menu_item( 'ID', $item->menu_item_parent, $items );
        array_unshift( $menu_item_objects, $item );
    }
    // output crumbs
    $crumbs = array();
    $link = '<a href="%s">%s</a>';
    $crumbs[] = sprintf( $link, home_url(), get_bloginfo('name') );
    $i = 0;
    foreach( $menu_item_objects as $menu_item ){
        $page_id = $menu_item->object_id;
        $post = get_post($page_id);
        $title = (get_field("breadcrumb_title", $page_id)) ? get_field("breadcrumb_title", $page_id) : $menu_item->title;
        if ($i == count($menu_item_objects) - 1) {
            $link = '<span>%s</span>';
            $crumbs[] = sprintf( $link, $title );
            continue;
        }
        if (( '#' == $menu_item->url ) || (!$menu_item->menu_item_parent)) {
            $link = '<span>%s</span>';
            $crumbs[] = sprintf( $link, $title );
        } else {
            $link = '<a href="%s">%s</a>';
            $crumbs[] = sprintf( $link, $menu_item->url, $title );
        }
        $i++;
    }
    $crumbs = join( '<i class="icofont-rounded-right mx-1"></i>', $crumbs );
    $classes = join( ' ', array( $args['text-color'], $args['opacity'] ) );
    $container = <<<EOD
    <div class="efas-breadcrumbs efas-container alignwide text-sm mt-6 md:mt-12 {$classes}">%s</div>
    EOD;
    echo sprintf( $container, $crumbs );
}

/**
 * Return Subitems of page in menu by location
 *
 * $args = array(
 * 'menu' => 'primary_menu',
 * 'parent' => get_queried_object()->ID
 * );
 */

function get_nav_subitems_by_location($args = array())
{
    $args = wp_parse_args($args, array(
        "menu" => "primary_menu",
        "parent" => get_queried_object()->ID
    ));
    $items = get_nav_menu_items_by_location($args['menu']);
    if (false === $items) {
        return;
    }
    $parent = efas_get_menu_item('object_id', $args["parent"], $items);
    if (false === $parent) {
        return;
    }
    $parentID = efas_get_menu_item( 'object_id', $args["parent"], $items )->ID;
    $subitems = array();
    foreach ($items as $item) {
        if ($item->menu_item_parent == $parentID) {
            $subitems[] = $item;
        }
    }
    return $subitems;
}

/**
 * Register custom block styles
 *
 * @return void
 */

function efas_register_block_styles()
{
    register_block_style(
        'core/heading',
        array(
            'name'         => 'boxed-red',
            'label'        => __( 'Boxed Text Red', 'efas' ),
            'inline_style' => "
            .is-style-boxed-red span {
                background-color: var(--wp--preset--color--base);
                margin-left: 0.16em;
                color: white;
                -webkit-box-shadow: 0.16em 0 0 var(--wp--preset--color--base) -0.16em 0 0 var(--wp--preset--color--base);
                box-shadow: 0.16em 0 0 var(--wp--preset--color--base) , -0.16em 0 0 var(--wp--preset--color--base);
                -webkit-box-decoration-break: clone;
                -moz-box-decoration-break: clone;
                box-decoration-break: clone;
                line-height: 1em;
                display: inline;
                -webkit-hyphens: auto;
            }",
        )
    );

    register_block_style(
        'core/heading',
        array(
            'name'         => 'boxed-white',
            'label'        => __( 'Boxed Text White', 'efas' ),
            'inline_style' => "
            .is-style-boxed-white span {
                background-color: white;
                margin-left: 0.16em;
                color: black;
                -webkit-box-shadow: 0.16em 0 0 white -0.16em 0 0 white;
                box-shadow: 0.16em 0 0 white , -0.16em 0 0 white;
                -webkit-box-decoration-break: clone;
                -moz-box-decoration-break: clone;
                box-decoration-break: clone;
                line-height: 1em;
                display: inline;
                -webkit-hyphens: auto;
            }",
        )
    );

    register_block_style(
        'core/paragraph',
        array(
            'name'         => 'para-boxed-white',
            'label'        => __( 'Boxed Text White', 'efas' ),
            'inline_style' => "
            .is-style-para-boxed-white {
                background-image: linear-gradient(90deg,#fff 0,#fff);
                -webkit-box-decoration-break: clone;
                box-decoration-break: clone;
                box-shadow: 0.075em 0 0 #fff, -0.075em 0 0 #fff;
            }",
        )
    );
}

add_action('init', 'efas_register_block_styles');

add_filter('render_block', function ($blockContent, $block) {

    if ($block['blockName'] !== 'core/heading') {
        return $blockContent;
    }

    $pattern = '/(<h[^>]*>)(.*)(<\/h[1-7]{1}>)/i';
    $replacement = '$1<span>$2</span>$3';
    return preg_replace($pattern, $replacement, $blockContent);

}, 10, 2);


/**
 * Filter the entire content for demovox form shortcode and redirect if success page language mismatch
 *
 * @return $content or redirect
 *
 * @param string $content
 */

function efas_filter_content($content)
{
    if (str_contains($content, '[demovox_form]') && isset($_GET["sign"])) {
        global $wpdb;
        $query = "SELECT * FROM {$wpdb->prefix}demovox_signatures WHERE guid = \"" . $_GET["sign"] . "\"";
        $result = $GLOBALS['wpdb']->get_results($query);
        $ID = get_the_ID();
        $current_language = pll_current_language();
        $language = $result[0]->language;
        if ($current_language != $language) {
            $target = get_permalink(pll_get_post($ID, $language)) . "?sign=" . $_GET["sign"];
            wp_redirect($target);
            exit;
        }
    } else {
        return $content;
    }
    return $content;
}
add_filter('the_content', 'efas_filter_content');