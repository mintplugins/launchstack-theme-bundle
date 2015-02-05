<?php
/**
 * This file contains a function which checks if the MP Stacks plugin is installed.
 *
 * @since 1.0.0
 *
 * @package    MP Core
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
* Check to make sure the MP Stacks Plugin is installed.
*
* @since    1.0.0
* @link     http://mintplugins.com/doc/plugin-checker-class/
* @return   array $plugins An array of plugins to be installed. This is passed in through the mp_core_check_plugins filter.
* @return   array $plugins An array of plugins to be installed. This is passed to the mp_core_check_plugins filter. (see link).
*/
if (!function_exists('easy_digital_downloads_plugin_check')){
	function easy_digital_downloads_plugin_check( $plugins ) {
		
		//We don't want to bombard the user with notices when they are installing so we will disable EDD's tracking notice here
		update_option( 'edd_tracking_notice', '1' );
		
		$add_plugins = array(
			array(
				'plugin_name' => 'Easy Digital Downloads',
				'plugin_message' => __('You require the Easy Digital Downloads plugin. Install it here.', 'mp_stacks_sample_stack_pack'),
				'plugin_filename' => 'easy-digital-downloads.php',
				'plugin_download_link' => '',
				'plugin_info_link' => '',
				'plugin_group_install' => true,
				'plugin_required' => true,
				'plugin_wp_repo' => true,
			)
		);
		
		return array_merge( $plugins, $add_plugins );
	}
}
add_filter( 'mp_core_check_plugins', 'easy_digital_downloads_plugin_check' );