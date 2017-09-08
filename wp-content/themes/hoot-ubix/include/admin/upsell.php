<?php
/**
 * Upsell page
 *
 * @package    Hoot
 * @subpackage Hoot Ubix
 */

/** Determine whether to load upsell subpage **/
$premium_features_file = HYBRIDEXTEND_INC . 'admin/premium.php';
$hootubix_load_upsell_subpage = apply_filters( 'hootubix_load_upsell_subpage', file_exists( $premium_features_file ) );
if ( !$hootubix_load_upsell_subpage )
	return;

/* Add the admin setup function to the 'admin_menu' hook. */
add_action( 'admin_menu', 'hootubix_appearance_subpage' );

/**
 * Unload the upsell section
 *
 * @since 1.2
 * @access public
 * @return void
 */
function hootubix_unload_upsell_section( $val ) {
	return false;
}
add_filter( 'hootubix_customize_load_premiumsection', 'hootubix_unload_upsell_section' );

/**
 * Sets up the Appearance Subpage
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hootubix_appearance_subpage() {

	add_theme_page(
		__( 'Hoot Ubix Premium', 'hoot-ubix' ),	// Page Title
		__( 'Premium Options', 'hoot-ubix' ),	// Menu Title
		'edit_theme_options',					// capability
		'hoot-ubix-premium',						// menu-slug
		'hootubix_theme_appearance_subpage'			// function name
		);

	add_action( 'admin_enqueue_scripts', 'hootubix_admin_enqueue_upsell_styles' );

}

/**
 * Enqueue CSS
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hootubix_admin_enqueue_upsell_styles( $hook ) {
	if ( $hook == 'appearance_page_hoot-ubix-premium' )
		wp_enqueue_style( 'hootubix-admin-upsell', HYBRIDEXTEND_INCURI . 'admin/css/upsell.css', array(),  HYBRIDEXTEND_VERSION );
}

/**
 * Display the Appearance Subpage
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hootubix_theme_appearance_subpage() {
	/** Load Premium Features Data **/
	include( HYBRIDEXTEND_INC . 'admin/premium.php' );

	/** Display Premium Teasers **/
	$hootubix_cta = ( empty( $hootubix_cta ) ) ? '<a class="button button-primary button-buy-premium" href="https://wphoot.com/" target="_blank">' . __( 'Click here', 'hoot-ubix' ) . '</a>' : $hootubix_cta;
	$hootubix_cta_top = ( empty( $hootubix_cta_top ) ) ? $hootubix_cta : $hootubix_cta_top;
	$hootubix_intro = ( !empty( $hootubix_intro ) && is_array( $hootubix_intro ) ) ? $hootubix_intro : array();
	$hootubix_intro = wp_parse_args( $hootubix_intro, array(
		'name' => __('Upgrade to Premium', 'hoot-ubix'),
		'desc' => '',
		) );
	?>
	<div id="hootubix-upsell" class="wrap">
		<h1 class="centered"><?php echo $hootubix_intro['name']; ?></h1>
		<p class="hootubix-upsell-intro centered"><?php echo $hootubix_intro['desc']; ?></p>
		<p class="hootubix-upsell-cta centered"><?php if ( !empty( $hootubix_cta_demo ) ) echo $hootubix_cta_demo; echo $hootubix_cta_top; ?></p>
		<?php if ( !empty( $hootubix_options_premium ) && is_array( $hootubix_options_premium ) ): ?>
			<div class="hootubix-upsell-sub">
				<?php foreach ( $hootubix_options_premium as $key => $feature ) : ?>
					<?php $style = empty( $feature['style'] ) ? 'info' : $feature['style']; ?>
					<div class="section-premium <?php
						if ( $style == 'hero-top' || $style == 'hero-bottom' ) echo "premium-hero premium-{$style}";
						elseif ( $style == 'side' ) echo 'premium-sideinfo';
						elseif ( $style == 'aside' ) echo 'premium-asideinfo';
						else echo "premium-{$style}";
						?>">

						<?php if ( $style == 'hero-top' || $style == 'hero-bottom' ) : ?>
							<?php if ( $style == 'hero-top' ) : ?>
								<h4 class="heading"><?php echo $feature['name']; ?></h4>
								<?php if ( !empty( $feature['desc'] ) ) echo '<div class="premium-hero-text">' . $feature['desc'] . '</div>'; ?>
							<?php endif; ?>
							<?php if ( !empty( $feature['img'] ) ) : ?>
								<div class="premium-hero-img">
									<img src="<?php echo esc_url( $feature['img'] ); ?>" />
								</div>
							<?php endif; ?>
							<?php if ( $style == 'hero-bottom' ) : ?>
								<h4 class="heading"><?php echo $feature['name']; ?></h4>
								<?php if ( !empty( $feature['desc'] ) ) echo '<div class="premium-hero-text">' . $feature['desc'] . '</div>'; ?>
							<?php endif; ?>

						<?php elseif ( $style == 'side' ) : ?>
							<div class="premium-side-wrap">
								<div class="premium-side-img">
									<img src="<?php echo esc_url( $feature['img'] ); ?>" />
								</div>
								<div class="premium-side-textblock">
									<?php if ( !empty( $feature['name'] ) ) : ?>
										<h4 class="heading"><?php echo $feature['name']; ?></h4>
									<?php endif; ?>
									<?php if ( !empty( $feature['desc'] ) ) echo '<div class="premium-side-text">' . $feature['desc'] . '</div>'; ?>
								</div>
								<div class="clear"></div>
							</div>

						<?php elseif ( $style == 'aside' ) : ?>
							<?php if ( !empty( $feature['blocks'] ) ) : ?>
								<div class="premium-aside-wrap">
								<?php foreach ( $feature['blocks'] as $key => $block ) {
									echo '<div class="premium-aside-block premium-aside-'.($key+1).'">';
										if ( !empty( $block['img'] ) ) : ?>
											<div class="premium-aside-img">
												<img src="<?php echo esc_url( $block['img'] ); ?>" />
											</div>
										<?php endif;
										if ( !empty( $block['name'] ) ) : ?>
											<h4 class="heading"><?php echo $block['name']; ?></h4>
										<?php endif;
										if ( !empty( $block['desc'] ) ) echo '<div class="premium-aside-text">' . $block['desc'] . '</div>';
									echo '</div>';
								} ?>
								<div class="clear"></div>
								</div>
							<?php endif; ?>

						<?php else : ?>
							<?php if ( !empty( $feature['img'] ) ) : ?>
								<div class="premium-info-img">
									<img src="<?php echo esc_url( $feature['img'] ); ?>" />
								</div>
							<?php endif; ?>
							<div class="premium-info-textblock">
								<?php if ( !empty( $feature['name'] ) ) : ?>
									<div class="premium-info-heading"><h4 class="heading"><?php echo $feature['name']; ?></h4></div>
								<?php endif; ?>
								<?php if ( !empty( $feature['desc'] ) ) echo '<div class="premium-info-text">' . $feature['desc'] . '</div>'; ?>
								<div class="clear"></div>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
				<div class="section-premium hootubix-upsell-cta centered"><?php if ( !empty( $hootubix_cta_demo ) ) echo $hootubix_cta_demo; echo $hootubix_cta; ?></p>
			</div>
		<?php endif; ?>
		<a class="hootubix-premium-top" href="#wpbody"><span class="dashicons dashicons-arrow-up-alt"></span></a>
	</div>
	<?php
}

