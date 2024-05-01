<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Metaboxes' ) ) {
    class WPH_Event_Metaboxes
    {
        public function __construct(){
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        }

        public function add_meta_boxes($post){
            add_meta_box(
                 'mv_slider_metabox',
                 __( 'Select Event Date', 'mv-slider' ),
                 array( $this, 'add_inner_meta_boxes' ),
                 'wph-event',
                 'normal',
                 'high'
 
            );
        }
 
        public function add_inner_meta_boxes( $post ){
         //require_once( MV_SLIDER_PATH . 'views/mv-slider-metabox.php' );
         ?>
         
         <h2>Select Event Date</h2>

         <?php
        }

        
    }
}


