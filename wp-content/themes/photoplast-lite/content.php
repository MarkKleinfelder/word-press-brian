<?php
/**
 *	Template part for displaying posts.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
 *
 *	@package WordPress
 *	@subpackage photoplast-lite
 */
?>
<?php $count = 0; ?>
<?php while( have_posts() ): the_post(); ?>
	<?php $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'photoplast-lite-content-post-image' ); ?>
	<div <?php post_class( 'blog-posts' ); ?> id="post-<?php the_ID(); ?>">
		<div class="col-lg-12">
			<div class="post wow fadeIn <?php if( $count % 2 == 0 ): echo 'photoplast-lite-post-left'; else: echo 'photoplast-lite-post-right'; endif; ?> clearfix" data-wow-duration="2s">
				<?php if( $post_thumbnail ): ?>
					<div class="post-image" style="background-image: url('<?php echo esc_url( $post_thumbnail[0] ); ?>');"></div>
				<?php endif; ?>
				<div class="post-content <?php if( !$post_thumbnail ): echo 'post-content-no-image'; endif; ?>">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<ul class="list-inline">
						<li><?php _e( 'Post By:', 'photoplast-lite' ); ?> <?php the_author_posts_link(); ?></li>
						<li><?php _e( 'Date:', 'photoplast-lite' ); ?> <time><?php the_time( get_option( 'date_format' ) ); ?></time></li>
						<li><?php _e( 'Category:', 'photoplast-lite' ); ?> <?php the_category(', '); ?></li>
					</ul><!--/.list-inline-->
					<div class="content-entry">
						<?php the_excerpt(); ?>
					</div><!--/.content-entry-->
					<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php _e( 'Read more', 'photoplast-lite' ); ?>" class="content-read-more"><?php _e( 'Read more', 'photoplast-lite' ); ?></a>
				</div><!--/.post-content-->
			</div><!--/.post.wow.fadeIn.photoplast-lite-post-left-->
			<div class="divider"></div>
		</div><!--/.col-lg-10-->
		<div class="clearfix"></div>
	</div><!--/#post-<?php the_ID(); ?>.blog-posts-->
	<?php $count++; ?>
<?php endwhile; ?>