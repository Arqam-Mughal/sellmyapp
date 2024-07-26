<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $req){

        $featuredProducts = Product::select('products.*', 'platforms.name')
    ->leftJoin('platforms', 'platforms.id', '=', 'products.platform_id')
    ->where('is_featured', 'Yes')
    ->where('products.status', 1)
    ->take(15)
    ->get();

    $newestProducts = Product::select('products.*', 'platforms.name')
    ->latest('id')
    ->leftJoin('platforms', 'platforms.id', '=', 'products.platform_id')
    ->where('products.status', 1)
    ->take(15)
    ->get();

        $data['featuredProducts'] = $featuredProducts;
        $data['newestProducts'] = $newestProducts;

        return view('front.home', $data);
    }

}
