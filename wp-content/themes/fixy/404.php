<?php
/* The Template for displaying 404 page.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0

 */

get_header(); ?>
	<div class="primary" id="primary">
		<h1 class="page-header"><i class=" icon-attention"></i><?php _e( 'Not found', 'fixy' ); ?></h1>
			<div class="page-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'fixy' ); ?>
					<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'fixy' ); ?></div>

		<div class="special-search-form"><?php fixy_search_form(array('echo'=>1,
																			'archive_show'=>1,
																			'cat_show'=>1,
																			'tag_show'=>1,
																			'author_show'=>1,
																			'label_show'=>1)); ?></div>
	</div>
		
<?php get_footer(); ?>