<?php
/* The Template for displaying footer area.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>
				</div><!--.content-->
			</div><!--.main-->
		</div><!--.custom-background-->
		
		<div id="footer" class="footer">
			
			<?php get_sidebar( 'footer' ); ?>
			
			<div class="site-credit">
				<p><?php echo get_bloginfo('name').__(' Copyright (C)','fixy').get_the_date('Y').__(' .All Rights Reserved.','fixy'); ?><br/>
				<?php echo __('Powered by WordPress. Theme by ','fixy').'<a href="http://www.itstar.ir">ITstar</a>' ?></p>
			</div><!--.site-credit-->
			
		</div><!--.footer-->
		<span class="external-ok" id="<?php echo esc_attr(get_theme_mod('fixy_external_links_show')); ?>"></span>
		<span class="lazy-ok" id="<?php echo esc_attr(get_theme_mod('fixy_lazy_content')); ?>"></span>
		 <?php get_template_part('lib/ajax','forms'); ?>
		
		<?php wp_footer(); ?>
  	</body><!--body-->
</html><!--html-->