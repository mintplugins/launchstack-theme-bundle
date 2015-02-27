<?php
/**
 * This file contains the MP_CORE_Licensed_Parent_Plugin_Installation_Routine class
 *
 * @link http://mintplugins.com/doc/MP_CORE_Licensed_Parent_Plugin_Installation_Routine/
 * @since 1.0.0
 *
 * @package    MP Core
 * @subpackage Classes
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
//Set up our Global Options for MP Stacks
mp_core_global_options_init();

/**
 * Set up the global $mp_core_options
 *
 * @since 1.0
 * @global $wpdb
 * @global $mp_core_options
 * @return void
 */
function mp_core_global_options_init(){
	
	global $mp_core_options;
	
	$mp_core_options = get_option('mp_core_options');
	
	if( !session_id() ){
		session_start();
	}
			
}

/**
 * This class handles the setup for a Parent Plugin. Set it up in the plugin activation hook for Parent Plugin. 
 * 
 * The field can be singular or they can repeat in groups. 
 * It works by passing an associative array containing the information for the fields to the class
 *
 * @author     Philip Johnston
 * @link       http://mintplugins.com/doc/metabox-class/
 * @since      1.0.0
 * @return     void
 */
class MP_CORE_Licensed_Parent_Plugin_Installation_Routine{
				
	protected $_parent_plugin_title;
	protected $_metabox_items_array = array();
	
	/**
	 * Constructor
	 *
	 * @access   public
	 * @since    1.0.0
	 * @link     http://mintplugins.com/doc/MP_CORE_Licensed_Parent_Plugin_Installation_Routine/
	 * @author   Philip Johnston
	 * @see      sanitize_title()
	 * @param    string $full_parent_plugin_title (required) See link for description.
	 * @return   void
	 */	
	public function __construct( $full_parent_plugin_title, $plugin_api_url ){
				
		global $mp_core_options;
		
		if ( !isset( $mp_core_options['parent_plugin_activation_status'] ) || $mp_core_options['parent_plugin_activation_status'] == 'complete' ){
			return false;	
		}
					
		//Set class wide parent plugin title
		$this->_parent_plugin_title = $full_parent_plugin_title;	
		
		//Set class wide parent plugin slug using hyphens as separators
		$this->_full_parent_plugin_hyphen_slug = sanitize_title( $full_parent_plugin_title );	
		
		//Set class wide parent plugin slug using underscores as separators
		$this->_full_parent_plugin_underscore_slug = str_replace("-", "_", $this->_full_parent_plugin_hyphen_slug );	
		
		$this->_parent_plugin_api_url = $plugin_api_url;
			
		$this->_license_key = get_option( $this->_full_parent_plugin_hyphen_slug . '_license_key' );
		$this->_license_key_valid = get_option( $this->_full_parent_plugin_hyphen_slug . '_license_status_valid' );
												
		//Set up hooked functions
		add_action( 'admin_init', array( $this, 'license_capture_upon_activation' ) );
		add_action( 'admin_footer', array( $this, 'footer_redirects_after_dependant_installs' ) );
		add_action( 'shutdown', array( $this, 'redirect_upon_activation' ) );
										
	}

