<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css','astra-contact-form-7' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// HOOK rechercher sur google nav_menu_add_search pour cette parti

add_filter('wp_nav_menu_items', 'personnaliser_menu_si_connecte', 10, 2);

function personnaliser_menu_si_connecte($items, $args) {
    if ($args->theme_location == 'primary' && is_user_logged_in()) {
        // Utilisateur connecté, ajouter le lien "Admin" au menu
        $admin_link = '<li href="http://planty.local/wp-admin/" class="menu-link menu-item menu-item-type-post_type menu-item-object-page menu-item-121">Admin</a>';
        
        // Convertir la chaîne $items en un tableau d'éléments
        $menu_items = explode('</li>', $items);
        
        // Insérer le lien "Admin" en deuxième position (l'indice 1 dans le tableau)
        array_splice($menu_items, 1, 0, $admin_link);
        
        // Rejoindre à nouveau les éléments en une chaîne
        $items = implode('</li>', $menu_items);
    }
    
    return $items;
}

// END ENQUEUE PARENT ACTION