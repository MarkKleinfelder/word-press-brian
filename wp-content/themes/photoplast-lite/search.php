<?php
/**
 *	The template for displaying the Search template.
 *
 *	@package rokophoto-lite
 *	@subpackage photoplast-lite
 */
?>
<?php get_header(); ?>
<?php get_sidebar('top'); ?>
<div class="blog">
    <div class="photoplast-lite container-fluid">
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php get_template_part( 'content' ); ?>
                <?php
                global $wp_query;
                $big = 999999999;
                echo '<ul class="pagination">';
                    echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'total' => $wp_query->max_num_pages
                    ) );
                echo '</ul>';
                ?>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>
        </div>
    </div><!--/.photoplast-lite.container-fluid-->
</div><!--/.blog-->
<?php get_sidebar('bottom'); ?>
<?php get_footer(); ?>