<!-- CONTENT SECTION -->
<section>
  <div class="container full-width">

    <!-- BEST SELLING FROM THIS BRAND -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 nopadding">
            <div class="section-title">
              <h4> Best Selling <span class="text-primary">Items</span></h4>
            </div>
            @php
              $best_selling = [10,8,6,4,3,3,5,6,7,8,2,4,5]; //TEST
            @endphp

            @include('sliders.carousel_with_feedback', ['products' => $best_selling])
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>

    <div class="clearfix space50"></div>

    <div class="row">
        <div class="col-md-2 bg-light">
            <aside class="category-filters">
                <div class="category-filters-section">
                    <h3>Condition</h3>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> New <span class="small">(100)</span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> Used <span class="small">(59)</span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> Refurbished <span class="small">(94)</span>
                        </label>
                    </div>
                </div>

                <div class="category-filters-section">
                    <h3>Review</h3>
                    <ul class="cateogry-filters-list">
                      <li>
                        <a href="#" class="product-info-rating">
                            <span class="rated">&#9733;</span>
                            <span class="rated">&#9733;</span>
                            <span class="rated">&#9733;</span>
                            <span class="rated">&#9733;</span>
                            <span>&#9734;</span>
                            <span class="small"> &amp; Up</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="product-info-rating">
                            <span class="rated">&#9733;</span>
                            <span class="rated">&#9733;</span>
                            <span class="rated">&#9733;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span class="small"> &amp; Up</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="product-info-rating">
                            <span class="rated">&#9733;</span>
                            <span class="rated">&#9733;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span class="small"> &amp; Up</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="product-info-rating">
                            <span class="rated">&#9733;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span class="small"> &amp; Up</span>
                        </a>
                      </li>
                    </ul>
                </div>

                <div class="category-filters-section">
                    <h3>Price</h3>
                    <ul class="cateogry-filters-list">
                      <li>
                        <a href="#">Under $25</a>
                      </li>
                      <li>
                        <a href="#">$25 to $50</a>
                      </li>
                      <li>
                        <a href="#">$50 to $100</a>
                      </li>
                      <li>
                        <a href="#">$100 to $250</a>
                      </li>
                      <li>
                        <a href="#">$250 &amp; Above</a>
                      </li>
                    </ul>
                    <input type="text" id="price-slider" />
                </div>

                <div class="category-filters-section">
                    <h3>Discount</h3>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> 10% Off or More <span class="small">(99)</span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> 25% Off or More <span class="small">(59)</span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> 50% Off or More <span class="small">(62)</span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                          <input class="i-check" type="checkbox"> 75% Off or More <span class="small">(10)</span>
                        </label>
                    </div>
                </div>
            </aside>
        </div><!-- /.col-md-2 -->

        <div class="col-md-10">

          @include('contents.product_list')

        </div><!-- /.col-md-10 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>
<!-- END CONTENT SECTION -->

<div class="clearfix space20"></div>