<? get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><? _e( 'Category Archives: ', 'threetwotwosix' ); ?><? single_cat_title(); ?></h1>
<? if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? get_template_part( 'entry' ); ?>
<? endwhile; endif; ?>
<? get_template_part( 'nav', 'below' ); ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>