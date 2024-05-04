<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( !class_exists( 'WPH_Event_Metaboxes' ) ) {
    class WPH_Event_Metaboxes
    {
        public function __construct(){
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'save_post', array( $this, 'save_post'), 10, 2);   
        }

        public function add_meta_boxes($post){
            add_meta_box(
                 'calendar_events_metabox',
                 __( 'Select Event Date', 'mv-slider' ),
                 array( $this, 'add_inner_meta_boxes' ),
                 'wph-event',
                 'normal',
                 'high'
 
            );
        }
 
        public function add_inner_meta_boxes( $post ){
         require_once( WPH_EVENT_PATH . 'views/wp-events-metabox.php' );
        }


        public function save_post( $post_id ){

          if( isset( $_POST['action'] ) && $_POST['action'] == 'editpost' ){
          $old_link_text  = get_post_meta( $post_id, 'datepicker', true );
          $new_link_text  = $_POST[ 'datepicker' ];

          if( empty($new_link_text)){
            update_post_meta( $post_id, 'datepicker', __( 'Select Event Date', 'mv-slider' )  );
          }else{
            update_post_meta( $post_id, 'datepicker', sanitize_text_field($new_link_text), $old_link_text  );
          }


          }
        }
    }
}


