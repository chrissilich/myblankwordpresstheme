<!doctype html>
<!--[if lt IE 8]> <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 oldie"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
	<head>
		<!-- 
			Oh. Well hello there. Welcome, friendly peruser of HTML. Stay a while. Look around. If you get stuck, feel free
			to contact me, the web developer who wrote this code, and I'll see what I can do to help you. My name is 
			Chris Silich. My website is http://www.chrissilich.com and my email address is cs@chrissilich.com			
	 	-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">

		<title><? wp_title( ' | ', true, 'right' ); ?></title>

		<?
			$uri = $_SERVER['REQUEST_URI'];
			$uri_segments = explode('/', $uri);
			$uri_segment_one = "home";
			if (count($uri_segments) > 0 && $uri_segments[1]) {
				$uri_segment_one = explode('?', $uri_segments[1])[0];
				if (!$uri_segment_one) $uri_segment_one = "home";
			}
		?>

		<!-- reset css -->
		<link rel="stylesheet" href="<?=get_theme_root_uri();?>/edgarreeves/assets/css/normalize.css">

		<!-- site css -->
		<link rel="stylesheet" href="<?=get_theme_root_uri();?>/edgarreeves/assets/css/utilities.css">
		<link rel="stylesheet" href="<?=get_theme_root_uri();?>/edgarreeves/assets/css/template.css">
		<link rel="stylesheet" href="<?=get_theme_root_uri();?>/edgarreeves/assets/css/specific/<?=$uri_segment_one;?>.css">


		<!-- plugin js -->
		<script src="<?=get_theme_root_uri();?>/edgarreeves/assets/js/plugins/jquery-1.11.1.js"></script>
		<script src="<?=get_theme_root_uri();?>/edgarreeves/assets/js/plugins/TweenMax/TweenMax.min.js"></script>
		<script src="<?=get_theme_root_uri();?>/edgarreeves/assets/js/plugins/TweenMax/easing/EasePack.min.js"></script>
		<script src="<?=get_theme_root_uri();?>/edgarreeves/assets/js/plugins/TweenMax/jquery.gsap.min.js"></script>
		
		<!-- site JS -->
		<script src="<?=get_theme_root_uri();?>/edgarreeves/assets/js/template.js"></script>
		<script src="<?=get_theme_root_uri();?>/edgarreeves/assets/js/specific/<?=$uri_segment_one;?>.js"></script>
	</head>
	<body <? body_class(); ?>>