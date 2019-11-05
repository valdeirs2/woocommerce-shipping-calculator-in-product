<?php 

class WooSettings {

	public function __construct() {

		$this->id = 'wscip';
		$this->textdomain = 'wsc-plugin';

		add_filter( 'woocommerce_get_sections_products', array( $this, 'add_section' ) );
		add_filter( 'woocommerce_get_settings_products', array( $this, 'wscip_settings' ), 1, 2 );
		$this->update_default_customer_address();
	}

	public function update_default_customer_address() {

		$address  = get_option('woocommerce_default_customer_address');

		if( empty($address) )
			update_option( 'woocommerce_default_customer_address', 'geolocation' );
	}

	public function add_section( $sections ) {

		$sections[ $this->id ] = __( 'Calculadora de Frete na Página do Produtos', $this->textdomain );
		
		return $sections;
	}

	public function wscip_settings( $settings, $current_section ) {

		if(  'wscip' != $current_section )
			return $settings;

		$settings = array();
		
		$settings[] = array( 
			'name' => __( 'Calculadora de Frete na Página do Produtos', $this->textdomain ), 
			'type' => 'title', 
			'desc' => __( 'Personalize a sua calculadora de frete, que deverá aparecer na página do produto.', $this->textdomain ), 
			'id'   => $this->id 
		);

		$settings[] = array(
			'name'     => __( 'Mostrar calculadora na página do Produto?', $this->textdomain ),
			'desc_tip' => __( 'Desmarque caso queira esconder a calculadora da página dos produtos', $this->textdomain ),
			'id'       => $this->id.'_show_calculate',
			'type'     => 'checkbox',
			'default'  => 'yes',
			'css'      => 'min-width:300px',
			'desc'     => __( 'Mostrar Calculadora', $this->textdomain ),
		);
		
		$settings[] = array( 
			'name'     => __( 'Onde mostrar a calculadora?', $this->textdomain ),
			'desc_tip' => __( 'Selecione o local do seu tema, onde a calculadora deverá aparecer', $this->textdomain ),
			'id'       => $this->id.'_position',
			'type'     => 'select',
			'options'  => array(
		    	'woocommerce_before_add_to_cart_button' => __( 'Antes do botão de Compra', $this->textdomain ),
		      	'woocommerce_after_add_to_cart_button'  => __( 'Depois do botão de Compra', $this->textdomain ),
		      	'woocommerce_short_description'         => __( 'Antes da descrição curta', $this->textdomain ),
		      	'woocommerce_before_add_to_cart_form'   => __( 'Depois da descrição curta', $this->textdomain ),
		      	'woocommerce_product_meta_end'          => __( 'Depois das metas (tags, categorias, etc)', $this->textdomain ),
		      	'shortcode'                             => __( 'Shortcode', '' ),
		    ),
			'default'  => 'woocommerce_after_add_to_cart_button',
			'class'    => 'wc-enhanced-select',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Você também pode usar o shortcode', $this->textdomain ) . ' <strong>[shipping_calculator_on_product_page]</strong>',
		);		

		$settings[] = array(
			'name'     => __( 'Título da chamada', $this->textdomain ),
			'desc_tip' => __( 'Isto irá exibir um texto de introdução acima do campo de CEP', $this->textdomain ),
			'id'       => $this->id.'_title',
			'type'     => 'text',
			'default'  => __('Consulte o prazo estimado e valor da entrega', $this->textdomain),
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Placeholder do campo de CEP', $this->textdomain ),
			'desc_tip' => __( 'Informe o texto reservado que deverá aparecer no campo de CEP', $this->textdomain ),
			'id'       => $this->id.'_placeholder',
			'type'     => 'text',
			'default'  => __('Insira o seu CEP', $this->textdomain),
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Observação', $this->textdomain ),
			'desc_tip' => __( 'Exibe um texto de observação ao final dos métodos de envio', $this->textdomain ),
			'id'       => $this->id.'_obs',
			'type'     => 'textarea',
			'default'  => __('*Este resultado é apenas uma estimativa para este produto. O valor final considerado, deverá ser o total do carrinho.', $this->textdomain),
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Cor do botão', $this->textdomain ),
			'desc_tip' => __( 'Selecione uma cor para o botão de busca', $this->textdomain ),
			'id'       => $this->id.'_btn_color',
			'type'     => 'color',
			'default'  => '#999999',
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Cor do texto do botão', $this->textdomain ),
			'desc_tip' => __( 'Selecione uma cor para o texto do botão de busca', $this->textdomain ),
			'id'       => $this->id.'_btn_color_text',
			'type'     => 'color',
			'default'  => '#ffffff',
			'css'      => '',
		);
		
		$settings[] = array( 'type' => 'sectionend', 'id' => $this->id );

		return $settings;
	}

	

}

new WooSettings;
