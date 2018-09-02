<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){
		if($('.payment-option').length == 0) {
            $('#pay-now-btn, #paypal-express-btn').remove();
    		$('#payment-instructions').html('{{trans('theme.notify.seller_has_no_payment_method')}}');
		}

        $('.payment-option').on('ifChecked', function(e) {
        	var code = $(this).val();
    		$('#payment-instructions').html($(this).data('info'));

	    	// Alter checkout button text
    		if('stripe' == code){
    			$('#cc-form').show();
	    		$('#pay-now-btn-txt').html('{!!trans('theme.button.pay_now') . ' <small>(' . get_formated_currency($cart->grand_total(), 2) . ')</small>'!!}');
    		}
	    	else{
    			$('#cc-form').hide();
	    		$('#pay-now-btn-txt').text('{{trans('theme.button.checkout')}}');
	    	}

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

    });
}(window.jQuery, window, document));
</script>