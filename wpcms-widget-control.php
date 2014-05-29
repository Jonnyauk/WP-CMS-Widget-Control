<?php
/*
 Plugin Name: WP-CMS Widget Control
 Plugin URI: http://wp-cms.com
 Description: Remove any core, theme or plugin widget from the Widgets setting screen.
 Author: Jonny Allbut
 Version: 1.0
 Author URI: http://jonnya.net
*/

/*

/////////  VERSION HISTORY

1.0		- First release

*/


/**
 *
 * Execute plugin
 *
 */
function wpcms_wc_admin_do(){
	$wpcms_wc_admin_do = ( is_admin() ) ? new wpcms_widget_control : '';
}
add_action('init','wpcms_wc_admin_do',1);


/**
 *
 * All the widget control functionality
 *
 */
class wpcms_widget_control{


	var $plugin; /* Common plugin definition */
	var $widget_data; /* Saved options */
	var $widgets_available; /* Holds master array of all core WP widget data */


	function __construct(){

		// Setup data
		$this->plugin = 'wpcms-widget-setting';
	    $this->widget_data = get_option( $this->plugin );
		$this->widgets_available = ( isset($GLOBALS['wp_widget_factory']) ) ? $GLOBALS['wp_widget_factory'] : '';

		// Do it
		add_action( 'admin_init', array($this,'settings_init') );
		add_action( 'admin_menu', array($this,'admin_menu') );
		add_action( 'widgets_init', array($this,'unregister_widgets'), 11 );

	}


	/**
	 *
	 * Returns a cleaner array of widget data for use
	 *
	 */
	function get_widgets(){

		$clean_array = '';

		if ( is_array($this->widgets_available->widgets) && !empty($this->widgets_available->widgets) ){
			foreach ($this->widgets_available->widgets as $key => $value) {
				$clean_array[$key]['nice_name'] = $value->name;
				$clean_array[$key]['description'] = $value->widget_options['description'];
			}
		}

		return($clean_array);

	}


	/**
	 *
	 * Adds admin menu
	 *
	 */
	function admin_menu() {

	    add_options_page(
	    	esc_html__( 'Widget Control', $this->plugin ),
	    	esc_html__( 'Widget Control', $this->plugin ),
	    	'manage_options',
	    	$this->plugin,
	    	array($this,'admin_page')
		);

	}


	/**
	 *
	 * Renders admin menu
	 *
	 */
	function admin_page(){

		global $pagenow;


		echo '<div class="wrap">';
		echo '<h2>' . esc_html__( 'WP-CMS Widget Control', $this->plugin ) . '</h2>';

		echo '<form action="options.php" method="POST">';
		submit_button( esc_html__('Update widget settings', $this->plugin) );
		settings_fields( $this->plugin . 'group1' );
		do_settings_sections( $this->plugin . 'section1' );
		submit_button( esc_html__('Update widget settings', $this->plugin) );

		echo '</form>';
		echo '</div>';

	}


	/**
	 *
	 * WP Settings API init
	 *
	 */
	function settings_init() {

		register_setting( $this->plugin . 'group1', $this->plugin, array($this,'sanitize_data') );
	    add_settings_section( 'form-section-one', null, array($this,'section_one_callback'), $this->plugin . 'section1' );

		$widgets = $this->get_widgets();

		if ( !empty($widgets) ){

			foreach ($widgets as $key => $value) {
				add_settings_field(
					$this->plugin . '[' . $key . ']',
					$value['nice_name'],
					array($this,'field_builder'),
					$this->plugin . 'section1',
					'form-section-one',
					array(
						'name' => $value['nice_name'],
						'desc' => ( !empty($value['description']) ) ? $value['description'] : '',
						'def' => $key
					)
				);

			}

		}

	}


	/**
	 *
	 * Settings section intro
	 *
	 */
	function section_one_callback() {


		echo '<p>';
		esc_html_e( 'Tick the options below to hide them from the widget screen and stop them being used on your site.', $this->plugin );
		echo '</p>';
		echo '<p><strong>';
		esc_html_e( 'WARNING - DO NOT REMOVE WIDGETS YOU ARE CURRENTLY USING - you risk deleting them (and their settings) from your site - so use with caution!', $this->plugin );
		echo '</strong></p>';
	}


	/**
	 *
	 * Common settings field builder
	 *
	 */
	function field_builder($args) {

		$data = ( !empty($this->widget_data) && array_key_exists($args['def'], $this->widget_data) ) ? $this->widget_data[$args['def']] : false;

		echo '<input name="' . $this->plugin . '[' . $args['def'] . ']" ';
		echo 'id="' . esc_attr($args['desc'] ) . '[' . $args['def'] . '" ';
		echo 'type="checkbox" value="1" ' . checked( 1, $data, false ) . ' /> ';
		echo '<span class="description">' . esc_html($args['desc'] ) . '</span>';

	}


	/**
	 *
	 * Sanitize input before saving like any good plugin should!
	 *
	 */
	function sanitize_data($input) {

		$clean_data = array();

		if ( !empty($input) && is_array($input) ){
			foreach ($input as $key => $value) {
				if ($value == 1){
					$clean_data[$key] = $value;
				}
			}
		}

		return $clean_data;

	}


	/**
	 *
	 * Sanitize input before saving like any good plugin should!
	 *
	 */
	function unregister_widgets() {

		global $pagenow;

		if ( $pagenow == 'widgets.php' && is_array($this->widget_data) ){
			foreach ( $this->widget_data as $widget => $value ) {
				unregister_widget($widget);
			}
		}

	}

}
?>