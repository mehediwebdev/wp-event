<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Cpt' ) ) {
    class WPH_Event_Cpt
    {
        public function __construct(){
            add_action('init', [$this, 'create_post_type']);
          //  add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        }

        public function create_post_type(){
            register_post_type(
                'wph-event',
                array(
                    'label' => esc_html__( 'Event', 'mv-slider' ),
                    'description' => esc_html__( 'Sliders', 'mv-slider' ),
                    'labels' => array(
                        'name' => esc_html__( 'Events', 'mv-slider' ),
                        'singular_name' => __( 'Event', 'mv-slider' ),
                        'all_items'           => esc_html__( 'All Events', 'wph-event' ),
                        'add_new'             => esc_html__( 'Add New Event', 'wph-event' ),
                        'edit_item'           => esc_html__( 'Edit Event', 'wph-event' ),
                        'featured_image'      => esc_html__( 'Event image', 'wph-event' ),
                        'set_featured_image'  => esc_html__( 'Set Event image', 'wph-event' ),
                       
                    ),
                    'public' => true,	
                  //   'rewrite'     => array( 'slug' => '' ),
                    'supports' => array('title', 'editor', 'thumbnail'),
                    'hierarchical'        => false,
                    'show_ui'             => true,
                    'show_in_menu'        => true,                 
                    'menu_position'       => 5,
                    'show_in_admin_bar'   => true,
                    'show_in_nav_menus'   => true,
                    'can_export'          => true,
                    'has_archive'         => false,
                    'exclude_from_search' => false,
                    'publicly_queryable'  => true,
                    'show_in_rest'        => true,
                    'menu_icon'           => 'dashicons-format-gallery',
                )
            );
         }


        
    }
}


