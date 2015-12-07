<?php
/* The Template for displaying widgets on foooter area.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */ 
 if(is_active_sidebar('footer-fullwidth') || is_active_sidebar('footer-halfwidth') || is_active_sidebar('footer-onethirdwidth')) {
  ?>
<div class="footer-area" id="footer-area">

		<?php if ( is_active_sidebar( 'footer-fullwidth' ) ): ?>
			<div class="footer-widget-container">
				<div class="footer-widget-inner">
					<?php dynamic_sidebar( 'footer-fullwidth' ); ?>
				</div><!--.footer-widget-inner-->
			</div><!--.footer-widget-container-->
		<?php endif; ?>
		
			
		<?php if ( is_active_sidebar( 'footer-halfwidth' ) ): ?>
			<div class="footer-widget-container">
				<div class="footer-widget-inner">
					<?php dynamic_sidebar( 'footer-halfwidth' ); ?>
				</div><!--.footer-widget-inner-->
			</div><!--.footer-widget-container-->
		<?php endif; ?>
		
			
		<?php if ( is_active_sidebar( 'footer-onethirdwidth' )): ?>
			<div class="footer-widget-container">
				<div class="footer-widget-inner">
					<ul class="onethird-list"><?php dynamic_sidebar( 'footer-onethirdwidth' ); ?></ul>
				</div><!--.footer-widget-inner-->
			</div><!--.footer-widget-container-->
		<?php endif; ?>

</div><!--.footer-area-->
<?php } ?>		
		
