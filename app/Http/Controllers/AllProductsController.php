<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Platform;
use App\Models\TempType;
use Illuminate\Http\Request;
use App\Models\TempTypesRelatedTo;
use Illuminate\Support\Facades\Cache;

class AllProductsController extends Controller
{
    public function index(Request $req, $categorySlug = null, $subCategorySlug = null, $subsubCategorySlug = null){
        $sort = $req->sort;
        $platformSelected = '';
        $temptypeSelected = '';
        $temptypeRelatedToSelected = '';

        // It generates
        $cacheKey = 'products_' . md5(serialize($req->all())) . "_{$categorySlug}_{$subCategorySlug}_{$subsubCategorySlug}";

        // Attempt to retrieve the products from the cache
        $products = Cache::remember($cacheKey, 3600, function() use ($req, $categorySlug, $subCategorySlug, $subsubCategorySlug, &$platformSelected, &$temptypeSelected, &$temptypeRelatedToSelected) {

            $products = Product::selecting()->where('products.status', 1)->joining();

            if (!empty($req->sort)) {
                $products = $req->sort == 'newest' ? $products->latest() : $products->orderBy('id', 'ASC');
            } else {
                $products = $products->latest();
            }

            if ($categorySlug != null) {
                $subcatId = TempType::selecting()->slug($categorySlug)->first();
                $subsubcatId = TempTypesRelatedTo::selecting()->slug($categorySlug)->first();

                if ($subcatId) {
                    $products = $products->temptype($subcatId);
                    $temptypeSelected = $subcatId;
                } elseif ($subsubcatId) {
                    $products = $products->temptyperelated($subsubcatId);
                    $temptypeRelatedToSelected = $subsubcatId;
                } else {
                    $platformCategoryId = Platform::selecting()->slug($categorySlug)->first();
                    $products = $products->platform($platformCategoryId);
                    $platformSelected = $platformCategoryId;
                }
            }

            if ($subCategorySlug != null && $subsubCategorySlug == null) {
                $platformCategoryId = Platform::selecting()->slug($categorySlug)->first();
                $temptypeSubCategoryId = TempType::selecting()->slug($subCategorySlug)->first();
                $tempTypesRelatedToId = TempTypesRelatedTo::selecting()->slug($subCategorySlug)->first();

                if ($platformCategoryId) {
                    if ($temptypeSubCategoryId) {
                        $products = $products->platform($platformCategoryId)->temptype($temptypeSubCategoryId);
                        $temptypeSelected = $temptypeSubCategoryId;
                        $platformSelected = $platformCategoryId;
                    } elseif ($tempTypesRelatedToId) {
                        $products = $products->platform($platformCategoryId)->temptyperelated($tempTypesRelatedToId);
                        $temptypeRelatedToSelected = $tempTypesRelatedToId;
                        $platformSelected = $platformCategoryId;
                    }

                    if ($temptypeSubCategoryId && $tempTypesRelatedToId) {
                        $products = $products->temptype($temptypeSubCategoryId)->temptyperelated($tempTypesRelatedToId);
                        $temptypeRelatedToSelected = $tempTypesRelatedToId;
                        $temptypeSelected = $temptypeSubCategoryId;
                    }
                }
            }

            if ($subsubCategorySlug != null) {
                $catId = Platform::selecting()->slug($categorySlug)->first();
                $subcatId = TempType::selecting()->slug($subCategorySlug)->first();

                if ($subcatId) {
                    $tempTypesRelatedTo = TempTypesRelatedTo::platform($catId)->temptype($subcatId)->get();
                    $temptypeSelected = $subcatId;
                }

                $platformCategoryId = Platform::selecting()->slug($categorySlug)->first();
                $temptypeSubCategoryId = TempType::selecting()->slug($subCategorySlug)->first();
                $temptypeRelatedToId = TempTypesRelatedTo::selecting()->slug($subsubCategorySlug)->first();

                $products = $products->platform($platformCategoryId)->temptype($temptypeSubCategoryId)->temptypeRelated($temptypeRelatedToId);
                $platformSelected = $platformCategoryId;
                $temptypeSelected = $temptypeSubCategoryId;
                $temptypeRelatedToSelected = $temptypeRelatedToId;
            }

            if ($req->get('price_max') != '' && $req->get('price_min') != '') {
                if ($req->get('price_max') == 1000) {
                    $products = $products->pricing($req->get('price_min'));
                } else {
                    $products = $products->pricingnext($req->get('price_min'), $req->get('price_max'));
                }
            }

            return $products->paginate(8);
        });

        if ($products->isEmpty()) {
            abort(404);
        }

        $platforms = Platform::orderBy('name', 'ASC')->get();
        $tempTypes = TempType::orderBy('name', 'ASC')->get();
        $tempTypesRelatedTo = TempTypesRelatedTo::orderBy('name', 'ASC')->get();

        if ($categorySlug != null) {
            $subcatId = TempType::selecting()->slug($categorySlug)->first();
            if ($subcatId) {
                $tempTypesRelatedTo = TempTypesRelatedTo::temptype($subcatId)->get();
                $temptypeSelected = $subcatId;
            }
        }

        if ($subCategorySlug != null && $subsubCategorySlug == null) {
            $catId = Platform::selecting()->slug($categorySlug)->first();
            $subcatId = TempType::selecting()->slug($subCategorySlug)->first();
            if ($subcatId) {
                $tempTypesRelatedTo = TempTypesRelatedTo::platform($catId)->temptype($subcatId)->get();
                $temptypeSelected = $subcatId;
            }
        }

        if ($subsubCategorySlug != null) {
            $catId = Platform::selecting()->slug($categorySlug)->first();
            $subcatId = TempType::selecting()->slug($subCategorySlug)->first();
            if ($subcatId) {
                $tempTypesRelatedTo = TempTypesRelatedTo::platform($catId)->temptype($subcatId)->get();
                $temptypeSelected = $subcatId;
            }
        }

        return view('front.downloads', [
            'products' => $products,
            'platforms' => $platforms,
            'tempTypes' => $tempTypes,
            'tempTypesRelatedTo' => $tempTypesRelatedTo,
            'sort' => $sort,
            'platformSelected' => $platformSelected,
            'temptypeSelected' => $temptypeSelected,
            'temptypeRelatedToSelected' => $temptypeRelatedToSelected,
            'priceMax' => (intval($req->get('price_max')) == 0 ? 1000 : intval($req->get('price_max'))),
            'priceMin' => intval($req->get('price_min')),
        ]);
    }

}


