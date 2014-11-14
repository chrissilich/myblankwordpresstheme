<? if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments">
<? 
if ( have_comments() ) : 
global $comments_by_type;
$comments_by_type = &separate_comments( $comments );
if ( ! empty( $comments_by_type['comment'] ) ) : 
?>
<section id="comments-list" class="comments">
<h3 class="comments-title"><? comments_number(); ?></h3>
<? if ( get_comment_pages_count() > 1 ) : ?>
<nav id="comments-nav-above" class="comments-navigation" role="navigation">
<div class="paginated-comments-links"><? paginate_comments_links(); ?></div>
</nav>
<? endif; ?>
<ul>
<? wp_list_comments( 'type=comment' ); ?>
</ul>
<? if ( get_comment_pages_count() > 1 ) : ?>
<nav id="comments-nav-below" class="comments-navigation" role="navigation">
<div class="paginated-comments-links"><? paginate_comments_links(); ?></div>
</nav>
<? endif; ?>
</section>
<? 
endif; 
if ( ! empty( $comments_by_type['pings'] ) ) : 
$ping_count = count( $comments_by_type['pings'] ); 
?>
<section id="trackbacks-list" class="comments">
<h3 class="comments-title"><?='<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'edgarreeves' ) : __( 'Trackback', 'edgarreeves' ) ); ?></h3>
<ul>
<? wp_list_comments( 'type=pings&callback=edgarreeves_custom_pings' ); ?>
</ul>
</section>
<? 
endif; 
endif;
if ( comments_open() ) comment_form();
?>
</section>