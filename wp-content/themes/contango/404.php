<?php get_header();	?>

<div id="content" class="site-content clearfix">

  <?php get_template_part( 'loop-meta' ); ?>
    
  <div class="container_16 clearfix">
    
    <div class="grid_11">
      
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">	  
  	  
      	  <article id="post-0" class="post-0 post type-post error404 not-found">
            
            <div class="entry-content">
        
              <p><?php printf( __( "Just kidding! You tried going to %s, which doesn't exist, so that means I probably broke something.", 'contango' ), '<code>' . esc_url( home_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?></p>
              
              <p><?php _e( "The following is a list of the latest posts from the blog. Maybe it will help you find what you're looking for.", 'contango' ); ?></p>
        
              <ul>
                <?php wp_get_archives( array( 'limit' => 20, 'type' => 'postbypost' ) ); ?>
              </ul>                   
        
            </div><!-- end .entry-content -->
        
          </article><!-- end #post-0 -->
    
        </main><!-- #main -->
      </div><!-- #primary -->
    
    </div> <!-- end .grid_11 -->
    
    <?php get_sidebar(); ?>

  </div> <!-- end .container_16 -->

</div><!-- #content -->
  
<?php get_footer(); ?>