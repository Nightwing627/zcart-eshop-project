@extends('admin.layouts.master')

@section('buttons')
@endsection

@section('content')
	<h2>{{ 'Dashboard '}}</h2>
	<?php
			print_r(get_image_src(Auth::user()->id, 'users', 'medium'));
	?>
	@if(Request::session()->has('impersonated'))
		<strong>Impersonated ID :: {{ Request::session()->get('impersonated') }}</strong>
	@endif
@endsection