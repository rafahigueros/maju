<?php 

/*
    Header template 
    theme: maju by rafaelhigueros.com | scream.ws
    v: 1.2
*/

//Get theme options
$options = get_option('maju_theme_options');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/prettify.css" media="screen" />
    <noscript>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/720.css" />
    </noscript>
    <link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'><!-- Google Font Used on titles -->
	    
    <?php
    //If set on theme options panel change links color
    if($options['links_color'] == '') { } else { ?><!-- Custom links color  -->
    <style>
	a, #show-search { color: <?php echo $options['links_color']; ?> !important; }
	a:hover, #show-search:hover { color: <?php echo $options['links_hover']; ?> !important; }
	.button-link, button, input[type=submit]{ background: <?php echo $options['links_color']; ?> !important; }
	.button-link:hover, button:hover, input[type=submit]:hover{ background: <?php echo $options['links_hover']; ?> !important; }
    </style><?php } ?>
    

    <?php
    //Custom CSS here if any
    if($options['custom_css'] == '') { } else { ?><!-- Custom CSS -->
    <style>
    <?php echo stripslashes($options['custom_css']); ?>  
    </style><?php } ?>


    <!-- Script Libs -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!-- SEO (Custom SEO can be placed here)-->
    <?php if(is_home()) { ?>
    <meta name="description" content="<?php echo bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />	
    <?php } else if(is_single()) { ?>
    <meta name="description" content="<?php the_title(); ?> | <?php bloginfo('name'); ?>" />	
    <?php } ?>
    <link rel='canonical' href='<?php the_permalink(); ?>' />
    
    <!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php 
    // Comments multy reply    
    if ( is_single() ) { wp_enqueue_script( 'comment-reply' ); } ?>

    <!-- WP code will be added here -->
    <?php wp_head(); ?>

</head>
<body onload="prettyPrint()">

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
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Default Navigation") ) : ?>
		<?php endif; ?>
	    </nav>
	</header><!-- #END Header -->

