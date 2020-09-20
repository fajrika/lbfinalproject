<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function index() {return view('pages.userManagement.index');}
    public function create(){return view('pages.userManagement.create');}
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|numeric|between:0,1'
        ]);
        if(!$validatedData->fails()){
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            return back()->with('success','Sukses tambah data');
        }
        return back()->with('danger','Gagal tambah data');
    }
    public function edit(User $user){return view('pages.userManagement.edit',compact('user'));}
    public function update(Request $request, User $user)
    {
        $change = [];
        if ($request->name != null && $request->name != $user->name) {
            $change['name'] = $request->name;
        }
        if ($request->username != null && $request->username != $user->username) {
            $change['username'] = $request->username;
        }
        if ($request->password != null && $request->password != $user->password) {
            $change['password'] = Hash::make($request->password);
        }
        if ($request->role != null && $request->role != $user->role) {
            $change['role'] = $request->role;
        }
        if($change){
            $user->update($change);
            return back()->with('success','Sukses update data, di rekomendasikan untuk relogin user tersebut');
        }
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(User $user){}
}
