<? get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><? _e( 'Tag Archives: ', 'edgarreeves' ); ?><? single_tag_title(); ?></h1>
</header>
<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? get_template_part( 'entry' ); ?>
<? endwhile; endif; ?>
<? get_template_part( 'nav', 'below' ); ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>