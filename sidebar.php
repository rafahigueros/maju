<?php 

/*
    Default Sidebar(right) template 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
*/

//Get theme options
$options = get_option('maju_theme_options'); 

?>
    <aside id="sidebar" class="col-md-3 pull-right">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Default Sidebar") ) : ?>
        <?php endif; ?>
    </aside>
