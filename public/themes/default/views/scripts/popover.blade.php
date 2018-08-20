<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){
    	// Coupon
    	$('.apply_seller_coupon').on('click', function(e){
            e.preventDefault();
	        var cart = $(this).data('cart');
	        var coupon = $('#coupon'+cart).val();
			coupon = coupon.trim();

	        if(coupon){
				$.ajax({
				    url: '{{ route('validate.coupon') }}',
				    type: 'POST',
				    data: {'coupon':coupon},
				    dataType: 'JSON',
				    success: function (data, textStatus, xhr) {

				        console.log(textStatus);
				        console.log(xhr.status);
	                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_applied'), 'type' => 'success', 'icon' => 'check-circle'])
				    }
				})
				.fail(function(response) {
			        if (401 === response.status){
						$('#loginModal').modal('show');
			        }
			        else if (500 === response.status){
				        console.log(response);
			        }
			        else if (404 === response.status){
	                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_not_exist'), 'type' => 'warning', 'icon' => 'times-circle'])
			        }
			        else{
	                    @include('layouts.notification', ['message' => trans('theme.notify.failed'), 'type' => 'warning', 'icon' => 'times-circle'])
			        }
		        });
	        }
    	});

    	// Popover
	  	$('[data-toggle="popover"]').on('click', function(){
	        $('.popover').not(this).popover('hide');
	  	});

      	var apply_btn = '<div class="space5"></div><button class="popover-submit-btn btn btn-black btn-block flat" type="button">{{ trans('theme.button.ok') }}</button>';

      	// Do appropriate actions and Update order detail
      	$(document).on("click", ".popover-submit-btn", function() {
	        var node = $(this).parents('.popover-form');
	        var nodeId = node.attr('id');
	        var cart = node.data('cart');

	        switch(nodeId){
	          	case 'shipping-options-popover':
		            var shipping = node.find('input[name=shipping_option]:checked');
		            var name = shipping.attr('id') == 'custom_shipping' ? '{{ trans('app.custom_shipping') }}' : shipping.attr('id');
		            var id = shipping.parent('label').attr('id');
		            setShippingCost(cart, name, shipping.val(), id);
		            break;

	          	case 'packaging-options-popover':
		            var packaging = node.find('input[name=packaging_option]:checked');
		            var id = packaging.parent('label').attr('id');
		            setPackagingCost(cart, packaging.attr('id'), packaging.val(), id);
		            break;

	          // case 'discount-options-popover':
	          //   setDiscount(node.find('input#input-discount').val());
	          //   break;
	        }

	        // Hide the popover
	    	$('[data-toggle="popover"]').popover('hide');
      	});

		$('a.packaging-options').popover({
			html: true,
			placement:'bottom',
			content: function(){
				var cart = $(this).data('cart');
				var current = getPackagingName(cart);
				var preChecked = String(current) == String('{{ trans('theme.basic_packaging') }}') ? 'checked' : '';

				var options = '<table class="table table-striped">' +
				'<tr><td><div class="radio"><label id="1"><input type="radio" name="packaging_option" id="{{ trans('theme.basic_packaging') }}" value="'+ getFormatedValue(0) +'" '+ preChecked +'>{{ trans('theme.basic_packaging') }}</label></div></td>' +
				'<td><span>{{ get_formated_currency_symbol() }}'+ getFormatedValue(0) +'</span></td></tr>';

				$(this).data('options').forEach( function (item){
				  	preChecked = String(current) == String(item.name) ? 'checked' : '';

				  	options += '<tr><td><div class="radio"><label id="'+ item.id +'"><input type="radio" name="packaging_option" id="'+ item.name +'" value="'+ getFormatedValue(item.cost) +'" '+ preChecked +'>'+ item.name +'</label></div></td>' +
				  	'<td><span>{{ get_formated_currency_symbol() }}'+ getFormatedValue(item.cost) +'</span></td></tr>';
				});
				options += '</table>';

				return '<div class="popover-form" id="packaging-options-popover" data-cart="'+ cart +'">'+
			        	options + apply_btn +
			        '</div>';
			}
		});

		$('a.dynamic-shipping-rates').popover({
			html: true,
			placement:'bottom',
			content: function(){
				var cart = $(this).data('cart');
				var current = getShippingName(cart);
				var preChecked = String(current) == '{{ trans('app.custom_shipping') }}' ? 'checked' : '';
				var custValue = preChecked == 'checked' ? getShipping() : '';

				var filtered = getShippingOptions(cart, $(this).data('options'));

				var options = '<table class="table table-striped" id="checkout-options-table">';

				filtered.forEach( function (item){
			  		preChecked = String(current) == String(item.name) ? 'checked' : '';

			  		options += '<tr><td><div class="radio"><label id="'+ item.id +'"><input type="radio" name="shipping_option" id="'+ item.name +'" value="'+ getFormatedValue(item.rate) +'" '+ preChecked +'>'+ item.name +'</label></div></td>' +
			  		'<td>' + item.carrier.name + '</td>' +
			  		'<td><small class"text-muted">'+ item.delivery_takes +'</small></td>' +
			  		'<td><span>{{ get_formated_currency_symbol() }}'+ getFormatedValue(item.rate) +'</span></td></tr>';
				});
				options += '</table>';

				return '<div class="popover-form" id="shipping-options-popover" data-cart="'+ cart +'">'+
			        options + apply_btn + '</div>';
			}
		});

	    // Functions
	    function getFormatedValue(value = 0)
	    {
        	value = value ? value : 0;
        	return parseFloat(value).toFixed(2);
      	}

		function getShippingOptions(cart, shipping_options)
		{
			var totalPrice  = getOrderTotal(cart);
			var cartWeight  = getCartWeight(cart);

			var filtered = shipping_options.filter(function (el) {
			  var result =  el.based_on == 'price' &&
			                el.minimum <= totalPrice &&
			                (el.maximum >= totalPrice || !el.maximum);

			  if(cartWeight){
			    result =  result ||
			              (el.based_on == 'weight' &&
			              el.minimum <= cartWeight &&
			              el.maximum >= cartWeight);
			  }

			  return result;
			});

			return filtered;
		}

		function getCartWeight(cart)
		{
	      	var cartWeight = 0;
	        $(".itemWeight"+cart).each(function()
	        	{
	              cartWeight += ($(this).val()) * 1;
	            }
	        );

	        return cartWeight;
		}

      	function getPackagingName(cart)
      	{
      		return $("#summary-packaging-name"+cart).text().trim();
      	};

      	function getShipping(cart)
      	{
          	return Number($("#summary-shipping"+cart).text());
      	};

      	function getShippingName(cart)
      	{
          	return $("#summary-shipping-name"+cart).text().trim();
      	};

      	function getOrderTotal(cart)
      	{
          	return Number($("#summary-total"+cart).text());
      	};


      	// Setters
      	function setPackagingCost(cart, name, value = 0, id = '')
      	{
	        value = value ? value : 0;
	        $('#summary-packaging'+cart).text(getFormatedValue(value));
	        $('#summary-packaging-name'+cart).text(name);
	        $('input .cart-packaging'+cart).val(value);
	        $('input .packaging_id'+cart).val(id);
	        // calculateTax();
	        return;
      	}

		function setShippingCost(cart, name = '', value = 0, id = '')
		{
			value = value ? value : 0;
			$('#summary-shipping'+cart).text(getFormatedValue(value));
			$('#summary-shipping-name'+cart).text(name);
			$('input #cart-shipping'+cart).val(value);
			$('input #shipping_rate_id'+cart).val(id);
			// calculateTax();
			return;
		}

    });
}(window.jQuery, window, document));
</script>