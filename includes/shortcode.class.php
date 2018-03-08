<?php 

class Correios_Shipping_Shortcode extends Correios_Shipping_Frontend_Site{

	public static function init() {

		add_shortcode( 'shipping_calculator_on_product_page', __CLASS__ . '::add_shortcode' );
	}

	public static function add_shortcode( $atts, $content = "" ) {

		if( !is_product() )	return;

		if( 'shortcode' != get_option('wscip_position') )
			return 'Para usar o shortcode, selecione "Shortcode" no menu "Posição"';

		ob_start();

		return self::load_form_shipping();


	}
}

Correios_Shipping_Shortcode::init();