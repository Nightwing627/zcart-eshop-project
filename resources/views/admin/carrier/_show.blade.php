<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">

				<img src="{{ get_image_src($carrier->id, 'carriers', '150x150') }}" class="thumbnail" width="100%" alt="{{ trans('app.image') }}">

			</div>
            <div class="col-md-9 nopadding">
				<table class="table no-border">
					<tr>
						<th class="text-right">{{ trans('app.name') }}:</th>
						<td style="width: 75%;">{{ $carrier->name }}</td>
					</tr>
		            @if($carrier->email)
					<tr>
						<th class="text-right">{{ trans('app.email') }}:</th>
						<td style="width: 75%;">{{ $carrier->email }}</td>
					</tr>
					@endif
		            @if($carrier->phone)
					<tr>
						<th class="text-right">{{ trans('app.phone') }}:</th>
						<td style="width: 75%;">{{ $carrier->phone }}</td>
					</tr>
					@endif
					<tr>
		            	<th class="text-right">{{ trans('app.status') }}: </th>
		            	<td style="width: 75%;">
		            		{{ ($carrier->active) ? trans('app.active') : trans('app.inactive') }}
		            	</td>
		            </tr>
					<tr>
						<th class="text-right">{{ trans('app.available_from') }}:</th>
						<td style="width: 75%;">{{ $carrier->created_at->toFormattedDateString() }}</td>
					</tr>
					<tr>
						<th class="text-right">{{ trans('app.updated_at') }}:</th>
						<td style="width: 75%;">{{ $carrier->updated_at->toDayDateTimeString() }}</td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>

			<div class="box-body">
		        <table class="table">
					<tr>
						<th class="text-right">{{ trans('app.shipping_max_depth') }}:</th>
						<td style="width: 25%;">{{ get_formated_decimal($carrier->max_width)  . config('system_settings.length_unit') ?: 'cm' }}</td>
						<th class="text-right">{{ trans('app.shipping_max_height') }}:</th>
						<td style="width: 25%;"> {{ get_formated_decimal($carrier->max_height) . config('system_settings.length_unit') ?: 'cm' }} </td>
					</tr>
					<tr>
						<th class="text-right">{{ trans('app.shipping_max_depth') }}:</th>
						<td style="width: 25%;"> {{ get_formated_decimal($carrier->max_depth) . config('system_settings.length_unit') ?: 'cm' }} </td>
						<th class="text-right">{{ trans('app.shipping_max_weight') }}:</th>
						<td style="width: 25%;"> {{ get_formated_decimal($carrier->max_weight) . config('system_settings.weight_unit') ?: 'gm' }} </td>
					</tr>
		        </table>

		        <br/><br/>

	            @if($carrier->tracking_url)
	            <table class="table">
					<tr>
						<th class="text-right">{{ trans('app.tracking_url') }}:</th>
						<td style="width: 80%;"> {{ $carrier->tracking_url }}</td>
					</tr>
	            </table>
				@endif

            </div>

        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->