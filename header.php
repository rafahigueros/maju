<?php 

/*
    Header template 
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

//Get theme options
$options = get_option('maju_theme_options');

?>
<!DOCTYPE html>
<html dir="ltr" lang="en"> <!-- Change lang if nessesary -->
<head>

	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

	<!-- Fav icon -->
	<?php if($options['favico_url'] == '') {  } else { ?>
	<link rel="shortcut icon" href="<?php echo $options['favico_url']; ?>" />
	<?php } ?>
	<?php if($options['appleicon_url'] == '') {  } else { ?>
	<link rel="apple-touch-icon" href="<?php $options['appleicon_url']; ?>"/>
	<?php } ?>

	<!-- StyleSheets -->
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/tables.css" media="screen" />
	<noscript>
	    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/720.css" />
	</noscript>
	<link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'><!-- Google Font Used on titles -->
	
	<?php
	//If set on theme options panel change links color
	if($options['links_color'] == '') { } else { ?>
	<style>
	    a { color: <?php echo $options['links_color']; ?> !important; }
	    a:hover { color: <?php echo $options['links_hover']; ?> !important; }
	</style>
	<?php } ?>
	
	<!-- SEO (Custom SEO can be placed here)-->
	<meta name="description" content="<?php bloginfo('description'); ?>" />	
	<link rel='canonical' href='<?php echo get_option('home'); ?>' />
	
	<!--[if IE]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php 
	// Comments multy reply    
	if ( is_single() ) { wp_enqueue_script( 'comment-reply' ); } ?>

	<!-- WP code will be added here -->
	<?php wp_head(); ?>

</head>
<body>

    <div id="wrapper" class="container_12">

	<header class="grid_12"><!-- Header -->

	    <?php get_search_form(); ?> 
	    <?php 
	    // If set on the theme options page, add the logo image, if not, just add the name ad desc. as text
	    if($options['logo_url'] == '') { ?>
	    <h1 id="site-title"><!-- Site name/title -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('title'); ?></a>
		<span><?php bloginfo( 'description' ); ?></span>
	    </h1>
	    <?php } else { ?>
	    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" src="<?php echo $options['logo_url']; ?>" /></a><!-- If set, logo will be here -->
	    <?php } ?>
	    <nav>
		<?php wp_nav_menu( array('menu' => 'Header', 'menu_class' => 'menu' )); ?>	
	    </nav>
	</header><!-- #END Header -->

