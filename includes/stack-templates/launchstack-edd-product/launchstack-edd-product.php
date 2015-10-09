<?php 
/**
 * MP Stacks Template EDD Product
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package     MP Stacks Template EDD Product
 * @subpackage  Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */

 /**
 * If required add-ons aren't active, stop and install it now
 */
if (!function_exists('mp_stacks_downloadgrid_textdomain') || !function_exists('mp_stacks_edd_textdomain') || !function_exists('mp_stacks_features_textdomain') || !function_exists('mp_stacks_googlefonts_textdomain') || !function_exists('mp_stacks_image_style_textdomain') || !function_exists('mp_stacks_mailchimp_textdomain') || !function_exists('mp_stacks_parallax_textdomain') || !function_exists('mp_stacks_postgrid_textdomain') || !function_exists('mp_stacks_second_text_textdomain') || !function_exists('mp_stacks_shadows_textdomain') || !function_exists('mp_stacks_slider_textdomain') || !function_exists('mp_stacks_sociallinks_textdomain') || !function_exists('mp_stacks_widgets_textdomain')){
					
	/**
	 * Check if mp_stacks_downloadgrid is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-downloadgrid-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_edd is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-edd-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_features is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-features-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_googlefonts is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-googlefonts-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_image_style is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-image-style-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_mailchimp is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-mailchimp-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_parallax is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-parallax-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_postgrid is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-postgrid-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_second_text is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-second-text-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_shadows is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-shadows-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_slider is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-slider-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_sociallinks is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-sociallinks-check.php' ); 
		
	
					
	/**
	 * Check if mp_stacks_widgets is installed
	 */
	require( plugin_dir_path(__FILE__) . 'required-add-ons/mp-stacks-widgets-check.php' ); 
		
		
}
/**
 * Otherwise, if all required plugins are active, carry out the plugin's functions
 */
