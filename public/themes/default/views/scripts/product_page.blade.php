<script type="text/javascript">
"use strict";
;(function($, window, document) {

    var shop_id = '{{ $item->shop_id }}';
    var handlingCost = getFromPHPHelper('getShopConfig', [shop_id, 'order_handling_cost']);

    function getItemTotal()
    {
        var price = {{ $item->currnt_sale_price() }};
        var qtt = $('input.product-info-qty-input').val();

        return Number(price) * Number(qtt);
    };

    function getShippingWeight()
    {
        var unit_weight = {{ $item->shipping_weight }};
        var qtt = $('input.product-info-qty-input').val();

        return Number(unit_weight) * Number(qtt);
    };

    function getShippingOptions()
    {
        var shippingOptions = $("#shipping-options").data('options');
        if (!shippingOptions || $.isEmptyObject(shippingOptions))   return NaN;

        var totalPrice  = getItemTotal();
        var cartWeight  = getShippingWeight();

        var filtered = shippingOptions.filter(function (el) {
            var result = el.based_on == 'price' && el.minimum <= totalPrice && (el.maximum >= totalPrice || !el.maximum);

            if(cartWeight)
                result = result || (el.based_on == 'weight' && el.minimum <= cartWeight && el.maximum >= cartWeight);

            return result;
        });

        return filtered;
    }

    function setShippingCost(shipping)
    {
        $('#summary-shipping-cost, #summary-total').removeClass('text-danger text-uppercase');
        $('#buy-now-btn').removeAttr("disabled");

        var value = Number(shipping.rate) + Number(handlingCost);

        $('#summary-shipping-cost').attr('data-value', value).html( getFromPHPHelper('get_formated_currency', value) );

        if (shipping.carrier.name != ' ')
            $('#summary-shipping-carrier').text(' {{ strtolower(trans('theme.by')) }} ' + shipping.carrier.name);
        else
            $('#summary-shipping-carrier').text(' ');

        var delivery_takes = shipping.delivery_takes ? '{{ trans('theme.estimated_delivery_time') }}: ' + shipping.delivery_takes : '';

        $('#delivery-time').text(delivery_takes);
        $('#shipping-zone-id').val(shipping.shipping_zone_id);
        $('#shipping-rate-id').val(shipping.id);

        calculateOrderTotal();      // Calculate Order Total

        return;
    }

    function setShippingOptions()
    {
        var filtered = getShippingOptions();

        if(filtered){
            filtered.sort(function(a, b){return a.rate - b.rate});
            setShippingCost(filtered[0]);
        }
        else{
            canNotDeliver();
        }
    }

    $(document).ready(function(){

        resizeShipToSelectBox();    // Dynamic width

        setShippingOptions();

        var apply_btn = '<div class="space5"></div><button class="popover-submit-btn btn btn-black btn-block flat" type="button">{{ trans('theme.button.ok') }}</button>';

        $('.dynamic-shipping-rates').popover({
            html: true,
            placement:'bottom',
            content: function(){
                var current = $('#shipping-rate-id').val();
                var filtered = getShippingOptions();

                if($.isEmptyObject(filtered)){
                    var options = '<p class="space10"><span class="space10"></span>{{ trans('theme.seller_doesnt_ship') }}</p>';
                }
                else{
                    var options = '<table class="table table-striped" id="item-shipping-options-table">';
                    filtered.forEach( function (item){
                        var preChecked = String(current) == String(item.id) ? 'checked' : '';
                        var shippingRate = Number(item.rate) + Number(handlingCost);

                        options += "<tr><td><div class='radio'><label id='" + item.id + "' data-option='" + JSON.stringify(item) + "'><input type='radio' name='shipping_option' id='" + item.name + "' value='" + (item.rate) + "' " + preChecked + '>' + item.name + '</label></div></td>' +
                        '<td>' + item.carrier.name + '</td>' +
                        '<td><small class"text-muted">'+ item.delivery_takes +'</small></td>' +
                        '<td><span>{{ get_formated_currency_symbol() }}'+ (shippingRate) +'</span></td></tr>';
                    });
                    options += '</table>';
                }

                return '<div class="popover-form" id="shipping-options-popover">'+
                    options + apply_btn + '</div>';
            }
        }).on('mouseenter', function () {
            var _this = this;
            $(this).popover('show');
            $('.popover').on('mouseleave', function () {
                $(_this).popover('hide');
            });
        }).on('mouseleave', function () {
            var _this = this;
            setTimeout(function () {
                if (!$('.popover:hover').length) {
                    $(_this).popover('hide');
                }
            }, 100);
        });

        // Do appropriate actions and Update order detail
        $(document).on("click", ".popover-submit-btn", function() {
            apply_busy_filter('body');
            var node = $(this).parents('.popover-form');
            var nodeId = node.attr('id');

            switch(nodeId){
                case 'shipping-options-popover':
                    var shipping = node.find('input[name=shipping_option]:checked');
                    var option = shipping.parent('label').data('option');
                    setShippingCost(option);
                    break;

                // case 'packaging-options-popover':
                //     var packaging = node.find('input[name=packaging_option]:checked');
                //     var id = packaging.parent('label').attr('id');
                //     setPackagingCost(cart, packaging.attr('id'), packaging.val(), id);
                //     break;
            }
            // Hide the popover
            $('[data-toggle="popover"]').popover('hide');
            remove_busy_filter('body');
        });

        // Update Item total on qty change
        $(".product-info-qty-input").on('change', function(e) {
            setShippingOptions();
        });


        // OLD
        $('select.color-options').simplecolorpicker();

        $('.product-attribute-selector').on('change', function(){
            var attr = [];
            // console.log(attr);
            $('.product-attribute-selector').each(function(){
                var val = $(this).val();
                if(val)
                    attr.push(val);
            });

            var attrs_pivot = "{{ $attr_pivots or ''}}";

            console.log(attr);
            // console.log('this: ');
            // console.log($(this).val());
        });

        // Ship to box synamic width
        $('#shipTo').on('change', function(){
            resizeShipToSelectBox();

            var countryId = $(this).val();

            var zone = getFromPHPHelper('get_shipping_zone_of', [shop_id, countryId]);
            zone = JSON.parse(zone);

            if($.isEmptyObject(zone)){
                canNotDeliver();
                @include('layouts.notification', ['message' => trans('theme.notify.seller_doesnt_ship'), 'type' => 'warning', 'icon' => 'times-circle'])
            }

            var options = getFromPHPHelper('getShippingRates', [zone.id]);
            $("#shipping-options").data('options', JSON.parse(options));

            setShippingOptions();
        });
    });

    function calculateOrderTotal()
    {
        var total = getItemTotal();
        var shippingCost = $('#summary-shipping-cost').attr('data-value');
        total = Number(total) + Number(shippingCost);
        $('#summary-total').removeClass('text-muted text-danger').addClass('lead').text( getFromPHPHelper('get_formated_currency', total) );
    }

    function canNotDeliver()
    {
        $('#summary-shipping-cost, #summary-total').removeClass('lead').addClass('text-danger text-uppercase').html('{{ trans('theme.notify.cant_deliver') }}');
        $('#summary-shipping-carrier').text(' ');
        $('#buy-now-btn').attr("disabled", "disabled");
    }

    // Ship to box synamic width
    function resizeShipToSelectBox()
    {
        $("#width_tmp_option").html($('#shipTo option:selected').text());
        $('#shipTo').width($("#width_tmp_select").width());
    }
}(window.jQuery, window, document));
</script>