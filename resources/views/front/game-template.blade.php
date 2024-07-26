{{-- @extends('layout.main') --}}
@extends('front.layout.main')


@section('content')

<div class="wrapper"><div class="container">

  <div class="row">
      <script type="text/javascript" src="https://www.sellmyapp.com/wp-content/themes/sma-theme/js/category-filter.js?ver=1.2.38"></script>
<!-- ionRangeSlider -->
<script type="text/javascript" src="https://www.sellmyapp.com/wp-content/themes/sma-theme/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>

<link rel="stylesheet" href="https://www.sellmyapp.com/wp-content/themes/sma-theme/ionRangeSlider/css/ion.rangeSlider.css" type="text/css">
<link rel="stylesheet" href="https://www.sellmyapp.com/wp-content/themes/sma-theme/ionRangeSlider/css/normalize.css" type="text/css">
<link rel="stylesheet" href="https://www.sellmyapp.com/wp-content/themes/sma-theme/ionRangeSlider/css/ion.rangeSlider.skinNice.css?ver=0.0.12" type="text/css">
<!-- end ionRangeSlider -->
<link rel="stylesheet" href="https://www.sellmyapp.com/wp-content/themes/sma-theme/css/category-search.css?ver=0.0.5" type="text/css">



          <div class="breadcrumbs">
          <a href="https://www.sellmyapp.com">Buy apps</a> <i class="ic ic-caret-right"></i> 8 ball        </div>
              <div class="col-sm-5 col-md-4">
          <div class="sidebar-wrapper" id="filter-sidebar">
              <div class="search-field-wrapper">
                  <input type="text" id="sidebar-search-query"
                         value="8 ball"/>
                  <a class="ic ic-search" id="sidebar-search-button" href="#"></a>
              </div>
                              <div class="slider-wrapper" id="filter-items-container" style="/*display: none;*/">
                  <label for="category-dropdown">Currently shopping by:</label>
                  <div class="filter-items">
                                              <div id="search-filter-item" class="filter-item" style="/*display: none;*/">
                          <span id="search-filter-info">Search: 8 ball</span>
                          <a href="javascript: hideFilterItem('search');" class="ic ic-close filter-close-btn"></a>
                      </div>
                      <div id="platform-filter-item" class="filter-item" style="display: none;">
                          <span id="platform-filter-info">Platform: All</span>
                          <a href="javascript: hideFilterItem('platform');" class="ic ic-close filter-close-btn"></a>
                      </div>
                      <div id="template-filter-item" class="filter-item" style="display: none;">
                          <span id="template-filter-info">Template: </span>
                          <a href="javascript: hideFilterItem('template');" class="ic ic-close filter-close-btn"></a>
                      </div>
                      <div id="subcategory-filter-item" class="filter-item" style="display: none;">
                          <span id="subcategory-filter-info">Subcategory: All</span>
                          <a href="javascript: hideFilterItem('subcategory');" class="ic ic-close filter-close-btn"></a>
                      </div>
                      <div id="price-filter-item" class="filter-item" style="display: none;">
                          <span id="price-filter-info">Price: from $0 to $1000</span>
                          <a href="javascript: hideFilterItem('price');" class="ic ic-close filter-close-btn"></a>
                      </div>
                  </div>
              </div>
              <div class="sort-wrapper">
                  <div class="sort-header">Sort by</div>
                  <div class="sort-container">
                      <div class="left-section">
                          <button class="active" onclick="javascript: setSortBy('newest-releases');">Newest Releases</button>
                      </div>
                      <div class="right-section">
                          <button onclick="javascript: setSortBy('most-popular');">Most Popular</button>
                      </div>
                  </div>
              </div>

              <div class="menulist-wrapper">
                  <label>Select platform</label>
                  <div class="category-menulist" id="platform-filter">
                                                  <span class="menulist-item platform-item-116">
                                  <a href="javascript: filterByPlatform({id: 116, label: 'Android'});" class="menulist-url">
                                      Android                                    </a>
                              </span>
                                                      <span class="menulist-item platform-item-115">
                                  <a href="javascript: filterByPlatform({id: 115, label: 'iOS'});" class="menulist-url">
                                      iOS                                    </a>
                              </span>
                                                      <span class="menulist-item platform-item-149">
                                  <a href="javascript: filterByPlatform({id: 149, label: 'Unity'});" class="menulist-url">
                                      Unity                                    </a>
                              </span>
                                              </div>
              </div>

              <div class="slider-wrapper">
                  <label>Price</label>
                  <div class="price-slider-container">
                      <div>
                          <input id="Slider1" type="text" name="price" />
                      </div>
                      <div id="price-inputs">
                          <div class="price-input-wrapper">
                              <label>from $</label><input class="price-input" type="text" id="price_min" value="0" />
                          </div>
                          <div class="price-input-wrapper">
                              <label>to $</label><input class="price-input" type="text" id="price_max" value="1000" />
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
                                                  <span class="menulist-item template-item-119 ">
                                  <a href="javascript: filterByTemplate({id: 119, label: 'Games'});" class="menulist-url">
                                      Games                                    </a>
                              </span>
                                                      <span class="menulist-item template-item-123 ">
                                  <a href="javascript: filterByTemplate({id: 123, label: 'Apps'});" class="menulist-url">
                                      Apps                                    </a>
                              </span>
                                              </div>
              </div>

              <ul class="sidebar" id="categories-sidebar">
                  <label>Subcategories</label>
                  <li class="widget"><ul class="edd-taxonomy-widget">
