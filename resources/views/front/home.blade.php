@extends('front.layout.main')

@section('content')

<div class="wrapper">    <div class="home-banner">
    <div class="container">
        <h1>
            <img src="https://www.sellmyapp.com/wp-content/themes/sma-theme/images/laurel-left.svg" width="61" height="146"
                 alt="" class="laurel-left hidden-xs"/>
            Make an app easily<br/>
            with top quality<br/>
            app &amp; game templates
            <img src="https://www.sellmyapp.com/wp-content/themes/sma-theme/images/laurel-right.svg" width="61" height="146"
                 alt="" class="laurel-right hidden-xs"/>
        </h1>
        <form role="search" method="get" class="search-form"
              action="https://www.sellmyapp.com/">
            <input class="search-input" type="text" value="" name="s" placeholder="Start searching..."/>
            <a class="search-submit" href="#" id="banner-search-submit"><span class="ic ic-search"></span></a>
        </form>
        <div class="subcategory-links">
            <a class="ios" href="https://www.sellmyapp.com/downloads/category/ios/">
                <span class="ic ic-ios"></span>
            </a>
            <a class="unity" href="https://www.sellmyapp.com/downloads/category/unity/">
                <span class="ic ic-unity"></span>
            </a>
            <a class="android" href="https://www.sellmyapp.com/downloads/category/android/">
                <span class="ic ic-android"></span>
            </a>
        </div>
    </div>
</div>
<div class="container">
<h2 class="featured-heading">Featured</h2>
<div class="five-products-row">

    @if($featuredProducts->isNotEmpty())
    @foreach ($featuredProducts as $item)

    @php
        $productImage = $item->product_images->first();
    @endphp

<div class="product-box-column">
    <article class="list-product"
    >
        <a href="{{ route('front.product.details', $item->slug) }}">
            <div class="price-tag">
                &#36;{{ $item->price }}     </div>

            <div class="img-contain">
                @if(!empty($productImage))

                <img width="200" height="140" src="{{ asset('/uploads/product/small/'. $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" sizes="(max-width: 200px) 100vw, 200px" />            </div>
                @else

                <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" sizes="(max-width: 200px) 100vw, 200px" />            </div>

                @endif

        </a>

        <div class="product-label">
            <div class="product-categories">
                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                    <span class="ic ic-colored ic-unity cat-icon"></span>
                    {{ $item->name }}</a>
            </div>
                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                </div>
    </article>
    </div>

    @endforeach
    @endif

  </div>
<div class="text-center">
    <a class="btn btn-default btn-lg" href="{{ route('front.all-products') }}">View all apps</a>
</div>

<div class="container">
    <h2 class="featured-heading">Flash sales & limited offers</h2>
    <div class="six-products-row">
        @if ($newestProducts->isNotEmpty())
        @foreach ($newestProducts as $item)

        @php
            $productImage = $item->product_images->first();
        @endphp

        <div class="product-box-column">
    <article class="list-product">

        <a href="{{ route('front.product.details', $item->slug) }}">
        <div class="price-tag">
                &#36;{{ $item->price }}</div>
                @if(!empty($productImage))

            <div class="img-contain">
                <img width="200" height="140" src="{{ asset('/uploads/product/small/' . $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @else
                <div class="img-contain">
                    <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>
                @endif

        </a>

        <div class="product-label">
            {{-- <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
                <h3>Foosball Ai</h3>
            </a> --}}

            <div class="product-categories">
                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                    <span class="ic ic-colored ic-unity cat-icon"></span>
                    {{ $item->name }}</a>
            </div>
                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                </div>
    </article>
    </div>

    @endforeach
    @endif

</div>
    <div class="text-center">
        <a class="btn btn-default btn-lg" href="https://www.sellmyapp.com/limited-offer/">View all offers</a>
    </div>

    <h2 class="featured-heading">Top trending templates</h2>
    <div class="six-products-row">
        @if ($newestProducts->isNotEmpty())
        @foreach ($newestProducts as $item)

        @php
            $productImage = $item->product_images->first();
        @endphp

        <div class="product-box-column">
    <article class="list-product">

        <a href="{{ route('front.product.details', $item->slug) }}">
        <div class="price-tag">
                &#36;{{ $item->price }}</div>
            <div class="img-contain">
                @if(!empty($productImage))

                <img width="200" height="140" src="{{ asset('/uploads/product/small/' . $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @else
                <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @endif

        </a>

        <div class="product-label">
            {{-- <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
                <h3>Foosball Ai</h3>
            </a> --}}

            <div class="product-categories">
                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                    <span class="ic ic-colored ic-unity cat-icon"></span>
                    {{ $item->name }}</a>
            </div>
                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                </div>
    </article>
    </div>

    @endforeach
    @endif

