@extends('layouts.app')

@section('content')
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
