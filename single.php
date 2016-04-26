<? get_header(); ?>
<? get_sidebar(); ?>

<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?=get_the_title();?>

<? endwhile; endif; ?>

<? get_footer(); ?>