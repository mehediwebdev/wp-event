<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Enqueue' ) ) {
    class WPH_Event_Enqueue{

        public function __construct(){
        //add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 999 );
        add_action('admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );
        }

        public function register_admin_scripts(){
			//global $typenow;
			//if( $typenow == 'wph-event'){
			 wp_enqueue_style( 'wph-event-main-css', WPH_EVENT_URL . 'assets/admin/css/style.css' );
             wp_enqueue_style( 'wph-event-js-ui-css', WPH_EVENT_URL . 'assets/admin/vendor/jquery-ui.css' );
             wp_enqueue_script( 'wph-event-main-js', WPH_EVENT_URL . 'assets/admin/js/main.js' );
			//}

        
            wp_enqueue_script( 'wph-event-jsui-js', WPH_EVENT_URL . 'assets/admin/vendor/jquery-ui.js' );
            wp_enqueue_script( 'wph-event-calender-js', WPH_EVENT_URL . 'assets/admin/vendor/index.global.js' );
    }
}

}
