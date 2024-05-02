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

         $meta = get_post_meta( $post->ID );
         $link_text = get_post_meta( $post->ID, 'mv_slider_link_text', true);
       
         ?>
         
         <p>Date: <input type="text" id="datepicker"  name="mv_slider_link_text"   class="regular-text link-text"  value="<?php echo ( isset($link_text)) ? esc_html($link_text) : '' ; ?>"></p>
 

         <?php
        }







       //save post 
       public function save_post( $post_id ){
        if( isset( $_POST['action'] ) && $_POST['action'] == 'editpost' ){
           $old_link_text  = get_post_meta( $post_id, 'mv_slider_link_text', true );
           $new_link_text  = $_POST[ 'mv_slider_link_text' ];
         

          
           if( empty($new_link_text)){
             update_post_meta( $post_id, 'mv_slider_link_text', __( 'Add some text', 'mv-slider' )  );
           }else{
             update_post_meta( $post_id, 'mv_slider_link_text', ($new_link_text), $old_link_text  );
           }
         


        }
    }

        


      //end save post 
        
    }
}


