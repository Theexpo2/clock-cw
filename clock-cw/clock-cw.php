<?php 
/**
 * @package Clock CW
 */
/*
Plugin Name: Clock CW
Plugin URI: 
Description: Fecha Dinamica. Shortcode => [clock-cw] <=
Version: 1.0
Author: Theexpo2
Author URI: 
License: GPLv2 or later
Text Domain: Clock CW
*/

Clock_CW::get_instance();

class Clock_CW {

	// Atributos
	private static $instance = null;
	private $slug = "clock-cw";

	public function __construct(){
		add_shortcode( $this->slug, array( $this, 'get_clock' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	public function scripts(){
		wp_register_script( $this->slug . '-main-js', plugin_dir_url( __FILE__ ) . "js/main.js", array( 'jquery' ) );
		wp_enqueue_script( $this->slug . '-main-js' );
	}

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function get_clock( $atts ){
		return '<p id="clock-cw">Hoy es ' . date_i18n( __( 'l, j \d\e F \d\e Y', 'textdomain' ) ) . ' y son las <span class="hora">' . date_i18n( 'g' ) . '</span>:<span class="minuto">' . date_i18n( 'i' ) . '</span>:<span class="segundo">' . date_i18n( 's' ) . '</span> <span class="pm">' . date_i18n( 'a' ) . '</span></p>';
	}
}
