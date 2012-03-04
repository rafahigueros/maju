<?php

/*
    Backend options 
    theme: maju by rafaelhigueros.me | scream.ws
    v: 1.0
*/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
    register_setting( 'maju_options', 'maju_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
    add_theme_page( __( 'Theme Options', 'maju' ), __( 'Theme Options', 'maju' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

function customAdmin() {
    $url = get_settings('siteurl');
    $maincss = $url . '/wp-content/themes/maju/backend/css/theme-options.css';
    $colorpickercss = $url . '/wp-content/themes/maju/backend/css/jquery.miniColors.css';
    $colorpickerjs = $url . '/wp-content/themes/maju/backend/js/jquery.miniColors.min.js';
    echo '<!-- custom admin css -->
          <link rel="stylesheet" type="text/css" href="' . $maincss . '" />
          <!-- /end custom adming css -->';
}
add_action('admin_head', 'customAdmin');

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap"> 
	    <h2 class="nav-tab-wrapper">
		<a href="<?php echo get_admin_url(); ?>themes.php?page=theme_options" class="nav-tab nav-tab-active">General</a>
	    </h2>
	    <?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'maju' ) . "</h2>"; ?>

	    <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	    <div class="updated fade"><p><strong><?php _e( 'Options saved', 'maju' ); ?></strong></p></div>
	    <?php endif; ?>

	    <form method="post" action="options.php">
		<?php settings_fields( 'maju_options' ); ?>
		<?php $options = get_option( 'maju_theme_options' ); ?>

		<table class="form-table">
		    <tr valign="top">
			<td scope="row" class="option_name"><?php _e( 'Logo URL', 'maju' ); ?></td>
			<td>
			    <input id="maju_theme_options[logo_url]" class="regular-text" type="text" name="maju_theme_options[logo_url]" value="<?php esc_attr_e( $options['logo_url'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top" class="even">
			<td scope="row" class="option_name"><?php _e( 'Number of posts on Frontpage', 'maju' ); ?></td>
			<td>
			    <input id="maju_theme_options[post_num]" class="regular-text" type="text" name="maju_theme_options[post_num]" value="<?php esc_attr_e( $options['post_num'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top">
			<td scope="row" class="option_name"><?php _e( 'Twitter user name (no "@", will be used for Tweet button)', 'maju' ); ?></td>
			<td>
			    <input id="maju_theme_options[tw_user]" class="regular-text" type="text" name="maju_theme_options[tw_user]" value="<?php esc_attr_e( $options['tw_user'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top" class="even">
			<td scope="row" class="option_name"><?php _e( 'Links color (leave blank to set default color, enter hex values or color name)', 'maju' ); ?></td>
			<td class="color">
			    <p>link</p>
			    <input id="maju_theme_options_links_color" class="regular-text" type="text" name="maju_theme_options[links_color]" value="<?php esc_attr_e( $options['links_color'] ); ?>" />
			    <p>hover</p>
			    <input id="maju_theme_options_links_color_hover" class="regular-text" type="text" name="maju_theme_options[links_hover]" value="<?php esc_attr_e( $options['links_hover'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top">
			<td scope="row" class="option_name"><?php _e( 'Footer &copy;', 'maju' ); ?></td>
			<td>
			    <input id="maju_theme_options[footer_copy]" class="regular-text" type="text" name="maju_theme_options[footer_copy]" value="<?php esc_attr_e( $options['footer_copy'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top" class="even">
			<td scope="row" class="option_name"><?php _e( 'Favico URL', 'maju' ); ?></td>
			<td>
			    <input id="maju_theme_options[favico_url]" class="regular-text" type="text" name="maju_theme_options[favico_url]" value="<?php esc_attr_e( $options['favico_url'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top">
			<td scope="row" class="option_name"><?php _e( 'Apple Touch Icon URL', 'maju' ); ?></td>
			<td>
			    <input id="maju_theme_options[appleicon_url]" class="regular-text" type="text" name="maju_theme_options[appleicon_url]" value="<?php esc_attr_e( $options['appleicon_url'] ); ?>" />
			</td>
		    </tr>
		    <tr valign="top" class="even">
			<td colspan="2">
			    <p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'maju' ); ?>" />
			    </p>
			</td>
		    </tr>
		</table>
	    </form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Image Logo
	$input['logo_url'] = wp_filter_nohtml_kses( $input['logo_url'] );

	// Post Number
	$input['post_num'] = wp_filter_nohtml_kses( $input['post_num'] );

	// Twitter username
	$input['tw_user'] = wp_filter_nohtml_kses( $input['tw_user'] );

	// Links Color
	$input['links_color'] = wp_filter_nohtml_kses( $input['links_color'] );
	$input['links_hover'] = wp_filter_nohtml_kses( $input['links_hover'] );

	// Footer Copy
	$input['footer_copy'] = wp_filter_nohtml_kses( $input['footer_copy'] );

	// Favico URL
	$input['favicor_url'] = wp_filter_nohtml_kses( $input['favico_url'] );

	// Apple Touch Icon URL
	$input['apple_url'] = wp_filter_nohtml_kses( $input['apple_url'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
