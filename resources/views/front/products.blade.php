@extends('front.layout.main')

@section('content')

<div class="wrapper">
    @if($product->isNotEmpty())
    @foreach ($product as $item)


    <div class="container">
        <div class="breadcrumbs">
            <a href="https://www.sellmyapp.com">Buy apps</a> <i class="ic ic-caret-right"></i> <a
                href="https://www.sellmyapp.com/downloads/category/unity/">{{ $item->platformName }} source codes</a> <i
                class="ic ic-caret-right"></i> <a href="https://www.sellmyapp.com/downloads/subcategory/games/">{{
                $item->tempTypeName }} templates</a> <i class="ic ic-caret-right"></i> <a
                href="https://www.sellmyapp.com/downloads/subcategory/games/puzzle/">{{ $item->tempTypeRelatedToName
                }}</a> <i class="ic ic-caret-right"></i> {{ $item->title }}
        </div>
        <h1 class="product-title">{{ $item->title }}</h1>
        <div class="product-page-row">
            <div class="product-main-column" style="">
                <div class="product-banner">
                    @php
                    $productImage = $item->product_images->first();
                    @endphp

                    @if(!empty($productImage))
                    <picture>
                        <source sizes="(max-width: 320px) 100vw,
                      (min-width: 321px;max-width: 480px) 100vw,
                      (min-width: 481px;max-width: 649px) 100vw,
                      (min-width: 650px) 650px" srcset="" type="image/webp">

                        <source sizes="(max-width: 320px) 100vw,
                      (min-width: 321px;max-width: 480px) 100vw,
                      (min-width: 481px;max-width: 649px) 100vw,
                      (min-width: 650px) 650px" srcset="" type="image/jpg">

                        <img srcset="{{ asset('/uploads/product/large/'. $productImage->image) }}"
                            style="width:100%;background-color: #8f9a9e" alt="Featured image">
                    </picture>
                    @else

                    <picture>
                        <source sizes="(max-width: 320px) 100vw,
                      (min-width: 321px;max-width: 480px) 100vw,
                      (min-width: 481px;max-width: 649px) 100vw,
                      (min-width: 650px) 650px" srcset="" type="image/webp">

                        <source sizes="(max-width: 320px) 100vw,
                      (min-width: 321px;max-width: 480px) 100vw,
                      (min-width: 481px;max-width: 649px) 100vw,
                      (min-width: 650px) 650px" srcset="" type="image/jpg">

                        <img srcset="{{ asset('/default-150x150.png') }}"
                            style="width:100%;background-color: #8f9a9e" alt="Featured image">
                    </picture>
                    @endif

                </div>

                <div class="screenshots">
                    <div class="screenshot-gallery-wrapper">
                        <div class="screenshot-gallery" id="screenshot-gallery">
                            <ul>
                                <li data-src="//www.youtube.com/embed/9E8GkpSkhnQ?rel=0" class="youtube-link"
                                    data-iframe="true" style="color:red;background-color:white" importance="low"> <span
                                        class="ic ic-youtube"></span> </li>
                                <script>
                                    var youtubeGalleryPath = 'https://img.youtube.com/vi/9E8GkpSkhnQ/mqdefault.jpg'; 
                                </script>
                                <li
                                    data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a86bcbcee.png">
                                    <picture>
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a86bcbcee-200x105.webp "
                                            type="image/webp">
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a86bcbcee-200x105.png"
                                            type="image/png"><img width="100" height="53"
                                            data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a86bcbcee-200x105.png"
                                            class="lazy-gallery" style="background-color: #8f9a9e">
                                    </picture>
                                </li>
                                <li
                                    data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a877326a2.png">
                                    <picture>
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a877326a2-200x105.webp "
                                            type="image/webp">
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a877326a2-200x105.png"
                                            type="image/png"><img width="100" height="53"
                                            data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a877326a2-200x105.png"
                                            class="lazy-gallery" style="background-color: #8f9a9e">
                                    </picture>
                                </li>
                                <li
                                    data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8810d6bb.png">
                                    <picture>
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8810d6bb-200x105.webp "
                                            type="image/webp">
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8810d6bb-200x105.png"
                                            type="image/png"><img width="100" height="53"
                                            data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8810d6bb-200x105.png"
                                            class="lazy-gallery" style="background-color: #8f9a9e">
                                    </picture>
                                </li>
                                <li
                                    data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a88ca7ffb.png">
                                    <picture>
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a88ca7ffb-200x105.webp "
                                            type="image/webp">
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a88ca7ffb-200x105.png"
                                            type="image/png"><img width="100" height="53"
                                            data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a88ca7ffb-200x105.png"
                                            class="lazy-gallery" style="background-color: #8f9a9e">
                                    </picture>
                                </li>
                                <li
                                    data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8984df6e.png">
                                    <picture>
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8984df6e-200x105.webp "
                                            type="image/webp">
                                        <source sizes="(max-width:479px) 100px,(min-width:480px) 200px"
                                            data-srcset="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8984df6e-200x105.png"
                                            type="image/png"><img width="100" height="53"
                                            data-src="https://static.sellmyapp.com/wp-content/uploads/screenshot58d8a8984df6e-200x105.png"
                                            class="lazy-gallery" style="background-color: #8f9a9e">
                                    </picture>
                                </li>
                            </ul>
                        </div>
                        <div class="controls">
                            <div class="prev-slide"><span class="ic ic-caret-left"></span></div>
                            <div class="next-slide"><span class="ic ic-caret-right"></span></div>
                        </div>
                    </div>
                </div>


                <div class="product-sidebar visible-xs">
                    <div class="price-options-block">
                        <div class="primary-options">
                            <div class="option-row">
                                <label>
                                    <div class="sma-radio">
                                        <input data-price="89" type="radio" name="product_primary_option_1" value="0"
                                            checked="checked" />

                                        <div class="sma-radio-display"></div>
                                    </div>
                                    <span class="option-name">Single app license</span>
                                </label>

                                <span class="ic ic-info info-popup-icon" data-remodal-target="option-0-description"
                                    onclick="loadSingleAppPopup('single_app_popup')"></span>

                                <div class="remodal info-popup" data-remodal-id="option-0-description">
                                    <div id="single-app-popup"></div>
                                </div>
                                <div class="option-price">
                                    <span>$</span><span>{{ $item->price }}</span>
                                </div>
                            </div>
                            <div class="option-row">
                                <label>
                                    <div class="sma-radio">
                                        <input data-price="259" type="radio" name="product_primary_option_1"
                                            value="1" />

                                        <div class="sma-radio-display"></div>
                                    </div>
                                    <span class="option-name">Multiple app license</span>
                                </label>
                                <span class="ic ic-info info-popup-icon" data-remodal-target="option-1-description"
                                    onclick="loadMultipleAppPopup()"></span>
                                <div class="remodal info-popup" data-remodal-id="option-1-description">
                                    <div id="multiple-license-content"></div>
                                </div>
                                <div class="option-price">&#36;259</div>
                            </div>
                        </div>
                        <div class="secondary-options">
                            <div class="option-row">
                                <label>
                                    <div class="sma-checkbox">
                                        <input data-price="1495" type="checkbox" name="product_secondary_option_1"
                                            value="2" id="product_secondary_option_2_1" />

                                        <div class="sma-checkbox-display"></div>
                                    </div>
                                    <span class="option-name">Reskin &amp; Launch service:</span>
                                </label>
                                <span class="ic ic-info info-popup-icon" data-remodal-target="option-2-description"
                                    onclick="loadReskinAppPopup()"></span>
                                <div class="remodal reskin-popup" data-remodal-id="option-2-description">
                                    <button data-remodal-action="close" class="remodal-close"></button>
                                    <div id="reskin-popup-content"></div>
                                </div>
                                <div class="option-price">
                                    + &#36;1495</div>
                            </div>
                            <label class="option-desc" for="product_secondary_option_2_1">
                                <ul>
                                    <li class="ql-rendered-bullet-list"
                                        data-block-id="block-b9e3936b-a695-4864-8f9f-5eef2cce49f7">
                                        <p>🖌️ <strong>Stunning Graphics</strong>: Immerse users with top-tier artwork
                                            that you can legally publish.</p>
                                    </li>
                                    <li class="ql-rendered-bullet-list"
                                        data-block-id="block-f7cf7cba-dce0-410e-a938-6c0a64eaff12">
                                        <p>📲 <strong>Engaging Icons &amp; Screenshots</strong>: Capture attention and
                                            entice clicks.</p>
                                    </li>
                                    <li class="ql-rendered-bullet-list"
                                        data-block-id="block-1bfc52e1-b5c2-436d-8d4c-02391ad98c21">
                                        <p>💸 <strong>Smart Ad Integration</strong>: Unlock revenue potential
                                            effortlessly.</p>
                                    </li>
                                    <li class="ql-rendered-bullet-list"
                                        data-block-id="block-d35aa460-50d2-4a1a-842b-50f9f9fadf53">
                                        <p>🐞 <strong>Friendly Bugs Guarantee</strong>: App functionality with a 3-month
                                            warranty.</p>
                                    </li>
                                    <li class="ql-rendered-bullet-list"
                                        data-block-id="block-21b17c66-ef21-4893-aa16-0500213e241a">
                                        <p>🏁 <strong>Swift Store Submission</strong>: We navigate Appstore/Google Play
                                            submission for you.</p>
                                    </li>
                                    <li class="ql-rendered-bullet-list"
                                        data-block-id="block-c987ac5d-b7b7-4609-8557-c8504bd83c48">
                                        <p>🧑‍💼 <strong>Expert Management</strong>: Your project championed by a
                                            dedicated manager.</p>
                                    </li>
                                </ul>
                            </label>
                        </div>
                        <div class="separator"></div>
                        <div class="block">
                            <div class="summary-row">
                                Summary:
                                <div class="price">$<span class="product-total">{{ $item->price }}</span>
                                </div>
                            </div>
                            <a class="btn btn-default btn-lg btn-add-to-cart add-to-cart" href="#" data-id="5986"
                                data-price="89">
                                Add to cart
                            </a>
                            <a class="custom-quote-link" href="#" data-remodal-target="custom-quote"
                                onclick="loadCustomQuotePopup()">
                                If you need a custom quotation, contact us
                            </a>
                            <div class="remodal custom-quote-popup" data-remodal-id="custom-quote">
                                <button data-remodal-action="close" class="remodal-close"></button>
                                <div id="custom-quote-popup-content"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#description" aria-controls="description" role="tab"
                                data-toggle="tab">Description</a>
                        </li>
                        <li role="presentation">
                            <a href="#reviews" id="reviews-link" aria-controls="reviews" role="tab"
                                data-toggle="tab">Reviews<span class="count-number">8</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#questions-answers" id="questions-answers-link" aria-controls="questions-answers"
                                role="tab" data-toggle="tab">Comments<span class="count-number">683</span></a>
                        </li>
                    </ul>
                    <a class="btn btn-wishlist hidden-xs" rel="nofollow"
                        href="https://www.sellmyapp.com/?add_product_to_wishlist=5986"><i class="ic ic-heart"></i> Add
                        to wishlist</a>
                </div>
                <div class="tab-content" style="display: block">
                    <div role="tabpanel" class="tab-pane active product-description" id="description">
                        <!DOCTYPE html
                            PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
                        <?xml encoding="utf-8" ?>
                        <html>

                        <body>
                            <h2 class="clearfix">Description <span class="store-links" style="display: none"> <a
                                        href="https://play.google.com/store/apps/details?id=com.best2dgamesstudio.jellygarden"
                                        rel="nofollow" target="_blank" class="google-play-button"></a> </span> </h2> <a
                                class="btn btn-wishlist visible-xs" rel="nofollow"
                                href="https://www.sellmyapp.com/?add_product_to_wishlist=5986"><i
                                    class="ic ic-heart"></i> Add to wishlist</a>
                            <div class="user-description">
                                {!! $item->description !!}
                            </div>
                            <h2>Features</h2>
                            <div class="user-description">
                                {!! $item->features !!}
                            </div>
                            <h2>Changes log</h2>
                            <div class="user-description">
                                <p>All informations about new updates you can read here: <a
                                        href="https://docs.google.com/document/d/19xjodL4dU-s5NPUs5NWCCdyNNvCRK3c_JlYsuJGpVtY/edit">Changes
                                        and update manual.</a></p>
                            </div>
                            <h2>Updates</h2>
                            <div class="user-description">
                               {!! $item->updates !!}
                            </div>
                            <div class="text-center"> <a href="#"
                                    class="btn btn-default btn-lg btn-view-options hidden-xs" id="view_options_button">
                                    View purchase options </a> </div>
                        </body>

                        </html>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="reviews">
                        <p>In order to ask a question you need to <a href="https://www.sellmyapp.com/login/">log in</a>
                            or <a href="https://www.sellmyapp.com/register/">register</a> as a user for free. </p>
                        <div id="review-content"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="questions-answers">
                        <p>In order to ask a question you need to <a href="https://www.sellmyapp.com/login/">log in</a>
                            or <a href="https://www.sellmyapp.com/register/">register</a> as a user for free. </p>
                        <input type="hidden" value="4603023793" id="questions-nonce" />
                        <div class="hidden"> <span>683</span> </div>
                        <div class="comment-section-loading">
                            <div id="questions-threads" class="questions-threads" data-page="1" data-maxpage="137">
                            </div>
                        </div>
                        <div class="comment-load-more" style="height: 30px;"> </div>
                        <div class="comment-show-more text-center" data-product="5986" data-page="2"
                            style="margin-bottom: 30px"> <a class="btn btn-default btn-lg" href="#">Show more</a> </div>
                    </div>
                </div>
            </div>
            <!-- product-main-column -->
            <div class="product-sidebar-column" style="">
                <div class="product-sidebar">
                    <div class="hidden-xs">
                        <div class="price-options-block">
                            {{-- <div class="primary-options">
                                <div class="option-row"> --}}
                                    {{-- <label>
                                        <div class="sma-radio">
                                            <input data-price="{{ $item->price }}" type="radio"
                                                name="product_primary_option_2" value="0" checked="checked" />

                                            <div class="sma-radio-display"></div>
                                        </div>
                                        <span class="option-name">Single app license</span>
                                    </label>

                                    <span class="ic ic-info info-popup-icon" data-remodal-target="option-0-description"
                                        onclick="loadSingleAppPopup('single_app_popup')"></span>

                                    <div class="option-price">
                                        <span>$</span><span>{{ $item->price }}</span>
                                    </div>
                                </div>
                                <div class="option-row">
                                    <label>
                                        <div class="sma-radio">
                                            <input data-price="259" type="radio" name="product_primary_option_2"
                                                value="1" />

                                            <div class="sma-radio-display"></div>
                                        </div>
                                        <span class="option-name">Multiple app license</span>
                                    </label>
                                    <span class="ic ic-info info-popup-icon" data-remodal-target="option-1-description"
                                        onclick="loadMultipleAppPopup()"></span>
                                    <div class="option-price">&#36;259</div> --}}
                                {{-- </div>
                            </div> --}}
                            <div class="secondary-options">
                                <div class="option-row">
                                    <label>
                                        <div class="sma-checkbox">
                                            <input data-price="0"
                                                   type="checkbox" name="product_secondary_option_1"
                                                   value="2"
                                                   id="product_secondary_option_2_1"/>
                    
                                            <div class="sma-checkbox-display"></div>
                                        </div>
                                        <span class="option-name">Request custom quote:</span>
                                    </label>

                                    <span class="ic ic-info info-popup-icon"
                                              data-remodal-target="option-2-description" onclick="loadReskinAppPopup()"></span>
                                    <div class="remodal reskin-popup"
                         data-remodal-id="option-2-description">
                        <button data-remodal-action="close" class="remodal-close"></button>
                        <div id="reskin-popup-content"></div>
                    </div>
                    </div>
                                <label class="option-desc"
                                    for="product_secondary_option_2_1">
                                    <ul><li>We will provide you a custom Reskin quote price for your project</li></li></ul>
                                </label>
                            </div>
                            <div class="separator"></div>
                            <div class="block">
                                <div class="summary-row">
                                    Summary:
                                    <div class="price">$<span class="product-total">{{ $item->price }}</span>
                                    </div>
                                </div>
                                <a class="btn btn-default btn-lg btn-add-to-cart add-to-cart" href="javascript:void(0);" onclick="addToCart({{ $item->id }})" data-id="5986"
                                    data-price="{{ $item->price }}">
                                    Add to cart
                                </a>
                                <a class="custom-quote-link" href="#" data-remodal-target="custom-quote"
                                    onclick="loadCustomQuotePopup()">
                                    If you need a custom quotation, contact us
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="block bordered money-back-block"> <img
                            data-src="{{ asset('pub-assets/wp-content/themes/sma-theme/images/100-percent-satisfaction.svg') }}"
                            width="58" height="62" alt="" style="background-color: #8f9a9e"
                            class="money-back-icon lazy-past" />
                        <div class="money-back-text"> <strong>14 days</strong> Money back guarantee <a href="#"
                                data-remodal-target="money-back-guarantee" onclick="loadPolicyPopup()"> policy </a>
                            <div class="remodal" data-remodal-id="money-back-guarantee"> <button
                                    data-remodal-action="close" class="remodal-close"></button>
                                <div id="policy-popup-content"></div>
                            </div>
                        </div>
                    </div>
                    <div class="block bordered">
                        <table class="product-info-table">
                            <tr>
                                <td>Category</td>
                                <td> {{ $item->tempTypeRelatedToName }} </td>
                            </tr>
                            <tr>
                                <td>Platforms</td>
                                @php
                                    $items = implode(',',json_decode($item->frameworks));
                                @endphp
                                <td>{{ $items }}</td>
                            </tr>
                            <tr>
                                <td>Frameworks</td>
                                <td><a href="https://www.sellmyapp.com/downloads/category/unity/">{{ $item->platformName }}</a></td>
                            </tr>
                        </table>
                    </div>

                    <div class="block bordered author-block">
                        <picture>
                            <source
                                data-srcset=""
                                type="image/webp">
                            <source
                                data-srcset="{{ asset('pub-assets/wp-content/uploads/avatar59ad7861635ee-140x140_90.png') }}"
                                type="image/png"><img width="90" height="90"
                                data-src="{{ asset('pub-assets/wp-content/uploads/avatar59ad7861635ee-140x140_90.png') }}"
                                class="avatar lazy-past" style="background-color: #8f9a9e" alt="sellmyapp-image">
                        </picture>
                        <div class="author-info">
                            <div class="author-name"> Candy Smith </div> <a class="portfolio-link"
                                href="https://www.sellmyapp.com/author/anyadroba/"> View portfolio</a> <a
                                class="follow-link btn btn-default" rel="nofollow"
                                href="https://www.sellmyapp.com/?add_author_to_follow_list=218">Follow this author</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-sidebar-column -->
        </div>
        <!-- product-page-row -->
    </div>
    <div id="similar_apps">
        <div class="container">
            <h2 class="underlined-title similar-apps-title">Similar Apps</h2>
            <div class="five-products-row similar-apps ">
                <div class="product-box-column"> <article class="list-product"> <a href="https://www.sellmyapp.com/downloads/seat-sort-puzzle-3d/"> <div class="price-tag"> $79 </div> <div class="img-contain"> <img width="200" height="140" src="https://static.sellmyapp.com/wp-content/uploads/thumbnail_image669a94b8c8c07.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669a94b8c8c07.png 200w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669a94b8c8c07-40x28.png 40w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669a94b8c8c07-67x47.png 67w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669a94b8c8c07-37x26.png 37w" sizes="(max-width: 200px) 100vw, 200px"> </div> </a> <div class="product-label"> <a class="hidden" href="https://www.sellmyapp.com/downloads/seat-sort-puzzle-3d/"> <h3>Seat Sort Puzzle 3D</h3> </a> <div class="product-categories"> <a href="https://www.sellmyapp.com/downloads/category/unity/"> <span class="ic ic-colored ic-unity cat-icon"></span> Unity</a> </div> <div class="rating no-rating" style="font-size:15px;">☆☆☆☆☆</div> </div> </article></div><div class="product-box-column"> <article class="list-product"> <a href="https://www.sellmyapp.com/downloads/marble-blast-legend-marble/"> <div class="price-tag"> $79 </div> <div class="img-contain"> <img width="200" height="140" src="https://static.sellmyapp.com/wp-content/uploads/thumbnail_image669b82539e736.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669b82539e736.png 200w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669b82539e736-40x28.png 40w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669b82539e736-67x47.png 67w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669b82539e736-37x26.png 37w" sizes="(max-width: 200px) 100vw, 200px"> </div> </a> <div class="product-label"> <a class="hidden" href="https://www.sellmyapp.com/downloads/marble-blast-legend-marble/"> <h3>Marble Blast : Legend marble</h3> </a> <div class="product-categories"> <a href="https://www.sellmyapp.com/downloads/category/unity/"> <span class="ic ic-colored ic-unity cat-icon"></span> Unity</a> </div> <div class="rating no-rating" style="font-size:15px;">☆☆☆☆☆</div> </div> </article></div><div class="product-box-column"> <article class="list-product"> <a href="https://www.sellmyapp.com/downloads/match-fruits/"> <div class="price-tag"> $139 </div> <div class="img-contain"> <img width="200" height="140" src="https://static.sellmyapp.com/wp-content/uploads/thumbnail_image669d176367930.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669d176367930.png 200w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669d176367930-40x28.png 40w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669d176367930-67x47.png 67w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669d176367930-37x26.png 37w" sizes="(max-width: 200px) 100vw, 200px"> </div> </a> <div class="product-label"> <a class="hidden" href="https://www.sellmyapp.com/downloads/match-fruits/"> <h3>Match Fruits</h3> </a> <div class="product-categories"> <a href="https://www.sellmyapp.com/downloads/category/unity/"> <span class="ic ic-colored ic-unity cat-icon"></span> Unity</a> </div> <div class="rating no-rating" style="font-size:15px;">☆☆☆☆☆</div> </div> </article></div><div class="product-box-column"> <article class="list-product"> <a href="https://www.sellmyapp.com/downloads/unity-balloon-matching-puzzle-mobile-game-source-code-for-sale/"> <div class="price-tag"> $199 </div> <div class="img-contain"> <img width="200" height="140" src="https://static.sellmyapp.com/wp-content/uploads/thumbnail_image669e38b26a548.jpg" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669e38b26a548.jpg 200w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669e38b26a548-40x28.jpg 40w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669e38b26a548-67x47.jpg 67w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image669e38b26a548-37x26.jpg 37w" sizes="(max-width: 200px) 100vw, 200px"> </div> </a> <div class="product-label"> <a class="hidden" href="https://www.sellmyapp.com/downloads/unity-balloon-matching-puzzle-mobile-game-source-code-for-sale/"> <h3>Unity Balloon Matching Puzzle Mobile Game – Source Code for Sale</h3> </a> <div class="product-categories"> <a href="https://www.sellmyapp.com/downloads/category/android/"> <span class="ic ic-colored ic-android cat-icon"></span> Android</a> </div> <div class="rating no-rating" style="font-size:15px;">☆☆☆☆☆</div> </div> </article></div><div class="product-box-column"> <article class="list-product"> <a href="https://www.sellmyapp.com/downloads/tile-match-puzzle/"> <div class="price-tag"> $89 </div> <div class="img-contain"> <img width="200" height="140" src="https://static.sellmyapp.com/wp-content/uploads/thumbnail_image6698bd862e20a.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" srcset="https://www.sellmyapp.com/wp-content/uploads/thumbnail_image6698bd862e20a.png 200w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image6698bd862e20a-40x28.png 40w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image6698bd862e20a-67x47.png 67w, https://www.sellmyapp.com/wp-content/uploads/thumbnail_image6698bd862e20a-37x26.png 37w" sizes="(max-width: 200px) 100vw, 200px"> </div> </a> <div class="product-label"> <a class="hidden" href="https://www.sellmyapp.com/downloads/tile-match-puzzle/"> <h3>Tile Match Puzzle</h3> </a> <div class="product-categories"> <a href="https://www.sellmyapp.com/downloads/category/unity/"> <span class="ic ic-colored ic-unity cat-icon"></span> Unity</a> </div> <div class="rating no-rating" style="font-size:15px;">☆☆☆☆☆</div> </div> </article></div>
            </div>
        </div>
    </div>

    <a href="#" class="btn-view-options-mobile hidden" id="view_options_button_mobile">
        View purchase options
    </a>
    @endforeach
    @else
    <center><h1>Page not found!</h1></center>
    @endif

    <script type="text/javascript">
        var product_id = "5986";
  var edd_voting_nonce = "e120edaf2f";
  var mainCssPath = "https://www.sellmyapp.com/wp-content/themes/sma-theme/style.css"
    </script>

    <script type="application/ld+json">
        { "@context": "https://schema.org/", "@type": "Product", "name": "Jelly Garden Match 3 Complete Project + EDITOR", "image": ["https://www.sellmyapp.com/wp-content/uploads/featured_image58d8a9d28032c.jpg"], "description": "Buy Jelly Garden Match 3 Complete Project + EDITOR App source code, Ready for Launch in the Best Price and only on Sell My App!", "brand": { "@type": "Thing", "name": "Candy Smith" }, "review": [ { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "3" }, "name": "Not Bad Engine But Have Troubles", "author": { "@type": "Person", "name": "Hubertas Apinys" }, "datePublished": "2016-02-16", "reviewBody": "- There is not right dokumentation of fixing facebook login button.- No tutorial how to make amazon In app purchase.+ Easy to work for making new levels.+ Fair price.+ Fast and whey good support from developers." } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "5" }, "name": "The game is great", "author": { "@type": "Person", "name": "bee101games" }, "datePublished": "2016-02-20", "reviewBody": "The game working perfectly, and the source code is easy to edit!!" } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "5" }, "name": "Excellent support in purchasing.", "author": { "@type": "Person", "name": "carol Mccoy" }, "datePublished": "2016-02-26", "reviewBody": "After being defrauded by another seller, I purchased this app from Best 2d game Studio. The best support that I have had by Sellmyapp and Best 2d game studio on an online purchase. And I normally don't do the Paypal thing." } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "5" }, "name": "PERFECT GAME IS SO EASY TO INSTALL", "author": { "@type": "Person", "name": "yazilimapp yazilimapp" }, "datePublished": "2016-05-02", "reviewBody": "Hello, I bought so far the most beautiful descriptions of the easiest games in the dozens of ready had no problem thank you very much it was very easy to install" } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "5" }, "name": "Great work", "author": { "@type": "Person", "name": "Jennie Menn" }, "datePublished": "2016-07-27", "reviewBody": "This game is s steal. great support no problems so far. However, I think that three star review was unfairly given. I see those from people all the time and they make me mad. No where does it say in the description that those things were part of what we purchased so how can the programmer be blamed that they are not there. What do people expect for such a low cost? The idea is you buy the code that works and make your own customization or pay someone else to do it if you can't. It is like buying a buying a bicycle when you want a motor cycle and then blaming the bike maker because you can not get it to run like a motor cycle. The online rating system is fake and flawed and give no indication of the quality of a product because there are so many thoughtless people in the world who love the opportunity to judge others. For me I say thanks for you heard work you saved me a small fortune." } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "5" }, "name": "", "author": { "@type": "Person", "name": "George Laskos" }, "datePublished": "2017-10-25", "reviewBody": "Excellent!" } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "5" }, "name": "", "author": { "@type": "Person", "name": "Muhammed Bıurak Çelik" }, "datePublished": "2018-04-04", "reviewBody": "Hello developersI do not have a lot of programming knowledge, but I still get learning.I have received support many times and fast and reliable supportAll the features in the application are working perfectly and I have published my application without any problemsI started making money on the first day, ads running smoothly.Regards,MBCAPP" } , { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": "4" }, "name": "", "author": { "@type": "Person", "name": "Anas Saf" }, "datePublished": "2018-08-28", "reviewBody": "+ Good game+ Detailed documentation+ Easy level maker editor- Outdated documentation- Hard to alter/read the code" } ], "aggregateRating": { "@type": "AggregateRating", "ratingValue": "NULL", "reviewCount" : "NULL", "bestRating": "5", "worstRating": "1" }, "offers": { "@type": "Offer", "url": "https://www.sellmyapp.com/downloads/jelly-garden-match-3-complete-project-editor/", "priceCurrency": "USD", "price": "89", "availability": "https://schema.org/InStock" } } 
    </script>


    <noscript>
        <link rel="stylesheet" href="https://www.sellmyapp.com/wp-content/themes/sma-theme/style.css">
    </noscript>
</div><!-- wrapper -->

@endsection

@section('customJs')
<script>

function addToCart(id){
    // alert(id);
    $.ajax({
        url: '{{ route("front.product.cart") }}',
        type: 'post',
        data: {id},
        dataType: 'json',
        success:function(res){
            
            if(res['status'] == true){
                const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 1000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
					})

					Toast.fire({
					icon: 'success',
						title: res['message']
					});
                    setTimeout(() => {
						window.location.href= "{{ route('front.cart.viewCheckout') }}";
					}, 1000);
       
            }else{
                const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 1000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
					})

					Toast.fire({
					icon: 'warning',
						title: res['message']
					})                   
            }
        }
    });

}

</script>
@endsection