@extends('layouts.main')

@section('content')
    <!-- MAIN SLIDER -->
    @include('sliders.main')

    <!-- BEST DEALS BANNER -->
    @include('banners.best_deals')

    <!-- TRENDING ITEMS -->
    @include('sliders.trending_items')

    <!-- PRODUCTS -->
    @include('contents.prodducts')

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection