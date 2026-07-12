<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvidenceTypesController extends Controller
{
     public function index(){
        $evidencetypes = \App\Models\EvidenceTypes::all();
        return view("evidencetypes.index",compact("evidencetypes"));
    }
    
    public function create() {
        return view("evidencetypes.create");
    }

    public function store(Request $request) {
        
        $post = $request->all();
        \App\Models\EvidenceTypes::create($post);

      return  response()->json("evidencetypes created successfully",200);
    }
    
    public function edit($id) {
        $evidencetypes = \App\Models\EvidenceTypes::find($id);
        return view("evidencetypes.edit",compact("evidencetypes"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);
        \App\Models\EvidenceTypes::where('id',$post['id'])->update($post);

      return  response()->json("evidencetypes updated successfully",200);
    }


    public function delete(Request $request, $id)
    {
        \App\Models\EvidenceTypes::where("id", $id)->delete();
        
        $request->session()->flash('success', "evidencetypes Deleted Successfully");

        return redirect()->route('evidencetypes-index');
    }
}
