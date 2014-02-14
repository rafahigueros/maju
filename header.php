<?php 

/*
    Header template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if($options['favico_url'] == '') {  } else { ?>
    <!-- LE FAV ICON -->
    <link rel="shortcut icon" href="<?php echo $options['favico_url']; ?>" />
    <?php } ?>
    <?php if($options['appleicon_url'] == '') {  } else { ?>
    <link rel="apple-touch-icon" href="<?php echo $options['appleicon_url']; ?>"/>
    <?php } ?>

    <!-- LE STYLESHEETS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

    <?php
    //If set on theme options panel change links color
    if($options['links_color'] == '') { } else { ?><!-- Custom links color  -->
    <style>
        a, nav ul li { color: <?php echo $options['links_color']; ?> !important; }  
        a:hover, nav ul li:hover { color: <?php echo $options['links_hover']; ?> !important; }
        button-link, button, input[type=submit]{ background: <?php echo $options['links_color']; ?> !important; }
        .button-link:hover, button:hover, input[type=submit]:hover{ background: <?php echo $options['links_hover']; ?> !important; }
    </style><?php } ?>

    <?php
    //Custom CSS here if any
    if($options['custom_css'] == '') { } else { ?><!-- Custom CSS -->
    <style>
    <?php echo stripslashes($options['custom_css']); ?>  
    </style><?php } ?>

    <!-- SEO -->
    <?php if(is_home() || is_front_page()) { ?>
    <meta name="description" content="<?php echo bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />	
    <?php } else if(is_single()) { ?>
    <meta name="description" content="<?php the_title(); ?> | <?php bloginfo('name'); ?>" />	
    <?php } ?>
    <link rel='canonical' href='<?php the_permalink(); ?>' />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php 
    // Comments multy reply    
    if ( is_single() ) { wp_enqueue_script( 'comment-reply' ); } ?>

    <!-- WP code will be added here -->
    <?php wp_head(); ?>

</head>
<body>

    <!--  LE FACEBOOK LIKE BTN -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=276799092404902";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
   <!--  LE FACEBOOK LIKE BTN #END -->

    <header class="container">
    <div class="navbar navbar-default" role="navigation">
    <div  class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php 
                // If set on the theme options page, add the logo image, if not, just add the name ad desc. as text
                if($options['logo_url'] == '') { ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('title'); ?></a>
                <?php } else { ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" src="<?php echo $options['logo_url']; ?>" /></a><!-- If set, logo will be here -->
                <?php } ?>
            </div>

            <?php wp_nav_menu( array('theme_location' => 'Header', 'container_class' => 'collapse navbar-collapse', 'menu_class' => 'nav navbar-nav')); ?>

       <!-- LE HEADER #END -->
    </div>
    </div>
    </header>

    <div class="container">