</div>

    <h2 class="featured-heading">Most popular this month</h2>
    <div class="five-products-row">
        @if ($newestProducts->isNotEmpty())
        @foreach ($newestProducts as $item)

        @php
            $productImage = $item->product_images->first();
        @endphp

        <div class="product-box-column">
    <article class="list-product">

        <a href="{{ route('front.product.details', $item->slug) }}">
        <div class="price-tag">
                &#36;{{ $item->price }}</div>
            <div class="img-contain">
                @if(!empty($productImage))

                <img width="200" height="140" src="{{ asset('/uploads/product/small/' . $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @else
                <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @endif

        </a>

        <div class="product-label">
            {{-- <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
                <h3>Foosball Ai</h3>
            </a> --}}

            <div class="product-categories">
                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                    <span class="ic ic-colored ic-unity cat-icon"></span>
                    {{ $item->name }}</a>
            </div>
                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                </div>
    </article>
    </div>

    @endforeach
    @endif

</div>

    <h2 class="featured-heading">Most popular this year</h2>
    <div class="five-products-row">
        @if ($newestProducts->isNotEmpty())
        @foreach ($newestProducts as $item)

        @php
            $productImage = $item->product_images->first();
        @endphp

        <div class="product-box-column">
    <article class="list-product">

        <a href="{{ route('front.product.details', $item->slug) }}">
        <div class="price-tag">
                &#36;{{ $item->price }}</div>
            <div class="img-contain">

                @if(!empty($productImage))

                <img width="200" height="140" src="{{ asset('/uploads/product/small/' . $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @else
                <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @endif

        </a>

        <div class="product-label">
            {{-- <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
                <h3>Foosball Ai</h3>
            </a> --}}

            <div class="product-categories">
                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                    <span class="ic ic-colored ic-unity cat-icon"></span>
                    {{ $item->name }}</a>
            </div>
                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                </div>
    </article>
    </div>

    @endforeach
    @endif

</div>

    <h2 class="featured-heading">Most popular of all times</h2>
    <div class="six-products-row">
        @if ($newestProducts->isNotEmpty())
        @foreach ($newestProducts as $item)

        @php
            $productImage = $item->product_images->first();
        @endphp

        <div class="product-box-column">
    <article class="list-product">

        <a href="{{ route('front.product.details', $item->slug) }}">
        <div class="price-tag">
                &#36;{{ $item->price }}</div>
            <div class="img-contain">
                @if(!empty($productImage))

                <img width="200" height="140" src="{{ asset('/uploads/product/small/' . $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

                @else
                <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>
                @endif

        </a>

        <div class="product-label">
            {{-- <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
                <h3>Foosball Ai</h3>
            </a> --}}

            <div class="product-categories">
                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                    <span class="ic ic-colored ic-unity cat-icon"></span>
                    {{ $item->name }}</a>
            </div>
                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                </div>
    </article>
    </div>

    @endforeach
    @endif

</div>

<div class="text-center">
    <a class="btn btn-default btn-lg" href="https://www.sellmyapp.com/downloads/most-popular/">View all popular</a>
</div>

<h2 class="featured-heading">Newest</h2>
<div class="six-products-row">

    @if ($newestProducts->isNotEmpty())
    @foreach ($newestProducts as $item)

    @php
        $productImage = $item->product_images->first();
    @endphp

    <div class="product-box-column">
<article class="list-product">

    <a href="{{ route('front.product.details', $item->slug) }}">
        <div class="price-tag">
            &#36;{{ $item->price }}</div>
        <div class="img-contain">
            @if(!empty($productImage))

            <img width="200" height="140" src="{{ asset('/uploads/product/small/' . $productImage->image) }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

            @else
            <img width="200" height="140" src="{{ asset('/default-150x150.png') }}" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="" sizes="(max-width: 200px) 100vw, 200px" /></div>

            @endif

    </a>

    <div class="product-label">
        {{-- <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
            <h3>Foosball Ai</h3>
        </a> --}}

        <div class="product-categories">
            <a href="https://www.sellmyapp.com/downloads/category/unity/">
                <span class="ic ic-colored ic-unity cat-icon"></span>
                {{ $item->name }}</a>
        </div>
                <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
            </div>
</article>
</div>

@endforeach
@endif

</div>
<div class="text-center">
    <a class="btn btn-default btn-lg" href="https://www.sellmyapp.com/downloads/newest/">View all newest</a>
</div>
</div>
<div class="container" style="margin-top: 30px">
</div>
</div><!-- wrapper -->
@endsection
