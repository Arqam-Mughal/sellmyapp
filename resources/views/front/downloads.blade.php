{{-- @extends('layout.main') --}}
@extends('front.layout.main')


@section('content')

<div class="wrapper">
    <div class="container">

        <div class="row">
            <script type="text/javascript"
                src="{{ asset('pub-assets/wp-content/themes/sma-theme/js/category-filter.js@ver=1.2.38') }}"></script>
            <!-- ionRangeSlider -->
            <script type="text/javascript"
                src="{{ asset('pub-assets/wp-content/themes/sma-theme/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js') }}">
            </script>

            <link rel="stylesheet"
                href="{{ asset('pub-assets/wp-content/themes/sma-theme/ionRangeSlider/css/ion.rangeSlider.css') }}"
                type="text/css">
            <link rel="stylesheet"
                href="{{ asset('pub-assets/wp-content/themes/sma-theme/ionRangeSlider/css/normalize.css') }}"
                type="text/css">
            <link rel="stylesheet"
                href="{{ asset('pub-assets/wp-content/themes/sma-theme/ionRangeSlider/css/ion.rangeSlider.skinNice.css@ver=0.0.12.css') }}"
                type="text/css">
            <!-- end ionRangeSlider -->
            <link rel="stylesheet"
                href="{{ asset('pub-assets/wp-content/themes/sma-theme/css/category-search.css@ver=0.0.5.css') }}"
                type="text/css">



            <div class="breadcrumbs">
                <a href="{{ route('front.home') }}">Buy apps</a>
                <i class="ic ic-caret-right"></i> Apps
            </div>
            <div class="col-sm-5 col-md-4">
                <div class="sidebar-wrapper" id="filter-sidebar">
                    {{-- <div class="search-field-wrapper">
                        <input type="text" id="sidebar-search-query" value="8 ball" />
                        <a class="ic ic-search" id="sidebar-search-button" href="#"></a>
                    </div> --}}

                    {{-- <div class="slider-wrapper" id="filter-items-container" style="/*display: none;*/">
                        <label for="category-dropdown">Currently shopping by:</label>
                        <div class="filter-items">
                            <div id="search-filter-item" class="filter-item" style="/*display: none;*/">
                                <span id="search-filter-info">Search: 8 ball</span>
                                <a href="javascript: hideFilterItem('search');"
                                    class="ic ic-close filter-close-btn"></a>
                            </div>
                            <div id="platform-filter-item" class="filter-item" style="display: none;">
                                <span id="platform-filter-info">Platform: All</span>
                                <a href="javascript: hideFilterItem('platform');"
                                    class="ic ic-close filter-close-btn"></a>
                            </div>
                            <div id="template-filter-item" class="filter-item" style="display: none;">
                                <span id="template-filter-info">Template: </span>
                                <a href="javascript: hideFilterItem('template');"
                                    class="ic ic-close filter-close-btn"></a>
                            </div>
                            <div id="subcategory-filter-item" class="filter-item" style="display: none;">
                                <span id="subcategory-filter-info">Subcategory: All</span>
                                <a href="javascript: hideFilterItem('subcategory');"
                                    class="ic ic-close filter-close-btn"></a>
                            </div>
                            <div id="price-filter-item" class="filter-item" style="display: none;">
                                <span id="price-filter-info">Price: from $0 to $1000</span>
                                <a href="javascript: hideFilterItem('price');" class="ic ic-close filter-close-btn"></a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="sort-wrapper">
                        <div class="sort-header">Sort by</div>
                        <div class="sort-container">
                            <div class="left-section">
                                {{-- <button class="active" onclick="javascript: setSortBy('newest-releases');">Newest
                                    Releases</button> --}}

                                <button type="button"
                                    class="sort newest {{ empty($sort) || $sort == 'newest' ? 'active' : '' }}"
                                    id="newest" data-values="newest"> Newest Releases</button>
                            </div>

                            <div class="right-section">
                                {{-- <button onclick="javascript: setSortBy('most-popular');">Most Popular</button> --}}
                                <button type="button" class="sort {{ ($sort == 'popular')? 'active' : '' }}"
                                    id="popular" data-values="popular"> Most Popular</button>

                            </div>
                        </div>
                    </div>

                    <div class="menulist-wrapper">
                        <label>Select platform</label>
                        <div class="category-menulist" id="platform-filter">
                            @if($platforms->isNotEmpty())
                            @foreach ($platforms as $platform)

                            @if(!empty($platformSelected))
                            {{-- @foreach ($platformSelected as $platSelected) --}}

                            @php
                            $selected = App\Models\Platform::select('slug')->where('id', $platformSelected->id)->get();
                            @endphp

                            <span class="menulist-item platform-item-116">
                                <a href="{{ route('front.all-products.category', $platform->slug) }}"
                                    class="menulist-url {{ ($platformSelected->id == $platform->id) ? 'my-text-active' : '' }}">{{
                                    $platform->name }}</a>
                            </span>

                            {{-- @endforeach --}}
                            @else
                            <span class="menulist-item platform-item-116">
                                <a href="{{ route('front.all-products.category', $platform->slug) }}"
                                    class="menulist-url">{{ $platform->name }}</a>
                            </span>
                            @endif

                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="slider-wrapper">
                        <label>Price</label>
                        <div class="price-slider-container">
            <div>

                <input type="text" id="Slider1" name="example_name" value="" />

            </div>
            <div id="price-inputs">
                <div class="price-input-wrapper">
                    <label>from $</label><input class="price-input" type="text" id="price_min" value="{{ $priceMin }}">
                </div>
                <div class="price-input-wrapper">
                    <label>to $</label><input class="price-input" type="text" id="price_max" value="{{ $priceMax }}">
                </div>
                <div class="btn-container">
                    <button id="price-filter-btn">Filter</button>
                </div>
            </div>
        </div>
                    </div>

                    <div class="menulist-wrapper">
                        <label>Template type</label>
                        <div class="category-menulist" id="template-filter">

                            @if($tempTypes->isNotEmpty())
                            @foreach ($tempTypes as $tempType)

                            @if(!empty($platformSelected))
                            {{-- @foreach ($platformSelected as $platSelected) --}}

                            @php
                            $selected = App\Models\Platform::select('slug')->where('id', $platformSelected->id)->get();
                            // dd( $selected);
                            @endphp
                            @foreach ($selected as $slug)

                            @if(!empty($temptypeSelected))
                            {{-- @foreach ($temptypeSelected as $tempSelected) --}}
                            {{-- @php
                            dd($tempSelected);
                            @endphp --}}
                            <span class="menulist-item template-item-119 ">
                                <a href="{{ route('front.all-products.subcategory', [$slug->slug, $tempType->slug]) }}"
                                    class="menulist-url {{ ($temptypeSelected->id == $tempType->id) ? 'my-text-active' : '' }}">
                                    {{ $tempType->name }} </a>
                            </span>

                            {{-- @endforeach --}}
                            @else

                            <span class="menulist-item template-item-119 ">
                                <a href="{{ route('front.all-products.subcategory', [$slug->slug, $tempType->slug]) }}"
                                    class="menulist-url">
                                    {{ $tempType->name }} </a>
                            </span>

                            @endif

                            @endforeach

                            {{-- @endforeach --}}
                            @elseif (!empty($temptypeSelected))

                            {{-- @php
                            dd($temptypeSelected);
                            @endphp --}}

                            <span class="menulist-item template-item-119 ">
                                <a href="{{ route('front.all-products.subcategory.default',  $tempType->slug) }}"
                                    class="menulist-url {{ ($temptypeSelected->id == $tempType->id) ? 'my-text-active' : '' }}">
                                    {{ $tempType->name }} </a>
                            </span>

                            @else

                            <span class="menulist-item template-item-119 ">
                                <a href="{{ route('front.all-products.subcategory.default',  $tempType->slug) }}"
                                    class="menulist-url">
                                    {{ $tempType->name }} </a>
                            </span>

                            @endif

                            @endforeach
                            @endif
                        </div>
                    </div>

                    <ul class="sidebar" id="categories-sidebar">
                        <label>Subcategories</label>
                        <li class="widget">
                            <ul class="edd-taxonomy-widget">
                                <li class="cat-item cat-item-123"><a
                                        href="https://www.sellmyapp.com/downloads/subcategory/utilities/">Apps</a>
                                    <ul class='children'>

                                        @if($tempTypesRelatedTo->isNotEmpty())
                                        @foreach ($tempTypesRelatedTo as $tempTypeRelatedTo)

                                        @if(!empty($platformSelected))
                                        @php

                                            $platSlug = App\Models\Platform::select('slug')->where('id', $platformSelected->id)->first();

                                            // dd($platSlug);
                                        @endphp
                                        @endif

                                        @if(!empty($temptypeSelected))

                                        @php

                                            $tempSlug = App\Models\TempType::select('slug')->where('id', $temptypeSelected->id)->first();
                                            // dd($tempSlug);
                                        @endphp
                                        @endif

                                       @if(!empty($platformSelected) && empty($temptypeSelected))

                                    @if(!empty($temptypeRelatedToSelected))

                                        <span class="menulist-item template-item-119">
                                            {{-- @dd($temptypeRelatedToSelected) --}}
                                            <a href="{{ route('front.all-products.subcategory.subcategory',  [$platSlug->slug, $tempTypeRelatedTo->slug]) }}"
                                                class="menulist-url {{ ($temptypeRelatedToSelected->id == $tempTypeRelatedTo->id) ? 'my-text-active' : '' }}">
                                                {{ $tempTypeRelatedTo->name }}
                                            </a>

                                        </span>
                                    @else
                                    <span class="menulist-item template-item-119">

                                        <a href="{{ route('front.all-products.subcategory.subcategory',  [$platSlug->slug, $tempTypeRelatedTo->slug]) }}"
                                            class="menulist-url">
                                            {{ $tempTypeRelatedTo->name }}
                                        </a>

                                    </span>
                                    @endif

                                    @elseif(!empty($temptypeSelected) && empty($platformSelected))

                                    @if(!empty($temptypeRelatedToSelected))

                                        <span class="menulist-item template-item-119">

                                            <a href="{{ route('front.all-products.subcategory.subcategory',  [$tempSlug->slug, $tempTypeRelatedTo->slug]) }}"
                                                class="menulist-url {{ ($temptypeRelatedToSelected->id == $tempTypeRelatedTo->id) ? 'my-text-active' : '' }}">
                                                {{ $tempTypeRelatedTo->name }}
                                            </a>

                                        </span>
                                @else
                                <span class="menulist-item template-item-119">

                                    <a href="{{ route('front.all-products.subcategory.subcategory',  [$tempSlug->slug, $tempTypeRelatedTo->slug]) }}"
                                        class="menulist-url">
                                        {{ $tempTypeRelatedTo->name }}
                                    </a>

                                </span>

                                @endif


                                    @elseif(!empty($temptypeSelected) && !empty($platformSelected))

                                    @if(!empty($temptypeRelatedToSelected))

                                    <span class="menulist-item template-item-119">

                                        <a href="{{ route('front.all-products.subcategory.subcategory',  [$platSlug->slug, $tempSlug->slug, $tempTypeRelatedTo->slug]) }}"
                                            class="menulist-url {{ ($temptypeRelatedToSelected->id == $tempTypeRelatedTo->id) ? 'my-text-active' : '' }}">
                                            {{ $tempTypeRelatedTo->name }}
                                        </a>

                                    </span>

                                       @else

                                        <span class="menulist-item template-item-119">

                                            <a href="{{ route('front.all-products.subcategory.subcategory',  [$platSlug->slug, $tempSlug->slug, $tempTypeRelatedTo->slug]) }}"
                                                class="menulist-url">
                                                {{ $tempTypeRelatedTo->name }}
                                            </a>

                                        </span>
                                        @endif

                                    @else

                                    @if(!empty($temptypeRelatedToSelected))

                                    <span class="menulist-item template-item-119">

                                        <a href="{{ route('front.all-products.subcategory.subcategory.default',  [$tempTypeRelatedTo->slug]) }}"
                                            class="menulist-url {{ ($temptypeRelatedToSelected->id == $tempTypeRelatedTo->id) ? 'my-text-active' : '' }}">
                                            {{ $tempTypeRelatedTo->name }}
                                        </a>

                                    </span>
                                    @else

                                    <span class="menulist-item template-item-119">

                                        <a href="{{ route('front.all-products.subcategory.subcategory.default',  [$tempTypeRelatedTo->slug]) }}"
                                            class="menulist-url">
                                            {{ $tempTypeRelatedTo->name }}
                                        </a>

                                    </span>

                                    @endif

                                    @endif

                                        @endforeach

                                        @else
                                        <span class="menulist-item template-item-119">
                                            <a>No Subcategory!</a>
                                        </span>
                                        @endif


                                    </ul>
                                </li>
                            </ul>

                </div>
            </div>


            <div class="col-sm-15 col-md-16 products-list-container" id="products-list-container">
                {{-- <div class="col-sm-20">
                    <h1 class="underlined-title page-title">
                        8 ball source codes for sale </h1>
                </div> --}}

                @if(!empty($products))
                @foreach ($products as $item)

                @php
                $productImage = $item->product_images->first();
                // dd($productImage);
                @endphp

                <div class="product-box-column">
                    <article class="list-product">
                        <a href="{{ route('front.product.details', $item->slug) }}">
                            <div class="price-tag">
                                &#36;{{ $item->price }} </div>
                            <div class="img-contain">
                                @if(!empty($productImage))

                                <img width="200" height="140"
                                    src="{{ asset('uploads/product/large/'. $productImage->image) }}"
                                    class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset=""
                                    sizes="(max-width: 200px) 100vw, 200px" />
                                @else

                                <img width="200" height="140"
                                    src="{{ asset('/default-150x150.png') }}"
                                    class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset=""
                                    sizes="(max-width: 200px) 100vw, 200px" />

                                @endif
                            </div>

                        </a>

                        <div class="product-label">

                            <div class="product-categories">
                                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                                    <span class="ic ic-colored ic-unity cat-icon"></span>
                                    {{ $item->platformName }}</a>
                            </div>
                            <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;
                            </div>
                        </div>
                    </article>
                </div>

                @endforeach
            </div>

        </div>

        {{ $products->withQueryString()->links('vendor.pagination.custom') }}

    </div>
    @endif
</div>

@endsection

@section('customJs')

<script>
    $(document).ready(function() {
        // $('.filterProduct').click(function(){
        //     var data = $(this).data("values");
        //     // alert(data);

        //     $.ajax({
        //         url: '{{ route("front.all-products") }}',
        //         type: 'get',
        //         data: {filterProduct : data},
        //         dataType: 'json',
        //         success: function(res){



        //         }, error: function(){
        //             console.log('something went wrong!')
        //         }
        //     });
        // });

        $(".sort").on('click', function(){
        var data = $(this).data('values');
        localStorage.setItem('storedData', JSON.stringify(data));

        apply_filters();

        });


    // $("#Slider1").ionRangeSlider();
    $("#Slider1").ionRangeSlider({
    min: 0,
    max: 1000,
    from: {{ $priceMin }},
    to: {{ $priceMax }},
    type: 'double',
    prefix: "$",
    // skin: 'round',
    grid: false,
    grid_num: 0,
    hide_min_max: true,
    hide_from_to: true,
    onChange: function (data) {
        $('#price_min').val(data.from);
        $('#price_max').val(data.to);
    }
    // ,onFinish: function (data) {
    //         apply_filters();
    // }
});

$('#price_min, #price_max').on('change', function() {
    var slider = $("#Slider1").data("ionRangeSlider");
    slider.update({
        from: $('#price_min').val(),
        to: $('#price_max').val()
    });
});

var slider = $("#Slider1").data("ionRangeSlider");

$('#price-filter-btn').click(function(){
    apply_filters();
});

function apply_filters(){
    var storedData = localStorage.getItem('storedData');


var url = '{{ url()->current() }}?';
// alert(storedData);
if(storedData){
        var data = JSON.parse(storedData);
        url += "&sort=" + encodeURIComponent(data);
    }

// Price Range Filter

if (slider.result.from > 0 || slider.result.to < 1000) {
        url += "&price_min=" + slider.result.from + "&price_max=" + slider.result.to;
    }

// alert(url);
window.location.href = url;
}

  });


</script>
@endsection

@section('title', 'Downloads')
