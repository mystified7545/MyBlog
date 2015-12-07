<?php
/* The Template for displaying quote post format.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>

<article id="post-<?php the_ID(); ?> " <?php post_class(); ?>>
			
			<div class="post-content">
				<?php the_content(''); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fixy' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div><!--.post-content-->
			<?php edit_post_link( __( '<i class="icon-pencil">Edit</i>', 'fixy' ), '<span class="edit-link">', '</span>' ); ?>	
				<div class="post-meta">
					<ul class="post-meta-list">
						<li>
							<ul class="meta-list">
								<li><i class="icon-user"></i></li>
								<li class="meta-author">
								<span class="author-info vcard">
									<a  class="author-link url p-author h-card" href="<?php echo esc_url( get_the_author_meta( 'user_url',get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<span class="fn"><?php echo get_the_author(); ?></span>
									</a>
									<span class="more-info" style="display:none;">
										<span class="author-avatar" >
											<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
										</span><!-- .author-avatar -->
									</span>
								</span><!-- .author-info -->
								</li>
							</ul><!--.meta-list-->
						</li>
						
						<li>
							<?php if ( comments_open() ) : ?>
								<ul class="meta-list">
									<li><i class="icon-comment"></i></li>
									<li class="meta-comment"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'fixy' ) . '</span>', __( 'One comment so far', 'fixy' ), __( 'View all % comments', 'fixy' ) ); ?></li>
								</ul><!--.meta-list-->
							<?php endif; ?>
						</li>
					</ul><!--.post-meta-list-->
				</div><!--.post-meta-->
	
</article><!--.article-->