<li class="cat-item cat-item-123"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/">Apps</a>
<ul class='children'>
<li class="cat-item cat-item-177"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/books/">Books</a>
</li>
<li class="cat-item cat-item-188"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/business/">Business</a>
</li>
<li class="cat-item cat-item-175"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/chat/">Chat</a>
</li>
<li class="cat-item cat-item-178"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/dating/">Dating</a>
</li>
<li class="cat-item cat-item-179"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/health-fitness/">Health &amp; Fitness</a>
</li>
<li class="cat-item cat-item-182"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/location-based/">Location Based</a>
</li>
<li class="cat-item cat-item-180"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/music/">Music</a>
</li>
<li class="cat-item cat-item-183"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/news-magazine/">News &amp; Magazine</a>
</li>
<li class="cat-item cat-item-135"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/photography/">Photography</a>
</li>
<li class="cat-item cat-item-184"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/pos/">Point of Sale</a>
</li>
<li class="cat-item cat-item-185"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/shopping/">Shopping</a>
</li>
<li class="cat-item cat-item-176"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/social-networking/">Social Networking</a>
</li>
<li class="cat-item cat-item-186"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/sports-utilities/">Sports</a>
</li>
<li class="cat-item cat-item-189"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/utilities-utilities/">Utilities</a>
</li>
<li class="cat-item cat-item-187"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/video/">Video</a>
</li>
<li class="cat-item cat-item-181"><a href="https://www.sellmyapp.com/downloads/subcategory/utilities/wallpaper/">Wallpaper</a>
</li>
</ul>
</li>
<li class="cat-item cat-item-119"><a href="https://www.sellmyapp.com/downloads/subcategory/games/">Games</a>
<ul class='children'>
<li class="cat-item cat-item-130"><a href="https://www.sellmyapp.com/downloads/subcategory/games/action/">Action</a>
</li>
<li class="cat-item cat-item-133"><a href="https://www.sellmyapp.com/downloads/subcategory/games/adventure/">Adventure</a>
</li>
<li class="cat-item cat-item-124"><a href="https://www.sellmyapp.com/downloads/subcategory/games/arcades/">Arcades</a>
</li>
<li class="cat-item cat-item-125"><a href="https://www.sellmyapp.com/downloads/subcategory/games/card/">Card</a>
</li>
<li class="cat-item cat-item-129"><a href="https://www.sellmyapp.com/downloads/subcategory/games/casual/">Casual</a>
</li>
<li class="cat-item cat-item-132"><a href="https://www.sellmyapp.com/downloads/subcategory/games/family/">Family</a>
</li>
<li class="cat-item cat-item-126"><a href="https://www.sellmyapp.com/downloads/subcategory/games/puzzle/">Puzzle</a>
</li>
<li class="cat-item cat-item-136"><a href="https://www.sellmyapp.com/downloads/subcategory/games/racing/">Racing</a>
</li>
<li class="cat-item cat-item-137"><a href="https://www.sellmyapp.com/downloads/subcategory/games/sports/">Sports</a>
</li>
<li class="cat-item cat-item-131"><a href="https://www.sellmyapp.com/downloads/subcategory/games/quiz/">Trivia &amp; Quiz</a>
</li>
</ul>
</li>
</ul>
</li>                </ul>

      </div>
  </div>


