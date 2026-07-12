<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = \App\Models\Users::all();
        return view("users.index",compact("users"));
    }
    
    public function create() {
        return view("users.create");
    }

    public function store(Request $request) {
        
        $post = $request->all();
        \App\Models\Users::create($post);

      return  response()->json("users created successfully",200);
    }
    
    public function edit($id) {
        $users = \App\Models\Users::find($id);
        return view("users.edit",compact("users"));
    }

    public function update(Request $request) {
        $post = $request->all();

        unset($post['_token']);
        \App\Models\Users::where('id',$post['id'])->update($post);

      return  response()->json("users updated successfully",200);
    }


    public function delete(Request $request, $id)
    {
        \App\Models\Users::where("id", $id)->delete();
        
        $request->session()->flash('success', "Users Deleted Successfully");

        return redirect()->route('users-index');
    }
}
