@extends('admin.layouts.master')

@section('buttons')
@endsection

@section('content')
	<h2>{{ 'Dashboard '}}</h2>

	@if(Request::session()->has('impersonated'))
		<strong>Impersonated ID :: {{ Request::session()->get('impersonated') }}</strong>
	@endif

	<div class="btn-group  pull-right">
		<a href="{{ route('admin.support.ticket.index') }}" class="btn btn-default">View Tickets</a>
		<a href="{{ route('admin.support.ticket.create') }}" class="ajax-modal-btn btn btn-default">Submit a Ticket</a>
	</div>

@endsection