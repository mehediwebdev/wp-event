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

            
            require_once( WPH_EVENT_PATH . 'inc/class.wph-event-dashboard.php' );
            $wph_event_dashboard = new WPH_Event_Dashboard();

         add_filter( 'archive_template', array( $this, 'load_custom_archive_template' ) );
		 add_filter( 'single_template', array( $this, 'load_custom_single_template' ) );
        }

     

        public function init()
        {
            // $this->define_constants();
        //    require_once( WPH_EVENT_PATH . 'inc/class.wph_event_cpt.php' );
        //     $wph_event_cpt = new WPH_Event_Cpt();
           
        }

        public function load_custom_archive_template( $tpl ){
            $tpl = WPH_EVENT_PATH . 'views/templates/archive-wph-event.php';
            if( current_theme_supports( 'wph-event' ) ){
              if( is_post_type_archive( 'wph-event' )){
                  $tpl = $this->get_template_part_location( 'archive-wph-event.php' );
              }
            }
              
              return $tpl;
           }


      	 public function load_custom_single_template( $tpl ){
            $tpl = WPH_EVENT_PATH . 'views/templates/single-wph-event.php';
			if( current_theme_supports( 'wph-event' ) ){
			  if( is_singular( 'mv-event' )){
				  $tpl = $this->get_template_part_location( 'single-wph-event.php' );
			  }
			}
			  
			  return $tpl;
		   }
  

    }
}

if (class_exists('WPH_Event')) {
    $wph_event = new WPH_Event();
}
