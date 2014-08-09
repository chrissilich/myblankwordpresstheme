<? get_header(); ?>
<? global $post; ?>
<section id="content" role="main">
<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<header class="header">
<h1 class="entry-title"><? the_title(); ?> <span class="meta-sep">|</span> <a href="<?=get_permalink( $post->post_parent ); ?>" title="<? printf( __( 'Return to %s', 'threetwotwosix' ), esc_html( get_the_title( $post->post_parent ), 1 ) ); ?>" rev="attachment"><span class="meta-nav">&larr; </span><?=get_the_title( $post->post_parent ); ?></a></h1> <? edit_post_link(); ?>
<? get_template_part( 'entry', 'meta' ); ?>
</header>
<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
<header class="header">
<nav id="nav-above" class="navigation" role="navigation">
<div class="nav-previous"><? previous_image_link( false, '&larr;' ); ?></div>
<div class="nav-next"><? next_image_link( false, '&rarr;' ); ?></div>
</nav>
</header>
<section class="entry-content">
<div class="entry-attachment">
<? if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large" ); ?>
<p class="attachment"><a href="<?=wp_get_attachment_url( $post->ID ); ?>" title="<? the_title(); ?>" rel="attachment"><img src="<?=$att_image[0]; ?>" width="<?=$att_image[1]; ?>" height="<?=$att_image[2]; ?>" class="attachment-medium" alt="<? $post->post_excerpt; ?>" /></a></p>
<? else : ?>
<a href="<?=wp_get_attachment_url( $post->ID ); ?>" title="<?=esc_html( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?=basename( $post->guid ); ?></a>
<? endif; ?>
</div>
<div class="entry-caption"><? if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
<? if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
</section>
</article>
<? comments_template(); ?>
<? endwhile; endif; ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>