/**
 * Reorder subpage in the appearance menu.
 *
 * @since 1.0
 */
function hootubix_appearance_subpage_reorder() {
	global $submenu;
	$menu_slug = 'hoot-ubix-premium';
	$index = '';

	if ( !isset( $submenu['themes.php'] ) ) {
		// probably current user doesn't have this item in menu
		return;
	}

	foreach ( $submenu['themes.php'] as $key => $sm ) {
		if ( $sm[2] == $menu_slug ) {
			$index = $key;
			break;
		}
	}

	if ( ! empty( $index ) ) {
		//$item = $submenu['themes.php'][ $index ];
		//unset( $submenu['themes.php'][ $index ] );
		//array_splice( $submenu['themes.php'], 1, 0, array($item) );
		/* array_splice does not preserve numeric keys, so instead we do our own rearranging. */
		$smthemes = array();
		foreach ( $submenu['themes.php'] as $key => $sm ) {
			if ( $key != $index ) {
				$setkey = $key;
				for ( $i = $key; $i < 1000; $i++ ) { 
					if( !isset( $smthemes[$i] ) ) {
						$setkey = $i;
						break;
					}
				}
				$smthemes[ $setkey ] = $sm;
				if ( $sm[2] == 'themes.php' ) {
					$smthemes[ $setkey + 1 ] = $submenu['themes.php'][ $index ];
				}
			}
		}
		hybridextend_array_empty( $submenu['themes.php'], $smthemes );
	}

}
// add_action( 'admin_menu', 'hootubix_appearance_subpage_reorder', 9999 );