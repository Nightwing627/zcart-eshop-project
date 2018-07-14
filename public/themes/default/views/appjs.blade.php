<script type="text/javascript">
    "use strict";

    // ;(function($, window, document) {
        $(document).ready(function(){

            // Bootstrap fixes
            $('[data-toggle="tooltip"]').tooltip()

            // Main slider
            $('#ei-slider').eislideshow({
                animation           : 'center',
                autoplay            : true,
                slideshow_interval  : 5000,
            });

            // Owl Carousel
            $('.product-carousel').owlCarousel({
                margin:5,
                nav:true,
                responsive:{
                    0:{
                        items:3
                    },
                    600:{
                        items:4
                    },
                    1000:{
                        items:6
                    }
                }
            });
            $('.big-carousel').owlCarousel({
                margin:5,
                nav:true,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });
            $('.small-carousel').owlCarousel({
                margin:5,
                nav:true,
                responsive:{
                    0:{
                        items:3
                    },
                    600:{
                        items:7
                    },
                    1000:{
                        items:11
                    }
                }
            });
            // End Owl Carousel

            //  i Check plugin
            $('.i-check, .i-radio').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal',
            });
            $('.i-check-blue, .i-radio-blue').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue',
            });
            // Register account on payment
            $('#create-account-checkbox').on('ifChecked', function() {
                $('#create-account').removeClass('hide');
            });

            $('#create-account-checkbox').on('ifUnchecked', function() {
                $('#create-account').addClass('hide');
            });

            $('#shipping-address-checkbox').on('ifChecked', function() {
                $('#shipping-address').removeClass('hide');
            });

            $('#shipping-address-checkbox').on('ifUnchecked', function() {
                $('#shipping-address').addClass('hide');
            });

            // SelectBoxIt
            $(".selectBoxIt").selectBoxIt();

            // jqzoom
            $('#jqzoom').jqzoom({
                zoomType: 'standard',
                lens: true,
                preloadImages: false,
                alwaysOn: false,
                zoomWidth: 530,
                zoomHeight: 530,
                xOffset:0,
                yOffset: 0,
                position: 'left'
            });

            // price slider
            $("#price-slider").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 10,
                max: 5000,
                type: 'double',
                step: 5,
                prefix: "$",
                grid: true
            });

            // Product qty field
            $(".product-info-qty-input").on('keyup', function() {
                var currentVal = parseInt($(this).val(), 10);
                if (!currentVal || currentVal == "" || currentVal == "NaN") currentVal = 1;
                $(this).val(currentVal);
            });
            $(".product-info-qty-plus").on('click', function() {
                var currentVal = parseInt($(this).prev(".product-info-qty-input").val(), 10);
                if (!currentVal || currentVal == "" || currentVal == "NaN") currentVal = 0;
                $(this).prev(".product-info-qty-input").val(currentVal + 1);
            });
            $(".product-info-qty-minus").on('click', function() {
                var currentVal = parseInt($(this).next(".product-info-qty-input").val(), 10);
                if (currentVal == "NaN") currentVal = 1;
                if (currentVal > 1) {
                    $(this).next(".product-info-qty-input").val(currentVal - 1);
                }
            });
            // END Product qty field

            // View Switcher
            $("a.viewSwitcher").bind("click", function(e){
                e.preventDefault();
                if($(this).hasClass('btn-default')){
                    //Aulter the active button
                    $('.viewSwitcher').toggleClass('btn-primary btn-default');

                    // Aulter the product widget view
                    var product_list = $('.product-list .product');
                    product_list.parent().toggleClass('col-md-12 col-md-3');
                    product_list.toggleClass('product-list-view product-grid-view');

                    // Change the action buttons
                    $('.product-actions').toggleClass('btn-group');
                    $('.product-actions a.btn-default, .product-actions a.btn-link').toggleClass('btn-sm');
                    $('.product-actions a:first-child').toggleClass('btn-link btn-default');
                }
                return false;
            });
            // End View Switcher

            // ADD TO CART BTN
            //Events
            $("#smartcart").on("itemAdded", function(e) {
                @include('layouts.notification', ['message' => trans('theme.notify.item_added_to_cart'), 'type' => 'success', 'icon' => 'shopping-bag'])
            });
            $("#smartcart").on("itemRemoved", function(e) {
                @include('layouts.notification', ['message' => trans('theme.notify.item_removed_from_cart'), 'type' => 'success', 'icon' => 'shopping-bag'])
            });
            $("#smartcart").on("itemUpdated", function(e) {
                @include('layouts.notification', ['message' => trans('theme.notify.cart_updated'), 'type' => 'success', 'icon' => 'shopping-bag'])
            });
            $("#smartcart").on("quantityUpdated", function(e) {
                @include('layouts.notification', ['message' => trans('theme.notify.cart_updated'), 'type' => 'success', 'icon' => 'shopping-bag'])
            });
            $("#smartcart").on("cartCleared", function(e) {
                @include('layouts.notification', ['message' => trans('theme.notify.cart_empty'), 'type' => 'success', 'icon' => 'shopping-bag'])
            });
            $("#smartcart").on("cartSubmitted", function(e) {
                console.log("Cart Submitted");
            });

            // Initialisation
            $('#smartcart').smartCart({
                currencySettings: {
                    locales: 'en-US', // A string with a BCP 47 language tag, or an array of such strings
                    currencyOptions:  {
                        currency: '{{ config('system_settings.currency.iso_code') ?: 'USD' }}',
                    }
                },
                submitSettings: {
                      submitType: 'form', // form, paypal, ajax
                      ajaxURL: '', // Ajax submit URL
                      ajaxSettings: {} // Ajax extra settings for submit call
                }
            });
            // END ADD TO CART BTN
        });
    // });
</script>