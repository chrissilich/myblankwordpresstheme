<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?=wp_title();?></title>

		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="<?=get_theme_root_uri();?>/myblankwordpresstheme/assets/css/main.css">
		
		<? wp_head(); ?>
	</head>

	<body <?=body_class();?>>
	 
		<div id="page-wrap">
			<div id="header">
				
				
				<a href="/" class="logo">
					<img src="<?=get_theme_root_uri();?>/myblankwordpresstheme/assets/img/logo.gif" id="logo">
				</a>

				<? wp_nav_menu(array(
					'theme_location'  	=> 'Navigation', 
					'menu_id' 			=> 'nav',
					'container' 		=> false,
					'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s<div class="end-menu"></div></ul>'
				)); ?>
				<div class="cf"></div>
			</div>


			<div id="content">
				
				
				
				
				
				
				
				
				
				
				
			
		
		
		