else{

	 /**
	 * Add EDD Product to the list of installed stack templates
	 *
	 * @since    1.0.0
	 * @link     http://mintplugins.com/doc/mp_stacks_templates_add_launchstack_edd_product
	 * @see      function_name()
	 * @param    array $installed_templates See link for description.
	 * @return   array $installed_templates See link for description.
	 */
	function mp_stacks_templates_add_launchstack_edd_product( $installed_templates ){ 
		
		
		$realpath    = str_replace("\\", "/", dirname(__FILE__));
		$url_path = substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', $realpath), "", 10000);
		
		$installed_templates['mp_stacks_launchstack_edd_product_array'] = array(
			'template_slug' => 'launchstack_edd_product',
			'template_title' => __( 'EDD Product', 'launchstack_theme_bundle' ),
			'template_description' => __('Launchstack\'s "Product" Stack for Easy Digital Downloads.', 'launchstack_theme_bundle' ),
			'template_tags' => 'EDD, Product, Launchstack',
			'template_preview_img' => plugins_url( '/images/preview_thumbnail.jpg', __FILE__ ),
			'template_demo_url' => 'http://demo.mintplugins.com/launchstack-theme-bundle/downloads/test-download-17/',
		);
		
		return $installed_templates;
	
	}
	add_filter( 'mp_stacks_installed_templates', 'mp_stacks_templates_add_launchstack_edd_product' );
	
	/**
	 * Add This Stack Template to the list of Default Stacks to create when the parent Theme Bundle is activated.
	 *
	 * @since    1.0.0
	 * @link     https://mintplugins.com/doc/mp_stacks_templates_launchstack_edd_product_to_default_stacks
	 * @see      function_name()
	 * @param    array $default_stacks_to_create See link for description.
	 * @return   array $default_stacks_to_create See link for description.
	 */
	function mp_stacks_templates_launchstack_edd_product_to_default_stacks( $default_stacks_to_create ){ 
				
		$default_stacks_to_create['download']['launchstack_edd_product'] = array( 'title' => 'EDD Product','post_format' => 'gallery', );
		
		return $default_stacks_to_create;
	
	}
	add_filter( 'launchstack_theme_bundle_default_stacks', 'mp_stacks_templates_launchstack_edd_product_to_default_stacks' );
	
	/**
	 * This function holds and returns the EDD Product Template Array
	 *
	 * @since    1.0.0
	 * @link     http://mintplugins.com/doc/mp-stacks-stack-template-function
	 * @return   array The Stack Template Aray
	 */
	function mp_stacks_launchstack_edd_product_array(){ 
	
		$template_array = array (
  'stack_title' => '',
  'stack_description' => 'Created using: Launchstack\'s "Product" Stack for Easy Digital Downloads.',
  'stack_bricks' => 
  array (
    'brick_1' => 
    array (
      'brick_title' => 'Product Page Hero',
      'mp_stack_order' => 1000,
      '_edit_lock' => 
      array (
        'value' => '1422762017:1',
      ),
      '_edit_last' => 
      array (
        'value' => '1',
      ),
      'brick_min_height' => 
      array (
        'value' => '',
      ),
      'brick_max_width' => 
      array (
        'value' => '1100',
      ),
      'brick_min_above_below' => 
      array (
        'value' => '175',
      ),
      'brick_centered_inner_margins_showhider' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_below_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c2' => 
      array (
        'value' => '25',
      ),
      'brick_min_below_c2' => 
      array (
        'value' => '',
      ),
      'brick_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_class_name' => 
      array (
        'value' => '',
      ),
      'brick_bg_image' => 
      array (
        'value' => 'product-header-bg5.jpg',
        'attachment' => true,
      ),
      'brick_display_type' => 
      array (
        'value' => 'fill',
      ),
      'brick_bg_image_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_bg_color' => 
      array (
        'value' => '#24262b',
      ),
      'brick_bg_color_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_first_content_type' => 
      array (
        'value' => 'slider',
      ),
      'brick_second_content_type' => 
      array (
        'value' => 'singletext',
      ),
      'brick_alignment' => 
      array (
        'value' => 'leftright',
      ),
      'brick_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_line_1_color' => 
      array (
        'value' => '#ffffff',
      ),
      'brick_line_1_font_size' => 
      array (
        'value' => '38',
      ),
      'brick_text_line_1' => 
      array (
        'value' => 'Product
',
      ),
      'brick_line_2_color' => 
      array (
        'value' => '#ffffff',
      ),
      'brick_line_2_font_size' => 
      array (
        'value' => '16',
      ),
      'brick_text_line_2' => 
      array (
        'value' => 'The Launchstack Theme bundle includes page templates for selling products. Instantly start selling your product from your website.
[mp_button icon=&quot;fa-check&quot; text=&quot;Buy Now&quot; link=&quot;ttp://sdgsgsd.com&quot; color=&quot;&quot; text_color=&quot;#dd9933&quot; hover_color=&quot;#eeee22&quot; hover_text_color=&quot;#8224e3&quot; open_type=&quot;_self&quot;]
',
      ),
      'brick_main_image' => 
      array (
        'value' => '',
      ),
      'brick_main_image_max_width' => 
      array (
        'value' => '',
      ),
      'brick_main_image_link_url' => 
      array (
        'value' => '',
      ),
      'brick_video_url' => 
      array (
        'value' => '',
      ),
      'brick_video_max_width' => 
      array (
        'value' => '',
      ),
      'feature_settings_description' => 
      array (
        'value' => '',
      ),
      'features_per_row' => 
      array (
        'value' => '',
      ),
      'feature_text_color' => 
      array (
        'value' => '',
      ),
      'feature_alignment' => 
      array (
        'value' => '',
      ),
      'feature_icon_size' => 
      array (
        'value' => '',
      ),
      'feature_description' => 
      array (
        'value' => '',
      ),
      'mp_features_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'feature_title' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'brick_line_1_google_font' => 
      array (
        'value' => 'Oxygen:Light,300',
      ),
      'brick_line_2_google_font' => 
      array (
        'value' => 'Raleway',
      ),
      'mp_stacks_parallax_on' => 
      array (
        'value' => 'mp_stacks_parallax_on',
      ),
      'mp_stacks_parallax_bg_height' => 
      array (
        'value' => '750',
      ),
      'mp_stacks_parallax_speed_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_speed' => 
      array (
        'value' => '21',
      ),
      'mp_stacks_parallax_c1_speed' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c2_speed' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_offset_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_offset' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_c1_offset' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_c2_offset' => 
      array (
        'value' => '',
      ),
      'brick_second_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_font_size' => 
      array (
        'value' => '18',
      ),
      'brick_second_line_1_google_font' => 
      array (
        'value' => 'Oxygen:Light,300',
      ),
      'brick_second_text_line_1' => 
      array (
        'value' => '&lt;p&gt;[mp_button icon=&quot;fa-shopping-cart&quot; text=&quot;Buy Now&quot; link=&quot;&quot; color=&quot;#f15a29&quot; text_color=&quot;#ffffff&quot; hover_color=&quot;#f23c00&quot; hover_text_color=&quot;#ffffff&quot; open_type=&quot;_self&quot;]&lt;/p&gt;
',
      ),
      'brick_second_line_2_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_2' => 
      array (
        'value' => '',
      ),
      'brick_second_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_second_video_url' => 
      array (
        'value' => '',
      ),
      'brick_second_video_max_width' => 
      array (
        'value' => '',
      ),
      'brick_second__content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_content_type_widths_and_floats' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c1' => 
      array (
        'value' => '478',
      ),
      'brick_float_c1' => 
      array (
        'value' => 'center',
      ),
      'brick_max_width_c2' => 
      array (
        'value' => '',
      ),
      'brick_float_c2' => 
      array (
        'value' => '',
      ),
      'brick_overall_google_font' => 
      array (
        'value' => '',
      ),
      'mailchimp_api_key' => 
      array (
        'value' => '',
      ),
      'mailchimp_list_id' => 
      array (
        'value' => '',
      ),
      'feature_title_size' => 
      array (
        'value' => '',
      ),
      'feature_text_size' => 
      array (
        'value' => '',
      ),
      'gallery_source' => 
      array (
        'value' => '',
      ),
      'gallery_wp_gallery_shortcode' => 
      array (
        'value' => '',
      ),
      'gallery_flickr_photoset_url' => 
      array (
        'value' => '',
      ),
      'gallery_justified_row_height' => 
      array (
        'value' => '',
      ),
      'mailchimp_success_message' => 
      array (
        'value' => '',
      ),
      'mailchimp_message_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_size' => 
      array (
        'value' => '',
      ),
      'postgrid_taxonomy_term' => 
      array (
        'value' => '',
      ),
      'postgrid_per_row' => 
      array (
        'value' => '',
      ),
      'postgrid_per_page' => 
      array (
        'value' => '',
      ),
      'postgrid_post_spacing' => 
      array (
        'value' => '',
      ),
      'postgrid_show_featured_images' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_width' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_height' => 
      array (
        'value' => '',
      ),
      'postgrid_show_title_and_text' => 
      array (
        'value' => '',
      ),
      'postgrid_title_color' => 
      array (
        'value' => '',
      ),
      'postgrid_title_size' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_color' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_size' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_word_limit' => 
      array (
        'value' => '',
      ),
      'postgrid_show_load_more_button' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'postgrid_mouse_over_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'postgrid_mouse_over_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'feature_icon_vertical_alignment' => 
      array (
        'value' => '',
      ),
      'sociallinks_per_row' => 
      array (
        'value' => '',
      ),
      'sociallinks_spacing' => 
      array (
        'value' => '',
      ),
      'sociallinks_size' => 
      array (
        'value' => '',
      ),
      'sociallinks_color' => 
      array (
        'value' => '',
      ),
      'sociallinks_color_hover' => 
      array (
        'value' => '',
      ),
      'sociallink_description' => 
      array (
        'value' => '',
      ),
      'mp_sociallinks_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'sociallink_title' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_slider_images' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'mp_stacks_slider_image_url' => 
            array (
              'value' => 'product-slider-12.jpg',
              'attachment' => true,
            ),
            'mp_stacks_slider_video_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
          1 => 
          array (
            'mp_stacks_slider_image_url' => 
            array (
              'value' => 'product-slider-21.jpg',
              'attachment' => true,
            ),
            'mp_stacks_slider_video_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_slider_width' => 
      array (
        'value' => '350',
      ),
      'mp_stacks_slider_height' => 
      array (
        'value' => '350',
      ),
      'mp_stacks_text_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_line_1_color' => 
            array (
              'value' => '#ffffff',
              'attachment' => false,
            ),
            'brick_line_1_font_size' => 
            array (
              'value' => '38',
              'attachment' => false,
            ),
            'brick_line_1_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text_line_1' => 
            array (
              'value' => '&lt;p&gt;Product For Sale.&lt;/p&gt;
',
              'attachment' => false,
            ),
            'brick_line_2_color' => 
            array (
              'value' => '#ffffff',
              'attachment' => false,
            ),
            'brick_line_2_font_size' => 
            array (
              'value' => '16',
              'attachment' => false,
            ),
            'brick_line_2_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text_line_2' => 
            array (
              'value' => '&lt;p&gt;The Launchstack Theme bundle includes page templates for selling products. Instantly start selling your products from your website with eye-catching and customizable design.&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
          1 => 
          array (
            'brick_line_1_color' => 
            array (
              'value' => '#f2f2f2',
              'attachment' => false,
            ),
            'brick_line_1_font_size' => 
            array (
              'value' => '14',
              'attachment' => false,
            ),
            'brick_line_1_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text_line_1' => 
            array (
              'value' => '&lt;p&gt;[mp_stacks_edd_purchase_link button_text=&quot;Purchase Now&quot; button_color=&quot;#f15a29&quot; button_text_color=&quot;#ffffff&quot; button_hover_color=&quot;#f23c00&quot; button_hover_text_color=&quot;#ffffff&quot;]&lt;/p&gt;
',
              'attachment' => false,
            ),
            'brick_line_2_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_font_size' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text_line_2' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_show_nav' => 
      array (
        'value' => 'bottom_center_outside',
      ),
      'mp_stacks_nav_color' => 
      array (
        'value' => '#ffffff',
      ),
      'downloadgrid_taxonomy_term' => 
      array (
        'value' => '',
      ),
      'downloadgrid_layout_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_per_row' => 
      array (
        'value' => '',
      ),
      'downloadgrid_per_page' => 
      array (
        'value' => '',
      ),
      'downloadgrid_post_spacing' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_featured_images' => 
      array (
        'value' => 'downloadgrid_show_featured_images',
      ),
      'downloadgrid_featured_images_width' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_height' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_inner_margin' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_image_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'scale' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_featured_images_overlay_settings' => 
      array (
        'value' => '',
      ),
      'dl_grid_feat_overlay_img_desc' => 
      array (
        'value' => '',
      ),
      'downloadgrid_image_overlay_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '#FFF',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_title_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_titles' => 
      array (
        'value' => 'downloadgrid_show_titles',
      ),
      'downloadgrid_titles_placement' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_size' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_leading' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_title_background_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_title_backgrounds' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_padding' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_opacity' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_excerpt_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_excerpts' => 
      array (
        'value' => 'downloadgrid_show_excerpts',
      ),
      'downloadgrid_excerpt_placement' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_size' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_leading' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_word_limit' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_excerpt_background_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_excerpt_backgrounds' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_padding' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_opacity' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_price_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_prices' => 
      array (
        'value' => 'downloadgrid_show_prices',
      ),
      'downloadgrid_price_placement' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_color' => 
      array (
        'value' => '#000',
      ),
      'downloadgrid_price_size' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_leading' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_word_limit' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_price_background_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_price_backgrounds' => 
      array (
        'value' => 'downloadgrid_show_price_backgrounds',
      ),
      'downloadgrid_price_background_padding' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_background_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_background_opacity' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_ajax_load_more_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_load_more_button' => 
      array (
        'value' => 'downloadgrid_show_load_more_button',
      ),
      'downloadgrid_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_mouse_over_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_mouse_over_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_text' => 
      array (
        'value' => '',
      ),
      'mp_stacks_navigation_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slideshow_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slideshow_on' => 
      array (
        'value' => '',
      ),
      'mp_stacks_animation_style' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_speed' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_sizes' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_description' => 
      array (
        'value' => '',
      ),
      'feature_spacing' => 
      array (
        'value' => '20',
      ),
      'mailchimp_messages_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_fontsize' => 
      array (
        'value' => '16',
      ),
      'mailchimp_emailfield_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_fontsize' => 
      array (
        'value' => '14',
      ),
      'mailchimp_email_input_field_fontcolor' => 
      array (
        'value' => '#000',
      ),
      'mailchimp_overall_size_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_height' => 
      array (
        'value' => '36',
      ),
      'mailchimp_email_input_field_width' => 
      array (
        'value' => '200',
      ),
      'mailchimp_overall_corner_radius' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_second_singletext_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_second_text_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_second_text_font_size' => 
            array (
              'value' => '35',
              'attachment' => false,
            ),
            'brick_second_text_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_second_text_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_second_text_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_second_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_sociallinks_links_showhider' => 
      array (
        'value' => '',
      ),
      'mp_stacks_sociallinks_layout_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_per_row' => 
      array (
        'value' => '3',
      ),
      'widgets_title_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_title_color' => 
      array (
        'value' => '',
      ),
      'widgets_title_size' => 
      array (
        'value' => '25',
      ),
      'widgets_title_bottom_margin' => 
      array (
        'value' => '10',
      ),
      'widgets_text_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_text_color' => 
      array (
        'value' => '',
      ),
      'widgets_text_size' => 
      array (
        'value' => '16',
      ),
      'widgets_text_bottom_margin' => 
      array (
        'value' => '5',
      ),
      'widgets_links_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_links_color' => 
      array (
        'value' => '',
      ),
      'widgets_links_hover_color' => 
      array (
        'value' => '',
      ),
      'widgets_link_underlines' => 
      array (
        'value' => '',
      ),
      'widgets_lists_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_list_item_spacing' => 
      array (
        'value' => '15',
      ),
      'manage_sidebar' => 
      array (
        'value' => '',
      ),
      'brick_min_below' => 
      array (
        'value' => '90',
      ),
      'brick_no_borders' => 
      array (
        'value' => '',
      ),
      'brick_split_percentage' => 
      array (
        'value' => '50',
      ),
      'brick_bg_image_showhider' => 
      array (
        'value' => '',
      ),
      'brick_bg_color_showhider' => 
      array (
        'value' => '',
      ),
      'mp_stacks_singletext_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_text_color' => 
            array (
              'value' => '#ffffff',
              'attachment' => false,
            ),
            'brick_text_font_size' => 
            array (
              'value' => '38',
              'attachment' => false,
            ),
            'brick_text_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text' => 
            array (
              'value' => '&lt;p&gt;Product For Sale.&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
          1 => 
          array (
            'brick_text_color' => 
            array (
              'value' => '#ffffff',
              'attachment' => false,
            ),
            'brick_text_font_size' => 
            array (
              'value' => '14',
              'attachment' => false,
            ),
            'brick_text_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_paragraph_margin_bottom' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text' => 
            array (
              'value' => '&lt;p&gt;The Launchstack Theme bundle includes page templates for selling products. Instantly start selling your products from your website with eye-catching and easily-customizable design.&lt;/p&gt;
&lt;p&gt;[mp_stacks_edd_purchase_link button_text=&quot;Purchase Now&quot; button_color=&quot;#f15a29&quot; button_text_color=&quot;#ffffff&quot; button_hover_color=&quot;#f23c00&quot; button_hover_text_color=&quot;#ffffff&quot;]&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_masonry' => 
      array (
        'value' => 'downloadgrid_masonry',
      ),
      'downloadgrid_featured_images_show' => 
      array (
        'value' => 'downloadgrid_featured_images_show',
      ),
      'downloadgrid_title_show' => 
      array (
        'value' => 'downloadgrid_title_show',
      ),
      'downloadgrid_title_placement' => 
      array (
        'value' => 'below_image_left',
      ),
      'downloadgrid_title_lineheight' => 
      array (
        'value' => '20',
      ),
      'downloadgrid_title_background_show' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_show' => 
      array (
        'value' => 'downloadgrid_excerpt_show',
      ),
      'downloadgrid_excerpt_lineheight' => 
      array (
        'value' => '18',
      ),
      'downloadgrid_excerpt_read_more_text' => 
      array (
        'value' => 'Read More',
      ),
      'downloadgrid_excerpt_background_show' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_show' => 
      array (
        'value' => 'downloadgrid_price_show',
      ),
      'downloadgrid_price_background_show' => 
      array (
        'value' => 'downloadgrid_price_background_show',
      ),
      'downloadgrid_load_more_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_behaviour' => 
      array (
        'value' => 'ajax_load_more',
      ),
      'downloadgrid_load_more_float' => 
      array (
        'value' => 'center',
      ),
      'downloadgrid_load_more_button_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_button_text_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_button_text' => 
      array (
        'value' => 'Load More',
      ),
      'feature_grid_layout_showhider' => 
      array (
        'value' => '',
      ),
      'feature_icon_dropshadow_showhider' => 
      array (
        'value' => '',
      ),
      'feature_shadow_apply_to' => 
      array (
        'value' => '""',
      ),
      'feature_shadow_x' => 
      array (
        'value' => '50',
      ),
      'feature_shadow_y' => 
      array (
        'value' => '50',
      ),
      'feature_shadow_blur' => 
      array (
        'value' => '50',
      ),
      'feature_shadow_color' => 
      array (
        'value' => '#000',
      ),
      'feature_shadow_opacity' => 
      array (
        'value' => '100',
      ),
      'feature_text_design_showhider' => 
      array (
        'value' => '',
      ),
      'feature_icon_design_showhider' => 
      array (
        'value' => '',
      ),
      'feature_icon_corner_radius' => 
      array (
        'value' => '0',
      ),
      'feature_icon_stroke_showhider' => 
      array (
        'value' => '',
      ),
      'feature_icon_stroke_apply_to' => 
      array (
        'value' => '""',
      ),
      'feature_icon_stroke_size' => 
      array (
        'value' => '0',
      ),
      'feature_icon_stroke_color' => 
      array (
        'value' => '#fff',
      ),
      'feature_icon_stroke_opacity' => 
      array (
        'value' => '100',
      ),
      'mailchimp_email_input_field_backgroundcolor' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_layout_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_masonry' => 
      array (
        'value' => 'postgrid_masonry',
      ),
      'postgrid_featured_images_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_show' => 
      array (
        'value' => 'postgrid_featured_images_show',
      ),
      'postgrid_featured_images_inner_margin' => 
      array (
        'value' => '20',
      ),
      'postgrid_featured_images_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_image_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'scale' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_featured_images_overlay_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_feat_overlay_img_desc' => 
      array (
        'value' => '',
      ),
      'postgrid_image_overlay_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '#FFF',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_title_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_title_show' => 
      array (
        'value' => 'postgrid_title_show',
      ),
      'postgrid_title_placement' => 
      array (
        'value' => 'below_image_left',
      ),
      'postgrid_title_lineheight' => 
      array (
        'value' => '20',
      ),
      'postgrid_title_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_title_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_title_background_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_title_background_show' => 
      array (
        'value' => '',
      ),
      'postgrid_title_background_padding' => 
      array (
        'value' => '5',
      ),
      'postgrid_title_background_color' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_title_background_opacity' => 
      array (
        'value' => '100',
      ),
      'postgrid_date_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_date_show' => 
      array (
        'value' => 'postgrid_date_show',
      ),
      'postgrid_date_placement' => 
      array (
        'value' => 'below_image_left',
      ),
      'postgrid_date_color' => 
      array (
        'value' => '#000',
      ),
      'postgrid_date_size' => 
      array (
        'value' => '13',
      ),
      'postgrid_date_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_date_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_date_background_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_date_background_show' => 
      array (
        'value' => 'postgrid_date_background_show',
      ),
      'postgrid_date_background_padding' => 
      array (
        'value' => '5',
      ),
      'postgrid_date_background_color' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_date_background_opacity' => 
      array (
        'value' => '100',
      ),
      'postgrid_excerpt_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_show' => 
      array (
        'value' => 'postgrid_excerpt_show',
      ),
      'postgrid_excerpt_placement' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_lineheight' => 
      array (
        'value' => '18',
      ),
      'postgrid_excerpt_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_excerpt_read_more_text' => 
      array (
        'value' => 'Read More',
      ),
      'postgrid_excerpt_background_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_background_show' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_background_padding' => 
      array (
        'value' => '5',
      ),
      'postgrid_excerpt_background_color' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_excerpt_background_opacity' => 
      array (
        'value' => '100',
      ),
      'postgrid_load_more_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_behaviour' => 
      array (
        'value' => 'ajax_load_more',
      ),
      'postgrid_load_more_float' => 
      array (
        'value' => 'center',
      ),
      'postgrid_load_more_button_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text' => 
      array (
        'value' => 'Load More',
      ),
    ),
    'brick_2' => 
    array (
      'brick_title' => 'Here’s a little more info',
      'mp_stack_order' => 1010,
      '_edit_lock' => 
      array (
        'value' => '1402807694:1',
      ),
      '_edit_last' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_on' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_height' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_speed_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_speed' => 
      array (
        'value' => '30',
      ),
      'mp_stacks_parallax_c1_speed' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_c2_speed' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_offset_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_offset' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c1_offset' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c2_offset' => 
      array (
        'value' => '0',
      ),
      'brick_second_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_1' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_2' => 
      array (
        'value' => '',
      ),
      'brick_second_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_min_height' => 
      array (
        'value' => '',
      ),
      'brick_max_width' => 
      array (
        'value' => '1100',
      ),
      'brick_min_above_below' => 
      array (
        'value' => '50',
      ),
      'brick_centered_inner_margins_showhider' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_below_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c2' => 
      array (
        'value' => '50',
      ),
      'brick_min_below_c2' => 
      array (
        'value' => '',
      ),
      'brick_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_class_name' => 
      array (
        'value' => '',
      ),
      'brick_bg_image' => 
      array (
        'value' => '',
      ),
      'brick_display_type' => 
      array (
        'value' => '',
      ),
      'brick_bg_image_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_bg_color' => 
      array (
        'value' => '',
      ),
      'brick_bg_color_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_first_content_type' => 
      array (
        'value' => 'text',
      ),
      'brick_second_content_type' => 
      array (
        'value' => 'features',
      ),
      'brick_alignment' => 
      array (
        'value' => 'centered',
      ),
      'brick_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_line_1_color' => 
      array (
        'value' => '#000000',
      ),
      'brick_line_1_font_size' => 
      array (
        'value' => '48',
      ),
      'brick_line_1_google_font' => 
      array (
        'value' => 'Oxygen:Light,300',
      ),
      'brick_text_line_1' => 
      array (
        'value' => 'Product Specifications:
',
      ),
      'brick_line_2_color' => 
      array (
        'value' => '',
      ),
      'brick_line_2_font_size' => 
      array (
        'value' => '',
      ),
      'brick_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_text_line_2' => 
      array (
        'value' => '',
      ),
      'brick_main_image' => 
      array (
        'value' => '',
      ),
      'brick_main_image_max_width' => 
      array (
        'value' => '',
      ),
      'brick_main_image_link_url' => 
      array (
        'value' => '',
      ),
      'brick_video_url' => 
      array (
        'value' => '',
      ),
      'brick_video_max_width' => 
      array (
        'value' => '',
      ),
      'brick_second_video_url' => 
      array (
        'value' => '',
      ),
      'brick_second_video_max_width' => 
      array (
        'value' => '',
      ),
      'brick_second__content_type_help' => 
      array (
        'value' => '',
      ),
      'feature_settings_description' => 
      array (
        'value' => '',
      ),
      'features_per_row' => 
      array (
        'value' => '3',
      ),
      'feature_text_color' => 
      array (
        'value' => '#000000',
      ),
      'feature_alignment' => 
      array (
        'value' => 'left',
      ),
      'feature_icon_size' => 
      array (
        'value' => '50',
      ),
      'feature_description' => 
      array (
        'value' => '',
      ),
      'mp_features_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'feature_title' => 
            array (
              'value' => 'High Quality Materials',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-check-square-o',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '&lt;p&gt;All of our products are made using the highest quality materials available.&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
          1 => 
          array (
            'feature_title' => 
            array (
              'value' => 'Built with passion.',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-heart',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '&lt;p&gt;We don&#039;t scrimp on quality because we are passionate about creating what we make.&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
          2 => 
          array (
            'feature_title' => 
            array (
              'value' => 'Size Specs',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-expand',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '&lt;p&gt;This product is 40 by 1000 units. Fits through any normal sized doorway and is easily portable.&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'brick_content_type_widths_and_floats' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c1' => 
      array (
        'value' => '',
      ),
      'brick_float_c1' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c2' => 
      array (
        'value' => '',
      ),
      'brick_float_c2' => 
      array (
        'value' => '',
      ),
      'brick_overall_google_font' => 
      array (
        'value' => 'Raleway',
      ),
      'mailchimp_api_key' => 
      array (
        'value' => '',
      ),
      'mailchimp_list_id' => 
      array (
        'value' => '',
      ),
      'feature_title_size' => 
      array (
        'value' => '',
      ),
      'feature_text_size' => 
      array (
        'value' => '',
      ),
      'mailchimp_success_message' => 
      array (
        'value' => '',
      ),
      'mailchimp_message_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'feature_icon_vertical_alignment' => 
      array (
        'value' => 'middle',
      ),
      'gallery_source' => 
      array (
        'value' => '',
      ),
      'gallery_wp_gallery_shortcode' => 
      array (
        'value' => '',
      ),
      'gallery_flickr_photoset_url' => 
      array (
        'value' => '',
      ),
      'gallery_justified_row_height' => 
      array (
        'value' => '',
      ),
      'mailchimp_messages_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_fontsize' => 
      array (
        'value' => '',
      ),
      'mailchimp_emailfield_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_width' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_fontsize' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_size_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_height' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_corner_radius' => 
      array (
        'value' => '',
      ),
      'postgrid_taxonomy_term' => 
      array (
        'value' => '',
      ),
      'postgrid_per_row' => 
      array (
        'value' => '',
      ),
      'postgrid_per_page' => 
      array (
        'value' => '',
      ),
      'postgrid_post_spacing' => 
      array (
        'value' => '',
      ),
      'postgrid_show_featured_images' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_width' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_height' => 
      array (
        'value' => '',
      ),
      'postgrid_show_title_and_text' => 
      array (
        'value' => '',
      ),
      'postgrid_title_color' => 
      array (
        'value' => '',
      ),
      'postgrid_title_size' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_color' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_size' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_word_limit' => 
      array (
        'value' => '',
      ),
      'postgrid_show_load_more_button' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'postgrid_mouse_over_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'postgrid_mouse_over_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'sociallinks_per_row' => 
      array (
        'value' => '',
      ),
      'sociallinks_spacing' => 
      array (
        'value' => '',
      ),
      'sociallinks_size' => 
      array (
        'value' => '',
      ),
      'sociallinks_color' => 
      array (
        'value' => '',
      ),
      'sociallinks_color_hover' => 
      array (
        'value' => '',
      ),
      'sociallink_description' => 
      array (
        'value' => '',
      ),
      'mp_sociallinks_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'sociallink_title' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_slider_images' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'mp_stacks_slider_image_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'mp_stacks_slider_video_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_text_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_line_1_color' => 
            array (
              'value' => '#000000',
              'attachment' => false,
            ),
            'brick_line_1_font_size' => 
            array (
              'value' => '48',
              'attachment' => false,
            ),
            'brick_line_1_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_google_font' => 
            array (
              'value' => 'Oxygen:Light,300',
              'attachment' => false,
            ),
            'brick_text_line_1' => 
            array (
              'value' => '&lt;p&gt;Product Specifications:&lt;/p&gt;
',
              'attachment' => false,
            ),
            'brick_line_2_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_font_size' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_line_2' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
    ),
    'brick_3' => 
    array (
      'brick_title' => 'This Product&#8217;s Story',
      'mp_stack_order' => 1020,
      '_edit_lock' => 
      array (
        'value' => '1422681367:1',
      ),
      '_edit_last' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_on' => 
      array (
        'value' => 'mp_stacks_parallax_on',
      ),
      'mp_stacks_parallax_bg_height' => 
      array (
        'value' => '650',
      ),
      'mp_stacks_parallax_speed_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_speed' => 
      array (
        'value' => '30',
      ),
      'mp_stacks_parallax_c1_speed' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_c2_speed' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_offset_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_offset' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c1_offset' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c2_offset' => 
      array (
        'value' => '0',
      ),
      'brick_second_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_1' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_2' => 
      array (
        'value' => '',
      ),
      'brick_second_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_min_height' => 
      array (
        'value' => '',
      ),
      'brick_max_width' => 
      array (
        'value' => '1100',
      ),
      'brick_min_above_below' => 
      array (
        'value' => '100',
      ),
      'brick_centered_inner_margins_showhider' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_below_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c2' => 
      array (
        'value' => '',
      ),
      'brick_min_below_c2' => 
      array (
        'value' => '',
      ),
      'brick_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_class_name' => 
      array (
        'value' => '',
      ),
      'brick_bg_image' => 
      array (
        'value' => '',
      ),
      'brick_display_type' => 
      array (
        'value' => '',
      ),
      'brick_bg_image_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_bg_color' => 
      array (
        'value' => '#24262b',
      ),
      'brick_bg_color_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_first_content_type' => 
      array (
        'value' => 'text',
      ),
      'brick_second_content_type' => 
      array (
        'value' => 'features',
      ),
      'brick_alignment' => 
      array (
        'value' => 'leftright',
      ),
      'brick_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_line_1_color' => 
      array (
        'value' => '#ffffff',
      ),
      'brick_line_1_font_size' => 
      array (
        'value' => '28',
      ),
      'brick_line_1_google_font' => 
      array (
        'value' => 'Raleway',
      ),
      'brick_text_line_1' => 
      array (
        'value' => '&lt;p&gt;What is Launchstack?&lt;/p&gt;
',
      ),
      'brick_line_2_color' => 
      array (
        'value' => '#ffffff',
      ),
      'brick_line_2_font_size' => 
      array (
        'value' => '18',
      ),
      'brick_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_text_line_2' => 
      array (
        'value' => '&lt;p&gt;Launchstack is like a WordPress theme on steriods - but good ones. Maybe more like Kale, or Blueberries. It&#039;s a mix of all the right WordPress plugins in all the right places which auto installs.&lt;/p&gt;
&lt;p&gt;It gives you page templates for your Home Page, Contact Page, About Page, Product Sales Pages, and more! Just click, boom, and your new page is beautiful! The theme bundle even includes the rights to use all images seen in this demo - a first in the WordPress theme world!&lt;/p&gt;
&lt;p&gt;[mp_button icon=&quot;fa-shopping-cart&quot; text=&quot;Buy Now&quot; link=&quot;&quot; color=&quot;#f15a29&quot; text_color=&quot;#ffffff&quot; hover_color=&quot;#f23c00&quot; hover_text_color=&quot;#ffffff&quot; open_type=&quot;_self&quot;]&lt;/p&gt;
',
      ),
      'brick_main_image' => 
      array (
        'value' => '',
      ),
      'brick_main_image_max_width' => 
      array (
        'value' => '',
      ),
      'brick_main_image_link_url' => 
      array (
        'value' => '',
      ),
      'brick_video_url' => 
      array (
        'value' => '',
      ),
      'brick_video_max_width' => 
      array (
        'value' => '',
      ),
      'brick_second_video_url' => 
      array (
        'value' => '',
      ),
      'brick_second_video_max_width' => 
      array (
        'value' => '',
      ),
      'brick_second__content_type_help' => 
      array (
        'value' => '',
      ),
      'feature_settings_description' => 
      array (
        'value' => '',
      ),
      'features_per_row' => 
      array (
        'value' => '1',
      ),
      'feature_text_color' => 
      array (
        'value' => '#ffffff',
      ),
      'feature_alignment' => 
      array (
        'value' => 'left',
      ),
      'feature_icon_size' => 
      array (
        'value' => '20',
      ),
      'feature_description' => 
      array (
        'value' => '',
      ),
      'mp_features_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'feature_title' => 
            array (
              'value' => 'Spec 1\'s Title',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-flag',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
          1 => 
          array (
            'feature_title' => 
            array (
              'value' => 'Spec 2\'s Title',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-bookmark',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
          2 => 
          array (
            'feature_title' => 
            array (
              'value' => 'Spec 3\'s Title',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-comment',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
          3 => 
          array (
            'feature_title' => 
            array (
              'value' => 'Spec 4\'s Title',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => 'feature_icon',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => 'fa-leaf',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'brick_content_type_widths_and_floats' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c1' => 
      array (
        'value' => '',
      ),
      'brick_float_c1' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c2' => 
      array (
        'value' => '370',
      ),
      'brick_float_c2' => 
      array (
        'value' => 'right',
      ),
      'brick_overall_google_font' => 
      array (
        'value' => 'Oxygen:Light,300',
      ),
      'mailchimp_api_key' => 
      array (
        'value' => '',
      ),
      'mailchimp_list_id' => 
      array (
        'value' => '',
      ),
      'feature_title_size' => 
      array (
        'value' => '20',
      ),
      'feature_text_size' => 
      array (
        'value' => '15',
      ),
      'gallery_source' => 
      array (
        'value' => '',
      ),
      'gallery_wp_gallery_shortcode' => 
      array (
        'value' => '',
      ),
      'gallery_flickr_photoset_url' => 
      array (
        'value' => '',
      ),
      'gallery_justified_row_height' => 
      array (
        'value' => '',
      ),
      'mailchimp_success_message' => 
      array (
        'value' => '',
      ),
      'mailchimp_message_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_size' => 
      array (
        'value' => '',
      ),
      'postgrid_taxonomy_term' => 
      array (
        'value' => '',
      ),
      'postgrid_per_row' => 
      array (
        'value' => '',
      ),
      'postgrid_per_page' => 
      array (
        'value' => '',
      ),
      'postgrid_post_spacing' => 
      array (
        'value' => '',
      ),
      'postgrid_show_featured_images' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_width' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_height' => 
      array (
        'value' => '',
      ),
      'postgrid_show_title_and_text' => 
      array (
        'value' => '',
      ),
      'postgrid_title_color' => 
      array (
        'value' => '',
      ),
      'postgrid_title_size' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_color' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_size' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_word_limit' => 
      array (
        'value' => '',
      ),
      'postgrid_show_load_more_button' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'postgrid_mouse_over_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'postgrid_mouse_over_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'feature_icon_vertical_alignment' => 
      array (
        'value' => 'middle',
      ),
      'sociallinks_per_row' => 
      array (
        'value' => '',
      ),
      'sociallinks_spacing' => 
      array (
        'value' => '',
      ),
      'sociallinks_size' => 
      array (
        'value' => '',
      ),
      'sociallinks_color' => 
      array (
        'value' => '',
      ),
      'sociallinks_color_hover' => 
      array (
        'value' => '',
      ),
      'sociallink_description' => 
      array (
        'value' => '',
      ),
      'mp_sociallinks_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'sociallink_title' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mailchimp_messages_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_fontsize' => 
      array (
        'value' => '',
      ),
      'mailchimp_emailfield_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_width' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_fontsize' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_size_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_height' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_corner_radius' => 
      array (
        'value' => '',
      ),
      'mp_stacks_text_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_line_1_color' => 
            array (
              'value' => '#ffffff',
              'attachment' => false,
            ),
            'brick_line_1_font_size' => 
            array (
              'value' => '28',
              'attachment' => false,
            ),
            'brick_line_1_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_google_font' => 
            array (
              'value' => 'Raleway',
              'attachment' => false,
            ),
            'brick_text_line_1' => 
            array (
              'value' => '&lt;p&gt;This Product&amp;#039;s Story.&lt;/p&gt;
',
              'attachment' => false,
            ),
            'brick_line_2_color' => 
            array (
              'value' => '#ffffff',
              'attachment' => false,
            ),
            'brick_line_2_font_size' => 
            array (
              'value' => '18',
              'attachment' => false,
            ),
            'brick_line_2_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_line_2' => 
            array (
              'value' => '&lt;p&gt;This is a great place to tell a story about your product, why you love making it, and how it will help your customer. Connecting potential customers to the company behind the product is a great way to develop loyal customers who will support your ideas and motivate you. They are also more likely to buy if they feel a personal connection to the product and brand.&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_slider_images' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'mp_stacks_slider_image_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'mp_stacks_slider_video_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
    ),
    'brick_4' => 
    array (
      'brick_title' => 'Related Products',
      'mp_stack_order' => 1030,
      '_edit_lock' => 
      array (
        'value' => '1425065277:3',
      ),
      '_edit_last' => 
      array (
        'value' => '3',
      ),
      'brick_overall_google_font' => 
      array (
        'value' => 'Oxygen:Light,300',
      ),
      'mp_stacks_parallax_on' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_height' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_speed_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_speed' => 
      array (
        'value' => '30',
      ),
      'mp_stacks_parallax_c1_speed' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_c2_speed' => 
      array (
        'value' => '1',
      ),
      'mp_stacks_parallax_offset_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_parallax_bg_offset' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c1_offset' => 
      array (
        'value' => '0',
      ),
      'mp_stacks_parallax_c2_offset' => 
      array (
        'value' => '0',
      ),
      'brick_second_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_1_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_1' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_color' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_font_size' => 
      array (
        'value' => '',
      ),
      'brick_second_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_second_text_line_2' => 
      array (
        'value' => '',
      ),
      'brick_second_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_min_height' => 
      array (
        'value' => '',
      ),
      'brick_max_width' => 
      array (
        'value' => '1100',
      ),
      'brick_min_above_below' => 
      array (
        'value' => '80',
      ),
      'brick_centered_inner_margins_showhider' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_below_c1' => 
      array (
        'value' => '',
      ),
      'brick_min_above_c2' => 
      array (
        'value' => '',
      ),
      'brick_min_below_c2' => 
      array (
        'value' => '',
      ),
      'brick_content_type_widths_and_floats' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c1' => 
      array (
        'value' => '',
      ),
      'brick_float_c1' => 
      array (
        'value' => '',
      ),
      'brick_max_width_c2' => 
      array (
        'value' => '',
      ),
      'brick_float_c2' => 
      array (
        'value' => '',
      ),
      'brick_content_type_help' => 
      array (
        'value' => '',
      ),
      'brick_class_name' => 
      array (
        'value' => '',
      ),
      'brick_bg_image' => 
      array (
        'value' => '',
      ),
      'brick_display_type' => 
      array (
        'value' => '',
      ),
      'brick_bg_image_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_bg_color' => 
      array (
        'value' => '',
      ),
      'brick_bg_color_opacity' => 
      array (
        'value' => '100',
      ),
      'brick_first_content_type' => 
      array (
        'value' => 'singletext',
      ),
      'brick_second_content_type' => 
      array (
        'value' => 'downloadgrid',
      ),
      'brick_alignment' => 
      array (
        'value' => 'centered',
      ),
      'brick_text_media_type_description' => 
      array (
        'value' => '',
      ),
      'brick_line_1_color' => 
      array (
        'value' => '',
      ),
      'brick_line_1_font_size' => 
      array (
        'value' => '',
      ),
      'brick_line_1_google_font' => 
      array (
        'value' => '',
      ),
      'brick_text_line_1' => 
      array (
        'value' => '',
      ),
      'brick_line_2_color' => 
      array (
        'value' => '',
      ),
      'brick_line_2_font_size' => 
      array (
        'value' => '',
      ),
      'brick_line_2_google_font' => 
      array (
        'value' => '',
      ),
      'brick_text_line_2' => 
      array (
        'value' => '',
      ),
      'brick_main_image' => 
      array (
        'value' => '',
      ),
      'brick_main_image_max_width' => 
      array (
        'value' => '',
      ),
      'brick_main_image_link_url' => 
      array (
        'value' => '',
      ),
      'brick_video_url' => 
      array (
        'value' => '',
      ),
      'brick_video_max_width' => 
      array (
        'value' => '',
      ),
      'mailchimp_api_key' => 
      array (
        'value' => '',
      ),
      'mailchimp_list_id' => 
      array (
        'value' => '',
      ),
      'mailchimp_success_message' => 
      array (
        'value' => '',
      ),
      'mailchimp_message_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_color' => 
      array (
        'value' => '',
      ),
      'mailchimp_mouseover_submit_button_text_color' => 
      array (
        'value' => '',
      ),
      'brick_second_video_url' => 
      array (
        'value' => '',
      ),
      'brick_second_video_max_width' => 
      array (
        'value' => '',
      ),
      'brick_second__content_type_help' => 
      array (
        'value' => '',
      ),
      'feature_settings_description' => 
      array (
        'value' => '',
      ),
      'features_per_row' => 
      array (
        'value' => '',
      ),
      'feature_text_color' => 
      array (
        'value' => '',
      ),
      'feature_alignment' => 
      array (
        'value' => '',
      ),
      'feature_icon_size' => 
      array (
        'value' => '',
      ),
      'feature_icon_vertical_alignment' => 
      array (
        'value' => '',
      ),
      'feature_title_size' => 
      array (
        'value' => '',
      ),
      'feature_text_size' => 
      array (
        'value' => '',
      ),
      'feature_description' => 
      array (
        'value' => '',
      ),
      'mp_features_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'feature_title' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'feature_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_taxonomy_term' => 
      array (
        'value' => '',
      ),
      'postgrid_per_row' => 
      array (
        'value' => '3',
      ),
      'postgrid_show_featured_images' => 
      array (
        'value' => 'postgrid_show_featured_images',
      ),
      'postgrid_featured_images_width' => 
      array (
        'value' => '300',
      ),
      'postgrid_featured_images_height' => 
      array (
        'value' => '140',
      ),
      'postgrid_show_title_and_text' => 
      array (
        'value' => 'postgrid_show_title_and_text',
      ),
      'postgrid_title_color' => 
      array (
        'value' => '#dd3333',
      ),
      'postgrid_title_size' => 
      array (
        'value' => '20',
      ),
      'postgrid_excerpt_color' => 
      array (
        'value' => '#232323',
      ),
      'postgrid_excerpt_size' => 
      array (
        'value' => '15',
      ),
      'postgrid_excerpt_word_limit' => 
      array (
        'value' => '15',
      ),
      'postgrid_per_page' => 
      array (
        'value' => '3',
      ),
      'postgrid_show_load_more_button' => 
      array (
        'value' => 'postgrid_show_load_more_button',
      ),
      'postgrid_post_spacing' => 
      array (
        'value' => '10',
      ),
      'postgrid_load_more_button_color' => 
      array (
        'value' => '#f15a29',
      ),
      'postgrid_load_more_button_text_color' => 
      array (
        'value' => '#ffffff',
      ),
      'postgrid_mouse_over_load_more_button_color' => 
      array (
        'value' => '#f23c00',
      ),
      'postgrid_mouse_over_load_more_button_text_color' => 
      array (
        'value' => '#ffffff',
      ),
      'gallery_source' => 
      array (
        'value' => '',
      ),
      'gallery_wp_gallery_shortcode' => 
      array (
        'value' => '',
      ),
      'gallery_flickr_photoset_url' => 
      array (
        'value' => '',
      ),
      'gallery_justified_row_height' => 
      array (
        'value' => '',
      ),
      'sociallinks_per_row' => 
      array (
        'value' => '',
      ),
      'sociallinks_spacing' => 
      array (
        'value' => '',
      ),
      'sociallinks_size' => 
      array (
        'value' => '',
      ),
      'sociallinks_color' => 
      array (
        'value' => '',
      ),
      'sociallink_description' => 
      array (
        'value' => '',
      ),
      'mp_sociallinks_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'sociallink_title' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_color_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_image_hover' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'sociallink_icon_link_type' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mailchimp_messages_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_color_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_submit_button_fontsize' => 
      array (
        'value' => '',
      ),
      'mailchimp_emailfield_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_width' => 
      array (
        'value' => '',
      ),
      'mailchimp_email_input_field_fontsize' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_size_settings_showhider' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_height' => 
      array (
        'value' => '',
      ),
      'mailchimp_overall_corner_radius' => 
      array (
        'value' => '',
      ),
      'sociallinks_color_hover' => 
      array (
        'value' => '',
      ),
      'mp_stacks_text_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_line_1_color' => 
            array (
              'value' => '#000000',
              'attachment' => false,
            ),
            'brick_line_1_font_size' => 
            array (
              'value' => '40',
              'attachment' => false,
            ),
            'brick_line_1_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_1_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text_line_1' => 
            array (
              'value' => '&lt;p style=&quot;text-align: left;&quot;&gt;Related Products&lt;/p&gt;
',
              'attachment' => false,
            ),
            'brick_line_2_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_font_size' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_line_2_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text_line_2' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_slider_images' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'mp_stacks_slider_image_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'mp_stacks_slider_video_url' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_image_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'scale' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_image_overlay_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '#FFF',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_title_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_title_background_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '50',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '#FFF',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_excerpt_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'brick_split_percentage' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_taxonomy_term' => 
      array (
        'value' => 'related_downloads',
      ),
      'downloadgrid_image_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'scale' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_image_overlay_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '#FFF',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_title_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_excerpt_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_price_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_layout_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_per_row' => 
      array (
        'value' => '3',
      ),
      'downloadgrid_per_page' => 
      array (
        'value' => '3',
      ),
      'downloadgrid_post_spacing' => 
      array (
        'value' => '10',
      ),
      'downloadgrid_featured_images_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_featured_images' => 
      array (
        'value' => 'downloadgrid_show_featured_images',
      ),
      'downloadgrid_featured_images_width' => 
      array (
        'value' => '300',
      ),
      'downloadgrid_featured_images_height' => 
      array (
        'value' => '140',
      ),
      'downloadgrid_featured_images_inner_margin' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_overlay_settings' => 
      array (
        'value' => '',
      ),
      'dl_grid_feat_overlay_img_desc' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_titles' => 
      array (
        'value' => 'downloadgrid_show_titles',
      ),
      'downloadgrid_titles_placement' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_size' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_leading' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_title_backgrounds' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_padding' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_title_background_opacity' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_excerpt_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_excerpts' => 
      array (
        'value' => 'downloadgrid_show_excerpts',
      ),
      'downloadgrid_excerpt_placement' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_size' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_leading' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_word_limit' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_excerpt_backgrounds' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_padding' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_background_opacity' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_price_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_prices' => 
      array (
        'value' => 'downloadgrid_show_prices',
      ),
      'downloadgrid_price_placement' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_color' => 
      array (
        'value' => '#000',
      ),
      'downloadgrid_price_size' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_leading' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_word_limit' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_animation_description' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_background_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_price_backgrounds' => 
      array (
        'value' => 'downloadgrid_show_price_backgrounds',
      ),
      'downloadgrid_price_background_padding' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_background_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_background_opacity' => 
      array (
        'value' => '50',
      ),
      'downloadgrid_ajax_load_more_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_show_load_more_button' => 
      array (
        'value' => 'downloadgrid_show_load_more_button',
      ),
      'downloadgrid_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_mouse_over_load_more_button_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_mouse_over_load_more_button_text_color' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_text' => 
      array (
        'value' => '',
      ),
      'mp_stacks_navigation_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_show_nav' => 
      array (
        'value' => '',
      ),
      'mp_stacks_nav_color' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slideshow_settings' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slideshow_on' => 
      array (
        'value' => '',
      ),
      'mp_stacks_animation_style' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_speed' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_sizes' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_width' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_height' => 
      array (
        'value' => '',
      ),
      'mp_stacks_slider_description' => 
      array (
        'value' => '',
      ),
      'feature_spacing' => 
      array (
        'value' => '20',
      ),
      'mailchimp_email_input_field_fontcolor' => 
      array (
        'value' => '#000',
      ),
      'mp_stacks_second_singletext_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_second_text_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_second_text_font_size' => 
            array (
              'value' => '35',
              'attachment' => false,
            ),
            'brick_second_text_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_second_text_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_second_text_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_second_text' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'mp_stacks_sociallinks_links_showhider' => 
      array (
        'value' => '',
      ),
      'mp_stacks_sociallinks_layout_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_per_row' => 
      array (
        'value' => '3',
      ),
      'widgets_title_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_title_color' => 
      array (
        'value' => '',
      ),
      'widgets_title_size' => 
      array (
        'value' => '25',
      ),
      'widgets_title_bottom_margin' => 
      array (
        'value' => '10',
      ),
      'widgets_text_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_text_color' => 
      array (
        'value' => '',
      ),
      'widgets_text_size' => 
      array (
        'value' => '16',
      ),
      'widgets_text_bottom_margin' => 
      array (
        'value' => '5',
      ),
      'widgets_links_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_links_color' => 
      array (
        'value' => '',
      ),
      'widgets_links_hover_color' => 
      array (
        'value' => '',
      ),
      'widgets_link_underlines' => 
      array (
        'value' => '',
      ),
      'widgets_lists_showhider' => 
      array (
        'value' => '',
      ),
      'widgets_list_item_spacing' => 
      array (
        'value' => '15',
      ),
      'manage_sidebar' => 
      array (
        'value' => '',
      ),
      'brick_min_below' => 
      array (
        'value' => '',
      ),
      'brick_no_borders' => 
      array (
        'value' => '',
      ),
      'brick_bg_image_showhider' => 
      array (
        'value' => '',
      ),
      'brick_bg_color_showhider' => 
      array (
        'value' => '',
      ),
      'mp_stacks_singletext_content_type_repeater' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'brick_text_color' => 
            array (
              'value' => '#000000',
              'attachment' => false,
            ),
            'brick_text_font_size' => 
            array (
              'value' => '40',
              'attachment' => false,
            ),
            'brick_text_line_height' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_google_font' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'brick_text_paragraph_margin_bottom' => 
            array (
              'value' => '15',
              'attachment' => false,
            ),
            'brick_text' => 
            array (
              'value' => '&lt;p&gt;Related Products&lt;/p&gt;
',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_layout_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_masonry' => 
      array (
        'value' => 'postgrid_masonry',
      ),
      'postgrid_featured_images_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_show' => 
      array (
        'value' => 'postgrid_featured_images_show',
      ),
      'postgrid_featured_images_inner_margin' => 
      array (
        'value' => '20',
      ),
      'postgrid_featured_images_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_featured_images_overlay_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_feat_overlay_img_desc' => 
      array (
        'value' => '',
      ),
      'postgrid_title_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_title_show' => 
      array (
        'value' => 'postgrid_title_show',
      ),
      'postgrid_title_placement' => 
      array (
        'value' => 'below_image_left',
      ),
      'postgrid_title_lineheight' => 
      array (
        'value' => '20',
      ),
      'postgrid_title_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_title_background_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_title_background_show' => 
      array (
        'value' => '',
      ),
      'postgrid_title_background_padding' => 
      array (
        'value' => '5',
      ),
      'postgrid_title_background_color' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_title_background_opacity' => 
      array (
        'value' => '100',
      ),
      'postgrid_date_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_date_show' => 
      array (
        'value' => 'postgrid_date_show',
      ),
      'postgrid_date_placement' => 
      array (
        'value' => 'below_image_left',
      ),
      'postgrid_date_color' => 
      array (
        'value' => '#000',
      ),
      'postgrid_date_size' => 
      array (
        'value' => '13',
      ),
      'postgrid_date_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_date_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'opacity' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_date_background_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_date_background_show' => 
      array (
        'value' => 'postgrid_date_background_show',
      ),
      'postgrid_date_background_padding' => 
      array (
        'value' => '5',
      ),
      'postgrid_date_background_color' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_date_background_opacity' => 
      array (
        'value' => '100',
      ),
      'postgrid_excerpt_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_show' => 
      array (
        'value' => 'postgrid_excerpt_show',
      ),
      'postgrid_excerpt_placement' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_lineheight' => 
      array (
        'value' => '18',
      ),
      'postgrid_excerpt_animation_description' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_read_more_text' => 
      array (
        'value' => 'Read More',
      ),
      'postgrid_excerpt_background_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_background_show' => 
      array (
        'value' => '',
      ),
      'postgrid_excerpt_background_padding' => 
      array (
        'value' => '5',
      ),
      'postgrid_excerpt_background_color' => 
      array (
        'value' => '#FFF',
      ),
      'postgrid_excerpt_background_opacity' => 
      array (
        'value' => '100',
      ),
      'postgrid_load_more_settings' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_behaviour' => 
      array (
        'value' => 'ajax_load_more',
      ),
      'postgrid_load_more_float' => 
      array (
        'value' => 'center',
      ),
      'postgrid_load_more_button_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'postgrid_load_more_button_text' => 
      array (
        'value' => 'Load More',
      ),
      'downloadgrid_masonry' => 
      array (
        'value' => '',
      ),
      'downloadgrid_featured_images_show' => 
      array (
        'value' => 'downloadgrid_featured_images_show',
      ),
      'downloadgrid_title_show' => 
      array (
        'value' => 'downloadgrid_title_show',
      ),
      'downloadgrid_title_placement' => 
      array (
        'value' => 'below_image_left',
      ),
      'downloadgrid_title_lineheight' => 
      array (
        'value' => '20',
      ),
      'downloadgrid_title_background_show' => 
      array (
        'value' => '',
      ),
      'downloadgrid_excerpt_show' => 
      array (
        'value' => 'downloadgrid_excerpt_show',
      ),
      'downloadgrid_excerpt_lineheight' => 
      array (
        'value' => '18',
      ),
      'downloadgrid_excerpt_read_more_text' => 
      array (
        'value' => 'Read More',
      ),
      'downloadgrid_excerpt_background_show' => 
      array (
        'value' => '',
      ),
      'downloadgrid_price_show' => 
      array (
        'value' => 'downloadgrid_price_show',
      ),
      'downloadgrid_price_background_show' => 
      array (
        'value' => 'downloadgrid_price_background_show',
      ),
      'downloadgrid_load_more_settings' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_behaviour' => 
      array (
        'value' => 'ajax_load_more',
      ),
      'downloadgrid_load_more_float' => 
      array (
        'value' => 'center',
      ),
      'downloadgrid_load_more_button_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_button_text_color_mouse_over' => 
      array (
        'value' => '',
      ),
      'downloadgrid_load_more_button_text' => 
      array (
        'value' => 'Load More',
      ),
      'downloadgrid_taxonomy_terms' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'taxonomy_term' => 
            array (
              'value' => 'related_downloads',
              'attachment' => false,
            ),
            'taxonomy_bg_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'downloadgrid_bg_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'backgroundColorAlpha' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'scale' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'feature_shadow_apply_to' => 
      array (
        'value' => '""',
      ),
      'feature_icon_stroke_apply_to' => 
      array (
        'value' => '""',
      ),
      'postgrid_taxonomy_terms' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'taxonomy_term' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'taxonomy_bg_color' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'postgrid_bg_animation_keyframes' => 
      array (
        'value' => 
        array (
          0 => 
          array (
            'animation_length' => 
            array (
              'value' => '500',
              'attachment' => false,
            ),
            'backgroundColor' => 
            array (
              'value' => '',
              'attachment' => false,
            ),
            'backgroundColorAlpha' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
            'rotateZ' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateX' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'translateY' => 
            array (
              'value' => '0',
              'attachment' => false,
            ),
            'scale' => 
            array (
              'value' => '100',
              'attachment' => false,
            ),
          ),
        ),
      ),
      'brick_ct1_shadow_enabled' => 
      array (
        'value' => '',
      ),
      'brick_ct2_shadow_enabled' => 
      array (
        'value' => '',
      ),
    ),
  ),
);
		
		//Loop through each brick
		foreach( $template_array['stack_bricks'] as $brick_name => $brick_options ){
			
			//Loop through each meta option
			foreach( $brick_options as $meta_key => $meta_option ){
				
				//If this isn't the title or the order
				if ( $meta_key != 'brick_title' && $meta_key != 'mp_stack_order' ){
						
					//If this is a repeater
					if ( isset( $meta_option['value'] ) && is_array( $meta_option['value'] ) ){
						
						$fixed_repeaters = array();
						
						$repeat_counter = 0;
						
						//Loop thorugh each repeater
						foreach( $meta_option['value'] as $repeaters ){
							
							//Loop through each field in this repeater
							foreach( $repeaters as $field_key_id => $repeater_meta_option ){
								
								//If this is an attachment, set the url to be local to this plugin
								if ( isset( $repeater_meta_option['attachment'] ) && $repeater_meta_option['attachment'] ){
									
									$template_array['stack_bricks'][$brick_name][$meta_key]['value'][$repeat_counter][$field_key_id]['value'] = plugins_url( 'images/' . $repeater_meta_option['value'], __FILE__ );
									
								}
							}
							
							$repeat_counter = $repeat_counter + 1;
							
						}
					}
					
					//If this is not a repeater
					else{
						
						//If this is an attachment, set the url to be local to this plugin
						if ( isset( $meta_option['attachment'] ) && $meta_option['attachment'] ){
							$template_array['stack_bricks'][$brick_name][$meta_key]['value'] = plugins_url( 'images/' . $meta_option['value'], __FILE__ );
						}
						
					}
				}
				
			}
			
		}
		
		return $template_array;
		
	}}