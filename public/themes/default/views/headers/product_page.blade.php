<section>
    <div class="container">
        <header class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb nav-breadcrumb">
                      @include('headers.lists.categories')
                      @include('headers.lists.category', ['category' => $product->categories->first()])
                      <li class="active">{{ $product->name }}</li>
                    </ol>
                </div>
            </div>
        </header>
    </div>
</section>