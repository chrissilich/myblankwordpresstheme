<? get_header(); ?>
<section id="content" role="main">
<header class="header">
<? the_post(); ?>
<h1 class="entry-title author"><? _e( 'Author Archives', 'threetwotwosix' ); ?>: <? the_author_link(); ?></h1>
<? if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
<? rewind_posts(); ?>
</header>
<? while ( have_posts() ) : the_post(); ?>
<? get_template_part( 'entry' ); ?>
<? endwhile; ?>
<? get_template_part( 'nav', 'below' ); ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>	