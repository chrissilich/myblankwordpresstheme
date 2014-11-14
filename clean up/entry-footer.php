<footer class="entry-footer">
<span class="cat-links"><? _e( 'Categories: ', 'edgarreeves' ); ?><? the_category( ', ' ); ?></span>
<span class="tag-links"><? the_tags(); ?></span>
<? if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'edgarreeves' ) ) . '</a></span>';
} ?>
</footer> 