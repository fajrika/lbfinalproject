<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        if ($user->id == session('auth.id'))
            return view('pages.profile.edit',compact('user'));
        return redirect()->to('dashboard');    
    }
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
            return back()->with('success','Sukses update data, di rekomendasikan untuk relogin');
        }
        return back()->with('error','tidak ada data yang di update');
    }
}
