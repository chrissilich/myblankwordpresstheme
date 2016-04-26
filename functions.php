<?


function mbwt_enqueue_scripts_and_styles() {

	// wp_enqueue_style( 'style-name', get_stylesheet_uri() );

	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js", false, false, true );
	wp_enqueue_script( 'tweenmax', "https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.3/TweenMax.min.js", false, false, true );
	wp_enqueue_script( 'tweenmax-scrollto', "https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.3/plugins/ScrollToPlugin.min.js", array('tweenmax'), false, true );
}	
add_action( 'wp_enqueue_scripts', 'mbwt_enqueue_scripts_and_styles' );



function no_break($str) {
	return str_replace(" ", "&nbsp;", $str);
}



//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );





function create_options_pages() {
	if( function_exists('acf_add_options_page') ) {
		
		
		$option_page = acf_add_options_page(array(
			'page_title' 	=> 'My Options',
			'menu_title' 	=> 'My Options',
			'position' 		=> "26",
		));
	 
	}
}
//add_action( 'init', 'create_options_pages', 0 );



// shows all options by default on the content editor toolbar
function myblankwordpresstheme_unhide_kitchensink( $args ) { 
	$args['wordpress_adv_hidden'] = false; 
	return $args;
} 
add_filter( 'tiny_mce_before_init', 'myblankwordpresstheme_unhide_kitchensink' );








function myblankwordpresstheme_add_editor_styles() {
	global $post;

	// New post (init hook).
	if ( stristr( $_SERVER['REQUEST_URI'], 'post-new.php' ) !== false ) {
		add_editor_style( get_stylesheet_directory_uri() . '/assets/css/editor-styles.css' );
	}

	// Edit post (pre_get_posts hook).
	if ( stristr( $_SERVER['REQUEST_URI'], 'post.php' ) !== false ) {
		add_editor_style( get_stylesheet_directory_uri() . '/assets/css/editor-styles.css' );
	}
}
add_action( 'init', 'myblankwordpresstheme_add_editor_styles' );
add_action( 'pre_get_posts', 'myblankwordpresstheme_add_editor_styles' );




// Fix stupid wordpress 4.4 'feature' that breaks justified menus
add_filter('wp_nav_menu_items', 'filter_menu_items');
function filter_menu_items($menu_items){
	return str_replace('<li', " <li", str_replace('</li>', "</li> ", $menu_items));
}



// Register Navigation Menus
function custom_navigation_menus() {

	$locations = array(
		'Navigation' => __( 'The site\'s main nav', 'text_domain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );




// add_filter( 'gettext', 'mbwt_text_changes', 20, 3 );
function mbwt_text_changes( $translated_text, $text, $domain ) {

	switch ( $translated_text ) {
		case 'Sort by newness' :
			$translated_text = __( 'Sort by Date Added', 'theme_text_domain' );
		break;
	}

	return $translated_text;
}







add_action( 'admin_head', 'mbwt_admin_mods' );

/**
 * Disable parent checkboxes in Post Editor.
 */
function mbwt_admin_mods() {
	?>
		<style>
			.acf-taxonomy-field .categorychecklist-holder {
				max-height: none;
			}
		</style>
	<?

}









