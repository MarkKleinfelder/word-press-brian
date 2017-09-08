<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package weddingphotography
 */
get_header(); ?>
<div class="error_wrapper">
	<div class="container">
		<div class="row">			
			<div class="col-lg-8 col-xs-12 col-lg-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
				<div class="error_heading">
					<h1><?php esc_html_e("404","weddingphotography")?></h1>
					<h2><?php esc_html_e("Oops!!!Page Not Found!","weddingphotography")?></h2>
					<h3><?php esc_html_e( 'This Page is not exist or some other issues, please go to home', 'weddingphotography' ); ?></h3><br>								
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Back To Home', 'weddingphotography'); ?></a><br>
				</div>
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>