// public function index(Request $req, $categorySlug = null, $subCategorySlug = null, $subsubCategorySlug = null){
//     // dd($req->all());
//     $sort = $req->sort;
//     $platformSelected = '';
//     $temptypeSelected = '';
//     $temptypeRelatedToSelected = '';

//     $products = Product::selecting()->where('products.status',1)->joining();
//     // dd($product);

//     if(!empty($req->sort)){
//         if($req->sort == 'newest'){
//         $products = $products->latest();
//         }else{
//         $products = $products->orderBy('id', 'ASC');
//         }

//         }else {
//             $products = $products->latest();
//         }



//         if($categorySlug != null){

//             $subcatId = TempType::selecting()->slug($categorySlug)->first();
//             $subsubcatId = TempTypesRelatedTo::selecting()->slug($categorySlug)->first();

//             if($subcatId){

//             $products = $products->temptype($subcatId);
//             $temptypeSelected = $subcatId;
//             // dd($temptypeSelected);
//             }elseif($subsubcatId){

//             $products = $products->temptyperelated($subsubcatId);
//             $temptypeRelatedToSelected = $subsubcatId;
//             // dd($temptypeRelatedToSelected);

//             }else{

//                 $platformCategoryId = Platform::selecting()->slug($categorySlug)->first();
//             $products = $products->platform($platformCategoryId);
//             $platformSelected = $platformCategoryId;
//             // dd($platformSelected);
//             }

//         }

//         if($subCategorySlug != null && $subsubCategorySlug == null){

//             $platformCategoryId = Platform::selecting()->slug($categorySlug)->first();
//             $temptypeSubCategoryId = TempType::selecting()->slug($subCategorySlug)->first();
//             $tempTypesRelatedToId = TempTypesRelatedTo::selecting()->slug($subCategorySlug)->first();

//             if($platformCategoryId){
//                 if($temptypeSubCategoryId){

