<!DOCTYPE html>
<!--[if IE 7]> <html class="ie7 older oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="ie8 older oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]> <html class="ie9 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
		<?php 
			if (function_exists('is_tag') && is_tag()) {
				echo 'Tag Archive for &quot;'.$tag.'&quot; - ';
			} elseif (is_archive()) {
				wp_title(''); echo ' Archive - ';
			} elseif (is_search()) {
				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
			} elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo ' - ';
			} elseif (is_404()) {
				echo 'Not Found - ';
			}
			bloginfo('name');
		?>
	</title>
	
	<link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/_ui/css/main.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ba046b90-f354-40dd-b303-bb6338593003"}); </script>
</head>

<body <?php body_class('no-js'); ?>>

<nav id="accessibility-nav">
	<ol>
		<li><a href="#navigation">Skip to navigation</a></li>
		<li><a href="#content">Skip to content</a></li>
		<li><a href="#sidebar">Skip to sidebar</a></li>
	</ol>
</nav>
<!-- / accessibility-nav -->
<hr />

<div class="container">

	<header id="header" role="banner">
		<?php if ( is_home() ) { ?>
		<h1 class="ir site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="index" title="Go to homepage"><?php bloginfo( 'name' ); ?><span></span></a></h1>
		<?php } else { ?>
		<a class="ir site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="index" title="Go to homepage"><?php bloginfo( 'name' ); ?><span></span></a>
		<?php } ?>
		<p class="ir by"><a href="http://www.foleyhoag.com"><?php bloginfo('description'); ?><span></span></a></p>
	</header>
	<!-- / header -->
	<hr />
