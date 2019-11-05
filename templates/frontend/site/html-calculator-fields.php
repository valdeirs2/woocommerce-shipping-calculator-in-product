<div id='shipping-calc'>

	<p><?= get_option('wscip_title', __('Consulte o prazo estimado e valor da entrega','wsc-plugin')); ?></p>

	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="delivery_truck" x="0px" y="0px" width="70px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
		<g>
			<path d="M150.424,392.577c-31.865,0-57.697,25.832-57.697,57.697s25.832,57.697,57.697,57.697s57.697-25.832,57.697-57.697   S182.29,392.577,150.424,392.577z M150.424,479.123c-15.933,0-28.848-12.916-28.848-28.848c0-15.933,12.916-28.849,28.848-28.849   c15.932,0,28.848,12.916,28.848,28.849C179.272,466.207,166.357,479.123,150.424,479.123z M452.303,392.577   c-31.865,0-57.696,25.832-57.696,57.697s25.831,57.697,57.696,57.697c31.866,0,57.697-25.832,57.697-57.697   S484.168,392.577,452.303,392.577z M452.303,479.123c-15.933,0-28.848-12.916-28.848-28.848c0-15.933,12.916-28.849,28.848-28.849   c15.933,0,28.849,12.916,28.849,28.849C481.151,466.207,468.236,479.123,452.303,479.123z M602.438,371.778h-9.562v-87.295   c0-10.068-7.806-18.413-17.853-19.083L539.008,263c-11.154-0.744-21.201-7.007-26.778-16.694l-27.115-60.879   c-23.866-57.444-57.487-81.397-90.442-81.397H43.031C19.266,104.029,0,123.294,0,147.06v258.188   c0,23.766,19.266,43.031,43.031,43.031h31.251c1.07-41.109,34.774-74.246,76.141-74.246c41.368,0,75.071,33.137,76.141,74.246   h149.598c1.07-41.109,34.773-74.246,76.141-74.246c41.368,0,75.071,33.137,76.142,74.246h73.993c5.281,0,9.562-4.281,9.562-9.562   v-57.375C612,376.06,607.719,371.778,602.438,371.778z M449.664,257.607H346.04c-5.121,0-9.272-4.151-9.272-9.272v-83.503   c0-5.122,4.151-9.272,9.272-9.272h54.545c6.916,0,13.259,3.849,16.451,9.985l40.854,78.511   C461.102,250.227,456.622,257.607,449.664,257.607z"/>
		</g>
		<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
	</svg>

	<input type='tel' id='wscp-postcode' autocomplete="off" placeholder="<?=get_option('wscip_placeholder', __('Insira o seu CEP','wsc-plugin') )?>" name='wscp-postcode' class='input-text text' />

	<input type='button' id='wscp-button' class='button wscp-button' value='<?= __('Calcular','wsc-plugin'); ?>' style="color: <?=get_option('wscip_btn_color_text','#ffffff');?>; background-color: <?=get_option('wscip_btn_color','#999999');?>">

	<a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank"><?php _e('Não sei meu CEP','wsc-plugin'); ?></a>

	<input type='hidden' name='wscp-nonce' id='wscp-nonce' value='<?= wp_create_nonce( 'wscp-nonce' ); ?>'>

	<div id='wscp-response'></div>

</div>