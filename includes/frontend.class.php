<?php 

class Correios_Shipping_Frontend_Site {

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this,'register_scripts') );
		
		add_action( get_option('wscip_position', 'woocommerce_after_add_to_cart_button'), array( $this, 'load_form_shipping' ) );

		add_action('wp_head', array( $this, 'set_var_admin_url' ) );

	}	

	public function load_form_shipping( $content = null) {

		global $post;

		$product = wc_get_product( $post->ID );

		if (!$product->needs_shipping() || get_option('woocommerce_calc_shipping') === 'no' )
	        return null;


	    include_once dirname( __DIR__ ) . '/templates/frontend/site/html-calculator-fields.php'; 

	    return $content;

	}

	public function register_scripts() {

		wp_register_style( 'wscp-css', plugins_url( 'assets/css/style.min.css', __DIR__ ) );
		wp_register_script( 'wscp-js', plugins_url( 'assets/js/main.min.js', __DIR__ ) );
	    
	    wp_enqueue_style('wscp-css');
	    wp_enqueue_script('wscp-js');
	}

	public function set_var_admin_url() {

		echo "<script> var wscp_admin_url = '".admin_url( 'admin-ajax.php' )."'; </script>";
		echo "<script> var wscp_assets_url = '".plugins_url( 'assets', __DIR__ )."'; </script>";
	}
}

new Correios_Shipping_Frontend_Site();