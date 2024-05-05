<?php get_header(); ?>
 <div class="mv-testimonials-single">
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>
    <?php 


     while( have_posts() ) :
         the_post();

         $date_meta  = get_post_meta( get_the_ID(), 'datepicker', true );
     
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<div class="testimonial-item">
     <div class="title">
     </div>
     <div class="content">
       <div class="thumb">
         <?php
           if( has_post_thumbnail() ){
              the_post_thumbnail( array( 940, 600), array( 'class' => 'img-fluid' ) );
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
 ?>
 </div>
<?php get_footer(); ?>