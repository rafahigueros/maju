<?php

    //Theme Functions here.

    //Editor Style
    add_editor_style();

    //Wp post thumbnail function
    add_theme_support('post-thumbnails');


    //Defaul Sidebar
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Default Sidebar',
	    'description' => 'Palce sidebar widgets here.',
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


    //Nav Menues
    add_theme_support( 'menus' );


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

?>
