<?php
/**
 * The static front page template
 *
 * @package Fotografie
 */

if ( 'posts' === get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

	get_header(); ?>
<?php nivo_slider( 15 ); ?> 

	<div class="singular-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'components/page/content', 'page' );

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile; // End of the loop.
				?>

				<?php get_template_part( 'components/features/recent-posts/recent-posts' ); ?>
			</main>
		</div>
	</div>

<?php get_footer(); ?>

<?php endif; ?>
