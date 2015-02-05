<?php
/**
 * Installaion hooks for Stack Packs
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package     MP Stacks + LaunchStack
 * @subpackage  Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Parent Plugin Installation Class - used with activation hooks for plugins that are license and require other plugins
 */
require( LAUNCHSTACK_THEME_BUNDLE_PLUGIN_DIR . 'includes/misc-functions/class-parent-plugin-installation.php' );

/**
 * Install
 *
 * Runs on plugin install
 * flushing rewrite rules
 * After successful install, the user is redirected to 
 * screen.
 *
 * @since 1.0
 * @global $wpdb
 * @global $wp_version
 * @return void
 */
function launchstack_theme_bundle_install() {
	global $wpdb, $mp_core_options, $wp_version;
	
	//Tell the mp_stacks_options that we just activated a stack pack
	$mp_core_options['parent_plugin_activation_status'] = 'just_activated';
	$mp_core_options['ask_user_to_set_customizer_options'] = false;
	set_site_transient( 'launchstack_theme_mods_backup', false );
	
	//Save our mp_stacks_options - since we've just activated and changed some of them
	update_option( 'mp_core_options', $mp_core_options );
	
	$active_theme = wp_get_theme();
	
	//Notify
	wp_remote_post( 'http://tracking.mintplugins.com', array(
		'method' => 'POST',
		'timeout' => 1,
		'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array(),
		'body' => array( 
			'mp_track_event' => true, 
			'event_product_title' => 'Launchstack Theme Bundle', 
			'event_action' => 'activation', 
			'event_url' => get_bloginfo( 'wpurl'),
			'wp_version' => $wp_version,
			'active_plugins' => json_encode( get_option('active_plugins') ),
			'active_theme' => $active_theme->get( 'Name' ),
		),
		'cookies' => array()
		)
	);
	
	//Set up the auto redirects to install dependant plugins
	global $launchstack_theme_bundle_installation_routine;
	$launchstack_theme_bundle_installation_routine = new MP_CORE_Licensed_Parent_Plugin_Installation_Routine( 'Launchstack Theme Bundle', 'https://mintplugins.com' );

}
register_activation_hook( LAUNCHSTACK_THEME_BUNDLE_PLUGIN_FILE, 'launchstack_theme_bundle_install' );

/**
 * Init doesn't fire on activation hooks - but we need this class to run in both cases so we re-hook it here.
 *
 * @since 1.0
 * @param void
 * @return void
 */

function launchstack_theme_bundle_admin_init(){
	//Set up the auto redirects to install dependant plugins
	global $launchstack_theme_bundle_installation_routine;
	$launchstack_theme_bundle_installation_routine = new MP_CORE_Licensed_Parent_Plugin_Installation_Routine( 'Launchstack Theme Bundle', 'https://mintplugins.com' );
}
add_action( 'init', 'launchstack_theme_bundle_admin_init' );

/**
 * When all dependant plugins have been installed, set that we want to ask the user some more things about Theme Options.
 *
 * @since 1.0
 * @param $mp_core_options The array of settings being saved to the wp options table
 * @param $context The context (plugin name with underscores) for which this action is running. 
 * @return void
 */
function launchstack_theme_bundle_filter_options_upon_complete_installation( $mp_core_options, $context ){
			
	if ( $context == 'launchstack_theme_bundle' ){
		
		//Now that all dependant plugins have been installed, we want to ask the user if they want to set the Theme Defaults as well.
		$mp_core_options['ask_user_to_set_customizer_options'] = true;
			
	}
	
	return $mp_core_options;
}
add_filter( 'mp_core_parent_plugin_installation_complete_filter', 'launchstack_theme_bundle_filter_options_upon_complete_installation', 10, 2 );

/**
 * Upon init, if ask_user_to_set_customizer_options is true, we ask the user if they want to set the default Customizer Options, or keep their current settings.
 *
 * @since 1.0
 * @param $context The context (plugin name with underscores) for which this action is running. 
 * @return void
 */
