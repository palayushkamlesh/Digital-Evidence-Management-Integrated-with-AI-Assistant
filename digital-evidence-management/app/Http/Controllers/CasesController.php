<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AuditLogs;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function index(){
        $cases = \App\Models\Cases::all();
        return view("cases.index",compact("cases"));
    }
    
    public function create() {
        $users = \App\Models\Users::all();
        return view("cases.create",compact("users"));  
    }

    public function store(Request $request) {

    $post = $request->all();

    $case = \App\Models\Cases::create($post);

    AuditLogs::create([
        'users_id' => auth()->id(),
        'action' => 'CREATE',
        'module' => 'Case',
        'description' => 'Created Case '.$case->case_number,
        'ip_address' => request()->ip()
    ]);

    return response()->json(
        "cases created successfully",
        200
    );
}
    
    public function edit($id) {
        $cases = \App\Models\Cases::find($id);
        return view("cases.edit",compact("cases"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);
        \App\Models\Cases::where('id',$post['id'])->update($post);

      return  response()->json("cases updated successfully",200);
    }


    public function delete(Request $request, $id)
    {
        \App\Models\Cases::where("id", $id)->delete();
        
        $request->session()->flash('success', "Cases Deleted Successfully");

        return redirect()->route('cases-index');
    }
}
