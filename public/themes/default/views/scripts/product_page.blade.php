<?php
// Remove the morphic values from the collection to look clean
foreach ($variants as &$value) {
    foreach ($value->images as &$image)
        unset($image->imageable_id, $image->imageable_type);

    //echo "<pre>"; print_r($variants->toArray()); echo "</pre>"; exit();
  //  $value->key_features = unserialize($value->key_features);
}
//echo "<pre>"; print_r($variants->toArray()); echo "</pre>"; exit();
//$escaped_varitants_data = $variants->toJson(JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_AMP);
//$escaped_varitants_data = str_replace("\u0022", "\\\"", $escaped_varitants_data );
//$escaped_varitants_data = str_replace("\u0027", "\\'",  $escaped_varitants_data );
//echo "<pre>"; print_r($escaped_varitants_data); echo "</pre>"; exit();
?>
<script type="text/javascript">
"use strict";
;(function($, window, document) {
    var free_shipping = '{{ $item->free_shipping }}';
    var shop_id = '{{ $item->shop_id }}';
    var handlingCost = getFromPHPHelper('getShopConfig', [shop_id, 'order_handling_cost']);
    var unitPrice = {{ $item->currnt_sale_price() }};
    var variants = '<?=$variants;?>';
    var itemWrapper = $("#single-product-wrapper");
    var buyNowBaseUrl = $("#buy-now-btn").attr('href');
    buyNowBaseUrl = buyNowBaseUrl.substr(0, buyNowBaseUrl.lastIndexOf('/') + 1);

    var addToCartBaseUrl = itemWrapper.find('.sc-add-to-cart').data('link');
    addToCartBaseUrl = addToCartBaseUrl.substr(0, addToCartBaseUrl.lastIndexOf('/') + 1);

    $(document).ready(function(){
        $('select.color-options').simplecolorpicker();

        resizeShipToSelectBox();    // Dynamic width for country list

        setShippingOptions();       // Set shipping options

        var apply_btn = '<div class="space5"></div><button class="popover-submit-btn btn btn-black btn-block flat" type="button">{{ trans('theme.button.ok') }}</button>';

        $('.dynamic-shipping-rates').popover({
            html: true,
            placement:'bottom',
            content: function(){
                var current = $('#shipping-rate-id').val();
                var filtered = getShippingOptions();
                var preChecked = (current == 'Null' && free_shipping) ? 'checked' : '';

                if($.isEmptyObject(filtered)){
                    var options = '<p class="space10"><span class="space10"></span>{{ trans('theme.seller_doesnt_ship') }}</p>';
                }
                else{
                    var options = '<table class="table table-striped" id="item-shipping-options-table">';

                    if(free_shipping){
                        options += "<tr><td><div class='radio'><label id='0' data-option='" + JSON.stringify({name: '{{ trans('theme.free_shipping') }}', rate: 0}) + "'><input type='radio' name='shipping_option' id='{{ trans('theme.free_shipping') }}' value='"+ getFormatedValue(0) +"' "+ preChecked +"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('theme.free_shipping') }}</label></div></td>" +
                        '<td>&nbsp;</td><td>&nbsp;</td>' +
                        '<td><span>{{ get_formated_currency_symbol() }}'+ getFormatedValue(0) +'</span></td></tr>';
                    }

                    filtered.forEach( function (item){
                        preChecked = String(current) == String(item.id) ? 'checked' : '';
                        var shippingRate = Number(item.rate) + Number(handlingCost);

                        options += "<tr><td><div class='radio'><label id='" + item.id + "' data-option='" + JSON.stringify(item) + "'><input type='radio' name='shipping_option' id='" + item.name + "' value='" + (item.rate) + "' " + preChecked + '/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + item.name + '</label></div></td>' +
                        '<td>' + item.carrier.name + '</td>' +
                        '<td><small class"text-muted">'+ item.delivery_takes +'</small></td>' +
                        '<td><span>'+ getFormatedPrice(shippingRate) +'</span></td></tr>';
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
            // Return if the item is OUT OF STOCK
            if (itemWrapper.find('.sc-add-to-cart').is('[disabled]')) return;

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

        // Move to the detail section if hash given
        $(function () {
            var tabs = ['#seller_desc_tab', '#desc_tab', '#reviews_tab'];
            if(tabs.indexOf(window.location.hash) != -1)
                $('html,body').animate({scrollTop:$("#item-desc-section").offset().top}, 500);
        });
        $('.product-info-rating-count').on('click', function(e) {
            $('html,body').animate({scrollTop:$("#item-desc-section").offset().top}, 500);
            $('ul.nav a[href="' + this.hash + '"]').tab('show');
        });
    });

    // Social share btns
    var popupSize = {
        width: 780, height: 550
    };
    $(document).on('click', '.social-share-btn', function (e) {
        event.preventDefault();
        var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width=' + popupSize.width + ',height=' + popupSize.height +
            ',left=' + verticalPos + ',top=' + horisontalPos +
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }
    });

    // Variation updates
    $('.product-attribute-selector').on('change', function(){
        apply_busy_filter('body');
        $('#loading').show();

        var attrs = [];
        $('.product-attribute-selector').each(function(){
            var val = $(this).val();
            if(val)
                attrs.push(Number(val));
        });

        var filtered = filterItems(attrs);

        if(filtered == undefined) {
            setOutOfStock();            // Set set out of stock
            itemWrapper.find('.sc-add-to-cart').attr("disabled", "disabled");
            remove_busy_filter('body');
            $('#loading').hide();
            return;
        }

        // console.log(filtered);

        setSalePrice(filtered);         // Set sale price

        // setSetCondition(filtered);         // Set setSetCondition

        updateUrls(filtered);           // Set route urls

        setStockQuantity(filtered);     // Set availble stock quantity

        setImg(filtered);               // Set image price

        // setKeyFeatures(filtered);       // Set key features

        setShippingOptions();           // Set shipping options

        setItemDetails(filtered);           // Set item details like key features, desc

        remove_busy_filter('body');
        $('#loading').hide();
    });



    function setItemDetails(item)
    {
        var details = getFromPHPHelper('get_item_details_of', [item.id]);
        details = JSON.parse(details);

        // var key_features = details.serialize();
        // console.log(key_features);
        $('#seller_seller_desc').html(details.description);
        $('#item_condition').html(details.condition);
        $('#item_condition_note').attr('data-original-title', details.condition_note);
        $('#item_sku').html(details.sku);
        $('#item_min_order_qtt').html(details.min_order_quantity);
        $('#item_shipping_weight').html(details.shipping_weight + ' ' + "{{ config('system_settings.weight_unit') }}");
    }




    // Ship to box synamic width
    $('#shipTo').on('change', function(){
        resizeShipToSelectBox();

        var zone = getFromPHPHelper('get_shipping_zone_of', [shop_id, $(this).val()]);
        zone = JSON.parse(zone);

        if($.isEmptyObject(zone)){
            canNotDeliver();
            @include('layouts.notification', ['message' => trans('theme.notify.seller_doesnt_ship'), 'type' => 'warning', 'icon' => 'times-circle'])
        }

        // Return if the item is OUT OF STOCK
        if (itemWrapper.find('.sc-add-to-cart').is('[disabled]')) return;

        var options = getFromPHPHelper('getShippingRates', [zone.id]);
        $("#shipping-options").data('options', JSON.parse(options))

        setShippingOptions();
    });

    // Update Item total on qty change
    $(".product-info-qty-input").on('change', function(e) {
        setShippingOptions();
    });

    //////////////////////////
    /// Attribute Changes ///
    //////////////////////////
    function filterItems(options)
    {
        // if (!options || $.isEmptyObject(variants))   return NaN;
        options = JSON.stringify(options.sort());

        // return jQuery.parseJSON(variants).find(function (item) {
        return $.parseJSON(variants).find(function (variant) {
            // Get the attr sets of the item
            var attrs = variant.attribute_values.map(a => a.id);

            // Return the exact match of options with items attr sets
            return JSON.stringify(attrs.sort()) === options;
        });
    }

    function updateUrls(item)
    {
        $("#buy-now-btn").attr('href', buyNowBaseUrl + item.slug);
        itemWrapper.find('.sc-add-to-cart').data('link', addToCartBaseUrl + item.slug);
        // itemWrapper.find('.sc-add-to-cart').attr('href', addToCartBaseUrl + item.slug);
        history.pushState(item, item.title, item.slug);         // HTML5 History pushState method to update browser URI
    }

    function setSalePrice(item)
    {
        if(
            (item.offer_price > 0) && (item.offer_price < item.sale_price) &&
            (Date.parse(item.offer_start) < Date.now()) && (Date.parse(item.offer_end) > Date.now())
        ) {
            unitPrice = Number(item.offer_price);       // Update the unit price for calculation
            var off = ( (Number(item.sale_price) - Number(item.offer_price)) * 100 ) / Number(item.sale_price);
            itemWrapper.find('.old-price').show().html(getFormatedPrice(item.sale_price));
            // itemWrapper.find('.old-price').show().html(getFormatedPrice(item.sale_price).replace(/\.?0+$/, ''));
            itemWrapper.find('.product-info-price-new').html(getFormatedPrice(item.offer_price));
            // itemWrapper.find('.product-info-price-new').html(getFormatedPrice(item.offer_price).replace(/\.?0+$/, ''));
            itemWrapper.find('.percent-off').show().html(getFormatedValue(off,0) + '{{trans('theme.percnt_off')}}');
        }
        else {
            unitPrice = Number(item.sale_price);       // Update the unit price for calculation
            itemWrapper.find('.old-price, .percent-off').hide().text('');
            itemWrapper.find('.product-info-price-new').html(getFormatedPrice(item.sale_price));
            // itemWrapper.find('.product-info-price-new').html(getFormatedPrice(item.sale_price).replace(/\.?0+$/, ''));
        }
    }

    function setKeyFeatures(item)
    {
        $('.key_feature_list').html(item.key_features);
    }

    function setImg(item)
    {
        if(item.images.length > 0){
            $('#jqzoom').removeData('jqzoom'); //Reset the jqzoom

            var path = getFromPHPHelper('get_storage_file_url', [item.images[0].path, 'full']);
            $('#jqzoom .product-img').attr('src', path);
            $('#jqzoom').attr('href', path);

            path = path.replace(/\?.*/,''); // Remove the size attr from the path url

            $('ul.jqzoom-thumbs').find( 'img' ).each(function() {
                var src = $(this).attr("src").replace(/\?.*/,'');
                var node = $(this).parent('a');

                if(path == src)
                    node.addClass('zoomThumbActive');
                else
                    node.removeClass('zoomThumbActive');
            });

            //binding
            $("#jqzoom").jqzoom();

            // jqzoom
            // $('#jqzoom').jqzoom({
            //     zoomType: 'standard',
            //     lens: true,
            //     preloadImages: false,
            //     alwaysOn: false,
            //     zoomWidth: 530,
            //     zoomHeight: 530,
            //     xOffset:0,
            //     yOffset: 0,
            //     position: 'left'
            // });
        }
    }

    // In stock
    function setStockQuantity(item)
    {
        itemWrapper.find('.sc-add-to-cart').removeAttr("disabled");
        itemWrapper.find('.product-info-availability span').text('{{trans('theme.in_stock')}}');
        itemWrapper.find('.product-info-title').html(item.title);
        itemWrapper.find('.available-qty-count').text(item.stock_quantity + ' {{strtolower(trans('theme.in_stock'))}}');
        itemWrapper.find('.product-info-qty-input').attr('data-max', item.stock_quantity).attr('data-min', item.min_order_quantity).val(item.min_order_quantity);
    }

    function setOutOfStock()
    {
        itemWrapper.find('.product-info-availability span').html('<b class="text-danger">{{trans('theme.out_of_stock')}}</b>');
        itemWrapper.find('.product-info-price-new').text('{{trans('theme.out_of_stock')}}');
        itemWrapper.find('.old-price, .available-qty-count').text('');
        canNotDeliver();
    }
    //////////////////////////
    /// END Attribute Changes
    //////////////////////////

    // Other Functions
    function getItemTotal()
    {
        var qtt = $('input.product-info-qty-input').val();
        return Number(unitPrice) * Number(qtt);
    };

    function getShippingWeight()
    {
        var unit_weight = '{{ $item->shipping_weight }}';
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

            if(cartWeight){
                result = result || (el.based_on == 'weight' && el.minimum <= cartWeight && el.maximum >= cartWeight);
            }

            return result;
        });

        return filtered;
    }

    function setShippingCost(shipping)
    {
        $('#summary-shipping-cost, #summary-total').removeClass('text-danger text-uppercase');
        $('#buy-now-btn').removeAttr("disabled");

        if (free_shipping == 1 && shipping.rate == 0) {
            $('#summary-shipping-cost').attr('data-value', 0).html(shipping.name);
            $('#summary-shipping-carrier').text(' ');

            $('#delivery-time').text(' ');
            $('#shipping-rate-id').val('Null');
        }
        else {
            var value = Number(shipping.rate) + Number(handlingCost);

            $('#summary-shipping-cost').attr('data-value', value).html( getFormatedPrice(value) );

            if (shipping.carrier.name != ' ')
                $('#summary-shipping-carrier').text(' {{ strtolower(trans('theme.by')) }} ' + shipping.carrier.name);
            else
                $('#summary-shipping-carrier').text(' ');

            var delivery_takes = shipping.delivery_takes ? '{{ trans('theme.estimated_delivery_time') }}: ' + shipping.delivery_takes : '';

            $('#delivery-time').text(delivery_takes);
            $('#shipping-zone-id').val(shipping.shipping_zone_id);
            $('#shipping-rate-id').val(shipping.id);
        }

        calculateOrderTotal();      // Calculate Order Total

        return;
    }

    function setShippingOptions()
    {
        $.when(
            $('#summary-shipping-cost, #summary-total').removeClass('lead text-uppercase').html('{{ trans('theme.notify.calculating') }}')
       ).then(function(){
            var filtered = getShippingOptions();

            if(filtered.length){
                if (free_shipping == 1) {
                    setShippingCost({name: '{{ trans('theme.free_shipping') }}', rate: 0});       // Set free shipping
                }
                else {
                    filtered.sort(function(a, b){return a.rate - b.rate});
                    setShippingCost(filtered[0]);
                }
            }
            else{
                canNotDeliver();
            }
        });
    }

    function calculateOrderTotal()
    {
        var total = getItemTotal();
        var shippingCost = $('#summary-shipping-cost').attr('data-value');
        total = Number(total) + Number(shippingCost);
        $('#summary-total').removeClass('text-muted text-danger').addClass('lead').html( getFormatedPrice(total) );
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