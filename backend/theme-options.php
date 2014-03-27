<?php

/*
    Backend options 
    theme: maju by rafaelhigueros.com <contact@rafaelhigueros.com>
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
        <h2>Theme Options</h2>

        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
        <div class="updated fade"><p><strong><?php _e( 'Options saved', 'maju' ); ?></strong></p></div>
        <?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields( 'maju_options' ); ?>
            <?php $options = get_option( 'maju_theme_options' ); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Logo URL', 'maju' ); ?></th>
                    <td>
                        <input id="maju_theme_options[logo_url]" class="regular-text" type="text" name="maju_theme_options[logo_url]" value="<?php esc_attr_e( $options['logo_url'] ); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Favico URL', 'maju' ); ?></th>
                    <td>
                        <input id="maju_theme_options[favico_url]" class="regular-text" type="text" name="maju_theme_options[favico_url]" value="<?php esc_attr_e( $options['favico_url'] ); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Apple Touch Icon URL', 'maju' ); ?></th>
                    <td>
                        <input id="maju_theme_options[appleicon_url]" class="regular-text" type="text" name="maju_theme_options[appleicon_url]" value="<?php esc_attr_e( $options['appleicon_url'] ); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Links color', 'maju' ); ?></th>
                    <td class="color">
                        <span class="description"><?php _e('Links:', 'maju'); ?></span>
                        <input id="maju_theme_options_links_color" class="small-text" type="text" name="maju_theme_options[links_color]" value="<?php esc_attr_e( $options['links_color'] ); ?>" />
                        <span class="description"><?php _e('Hover:', 'maju'); ?></span>
                        <input id="maju_theme_options_links_color_hover" class="small-text" type="text" name="maju_theme_options[links_hover]" value="<?php esc_attr_e( $options['links_hover'] ); ?>" />
                        <br />
                        <span class="description"><?php _e('Leave fields blank to set default color, enter hex values or color name', 'maju'); ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Footer &copy;', 'maju' ); ?></th>
                    <td>
                        <input id="maju_theme_options[footer_copy]" class="regular-text" type="text" name="maju_theme_options[footer_copy]" value="<?php esc_attr_e( $options['footer_copy'] ); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'G analytics', 'maju' ); ?></th>
                    <td>
                        <input id="maju_theme_options[g_a]" class="regular-text" type="text" name="maju_theme_options[g_a]" value="<?php esc_attr_e( $options['g_a'] ); ?>" />
                        <span class="description"><?php _e('Insert G analytics like "UA-29723403-1"', 'maju'); ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Custom CSS', 'maju' ); ?></th>
                    <td>
                        <textarea id="maju_theme_options[custom_css]" class="large-text code" name="maju_theme_options[custom_css]" cols="" rows="10px"><?php echo stripslashes(htmlspecialchars($options['custom_css'] )); ?></textarea>
                        <span class="description"><?php _e('Add your own styles, use only if you know what you are doing.', 'maju'); ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="option_name"><?php _e( 'Custom Javascript', 'maju' ); ?></th>
                    <td>
                        <textarea id="maju_theme_options[custom_javascript]" class="large-text code" name="maju_theme_options[custom_javascript]" cols="" rows="10px"><?php echo stripslashes($options['custom_javascript']); ?></textarea>
                        <span class="description"><?php _e('Add your own scripts, use only if you know what you are doing.', 'maju'); ?></span>
                    </td>
                </tr>
                <tr valign="top">
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

    // Favico URL
    $input['favicor_url'] = wp_filter_nohtml_kses( $input['favico_url'] );

    // Apple Touch Icon URL
    $input['apple_url'] = wp_filter_nohtml_kses( $input['apple_url'] );

    // Links Color
    $input['links_color'] = wp_filter_nohtml_kses( $input['links_color'] );
    $input['links_hover'] = wp_filter_nohtml_kses( $input['links_hover'] );

    //Google Analytics
    $input['g_a'] = wp_filter_nohtml_kses( $input['g_a'] );

    // Footer Copy
    $input['footer_copy'] = wp_filter_nohtml_kses( $input['footer_copy'] );

    //Custom CSS
    $input['custom_css'] = wp_filter_post_kses( $input['custom_css'] );
    $input['custom_javascript'] = wp_filter_post_kses( $input['custom_javascript'] );

    return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
