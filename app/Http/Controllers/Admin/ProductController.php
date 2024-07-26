<?php

namespace App\Http\Controllers\Admin;

use File;    
use App\Models\Product;
use App\Models\Platform;
use App\Models\TempType;
use App\Models\Framework;
use App\Models\TempImage;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\TempTypesRelatedTo;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;   
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;


class ProductController extends Controller
{
    public function index(Request $req)
    {
        
        $products = Product::latest('id')->with('product_images');

        if(!empty($req->keyword)){
            $products = $products->where('title','like','%'.$req->keyword.'%');
        }
        $products = $products->paginate();
        // dd($products);
        $data['products'] = $products;
        return view('admin.product.list', $data);
        
    }

    public function create()
    {
        $platforms = Platform::orderBy('name', 'ASC')->get();
        $temptypes = TempType::orderBy('name', 'ASC')->get();
        $TempTypesRelatedTo = TempTypesRelatedTo::orderBy('name', 'ASC')->get();
                
        return view('admin.product.create', ['platforms' => $platforms,'temptypes' => $temptypes, 'TempTypesRelatedTo' => $TempTypesRelatedTo]);
    }

   
    public function store(Request $req)
    {
        // dd($req->frameworks);
     
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'platform' => 'required',
            'template_type' => 'required',
            'temptype_related_to' => 'required',
            'is_featured' => 'required|in:Yes,No',
        ];

       
        $validator = Validator::make($req->all(), $rules);

        if($validator->passes()){

        $product = new Product();
        $product->title = $req->title;
        $product->slug = $req->slug; 
        $product->description = $req->description;
        $product->features = $req->features; 
        $product->updates = $req->updates; 
        $product->frameworks = json_encode($req->frameworks); 
        $product->price = $req->price; 
        $product->status = $req->status; 
        $product->platform_id = $req->platform; 
        $product->temp_type_id = $req->template_type; 
        $product->temp_types_related_to_id = $req->temptype_related_to; 
        $product->is_featured = $req->is_featured; 
        // $product->related_products = (!empty($req->related_products) ? implode(',', $req->related_products) : '');
        $product->save();

            // Save Gallery Pics
            if(!empty($req->image_array)){

                foreach ($req->image_array as $temp_image_id) {

                    $tempImageInfo = TempImage::find($temp_image_id);
                    $extArray = explode('.', $tempImageInfo->name);
                    // 1713926505.png
                    $ext = last($extArray);     // like jpg

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = 'NULL';
                    $productImage->save();

                    $imageName = $product->id. '-' . $productImage->id. '-'. time().'.' .$ext;
                    // like 6-2-5645457.jpg
                    $productImage->image = $imageName;
                    $productImage->save();

                    // Generate Thumbnail

                    // large Image

                $sourcePath = public_path(). '/temp/'. $tempImageInfo->name;
                $destPath = public_path(). '/uploads/product/large/'. $imageName;

                $manager = new ImageManager(new Driver());
                $image = $manager->read($sourcePath);
                $image->resize(651, 290);    
                $image->save($destPath);

                    // Small Image
                $sourcePath = public_path(). '/temp/'. $tempImageInfo->name;
                $destPath = public_path(). '/uploads/product/small/'. $imageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sourcePath);
                $image->resize(300, 220);    
                $image->save($destPath);
                }
            }

            $req->session()->flash('success', 'Product Added SuccessFully!');
            return response()->json([
                'status' => true,
                'message' => 'Product Added SuccessFully!'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    
    public function edit(Request $req, string $id)
    {
        $product = Product::find($id);

        if(empty($product)){
            session()->flash('error', 'Record Not Found!');
            return response()->json([
                'status' => false,
                'message' => 'Record Not Found!'
            ]);
        }

        $frameworks = [];
        if (!empty($product->frameworks)) {
            $frameworks = explode(',', $product->frameworks);
            // $frameworks = Product::whereIn('id', $frameId)->get();   // return an array of records

        }
        // dd($frameworks);
        // die();


        $productImages = ProductImage::where('product_id', $product->id)->get();
        $platforms = Platform::orderBy('name', 'ASC')->get();
        $temptypes = TempType::orderBy('name', 'ASC')->get();
        $TempTypesRelatedTo = TempTypesRelatedTo::orderBy('name', 'ASC')->get();

            return view('admin.product.edit', ['product' => $product, 'platforms' => $platforms,'temptypes' => $temptypes, 'TempTypesRelatedTo' => $TempTypesRelatedTo, 'productImages' => $productImages, 'frameworks' => $frameworks]);
    }


    public function update(Request $req, string $id)
    {
        $product = Product::find($id);

        if(empty($product)){
            session()->flash('error', 'Record Not Found!');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Record Not Found!'
            ]);
        }

        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$id.'id',
            'price' => 'required|numeric',
            'platform' => 'required',
            'template_type' => 'required',
            'temptype_related_to' => 'required',
            'is_featured' => 'required|in:Yes,No',
        ];

       
        $validator = Validator::make($req->all(), $rules);

