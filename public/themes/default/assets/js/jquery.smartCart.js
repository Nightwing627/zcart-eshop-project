/*!
 * jQuery Smart Cart v3.0.1
 * The smart interactive jQuery Shopping Cart plugin with PayPal payment support
 * http://www.techlaboratory.net/smartcart
 *
 * Created by Dipu Raj
 * http://dipuraj.me
 *
 * Licensed under the terms of the MIT License
 * https://github.com/techlab/SmartCart/blob/master/LICENSE
 */

;(function ($, window, document, undefined) {
    "use strict";
    // Default options

    var defaults = {
        cart: [], // initial products on cart
        resultName: 'cart_list', // Submit name of the cart parameter
        theme: 'default', // theme for the cart, related css need to include for other than default theme
        combineProducts: true, // combine similar products on cart
        highlightEffect: true, // highlight effect on adding/updating product in cart
        cartItemTemplate: '<img class="img-responsive pull-left" src="{product_image}" /><p class="nav-dropdown-cart-item"><a href="{product_link}">{product_name}</a></p>',
        cartItemQtyTemplate: '{display_price} × {display_quantity} = {display_amount}',
        productContainerSelector: '.sc-product-item',
        productElementSelector: '*', // input, textarea, select, div, p
        addCartSelector: '.sc-add-to-cart',
        paramSettings: { // Map the paramters
            productLink: 'product_link',
            productPrice: 'product_price',
            productQuantity: 'product_quantity',
            productName: 'product_name',
            productId: 'product_id'
        },
        lang: { // Language variables
            cartEmpty: 'Cart is Empty!'
        },
        submitSettings: {
            submitType: 'form', // form, ajax
            ajaxURL: '', // Ajax submit URL
            ajaxSettings: {} // Ajax extra settings for submit call
        },
        currencySettings: {
            locales: 'en-US', // A string with a BCP 47 language tag, or an array of such strings
            currencyOptions: {
                style: 'currency',
                currency: 'USD',
                currencyDisplay: 'symbol'
            } // extra settings for the currency formatter. Refer: https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Number/toLocaleString
        },
        debug: true
    };

    // The plugin constructor
    function SmartCart(element, options) {
        // Merge user settings with default, recursively
        this.options = $.extend(true, {}, defaults, options);
        // Cart array
        this.cart = [];
        // Cart element
        this.cart_element = $(element);
        // Call initial method
        this.init();
    }

    $.extend(SmartCart.prototype, {
        init: function () {
            // Set the elements
            this._setElements();

            // Assign plugin events
            this._setEvents();

            // Set initial products
            var mi = this;

            var stor = localStorage.getItem('cart');
            if(stor!==null){
                var load = $.parseJSON(stor);
                $.each( load, function( i, n ) {
                    mi._addToCart(n,false,true);
                });
            }

            $(this.options.cart).each(function(i, p) {
                p = mi._addToCart(p);
            });

            // Call UI sync
            this._hasCartChange();
        },

        // PRIVATE FUNCTIONS
        /*
         * Set basic elements for the cart
         */
        _setElements: function () {
            // The element store all cart data and submit with form
            var cartListElement = $('<input type="hidden" name="' + this.options.resultName + '" id="' + this.options.resultName + '" />');
            // this.cart_element.append(cartListElement);
            this.cart_element.find('form#checkoutForm').append(cartListElement);
        },

        /*
         * Set events for the cart
         */
        _setEvents: function () {
            var mi = this;
            // Capture add to cart button events
            $(this.options.addCartSelector).on("click", function (e) {
                e.preventDefault();
                var p = mi._getProductDetails($(this));
                p = mi._addToCart(p);
                $(this).parents(mi.options.productContainerSelector).addClass('sc-added-item').attr('data-product-unique-key', p.unique_key);
            });

            // Item remove event
            $(this.cart_element).on("click", '.sc-cart-remove', function (e) {
                e.preventDefault();
                $(this).parents('.sc-cart-item').fadeOut("normal", function () {
                    mi._removeFromCart($(this).data('unique-key'));
                    $(this).remove();
                    mi._hasCartChange();
                });
            });

            // Item quantity change event
            $(this.cart_element).on("change", '.sc-cart-item-qty', function (e) {
                e.preventDefault();
                mi._updateCartQuantity($(this).parents('.sc-cart-item').data('unique-key'), $(this).val());
            });

            // Cart checkout event
            $(this.cart_element).on("click", '.sc-cart-checkout', function (e) {
                if ($(this).hasClass('disabled')) {
                    return false;
                }
                e.preventDefault();
                mi._submitCart();
            });

            // Cart clear event
            $(this.cart_element).on("click", '.sc-cart-clear', function (e) {
                if ($(this).hasClass('disabled'))
                    return false;

                e.preventDefault();
                $('.sc-cart-item-list > .sc-cart-item', this.cart_element).fadeOut("normal", function () {
                    $(this).remove();
                    mi._clearCart();
                    mi._hasCartChange();
                });
            });
        },
        /*
         * Get the parameters of a product by seaching elements with name attribute/data.
         * Product details will be return as an object
         */
        _getProductDetails: function (elm) {
            var mi = this;
            var p = {};
            elm.parents(this.options.productContainerSelector).find(this.options.productElementSelector).each(function () {
                if ($(this).is('[name]') === true || typeof $(this).data('name') !== typeof undefined) {
                    var key = $(this).attr('name') ? $(this).attr('name') : $(this).data('name');
                    var val = mi._getContent($(this));
                    if (key && val) {
                        p[key] = val;
                    }
                }
            });
            return p;
        },
        /*
         * Add the product object to the cart
         */
        _addToCart: function (p,store,old) {
            // console.log(p);
            var mi = this;
            store = typeof store !== 'undefined' ? store : true;
            old = typeof old !== 'undefined' ? old : false;

            if (!p.hasOwnProperty(this.options.paramSettings.productPrice)) {
                this._logError('Price is not set for the item');
                return false;
            }

            if (!p.hasOwnProperty(this.options.paramSettings.productQuantity)) {
                // this._logMessage('');
                // this._logMessage('Quantity not found, default to 1');
                p[this.options.paramSettings.productQuantity] = 1;
            }

            if (!p.hasOwnProperty('unique_key')) {
                p.unique_key = this._getUniqueKey();
            }

            if (this.options.combineProducts) {
                var pf = $.grep(this.cart, function (n, i) {
                    return mi._isObjectsEqual(n, p);
                });
                if (pf.length > 0) {
                    var idx = this.cart.indexOf(pf[0]);
                    this.cart[idx][this.options.paramSettings.productQuantity] = this.cart[idx][this.options.paramSettings.productQuantity] - 0 + (p[this.options.paramSettings.productQuantity] - 0);
                    p = this.cart[idx];
                    // Trigger "itemUpdated" event
                    this._triggerEvent("itemUpdated", [p]);
                } else {
                    this.cart.push(p);
                    // Trigger "itemAdded" event
                    if(!old)
                        this._triggerEvent("itemAdded", [p]);
                }
            } else {
                this.cart.push(p);
                // Trigger "itemAdded" event
                this._triggerEvent("itemAdded", [p]);
            }

            this._addUpdateCartItem(p);

            if(store)
                localStorage.setItem('cart', JSON.stringify(this.cart));

            return p;
        },
        /*
         * Remove the product object from the cart
         */
        _removeFromCart: function (unique_key) {
            var mi = this;
            $.each(this.cart, function (i, n) {
                if (n.unique_key === unique_key) {
                    var itemRemove = mi.cart[i];
                    mi.cart.splice(i, 1);
                    $('*[data-product-unique-key="' + unique_key + '"]').removeClass('sc-added-item');
                    mi._hasCartChange();

                    // Trigger "itemRemoved" event
                    mi._triggerEvent("itemRemoved", [itemRemove]);
                    return false;
                }
            });
            localStorage.setItem('cart', JSON.stringify(this.cart));
        },
        /*
         * Clear all products from the cart
         */
        _clearCart: function () {
            this.cart = [];
            // Trigger "cartCleared" event
            this._triggerEvent("cartCleared");
            this._hasCartChange();
        },
        /*
         * Update the quantity of an item in the cart
         */
        _updateCartQuantity: function (unique_key, qty) {
            var mi = this;
            var qv = this._getValidateNumber(qty);
            $.each(this.cart, function (i, n) {
                if (n.unique_key === unique_key) {
                    if (qv) {
                        mi.cart[i][mi.options.paramSettings.productQuantity] = qty;
                    }
                    mi._addUpdateCartItem(mi.cart[i]);
                    // Trigger "quantityUpdate" event
                    mi._triggerEvent("quantityUpdated", [mi.cart[i], qty]);
                    return false;
                }
            });

            localStorage.setItem('cart', JSON.stringify(this.cart));
        },
        /*
         * Update the UI of the cart list
         */
        _addUpdateCartItem: function (p) {
            var productAmount = (p[this.options.paramSettings.productQuantity] - 0) * (p[this.options.paramSettings.productPrice] - 0);
            var cartList = $('.sc-cart-item-list', this.cart_element);
            var elmMain = cartList.find("[data-unique-key='" + p.unique_key + "']");
            if (elmMain && elmMain.length > 0) {
                elmMain.find(".sc-cart-item-qty").val(p[this.options.paramSettings.productQuantity]);
                elmMain.find(".sc-cart-item-amount").text(this._getMoneyFormatted(productAmount));
            } else {
                elmMain = $('<li></li>').addClass('sc-cart-item');
                elmMain.append('<button type="button" class="sc-cart-remove text-muted">&times;</button>');
                elmMain.attr('data-unique-key', p.unique_key);

                elmMain.append(this._formatTemplate(this.options.cartItemTemplate, p));

                var itemSummary = '<div class="sc-cart-item-summary"><span class="sc-cart-item-price">' + this._getMoneyFormatted(p[this.options.paramSettings.productPrice]) + '</span>';
                itemSummary += ' × <input type="number" min="1" max="1000" class="sc-cart-item-qty" value="' + this._getValueOrEmpty(p[this.options.paramSettings.productQuantity]) + '" />';
                itemSummary += ' = <span class="sc-cart-item-amount nav-dropdown-cart-price pull-right">' + this._getMoneyFormatted(productAmount) + '</span></div>';

                elmMain.append(itemSummary);
                cartList.append(elmMain);
            }

            // Apply the highlight effect
            if (this.options.highlightEffect === true) {
                elmMain.addClass('sc-highlight');
                setTimeout(function () {
                    elmMain.removeClass('sc-highlight');
                }, 500);
            }

            this._hasCartChange();
        },
        /*
         * Handles the changes in the cart
         */
        _hasCartChange: function () {
            $('.sc-cart-count').text(this.cart.length);
            // $('.sc-cart-count', this.cart_element).text(this.cart.length);
            $('.sc-cart-subtotal', this.element).text(this._getCartSubtotal());

            if (this.cart.length === 0) {
                $('.sc-cart-item-list > .sc-cart-empty-msg', this.cart_element).show();
                // $('.sc-cart-item-list', this.cart_element).empty().append($('<li class="sc-cart-empty-msg">' + this.options.lang.cartEmpty + '</li>'));
                $(this.options.productContainerSelector).removeClass('sc-added-item');
                $('.sc-cart-checkout, .sc-cart-clear').addClass('disabled');

                // Trigger "cartEmpty" event
                this._triggerEvent("cartEmpty");
            } else {
                $('.sc-cart-item-list > .sc-cart-empty-msg', this.cart_element).hide();
                $('.sc-cart-checkout, .sc-cart-clear').removeClass('disabled');
            }

            // Update cart value to the  cart hidden element
            $('#' + this.options.resultName, this.cart_element).val(JSON.stringify(this.cart));
        },
        /*
         * Calculates the cart subtotal
         */
        _getCartSubtotal: function () {
            var mi = this;
            var subtotal = 0;
            $.each(this.cart, function (i, p) {
                if (mi._getValidateNumber(p[mi.options.paramSettings.productPrice])) {
                    subtotal += (p[mi.options.paramSettings.productPrice] - 0) * (p[mi.options.paramSettings.productQuantity] - 0);
                }
            });
            return this._getMoneyFormatted(subtotal);
        },
        /*
         * Cart submit functionalities
         */
        _submitCart: function () {
            var mi = this;

            // var formElm = this.cart_element.parents('form');
            var formElm = this.cart_element.find('form#checkoutForm');
            if (formElm.length == 0) {
                this._logError('Form not found to submit');
                return false;
            }
            switch (this.options.submitSettings.submitType) {
                case 'ajax':
                    var ajaxURL = this.options.submitSettings.ajaxURL && this.options.submitSettings.ajaxURL.length > 0 ? this.options.submitSettings.ajaxURL : formElm.attr('action');

                    var ajaxSettings = $.extend(true, {}, {
                        url: ajaxURL,
                        type: "POST",
                        data: formElm.serialize(),
                        beforeSend: function () {
                            mi.cart_element.addClass('loading');
                        },
                        error: function (jqXHR, status, message) {
                            mi.cart_element.removeClass('loading');
                            mi._logError(message);
                        },
                        success: function (res) {
                            mi.cart_element.removeClass('loading');
                            mi._triggerEvent("cartSubmitted", [mi.cart]);
                            mi._clearCart();
                        }
                    }, this.options.submitSettings.ajaxSettings);

                    $.ajax(ajaxSettings);
                    break;
                default:
                    formElm.submit();
                    this._triggerEvent("cartSubmitted", [this.cart]);

                    break;
            }

            return true;
        },

        // HELPER FUNCTIONS
        /*
         * Get the content of an HTML element irrespective of its type
         */
        _getContent: function (elm) {
            if (elm.is(":checkbox, :radio")) {
                return elm.is(":checked") ? elm.val() : '';
            } else if (elm.is("[value], select")) {
                return elm.val();
            } else if (elm.is("img")) {
                return elm.attr('src');
            } else {
                return elm.text();
            }
            return '';
        },
        /*
         * Compare equality of two product objects
         */
        _isObjectsEqual: function (o1, o2) {
            if (Object.getOwnPropertyNames(o1).length !== Object.getOwnPropertyNames(o2).length) {
                return false;
            }
            for (var p in o1) {
                if (p === 'unique_key' || p === this.options.paramSettings.productQuantity) {
                    continue;
                }
                if (typeof o1[p] === typeof undefined && typeof o2[p] === typeof undefined) {
                    continue;
                }
                if (o1[p] !== o2[p]) {
                    return false;
                }
            }
            return true;
        },
        /*
         * Format money
         */
        _getMoneyFormatted: function (n) {
            n = n - 0;
            return Number(n.toFixed(2)).toLocaleString(this.options.currencySettings.locales, this.options.currencySettings.currencyOptions);
        },
        /*
         * Get the value of an element and empty value if the element not exists
         */
        _getValueOrEmpty: function (v) {
            return v && typeof v !== typeof undefined ? v : '';
        },
        /*
         * Validate Number
         */
        _getValidateNumber: function (n) {
            n = n - 0;
            if (n && n > 0) {
                return true;
            }
            return false;
        },
        /*
         * Small templating function
         */
        _formatTemplate: function (t, o) {
            var r = t.split("{"),
                fs = '';
            for (var i = 0; i < r.length; i++) {
                var vr = r[i].substring(0, r[i].indexOf("}"));
                if (vr.length > 0) {
                    fs += r[i].replace(vr + '}', this._getValueOrEmpty(o[vr]));
                } else {
                    fs += r[i];
                }
            }
            return fs;
        },
        /*
         * Event raiser
         */
        _triggerEvent: function (name, params) {
            // console.log(name);
            // Trigger an event
            var e = $.Event(name);
            this.cart_element.trigger(e, params);
            if (e.isDefaultPrevented()) {
                return false;
            }
            return e.result;
        },
        /*
         * Get unique key
         */
        _getUniqueKey: function () {
            var d = new Date();
            return d.getTime();
        },
        /*
         * Log message to console
         */
        _logMessage: function (msg) {
            if (this.options.debug !== true) {
                return false;
            }
            // Log message
            console.log(msg);
        },
        /*
         * Log error to console and terminate execution
         */
        _logError: function (msg) {
            if (this.options.debug !== true) {
                return false;
            }
            // Log error
            $.error(msg);
        },

        // PUBLIC FUNCTIONS
        /*
         * Public function to sumbit the cart
         */
        submit: function () {
            this._submitCart();
        },
        /*
         * Public function to clear the cart
         */
        clear: function () {
            this._clearCart();
        }
    });

    // Wrapper for the plugin
    $.fn.smartCart = function (options) {
        var args = arguments;
        var instance;

        if (options === undefined || typeof options === 'object') {
            return this.each(function () {
                if (!$.data(this, "smartCart")) {
                    $.data(this, "smartCart", new SmartCart(this, options));
                }
            });
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            instance = $.data(this[0], 'smartCart');

            if (options === 'destroy') {
                $.data(this, 'smartCart', null);
            }

            if (instance instanceof SmartCart && typeof instance[options] === 'function') {
                return instance[options].apply(instance, Array.prototype.slice.call(args, 1));
            } else {
                return this;
            }
        }
    };
})(jQuery, window, document);