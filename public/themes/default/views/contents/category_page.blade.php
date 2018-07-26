<section>
  <div class="container full-width">
      <div class="row">
        <div class="col-md-2 bg-light">

          @include('contents.product_list_sidebar_filters')

        </div><!-- /.col-md-2 -->
        <div class="col-md-10" style="padding-left: 15px;">

          @include('contents.product_list_top_filter')
          @include('contents.product_list')

        </div><!-- /.col-md-10 -->
      </div><!-- /.row -->
  </div><!-- /.container -->
</section>