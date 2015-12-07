<?php get_header();	?>

<div id="content" class="site-content clearfix">

  <?php get_template_part( 'loop-meta' ); ?>
    
  <div class="container_16 clearfix">
    
    <div class="grid_11">
      
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
  	  
    	    <?php if ( have_posts() ) : ?>
          
            <?php while ( have_posts() ) : the_post(); ?>
            
              <?php get_template_part( 'content', 'attachment' ); ?>
            
            <?php endwhile; ?>
          
          <?php else : ?>
                      
            <?php get_template_part( 'loop-error' ); ?>
          
          <?php endif; ?>
        
        </main><!-- #main -->
      </div><!-- #primary -->
    
    </div> <!-- end .grid_11 -->
    
    <?php get_sidebar(); ?>

  </div> <!-- end .container_16 -->

</div><!-- #content -->
  
<?php get_footer(); ?>