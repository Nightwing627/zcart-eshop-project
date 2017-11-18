@extends('admin.layouts.master')

@section('buttons')
  @can('create', App\Order::class)
    <a href="{{ route('admin.order.order.searchCutomer') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.search_again') }}</a>
  @endcan

  @can('index', App\Order::class)
    <a href="{{ route('admin.order.order.index') }}" class="btn btn-new btn-flat">{{ trans('app.cancel') }}</a>
  @endcan
@endsection

@section('content')

    @include('admin.partials._customer_widget')

    @if(count($cart_lists))

      @can('index', App\Cart::class)
        @include('admin.partials._cart_list')
      @endcan
    @endif

    {!! Form::open(['route' => 'admin.order.order.store', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}

        <!--#################
        #### CART START #####
        ##################-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-cart-plus"></i> {{ trans('app.cart') }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div> <!-- /.box-header -->
            <div class="box-body">

                {{ Form::hidden('customer_id', $customer->id) }}

                @include('admin.order._add_to_cart')

                @include('admin.order._cart')

            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
        <!--#################
        #### CART ENDS ######
        ##################-->

        <!--##################
        # CART SUMMARY START #
        ###################-->
        <div class="box" id="cart-summary-block" style="{{ (isset($cart) && count($cart->inventories) > 0) ? '' : 'display: none' }};">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-search-plus"></i> {{ trans('app.summary') }}</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div> <!-- /.box-header -->

            <div class="box-body">

                @include('admin.partials._cart_summary')

                <dir class="spacer30"></dir>

                <div class="row">
                  <div class="col-md-4 nopadding-right">
                    <div class="form-group">
                      {!! Form::label('payment_method_id', trans('app.form.payment_method').'*') !!}
                      {!! Form::select('payment_method_id', $payment_methods ,  isset($cart->payment_method_id) ? $cart->payment_method_id : config('shop_settings.default_payment_method_id') , ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.payment'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-4 sm-padding">
                    <div class="form-group">
                      {!! Form::label('payment_status_id', trans('app.form.payment_status').'*') !!}
                      {!! Form::select('payment_status_id', $payment_statuses, (isset($cart->payment_status_id)) ? $cart->payment_status_id : null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-4 nopadding-left">
                    <div class="form-group">
                      {!! Form::label('order_status_id', trans('app.form.order_status').'*') !!}
                      {!! Form::select('order_status_id', $order_statuses, (isset($cart->order_status_id)) ? $cart->order_status_id : null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 nopadding-right">
                    <div class="form-group">
                      {!! Form::label('carrier_id', trans('app.form.carrier').'*') !!}
                      {!! Form::select('carrier_id', $carriers ,
                          isset($cart->carrier_id) ? $cart->carrier_id : config('shop_settings.default_carrier_id') ,
                          ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.carrier'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-4 sm-padding">
                    <div class="form-group">
                      {!! Form::label('packaging_id', trans('app.form.packaging').'*') !!}
                      {!! Form::select('packaging_id', $packagings, (isset($cart->packaging_id)) ? $cart->packaging_id : config('shop_settings.default_packaging_id'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-4 nopadding-left">
                    <div class="form-group">
                      {!! Form::label('tax_id', trans('app.form.tax').'*') !!}
                      {!! Form::select('tax_id', $taxes,
                          (isset($cart->tax_id)) ? $cart->tax_id : config('shop_settings.default_tax_id_for_order'),
                          ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 nopadding-right">
                    <div class="form-group">
                      {!! Form::label('billing_address', trans('app.form.billing_address').'*', ['class' => 'with-help']) !!}
                      {!! Form::textarea('billing_address', (isset($cart->billing_address)) ? $cart->billing_address : $customer->billingAddress->toString(), ['class' => 'form-control', 'rows' => '3', 'placeholder' => trans('app.placeholder.billing_address'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="col-md-6 nopadding-left">
                    <div class="form-group">
                      {!! Form::label('shipping_address', trans('app.form.shipping_address').'*', ['class' => 'with-help']) !!}
                      <span style="margin-left: 10px;">
                        {!! Form::checkbox('same_as_billing_address', 1, null, ['id' => 'same_address', 'class' => '']) !!} {{ trans('app.form.same_as_billing_address') }}
                      </span>
                      {!! Form::textarea('shipping_address', (isset($cart->shipping_address)) ? $cart->shipping_address : $customer->shippingAddress->toString(), ['class' => 'form-control', 'rows' => '3', 'placeholder' => trans('app.placeholder.shipping_address'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  {!! Form::checkbox('send_invoice_to_customer', 1, null, ['class' => 'icheck', 'checked']) !!} {{ ' ' . trans('app.send_invoice_to_customer') }}
                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.send_invoice_to_customer') }}"></i>
                </div>

            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
        <!--##################
        # CART SUMMARY ENDS #
        ###################-->

        <!--#####################
        # ADDITIONAL INFO START #
        ######################-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-align-justify"></i> {{ trans('app.additional_info') }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div> <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  {!! Form::label('message_to_customer', trans('app.form.message_to_customer'), ['class' => 'with-help']) !!}
                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.message_to_customer') }}"></i>
                  {!! Form::textarea('message_to_customer', (isset($cart->message_to_customer)) ? $cart->message_to_customer : null, ['class' => 'form-control summernote', 'rows' => '2', 'placeholder' => trans('app.placeholder.message_to_customer')]) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('admin_note', trans('app.form.admin_note'), ['class' => 'with-help']) !!}
                  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.admin_note') }}"></i>
                  {!! Form::textarea('admin_note', (isset($cart->admin_note)) ? $cart->admin_note : null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => trans('app.placeholder.admin_note')]) !!}
                </div>

                @if(isset($cart))
                    {{ Form::hidden('cart_id', $cart->id, ['id' => 'cart_id']) }}
                    @unless(isset($order_cart))
                        <div class="form-group">
                          {!! Form::checkbox('delete_the_cart', 1, null, ['class' => 'icheck', 'checked']) !!} {{ trans('app.delete_the_cart') }}
                          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.delete_the_cart') }}"></i>
                        </div>
                    @endunless
                @endif

                <p class="help-block">* {{ trans('app.form.required_fields') }}</p>

                <div class="box-tools pull-right">
                  @if(Gate::allows('create', App\Cart::class) || Gate::allows('create', App\Order::class) || Gate::allows('update', App\Cart::class))
                    <button onClick="saveTheCart()" name='action' value="1" class='btn btn-flat btn-lg btn-default' >
                        <i class="fa fa-save"></i>
                        @if(isset($order_cart))
                            {{ trans('app.update_the_order') }}
                        @elseif(isset($cart))
                          {{ trans('app.update_n_back') }}
                        @else
                          {{ trans('app.save_n_back') }}
                        @endif
                    </button>
                  @endif

                  @if( ! isset($order_cart) && Gate::allows('create', App\Order::class))
                    <button name='action' type="submit" class='btn btn-flat btn-lg btn-new' >
                      {{ trans('app.place_order') }}
                    </button>
                  @endif
                </div>
            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
        <!--####################
        # ADDITIONAL INFO ENDS #
        #####################-->

    {!! Form::close() !!}
@endsection

@section('page-script')
    <script language="javascript" type="text/javascript">
    // Save the cart action
    function saveTheCart(e)
    {
        var cart = $("input#cart_id").val();

        var order = <?=isset($order_cart) ? 1 : 0?>;

        // console.log(order);
        if (order)
        {
            var method = '<input name="_method" type="hidden" value="PUT">';
            var url = "{{ url('admin/order/order/') }}/"+ cart;

            $("form#form").append(method);
        }
        else if (cart)
        {
            var method = '<input name="_method" type="hidden" value="PUT">';
            var url = "{{ url('admin/order/cart/') }}/"+ cart;

            $("form#form").append(method);
        }
        else
        {
            var url = "{{ url('admin/order/cart') }}";
        }

        $("form#form").attr('action', url);
        $("form#form").submit();
    }

    ;(function($, window, document) {

        var cart = "{{ isset($cart) ? TRUE : FALSE }}";
        if(cart)
        {
            setPackagingCost({{ isset($cart) ? $cart->packaging_id : NULL }});
        }else
        {
            setDefaultValues();
        }

        // Make billing and shipping address same.
        $('#same_address').change(function()
        {
            if (this.checked)
            {
                var billing_address = $('#billing_address').val();

                $('#shipping_address').val(billing_address);

                $('#shipping_address').attr('disabled', 'disabled');

            }else
            {
                $('#shipping_address').removeAttr('disabled');
            }
        });

        // Update shipping address if the billing address chnages.
        $('#billing_address').on('keyup', function()
        {
            if ($('#same_address').is(':checked'))
            {
                $('#shipping_address').val(this.value);
            }
        });

        var productObj = <?=json_encode($inventories); ?>;

        // Add to Cart
        $('#add-to-cart-btn').click(
            function()
            {
                var ID = $("#product-to-add").select2('data')[0].id;

                var itemDescription = $("#product-to-add").select2('data')[0].text;

                if (ID == '' || itemDescription == '')
                {
                    return false;
                }
                else
                {
                    $("#empty-cart").hide(); // Hide the empty cart message
                }

                $("#product-to-add").select2("val", ""); // Reset the product search dropdown

                // Check if the product is already on the cart, Is so then just increase the qtt
                if($("tr#"+ID).length)
                {
                    increaseQttByOne(ID);

                    generateItemTotal(ID);

                    return false;
                }

                //Pick the string after the : to get the item description
                itemDescription = itemDescription.substring(itemDescription.indexOf(":") + 2);

                var imgSrc = "{{ asset('') . image_path('inventories') }}" + ID + "_150x150.png";
                var imgSrcAlt = "{{ asset('') . image_path('products') }}" + productObj[ID].id + "_150x150.png";

                if (ImageExist(imgSrc))
                {
                    var img = '<img src="' + imgSrc + '" class="img-circle img-md" alt="{{ trans('app.image') }}">';

                }else if (ImageExist(imgSrcAlt))
                {
                    var img = '<img src="' + imgSrcAlt + '" class="img-circle img-md" alt="{{ trans('app.image') }}">';
                }else
                {
                    var img = '<img src="{{ asset(image_path('products') . 'default.png') }}" class="img-circle img-md" alt="{{ trans('app.image') }}">';
                }

                var numOfRows = $("tbody#items tr").length;

                var node = '<tr id="'+ ID +'">' +
                    '<td>' + img + '</td>' +
                    '<td class="nopadding-right" width="65%">' + itemDescription +
                        '<input type="hidden" name="cart['+ numOfRows +'][inventory_id]" value="'+ ID +'"></input>' +
                        '<input type="hidden" name="cart['+ numOfRows +'][item_description]" value="'+ itemDescription +'"></input>' +
                    '</td>' +
                    '<td class="nopadding-right" width="5%">' +
                        '<input name="cart['+ numOfRows +'][quantity]" value="1" type="number" id="qtt-'+ ID +'" class="form-control itemQtt" onChange="generateItemTotal('+ ID +')" placeholder="{{ trans('app.quantity') }}" required></input>' +
                    '</td>' +
                    '<td class="nopadding-right" width="10%">' +
                        '<input name="cart['+ numOfRows +'][unit_price]" value="' + productObj[ID].salePrice + '" id="price-'+ ID +'" type="number" step="any" class="form-control itemPrice" onChange="generateItemTotal('+ ID +')" placeholder="{{ trans('app.price') }}" required></input>' +
                    '</td>' +
                    '<td class="nopadding-right" width="10%">' +
                        '<span id="total-'+ ID +'"  class="itemTotal">' +
                            getFromPHPHelper('get_formated_decimal', productObj[ID].salePrice) +
                        '</span>' +
                    '</td>' +
                    '<td><i class="fa fa-close" onClick="deleteThisRow('+ ID +')" data-toggle="tooltip" data-placement="left" title="{{ trans('help.romove_this_cart_item') }}"></i></td>' +
                '</tr>';

                $('tbody#items').append(node);

                calculateOrderTotal();

                return false; //Return false to prevent unspected form submition
            }
        );

        $("#status_id").change(
                function()
                {
                    var status = $("#status_id").select2('data')[0].text;
                    // $("#status").val(status);
                }
        );

        $("#payment_method_id").change(
                function()
                {
                    var status = $("#payment_method_id").select2('data')[0].text;
                    // $("#payment_method").val(status);
                }
        );

        $("#tax_id").change(
                function()
                {
                    var ID = $("#tax_id").select2('data')[0].id;
                    setTax(ID);
                }
        );

        $("#carrier_id").change(
                function()
                {
                    var ID = $("#carrier_id").select2('data')[0].id;

                    setShippingCost(ID);
                }
        );

        $("#packaging_id").change(
                function()
                {
                    var ID = $("#packaging_id").select2('data')[0].id;
                    setPackagingCost(ID);
                }
        );

    }(window.jQuery, window, document));

    /**
     * Set default settings from shop and system settings
     */
    function setDefaultValues()
    {
        var defaultTaxId = "{{ config('shop_settings.default_tax_id_for_order') ?: false }}" ;
        if( defaultTaxId )
        {
            setTax(defaultTaxId);
        }

        var defaultCarrierId = "{{ config('shop_settings.default_carrier_id') ?: false }}" ;
        if( defaultCarrierId )
        {
            setShippingCost(defaultCarrierId);
        }

        var defaultPackagingId = "{{ config('shop_settings.default_packaging_id') ?: false }}" ;
        if( defaultPackagingId )
        {
            setPackagingCost(defaultPackagingId);
        }
    }

    function generateOrderSummary()
    {
        $("#cart-summary-block").show(); // Show the summary block

        // genarating grand total
        var total       = getOrderTotal();
        var tax         = getTax();
        var shipping    = getShipping();

        var grand = (total + tax + shipping);
        grand = getFromPHPHelper('get_formated_decimal', grand);

        $("#summary-grand-total").text(grand);
        // $("#grand_total").val(grand);

        return true;
    }

    function generateItemTotal(ID)
    {
        // var itemTotal = getItemTotal(ID);
        var itemTotal = getFromPHPHelper('get_formated_decimal', getItemTotal(ID));

        $("#total-"+ID).text(itemTotal);

        calculateOrderTotal();

        return true;
    };

    function calculateOrderTotal()
    {
        var sum = 0;

        $(".itemTotal").each(function()
        {
            sum += ($(this).text()) * 1;
        });

        sum = getFromPHPHelper('get_formated_decimal', sum);

        $("#summary-total").text(sum);

        calculateTax();

        return sum;
    };

    function setTax(ID = NULL)
    {
        if(!ID)
        {
            $("#summary-taxrate").text(0);
            calculateTax();
            return;
        }

        var url = "{{ route('admin.ajax.getTaxRate') }}"
        $.ajax({
            data: "ID="+ID,
            url: url,
            success: function(result)
            {
                $("#summary-taxrate").text(result);
                calculateTax();
            }
        });
    }

    function setShippingCost(ID = NULL)
    {
        if(!ID)
        {
            $("#summary-shipping").text( $("#summary-packaging-cost-value").text() );
            generateOrderSummary();
            return;
        }

        var url = "{{ route('admin.ajax.getShippingCost') }}"
        $.ajax({
            data: "ID="+ID,
            url: url,
            success: function(result)
            {
                if( Boolean(result.handling_cost))
                {
                    $("#summary-hadling-cost").show(); // Show the handling cost section
                }
                else
                {
                    $("#summary-hadling-cost").hide(); // Hide the handling cost section
                }

                var prsent_packaging_cost = $("#summary-packaging-cost-value").text();
                var shipping = getFromPHPHelper('get_formated_decimal',  Number(result.shipping_cost) + Number(prsent_packaging_cost));
                $("#summary-shipping").text(shipping);

                generateOrderSummary();
            }
        });
    }

    function setPackagingCost(ID = NULL)
    {
        if(!ID)
        {
            var shipping = Number($("#summary-shipping").text()) - Number($("#summary-packaging-cost-value").text());
            $("#summary-shipping").text(getFromPHPHelper('get_formated_decimal', shipping));
            $("#summary-packaging-cost").hide(); // Hide the packaging cost section
            $("#summary-packaging-cost-value").text(0);
            generateOrderSummary();
            return;
        }

        var url = "{{ route('admin.ajax.getPackagingCost') }}"
        $.ajax({
            data: "ID="+ID,
            url: url,
            success: function(result)
            {
                if( Boolean(result) && result > 0 )
                {
                    $("#summary-packaging-cost").show(); // Show the packaging cost section
                }else
                {
                    $("#summary-packaging-cost").hide(); // Hide the packaging cost section
                }

                var prsent_packaging_cost = $("#summary-packaging-cost-value").text();
                var present_shipping_cost = $("#summary-shipping").text();

                if (present_shipping_cost == prsent_packaging_cost)
                {
                    var shipping = getFromPHPHelper('get_formated_decimal', Number(result));
                }
                else if(present_shipping_cost > prsent_packaging_cost)
                {
                    var shipping = getFromPHPHelper('get_formated_decimal', Number(present_shipping_cost) - Number(prsent_packaging_cost) + Number(result));
                }
                else
                {
                    var shipping = getFromPHPHelper('get_formated_decimal', Number(present_shipping_cost) + Number(result));
                }


                $("#summary-packaging-cost-value").text( result );

                $("#summary-shipping").text( shipping );

                generateOrderSummary();
            }
        });
    }

    function calculateTax()
    {
        var total = getOrderTotal();
        var taxrate = getTaxrate();
        var tax = (total * taxrate)/100;

        tax = getFromPHPHelper('get_formated_decimal', tax);

        $("#summary-tax").text(tax);


        generateOrderSummary();

        return tax;
    };

    function getOrderTotal()
    {
        return Number($("#summary-total").text());
    };

    function getTaxrate()
    {
        return Number($("#summary-taxrate").text());
    };

    function getTax()
    {
        return Number($("#summary-tax").text());
    };

    function getShipping()
    {
        return Number($("#summary-shipping").text());
    };

    function getPackaging()
    {
        return Number($("#summary-packaging-cost-value").text());
    };

    function getItemQtt(ID)
    {
        return $("#qtt-"+ID).val();
    };

    function getItemPrice(ID)
    {
        return $("#price-"+ID).val();
    };

    function getItemTotal(ID)
    {
        return Number(getItemQtt(ID)) * Number(getItemPrice(ID));
    };

    // Remove table rows
    function deleteThisRow(ID)
    {
        $("tr#"+ID).remove();

        if($("tbody#items tr").length <= 1)
        {
            $("#empty-cart").show(); // Show the empty cart message
            $("#cart-summary-block").hide(); // Hide cart summary block
        }

        calculateOrderTotal();

        return false;
    };

    function increaseQttByOne(ID)
    {
        var qtt = $("#qtt-"+ID).val();

        $("#qtt-"+ID).val(++qtt);

        return true;
    };

    // Check if a image file is exist
    function ImageExist(url)
    {
        var http = new XMLHttpRequest();
        http.open('HEAD', url, false);
        http.send();
        return http.status != 404;
    };

    </script>
@endsection