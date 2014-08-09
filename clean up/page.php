<? get_header(); ?>
<section id="content" role="main">
<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
<header class="header">
<h1 class="entry-title"><? the_title(); ?></h1> <? edit_post_link(); ?>
</header>
<section class="entry-content">
<? if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<? the_content(); ?>
<div class="entry-links"><? wp_link_pages(); ?></div>
</section>
</article>
<? if ( ! post_password_required() ) comments_template( '', true ); ?>
<? endwhile; endif; ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>