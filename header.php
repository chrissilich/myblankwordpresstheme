<!DOCTYPE html>
<html <? language_attributes(); ?>>
<head>
	<meta charset="<? bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><? wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" href="<?=get_stylesheet_uri(); ?>" />
	<? wp_head(); ?>
</head>
<body <? body_class(); ?>>
	<div id="pagewrap">
		<header id="header">
			<section id="branding">
				<div id="site-title">
					<? if ( ! is_singular() ):?><h1><? endif ?>
					<a href="<?=esc_url( home_url( '/' ) ); ?>" title="<? esc_attr_e( get_bloginfo( 'name' ), 'threetwotwosix' ); ?>" rel="home">
						<?=esc_html( get_bloginfo( 'name' ) ); ?>
					</a>
					<? if ( ! is_singular() ): ?></h1><? endif; ?>
				</div>
				<div id="site-description">
					<? bloginfo( 'description' ); ?>
				</div>
			</section>
			<nav id="menu" role="navigation">
				<div id="search">
					<? get_search_form(); ?>
				</div>
				<? wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</nav>
		</header>
		<div id="content">