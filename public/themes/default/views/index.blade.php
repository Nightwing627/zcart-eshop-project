@extends('layouts.main')

@section('content')
    <!-- MAIN SLIDER -->
    @include('sliders.main')

    <!-- BEST DEALS BANNER -->
    @include('banners.best_deals')

    <!-- TRENDING ITEMS -->
    <section>
        <div class="container">
          <div class="row">
              <div class="col-md-12 nopadding">
                <div class="section-title">
                  <h4>@lang('theme.section_headings.trending_now')</h4>
                </div>

                @include('sliders.carousel_with_feedback', ['products' => $trending])

              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <!-- PRODUCTS -->
    @include('contents.products')

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection