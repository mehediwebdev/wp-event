<?php
/*
 * Plugin Name:       WPH Event
 * Plugin URI:        
 * Description:       WPH Event is a WordPress plugin where shown the database CRUD.
 * Version:           1.0.0
 * Requires at least: 6.2
 * Requires PHP:      7.2
 * Author:            Mehedi Hasan
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       wph-event
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('WPH_Event')) {
    class WPH_Event
    {

        public function define_constants()
        {
            define( 'WPH_EVENT_PATH', plugin_dir_path(__FILE__) );
            define( 'WPH_EVENT_URL', plugin_dir_url(__FILE__) );
            define( 'WPH_EVENT_VERSION', '1.0.0');
          
         }

        public function __construct()
        { 
            $this->define_constants();
            add_action('init', [$this, 'init']);
            
            require_once( WPH_EVENT_PATH . 'inc/class.wph_event_cpt.php' );
            $wph_event_cpt = new WPH_Event_Cpt();

            require_once( WPH_EVENT_PATH . 'inc/class.wph_event_metaboxes.php' );
            $wph_event_metaboxes = new WPH_Event_Metaboxes();

            require_once( WPH_EVENT_PATH . 'inc/class.enqueue.php' );
            $wph_event_enquue = new WPH_Event_Enqueue();

            require_once( WPH_EVENT_PATH . 'inc/class.wph_event_column.php' );
            $wph_event_column = new WPH_Event_Column();
        }

     

        public function init()
        {
            // $this->define_constants();
        //    require_once( WPH_EVENT_PATH . 'inc/class.wph_event_cpt.php' );
        //     $wph_event_cpt = new WPH_Event_Cpt();
           
        }

       
  

    }
}

if (class_exists('WPH_Event')) {
    $wph_event = new WPH_Event();
}
