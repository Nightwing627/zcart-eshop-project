@extends('layouts.app')

@section('content')
    <div class="container">
        @if(! Auth::guard('customer')->user()->isVerified())
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong><i class="icon fa fa-info-circle"></i> {{ trans('app.notice') }}</strong>
                {{ trans('messages.email_verification_notice') }}
                <a href="{{ route('customer.verify') }}"> {{ trans('app.resend_varification_link') }}</a>
            </div>
        @endif
    </div>

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Customer Dashboard</div>

                    <div class="panel-body">
                        Customer Dashboard
                        <br/>
                        {{-- <pre> --}}
                        {{ Auth::guard('customer')->user() }}
                        {{-- </pre> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
