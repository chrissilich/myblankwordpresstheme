<?php


add_action( 'after_setup_theme', 'threetwotwosix_setup' );
function threetwotwosix_setup() {
	load_theme_textdomain( 'threetwotwosix', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'threetwotwosix' ) )
		);
}


add_action( 'wp_enqueue_scripts', 'threetwotwosix_load_scripts' );
function threetwotwosix_load_scripts() {
	wp_enqueue_script( 'jquery' );
}


add_action( 'comment_form_before', 'threetwotwosix_enqueue_comment_reply_script' );
function threetwotwosix_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}


add_filter( 'the_title', 'threetwotwosix_title' );
function threetwotwosix_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}



add_filter( 'wp_title', 'threetwotwosix_filter_wp_title' );
function threetwotwosix_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}


add_action( 'widgets_init', 'threetwotwosix_widgets_init' );
function threetwotwosix_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'threetwotwosix' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
}


function threetwotwosix_custom_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <? comment_class(); ?> id="li-comment-<? comment_ID(); ?>"><?=comment_author_link(); ?></li>
	<? 
}



add_filter( 'get_comments_number', 'threetwotwosix_comments_number' );
function threetwotwosix_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}