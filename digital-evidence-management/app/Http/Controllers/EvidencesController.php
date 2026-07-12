<?php

namespace App\Http\Controllers;
use App\Models\AuditLogs;
use Illuminate\Http\Request;

class EvidencesController extends Controller
{
    public function index(){
        $evidences = \App\Models\Evidences::all();
        return view("evidences.index",compact("evidences"));
    }
    
    public function create() {
        $evidencetypes = \App\Models\EvidenceTypes::all();
        $cases = \App\Models\Cases::all();
        return view("evidences.create",compact("evidencetypes","cases"));  
    }

    public function store(Request $request) {
        
        $post = $request->all();
        \App\Models\Evidences::create($post);

        AuditLogs::create([
    'user_id' => auth()->id(),
    'action' => 'UPDATE',
    'module' => 'Evidence',
    'description' =>
        'Changed status to Under Analysis',
    'ip_address' => request()->ip()
]);

      return  response()->json("evidences created successfully",200);
    }
    
    public function edit($id) {
        $evidences = \App\Models\Evidences::find($id);
        return view("evidences.edit",compact("evidences"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);
        \App\Models\Evidences::where('id',$post['id'])->update($post);

      return  response()->json("evidences updated successfully",200);
    }


    public function delete(Request $request, $id)
    {
        \App\Models\Evidences::where("id", $id)->delete();
        
        $request->session()->flash('success', "evidences Deleted Successfully");

        return redirect()->route('evidences-index');
    }

}
