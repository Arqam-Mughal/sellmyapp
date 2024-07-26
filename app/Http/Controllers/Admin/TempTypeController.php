<?php

namespace App\Http\Controllers\Admin;

use App\Models\Platform;
use App\Models\TempType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TempTypeController extends Controller
{
    public function index(Request $req)
    {
        $temptypes = TempType::select('temp_types.*', 'platforms.name as platformName')->latest()->leftJoin('platforms', 'platforms.id', 'temp_types.platform_id');
     

        if(!empty($req->get('keyword'))){
            $temptypes = $temptypes->where('name', 'like', '%'. $req->get('keyword').'%');
        }
        $temptypes = $temptypes->paginate(3);            

        return view('admin.template-type.list', ['temptypes' => $temptypes]);


        
    }

    public function create()
    {
        $platforms = Platform::orderBy('name', 'ASC')->get();
                
        return view('admin.template-type.create', ['platforms' => $platforms]);
    }

   
    public function store(Request $req)
    {
     
        $validator = Validator::make($req->all(), [               // $input,$rules,$msgs
            'name' => 'required',
            'slug' => 'required|unique:temp_types',
            'platform_id' => 'required',
        ],
        [
            'name.required' => 'The :attribute must needed',
            'slug.required' => 'The :attribute must needed',
            'slug.unique' => 'The :attribute must be unique',
            'platform_id' => 'The :attribute must be unique',
        ]);    
        
        if($validator->passes()){

            $temptype = new TempType();
            $temptype->platform_id = $req->platform_id;
            $temptype->name = $req->name;
            $temptype->slug = $req->slug;
            $temptype->status = $req->status;
            $temptype->save();

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

    
    public function edit(Request $req, string $id)
    {
        $platforms = Platform::all();

        $temptype = TempType::find($id);
        if(empty($temptype)){
            $req->session()->flash('error', 'Record Not Found!');
            return redirect()->route('admin.temp-type.index');
        }
            return view('admin.template-type.edit', ['temptype' => $temptype, 'platforms' => $platforms]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $temptype = TempType::find($id);

        if(empty($temptype)){
            $req->session()->flash('error', 'Record Not Found!');

            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Record Not Found!'
            ]);
        }

        $validator = Validator::make($req->all(), [               // $input,$rules,$msgs
            'name' => 'required',
            'slug' => 'required|unique:temp_types,slug,'.$id.'id',
            'platform_id' => 'required',
        ],
        [
            'name.required' => 'The :attribute must needed',
            'slug.required' => 'The :attribute must needed',
            'slug.unique' => 'The :attribute must be unique',
        ]);    
        
        if($validator->passes()){

            $temptype->platform_id = $req->platform_id;
            $temptype->name = $req->name;
            $temptype->slug = $req->slug;
            $temptype->status = $req->status;
            $temptype->save();

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
        $temptype = TempType::find($id);

        if(empty($temptype)){

            $req->session()->flash('error', 'Record Not Found!');
            return response()->json([
                'status' => true,
                'message' => 'Record Not Found!'
            ]);
        }   

        $temptype->delete();

        session()->flash('success', 'Record deleted SuccessFully!');
        return response()->json([
            'status' => true,
            'message' => 'Record deleted SuccessFully!'
        ]);
    }

}
