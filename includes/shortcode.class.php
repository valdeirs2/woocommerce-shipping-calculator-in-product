<?php 

class Correios_Shipping_Shortcode extends Correios_Shipping_Frontend_Site{

	public function __construct() {

		add_shortcode( 'shipping_calculator_on_product_page', array( $this,'add_shortcode') );
	}

	public function add_shortcode( $atts, $content = "" ) {

		if( !is_product() )	return;

		if( 'shortcode' != get_option('wscip_position') )
			return __('Para usar o shortcode, selecione "Shortcode" no menu "Posição"','');

		ob_start();

		$this->load_form_shipping();

		return ob_get_clean();
	}
}

new Correios_Shipping_Shortcode;