function launchstack_theme_bundle_custom_installation_settings( $context ){
	
	global $mp_core_options;
	
	//If we should ask the user to choose whether to use the Theme Bundle's customizer or their existing Customizer		
	if ( isset( $mp_core_options['ask_user_to_set_customizer_options'] ) && $mp_core_options['ask_user_to_set_customizer_options'] == true && !isset( $_GET['use_launchstack_customizer'] ) ){
						
		//Set up the html form we'll show to the user so they can enter their license
		$page_body_html = 
		'<h3>' . __( 'Set-Up Question:') . '</h3>
		<p>' . __( 'Do you want to set the WordPress <strong>"Customizer"</strong> options to match <strong>Launchstack</strong> or keep them as-is?', 'launchstack_theme_bundle' ) . '</p>
		
		<p>
			<strong>Option 1:</strong><br /><a href="' . add_query_arg( array( 'use_launchstack_customizer' => true ), admin_url() ) . '" class="button">' . __( 'Use Launchstack\'s Customizer styles', 'launchstack_theme_bundle' ) . '</a>
			<br />
			<br />
			<strong>Option 2:</strong><br /><a href="' . add_query_arg( array( 'use_launchstack_customizer' => 0 ), admin_url() ) . '" class="button">' . __( 'Keep my current Customizer styles', 'launchstack_theme_bundle' ) . '</a>
		</p>
		
		<p>
		<h3>' . __( 'Not sure?') . '</h3>
			' . __( 'If you aren\'t sure what to choose here, most likely you\'ll want Option 1.', 'launchstack_theme_bundle' ) . '
		</p>
		
		<p><h3>' . 
			__( 'What is the "Customizer?', 'mp_stacks_launchstack' ) . '
		</h3>
		' . __( 'The customizer controls things like your logo image, overall background color, overall text color and more. It can be accessed under "Appearance" > "Customizer" in your WordPress dashboard.', 'launchstack_theme_bundle' ) . '
		</p>';
	
		$action_page_args = array( 
			'page_title' => __( 'Set up Customizer Options?', 'launchstack_theme_bundle' ),
			'h2_title' => __( 'Launchstack Design Option', 'launchstack_theme_bundle' ),
			'page_body_html' => $page_body_html,
		);
					
		echo mp_core_simple_action_page( $action_page_args );
		
		die();
			
	}
	//Otherwise reset the ask_user_to_set_customizer_options so the action page doesn't show again (the page asking the user to choose which customizer option they want).
	else if( isset( $_GET['use_launchstack_customizer'] ) ){
		
		//Activate our Theme Of Choice - just in case it hasn't been yet
		switch_theme( 'knapstack' );
		
		//Reset ask_user_to_set_customizer_options to false - we don't need to ask them to make a decision anymore - because they just made it.
		$mp_core_options['ask_user_to_set_customizer_options'] = false;
		update_option( 'mp_core_options', $mp_core_options );
				
		//If we should keep the Old Theme Mods, get out of here.
		if ( !$_GET['use_launchstack_customizer'] ){
			return false;	
		}
		
		//Backup the old theme mods in case the user did this by accident. This way they can revert back to their old custoimizer values with a single click.
		update_option( 'mp_old_theme_mods_backup', get_theme_mods() );
		set_site_transient( 'launchstack_theme_mods_backup', time() );
		
		//Paste the customizer array that mp-stacks-developer spits out on the "Appearance" > "Export Customizer" page.
		$launchstack_theme_mods = array (
	
			  0 => false,
			  'mp_knapstack_responsive_off' => '',
			  'mp_knapstack_header_bg_color_opacity' => '',
			  'mp_knapstack_header_bg_color' => '#939393',
			  'mp_knapstack_header_nav_text_color' => '#FFFFFF',
			  'mp_knapstack_header_nav_text_hover_color' => '#f2f2f2',
			  'mp_knapstack_header_fixed' => 'absolute',
			  'mp_knapstack_header_bump_site_down' => false,
			  'mp_knapstack_header_link_group' => '',
			  'mp_knapstack_text_color' => '#4c4c4c',
			  'mp_knapstack_subtext_color' => '#777777',
			  'mp_knapstack_link_color' => '#3f3f3f',
			  'mp_knapstack_link_hover_color' => '#0f0000',
			  'mp_knapstack_font_family' => 'Oxygen:Light,300',
			  'mp_knapstack_button_submit' => '#f15a29',
			  'mp_knapstack_button_text' => '#ffffff',
			  'mp_knapstack_button_hover' => '#f23c00',
			  'mp_knapstack_button_text_hover' => '#ffffff',
			  'mp_knapstack_borders' => '#d8d8d8',
			  'mp_knapstack_secondary_bg_color' => '#e2e2e2',
			  'mp_knapstack_form_input_text_color' => '#333333',
			  'mp_knapstack_form_input_inactive_color' => '#2e3137',
			  'mp_knapstack_form_input_active_color' => '#000f38',
			  'mp_knapstack_page_header_bg_color' => '#24262b',
			  'mp_knapstack_page_header_bg_image' => '',
			  'mp_knapstack_page_header_text_color' => '#ffffff',
			  'mp_knapstack_page_header_link_color' => '#ffffff',
			  'mp_knapstack_page_header_link_hover_color' => '#ededed',
			  'mp_knapstack_page_header_button_submit' => '#a0a0a0',
			  'mp_knapstack_page_header_button_text' => '#ffffff',
			  'mp_knapstack_page_header_button_hover' => '#ffffff',
			  'mp_knapstack_page_header_button_text_hover' => '#a0a0a0',
			  'mp_knapstack_comment_area_bg_color' => '#6d6d6d',
			  'mp_knapstack_comment_area_text_color' => '#ffffff',
			  'mp_knapstack_comment_area_link_color' => '#eaeaea',
			  'mp_knapstack_comment_area_link_hover_color' => '#a5a5a5',
			  'mp_knapstack_comment_area_button_submit' => '#a0a0a0',
			  'mp_knapstack_comment_area_button_text' => '#ffffff',
			  'mp_knapstack_comment_button_hover' => '#ffffff',
			  'mp_knapstack_comment_area_button_text_hover' => '#a0a0a0',
			  'mp_knapstack_footer_stack' => '9',
			  'mp_knapstack_background_color' => '#ffffff',
			  'mp_knapstack_background_image' => '',
			  'mp_knapstack_background_image_disabled' => '',
			  'mp_knapstack_background_repeat' => 'no-repeat',
			  'mp_knapstack_background_position' => '',
			  'mp_knapstack_background_attachment' => '',
			  'mp_core_logo' => 'http://demo.mintplugins.com/launchstack-theme-bundle/wp-content/uploads/sites/8/2015/02/your-vintage-logo-500.png',
			  'mp_core_logo_width' => '100',
			  'mp_core_logo_height' => '',
			  'mp_menu_toggle_color' => '#ffffff',
			  'mp_menu_open_from' => 'mp-menu-right.css',
			  'mp_menu_bg_color' => '#ffffff',
			  'mp_menu_text_color' => '#24262b',
			  'mp_menu_attachment' => '',
			  'nav_menu_locations' => 
			  array (
				'primary' => 15,
			  ),

		);
		
		//Loop through each Theme Mod and save it to the current WP
		foreach( $launchstack_theme_mods as $name => $value ){
			
			set_theme_mod( $name, $value );
			
		}
		
		//Set up the default Stacks and corresponsing posts
		mp_stacks_theme_bundle_create_default_pages( 'launchstack_theme_bundle' );
		
	}
}
add_action( 'admin_init', 'launchstack_theme_bundle_custom_installation_settings' );

