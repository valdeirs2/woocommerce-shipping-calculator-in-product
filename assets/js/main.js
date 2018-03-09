(function($){

	'use strict'

	$(function(){

		$('#wscp-button').on('click',function(){

			if( $('#wscp-postcode').val().length < 3 ) {

				$('#wscp-postcode').focus();

				return;
			}

			$('#wscp-response').html('');

			var detected = detect_product_variation();

			if( !detected ) {

				$('#wscp-response').fadeOut('fast',function(){

					$(this).html("<div class='woocommerce-message woocommerce-error'>Por favor, escolha uma opção antes de calcular.</div>").fadeIn('fast');

				});
					
			
			} else {

				$('#wscp-button').addClass('loading');

				$.ajax({

					type : 'post',
					url  : wscp_admin_url + '?action=wscp_ajax_postcode',
					data : {

						product  : detected,
						qty      : ( $('.quantity input.qty').length ? $('.quantity input.qty').val() : 1 ),
						postcode : $('#wscp-postcode').val(),
						nonce    : $('#wscp-nonce').val()

					},
					success: function(response){

						$('#wscp-button').removeClass('loading');

						$('#wscp-response').fadeOut('fast',function(){

							$(this).html(response).fadeIn('fast');

						});
					}
				});
			}

		});

		$('form.cart, #wscp-postcode').on('keypress', function(e) {
		 	
		 	var keyCode = e.keyCode || e.which;
			
			if (keyCode === 13) { 

				$('#wscp-button').click();
		    	e.preventDefault();
		    	return false;
		  	}
		});

	});


})(jQuery);

	
function detect_product_variation() {

	if( jQuery('input[name=variation_id]').length > 0 ) {

		if( jQuery('input[name=variation_id]').val() > 0  )
			return jQuery('input[name=variation_id]').val();
		else
			return false;
	
	} else {

		if( jQuery('*[name=add-to-cart]').length > 0 )
			if( jQuery('*[name=add-to-cart]').val() > 0  )
				return jQuery('*[name=add-to-cart]').val();
			else
				return false;
		else
			return false;
	}
}