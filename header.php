<?php 

/*
    Header template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if($options['fb_id'] == '') { } else { echo 'xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml'; } ?>>
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
		echo ' | ' . sprintf( __( 'Page %s', 'maju' ), max( $paged, $page ) );

    ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <?php if($options['favico_url'] == '') {  } else { ?>
    <!-- Fav icon -->
    <link rel="shortcut icon" href="<?php echo $options['favico_url']; ?>" />
    <?php } ?>
    <?php if($options['appleicon_url'] == '') {  } else { ?>
    <link rel="apple-touch-icon" href="<?php echo $options['appleicon_url']; ?>"/>
    <?php } ?>

<?php
//If set on theme options panel integrate Facebook Open Graph
if($options['fb_id'] == '' || $options['fb_user_id'] == '') { } else { ?>
    <!-- Facebook Integration -->
    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
    <!-- the default values -->
    <meta property="fb:app_id" content="<?php echo $options['fb_id']; ?>" />
    <meta property="fb:admins" content="<?php echo $options['fb_user_id']; ?>" />

    <!-- if page is content page -->
    <?php if (is_single()) { ?>
    <meta property="og:url" content="<?php the_permalink() ?>"/>
    <meta property="og:title" content="<?php single_post_title(''); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <meta property="og:type" content="article" />
    <?php if(has_post_thumbnail() ) { ?>
    <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
    <?php } else if(catch_that_image() !== '') { ?>
    <meta property="og:image" content="<?php if (function_exists('catch_that_image')) {echo catch_that_image(); }?>" />
    <?php } else { ?>
    <?php if($options['fb_default_img'] == '') {} else { ?><meta property="og:image" content="<?php echo $options['fb_default_img']; ?>" /> <?php } ?>
    <?php } ?>

    <!-- if page is others -->
    <?php } else { ?>
    <meta property="og:url" content="<?php the_permalink() ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:type" content="website" />
    <?php if($options['fb_default_img'] == '') {} else { ?><meta property="og:image" content="<?php echo $options['fb_default_img']; ?>" /> <?php } ?>
    <?php } ?>
<?php } ?>

    <!-- StyleSheets -->
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/tables.css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/prettify.css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/fancybox/jquery.fancybox.css" media="screen" />
    <noscript>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/mobile.css" />
    </noscript>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	    
    <?php
    //If set on theme options panel change links color
    if($options['links_color'] == '') { } else { ?><!-- Custom links color  -->
    <style>
	a, nav ul li { color: <?php echo $options['links_color']; ?> !important; }
	a:hover, nav ul li:hover { color: <?php echo $options['links_hover']; ?> !important; }
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
    <?php if(is_home() || is_front_page()) { ?>
    <meta name="description" content="<?php echo bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />	
    <?php } else if(is_single()) { ?>
    <meta name="description" content="<?php the_title(); ?> | <?php bloginfo('name'); ?>" />	
    <?php } ?>
    <link rel='canonical' href='<?php the_permalink(); ?>' />
    
    <!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if IE 7]>
    <style type="text/css">
	#searchform label {
	    float: left;
	    margin: 8px 10px 0 0;
	}
    </style>
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
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Default Navigation") ) : ?>
		<?php endif; ?>
	    </nav>
	</header><!-- #END Header -->

