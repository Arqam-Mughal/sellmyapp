<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Platform;
use App\Models\TempType;
use Illuminate\Http\Request;
use App\Models\TempTypesRelatedTo;

class AllProductsController extends Controller
{
    public function index(Request $req, $categorySlug = null, $subCategorySlug = null, $subsubCategorySlug = null){
        // dd($req->all());
        $sort = $req->sort;
        $platformSelected = '';
        $temptypeSelected = '';
        $temptypeRelatedToSelected = '';

        $products = Product::select('products.*', 'platforms.name as platformName')->where('products.status',1)->leftJoin('platforms', 'platforms.id', 'products.platform_id');
        // dd($product);

        if(!empty($req->sort)){
            if($req->sort == 'newest'){
            $products = $products->latest();
            }else{
            $products = $products->orderBy('id', 'ASC');
            }

            }else {
                $products = $products->latest();
            }



            if($categorySlug != null){

                $subcatId = TempType::select('id')->where('slug', $categorySlug)->first();
                $subsubcatId = TempTypesRelatedTo::select('id')->where('slug', $categorySlug)->first();

                if($subcatId){

                $products = $products->whereIn('temp_type_id', $subcatId);
                $temptypeSelected = $subcatId;
                // dd($temptypeSelected);
                }elseif($subsubcatId){

                $products = $products->whereIn('temp_types_related_to_id', $subsubcatId);
                $temptypeRelatedToSelected = $subsubcatId;
                // dd($temptypeRelatedToSelected);

                }else{

                    $platformCategoryId = Platform::select('id')->where('slug', $categorySlug)->first();
                $products = $products->whereIn('platform_id', $platformCategoryId);
                $platformSelected = $platformCategoryId;
                // dd($platformSelected);
                }

            }

            if($subCategorySlug != null && $subsubCategorySlug == null){

                $platformCategoryId = Platform::select('id')->where('slug', $categorySlug)->first();
                $temptypeSubCategoryId = TempType::select('id')->where('slug', $subCategorySlug)->first();
                $tempTypesRelatedToId = TempTypesRelatedTo::select('id')->where('slug', $subCategorySlug)->first();

                if($platformCategoryId){
                    if($temptypeSubCategoryId){

                        $products = $products->whereIn('platform_id', $platformCategoryId)->whereIn('temp_type_id', $temptypeSubCategoryId);
                        $temptypeSelected = $temptypeSubCategoryId;
                        $platformSelected = $platformCategoryId;
                        // dd($temptypeSelected);

                    }elseif($tempTypesRelatedToId){
                        $products = $products->whereIn('platform_id', $platformCategoryId)->whereIn('temp_types_related_to_id', $tempTypesRelatedToId);
                        $temptypeRelatedToSelected = $tempTypesRelatedToId;
                        $platformSelected = $platformCategoryId;
                        // dd($temptypeSelected);
                    }

                    if($temptypeSubCategoryId){
                        if($tempTypesRelatedToId){
                            $products = $products->whereIn('temp_type_id', $temptypeSubCategoryId)->whereIn('temp_types_related_to_id', $tempTypesRelatedToId);
                            $temptypeRelatedToSelected = $tempTypesRelatedToId;
                            $temptypeSelected = $temptypeSubCategoryId;

                        }
                    }
                }

            }
            // http://localhost:8000/downloads/andriod/app --
            // http://localhost:8000/downloads/andriod/card --
            // http://localhost:8000/downloads/apps/card

        $platforms = Platform::orderBy('name', 'ASC')->get();
        $tempTypes = TempType::orderBy('name', 'ASC')->get();
        $tempTypesRelatedTo = TempTypesRelatedTo::orderBy('name', 'ASC')->get();

        if($categorySlug != null){

            $subcatId = TempType::select('id')->where('slug', $categorySlug)->first();

            if($subcatId){
                $tempTypesRelatedTo = TempTypesRelatedTo::whereIn('temp_type_id', $subcatId)->get();
                $temptypeSelected = $subcatId;
        }
    }

    if($subCategorySlug != null && $subsubCategorySlug == null){
// dd("dd");
        $catId = Platform::select('id')->where('slug', $categorySlug)->first();
        $subcatId = TempType::select('id')->where('slug', $subCategorySlug)->first();
        // dd($subcatId);

    if($subcatId){
        $tempTypesRelatedTo = TempTypesRelatedTo::whereIn('platform_id', $catId)->whereIn('temp_type_id', $subcatId)->get();
        $temptypeSelected = $subcatId;
        // dd($tempTypesRelatedTo);

}
    }

    if($subsubCategorySlug != null){

        $catId = Platform::select('id')->where('slug', $categorySlug)->first();
        $subcatId = TempType::select('id')->where('slug', $subCategorySlug)->first();
        // dd($subcatId);

    if($subcatId){
        $tempTypesRelatedTo = TempTypesRelatedTo::whereIn('platform_id', $catId)->whereIn('temp_type_id', $subcatId)->get();
        $temptypeSelected = $subcatId;
        // dd($tempTypesRelatedTo);

}

        $platformCategoryId = Platform::select('id')->where('slug', $categorySlug)->first();
        $temptypeSubCategoryId = TempType::select('id')->where('slug', $subCategorySlug)->first();
        $temptypeRelatedToId = TempTypesRelatedTo::select('id')->where('slug', $subsubCategorySlug)->first();


        $products = $products->whereIn('platform_id', $platformCategoryId)->whereIn('temp_type_id', $temptypeSubCategoryId)->whereIn('temp_types_related_to_id', $temptypeRelatedToId);
        $platformSelected = $platformCategoryId;
        $temptypeSelected = $temptypeSubCategoryId;
        $temptypeRelatedToSelected = $temptypeRelatedToId;
        // dd($temptypeRelatedToSelected);
    }

    if($req->get('price_max') != '' && $req->get('price_min') != ''){
        if($req->get('price_max') == 1000){

            $products = $products->whereBetween('price', [intval($req->get('price_min')), 1000000]);

        }else{
            $products = $products->whereBetween('price', [intval($req->get('price_min')), intval($req->get('price_max')) ]);
        }
    }

    $products = $products->paginate(8);

        if(empty($products)){
            abort(404);
        }


        return view('front.downloads',

         ['products' => $products,
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



