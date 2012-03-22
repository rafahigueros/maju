<?php 

/*
    Default Sidebar(right) template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options'); 

?>
	    <section id="sidebar" class="grid_3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Default Sidebar") ) : ?>
		<?php endif; ?>
	    </section>
