
    <!-- Standard -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="referrer" content="{{ $referrer ?? config('seo.meta.referrer') }}">
    <meta name="robots" content="{{ $robots ?? config('seo.meta.robots') }}">
    <meta name="revisit-after" content="{{ config('seo.meta.revisit_after', '7 days') }}" />

    @if(isset($item))

        <meta name="description" content="{!! substr($item->description, 0, config('seo.meta.description_character_limit', 160)) !!}">
        <meta name="image" content="{{ get_product_img_src($item, 'full') }}">
        <meta name="keywords" content="{!! implode(', ', $item->tags->pluck('name')->toArray()) !!}">

    @elseif(isset($blog))

        <meta property="article:published_time" content="2020-02-25">
        <meta property="article:author" content="author">
        <meta name="keywords" content="{!! implode(', ', $blog->tags->pluck('name')->toArray()) !!}">

    @else

        <meta name="description" content="{!! $description ?? config('seo.meta.description') !!}">
        <meta name="image" content="{{ $image ?? config('seo.meta.image') }}">

    @endif

    <!-- Geo loacation -->
    @if(config('seo.meta.geo_region') !== '')
        <meta name="geo.region" content="{{ config('seo.meta.geo_region') }}">
        <meta name="geo.placename" content="{{  config('seo.meta.geo_region') }}">
    @endif
    @if(config('seo.meta.geo_position') !== '')
        <meta name="geo.position" content="{{ config('seo.meta.geo_position') }}">
        <meta name="ICBM" content="{{ config('seo.meta.geo_position') }}">
    @endif

    <!-- Dublin Core basic info -->
    <meta name="dcterms.Format" content="text/html">
    <meta name="dcterms.Type" content="text/html">
    <meta name="dcterms.Language" content="{{ config('app.locale') }}">
    <meta name="dcterms.Identifier" content="{{ url()->current() }}">
    <meta name="dcterms.Relation" content="{{  config('app.name') }}">
    <meta name="dcterms.Publisher" content="{{  config('app.name') }}">
    <meta name="dcterms.Coverage" content="{{ url()->current() }}">
    <meta name="dcterms.Contributor" content="{{ $author ?? config('app.name') }}">

    @if(isset($item))

        <meta name="dcterms.Title" content="{!! $item->title !!}">
        <meta name="dcterms.Subject" content="{!! implode(', ', $item->tags->pluck('name')->toArray()) !!}">
        <meta name="dcterms.Description" content="{!! substr($item->description, 0, config('seo.meta.description_character_limit', 160)) !!}">

    @elseif(isset($blog))

        <meta name="dcterms.Title" content="{{ $title ?? get_platform_title() }}">
        <meta name="dcterms.Subject" content="{{ $keywords ?? config('seo.meta.keywords') }}">
        <meta name="dcterms.Description" content="{{ $description ?? config('seo.meta.description') }}">

    @else

        <meta name="dcterms.Title" content="{{ $title ?? get_platform_title() }}">
        <meta name="dcterms.Subject" content="{{ $keywords ?? config('seo.meta.keywords') }}">
        <meta name="dcterms.Description" content="{{ $description ?? config('seo.meta.description') }}">

    @endif

    <!-- Facebook OpenGraph -->
    <meta property="og:locale" content="{{ config('app.locale') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{  config('app.name') }}">

    @if(isset($item))

        <meta property="og:type" content="product">
        <meta property="og:title" content="{!! $item->title !!}">
        <meta property="og:description" content="{!! substr($item->description, 0, config('seo.meta.description_character_limit', 160)) !!}">
        <meta name="product:availability" content="{{ $item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock') }}">
        <meta name="product:price:currency" content="{{ get_system_currency() }}">
        <meta name="product:price:amount" content="{!! get_formated_currency($item->currnt_sale_price(), config('system_settings.decimals', 2)) !!}">
        <meta name="product:brand" content="{!! $item->product->manufacturer->name !!}">

        @php
            $item_images = $item->images->count() ? $item->images : $item->product->images;

            if(isset($variants)){
                // Remove images of current items from the variants imgs
                $other_images = $variants->pluck('images')->flatten(1)->filter(
                    function ($value, $key) use ($item) {
                        return $value->imageable_id != $item->id;
                    });
                $item_images = $item_images->concat($other_images);
            }
        @endphp

        @foreach($item_images as $img)
            @continue(!$img->path)

            <meta property="og:image" content="{{ get_storage_file_url($img->path, 'full') }}">
        @endforeach

    @else

        <meta property="og:title" content="{{ $title ?? get_platform_title() }}">
        <meta property="og:description" content="{{ $description ?? config('seo.meta.description') }}">
        <meta property="og:type" content="{{ $type ?? 'website' }}">
        <meta property="og:image" content="{{ $image ?? config('seo.meta.image') }}">

    @endif

    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    @if(config('seo.meta.video') !== '')
        <meta name="og:video" content="{{ $video ?? config('seo.meta.video') }}">
    @endif

    @if(config('seo.meta.fb_app_id') !== '')
        <meta property="fb:app_id" content="{{ config('seo.meta.fb_app_id') }}"/>
    @endif

    <!-- Twitter Card -->
    @if(isset($item))

        <meta name="twitter:card" content="product">
        <meta name="twitter:title" content="{!! $item->title !!}">
        <meta name="twitter:description" content="{!! substr($item->description, 0, config('seo.meta.description_character_limit', 160)) !!}">
        <meta name="twitter:image" content="{{ get_product_img_src($item, 'full') }}">
        <meta name="twitter:image:alt" content="{!! $item->title !!}">
        <meta name="twitter:label1" content="price">
        <meta name="twitter:data1" content="{!! get_formated_currency($item->currnt_sale_price(), config('system_settings.decimals', 2)) !!}">
        <meta name="twitter:label2" content="availability">
        <meta name="twitter:data2" content="{{ $item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock') }}">
        <meta name="twitter:label3" content="currency">
        <meta name="twitter:data3" content="{{ get_system_currency() }}">
        <meta name="twitter:label4" content="brand">
        <meta name="twitter:data4" content="{!! $item->product->manufacturer->name !!}">
        <meta name="twitter:label4" content="seller">
        <meta name="twitter:data4" content="{!! $item->shop->name !!}">

    @elseif(config('seo.meta.twitter_card') !== '')

        <meta name="twitter:card" content="{{ $twitter_card ?? config('seo.meta.twitter_card') }}">
        <meta name="twitter:image" content="{{ $image ?? config('seo.meta.image') }}">
        <meta name="twitter:title" content="{{ $title ?? get_platform_title() }}">
        <meta name="twitter:description" content="{{ $description ?? config('seo.meta.description') }}">

    @endif

    @if(config('seo.meta.twitter_site') !== '' || !empty($twitter_site))
        <meta name="twitter:site" content="{{ $twitter_site ?? config('seo.meta.twitter_site') }}">
    @endif

    @if(isset($item))
        <!-- Microdata Product Page-->
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Product",
                "name": "{!! $item->title !!}",
                "description": "{!! substr($item->description, 0, config('seo.meta.description_character_limit', 160)) !!}",
                "image": "{!! get_product_img_src($item, 'full') !!}",
                "brand": {
                    "@type": "Brand",
                    "name": "{!! $item->product->manufacturer->name !!}"
                },
                "sku" : "{{ $item->sku }}",
                @if($item->product->gtin_type && $item->product->gtin )
                    "{{ $item->product->gtin_type }}": "{{ $item->product->gtin }}",
                @endif
                "offers": {
                    "@type": "Offer",
                    "url": "{{ url()->current() }}",
                    "availability": "http://schema.org/InStock",
                    "priceCurrency": "{{ get_system_currency() }}",
                    "price": "{!! get_formated_decimal($item->currnt_sale_price(), true, config('system_settings.decimals', 2)) !!}"
                @if($item->feedbacks_count > 0)
                },
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "{{ get_formated_decimal($item->feedbacks->avg('rating'), true , 1) }}",
                    "bestRating": "5",
                    "worstRating": "1",
                    "reviewCount": "{{ $item->feedbacks_count }}"
                }
                @endif
            }
        </script>
    @endif