<script type="text/javascript">
  jQuery('document').ready(function(){
      try{
          jQuery("#Slider1").ionRangeSlider({
              min: 0,
              max: 1000,
              from: 0,
              to: 1000,
              type: 'double',
              prefix: "$",
              grid: false,
              grid_num: 0,
              hide_min_max: true,
              hide_from_to: true,
              onChange: function (data) {
                  jQuery('#price_min').val(data.from);
                  jQuery('#price_max').val(data.to);
              }
          });
      }catch(e){alert(e.description);}

      jQuery('#price-filter-btn').on('click', function(evt){
          evt.preventDefault();
          categoryFilter.params.price_min = parseInt( jQuery('#price_min').val() );
          categoryFilter.params.price_max = parseInt( jQuery('#price_max').val() );
          categoryFilter.params.page = 1;
          categoryFilter.params.search = jQuery('#sidebar-search-query').val();
          categoryFilter.getHTML();
          jQuery('#filter-items-container').show();
          var append = 0;
          if(jQuery('#price-filter-item:hidden').length){
              var append = 1;
          }
          jQuery('#price-filter-item').show();
          jQuery('#price-filter-info').html('Price: $' + categoryFilter.params.price_min + ' - $' + categoryFilter.params.price_max );
          categoryFilter.filtersCount += append;
      });
      categoryFilter.init();
      categoryFilter.params.search = jQuery('#sidebar-search-query').val();
      categoryFilter.filtersCount++;
  });


</script>
      <div class="col-sm-15 col-md-16 products-list-container" id="products-list-container">
                                  <div class="col-sm-20">
                      <h1 class="underlined-title page-title">
                          8 ball source codes for sale                        </h1>
                  </div>

                  {{-- @if($products->isNotEmpty())
                  @foreach ($products as $item) --}}
                  
                  <div class="product-box-column">
                    <article class="list-product"
                    >
                        <a href="https://www.sellmyapp.com/downloads/foosball-ai/">
                            <div class="price-tag">
                                &#36;69            </div>
                            <div class="img-contain">
                                <img width="200" height="140" src="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image667965928fa09.jpg" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image667965928fa09.jpg 200w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image667965928fa09-40x28.jpg 40w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image667965928fa09-67x47.jpg 67w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image667965928fa09-37x26.jpg 37w" sizes="(max-width: 200px) 100vw, 200px" />            </div>
                  
                        </a>
                  
                        <div class="product-label">
                            <a class="hidden" href="https://www.sellmyapp.com/downloads/foosball-ai/">
                                <h3>Foosball Ai</h3>
                            </a>
                  
                            <div class="product-categories">
                                <a href="https://www.sellmyapp.com/downloads/category/unity/">
                                    <span class="ic ic-colored ic-unity cat-icon"></span>
                                    Unity</a>
                            </div>
                                    <div class="rating no-rating" style="font-size:15px;">&#9734;&#9734;&#9734;&#9734;&#9734;</div>
                                </div>
                    </article>
                  </div>
                </div>
{{--                 
                  @endforeach
                  @endif --}}

      </div>
      <div class="sma-pagination" id="pagination-container" data-base-link="https://www.sellmyapp.com/search/8+ball/">
          <span aria-current="page" class="page-numbers current">1</span>
<a class="page-numbers" href="https://www.sellmyapp.com/search/8+ball/page/2/">2</a>
<a class="page-numbers" href="https://www.sellmyapp.com/search/8+ball/page/3/">3</a>
<span class="page-numbers dots">&hellip;</span>
<a class="page-numbers" href="https://www.sellmyapp.com/search/8+ball/page/5/">5</a>
<a class="next page-numbers" href="https://www.sellmyapp.com/search/8+ball/page/2/">Next &raquo;</a>        </div>
  </div>
</div><!-- wrapper -->

@endsection