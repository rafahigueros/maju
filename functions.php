<?php

    //Theme Functions here.
    //theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>

    //Editor Style
    add_editor_style();

    //Wp post thumbnail function
    add_theme_support('post-thumbnails');


    //Default Sidebar
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Default Sidebar',
	    'description' => 'Place sidebar widgets here.',
	    'before_widget' => '<div id="%1$s" class="sidebar-box">',
	    'after_widget' => '</div>',
	    'before_title' => '<h5>',
	    'after_title' => '</h5>',
    ));


    //Single Post Widgets
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Single Post Widgets',
	    'description' => 'This appears at the end of each post page, right before the comments.',
	    'before_widget' => '<div id="%1$s" class="singlepost-widget">',
	    'after_widget' => '</div>',
	    'before_title' => '<h5>',
	    'after_title' => '</h5>',
    ));


    //Nav Menus
    add_action( 'init', 'register_navmenus' );
    function register_navmenus() {
	register_nav_menus( 
	    array(
		'Header' => __( 'Header Navigation' ),
	    )
	);
	// Check if Header menu exists and make it if not
	if ( !is_nav_menu( 'Header' )) {
	    $menu_id = wp_create_nav_menu( 'Header' );
	}
    }


    //Excerpt limit function
    function excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
            $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        return $excerpt;
    }
 

    //Ad backend options to Dashboard
    require_once ( get_template_directory() . '/backend/theme-options.php' );

    //Include SmartMetaBox class - thanks to Nikolay Yordanov<http://nyordanov.com/> 
    //get SmatMetaBox here: https://github.com/nyordanov/SmartMetaBox
    //tutorial here: http://www.wproots.com/ultimate-guide-to-meta-boxes-in-wordpress/
    require_once ( get_template_directory() . '/backend/SmartMetaBox.php' );

    //Usage: 
    /*
    add_smart_meta_box('my-meta-box', array(
	'title' => 'Project Info', // the title of the meta box
	'pages' => array('page'),  // post types on which you want the metabox to appear
	'context' => 'normal', // meta box context (see above)
	'priority' => 'high', // meta box priority (see above)
	'fields' => array( // array describing our fields
	    array(
		'name' => 'Project URL',
		'id' => 'project_url',
		'type' => 'text',
	    ),
	// put more arrays to add different fields
	)
    ));
    */

    //deactivate WordPress Default Gallery styling
    add_filter( 'use_default_gallery_style', '__return_false' );


    //Facebook Open Graph og:image function
    function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){
	    //Defines a default image
	    $first_img = "";	   
	 }
	return $first_img;
    }


    //i18n
    load_theme_textdomain( 'maju', get_template_directory() . '/languages' );

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
	    require_once( $locale_file );

?>
