<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Column' ) ) {
    class WPH_Event_Column{
        public function __construct(){
            add_filter( 'manage_wph-event_posts_columns', [ $this, 'remove_default_date_column' ]);
            add_filter('manage_wph-event_posts_columns', [ $this, 'add_event_date_column' ] );
            add_action('manage_wph-event_posts_custom_column', array($this, 'display_event_date_column'), 10, 2);
            add_filter('manage_edit-wph-event_sortable_columns', [$this, 'set_custom_wph_event_sortable_columns'] );          
          
        }

        function remove_default_date_column( $columns ) {
            unset($columns['date']);
            return $columns;
            }

        function add_event_date_column( $columns ) {
            $columns['event_date'] = __( 'Event Date', 'text_domain' );
            return $columns;
            }

            public function display_event_date_column($column, $post_id) {
                if ($column === 'event_date') {
                    $views = get_post_meta($post_id, 'datepicker', true);
                    echo esc_html($views ? $views : 0);                  
                }
             }


             function set_custom_wph_event_sortable_columns($columns) {
                $columns['event_date'] = 'event_date';
                return $columns;
                }
    }
}


