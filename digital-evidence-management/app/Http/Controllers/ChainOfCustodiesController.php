<?php

namespace App\Http\Controllers;
use App\Models\AuditLogs;
use Illuminate\Http\Request;

class ChainOfCustodiesController extends Controller
{
    public function index(){
        $chainofcustodies = \App\Models\ChainOfCustodies::all();
        return view("chainofcustodies.index",compact("chainofcustodies"));
    }
    
    public function create() {
        $chainofcustodies = \App\Models\ChainOfCustodies::all();
        $fromusers = \App\Models\Users::all();
        $tousers = \App\Models\Users::all();
        $evidences = \App\Models\Evidences::all();
        return view("chainofcustodies.create",compact("evidences","fromusers","tousers"));  
    }

    public function store(Request $request)
{
    $post = $request->all();

    $custody = \App\Models\ChainOfCustodies::create($post);

    AuditLogs::create([
        'user_id' => auth()->id(),
        'action' => 'CREATE',
        'module' => 'Chain of Custody',
        'description' =>
            'Created custody record for Evidence ' .
            $custody->evidences_id,
        'ip_address' => request()->ip()
    ]);

    $chain = \App\Models\ChainOfCustodies::findOrFail($request->id);

$chain->update($post);

AuditLogs::create([
    'user_id' => auth()->id(),
    'action' => 'UPDATE',
    'module' => 'Chain of Custody',
    'description' => 'Updated custody record #'.$chain->id,
    'ip_address' => request()->ip()
]);

AuditLogs::create([
    'user_id' => auth()->id(),
    'action' => 'DELETE',
    'module' => 'Chain of Custody',
    'description' =>
        'Deleted custody record #' . $id,
    'ip_address' => request()->ip()
]);

   $request->session()->flash(
    'success',
    'Chain of Custody created successfully'
);

return redirect()->route('chainofcustodies-index');

}
    
    public function edit($id) {
        $chainofcustodies = \App\Models\ChainOfCustodies::find($id);
        return view("chainofcustodies.edit",compact("chainofcustodies"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);
        \App\Models\ChainOfCustodies::where('id',$post['id'])->update($post);

      return  response()->json("chainofcustodies updated successfully",200);
    }


    public function delete(Request $request, $id)
    {
        \App\Models\ChainOfCustodies::where("id", $id)->delete();
        
        $request->session()->flash('success', "chainofcustodies Deleted Successfully");

        return redirect()->route('chainofcustodies-index');
    }
}
