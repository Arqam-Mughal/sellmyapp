@extends('front.layout.main')

@section('content')

@if(Cart::count() > 0)

<div class="wrapper">
    {{-- @dd(Cart::content()) --}}

    <div class="container">
        <h1 class="underlined-title">Checkout</h1>
        <div id="edd_checkout_wrap">

            <form id="edd_checkout_cart_form" method="post">
                <div id="edd_checkout_cart_wrap"><a href="{{ route('front.all-products') }}"
                        class="continue-shopping-link">Continue shopping</a>

                    <table id="edd_checkout_cart" class="checkout-cart">

                        <thead>
                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            
                            <tr class="header-row">
                                <th>Product</th>
                                <th class="cart-item-options">Platform</th>
                                <th class="cart-item-price">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)

                            <tr class="cart-item" id="edd_cart_item_0_680433" data-download-id="680433">
                                <td class="title-cell">
                                    <div class="thumb-wrapper">
{{-- @dd($item) --}}
                                        @if(!empty($item->options->productImage->image))

                                        <img width="200" height="140"
                                            src="{{ asset('/uploads/product/small/'.$item->options->productImage->image) }}"
                                            class="attachment-thumbnail size-thumbnail" alt="" loading="lazy"
                                            srcset="{{ asset('/uploads/product/small/'.$item->options->productImage->image) }}"
                                            sizes="(max-width: 200px) 100vw, 200px">
                                        @else
                                        <img width="200" height="140" src="{{ asset('/default-150x150.png') }}"
                                            class="attachment-thumbnail size-thumbnail" alt="" loading="lazy"
                                            srcset="{{ asset('/default-150x150.png') }}"
                                            sizes="(max-width: 200px) 100vw, 200px">
                                        @endif
                                    </div>
                                    <div class="title-wrapper">
                                        <div class="title">{{ $item->name }}</div>
                                        <a class="delete-item" href="javascript:void(0);"
                                            onclick="deleteCart('{{ $item->rowId }}')">
                                            <span class="ic ic-close"></span> Remove
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-item-options">
                                    {{ $item->options->platform }} </td>
                                <td class="cart-item-price">${{ $item->price }}</td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="checkout-summary">
                        Lifetime updates, Full support, 14 Days money back guarantee
                        <div class="total">Summary: <span class="red">$49</span></div>
                    </div>
                </div>
            </form>
            <div id="edd_checkout_form_wrap" class="edd_clearfix">
                <ul class="nav nav-tabs payment-select-tabs" role="tablist">
                    <li role="presentation">
                        <a href="#gateway-stripe" aria-controls="gateway-stripe" role="tab" data-toggle="tab">
                            Credit Card </a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="#gateway-paypal" aria-controls="gateway-paypal" role="tab" data-toggle="tab">
                            PayPal </a>
                    </li>
                </ul>
                <div class="tab-content home-tab-content">
                    <div role="tabpanel" class="tab-pane" id="gateway-stripe">
                        <form id="edd_purchase_form" class="edd_form"
                            action="https://www.sellmyapp.com/checkout/?payment-mode=stripe" method="POST">
                            <div id="payment-element">
                                <!--Stripe.js injects the Payment Element-->
                            </div>

                            <div id="address-element">
                                <!-- Elements will create form elements here -->
                            </div>
                        </form>
                        <div id="spinner"></div>
                        <div id="payment-message" class="hidden"></div>
                        <div style="margin-top: 20px"></div>
                        <input type="hidden" name="edd-user-id" value="72306">
                        <input type="hidden" name="edd_action" value="purchase">
                        <input type="hidden" name="edd-gateway" value="stripe">
                        <input type="hidden" name="action" value="edd_process_checkout">
                        <input type="hidden" name="payment-mode" value="stripe">
                        <img class="powered-by-stripe"
                            src="https://www.sellmyapp.com/wp-content/plugins/easy-digital-downloads/assets/images/powered-by-stripe.png"
                            alt="Powered by Stripe">
                        <a id="stripe_show_panel_button" class="btn btn-default btn-lg pay-now-button"
                            style="display: block" href="#">Pay with stripe</a>
                        <a id="stripe_checkout_button" class="btn btn-default btn-lg pay-now-button"
                            style="display: none" href="#">Pay now</a>


                    </div>
                    <div role="tabpanel" class="tab-pane active" id="gateway-paypal">
                        <div class="paypal-checkout">
                            <a id="paypal_checkout_button" class="btn btn-default btn-lg pay-now-button" href="#">Pay
                                now</a>
                            <img class="paypal-logo"
                                src="https://www.sellmyapp.com/wp-content/plugins/easy-digital-downloads/assets/images/paypal-logo.png"
                                alt="Paypal">
                            <input type="hidden" id="paypal_redirect_nonce" value="beb596d9c1">
                        </div>
                        <p class="terms-agree">
                            By clicking "Pay now" you agree to the <a
                                href="https://www.sellmyapp.com/buyer-terms-conditions/" target="_blank">Terms of
                                Service</a>
                        </p>
                    </div>
                </div>
            </div>
            <!--end #edd_checkout_form_wrap-->
        </div>
        <!--end #edd_checkout_wrap-->
    </div>
</div>

@else

<div class="wrapper">
    <div class="container">
        <h1 class="underlined-title">Checkout</h1>
        <div id="edd_checkout_wrap">
            <div class="edd_empty_cart">Shopping cart is empty. <a href="{{ route('front.all-products') }}">Go to the
                    shopping</a></div>
        </div>
    </div>
</div>

@endif
@endsection

@section('customJs')

<script>
    function deleteCart(rowId){
    // alert(rowId);

    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
    if (result.isConfirmed) {

    $.ajax({
        url: '{{ route("front.cart.delete") }}',
        method: 'delete', 
        data: {rowId: rowId},
        dataType: 'json',
        success:function(res){
        Swal.fire(
               'Deleted!',
               'Record Deleted Successfully!',
               'success'
                )			
                setTimeout(()=>{

					location.reload(true);
            window.location.href = "{{ route('front.cart.viewCheckout') }}";


				},1000);
        }
    });
}
    });
}

</script>

@endsection

@section('title', 'Checkout')