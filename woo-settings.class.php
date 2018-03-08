<?php 

class WooSettings {

	public function __construct() {

		$this->id = 'wscip';

		add_filter( 'woocommerce_get_sections_products', array( $this, 'add_section' ) );
		add_filter( 'woocommerce_get_settings_products', array( $this, 'wscip_settings' ), 1, 2 );
	}

	public function add_section( $sections ) {

		$sections[ $this->id ] = __( 'Calculadora de Frete na Página do Produto', '' );
		
		return $sections;
	}

	public function wscip_settings( $settings, $current_section ) {

		if(  'wscip' != $current_section )
			return $settings;

		$settings = array();
		
		$settings[] = array( 
			'name' => __( 'Calculadora de Frete na Página do Produtos', '' ), 
			'type' => 'title', 
			'desc' => __( 'Personalize a sua calculadora de frete, que deverá aparecer na página do produto.', '' ), 
			'id'   => $this->id 
		);

		$settings[] = array(
			'name'     => __( 'Mostrar calculadora na página do Produto?', '' ),
			'desc_tip' => __( 'Desmarque caso queira esconder a calculadora da página dos produtos', '' ),
			'id'       => $this->id.'_show_calculate',
			'type'     => 'checkbox',
			'default'  => 'yes',
			'css'      => 'min-width:300px',
			'desc'     => __( 'Mostrar Calculadora', '' ),
		);
		
		$settings[] = array( 
			'name'     => __( 'Onde mostrar a calculadora?', '' ),
			'desc_tip' => __( 'Selecione o local do seu tema, onde a calculadora deverá aparecer', '' ),
			'id'       => $this->id.'_position',
			'type'     => 'select',
			'options'  => array(
		    	'woocommerce_before_add_to_cart_button' => __( 'Antes do botão de Compra', '' ),
		      	'woocommerce_after_add_to_cart_button'  => __( 'Depois do botão de Compra', '' ),
		      	'woocommerce_short_description'         => __( 'Antes da descrição curta', '' ),
		      	'woocommerce_before_add_to_cart_form'   => __( 'Depois da descrição curta', '' ),
		      	'woocommerce_product_meta_end'          => __( 'Depois das metas (tags, categorias, etc)', '' ),
		      	'shortcode'                             => __( 'Shortcode', '' ),
		    ),
			'default'  => 'woocommerce_after_add_to_cart_button',
			'class'    => 'wc-enhanced-select',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Você também pode usar o shortcode <strong>[shipping_calculator_on_product_page]</strong>', '' ),
		);		

		$settings[] = array(
			'name'     => __( 'Título da chamada', '' ),
			'desc_tip' => __( 'Isto irá exibir um texto de introdução acima do campo de CEP', '' ),
			'id'       => $this->id.'_title',
			'type'     => 'text',
			'default'  => 'Consulte o prazo estimado e valor da entrega',
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Placeholder do campo de CEP', '' ),
			'desc_tip' => __( 'Informe o valo reservado que deverá aparecer no campo de CEP', '' ),
			'id'       => $this->id.'_placeholder',
			'type'     => 'text',
			'default'  => 'Insira o seu CEP',
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Observação', '' ),
			'desc_tip' => __( 'Exibe um texto de observação ao final dos métodos de envio', '' ),
			'id'       => $this->id.'_obs',
			'type'     => 'textarea',
			'default'  => '*Este resultado é apenas uma estimativa para este produto. O valor final considerado, deverá ser o total do carrinho.',
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Cor do botão', '' ),
			'desc_tip' => __( 'Selecione uma cor para o botão de busca', '' ),
			'id'       => $this->id.'_btn_color',
			'type'     => 'color',
			'default'  => '#999999',
			'css'      => '',
		);

		$settings[] = array(
			'name'     => __( 'Cor do texto do botão', '' ),
			'desc_tip' => __( 'Selecione uma cor para o texto do botão de busca', '' ),
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
