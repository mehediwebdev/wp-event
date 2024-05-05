<?php get_header(); ?>
 <div class="wph-event-archive">
    <header class="page-header">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
      
    </header>
    <?php 
   $wphevent = new WP_Query(
     array(
      'post_type'       => 'wph-event',
      'posts_per_page'   => -1,
      'post_status'     => 'publish'
     )
   );
   if( $wphevent->have_posts() ) :
     while( $wphevent->have_posts() ) :
         $wphevent->the_post();
         $date_meta  = get_post_meta( get_the_ID(), 'datepicker', true );
        
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<div class="event-item">
     <div class="title">
        <h2><a href="<?php the_permalink(); ?>">Event Name:<?php the_title(); ?></a></h2>
       
     </div>
     <div class="content">
       <div class="thumb">
         <?php
           if( has_post_thumbnail() ){
              the_post_thumbnail( array( 200, 200), array( 'class' => 'img-fluid' ) );
           }
         ?>
       </div>
       <?php the_content(); ?>
     </div>
     <div class="meta">
     <span class="event-date">Event Date: <?php echo esc_html( $date_meta ); ?></span>
         
     </div>
</div>
</article>
 <?php
   endwhile;
   wp_reset_postdata();
endif;
 ?>
 </div>



<?php get_footer(); ?>