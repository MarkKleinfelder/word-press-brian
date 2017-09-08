<?php
/**
 *  The template for displaying the footer.
 *
 *  Contains the closing of the #content div and all content after.
 *
 *  @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *  @package WordPress
 *  @subpackage photoplast-lite
 */
?>
        <section id="bsocials">
            <div class="container wow bounceIn" data-wow-delay="0.8s">
                <?php
                $socialtext = get_theme_mod( 'rokophotolite_social_text', __( 'Follow Me', 'photoplast-lite' ) );
                $sociallabel = get_theme_mod( 'rokophotolite_social_label', __( 'To get the latest update of me and my works', 'photoplast-lite' ) );
                ?>

                <?php if( $sociallabel ): ?>
                    <p><?php echo esc_html( $sociallabel ); ?></p>
                <?php endif; ?>

                <?php if( $socialtext ): ?>
                    <div class="follow-me">
                        <div class="border-top-left"></div>
                        <p><?php echo esc_html( $socialtext ); ?></p>
                        <div class="border-bottom-left"></div>
                        <div class="border-bottom-right"></div>
                    </div>
                <?php endif; ?>

                <ol class="social">
                    <?php
                    $facebookurl = get_theme_mod( 'rokophotolite_facebook_link', '#' );
                    $twitterurl = get_theme_mod( 'rokophotolite_twitter_link', '#' );
                    $behanceurl = get_theme_mod( 'rokophotolite_behance_link', '#' );
                    $dribbbleurl = get_theme_mod( 'rokophotolite_dribbble_link', '#' );
                    $flickrurl = get_theme_mod( 'rokophotolite_flickr_link', '#' );
                    $googleplusurl = get_theme_mod( 'rokophotolite_googleplus_link', '#' );
                    $instagramurl = get_theme_mod( 'rokophotolite_instagram_link', '#' );
                    ?>

                    <?php if( $facebookurl ): ?>
                        <li><a href="<?php echo esc_url( $facebookurl ); ?>" title="<?php _e( 'Facebook', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <?php endif; ?>

                    <?php if( $twitterurl ): ?>
                        <li><a href="<?php echo esc_url( $twitterurl ); ?>" title="<?php _e( 'Twitter', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <?php endif; ?>

                    <?php if( $behanceurl ): ?>
                        <li><a href="<?php echo esc_url( $behanceurl ); ?>" title="<?php _e( 'Behance', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-behance fa-3x"></i></a></li>
                    <?php endif; ?>

                    <?php if( $dribbbleurl ): ?>
                        <li><a href="<?php echo esc_url( $dribbbleurl ); ?>" title="<?php _e( 'Dribbble', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-dribbble fa-3x"></i></a></li>
                    <?php endif; ?>

                    <?php if( $flickrurl ): ?>
                        <li><a href="<?php echo esc_url( $flickrurl ); ?>" title="<?php _e( 'Flickr', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-flickr fa-3x"></i></a></li>
                    <?php endif; ?>

                    <?php if( $googleplusurl ): ?>
                        <li><a href="<?php echo esc_url( $googleplusurl ); ?>" title="<?php _e( 'Google+', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>
                    <?php endif; ?>

                    <?php if( $instagramurl ): ?>
                        <li><a href="<?php echo esc_url( $instagramurl ); ?>" title="<?php _e( 'Instangram', 'photoplast-lite' ); ?>" target="_blank"><i class="fa fa-instagram fa-3x"></i></a></li>
                    <?php endif; ?>
                </ol><!--/.social-->
            </div><!--/.container.wow.bounceIn-->
        </section><!--/#bsocials-->
        <div id="footer-nav">  <!-- Copyright notice on the bottom -->
            <span><?php $copyright = get_theme_mod( 'photoplast_lite_footer_copyrights', sprintf( __( 'Copyright %s. All rights reserved.', 'photoplast-lite' ), date( 'Y' ) )); if( $copyright ) { echo esc_html( $copyright ); } ?> <span class="footer-nav-bar"><?php echo esc_html__( '|', 'photoplast-lite' ); ?></span> <a href="<?php echo esc_url( 'http://www.machothemes.com/themes/photoplast-lite/' ); ?>" target="_blank" rel="nofollow"><?php _e( 'Photoplast Lite', 'photoplast-lite' ); ?></a> <?php _e(' powered by','photoplast-lite'); ?> <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>" target="_blank" rel="nofollow"> <?php _e( 'WordPress', 'photoplast-lite' ); ?></a></span>
        </div><!--/#footer-nav-->
        <?php wp_footer(); ?>
    </body>
</html>