<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package weddingphotography
 */
$theme_sidebar_position = ' ';
if(isset($theme_sidebar_position)){
$theme_sidebar_position = get_theme_mod('theme_sidebar_position', 'right');
}
get_header(); ?>
<div class="wrapper_main_breadcumb">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcumb_inner">
				<h3><?php the_archive_title(); ?></h3>  
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrapper_main_blog_section">	
	<div class="container">
		<div class="row">
		<?php if($theme_sidebar_position == 'left') { ?>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="wdp_sidebar_area">	
				<?php weddingphotography_sidebar(); ?>	
			</div>	
		</div>
		<?php } if($theme_sidebar_position!= 'full') { ?>
		<div class="col-lg-8 col-md-8 col-sm-12">
		<?php } else { ?>
		<div class="col-lg-12 col-md-12 col-sm-12">
		<?php } ?>
		<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			the_posts_pagination(
					array(
						'prev_text' => esc_html__('PREVIOUS','weddingphotography'),
						'next_text' => esc_html__('NEXT','weddingphotography')
					)
				);
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- #main -->
		</div><!-- #primary -->
	<?php
		if($theme_sidebar_position != 'full') { ?>
		</div>
		<?php }else { ?>
		</div>
		<?php } if($theme_sidebar_position == 'right') { ?>
		<div class="col-lg-4 col-md-4 col-sm-12">
		<div class="wdp_sidebar_area">	
			<?php weddingphotography_sidebar(); ?>	
		</div>
		</div>
		<?php } ?>
		</div>
	</div>
</div> 
<?php get_footer();?>