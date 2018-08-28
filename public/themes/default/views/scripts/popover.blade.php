<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){
        // Delete the cart info from localStorage
        // localStorage.removeItem('cart');

    	$('.shopping-cart-table-wrap').each(function(){
			var cart = $(this).data('cart');

			var filtered = getShippingOptions(cart);
			filtered.sort(function(a, b){return a.rate - b.rate});

			if( ! $.isEmptyObject(filtered) ){
	            setShippingCost(cart, filtered[0].name, filtered[0].rate, filtered[0].id);
			}
			else{
				disableCartCheckout(cart);
			}

    		setTaxes(cart);
    	});

        // Update Item total on qty change
        $(".product-info-qty-input").on('change', function(e) {
	        var cart = $(this).data('cart');
	        var item = $(this).data('item');
        	var total = $('#item-price'+cart+'-'+item).data('value') * $(this).val();

			$('#item-total'+cart+'-'+item).text(getFormatedValue(total));

			calculateCartTotal(cart);
    	});

		function calculateCartTotal(cart)
		{
			var total = 0;
	    	$('.item-total'+cart).each(function(){
				total += Number($(this).text());
	    	});
	    	console.log(total);
	    	$('#summary-total'+cart).text(getFormatedValue(total));

	        calculateTax(cart);
		}

    	// Coupon
    	$('.cart-item-remove').on('click', function(e){
            e.preventDefault();
            var node = $(this);
	        var cart = $(this).data('cart');
	        var item = $(this).data('item');

			$.ajax({
			    url: '{{ route('cart.removeItem') }}',
			    type: 'POST',
			    data: {'cart':cart,'item':item},
			    dataType: 'JSON',
			    complete: function (xhr, textStatus) {
			    	if(200 == xhr.status){
		                @include('layouts.notification', ['message' => trans('theme.notify.item_removed_from_cart'), 'type' => 'success', 'icon' => 'check-circle'])

			    		node.parents('tr.cart-item-tr').remove();

			    		// Remove the cart if it has no items
			    		if($('#table'+cart+' tbody').children().length == 0){
							$('#cartId'+cart).remove();
			    		}
			    		else{
							calculateCartTotal(cart);
			    		}
			    	}
			    	else{
		                @include('layouts.notification', ['message' => trans('theme.notify.failed'), 'type' => 'warning', 'icon' => 'times-circle'])
			    	}
			    },
			});
    	});

    	// Coupon
    	$('.apply_seller_coupon').on('click', function(e){
            e.preventDefault();
	        var cart = $(this).data('cart');
	        var coupon = $('#coupon'+cart).val();
	        var shop = $('#shop-id'+cart).val();
	        var zone = $('#zone-id'+cart).val();
			coupon = coupon.trim();

	        if(coupon){
				$.ajax({
				    url: '{{ route('validate.coupon') }}',
				    type: 'POST',
				    data: {'coupon':coupon,'shop':shop,'cart':cart,'zone':zone},
				    dataType: 'JSON',
				    success: function (data, textStatus, xhr) {
				    	if(200 == xhr.status){
				    		setDiscount(cart, data);

		                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_applied'), 'type' => 'success', 'icon' => 'check-circle'])
				    	}
				        console.log(data);
				    }
				})
				.fail(function(response) {
			        if (401 === response.status){
						$('#loginModal').modal('show');
			        }
			        else if (500 === response.status){
				        console.log(response);
			        }
			        else if (403 === response.status){
	                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_not_valid'), 'type' => 'warning', 'icon' => 'times-circle'])
			        }
			        else if (404 === response.status){
	                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_not_exist'), 'type' => 'danger', 'icon' => 'times-circle'])
			        }
			        else if (443 === response.status){
	                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_not_valid_for_zone'), 'type' => 'warning', 'icon' => 'times-circle'])
			        }
			        else if (444 === response.status){
	                    @include('layouts.notification', ['message' => trans('theme.notify.coupon_limit_expired'), 'type' => 'warning', 'icon' => 'times-circle'])
			        }
			        else{
	                    @include('layouts.notification', ['message' => trans('theme.notify.failed'), 'type' => 'danger', 'icon' => 'times-circle'])
			        }

		    		resetDiscount(cart);
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

				var filtered = getShippingOptions(cart);

				if($.isEmptyObject(filtered)){
					var options = '<p class="space10"><span class="space10"></span>{{ trans('theme.seller_doesnt_ship') }}</p>';
				}
				else{
					var options = '<table class="table table-striped" id="checkout-options-table">';
					filtered.forEach( function (item){
				  		var preChecked = String(current) == String(item.name) ? 'checked' : '';

				  		options += '<tr><td><div class="radio"><label id="'+ item.id +'"><input type="radio" name="shipping_option" id="'+ item.name +'" value="'+ getFormatedValue(item.rate) +'" '+ preChecked +'>'+ item.name +'</label></div></td>' +
				  		'<td>' + item.carrier.name + '</td>' +
				  		'<td><small class"text-muted">'+ item.delivery_takes +'</small></td>' +
				  		'<td><span>{{ get_formated_currency_symbol() }}'+ getFormatedValue(item.rate) +'</span></td></tr>';
					});
					options += '</table>';
				}

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

      	function getShippingOptions(cart)
      	{
			var totalPrice  = getOrderTotal(cart);
			var cartWeight  = getCartWeight(cart);
			var shippingOptions = $("#shipping-options"+cart).data('options');

			var filtered = shippingOptions.filter(function (el) {
			  	var result = el.based_on == 'price' && el.minimum <= totalPrice && (el.maximum >= totalPrice || !el.maximum);

			  	if(cartWeight)
			    	result = result || (el.based_on == 'weight' && el.minimum <= cartWeight && el.maximum >= cartWeight);

			  	return result;
			});

			return filtered;
		}

		function calculateTax(cart)
		{
			var total = getOrderTotal(cart);
			var taxrate = getTaxrate(cart);

			var tax = (total * taxrate)/100;

			if(tax > 0)
				$("#tax-section-li"+cart).show();
			else
				$("#tax-section-li"+cart).hide();

			$('#summary-taxes'+cart).text(getFormatedValue(tax));

			calculateOrderSummary(cart);
			return;
		};

      	function calculateOrderSummary(cart)
      	{
          	var grand = getTotalAmount(cart) + getTax(cart);
          	$("#summary-grand-total"+cart).text(getFormatedValue(grand));
          	return;
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


      	function getTotalAmount(cart)
      	{
	        var total = getOrderTotal(cart);
	        if(!total)
	          return total;

	        var packaging = getPackaging(cart);
	        var shipping  = getShipping(cart);
	        var discount  = getDiscount(cart);

	        return (total + shipping + packaging) - discount;
	    }

      	function getPackagingName(cart)
      	{
      		return $("#summary-packaging-name"+cart).text().trim();
      	};

		function getPackaging(cart)
		{
			return Number($("#summary-packaging"+cart).text());
		};

      	function getShipping(cart)
      	{
          	return Number($("#summary-shipping"+cart).text());
      	};

      	function getShippingName(cart)
      	{
          	return $("#summary-shipping-name"+cart).text().trim();
      	};

		function getTaxId(cart)
		{
			return $("#tax-id"+cart).val();
		};

		function getTaxrate(cart)
		{
			return Number($("#cart-taxrate"+cart).val());
		};

		function getTax(cart)
		{
			return Number($("#summary-taxes"+cart).text());
		};

      	function getDiscount(cart)
      	{
        	return Number($("#summary-discount"+cart).text());
      	}

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
	        $('#packaging-id'+cart).val(id);

	        calculateTax(cart);
	        return;
      	}

		function setShippingCost(cart, name = '', value = 0, id = '')
		{
			value = value ? value : 0;
			$('#summary-shipping'+cart).text(getFormatedValue(value));
			$('#summary-shipping-name'+cart).text(name);
			$('#shipping-rate-id'+cart).val(id);
			calculateTax(cart);
			return;
		}

		function setTaxes(cart)
		{
			var totalPrice  = getOrderTotal(cart);
			var tax_id = getTaxId(cart);

			if( ! tax_id ){
				$('#summary-taxrate'+cart).text(0);
				calculateTax(cart);
				return;
			}

			$.ajax({
				url: "{{ route('ajax.getTaxRate') }}",
			    data: {'ID':tax_id},
				success: function(result){
			    	$('#summary-taxrate'+cart).text(result);
			   	 	$('#cart-taxrate'+cart).val(result);

			    	calculateTax(cart);
				}
			});

			return;
		}

		function setDiscount(cart, coupon = null)
		{
			var value = coupon.value;
			var name = coupon.name;
			var totalPrice  = getOrderTotal(cart);

			if('percent' == coupon.type){
				value = ( coupon.value * (totalPrice/100) );
			 	name += coupon.name + '(' + getFormatedValue(coupon.value) + '%)';
			}

			$('#summary-discount'+cart).text(getFormatedValue(value));
			$('#summary-discount-name'+cart).text(name);
			$('#discount-id'+cart).val(coupon.id);
			calculateTax(cart);
			return;
		}

		function resetDiscount(cart)
		{
			if($('#discount-id'+cart).val()){
				$('#summary-discount'+cart).text(getFormatedValue(0));
				$('#summary-discount-name'+cart).text('');
				$('#discount-id'+cart).val('');
				calculateTax(cart);
			}
			return;
		}

      	function disableCartCheckout(cart)
      	{
      		$('#checkout-btn'+cart).attr("disabled", "disabled");
      		$('#table'+cart+' > tfoot').addClass('hidden');
      		$('#notice'+cart).removeClass('hidden');
      	}
    });
}(window.jQuery, window, document));
</script>