<?php
/* The Template for displaying not post found pages.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>

<header class="page-header">
	<i class="icon-search"></i>
	<h1 class="page-title"><?php _e( 'Nothing Found', 'fixy' ); ?></h1>
</header>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fixy' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( '<i class="icon-attention"></i>Sorry, but nothing matched your search terms. Please try again with different keywords.', 'fixy' ); ?></p>
	<div class="special-search-form"><?php fixy_search_form(array('echo'=>1,
																			'archive_show'=>1,
																			'cat_show'=>1,
																			'tag_show'=>1,
																			'author_show'=>1,
																			'label_show'=>1,
																			'advance_show'=>0)); ?></div>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fixy' ); ?></p>
	<div class="special-search-form"><?php fixy_search_form(array('echo'=>1,
								'archive_show'=>1,
								'cat_show'=>1,
								'tag_show'=>1,
								'author_show'=>1,
								'advance_show'=>0,
								'label_show'=>1)); ?></div>

	<?php endif; ?>
</div>
