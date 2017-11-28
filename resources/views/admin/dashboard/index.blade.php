@extends('admin.layouts.master')

@section('buttons')
@endsection

@section('content')
	<h2>{{ 'Dashboard '}}</h2>
	@if(Request::session()->has('impersonated'))
		<strong>Impersonated ID :: {{ Request::session()->get('impersonated') }}</strong>
	@endif
@endsection


