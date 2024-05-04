<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Dashboard' ) ) {
    class WPH_Event_Dashboard
    {
        public function __construct(){
            add_action('admin_menu', [ $this, 'wph_event_add_dashboard_page'] );
        }



      public  function wph_event_add_dashboard_page() {
            // Add the submenu page under the custom post type menu
            add_submenu_page(
                'edit.php?post_type=wph-event', // Parent menu slug (URL)
                'Event Dashboard',     // Page title
                'Event Dashboard',     // Menu title
                'manage_options',      // Capability required to access the page
                'wph_event_dashboard', // Menu slug
                array($this, 'wph_event_dashboard_page') // Function to display the page
            );
        }





       public function wph_event_dashboard_page() {
        require_once( WPH_EVENT_PATH . 'views/wp-events-dashboard.php' );
        }

    }
}


