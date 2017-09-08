<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<h3><?php esc_html_e('Blog','weddingphotography'); ?></h3>  
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
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
				the_post_navigation();
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
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
<?php get_footer(); ?>