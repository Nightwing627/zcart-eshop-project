<div class="owl-carousel small-carousel carousel-img-only">
    @foreach($products as $item)
        <div class="product-widget">
            <img class="product-img" src="{{ get_storage_file_url(optional($item->image)->path, 'small') }}" alt="{{ $item->title }}" title="{{ $item->title }}" />
            <a class="product-link itemQuickView" href="{{ route('quickView.product', $item->slug) }}"></a>
        </div>
    @endforeach
</div>