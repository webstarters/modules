<?php

class Modul {

    /**
     *
     */
    function __construct() {
        add_action('init', [$this, 'register_modul_post_type'], 0);
    }

    /**
     *
     */
    function register_modul_post_type() {
        $labels = [
            'name'                => _x('Moduler', 'Post Type General Name', 'webstarters'),
            'singular_name'       => _x('Modul', 'Post Type Singular Name', 'webstarters'),
            'menu_name'           => __('Moduler', 'webstarters'),
            'parent_item_colon'   => __('Forældre moduler', 'webstarters'),
            'all_items'           => __('Alle moduler', 'webstarters'),
            'view_item'           => __('Se modul', 'webstarters'),
            'add_new_item'        => __('Tilføj nyt modul', 'webstarters'),
            'add_new'             => __('Tilføj nyt modul', 'webstarters'),
            'edit_item'           => __('Redigere modul', 'webstarters'),
            'update_item'         => __('Opdatere modul', 'webstarters'),
            'search_items'        => __('Søg efter modul', 'webstarters'),
            'not_found'           => __('Ikke fundet', 'webstarters'),
            'not_found_in_trash'  => __('Ikke fundet i papirskurven', 'webstarters'),
        ];

        // Set other options for Custom Post Type
        $args = [
            'label'               => __('moduler', 'webstarters'),
            'description'         => __('Byg moduler til brug på sider', 'webstarters'),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => ['title', 'editor', 'revisions', 'custom-fields'],
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies'          => [],
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => false,
            'capability_type'     => 'page',
        ];

        // Registering your Custom Post Type
        register_post_type('modul', $args);
    }
}

?>