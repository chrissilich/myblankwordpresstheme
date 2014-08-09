<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
<header>
<? if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>" rel="bookmark"><? the_title(); ?></a><? if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> <? edit_post_link(); ?>
<? if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
</header>
<? get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<? if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>