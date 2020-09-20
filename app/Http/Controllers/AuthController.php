<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }
    public function process(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session([
                    'auth.id' => $user->id,
                    'auth.username' => $user->username,
                    'auth.name' => $user->name,
                    'auth.role' => $user->role, 
                    'auth.roleName' => $user->role === 0 ? 'Admin' : 'Warehouse'
                ]);
                return redirect('/dashboard');
            }
            return redirect()->to('login')
                ->withInput()
                ->with('status', 'Password yang kamu masukkan salah!');
        }
        return redirect()->to('login')
            ->with('status', 'Username yang kamu masukkan tidak ada !');
    }
    public function logout()
    {
        // dd(session()->all());
        session()->flush();
        return redirect()->to('login');
    }
}