        if($validator->passes()){

        $product->title = $req->title;
        $product->slug = $req->slug; 
        $product->description = $req->description;
        $product->features = $req->features; 
        $product->updates = $req->updates; 
        $product->frameworks = (!empty($req->frameworks) ? implode(',', $req->frameworks) : ''); 
        $product->price = $req->price; 
        $product->status = $req->status; 
        $product->platform_id = $req->platform; 
        $product->temp_type_id = $req->template_type; 
        $product->temp_types_related_to_id = $req->temptype_related_to; 
        $product->is_featured = $req->is_featured; 

        $product->save();
  
            $req->session()->flash('success', 'Product Updated SuccessFully!');
            return response()->json([
                'status' => true,
                'message' => 'Product Updated SuccessFully!'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, string $id)
    {
        $product = Product::find($id);


        if(empty($product)){
            $req->session()->flash('error', 'Record Not Found');
            return response()->json([
            'status' => false,
            'notFound' => true
            ]);
        }
        
        $productImages = ProductImage::where('product_id',$id)->get();
        if(!empty($productImages)){
        foreach($productImages as $val){
     
        File::delete(public_path().'/uploads/product/large/'. $val->image);
        File::delete(public_path().'/uploads/product/small/'. $val->image);
        }
        }

        $product->delete();
        
        $req->session()->flash('success', 'Data Deleted SuccessFully!');
        return response([
            'status' => true,
            'message' => 'Data Deleted SuccessFully!'
        ]);
    }

    public function productCategoryGet(Request $req){
        // dd($req->platform_id);

        if(!empty($req->platform_id)){
 
            $TempTypesRelatedTo = TempTypesRelatedTo::where('platform_id', $req->platform_id)->orderBy('name','ASC')->get();

            if(!empty($req->temp_id)){
                $TempTypesRelatedTo = TempTypesRelatedTo::where('platform_id', $req->platform_id)->where('temp_type_id', $req->temp_id)->orderBy('name','ASC')->get();
            }
    
            return response()->json([
                'status' => true,
                'TempTypesRelatedTo' => $TempTypesRelatedTo
            ]);
            
        }else{
            return response()->json([
                'status' => true,
                // 'TempTypes' => [],
                'TempTypesRelatedTo' => []
            ]);
        }
    }
        
        public function productSubCategoryGet(Request $req){
            // dd($req->platform_id);
            // dd($req->temptype_id);
            if(!empty($req->temptype_id)){

                $TempTypesRelatedTo = TempTypesRelatedTo::where('temp_type_id', $req->temptype_id)->orderBy('name','ASC')->get();

                if(!empty($req->platform_id)){
                    $TempTypesRelatedTo = TempTypesRelatedTo::where('temp_type_id', $req->temptype_id)->where('platform_id', $req->platform_id)->orderBy('name','ASC')->get();
                }
        
                return response()->json([
                    'status' => true,
                    'TempTypesRelatedTo' => $TempTypesRelatedTo
                ]);
                
            }else{
                return response()->json([
                    'status' => true,
                    'TempTypesRelatedTo' => []
                ]);
            }

            
    }   

    public function getFrameworks(Request $req){
        // dd($req->tags);
        $frameworksGet = [];
        if($req->term != ''){
            $frameworks = Framework::where('name', 'like','%'.$req->term.'%')->get();
            if($frameworks != ''){
                foreach($frameworks as $framework){
                $frameworksGet[] = array('id' => $framework->name, 'text' => $framework->name);
                }
            }
        }
        // print_r($relatedProducts);
        return response()->json([
            'tags' => $frameworksGet,
            'status' => true
        ]);
    }

}
