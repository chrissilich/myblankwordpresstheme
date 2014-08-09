<? get_header(); ?>
<section id="content" role="main">
<? if ( have_posts() ) : ?>
<header class="header">
<h1 class="entry-title"><? printf( __( 'Search Results for: %s', 'threetwotwosix' ), get_search_query() ); ?></h1>
</header>
<? while ( have_posts() ) : the_post(); ?>
<? get_template_part( 'entry' ); ?>
<? endwhile; ?>
<? get_template_part( 'nav', 'below' ); ?>
<? else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="entry-title"><? _e( 'Nothing Found', 'threetwotwosix' ); ?></h2>
</header>
<section class="entry-content">
<p><? _e( 'Sorry, nothing matched your search. Please try again.', 'threetwotwosix' ); ?></p>
<? get_search_form(); ?>
</section>
</article>
<? endif; ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>