<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Support\Facades\Validator;

class PlatformController extends Controller
{
     
    public function index(Request $req)
    {
        $platforms = Platform::latest();
     

        if(!empty($req->get('keyword'))){
            $platforms = $platforms->where('name', 'like', '%'. $req->get('keyword').'%');
        }
        $platforms = $platforms->paginate(10);            

        return view('admin.platform.list', ['platforms' => $platforms]);


        
    }

    public function create()
    {
        return view('admin.platform.create');
    }

   
    public function store(Request $req)
    {
        // dd($req->all());
        // echo 'data';
        $validator = Validator::make($req->all(), [               // $input,$rules,$msgs
            'name' => 'required',
            'slug' => 'required|unique:platforms',
        ],
        [
            'name.required' => 'The :attribute must needed',
            'slug.required' => 'The :attribute must needed',
            'slug.unique' => 'The :attribute must be unique',
        ]);    
        
        if($validator->passes()){

            $platform = new Platform();
            $platform->name = $req->name;
            $platform->slug = $req->slug;
            $platform->status = $req->status;
            $platform->save();

            return response()->json([
                'status' => true,
                'message' => 'New Record Added!'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function show(string $id)
    {
        
    }

    
    public function edit(Request $req, string $id)
    {
        $platform = Platform::find($id);
        if(empty($platform)){
            $req->session()->flash('error', 'Record Not Found!');
            return redirect()->route('admin.platform.index');
        }
            return view('admin.platform.edit', ['platform' => $platform]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $platform = Platform::find($id);

        if(empty($platform)){
            $req->session()->flash('error', 'Record Not Found!');

            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Record Not Found!'
            ]);
        }

        $validator = Validator::make($req->all(), [               // $input,$rules,$msgs
            'name' => 'required',
            'slug' => 'required|unique:platforms,slug,'.$id.'id',
        ],
        [
            'name.required' => 'The :attribute must needed',
            'slug.required' => 'The :attribute must needed',
            'slug.unique' => 'The :attribute must be unique',
        ]);    
        
        if($validator->passes()){

            $platform->name = $req->name;
            $platform->slug = $req->slug;
            $platform->status = $req->status;
            $platform->save();

            return response()->json([
                'status' => true,
                'message' => 'Record Updated SuccessFully!'
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
        $platform = Platform::find($id);

        if(empty($platform)){

            $req->session()->flash('error', 'Record Not Found!');
            return response()->json([
                'status' => true,
                'message' => 'Record Not Found!'
            ]);
        }   

        $platform->delete();

        session()->flash('success', 'Record deleted SuccessFully!');
        return response()->json([
            'status' => true,
            'message' => 'Record deleted SuccessFully!'
        ]);
    }

}
