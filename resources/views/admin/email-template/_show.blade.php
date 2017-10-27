<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">
				@if(File::exists('assets/images/carriers/'.$carrier->id.'_150x150.png'))
					<img class="thumbnail" src="{{ asset('assets/images/carriers/'.$carrier->id.'_150x150.png') }}" width="100%" alt="Image">
				@else
					<img class="thumbnail" src="{{ asset('assets/images/carriers/default.png') }}" width="100%" alt="Image">
				@endif
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
		            @if($carrier->tracking_url)
					<tr>
						<th class="text-right">{{ trans('app.tracking_url') }}:</th>
						<td style="width: 75%;">{{ $carrier->tracking_url }}</td>
					</tr>
					@endif		            <tr>
		            	<th class="text-right">{{ trans('app.status') }}: </th>
		            	<td style="width: 75%;">{{ ($carrier->active) ? trans('app.active') : trans('app.inactive') }}</td>
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

		        @if($carrier->description)
		            <strong>{{ trans('app.description') }}: </strong>{!! $carrier->description !!}
		        @endif

            </div>

        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->