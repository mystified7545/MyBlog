<?php
/* The Template for displaying widgets on sidebar area.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
 ?>

<?php if ( is_active_sidebar( 'sidebar' ) || is_active_sidebar('sticky-sidebar') ) : ?>
		
		<div class="secondary" id="secondary">
				
				<div id="sidebar-widget" class="sidebar-widget">
					<?php dynamic_sidebar( 'sidebar' ); ?>  
				</div><!--.sticky-widget-->  
				<div id="sticky-widget" class="sticky-widget">
					<?php dynamic_sidebar( 'sticky-sidebar' ); ?>  
				</div><!--.sticky-widget-->
				
		</div><!--.secondary-->

 <?php endif; ?>
 


                    
               