<!DOCTYPE html>
<html lang="<?php echo substr(get_bloginfo ( 'language' ), 0, 2);?>">
<head>
	<meta charset="UTF-8">
	<title><?php
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>

	<meta name="description" content="hjghjgjhgjh" />
	<meta name="keywords" content="" />
	<meta name="author" content="humans.txt">

	<link rel="icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">

	<!-- Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css" />

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body>
	<?php //if( !cltvo_is_local_h() ) include_once("inc/analytics.php");?>
	<div class="header">
		<div class="container">
			<div class="row">

				<div class="subheader">
					<div class="col-1">
						<a href="/"><div class="logo"></div></a>
					</div>
					<div class="col-3">
						<!--
						<ul class="top-menu">
							<li><a href="#">english</a></li>
							<li><a href="#">contact</a></li>
							<li><a href="#">log in</a></li>
						</ul>-->
					</div>
					<div class="col-2">
						<div class="search"></div>
					</div>
				</div>
			</div>

			<div class="menu">
				<ul>
					<li><a href="">Lorem</a></li>
					<li><a href="">Lorem</a></li>
					<li><a href="">Lorem</a></li>
					<li><a href="">Lorem</a></li>
					<li><a href="">Lorem</a></li>
				</ul>
			</div>

		</div>
	</div>
