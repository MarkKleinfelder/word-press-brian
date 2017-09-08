<?php
/**
 *  The header for our theme.
 *
 *  This is the template that displays all of the <head> section and everything up until <div id="content">.
 *
 *  @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *  @package WordPress
 *  @subpackage photoplast-lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div><!--/#preloader-->
        <nav id="site-navigation" role="navigation" class="main-navigation navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="menu-toggle navbar-toggle" aria-controls="menu" aria-expanded="false">
                        <span class="sr-only"><?php _e( 'Toggle Navigation', 'photoplast-lite' ); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--/.menu-toggle.navbar-toggle-->
                    <?php
                    $logourl = get_theme_mod( 'rokophotolite_logo_image', '' );
                    if( !empty( $logourl ) ) {
                        echo '<a class="navbar-brand" href="'. esc_url( home_url( '/' ) ) .'"><img src="'. esc_url( $logourl ) .'" alt="logo"></a>';
                    } else {
                        echo '<a class="navbar-brand brand-text" href="'. esc_url( home_url( '/' ) ) .'"><h4>'. get_bloginfo( 'name' ) .'</h4></a>';
                    }
                    ?>
                </div><!--/.navbar-header.page-scroll-->
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'primary',
                    'container'         => false,
                    'fallback_cb'       => 'rokophotolite_new_setup',
                    'items_wrap'        => '<ul class="nav navbar-nav navbar-right">%3$s</ul>'
                ));
                ?> 
            </div>
        </nav><!--/#site-navigation.main-navigation.navbar.navbar-default.navbar-fixed-top-->
        <section id="blog" style="background-image: url('<?php header_image(); ?>');">
            <div class="dark-overlay vision">
                <div class="centered vision-border wow bounceIn">
                    <div class="border-top-left"></div>
                    <?php
                    $subheadtitle = get_theme_mod( 'rokophotolite_subhead_title', __( 'Welcome to', 'photoplast-lite' ) );
                    if( !empty( $subheadtitle ) ) {
                        echo '<h4>'. esc_html( $subheadtitle ) .'</h4>';
                    }
                    ?>
                    <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
                    <?php get_template_part( 'loop-meta' ); ?>
                    <div class="border-bottom-left"></div>
                    <div class="border-bottom-right"></div>
                </div><!--/.centered.vision-border.wow.bounceIn-->
            </div><!--/.dark-overlay.vision-->
        </section><!--/#blog-->