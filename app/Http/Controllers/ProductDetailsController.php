<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function details(Request $req, $slug){
        $products = Product::select('products.*', 'platforms.name as platformName', 'temp_types.name as tempTypeName', 'temp_types_related_tos.name as tempTypeRelatedToName')
        ->leftJoin('platforms', 'platforms.id', 'products.platform_id')
        ->leftJoin('temp_types', 'temp_types.id', 'products.temp_type_id')
        ->leftJoin('temp_types_related_tos', 'temp_types_related_tos.id',  'products.temp_types_related_to_id')
        ->where('products.slug', $slug)->with('product_images')->get();
        // dd($product);
        // die;

        if(empty($products)){
            abort(404);
        }

        return view('front.products', ['product' => $products]);

    }
}
