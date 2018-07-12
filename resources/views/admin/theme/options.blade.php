@extends('admin.layouts.master')

@section('page-style')
    {{-- <link href="{{ theme_asset_url('css/style.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
	<div class="box">
		@php
			// $active_theme = $storeFrontThemes->firstWhere('slug', active_theme());

			// $storeFrontThemes = $storeFrontThemes->filter(function ($value, $key) {
			//     return $value['slug'] != active_theme();
			// });
		@endphp
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#banner-tab" data-toggle="tab">
					{{ trans('app.banners') }}
				</a></li>
				<li><a href="#slider-tab" data-toggle="tab">
					{{ trans('app.sliders') }}
				</a></li>
				<li><a href="#settings-tab" data-toggle="tab">
					{{ trans('app.settings') }}
				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane active" id="banner-tab">
		    		<table class="table">
		    			<thead>
		    				<tr>
		    					<th>Image</th>
		    					<th>Banckground</th>
		    					<th>Detail</th>
		    					<th>&nbsp;</th>
		    				</tr>
		    			</thead>
		    			<tbody>
		    				<tr>
		    					<td>

		    					</td>
		    					<td>

		    					</td>
		    					<td>

		    					</td>
		    					<td>

		    					</td>
		    				</tr>
		    			</tbody>
		    		</table>
			    </div><!-- /#banner-tab -->

			    <div class="tab-pane" id="slider-tab">
			    	<table class="table">
			    		<thead>
			    			<tr>
			    				<th></th>
			    				<th></th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			<tr>
			    				<td></td>
			    				<td></td>
			    			</tr>
			    		</tbody>
			    	</table>
			    </div><!-- /#slider-tab -->

			    <div class="tab-pane" id="settings-tab">
			    	<table class="table">
			    		<thead>
			    			<tr>
			    				<th></th>
			    				<th></th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			<tr>
			    				<td></td>
			    				<td></td>
			    			</tr>
			    		</tbody>
			    	</table>
			    </div><!-- /#settings-tab -->
			</div><!-- /.tab-content -->
		</div><!-- /.nav-tabs-custom -->
	</div> <!-- /.box -->
@endsection
