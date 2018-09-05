<script src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
"use strict";
;(function($, window, document) {
	if ($("#create-account-checkbox, #remember-the-card").is(':checked')){
		showAccountForm();
	}

	// Show cart form if the card option is selected
	var paymentOptionSelected = $('input[name=payment_method]:checked');
	if ( paymentOptionSelected.length > 0 && paymentOptionSelected.data('code') == 'stripe' ){
		showCardForm();
	}

	// Disable checkout if seller has no payment option
	if ($('.payment-option').length == 0) {
        $('#pay-now-btn, #paypal-express-btn').remove();
		$('#payment-instructions').children('span').html('{{trans('theme.notify.seller_has_no_payment_method')}}');
	}

    $('.payment-option').on('ifChecked', function(e) {
    	var code = $(this).data('code');
		$("#payment-instructions.text-danger").removeClass('text-danger').addClass('text-info small');
		$('#payment-instructions').children('span').html($(this).data('info'));

    	// Alter checkout button text
		if ('stripe' == code)
			showCardForm();
    	else
    		hideCardForm();

    	// Alter checkout button
		if ('paypal-express' == code){
            $('#paypal-express-btn').removeClass('hide');
            $('#pay-now-btn').addClass('hide');
		}
		else{
            $('#paypal-express-btn').addClass('hide');
            $('#pay-now-btn').removeClass('hide');
		}
    });

    // Toggle account creation fields
    $('#create-account-checkbox, #remember-the-card').on('ifChecked', function() {
    	$('#create-account-checkbox').iCheck('check');
		showAccountForm();
    });
    $('#create-account-checkbox').on('ifUnchecked', function() {
    	$('#remember-the-card').iCheck('uncheck');
        $('#create-account').hide().find('input[type=email],input[type=password]').removeAttr('required');
    });

    function showAccountForm()
    {
        $('#create-account').show().find('input[type=email],input[type=password]').attr('required', 'required');
    }

    function showCardForm()
    {
		$('#cc-form').show().find('input, select').attr('required', 'required');
		$('#pay-now-btn-txt').html('{!!trans('theme.button.pay_now') . ' <small>(' . get_formated_currency($cart->grand_total(), 2) . ')</small>'!!}');
    }
    function hideCardForm()
    {
		$('#cc-form').hide().find('input, select').removeAttr('required');
		$('#pay-now-btn-txt').text('{{trans('theme.button.checkout')}}');
    }

	// Alter shipping address
	$('.customer-address-list .address-list-item').on('click', function(){
		$('.address-list-item').removeClass('selected');
		$(this).addClass('selected');
		$(this).find('input[type="radio"].ship-to-address').prop("checked", true);
	});

	// Show shipping charge may change msg if zone changes
	$("select[name='country_id']").on('change', function(){
		$(this).next('.help-block').html('<small>{{ trans('theme.notify.shipping_cost_may_change') }}</small>');
    });

	// Check if payment method has been selected or not
	// $("form").on('submit', function(e){
	//   	if ( ! $("input:radio[name='payment_method']").is(":checked") )
	// 		$("#payment-instructions.text-info").removeClass('text-info small').addClass('text-danger');
 //    });

    // Stripe code, create a token
    Stripe.setPublishableKey("{{ config('services.stripe.key') }}");

	$("form#checkoutForm").on('submit', function(e){
      	e.preventDefault();

		var form = $(this);

		// Check if payment method has been selected or not
	  	if ( ! $("input:radio[name='payment_method']").is(":checked") ) {
			$("#payment-instructions.text-info").removeClass('text-info small').addClass('text-danger');
			return;
	  	}

	  	// Skip the strip payment and submit if the payment method is not stripe
	  	if ( $('input[name=payment_method]:checked').data('code') !== 'stripe' )
			form.get(0).submit();

		// Stripe API skip the request if the information are not there
		if (!$("input[data-stripe='number']").val() || !$("input[data-stripe='cvc']").val())
			return;

		// $('.loader').show();

		$('body').addClass('blur-filter');

	    Stripe.card.createToken(form, function(status, response) {
	        if (response.error) {
	          form.find('.stripe-errors').text(response.error.message).removeClass('hide');
	          // $('.loader').hide();
	          $('body').removeClass('blur-filter');
	        } else {
	          form.append($('<input type="hidden" name="cc_token">').val(response.id));
	          form.get(0).submit();
	        }
		});
    });
}(window.jQuery, window, document));
</script>