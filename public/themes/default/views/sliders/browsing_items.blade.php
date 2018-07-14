<section class="bg-light">
  <div class="container full-width">
    <div class="section-title">
      <h4 class="small">You Veiwed <span class="text-primary">Recently</span></h4>
    </div>
    <div class="section-content">
      @php
          $items = [10,8,6,4,3,3,5,6,7,8,2,4,5]; //TEST
      @endphp

      @include('sliders.carousel_thumbs_small', ['products' => $items])
    </div>
  </div><!-- /.container -->
</section>