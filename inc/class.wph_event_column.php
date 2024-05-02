<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Column' ) ) {
    class WPH_Event_Column{
        public function __construct(){
            add_filter( 'manage_wph-event_posts_columns', [ $this, 'remove_default_date_column' ]);
            add_filter('manage_wph-event_posts_columns', [ $this, 'add_event_date_column' ] );
          
        }

        function remove_default_date_column( $columns ) {
            unset($columns['date']);
            return $columns;
            }

        function add_event_date_column( $columns ) {
            $columns['event_date'] = __( 'Event Date', 'text_domain' );
            return $columns;
            }
    }
}


