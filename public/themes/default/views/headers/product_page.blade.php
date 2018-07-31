<section>
  <div class="container">
    <header class="page-header">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb nav-breadcrumb">
            @include('headers.lists.home')
            @include('headers.lists.categories')
            @if($item->product->categories->count())
              @include('headers.lists.category', ['category' => $item->product->categories->first()])
            @endif
            <li class="active">{{ $item->title }}</li>
          </ol>
        </div>
      </div>
    </header>
  </div>
</section>