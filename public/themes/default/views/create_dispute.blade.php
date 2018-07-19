@extends('layouts.main')

@section('content')
    <!-- HEADER SECTION -->
    @include('headers.dispute_page')

    <!-- CONTENT SECTION -->
	@include('contents.create_dispute')

    <!-- MODALS -->
    @include('modals.refund')
    @include('modals.dispute')
@endsection