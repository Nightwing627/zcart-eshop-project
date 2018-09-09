<script src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
"use strict";
;(function($, window, document) {

    $(document).ready(function(){
		// Check if customer exist
		var customer = {{ $customer ? 'true' : 'undefined'}};

		// Disable checkout if seller has no payment option
		if ($('.payment-option').length == 0) {
	        $('#pay-now-btn, #paypal-express-btn').remove();
			$('#payment-instructions').children('span').html('{{trans('theme.notify.seller_has_no_payment_method')}}');
		}

		// Show email/password form is customer want to save the card/create account
		if ($("#create-account-checkbox, #remember-the-card").is(':checked'))
			showAccountForm();

	    // Toggle account creation fields
	    $('#create-account-checkbox, #remember-the-card').on('ifChecked', function() {
	    	$('#create-account-checkbox').iCheck('check');
			showAccountForm();
	    });
	    $('#create-account-checkbox').on('ifUnchecked', function() {
	    	$('#remember-the-card').iCheck('uncheck');
	        $('#create-account').hide().find('input[type=email],input[type=password]').removeAttr('required');
	    });

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

		// Alter shipping address
		$('.customer-address-list .address-list-item').on('click', function(){
			$('.address-list-item').removeClass('selected has-error');
			$(this).addClass('selected');
			$(this).find('input[type="radio"].ship-to-address').prop("checked", true);
			$('#ship-to-error-block').text('');
		});

		// Show shipping charge may change msg if zone changes
		$("select[name='country_id']").on('change', function(){
			$(this).next('.help-block').html('<small>{{ trans('theme.notify.shipping_cost_may_change') }}</small>');
	    });

		// Submit the form
		$("a#paypal-express-btn").on('click', function(e) {
	      	e.preventDefault();
			$("form#checkoutForm").submit();
		});

		// Show cart form if the card option is selected
		var paymentOptionSelected = $('input[name="payment_method"]:checked');
		if ( paymentOptionSelected.length > 0 && paymentOptionSelected.data('code') == 'stripe' )
			showCardForm();

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

			// If customer exist the check shipping address is seleced
			if (typeof customer !== "undefined") {
				if ( ! $("input:radio[name='ship_to']").is(":checked") ){
					$('.address-list-item').addClass('has-error');
					$('#ship-to-error-block').html("{{trans('theme.notify.select_shipping_address')}}");
					return;
				}
			}

			// Check if form validation pass
			if ($(".has-error").length){
	            @include('layouts.notification', ['message' => trans('theme.notify.fill_required_info'), 'type' => 'warning', 'icon' => 'times-circle'])
				return;
			}

			apply_busy_filter('body');

		  	// Skip the strip payment and submit if the payment method is not stripe
		  	if ( $('input[name=payment_method]:checked').data('code') !== 'stripe' )
				form.get(0).submit();

			// Stripe API skip the request if the information are not there
			if (!$("input[data-stripe='number']").val() || !$("input[data-stripe='cvc']").val())
				return;

		    Stripe.card.createToken(form, function(status, response) {
		        if (response.error) {
		          	form.find('.stripe-errors').text(response.error.message).removeClass('hide');
					remove_busy_filter('body');
		        } else {
		          	form.append($('<input type="hidden" name="cc_token">').val(response.id));
		          	form.get(0).submit();
		        }
			});
	    });

		$("#submit-btn-block").show(); // Show the submit buttons after loading the doms
    });

	// Functions
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
}(window.jQuery, window, document));
</script>