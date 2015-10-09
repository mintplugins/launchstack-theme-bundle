<?php
/**
 * Custom Installation Functions for the Launchstack Theme Bundle. Make custom changes for installation here.
 *
 * Find and replace: LAUNCHSTACK
 * Find and replace: Launchstack Theme Bundle
 * Find and replace: launchstack_theme_bundle
 * Find and replace: launchstack-theme-bundle
 * Find and replace: launchstack
 * Find and replace: Launchstack
 * 
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package     MP Stacks + Launchstack
 * @subpackage  Functions
 *
 * @copyright   Copyright (c) 2015, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Returns the array of the custom theme mods for this theme. As a developer, you can get this array under "Appearance" > "Export Customizer" with the MP Stacks + Developer Add-On.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    void
 * @return   array
 */
function launchstack_theme_bundle_theme_mods(){
			
	return array (
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
	
}
add_filter( 'mp_stacks_required_theme_mods_for_' . 'launchstack_theme_bundle', 'launchstack_theme_bundle_theme_mods' );

/**
 * Return what the dirname of the theme we wish to use should be. 
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    string $theme_dir_name
 * @return   string $theme_dir_name
 */
function launchstack_theme_bundle_required_theme_dirname_custom( $theme_dir_name ){
	return 'knapstack';
}
add_filter( 'launchstack_theme_bundle_required_theme_dirname', 'launchstack_theme_bundle_required_theme_dirname_custom' );

/**
 * Return what the Fancy Name of theme we wish to use should be. This is the title in the theme's style.css file.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    string $fancy_theme_name
 * @return   string $fancy_theme_name
 */
function launchstack_theme_bundle_fancy_theme_name_custom( $fancy_theme_name ){
	return 'Knapstack Theme';
}
add_filter( 'launchstack_theme_bundle_fancy_theme_name', 'launchstack_theme_bundle_fancy_theme_name_custom' );