//                     $products = $products->platform($platformCategoryId)->temptype($temptypeSubCategoryId);
//                     $temptypeSelected = $temptypeSubCategoryId;
//                     $platformSelected = $platformCategoryId;
//                     // dd($temptypeSelected);

//                 }elseif($tempTypesRelatedToId){
//                     $products = $products->platform($platformCategoryId)->temptyperelated( $tempTypesRelatedToId);

//                     $temptypeRelatedToSelected = $tempTypesRelatedToId;
//                     $platformSelected = $platformCategoryId;
//                     // dd($temptypeSelected);
//                 }

//                 if($temptypeSubCategoryId){
//                     if($tempTypesRelatedToId){
//                         $products = $products->temptype($temptypeSubCategoryId)->temptyperelated($tempTypesRelatedToId);
//                         $temptypeRelatedToSelected = $tempTypesRelatedToId;
//                         $temptypeSelected = $temptypeSubCategoryId;

//                     }
//                 }
//             }

//         }
//         // http://localhost:8000/downloads/andriod/app --
//         // http://localhost:8000/downloads/andriod/card --
//         // http://localhost:8000/downloads/apps/card

//     $platforms = Platform::orderBy('name', 'ASC')->get();
//     $tempTypes = TempType::orderBy('name', 'ASC')->get();
//     $tempTypesRelatedTo = TempTypesRelatedTo::orderBy('name', 'ASC')->get();

//     if($categorySlug != null){

//         $subcatId = TempType::selecting()->slug($categorySlug)->first();

//         if($subcatId){
//             $tempTypesRelatedTo = TempTypesRelatedTo::temptype($subcatId)->get();
//             $temptypeSelected = $subcatId;
//     }
// }

// if($subCategorySlug != null && $subsubCategorySlug == null){
// // dd("dd");
//     $catId = Platform::selecting()->slug($categorySlug)->first();
//     $subcatId = TempType::selecting()->slug($subCategorySlug)->first();
//     // dd($subcatId);

// if($subcatId){
//     $tempTypesRelatedTo = TempTypesRelatedTo::platform($catId)->temptype($subcatId)->get();
//     $temptypeSelected = $subcatId;
//     // dd($tempTypesRelatedTo);

// }
// }

// if($subsubCategorySlug != null){

//     $catId = Platform::selecting()->slug($categorySlug)->first();
//     $subcatId = TempType::selecting()->slug($subCategorySlug)->first();
//     // dd($subcatId);

// if($subcatId){
//     $tempTypesRelatedTo = TempTypesRelatedTo::platform($catId)->temptype($subcatId)->get();
//     $temptypeSelected = $subcatId;
//     // dd($tempTypesRelatedTo);

// }

//     $platformCategoryId = Platform::selecting()->slug($categorySlug)->first();
//     $temptypeSubCategoryId = TempType::selecting()->slug($subCategorySlug)->first();
//     $temptypeRelatedToId = TempTypesRelatedTo::selecting()->slug($subsubCategorySlug)->first();


//     $products = $products->platform($platformCategoryId)->temptype($temptypeSubCategoryId)->temptypeRelated($temptypeRelatedToId);
//     $platformSelected = $platformCategoryId;
//     $temptypeSelected = $temptypeSubCategoryId;
//     $temptypeRelatedToSelected = $temptypeRelatedToId;
//     // dd($temptypeRelatedToSelected);
// }

// if($req->get('price_max') != '' && $req->get('price_min') != ''){
//     if($req->get('price_max') == 1000){

//         $products = $products->pricing($req->get('price_min'));

//     }else{
//         $products = $products->pricingnext($req->get('price_min'), $req->get('price_max'));
//     }
// }

// $products = $products->paginate(8);

//     if(empty($products)){
//         abort(404);
//     }


//     return view('front.downloads',

//      ['products' => $products,
//      'platforms' => $platforms,
//      'tempTypes' => $tempTypes,
//      'tempTypesRelatedTo' => $tempTypesRelatedTo,
//      'sort' => $sort,
//      'platformSelected' => $platformSelected,
//      'temptypeSelected' => $temptypeSelected,
//      'temptypeRelatedToSelected' => $temptypeRelatedToSelected,
//      'priceMax' => (intval($req->get('price_max')) == 0 ? 1000 : intval($req->get('price_max'))),
//      'priceMin' => intval($req->get('price_min')),

//      ]);

// }
