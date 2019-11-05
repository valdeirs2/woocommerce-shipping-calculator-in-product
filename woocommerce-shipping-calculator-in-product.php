<?php
/**
 * Plugin Name: WooCommerce Shipping Calculator in Product
 * Plugin URI:  https://github.com/valdeirs2/woocommerce-shipping-calculator-in-product
 * Description: Show the shipping calculator on the product page of your store.
 * Author:      Valdeir Oliveira
 * Author URI:  https://br.linkedin.com/in/valde%C3%AD-santos-08310354
 * Version:     1.0.1
 * License:     GPLv2 or later
 * Text Domain: wsc-plugin

	

 *
 * WooCommerce Shipping Calculator in Product is free software: you can
 * redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software Foundation,
 * either version 2 of the License, or any later version.
 *
 * WooCommerce Shipping Calculator in Product is distributed in the hope
 * that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WooCommerce Shipping Calculator in Product. If not, see
 * <https://www.gnu.org/licenses/gpl-2.0.txt>.
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


define( '__WSC_PLUGIN_PATH__', plugin_dir_url( __FILE__ ) );


if ( ! class_exists( __CLASS__ ) ) {

	class Woo_Shipping_Calculator {
		
		public function __construct() {


			if( isset( $_GET['page'] ) && $_GET['page'] == 'wc-settings' )
				add_action( 'admin_notices', array( __CLASS__,'plugin_donate') );

			add_action('wp', array($this,'init'));
				
			add_action('plugins_loaded', function(){

				$this->load_textdomain();

				include_once dirname( __FILE__ ) . '/includes/woo-settings.class.php';					
			});

			include_once dirname( __FILE__ ) . '/includes/ajax-postcode.class.php';
		}

		public function load_textdomain() {

			load_plugin_textdomain( 'wsc-plugin', false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}

		public function init() {
			

			if( is_product() && 'yes' == get_option('wscip_show_calculate','yes') ):			
				
				include_once dirname( __FILE__ ) . '/includes/frontend.class.php';

				include_once dirname( __FILE__ ) . '/includes/shortcode.class.php';				
			
			endif;
		}

		public static function plugin_donate() {

			$class = 'notice notice-info is-dismissible to apply';

			$message = __( 'Está gostando de utilizar a Calculadora de Frete na Página do Produto? Me ajude a continuar criando novas soluções fazendo uma doação.', 'wsc-plugin') . 
				'<p>
					<a href="https://pag.ae/bdv16S9" target="_blank">
						<span>PagSeguro</span>
						<img style="vertical-align: middle;margin-left: 15px;" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/184x42-doar-roxo-assina.gif">
					</a>
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=5KMVXCTX2ZXPG&currency_code=BRL&source=url" target="_blank" style="margin-left:40px">
						<span>PayPal</span>
						<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif">
					</a>
				</p>';

			printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ),  $message ); 
		}
	}

	new Woo_Shipping_Calculator;
}