/**
 * If the Customizer has a backup, show the notice to the user that can be reverted. This also handles the revert if the user chooses - or dismisses itself.
 *
 * @since 1.0
 * @param void
 * @return void
 */
function launchsstack_theme_bundle_customizer_undo(){
	
	//Get the time the Customizer backup was created
	$old_theme_mods_backup_time = get_site_transient( 'launchstack_theme_mods_backup' );
	
	//If for whatever reason mp_core isn't active, return.
	if ( !function_exists( 'mp_core_textdomain' ) || $old_theme_mods_backup_time == false ){
		return;	
	}
		
	//If we saved the customizer settings less than 24 hours ago, let the user know we have their customizer data backed up
	if ( time() < $old_theme_mods_backup_time + 86400 && !isset( $_GET['mp_revert_customizer'] ) ){
		
		?><div class="updated">
			<p>
				<strong><?php echo __( 'Launchstack Theme Bundle Message:', 'launchstack_theme_bundle' ); ?></strong>
				<?php echo __( 'We have backed up your previous "Appearance" > "Customizer" options for 24 hours in case you change your mind. If you\'d like to revert your Customizer back to the way it was before you activated the Launchstack Theme Bundle,', 'launchstack_theme_bundle' ); ?> <a href="<?php echo add_query_arg( array( 'mp_revert_customizer' => true, 'mp_revert_customizer_context' => 'launchstack_theme_bundle' ), admin_url() ); ?>"><?php echo __( 'Click Here', 'launchstack_theme_bundle' ); ?></a> | <a href="<?php echo add_query_arg( array( 'mp_revert_customizer' => 0, 'mp_revert_customizer_context' => 'launchstack_theme_bundle' ), mp_core_get_current_url() ); ?>"><?php echo __( 'Dismiss this message', 'launchstack_theme_bundle' ); ?></a>
			</p>
		  </div><?php
	  
	}
	//If the user wants to revert their Customizer
	else if( isset( $_GET['mp_revert_customizer'] ) && $_GET['mp_revert_customizer'] && isset( $_GET['mp_revert_customizer_context'] ) == 'launchstack_theme_bundle' ){
		
		$old_theme_mods = get_option( 'mp_old_theme_mods_backup' );
		
		//Loop through each Theme Mod and save it to the current WP
		foreach( $old_theme_mods as $name => $value ){
			
			set_theme_mod( $name, $value );
			
		}
		
	}
	//The user dismissed the revert message
	else{
		set_site_transient( 'launchstack_theme_mods_backup', false );
	}
		
}
add_action( 'admin_notices', 'launchsstack_theme_bundle_customizer_undo' );

/**
 * Here we kill EDD's Welcome redirect if we are in the midst of installing our dependant plugins.
 *
 * @since 1.0
 * @param void
 * @return void
 */
function launchstack_theme_bundle_kill_edd_welcome(){
	
	global $mp_core_options;
	
	if( $mp_core_options['parent_plugin_activation_status'] == 'installing_dependencies' ){
		set_transient( '_edd_activation_redirect', false, 30 );
	}
	
}
add_action( 'plugins_loaded', 'launchstack_theme_bundle_kill_edd_welcome' );