	/**
	 * Redirects to installation of dependencies, saves Theme MetaData.
	 *
	 * @since 1.0
	 * @global $wpdb
	 * @global $mp_core_options
	 * @return void
	 */
	function redirect_upon_activation(){
		
		global $mp_core_options;
				
		//If we have just activated
		if ( $mp_core_options['parent_plugin_activation_status'] == 'just_activated' ){
						
			// Bail if activating from network, or bulk
			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				
				//Flush the rewrite rules
				flush_rewrite_rules();
				
				//Tell the mp_core_options that we no longer just activated so no redirects happen.
				$mp_core_options['parent_plugin_activation_status'] = 'cancelled';	
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', $mp_core_options );
			
				return;
			}
			
			//If the core is NOT active (and we aren't installing the core right now), redirect the core installation
			if ( !function_exists('mp_core_textdomain') ){
				
				//Tell the mp_core_options that we are activating the core
				$mp_core_options['parent_plugin_activation_status'] = 'installing_core';	
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', $mp_core_options );
			
				//Redirect to install the core
				wp_redirect( admin_url( sprintf( 'options-general.php?page=mp_core_install_plugins_page&action=install-plugin&_wpnonce=%s', wp_create_nonce( 'install-plugin' ) ) ) );	
				exit();
				
			}
			
			//If we made it this far, the core is active
			
			//If there isn't a valid license key, Make it so the license input form is all the user sees
			if ( !$this->_license_key_valid ){	 
				
				$mp_core_options['parent_plugin_activation_status'] = 'getting_license';	
				
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', $mp_core_options );
				
				//wp_redirect( admin_url() );	
				
				// Redirect the user to Parent Plugin's Welcome Page
				echo '<script type="text/javascript">';
					echo "window.location = '" . admin_url() . "';";
				echo '</script>';
				exit();
			
			}
			
			//Set up the name of the function in the parent plugin where we check if all dependant plugins are installed
			$dependency_function_name = $this->_full_parent_plugin_underscore_slug . '_dependencies';
			
			//If all required plugins are active, redirect to the welcome page
			if ( $dependency_function_name() ){
				
				//Tell the mp_core_options that we no longer just activated
				$mp_core_options['parent_plugin_activation_status'] = 'complete';	
					
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', apply_filters( 'mp_core_parent_plugin_installation_complete_filter', $mp_core_options, $this->_full_parent_plugin_underscore_slug ) );
				
				//This hook can be used to set up default meta options or Theme Settings etc
				do_action( 'mp_core_parent_plugin_installation_complete', $this->_full_parent_plugin_underscore_slug );
						
				// Redirect the user to our welcome page - or other page if an add-on filters this redirect
				wp_redirect( admin_url() );
				exit();
			}
			//If all required plugins are NOT active, redirect to the mp-core intaller and install any other needed plugins too.
			else{
								
				$mp_core_options['parent_plugin_activation_status'] = 'installing_dependencies';	
			
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', $mp_core_options );
				
				wp_redirect( admin_url( sprintf( 'options-general.php?page=mp_core_install_plugins_page&action=install-plugin&_wpnonce=%s', wp_create_nonce( 'install-plugin' ) ) ) );	
				exit();
				
			}
			
		}
		
	}
	
	
	
	//If no Parent Plugin license exists, Gets Paren Plugin's License,
	function license_capture_upon_activation(){
		
		global $wpdb, $mp_core_options, $wp_version;
				
		//If the user just clicked cancel on the license actication
		if ( isset( $_GET['mp-core-parent-plugin-license-cancelled'] ) ){	
			
			//Tell the mp_core_options that we no longer just activated so no redirects happen.
			$mp_core_options['parent_plugin_activation_status'] = 'cancelled';	
			//Save our mp_core_options - since we've just activated and changed some of them
			update_option( 'mp_core_options', $mp_core_options );
			
			return false;
		}
								
		//Only keep going if we are supposed to be getting a license and the core is active
		if ( $mp_core_options['parent_plugin_activation_status'] == 'getting_license' && function_exists( 'mp_core_textdomain' ) ){
								
			//If there isn't a valid license key, Make it so the license input form is all the user sees
			if ( !$this->_license_key_valid ){
			
				//If the license is invalid
				if ( !$this->_license_key_valid && !empty( $this->_license_key ) ){
						$h2_title = __( 'Invalid License for ', 'mp_core' ) . '<br />' . $this->_parent_plugin_title . '...';
				}else{
						$h2_title = __( 'Enter your license key to complete installation of ', 'mp_core' ) . '<br />' . $this->_parent_plugin_title . '...'; 
				}
				
				$placeholder_prefix = !$this->_license_key_valid && !empty( $this->_license_key )  ? __( 'Oops! The License Key you entered isn\'t valid', 'mp_core' ) : __( 'Enter your License Key for', 'mp_core' );
				
				//Set up the html form we'll show to the user so they can enter their license
				$page_body_html = '<form id="' . $this->_full_parent_plugin_underscore_slug . '_license" action="' . admin_url() . '" method="post">
			
					<input name="' . $this->_full_parent_plugin_hyphen_slug . '_license_key" style="margin-bottom:10px;" placeholder="' .  $placeholder_prefix . ' ' . $this->_parent_plugin_title. ' " value="" />
				   
					<input name="submit" type="submit" id="submit" class="button" style="width:initial; float:left; display:inline-block; margin-right:5px;" value="' .  __( 'Complete Installation', 'mp_core' ). '">
				   
				   ' .  wp_nonce_field( $this->_full_parent_plugin_hyphen_slug  . '_nonce', $this->_full_parent_plugin_hyphen_slug  . '_nonce' ). '
				   
				   <a href="' .  add_query_arg( array( 'mp-core-parent-plugin-license-cancelled' => true ), admin_url() ). '" class="button">' .  __( 'Cancel', 'mp_core' ). '</a>
				</form>
				<p>' . __( 'Lost your License Key? Log into your account at', 'mp_core' ) . ' <a href="' . $this->_parent_plugin_api_url . '" target="_blank">' . $this->_parent_plugin_api_url 					. '</a></p>';
			
            
				$action_page_args = array( 
					'page_title' => !$this->_license_key_valid && !empty( $this->_license_key ) ? __( 'Invalid License', 'mp_core' ) : __( 'Install', 'mp_core' ) . ' ' . $this->_parent_plugin_title,
					'h2_title' => $h2_title,
					'page_body_html' => $page_body_html,
				);
							
				echo mp_core_simple_action_page( $action_page_args );
				
				die();
			}
			
			//If a valid license was just activated from the parent plugin license-only page
			else{
					
				//Set up the name of the function in the parent plugin where we check if all dependant plugins are installed
				$dependency_function_name = $this->_full_parent_plugin_underscore_slug . '_dependencies';
														
				//If all required plugins are active, redirect to the welcome page
				if ( $dependency_function_name() ){
					
					//Tell the mp_core_options that we no longer just activated
					$mp_core_options['parent_plugin_activation_status'] = 'complete';	
						
					//Save our mp_core_options - since we've just activated and changed some of them
					update_option( 'mp_core_options', apply_filters( 'mp_core_parent_plugin_installation_complete_filter', $mp_core_options, $this->_full_parent_plugin_underscore_slug ) );
					
					//This hook can be used to set up default meta options or Theme Settings etc
					do_action( 'mp_core_parent_plugin_installation_complete', $this->_full_parent_plugin_underscore_slug );
				
					// Redirect the user to our welcome page - or other page if an add-on filters this redirect
					wp_redirect( admin_url() );
					exit();
				}
				//If all required plugins are NOT active, redirect to the mp-core intaller and install any other needed plugins too.
				else{
					
					$mp_core_options['parent_plugin_activation_status'] = 'installing_dependencies';	
				
					//Save our mp_core_options - since we've just activated and changed some of them
					update_option( 'mp_core_options', $mp_core_options );
					
					wp_redirect( admin_url( sprintf( 'options-general.php?page=mp_core_install_plugins_page&action=install-plugin&_wpnonce=%s', wp_create_nonce( 'install-plugin' ) ) ) );	
					exit();
				}
				
			}
		}
	}
	
	/**
	 * This function fires in the footer to set redirects after installations of dependencies
	 *
	 * @since 1.0
	 * @global $mp_core_options
	 * @return void
	 */
	function footer_redirects_after_dependant_installs(){
		global $mp_core_options;
						
		//If we are installing dependant plugins, once they are all installed tell parent_plugin_activation_status that we are complete
		if( $mp_core_options['parent_plugin_activation_status'] == 'installing_dependencies' ){
			
			$_SESSION['mp_installation_attempts'] = !isset( $_SESSION['mp_installation_attempts'] ) || empty( $_SESSION['mp_installation_attempts'] ) ? 0 : $_SESSION['mp_installation_attempts'];
						
			//Set up the name of the function in the parent plugin where we check if all dependant plugins are installed
			$dependency_function_name = $this->_full_parent_plugin_underscore_slug . '_dependencies';
													
			//If all required plugins are active, redirect to the welcome page
			if ( $dependency_function_name() || $_SESSION['mp_installation_attempts'] >= 5){
				
				$_SESSION['mp_installation_attempts'] = 0;
						
				//Flush the rewrite rules
				flush_rewrite_rules();
				
				//Tell the mp_core_options that we no longer just activated
				$mp_core_options['parent_plugin_activation_status'] = 'complete';	
					
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', apply_filters( 'mp_core_parent_plugin_installation_complete_filter', $mp_core_options, $this->_full_parent_plugin_underscore_slug ) );
				
				//This hook can be used to set up default meta options or Theme Settings etc
				do_action( 'mp_core_parent_plugin_installation_complete', $this->_full_parent_plugin_underscore_slug );
				
				// Redirect the user to Parent Plugin's Welcome Page
				echo '<script type="text/javascript">';
					echo "window.location = '" . admin_url() . '?parent_plugin_welcome' . "';";
				echo '</script>';
			}
			//If all required plugins are not activated, redirect to the plugin installation page
			else{
				
				$_SESSION['mp_installation_attempts'] = $_SESSION['mp_installation_attempts'] + 1;
								
				echo '<script type="text/javascript">';
					echo "window.location = '" . admin_url( sprintf( 'options-general.php?' . $_SESSION['mp_installation_attempts'] . '&page=mp_core_install_plugins_page&action=install-plugin&_wpnonce=%s', wp_create_nonce( 'install-plugin' ) ) ) . "';";
				echo '</script>';
				
				
			}
			
		}
		
		
		//If we are currently installing the core, redirect to the license only page when complete
		if( $mp_core_options['parent_plugin_activation_status'] == 'installing_core' ){
			
			//If we were redirected to install mp-core and other required plugins
			if ( isset( $_GET['page'] ) && $_GET['page'] == 'mp_core_install_plugins_page' ){
				
				$mp_core_options['parent_plugin_activation_status'] = 'getting_license';
				//Save our mp_core_options - since we've just activated and changed some of them
				update_option( 'mp_core_options', $mp_core_options );
						
				// Redirect the user to the single license page after MP Core has been installed
				echo '<div style="background-color:#fff; padding:20px; width:100%; text-align: center; position:absolute; top:0; right:0;">' . __( 'Installing other assets...please wait...', 'mp_core' ) . '</div>';
				
				echo '<script type="text/javascript">';
					echo "window.location = '" . admin_url() . "';";
				echo '</script>';
				
				echo '</div>';
					
					
			}	
		}
	}
}