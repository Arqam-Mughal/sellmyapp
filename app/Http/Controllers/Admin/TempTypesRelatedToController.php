<?php

namespace App\Http\Controllers\Admin;

use App\Models\Platform;
use App\Models\TempType;
use Illuminate\Http\Request;
use App\Models\TempTypesRelatedTo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TempTypesRelatedToController extends Controller
{
    public function index(Request $req)
    {
        $TempTypesRelatedTo = TempTypesRelatedTo::select('temp_types_related_tos.*', 'temp_types.name as tempTypeName')->latest()->leftJoin('temp_types', 'temp_types.id', 'temp_types_related_tos.temp_type_id');
     

        if(!empty($req->get('keyword'))){
            $TempTypesRelatedTo = $TempTypesRelatedTo->where('name', 'like', '%'. $req->get('keyword').'%');
        }
        $TempTypesRelatedTo = $TempTypesRelatedTo->paginate(3);            

        return view('admin.TempType-RelatedTo.list', ['TempTypeRelatedTo' => $TempTypesRelatedTo]);


        
    }

    public function create()
    {
        $temptypes = TempType::orderBy('name', 'ASC')->get();
        $platforms = Platform::orderBy('name', 'ASC')->get();
                
        return view('admin.TempType-RelatedTo.create', ['temptypes' => $temptypes, 'platforms' => $platforms]);
    }

   
    public function store(Request $req)
    {
     
        $validator = Validator::make($req->all(), [               // $input,$rules,$msgs
            'name' => 'required',
            'slug' => 'required|unique:temp_types_related_tos',
            'temptype_id' => 'required',
        ],
        [
            'name.required' => 'The :attribute must needed',
            'slug.required' => 'The :attribute must needed',
            'slug.unique' => 'The :attribute must be unique',
        ]);    
        
        if($validator->passes()){

            $TempTypeRelatedTo = new TempTypesRelatedTo();
            $TempTypeRelatedTo->temp_type_id = $req->temptype_id;
            $TempTypeRelatedTo->platform_id = $req->platform_id;
            $TempTypeRelatedTo->name = $req->name;
            $TempTypeRelatedTo->slug = $req->slug;
            $TempTypeRelatedTo->status = $req->status;
            $TempTypeRelatedTo->save();

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
        $temptypes = TempType::all();
        $platforms = Platform::orderBy('name', 'ASC')->get();

        $TempTypesRelatedTo = TempTypesRelatedTo::find($id);
        if(empty($TempTypesRelatedTo)){
            $req->session()->flash('error', 'Record Not Found!');
            return redirect()->route('temp-type-related-to.index');
        }
            return view('admin.TempType-RelatedTo.edit', ['TempTypeRelatedTo' => $TempTypesRelatedTo, 'temptypes' => $temptypes, 'platforms' => $platforms]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $TempTypesRelatedTo = TempTypesRelatedTo::find($id);

        if(empty($TempTypesRelatedTo)){
            $req->session()->flash('error', 'Record Not Found!');

            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Record Not Found!'
            ]);
        }

        $validator = Validator::make($req->all(), [               // $input,$rules,$msgs
            'name' => 'required',
            'slug' => 'required|unique:temp_types_related_tos,slug,'.$id.'id',
            'temptype_id' => 'required',
        ],
        [
            'name.required' => 'The :attribute must needed',
            'slug.required' => 'The :attribute must needed',
            'slug.unique' => 'The :attribute must be unique',
        ]);    
        
        if($validator->passes()){

            $TempTypesRelatedTo->temp_type_id = $req->temptype_id;
            $TempTypesRelatedTo->platform_id = $req->platform_id;
            $TempTypesRelatedTo->name = $req->name;
            $TempTypesRelatedTo->slug = $req->slug;
            $TempTypesRelatedTo->status = $req->status;
            $TempTypesRelatedTo->save();

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
        $TempTypesRelatedTo = TempTypesRelatedTo::find($id);

        if(empty($TempTypesRelatedTo)){

            $req->session()->flash('error', 'Record Not Found!');
            return response()->json([
                'status' => true,
                'message' => 'Record Not Found!'
            ]);
        }   

        $TempTypesRelatedTo->delete();

        session()->flash('success', 'Record deleted SuccessFully!');
        return response()->json([
            'status' => true,
            'message' => 'Record deleted SuccessFully!'
        ]);
    }

}
