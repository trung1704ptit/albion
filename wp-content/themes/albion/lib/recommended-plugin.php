<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'albion_register_required_plugins' );

function albion_register_required_plugins() {

	$plugins = array(
		
		array(
			'name'               => esc_html__('Albion Toolkit', 'albion'),
			'slug'               => 'albion-toolkit',
			'source'             => get_stylesheet_directory() . '/lib/plugins/albion-toolkit.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		//Elementor Page Builder
		array(
			'name'               => esc_html__('Elementor Pro Page Builder', 'albion'),
			'slug'               => 'elementor-pro',
			'source'             => get_stylesheet_directory() . '/lib/plugins/elementor-pro.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		//ACF Pro
		array(
			'name'               => esc_html__('Advance Custom Field Pro', 'albion'),
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		// albion Plugin
		array(
			'name'      => esc_html__('Elementor', 'albion'),
			'slug'      => 'elementor',
			'required'  => true,
		),

		array(
			'name'      => esc_html__('Contact Form 7', 'albion'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Newsletter', 'albion'),
			'slug'      => 'newsletter',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('One Click Demo Import', 'albion'),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true, 
		'dismissable'  => true, 
		'dismiss_msg'  => '',   
		'is_automatic' => false, 
		'message'      => '',                      
	);
	tgmpa( $plugins, $config );
}