@extends('admin.layouts.master')

{{-- @section('buttons')
@endsection --}}

@section('content')
    @if(! Auth::user()->isVerified())
		<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong><i class="icon fa fa-info-circle"></i>{{ trans('app.notice') }}</strong>
			{{ trans('messages.email_verification_notice') }}
	    	<a href="{{ route('verify') }}">{{ trans('app.resend_varification_link') }}</a>
		</div>
    @endif

	@if(Request::session()->has('impersonated'))
		<strong>Impersonated ID :: {{ Request::session()->get('impersonated') }}</strong>
	@endif

	<div class="btn-group  pull-right">
		<a href="{{ route('admin.support.ticket.index') }}" class="btn btn-default">View Tickets</a>
		<a href="{{ route('admin.support.ticket.create') }}" class="ajax-modal-btn btn btn-default">Submit a Ticket</a>
	</div>

@endsection