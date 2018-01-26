@extends('admin.layouts.master')

@php
	$can_update = Gate::allows('update', $config) ?: Null;
@endphp

@section('content')
	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#basic_info" data-toggle="tab">
					<i class="fa fa-file hidden-sm"></i>
					{{ trans('app.basic_info') }}
				</a></li>
				<li><a href="#inventory" data-toggle="tab">
					<i class="fa fa-cubes hidden-sm"></i>
					{{ trans('app.inventory') }}
				</a></li>
				<li><a href="#order" data-toggle="tab">
					<i class="fa fa-shopping-cart hidden-sm"></i>
					{{ trans('app.order') }}
				</a></li>
				<li><a href="#checkout" data-toggle="tab">
					<i class="fa fa-credit-card hidden-sm"></i>
					{{ trans('app.checkout') }}
				</a></li>
				<li><a href="#views" data-toggle="tab">
					<i class="fa fa-laptop hidden-sm"></i>
					{{ trans('app.views') }}
				</a></li>
				<li><a href="#support" data-toggle="tab">
					<i class="fa fa-phone hidden-sm"></i>
					{{ trans('app.support') }}
				</a></li>
				<li><a href="#analytics" data-toggle="tab">
					<i class="fa fa-line-chart hidden-sm"></i>
					{{ trans('app.analytics') }}
				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane active" id="basic_info">
			    	<div class="row">
				        {!! Form::model($shop, ['method' => 'PUT', 'route' => ['admin.setting.basic.config.update', $shop->id], 'files' => true, 'id' => 'form', 'class' => 'form-horizontal', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-9">
								<div class="form-group">
									{!! Form::label('name', '*' . trans('app.shop_name') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_name') }}"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		@if($can_update)
								  			{!! Form::text('name', $shop->name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_name'), 'required']) !!}
									  		<div class="help-block with-errors"></div>
										@else
											<span class="lead">{{ $shop->name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
									@if($shop->slug)
										{!! Form::label('slug', trans('app.shop_url') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_url') }}"></i>
									  	<div class="col-sm-8 nopadding-left">
											<span> {{ get_shop_url($shop->id) }} </span>
										</div>
									@elseif($can_update)
										{!! Form::label('slug', '*' . trans('app.form.slug') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_slug') }}"></i>
									  	<div class="col-sm-8 nopadding-left">
								  			{!! Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']) !!}
									  		<div class="help-block with-errors"></div>
										</div>
									@endif
								</div>

								<div class="form-group">
									{!! Form::label('legal_name', '*' . trans('app.shop_legal_name') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_legal_name') }}"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		@if($can_update)
								  			{!! Form::text('legal_name', $shop->legal_name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_name'), 'required']) !!}
									  		<div class="help-block with-errors"></div>
										@else
											<span>{{ $shop->legal_name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
									{!! Form::label('email', '*' . trans('app.form.email_address'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_email') }}"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		@if($can_update)
											{!! Form::email('email', $shop->email, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']) !!}
									  		<div class="help-block with-errors"></div>
										@else
											<span>{{ $shop->email }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
								    {!! Form::label('external_url', trans('app.form.external_url') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_external_url') }}"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		@if($can_update)
									    	{!! Form::text('external_url', $shop->external_url, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.external_url')]) !!}
										@else
											<span>{{ $shop->external_url }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('timezone_id', '*' . trans('app.form.timezone'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.shop_timezone') }}"></i>
								  	<div class="col-sm-8 nopadding-left">
								  		@if($can_update)
									        {!! Form::select('timezone_id', $timezones , $shop->timezone_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.timezone'), 'required']) !!}
									  		<div class="help-block with-errors"></div>
										@else
											<span>{{ $shop->timezone->text }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
									{!! Form::label('description', trans('app.form.description') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<div class="col-sm-8 nopadding-left">
								  		@if($can_update)
											{!! Form::textarea('description', $shop->description, ['class' => 'form-control summernote-min', 'placeholder' => trans('app.placeholder.description'), 'rows' => '3']) !!}
										@else
											<span>{{ $shop->description }}</span>
										@endif
									</div>
								</div>
						  		@if($can_update)
									<div class="form-group">
										<label for="exampleInputFile" class="with-help col-sm-3 control-label"> {{ trans('app.form.logo') }}</label>
								      	<div class="col-md-6 nopadding">
											<input id="uploadFile" placeholder="{{ trans('app.placeholder.logo') }}" class="form-control" disabled="disabled" style="height: 28px;" />
								    	</div>
									    <div class="col-md-2 nopadding-left">
										  	<div class="fileUpload btn btn-primary btn-block btn-flat">
										      <span>{{ trans('app.form.upload') }}</span>
											    <input type="file" name="image" id="uploadBtn" class="upload" />
									      	</div>
									    </div>
									</div>
								@endif

								<p class="help-block">* {{ trans('app.form.required_fields') }}</p>

						  		@if($can_update)
									<div class="col-md-offset-3">
							            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']) !!}
							        </div>
						  		@endif
					    	</div>

					        <div class="col-sm-3">
						    	@if($can_update)
									<div class="form-group text-center">
										{!! Form::label('maintenance_mode', trans('app.form.maintenance_mode'), ['class' => 'control-label with-help']) !!}
									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.maintenance_mode_handle') }}"></i>

									  	<div class="handle">
											<a href="{{ route('admin.setting.config.maintenanceMode.toggle', $shop) }}" type="button" class="btn btn-lg btn-secondary btn-toggle {{ $config->maintenance_mode == 1 ? 'active' : '' }}" data-toggle="button" aria-pressed="{{ $config->maintenance_mode == 1 ? 'true' : 'false' }}" autocomplete="off">
												<div class="btn-handle"></div>
											</a>
									  	</div>
									</div>
							        <div class="spacer50"></div>
						        @endif

						  		@if(isset($shop) && File::exists(image_path('shops') . $shop->id . '_150x150.png'))
									<div class="form-group text-center">
										<label for="exampleInputFile" class="with-help control-label"> {{ trans('app.logo') }}</label>
								    	<img src="{{ get_image_src($shop->id, 'shops') }}" width="100%" alt="{{ trans('app.image') }}">

								        <div class="spacer20"></div>

										<label>
									    	{!! Form::checkbox('delete_image', 1, null, ['class' => 'icheck']) !!} {{ trans('app.form.delete_logo') }}
										</label>
									</div>
							  	@endif
							</div>
				        {!! Form::close() !!}
			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="inventory">
			    	<div class="row">
				        {!! Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-12">
								<div class="form-group">
							        {!! Form::label('default_tax_id_for_inventory', trans('app.default_tax'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_tax_for_inventory') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
									        {!! Form::select('default_tax_id_for_inventory', $taxes , $config->default_tax_id_for_inventory, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
										@else
											<span>{{ $config->inventoryTax->name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_supplier_id', trans('app.default_supplier'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_supplier') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
									        {!! Form::select('default_supplier_id', $suppliers , $config->default_supplier_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
										@else
											<span>{{ $config->supplier->name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_warehouse_id', trans('app.default_warehouse'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_warehouse') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
									        {!! Form::select('default_warehouse_id', $warehouses , $config->default_warehouse_id, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
										@else
											<span>{{ $config->warehouse->name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_carrier_ids_for_inventory', trans('app.default_carriers'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_carrier_ids_for_inventory') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    {!! Form::select('default_carrier_ids_for_inventory[]', $carriers , $config->default_carrier_ids_for_inventory, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']) !!}
										@else
											@foreach($config->default_carrier_ids_for_inventory as $carrier)
												<span class="label label-outline">{{ get_value_from($carrier, 'carriers', 'name') }}</span>
											@endforeach
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_packaging_ids', trans('app.default_packagings'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_packaging_ids_for_inventory') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    {!! Form::select('default_packaging_ids[]', $packagings , $config->default_packaging_ids, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']) !!}
										@else
											@foreach($config->default_packaging_ids as $packaging)
												<span class="label label-outline">{{ get_value_from($packaging, 'packagings', 'name') }}</span>
											@endforeach
										@endif
								  	</div>
								</div>

						  		@if($can_update)
									<div class="col-md-offset-3">
							            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']) !!}
							        </div>
						  		@endif
					    	</div>
				        {!! Form::close() !!}
			    	</div>
			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane" id="order">
			    	<div class="row">
				        {!! Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-12">
								<div class="form-group">
									{!! Form::label('order_number_prefix', trans('app.order_number_prefix') . ':', ['class' => 'with-help col-sm-3 control-label']) !!}
							        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.order_number_prefix_suffix') }}"></i>
								  	<div class="col-sm-2 nopadding-left">
								  		@if($can_update)
								  			{!! Form::text('order_number_prefix', $config->order_number_prefix, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.order_number_prefix')]) !!}
										@else
											<span>{{ $config->order_number_prefix }}</span>
										@endif
								  	</div>

									{!! Form::label('order_number_suffix', trans('app.and') . ' ' . trans('app.suffix') . ':', ['class' => 'with-help col-sm-2 control-label']) !!}
								  	<div class="col-sm-2 nopadding-left">
								  		@if($can_update)
								  			{!! Form::text('order_number_suffix', $config->order_number_suffix, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.order_number_suffix')]) !!}
										@else
											<span>{{ $config->order_number_suffix }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_tax_id_for_order', trans('app.default_tax'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_tax_id_for_order') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
									        {!! Form::select('default_tax_id_for_order', $taxes , $config->default_tax_id_for_order, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
										@else
											<span>{{ $config->tax->name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('order_handling_cost', trans('app.order_handling_cost'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.config_order_handling_cost') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
									        	{!! Form::number('order_handling_cost', get_formated_decimal($config->order_handling_cost), ['class' => 'form-control', 'placeholder' => trans('app.placeholder.order_handling_cost')]) !!}
										        <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
											</div>
										@else
											<span>{{ get_formated_decimal($config->order_handling_cost) }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_carrier_id', trans('app.default_carrier'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_carrier') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    {!! Form::select('default_carrier_id', $carriers , $config->default_carrier_id, ['class' => 'form-control select2-normal']) !!}
										@else
											<span>{{ $config->carrier->name }}</span>
										@endif
								  	</div>
								</div>

						  		@if($can_update)
									<div class="col-md-offset-3">
							            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']) !!}
							        </div>
						  		@endif
					    	</div>
				        {!! Form::close() !!}
			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="checkout">
			    	<div class="row">
				        {!! Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-12">
								<div class="form-group">
							        {!! Form::label('default_payment_method_id', trans('app.default_payment_method'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_payment_method_id') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    {!! Form::select('default_payment_method_id', $payment_methods , $config->default_payment_method_id, ['class' => 'form-control select2-normal']) !!}
										@else
											<span>{{ $config->payment_method->name }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('free_shipping_starts', trans('app.free_shipping_starts'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.free_shipping_starts') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
									    	    {!! Form::number('free_shipping_starts', get_formated_decimal($config->free_shipping_starts)?:Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.free_shipping_starts')]) !!}
										        <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
									    	</div>
										@else
											<span>{{ get_formated_decimal($config->free_shipping_starts)?:Null }}</span>
										@endif
								  	</div>
								</div>

						  		@if($can_update)
									<div class="col-md-offset-3">
							            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']) !!}
							        </div>
						  		@endif
							</div>
				        {!! Form::close() !!}
			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="views">
			    	<div class="row">
				        {!! Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-6">
					    		<fieldset>
					    			<legend>{{ trans('app.back_office') }}</legend>
									<div class="form-group">
								        {!! Form::label('pagination', trans('app.pagination'). ':', ['class' => 'with-help col-sm-4 control-label']) !!}
									  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.config_pagination') }}"></i>
									  	<div class="col-sm-7 nopadding-left">
									  		@if($can_update)
											    <div class="input-group">
										    	    {!! Form::number('pagination', get_formated_decimal($config->pagination)?:Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.pagination')]) !!}
											        <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
										    	</div>
											@else
												<span>{{ get_formated_decimal($config->pagination)?:Null }}</span>
											@endif
									  	</div>
									</div>
					    		</fieldset>
					    	</div>
					    	<div class="col-sm-6">
					    		<fieldset>
					    			<legend>{{ trans('app.store_front') }}</legend>
					    		</fieldset>
					    	</div>

					  		@if($can_update)
								<div class="col-sm-12">
						            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new col-sm-offset-2']) !!}
						        </div>
					  		@endif
				        {!! Form::close() !!}
			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			    <div class="tab-pane" id="support">
			    	<div class="row">
				        {!! Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-12">
								<div class="form-group">
							        {!! Form::label('support_phone', trans('app.support_phone'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.support_phone') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
									    	    {!! Form::number('support_phone', $config->support_phone, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_phone')]) !!}
									    	</div>
										@else
											<span>{{ $config->support_phone }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('support_phone_toll_free', trans('app.support_phone_toll_free'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.support_phone_toll_free') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
									    	    {!! Form::number('support_phone_toll_free', $config->support_phone_toll_free, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_phone_toll_free')]) !!}
									    	</div>
										@else
											<span>{{ $config->support_phone_toll_free }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('support_email', '*' . trans('app.support_email'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.support_email') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
												{!! Form::email('support_email', $config->support_email, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.support_email'), 'required']) !!}
									    	</div>
									      	<div class="help-block with-errors"></div>
										@else
											<span>{{ $config->support_email }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_sender_email_address', '*' . trans('app.default_sender_email_address'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_sender_email_address') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-at"></i></span>
												{!! Form::email('default_sender_email_address', $config->default_sender_email_address, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.default_sender_email_address'), 'required']) !!}
									    	</div>
									      	<div class="help-block with-errors"></div>
										@else
											<span>{{ $config->default_sender_email_address }}</span>
										@endif
								  	</div>
								</div>

								<div class="form-group">
							        {!! Form::label('default_email_sender_name', '*' . trans('app.default_email_sender_name'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.default_email_sender_name') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
										    <div class="input-group">
										        <span class="input-group-addon"><i class="fa fa-user"></i></span>
												{!! Form::text('default_email_sender_name', $config->default_email_sender_name, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.default_email_sender_name'), 'required']) !!}
									    	</div>
									      	<div class="help-block with-errors"></div>
										@else
											<span>{{ $config->default_email_sender_name }}</span>
										@endif
								  	</div>
								</div>
								<p class="help-block">* {{ trans('app.form.required_fields') }}</p>

						  		@if($can_update)
									<div class="col-md-offset-3">
							            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']) !!}
							        </div>
						  		@endif
						  	</div>
				        {!! Form::close() !!}
			    	</div>
			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane" id="analytics">
			    	<div class="row">
				        {!! Form::model($config, ['method' => 'PUT', 'route' => ['admin.setting.config.update', $config], 'files' => true, 'id' => 'form2', 'class' => 'form-horizontal ajax-form', 'data-toggle' => 'validator']) !!}
					    	<div class="col-sm-12">
								<div class="form-group">
							        {!! Form::label('google_analytics_id', trans('app.google_analytics_id'). ':', ['class' => 'with-help col-sm-3 control-label']) !!}
								  	<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="left" title="{{ trans('help.google_analytics_id') }}"></i>
								  	<div class="col-sm-6 nopadding-left">
								  		@if($can_update)
								    	    {!! Form::text('google_analytics_id', $config->google_analytics_id, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.google_analytics_id')]) !!}
										@else
											<span>{{ $config->google_analytics_id }}</span>
										@endif
								  	</div>
								</div>

						  		@if($can_update)
									<div class="col-md-offset-3">
							            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-lg btn-flat btn-new']) !!}
							        </div>
						  		@endif
						  	</div>
				        {!! Form::close() !!}
			    	</div>
			    </div>
			    <!-- /.tab-pane -->

			</div>
			<!-- /.tab-content -->
		</div>
	</div> <!-- /.box -->
@endsection