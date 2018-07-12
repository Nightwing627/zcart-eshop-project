@extends('layouts.main')

@section('content')
    <!-- HEADER SECTION -->
    @include('headers.product_page', ['product' => $product])

    <!-- CONTENT SECTION -->
    @include('contents.product_page')

    <!-- RELATED ITEMS -->
    @include('sliders.related_items')

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection
