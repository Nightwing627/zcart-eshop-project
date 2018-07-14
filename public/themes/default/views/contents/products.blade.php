<section>
  <div class="container">
    <div class="row">
      <div class="col-md-9 nopadding-left">

        <div class="space20"></div>

        <!-- Place one Banner -->
        @include('banners.place_one')

        <div class="row">
          <div class="section-title">
            <h4>Recently <span class="text-primary">Added</span></h4>
          </div>

          @include('sliders.carousel_without_feedback', ['products' => $recent])

        </div><!-- /.row -->

        <!-- Place Two Banner -->
        @include('banners.place_two')

        <div class="row">
          <div class="section-title">
            <h4>Additional items to <span class="text-primary">explore</span></h4>
          </div>

          @include('sliders.carousel_thumbs', ['products' => $recent])
        </div><!-- /.row -->

        <!-- Place Three Banner -->
        @include('banners.place_three')
      </div> <!-- /.col-md-9 -->

      <div class="col-md-3 nopadding-right bg-light">
        <div class="section-title" style="margin-top: 30px;">
          <h4>Weekly <span class="text-primary">Popular</span></h4>
        </div>

        @include('contents.sidebar_product_list', ['products' => $recent])

        <div class="space30"></div>

        <!-- Sidebar Banner -->
        @include('banners.sidebar')
      </div> <!-- /.col-md-3 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>