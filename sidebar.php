<?php 

/*
    Default Sidebar(right) template 
    theme: maju by rafaelhigueros.com | scream.ws
    v: 1.2
*/

//Get theme options
$options = get_option('maju_theme_options'); 

?>
	    <section id="sidebar" class="grid_3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Default Sidebar") ) : ?>
		<?php endif; ?>
	    </section>
