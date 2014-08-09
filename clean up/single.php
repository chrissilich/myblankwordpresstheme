<? get_header(); ?>
<section id="content" role="main">
<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? get_template_part( 'entry' ); ?>
<? if ( ! post_password_required() ) comments_template( '', true ); ?>
<? endwhile; endif; ?>
<footer class="footer">
<? get_template_part( 'nav', 'below-single' ); ?>
</footer>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>