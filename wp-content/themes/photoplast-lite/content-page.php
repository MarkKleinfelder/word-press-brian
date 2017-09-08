<?php
/**
 *  Template part for displaying page content in page.php.
 *
 *  @link https://codex.wordpress.org/Template_Hierarchy
 *
 *  @package WordPress
 *  @subpackage photoplast-lite
 */
?>
<div <?php post_class('blog-post'); ?> id="post-<?php the_ID(); ?>">
    <div class="col-lg-12">
        <div class="post wow fadeIn" data-wow-duration="2s">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => "img-responsive")); ?>
            <?php endif; ?>
            <div class="content-entry">
                <?php the_content(); ?>
            </div><!--/.content-entry-->
            <?php wp_link_pages(); ?>
        </div>
    </div><!--/.col-lg-12-->
    <div class="clearfix"></div>
    <div class="divider"></div>
</div>