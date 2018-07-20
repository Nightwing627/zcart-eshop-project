@extends('layouts.main')

@section('content')
    <!-- HEADER SECTION -->
    @include('headers.dispute_page')

    <!-- CONTENT SECTION -->
	@include('contents.dispute_page')

    <!-- MODALS -->
    @include('modals.dispute')
@endsection