<section>
    <div class="container">
      <div class="row">
          <div class="col-md-12 nopadding">
            <div class="section-title">
              <h4>Trending <span class="text-primary">Now</span></h4>
            </div>
            <div class="owl-carousel product-carousel">
                @php
                    $treanding = [10,8,6,4,3,3,5,6,7,8,2,4,5]; //TEST
                @endphp
                @foreach($treanding as $product)
                    <div class="product-widget">
                        <img class="product-img" src="http://via.placeholder.com/200" alt="Image Alternative text" title="Image Title" />
                        <a class="product-link" href="product-page.html"></a>
                        <div class="product-info">
                            @include('layouts.ratings', ['ratings' => 4.5])

                            <h5 class="product-info-title">WENGER WOMEN'S STAINLESS STEEL DATE NEW WATCH 0721.102</h5>
                            <div class="product-info-price">$106</div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>