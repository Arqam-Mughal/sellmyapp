<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Platform;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $req){
        if(Auth::check()){

            $id = $req->id;
            // dd($id);
        $product = Product::select('products.*', 'platforms.name')->leftJoin('platforms','platforms.id', 'products.platform_id')->with('product_images')->find($id);

        if(empty($product)){
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found!'
            ]);
        }
        // Cart::add('id', 'name', 'qty', 'price', [option])

        if(Cart::count() > 0){

            $cart = Cart::content();
            $productAlreadyExist = false;

            foreach($cart as $item){
                if($item->id == $product->id){
                    $productAlreadyExist = true;
                }
            }
            if($productAlreadyExist == true){
                // already exists

                $status = false;
                $message = $product->title . " already exists!";

        }else{
            // dd($product);

            Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (!empty($product->product_images) ? $product->product_images->first() : ''),'platform' => $product->name]);

            session()->flash('success', 'Cart Added!');
            $status = true;
            $message = $product->title . ' added to cart!';
        }

    }else{

        Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (!empty($product->product_images) ? $product->product_images->first() : ''), 'platform' => $product->name]);

            session()->flash('success', 'Cart Added!');
            $status = true;
            $message = $product->title . ' added to cart!';
    }

    return response()->json([
        'status' => $status,
        'message' => $message
    ]);

    }

    // $intentedUrl = urlencode(url()->full());
    $intentedUrl = url()->previous();
    session()->flash('intented', $intentedUrl);

        return response()->json([
            'redirect' => true,
        ]);

}

    public function viewCheckout(){
        if(Auth::check()){
            return view('front.checkout');
        }

        $urlIntented = url()->full();
        // return redirect()->route('front.login', ['intented' => $urlIntented]);
        return redirect()->route('front.login')->with('intented', $urlIntented);
    }

    public function cartDelete(Request $req){
        // dd($req->rowId);

        $cart = Cart::get($req->rowId);

        if(empty($cart)){
            session()->flash('error', 'Record Not Found!');
            return response()->json([
                'status' => false,
                'message' => 'Record Not Found!'
            ]);
        }

        Cart::remove($req->rowId);
        session()->flash('success', 'Cart Item Removed!');
        return response()->json([
            'status' => true,
            'message' => 'Cart Item Removed!'
        ]);
    }
}
