<?php
/*********=============== Sidebar ============*****************/
if(!function_exists('weddingphotography_sidebar')){
	function weddingphotography_sidebar(){
		get_sidebar();
	}
}
/*********=============== add a menu start ============****************/
if(!function_exists('weddingphotography_menu_editor')){
 function weddingphotography_menu_editor($args){
	    if ( ! current_user_can( 'edit_theme_options' ) ){
		    return;
	   	}
        // see wp-includes/nav-menu-template.php for available arguments
        extract( $args );
        $link = $link_before
              . '<a href="' .esc_url(admin_url( 'nav-menus.php' )) . '">' . $before . esc_html__('Add a menu','weddingphotography') . $after . '</a>'
             . $link_after;
        // We have a list
       if ( FALSE !== stripos( $items_wrap, '<ul' )
        
	       or FALSE !== stripos( $items_wrap, '<ol' )
		)
		{
			$link = "<li>$link</li>";
		}
		$output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
		if ( ! empty ( $container ) ){
			$output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
		}
		if ( $echo ){
			echo "$output";
		}
		return $output;
	}
}
/*********========= start edit archive count ======*********/
add_filter('get_archives_link', 'weddingphotography_archive_count');
function weddingphotography_archive_count($links) {
$links = str_replace('</a>&nbsp;(', '&nbsp;<span>(', $links);
$links = str_replace(')', ')</span></a>', $links);
return $links;
} 

add_filter('get_archives_link', 'weddingphotography_archive_count1');
function weddingphotography_archive_count1($links) {
$links = str_replace(')</span></a></option>', ')</option>', $links);
return $links;
}
/*********========= close edit archive count ======*********/
/*********========= edit category ======*********/
add_filter('wp_list_categories', 'weddingphotography_cat_count');
function weddingphotography_cat_count($links) {
$links = str_replace('</a> (', ' <span>(', $links);
$links = str_replace(')', ')</span></a>', $links);
return $links;
}

// Load Google fonts
function weddingphotography_google_fonts_url() {
    $fonts_url = '';
    $Lato = _x( 'on', 'Lato font: on or off', 'weddingphotography' );   

    if (  'off' !== $Lato  )
    {
        $font_families = array();
		
		if ('off' !== $Lato) {
            $font_families[] = 'Lato:100,300,400,700,900|Montserrat:400,700|Open Sans:300,400,600,700,800|Oswald:300,400,700|Raleway:100,200,300,400,500,600,700,800,900|Roboto:400,500,700,900|Roboto Slab:100,300,400,700|Source Sans Pro:200,300,400,600,700,900|Ubuntu:300,400,500,700|PT Serif:400,400i,700,700i|Playfair Display:400,400i,700,700i,900,900i|Merriweather:300,300i,400,400i,700,700i,900,900i|Poppins:300,400,500,600,700';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families )),
            'subset' => urlencode('latin,latin-ext')
        );
        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }
    return esc_url_raw($fonts_url); 
}

// Google fonts
function weddingphotography_enqueue_googlefonts() {
    wp_enqueue_style( 'weddingphotography-googlefonts', weddingphotography_google_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'weddingphotography_enqueue_googlefonts');

// Footer copyrigth
if ( ! function_exists( 'weddingphotography_footer_copyright_text' ) ) {

	/**
	 * Displays the footer copyright text information
	 */
	function weddingphotography_footer_copyright_text() { 
		$site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';

		$wp_link = '<a href="'.esc_url( __( 'https://wordpress.org/', 'weddingphotography' ) ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'weddingphotography' ) . '"><span>' . esc_html__( 'WordPress', 'weddingphotography' ) . '</span></a>';
         
		$tg_link =  '<a href="'.esc_url( 'http://pixelnx.com/wp/demo/weddingphotography-wordpress-theme' ).'" target="_blank" title="'.esc_attr__( 'PixelNX', 'weddingphotography' ).'" rel="designer"><span>'.esc_html__( 'PixelNX', 'weddingphotography') .'</span></a>';
		
		$default_footer_value = sprintf( __( 'Copyright %1$s %2$s. All rights reserved.', 'weddingphotography' ), date_i18n( __( 'Y', 'weddingphotography' ) ), $site_link ).' '.sprintf( __( 'Proudly powered by %s.', 'weddingphotography' ), $wp_link ).' '.sprintf( __( 'Theme: %1$s by %2$s.', 'weddingphotography' ), 'weddingphotography', $tg_link );

		$weddingphotography_footer_copyright = '<p class="copyright ed_paragraph">'.$default_footer_value.'</p>';
		echo $weddingphotography_footer_copyright; 
	}
} 
add_action( 'weddingphotography_footer_copyright_text', 'weddingphotography_footer_copyright_text', 10 );

function weddingphotography_Category_list(){
    $weddingphotography_cat_lists = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $weddingphotography_cat_array = array();
    $weddingphotography_cat_array[''] = esc_html__('--Choose--','weddingphotography');
    foreach($weddingphotography_cat_lists as $weddingphotography_cat_list){
        $weddingphotography_cat_array[$weddingphotography_cat_list->slug] = $weddingphotography_cat_list->name;
    }
    return $weddingphotography_cat_array;
}
/*********************** Require File Start **********************************/
get_template_part( 'vendor/include/wdp','enqueue' ); 
/************************* Require File End ************************************/
?>