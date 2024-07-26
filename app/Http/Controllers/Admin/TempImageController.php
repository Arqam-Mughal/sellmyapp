<?php

namespace App\Http\Controllers\Admin;

use App\Models\TempImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;        // composer require intervention/image , php artisan:config:cache
use Intervention\Image\Drivers\Gd\Driver;

class TempImageController extends Controller
{
    public function create(Request $req){

        $image = $req->image;
        
        if(!empty($req->image)){
            $ext = $image->getClientOriginalExtension(); 
            $newName = time() . "." . $ext;

            $tempImage = new TempImage();
            $tempImage->name = $newName;
            $tempImage->save();

            $image->move(public_path('/temp/'), $newName);

            // Generate Thumbnail

            $sourcePath = public_path().'/temp/'. $newName;
            $destPath = public_path(). '/temp/thumb/'. $newName;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($sourcePath);
            $image->resize(300, 220);    
            $image->save($destPath);

            return response()->json([
                'status' => true,
                'image_id' => $tempImage->id,
                'imagePath' => asset('/temp/thumb/'. $newName),
                'message' => 'Image Uploaded Successfully!'
            ]);

        }
        
    }
}
