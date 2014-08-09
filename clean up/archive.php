<? get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><? 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'threetwotwosix' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'threetwotwosix' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'threetwotwosix' ), get_the_time( 'Y' ) ); }
else { _e( 'Archives', 'threetwotwosix' ); }
?></h1>
</header>
<? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? get_template_part( 'entry' ); ?>
<? endwhile; endif; ?>
<? get_template_part( 'nav', 'below' ); ?>
</section>
<? get_sidebar(); ?>
<? get_footer(); ?>