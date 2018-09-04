<script type="text/javascript">
"use strict";
;(function($, window, document) {
	// Disable checkout if seller has no payment option
	if($('.payment-option').length == 0) {
        $('#pay-now-btn, #paypal-express-btn').remove();
		$('#payment-instructions').children('span').html('{{trans('theme.notify.seller_has_no_payment_method')}}');
	}

    $('.payment-option').on('ifChecked', function(e) {
    	var code = $(this).data('code');
		$("#payment-instructions.text-danger").removeClass('text-danger').addClass('text-info small');
		$('#payment-instructions').children('span').html($(this).data('info'));

    	// Alter checkout button text
		if('stripe' == code)
			showCardForm();
    	else
    		hideCardForm();

    	// Alter checkout button
		if('paypal-express' == code){
            $('#paypal-express-btn').removeClass('hide');
            $('#pay-now-btn').addClass('hide');
		}
		else{
            $('#paypal-express-btn').addClass('hide');
            $('#pay-now-btn').removeClass('hide');
		}
    });

    // Toggle account creation fields
    $('#create-account-checkbox').on('ifChecked', function() {
        $('#create-account').show().find('input[type=email],input[type=password]').attr('required', 'required');
    });
    $('#create-account-checkbox').on('ifUnchecked', function() {
        $('#create-account').hide().find('input[type=email],input[type=password]').removeAttr('required');
    });

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

	// Check if payment method has been selected or not
	$("form#checkoutForm").on('submit', function(){
		if( ! $("input:radio[name='payment_method']").is(":checked") )
			$("#payment-instructions.text-info").removeClass('text-info small').addClass('text-danger');
	});

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
}(window.jQuery, window, document));
</script>